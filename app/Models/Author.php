<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
   protected $table = "authors";

   // Relasi: 1 Author bisa punya banyak Books
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
