<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { // get ini method httpuntuk menampilkan sebuah data
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index']); // index ini method yang ada di class controller
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/authors', [AuthorController::class, 'index']);



// ini routing yang langsung mengarah ke view, yang dimana tidak boleh, karena harus dari controller dulu

// Route::get('/books', function (){ 
//     return view('books'); // books ini harus sama dengan file books di folder views
// });



// ini routing yang langsung mengarah ke view, yang dimana tidak boleh, karena harus dari controller dulu

// Route::get('/genres', function(){
//     return view('genres');
// });
