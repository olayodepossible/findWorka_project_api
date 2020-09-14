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

       foreach ($books as $book){
           $book = BookModel::firstOrCreate(['isbn', $book['isbn']], [
            'name' => $book['name'],
           'isbn' => $book['isbn'],
           'authors' => $book['authors'],
           'dateReleased' => Carbon::parse($book['released'])->format("Y-m-d"),
           'comments_count' => DB::table('comments')->where('book_isbn', $book['isbn'])->count(),
           'characters' => $book['characters'],
           ]);

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
