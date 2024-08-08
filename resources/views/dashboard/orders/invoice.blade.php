@extends('layouts.dashboard.master')

@section('title', 'Invoice')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Invoice #{{ $order->id }}</h2>
            <p>Date: {{ $order->created_at }}</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->product->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right">Total</td>
                        <td>{{ $order->total }}</td>
                    </tr>
                </tbody>
            </table>
            <button onclick="window.print()" class="btn btn-primary">Print Invoice</button>
        </div>
    </div>
</div>
@endsection
