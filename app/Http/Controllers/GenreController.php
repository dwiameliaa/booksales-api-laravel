<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        // ini untuk data dummy
        // $data = new Genre();
        // $genres = $data->getGenres();

        $genres = Genre::all();

        // ::all untuk mengambil semua data dari table genre

        // datanya disimpan di array genres, key => value
        // return view('genres', ['genres' => $genres]); ini view untuk mengirim tampilan html nya

        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $genres
        ], 200); // pesan http 200 OK
    }
}
