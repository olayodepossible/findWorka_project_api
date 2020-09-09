<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    use HasFactory;
    protected $fillable = [
        'comment',
        'book_id'
    ];

    public function comments(){
        return $this->belongsTo(Book::class);
    }
}
