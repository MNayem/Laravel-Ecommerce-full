@extends('layouts.admin')

@section('content')

@if(session('message'))
    <h4 class="alert alert-success">{{ session('message') }}</h4>
@endif
@if(session('message-delete'))
    <h4 class="alert alert-danger">{{ session('message-delete') }}</h4>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Slider Images Details
                    <a href="{{ url('sliders/create') }}" class="btn btn-primary btn-sf text-white float-end">
                        Add Slider
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image Title</th>
                            <th>Image Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td>
                                    <img src="{{ asset("$slider->image")}}" style="heigh
                                    :70px; width: 70px;" alt="Slider Image" >
                                </td>
                                <td>{{ $slider->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ url('sliders/'.$slider->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('sliders/'.$slider->id.'/delete') }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure, you want to delete this slider image?')" >
                                        Delete
                                    </a>
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
