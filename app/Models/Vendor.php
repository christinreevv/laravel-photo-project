<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table = 'vendors';
    protected $primaryKey = 'vend_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function products() {
        return $this->hasMany(Product::class, 'vend_id', 'vend_id');
    }
}
