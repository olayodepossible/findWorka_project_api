<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BooksController extends Controller
{
    function show(){
        $myBook = new Book;
//        return $book;
//        $myBook->name = $book['name'];
        echo gettype($myBook->name);
//        var_dump(gettype($myBook) );
//        return Http::get("https://www.anapioficeandfire.com/api")->json();
    }
}
