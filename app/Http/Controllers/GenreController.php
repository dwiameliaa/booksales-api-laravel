<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index()
    {
        // ini untuk data dummy array di model 
        // $data = new Genre();
        // $genres = $data->getGenres();

        $genres = Genre::all();

        // ::all untuk mengambil semua data dari table genre

        // datanya disimpan di array genres, key => value
        // return view('genres', ['genres' => $genres]); ini view untuk mengirim tampilan html nya

        if ($genres->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $genres
        ], 200); // pesan http 200 OK
    }

    public function store(Request $request)
    {
        // 1. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        // 2. cek validator error
        if ($validator->fails()) {
            return response()->json([
                'succes' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 4. simpan data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // 5. response
        return response()->json([
            'succes' => true,
            'massage' => 'Resource added successfully!',
            'data' => $genre,
        ], 201);

    }
}
