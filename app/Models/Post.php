<?php

namespace App\Models;

use App\Models\Tag;
use Nette\Schema\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}


