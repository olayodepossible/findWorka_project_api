<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'book_isbn'];


    public function book(){
        return $this->belongsTo(BookModel::class, 'isbn');

    }
}
