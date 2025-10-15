<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => "Harry Potter and the Sorcerers Stone",
            'description' => "The first book in the Harry Potter series.",
            'price' => 50000.00,
            'stock' => 50,
            'cover_photo' => "harrypotter.jpg",
            'genre_id' => 4, // Fantasy
            'author_id' => 1, // J.K Rowling
        ]);

        Book::create([
            'title' => "Girl in the Dark",
            'description' => "A psychological mystery novel filled with suspense and dark secrets.",
            'price' => 60000.00,
            'stock' => 30,
            'cover_photo' => "girlinthedark.jpg",
            'genre_id' => 5, // Mystery
            'author_id' => 2, // Rikako Akiyoshi
        ]);

        Book::create([
            'title' => "Teka-Teki Rumah Aneh",
            'description' => "A Japanese psychological mystery novel about a strange house full of secrets.",
            'price' => 55000.00,
            'stock' => 25,
            'cover_photo' => "teka_teki_rumah_aneh.jpg",
            'genre_id' => 5, // Mystery
            'author_id' => 3, // Uketsu
        ]);

        Book::create([
            'title' => "Murder on the Orient Express",
            'description' => "One of Agatha Christies most famous detective novels featuring Hercule Poirot.",
            'price' => 65000.00,
            'stock' => 40,
            'cover_photo' => "orient_express.jpg",
            'genre_id' => 5, // Mystery
            'author_id' => 4, // Agatha Christie
        ]);

        Book::create([
            'title' => "1984",
            'description' => "A dystopian novel depicting a totalitarian regime and extreme surveillance.",
            'price' => 70000.00,
            'stock' => 35,
            'cover_photo' => "1984.jpg",
            'genre_id' => 3, // Science Fiction
            'author_id' => 5, // George Orwell
        ]);

        Book::create([
            'title' => "Norwegian Wood",
            'description' => "A coming-of-age novel blending romance, melancholy, and Japanese culture.",
            'price' => 60000.00,
            'stock' => 20,
            'cover_photo' => "norwegian_wood.jpg",
            'genre_id' => 6, // Romance
            'author_id' => 6, // Haruki Murakami
        ]);

        Book::create([
            'title' => "The Shining",
            'description' => "A horror classic about a haunted hotel and the psychological descent of its caretaker.",
            'price' => 75000.00,
            'stock' => 15,
            'cover_photo' => "the_shining.jpg",
            'genre_id' => 7, // Horror
            'author_id' => 7, // Stephen King
        ]);

        Book::create([
            'title' => "The Great Gatsby",
            'description' => "A novel set in the Roaring Twenties.",
            'price' => 150000.00,
            'stock' => 10,
            'cover_photo' => "great_gatsby.png",
            'genre_id' => 1, // Fiction
            'author_id' => 1, // J.K Rowling (contoh saja)
        ]);
    }
}
