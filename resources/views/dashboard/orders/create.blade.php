@extends('layouts.dashboard.master')

@inject('order', 'App\Models\Order')
@inject('product', 'App\Models\Product')

@section('title', 'Create Order')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Create Order</h2>
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div id="product_id">
                    <div class="form-group">
                        <label for="product_id">Product</label>
                        <select name="product_id" class="form-control">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == $order->product_id ? 'selected' : '' }}>{{ $product->name }} (Stock: {{ $product->quantity }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="quantity">Quantity <span class="text-danger">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="quantity" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ $product->quantity }}">
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="price">Price <span class="text-danger">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $order->price }}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Discount </label>
                            <div class="col-md-6 col-sm-6">
                                <select name="discount" id="discount" class="form-control">
                                    <option value="" selected>-------- Select a discount --------</option>
                                    @php
                                        for($i = 0 ; $i <= 100 ; $i++){
                                            $selected = old('discount', $order->discount) == $i ? 'selected' : '';
                                            echo "<option value='$i' $selected>";
                                            if($i == 0){
                                                $i = 0;
                                                echo "0% (No Discount)";
                                            } else{
                                                echo "$i%";
                                            }
                                            echo "</option>";
                                        }
                                    @endphp
                                </select>
                                @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description</label>
                    <div class="col-md-6 col-sm-6">
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $order->description) ?? ''}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <button type="button" id="add-product" class="btn btn-primary">Add Product</button>
                <button type="submit" class="btn btn-success">Create Order</button>
            </form>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Create Order</h2>
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="product_id'">Product <span class="text-danger">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <select name="product_id" class="form-control @error('product_id') is-invalid @enderror" id="product_id">
                                    <option value="" selected>-------- Select a Product --------</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ $product->id == $order->product_id ? 'selected' : '' }}>{{ $product->name }} (Stock: {{ $product->quantity }})</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="quantity">Quantity <span class="text-danger">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="quantity" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity', $order->quantity)}}">
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="price">Price <span class="text-danger">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price', $order->price)}}">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Discount </label>
                            <div class="col-md-6 col-sm-6">
                                <select name="discount" id="discount" class="form-control">
                                    <option value="" selected>-------- Select a discount --------</option>
                                    @php
                                        for($i = 0 ; $i <= 100 ; $i++){
                                            $selected = old('discount', $order->discount) == $i ? 'selected' : '';
                                            echo "<option value='$i' $selected>";
                                            if($i == 0){
                                                $i = 0;
                                                echo "0% (No Discount)";
                                            } else{
                                                echo "$i%";
                                            }
                                            echo "</option>";
                                        }
                                    @endphp
                                </select>
                                @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description</label>
                    <div class="col-md-6 col-sm-6">
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $order->description) ?? ''}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



<button type="button" id="add-product" class="btn btn-primary">Add Product</button>
                <button type="submit" class="btn btn-success">Create Order</button>
            </form>
        </div>
    </div>
</div>

<script>
    let productIndex = 1;

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
