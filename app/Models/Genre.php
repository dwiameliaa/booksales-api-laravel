<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = "genres"; // genres disini harus sama dengan yang ada di migrations
    protected $fillable = ['name', 'description'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
