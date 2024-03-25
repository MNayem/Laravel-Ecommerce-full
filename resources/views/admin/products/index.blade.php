@extends('layouts.admin')

@section('content')

@if(session('message'))
    <h4 class="alert alert-success">{{ session('message') }}</h4>
@endif
@if(session('message-update'))
    <h4 class="alert alert-success">{{ session('message-update') }}</h4>
@endif
@if(session('message-noimage'))
    <h4 class="alert alert-danger">{{ session('message-noimage') }}</h4>
@endif
@if(session('message-deleteProduct'))
    <h4 class="alert alert-danger">{{ session('message-deleteProduct') }}</h4>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Products
                    <a href="{{ url('products/create') }}" class="btn btn-primary btn-sf text-white float-end">
                        Add Product
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if ($product->category)
                                    {{ $product->category->name }}
                                @else
                                    <h6>No Category</h6>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                            <td>
                                <a href="{{ url('/products/'.$product->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ url('/products/'.$product->id.'/delete') }}" onclick="return confirm('Are you sure, you want to delete this product?')" class="btn btn-sm btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Product Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div>
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
