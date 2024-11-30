<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'cust_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
