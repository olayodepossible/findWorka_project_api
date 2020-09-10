<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookControllerApi extends Controller
{
    public function getAllBooks() {
        // logic to get all books goes here
    }

    public function getBook($id) {
        return Http::get("https://www.anapioficeandfire.com/api/books/{$id}")->json();
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
