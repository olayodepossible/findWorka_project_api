<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getComment($id) {
        $comments = Comment::whereIn('book_isbn', $id)->latest()->get();
    }
}
