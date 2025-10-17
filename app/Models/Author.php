<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
   protected $table = "authors";
   protected $fillable = ['name', 'bio', 'photo'];

   // Relasi: 1 Author bisa punya banyak Books
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
