<!DOCTYPE html>
@extends('layouts.layout')

@section('title')
@endsection

@section('content')
    <div class="container">
        <h1 class="fw-light my-4">{{ $title }}</h1>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Order number</th>
                    <th>Order date</th>
                    <th>Customer's code</th>
                    <th>Количество позиций в заказе</th>
                    <th>Order details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->order_num }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->cust_id }}</td>
                        <td>{{ $order->products_count }}</td> <!-- Вывод количества позиций -->
                        <td>
                            <a href="{{ route('show', $order->order_num) }}" class="btn btn-outline-dark">Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
