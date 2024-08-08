@extends('layouts.dashboard.master')

@section('title', 'Edit Order')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Edit Order #{{ $order->id }}</h2>
            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div id="products">
                    @foreach($order->items as $index => $item)
                        <div class="form-group">
                            <label for="product">Product</label>
                            <select name="products[{{ $index }}][id]" class="form-control">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $product->id == $item->product_id ? 'selected' : '' }}>
                                        {{ $product->name }} (Stock: {{ $product->quantity }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="products[{{ $index }}][quantity]" class="form-control" value="{{ $item->quantity }}" min="1">
                        </div>
                    @endforeach
                </div>
                <button type="button" id="add-product" class="btn btn-primary">Add Product</button>
                <button type="submit" class="btn btn-success">Update Order</button>
            </form>
        </div>
    </div>
</div>

<script>
    let productIndex = {{ count($order->items) }};

    document.getElementById('add-product').addEventListener('click', function() {
        const productsDiv = document.getElementById('products');
        const newProductDiv = document.createElement('div');

        newProductDiv.innerHTML = `
            <div class="form-group">
                <label for="product">Product</label>
                <select name="products[${productIndex}][id]" class="form-control">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} (Stock: {{ $product->quantity }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="products[${productIndex}][quantity]" class="form-control" min="1">
            </div>
        `;

        productsDiv.appendChild(newProductDiv);
        productIndex++;
    });
</script>
@endsection

