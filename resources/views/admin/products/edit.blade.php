@extends('admin.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}" />
@endsection

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
                <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li>

            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane active" id="general">


                <div class="tab-pane" id="images">
                    <div class="tile">
                        <h3 class="tile-title">Upload Image</h3>
                        <hr>
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="button" id="uploadButton">
                                        <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                                    </button>
                                </div>
                            </div>
                            @if ($product->photo)
                            <hr>
                            <div class="row">
                                @foreach($product->photo as $photo)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{ asset('storage/'.$photo->full) }}" id="brandLogo" class="img-fluid" alt="img">
                                            <a class="card-link float-right text-danger" href="{{ route('admin.products.images.delete', $photo->id) }}">
                                                <i class="fa fa-fw fa-lg fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="tab-pane" id="images">
                    <div class="tile">
                        <h3 class="tile-title">Upload Image</h3>
                        <hr>
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="button" id="uploadButton">
                                        <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                                    </button>
                                </div>
                            </div>
                            @if ($product->photos)
                            <hr>
                            <div class="row">
                                @foreach($product->photos as $photos)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{ asset('storage/'.$photo->full) }}" id="brandLogo" class="img-fluid" alt="img">
                                            <a class="card-link float-right text-danger" href="{{ route('admin.products.images.delete', $photo->id) }}">
                                                <i class="fa fa-fw fa-lg fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="tile">
                    <form method="post" action="{{ route('admin.products.update') }}">
                        @csrf
                        <h3 class="tile-title">Product Information</h3>
                        <hr>
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter product name" id="name" name="name" value="{{ old('name', $product->name) }}" />
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="serial_no">Serial_number</label>
                                        <input class="form-control @error('serial_no') is-invalid @enderror" type="text" placeholder="Enter serial number" id="serial_no" name="serial_no" value="{{ old('serial_no', $product->serial_no) }}" />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('serial_no') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="model">Model</label>
                                        <input class="form-control @error('model') is-invalid @enderror" type="text" placeholder="Enter model" id="model" name="model" value="{{ old('model', $product->model) }}" />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('model') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="price">Price</label>
                                        <input class="form-control @error('price') is-invalid @enderror" type="text" placeholder="Enter product price" id="price" name="price" value="{{ old('price', $product->price) }}" />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="discount">Discount</label>
                                        <input class="form-control" type="text" placeholder="Enter product discount" id="discount" name="discount" value="{{ old('dicount', $product->discount) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="total_quantity">Quantity</label>
                                        <input class="form-control @error('total_quantity') is-invalid @enderror" type="number" placeholder="Enter product quantity" id="total_quantity" name="total_quantity" value="{{ old('total_quantity', $product->total_quantity) }}" />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('total_quantity') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="weight">Weight</label>
                                        <input class="form-control" type="text" placeholder="Enter product weight" id="weight" name="weight" value="{{ old('weight', $product->weight) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="description">Description</label>
                                <textarea name="description" id="description" rows="8" class="form-control">{{ old('description', $product->description) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="model">Label</label>
                                        <input class="form-control @error('label') is-invalid @enderror" type="text" placeholder="Enter label" id="label" name="label" value="{{ old('label', $product->label) }}" />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('label') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ $product->is_active == 1 ? 'checked' : '' }} />Status
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="tile-footer">
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Product</button>
                                    <a class="btn btn-danger" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
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
<script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#categories').select2();
    });
</script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>


<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function() {
        $('#categories').select2();

        let myDropzone = new Dropzone("#dropzone", {
            paramName: "photo",
            addRemoveLinks: false,
            maxFilesize: 4,
            parallelUploads: 2,
            uploadMultiple: false,
            url: "{{ route('admin.products.images.upload') }}",
            autoProcessQueue: false,
        });
        myDropzone.on("queuecomplete", function(file) {
            window.location.reload();
            showNotification('Completed', 'All product images uploaded', 'success', 'fa-check');
        });
        $('#uploadButton').click(function() {
            if (myDropzone.files.length === 0) {
                showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
            } else {
                myDropzone.processQueue();
            }
        });

        function showNotification(title, message, type, icon) {
            $.notify({
                title: title + ' : ',
                message: message,
                icon: 'fa ' + icon
            }, {
                type: type,
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                },
            });
        }
    });
</script>

@endpush