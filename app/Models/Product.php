<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'prod_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vend_id', 'vend_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'OrderItems')
                    ->withPivot('quantity', 'item_price', 'order_item');
    }
}

