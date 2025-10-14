<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'id' => 1,
            'name' => 'J.K Rowling',
            'photo' => 'jk_rowling.jpg',
            'bio' => 'British author, best known for the Harry Potter series.',
        ],
        [
            'id' => 2,
            'name' => 'Rikako Akiyoshi',
            'photo' => 'rikako_akiyoshi.jpg',
            'bio' => 'Japanese mystery novelist known for psychological thrillers.',
        ],
        [
            'id' => 3,
            'name' => 'Uketsu',
            'photo' => 'uketsu.jpg',
            'bio' => 'Japanese author of the psychological mystery novel "Teka-Teki Rumah Aneh".',
        ],
        [
            'id' => 4,
            'name' => 'Agatha Christie',
            'photo' => 'agatha_christie.jpg',
            'bio' => 'Famous British writer, often called the Queen of Mystery.',
        ],
        [
            'id' => 5,
            'name' => 'George Orwell',
            'photo' => 'george_orwell.jpg',
            'bio' => 'English novelist, essayist, and critic, best known for 1984 and Animal Farm.',
        ],
        [
            'id' => 6,
            'name' => 'Haruki Murakami',
            'photo' => 'haruki_murakami.jpg',
            'bio' => 'Japanese writer known for blending surrealism with contemporary themes.',
        ],
        [
            'id' => 7,
            'name' => 'Stephen King',
            'photo' => 'stephen_king.jpg',
            'bio' => 'American author of horror, supernatural fiction, suspense, and fantasy novels.',
        ],
    ];

    public function getAuthors()
    {
        return $this->authors;
    }

}
