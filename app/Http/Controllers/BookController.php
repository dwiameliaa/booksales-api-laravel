<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        // $data = new Book(); // membuat object
        // $books = $data->getBooks(); // mengakses method getBooks

        $books = Book::with(['genre', 'author'])->get();
        // return view('books', compact('books'));

        if ($books->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        // kembalikan dalam format JSON
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $books
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpeg,jpg,png|max:2048', // 2048 ini max 2 mb
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        // 2. cek validator error
        if ($validator->fails()) {
            return response()->json([
                'succes' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. upload image
        $image = $request->file('cover_photo');
        $image->store('books', 'public'); // Simpan file ke folder storage/app/public/books

        // 4. simpan data
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => $image->hashName(), // supaya nama file dari gambarnya itu di hash/ diacak
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ]);

        // 5. response
        return response()->json([
            'succes' => true,
            'massage' => 'Resource added successfully!',
            'data' => $book,
        ], 201);
    }
}
