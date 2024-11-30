<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'city'; // Указываем название таблицы
    protected $primaryKey = 'ID'; // Указываем первичный ключ

    public function country()
    {
        return $this->belongsTo(Country::class, 'CountryCode', 'Code'); // Обратная связь
    }
}
