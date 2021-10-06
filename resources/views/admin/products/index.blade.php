@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<style>
    .app-content {
        width: 3271px !important;
    }

    .app-sidebar {
        height: 100vh !important;
    }
</style>
<div class="app-title">
    <div>
        <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        <p>{{ $subTitle }}</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary pull-right">Add Product</a>
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
                            <th> Serial_No </th>
                            <th> Name </th>
                            <th class="text-center"> Model </th>
                            <th class="text-center"> Year </th>
                            <th class="text-center"> Description </th>
                            <th class="text-center"> Manufacturer </th>
                            <th> Color </th>
                            <th>Front_camera</th>
                            <th class="text-center"> Back_camera </th>
                            <th class="text-center"> Ram </th>
                            <th class="text-center"> Storage </th>
                            <th class="text-center"> Display_Size </th>
                            <th> Display_resolution </th>
                            <th>Proccessor</th>
                            <th class="text-center">Battery</th>
                            <th class="text-center"> Os </th>
                            <th class="text-center"> Graphics_card </th>
                            <th class="text-center"> Weight </th>
                            <th> Price </th>
                            <th> Discount </th>
                            <th> Total_quantity </th>
                            <th class="text-center"> Is_active </th>
                            <th class="text-center"> Category </th>
                            <th class="text-center"> Label </th>

                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>

                            <td>{{ $product->serial_no }}</td>

                            <td>{{ $product->name }}</td>

                            <td>{{ $product->model }}</td>

                            <td>{{ $product->year }}</td>

                            <td>{{ $product->description }}</td>

                            <td>{{ $product->manufacturer }}</td>

                            <td>{{ $product->color }}</td>

                            <td>{{ $product->front_camera }}</td>

                            <td>{{ $product->back_camera }}</td>

                            <td>{{ $product->ram }}</td>

                            <td>{{ $product->storage }}</td>

                            <td>{{ $product->display_size }}</td>

                            <td>{{ $product->display_resolution }}</td>

                            <td>{{ $product->processor }}</td>

                            <td>{{ $product->battery }}</td>

                            <td>{{ $product->os }}</td>

                            <td>{{ $product->graphics_card }}</td>

                            <td>{{ $product->weight }}</td>

                            <td>{{ config('settings.currency_symbol') }}{{ $product->price }}</td>

                            <td>{{ $product->discount }}</td>

                            <td>{{ $product->total_quantity }}</td>



                            <td class="text-center">
                                @if ($product->is_active == 1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Not Active</span>
                                @endif
                            </td>
                            <td>{{ $product->categories['name'] }}</td>
                            <td>{{ $product->label }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Second group">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.products.delete', $product->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>

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
<script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
    $('#sampleTable').DataTable();
</script>
@endpush