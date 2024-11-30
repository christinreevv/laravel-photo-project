@extends('layouts.layout')

@section('title', $title)

@section('content')
    <div class="container">
        <h1 class="fw-light my-4">{{ $title }}</h1>
        <a href="{{ route('orders.storeproduct',$order_num) }}" class="btn btn-outline-dark">Back to Order Details</a>

        <form action="{{ route('orders.storeproduct', $order_num) }}" method="POST" class="mt-4">
            @csrf
            <h2 class="mt-5">Номер заказа: {{ $order_num }}</h2><br>
            <div class="mb-3">
                <label for="product_id" class="form-label">Product Code</label>
                <input type="text" name="product_id" id="product_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Order</label>
                <input type="number" name="order_item" id="order_item" class="form-control" step="0.01" min="0" required>
            </div>
            <button type="submit" class="btn btn-dark">Add Product</button>
        </form>
    </div>
@endsection
