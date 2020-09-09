<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BooksController extends Controller
{
    function show(){
        return Http::get("https://www.anapioficeandfire.com/api")->json();
    }
}
