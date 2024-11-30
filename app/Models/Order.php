<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'order_num';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    public function vendor()
    {
        return $this->belongsTo(Customer::class, 'cust_id', 'cust_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orderitems', 'order_num', 'prod_id')
            ->withPivot('quantity', 'item_price', 'order_item');
    }
}
