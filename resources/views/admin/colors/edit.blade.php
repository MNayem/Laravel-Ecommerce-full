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
                    Edit Color
                    <a href="{{ url('colors') }}" class="btn btn-warning btn-sf text-white float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('colors/'.$color->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Color Name</label>
                        <input type="text" name="name" value="{{ $color->name }}" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Color Code</label>
                        <input type="text" name="code" value="{{ $color->code }}" class="form-control">
                        @error('code') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{ $color->status ? 'checked' : '' }} /> Checked=Hidden, Un-checked=Visible
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
