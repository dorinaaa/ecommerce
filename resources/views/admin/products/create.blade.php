@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
=@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
    </div>
</div>
@include('admin.partials.flash')
<div class="row user">
    <div class="col-md-3">
        <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
                <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane active" id="general">
                <div class="tile">
                    <form action="{{ route('admin.products.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <h3 class="tile-title">Product Information</h3>
                        <hr>
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" required
                                    placeholder="Enter attribute name" id="name" name="name"
                                    value="{{ old('name') }}" />
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('name')
                                    <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name">Model</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    placeholder="Enter attribute name" required id="name" name="model"
                                    value="{{ old('model') }}" />
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('name')
                                    <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name">Manufacturer</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    placeholder="Enter attribute name" required id="name" name="manufacturer"
                                    value="{{ old('manufacturer') }}" />
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('name')
                                    <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name">Label</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    placeholder="Enter attribute label" required id="label" name="label"
                                    value="{{ old('label') }}" />
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('label')
                                    <span>{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="name">Serial_no</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    placeholder="Enter attribute name" id="name" name="serial_no"
                                    value="{{ old('name') }}" />
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('serial_no')
                                    <span>{{ $message }}</span> @enderror
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label" for="categories">Category</label>
                                <select name="categories[]" id="categories" class="form-control" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="price">Price</label>
                                        <input class="form-control @error('price') is-invalid @enderror" type="text"
                                            placeholder="Enter product price" id="price" name="price"
                                            value="{{ old('price') }}" />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('price')
                                            <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="special_price">Discount</label>
                                        <input class="form-control" type="number"
                                            placeholder="Enter product special price" id="special_price" name="discount"
                                            value="{{ old('discount') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="weight">Total quantity</label>
                                        <input class="form-control" type="number" placeholder="Enter product weight"
                                            id="weight" name="total_quantity"
                                            value="{{ old('total_quantity') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="description">Description</label>
                                <textarea name="description" id="description" rows="8" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="status"
                                            name="is_active" />Status
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Product Image</label>
                                <input class="form-control @error('image_path') is-invalid @enderror" type="file" id="image_path"
                                    name="image_path" />
                                @error('image_path') {{ $message }} @enderror
                            </div>

                        </div>
                        <div class="tile-footer">
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="submit"><i
                                            class="fa fa-fw fa-lg fa-check-circle"></i>Save Product</button>
                                    <a class="btn btn-danger"
                                        href="{{ route('admin.products.index') }}"><i
                                            class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}">
    </script>
    <script>
        $(document).ready(function () {
            $('#categories').select2();
        });
    </script>
@endpush