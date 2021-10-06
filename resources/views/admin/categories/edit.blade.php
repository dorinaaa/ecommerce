@extends('admin.app')
@section('title') Modifiko kategorine @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-tags"></i> Modifiko kategorine</h1>
    </div>
</div>
@include('admin.partials.flash')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="tile">
            <h3 class="tile-title">Kategori</h3>
            <form action="{{ route('admin.categories.update') }}" method="POST" role="form"
                enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="name">Emri <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name', $category->name) }}" />
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        @error('name') {{ $message }} @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="description">Pershkrimi</label>
                        <textarea class="form-control" rows="4" name="description"
                            id="description">{{ old('description', $category->description) }}</textarea>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                @if($category->image != null)
                                    <figure class="mt-2" style="width: 80px; height: auto;">
                                        <img src="{{ asset('storage/'.$category->image) }}"
                                            id="categoryImage" class="img-fluid" alt="img">
                                    </figure>
                                @endif
                            </div>
                        </div>
                        <label class="control-label">Category Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image" />
                        @error('image') {{ $message }} @enderror
                    </div>

                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Modifiko
                        kategorine</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}"><i
                            class="fa fa-fw fa-lg fa-times-circle"></i>Anullo</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection