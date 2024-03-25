@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Order List
                </h3>
            </div>
            <div class="card-body">

                <form action="" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label>Filter by Date</label>
                            <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Filter by Status</label>
                            <select name="status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="In Progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="Pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Out-For-Delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out For Delivery</option>
                                <option value="Cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <br />

                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
                <hr>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                           <tr>
                                <th>Order ID</th>
                                <th>Tracking No.</th>
                                <th>User Name</th>
                                <th>Payment Mode</th>
                                <th>Ordered Date</th>
                                <th>Status Message</th>
                                <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $orderItem)
                                <tr>
                                    <td>{{ $orderItem->id }}</td>
                                    <td>{{ $orderItem->tracking_no }}</td>
                                    <td>{{ $orderItem->fullname }}</td>
                                    <td>{{ $orderItem->payment_mode }}</td>
                                    <td>{{ $orderItem->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $orderItem->status_msg }}</td>
                                    <td>
                                        <a href="{{ url('orderAdmin/'.$orderItem->id) }}" class="btn btn-primary btn-sm">View Details</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        No Orders Available!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $orders->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
