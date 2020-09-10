<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookControllerApi extends Controller
{
    public function getAllBooks() {

        $books = Http::get("https://www.anapioficeandfire.com/api/books")->json();
        $data = [];
       foreach ($books as $book){
           $myBook = new Book;
           $myBook->name = $book['name'];
           $myBook->authors = $book['authors'];
           $myBook->comments_count = 12;
           $myBook->characters = $book['characters'];
           $date = Carbon::parse($book['released'])->format("Y-m-d");
           $data[$date] = $myBook;
       }
       return $data;
    }

    public function getBook($id) {
        $book = Http::get("https://www.anapioficeandfire.com/api/books/{$id}")->json();
        $myBook = new Book;
        $myBook->name = $book['name'];
        $myBook->authors = $book['authors'];
        $myBook->comments_count = 12;
        $myBook->characters = $book['characters'];
        return $myBook;
    }

    public function createBook(Request $request) {
        // logic to create a book record goes here
    }

    public function updateBook(Request $request, $id) {
        // logic to update a book record goes here
    }

    public function deleteBook ($id) {
        // logic to delete a book record goes here
    }
}
