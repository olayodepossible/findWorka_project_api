<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
/*use App\Models\Comment;*/
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BookControllerApi extends Controller
{
    public function getAllBooks() {

        $books = Http::get("https://www.anapioficeandfire.com/api/books")->json();

       /*foreach ($books as $book){
           if (DB::table('book_models')->where('isbn', $book['isbn'])->doesntExist()) {
               $myBook = new BookModel;
               $myBook->name = $book['name'];
               $myBook->isbn = $book['isbn'];
               $myBook->authors = $book['authors'];
               $myBook->dateReleased = Carbon::parse($book['released'])->format("Y-m-d");
               $myBook->comments_count = DB::table('comments')->where('book_isbn', $book['isbn'])->count();
               $myBook->characters = $book['characters'];
               $myBook->save();
           */}

       }
       return  $bookData = DB::table('book_models')->paginate(5);
    }


    public function getBook($id) {
        $data = json_decode(collect(DB::table('book_models')
            ->where('id', $id)->get())->toJson() , true);

        return response()->json([
            "status" => 200,
            "book" => $data
        ]);
    }

}
