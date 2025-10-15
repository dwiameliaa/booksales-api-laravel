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

        return view('genres', ['genres' => $genres]); // datanya disimpan di array genres, key => value
    }
}
