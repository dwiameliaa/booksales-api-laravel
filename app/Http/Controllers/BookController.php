<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // $data = new Book(); // membuat object
        // $books = $data->getBooks(); // mengakses method getBooks

        $books = Book::with(['genre', 'author'])->get();
        // return view('books', compact('books'));

        // kembalikan dalam format JSON
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $books
        ], 200);
    }
}
