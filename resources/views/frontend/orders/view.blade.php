@extends('layouts.app')

@section('title', 'Ecommerce Project | My Order Details')

@section('content')

<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"></i> My Order Details
                        <a href="{{ url('orders') }}" class="btn btn-warning btn-sm float-end">BACK</a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>

                            <h6>Order Id : {{ $order->id }}</h6>
                            <h6>Tracking No. : {{ $order->tracking_no }}</h6>
                            <h6>Ordered Date : {{ $order->created_at->format('d-m-Y') }}</h6>
                            <h6>Payment Mode : {{ $order->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">
                                Order Status Message : <span class="text-uppercase">{{ $order->status_msg }}</span>
                            </h6>
                        </div>

                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>

                            <h6>Full Name : {{ $order->fullname }}</h6>
                            <h6>Email Id : {{ $order->email }}</h6>
                            <h6>Phone : {{ $order->phone }}</h6>
                            <h6>Pin Code/Zip Code : {{ $order->pincode }}</h6>
                            <h6>Address : {{ $order->address }}</h6>
                        </div>
                    </div>
                    <br/>

                    <h5>Order Items</h5>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                               <tr>
                                    <th>Product ID</th>
                                    <th>Image</th>
                                    <th>Product Name and Color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                               </tr>
                            </thead>
                            <tbody>

                                @php
                                    $totalPrice = 0;
                                @endphp

                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td width="10%">{{ $item->id }}</td>
                                        <td width="10%">
                                            @if ($item->product->productImages)
                                            <img src="{{ asset($item->product->productImages[0]->image) }}"
                                                style="width: 50px; height: 50px" alt="{{ $item->product->name }}">
                                            @else
                                                <img src="  "
                                                    style="width: 50px; height: 50px" alt="Product Images">
                                            @endif

                                        </td>
                                        <td>
                                            {{ $item->product->name }}

                                            @if ($item->productColor)

                                                @if ($item->productColor->color)
                                                    <span style="font-size: 13px; color: #000;">
                                                        , Color: {{ $item->productColor->color->name }}
                                                    </span>
                                                @endif

                                            @endif

                                        </td>
                                        <td width="10%">$ {{ $item->price }}</td>
                                        <td width="10%">{{ $item->quantity }}</td>
                                        <td width="10%" class="fw-bold">$ {{ $item->price * $item->quantity }}</td>

                                        @php
                                            $totalPrice += $item->price * $item->quantity;
                                        @endphp


                                    </tr>
                                @endforeach

                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Amount : </td>
                                        <td colspan="1" class="fw-bold">$ {{ $totalPrice }}</td>
                                    </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
