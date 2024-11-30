<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orders = Order::withCount('products')->get();


        return view('orders.index',  ['title' => "Заказы", 'orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $orderId)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($order_num)
    {
        $order = Order::find($order_num);
        $products= $order->products;

        return view('orders.show', ['title' => '', 'products' => $products, 'order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($order_num)
    {
        return view('orders.addproduct', ["title" => 'Orders', 'order_num' => $order_num]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($order_num, Request $request)
    {
        $quantity = $request->quantity;
        $item_price = $request->price;
        $prod_id = $request->product_id;
        $order_item = $request->order_item;

        $order = Order::find($order_num);
        $order->products()->attach(
            $order_num,
            [
                'quantity' => $quantity,
                'item_price' => $item_price,
                'prod_id' => $prod_id,
                'order_item' => $order_item,
            ]
            );

        // DB::insert('insert into OrderItems (order_num, quantity, item_price, prod_price, order_price) values (?, ?, ?, ?, ?)', [$order->order_num,$quantity, $item_price, $prod_id, $order_item]);

        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($orderId, $productId)
    {

    }
}
