@extends('layouts.layout')

@section('title')
@endsection

@section('content')
    <div class="container">
        <h1 class="fw-light my-4">{{ $title }}</h1>
        <a href="{{ route('index') }}" class="btn btn-outline-dark">Go back to the list of orders</a>
        <table class="table table-secondary table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Vendor</th>
                    <th>Quantiry</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->prod_name }}</td>
                        <td>{{ $product->vendor->vend_name }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->prod_price }}</td>
                        <td>     <a href="{{ route('orders.addproduct', $order->order_num) }}" class="btn btn-outline-dark">Add a new item to the order</a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
