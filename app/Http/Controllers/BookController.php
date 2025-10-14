<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $data = new Book(); // membuat object
        $books = $data->getBooks(); // mengakses method getBooks


        return view('books', ['books' => $books]);
    }
}
