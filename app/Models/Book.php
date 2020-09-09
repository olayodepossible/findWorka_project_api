<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'authors',
      'comments_count',
      'characters'
    ];

    public function books(){
        return $this->hasMany(Comment::class);
    }
}
