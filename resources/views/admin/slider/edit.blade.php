@extends('layouts.admin')

@section('content')

@if(session('message'))
    <h4 class="alert alert-success">{{ session('message') }}</h4>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Edit Slider Image
                    <a href="{{ url('sliders') }}" class="btn btn-warning btn-sf text-white float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ $slider->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{ asset("$slider->image") }}" style="height: 70px; width: 70px;" alt="Slider Image">
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked' : '' }} /> Checked=Hidden, Un-checked=Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
