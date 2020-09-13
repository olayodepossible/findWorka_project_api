<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getComments($id) {
        return Comment::whereIn('book_isbn', [$id])->latest()->get();
    }

    public function createComment(Request $request){
        $data = $this->validate($request, [
                    "comment" => ['required','string','max:500'],
                ]);

        $data = Comment::create($request->all());


        return response()->json([
            "status" => "201 created",
            "comment" => $data
        ]);

    }
}
