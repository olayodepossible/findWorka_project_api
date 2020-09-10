<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'isbn',
        'authors',
        'dateReleased',
        'comments_count',
        'characters'
    ];

    protected $casts =['characters' => 'array', 'authors' => 'array'];

    public function books(){
        return $this->hasMany(Comment::class);
    }
}
