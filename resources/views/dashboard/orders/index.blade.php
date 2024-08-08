@extends('layouts.dashboard.master')

@section('title')
All orders ({{ \App\Models\Order::count() }})
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-end my-1">
            <a href="{{ route('orders.create') }}" class="btn btn-outline-success">Add New Order</a>
        </div>
        <div class="col-12">
            <h2>All Orders ({{ \App\Models\Order::count() }})</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Price After Discount</th>
                        <th>Discount</th>
                        <th>Description</th>
                        <th class="text-center">Created By</th>
                        <th>Date</th>
                        <th class="text-center">Updated By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price ?? '-'}}</td>
                            <th>{{ $order->discount > 0 ? $order->price - ($order->price * 100 / $order->discount) : '-' }}


                            <td>{{ $order->discount ?? '-' }}</td>
                            <td>{{ $order->description  }}</td>
                            <td>{{ $order->create_user->name }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->update_user->name ?? '-' }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
