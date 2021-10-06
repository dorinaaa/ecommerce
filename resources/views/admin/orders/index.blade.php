@extends('admin.app')
@section('title') Porosite @endsection
@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-tags"></i> Porosite</h1>
    <p></p>
  </div>
</div>
@include('admin.partials.flash')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th> # </th>
              <th> Klienti </th>
              <th> Produktet </th>
              <th> Data e porosise </th>
              <th> Adresa </th>
              <th> Cmimi total </th>
              <th> Invoice </th>
              <th>Status</th>
              <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
                <tr>
                  <form method="post" action="{{ route('edit.status') }}">
                    @csrf
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->user->name }}</td>
                  <td>
                    <table>
                      <tr>
                        <th>Emri</th>
                        <th>Cmimi</th>
                        <th>Sasia</th>
                      </tr>
                      @php $price = 0 @endphp
                      @foreach($order->orderDetails as $orderDetail)
                      <tr>
                        <td>{{ $orderDetail->product->name }}</td>
                        <td>{{ $orderDetail->product->price }}</td>
                        <td>{{ $orderDetail->quantity }}</td>
                      </tr>
                        @php $price = $price + ($orderDetail->product->price * $orderDetail->quantity)@endphp
                      @endforeach
                    </table>
                  </td>
                  <td>{{ $order->date }}</td>
                  <td>{{ $order->address }}</td>
                  <td>{{ $price }}</td>
                    <td class="text-center"> <a href="/orders/invoice/{{$order->id}}">Invoice</a></td>
                    <td>
                    @php $selectedStatus = $order->status->name @endphp
                    <select name="status">
                      @foreach(\App\Models\Statuses::all() as $status)
                        <option value="{{$status->name}}"
                        @if($status->name == $selectedStatus) selected @endif
                          >{{$status->name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Second group">
                      <select name="order_id" hidden>
                          <option value="{{$order->id}}" selected></option>
                      </select>
                      <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Save</button>
                    </div>
                  </td>
              </form>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
  <script type="text/javascript"
    src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript"
    src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
  <script type="text/javascript">
    $('#sampleTable').DataTable();
  </script>
@endpush