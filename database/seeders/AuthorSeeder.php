<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'J.K Rowling',
            'photo' => 'jk_rowling.jpg',
            'bio' => 'British author, best known for the Harry Potter series.',
        ]);

        Author::create([
            'name' => 'Rikako Akiyoshi',
            'photo' => 'rikako_akiyoshi.jpg',
            'bio' => 'Japanese mystery novelist known for psychological thrillers.',
        ]);

        Author::create([
            'name' => 'Uketsu',
            'photo' => 'uketsu.jpg',
            'bio' => 'Japanese author of the psychological mystery novel "Teka-Teki Rumah Aneh".',
        ]);

        Author::create([
            'name' => 'Agatha Christie',
            'photo' => 'agatha_christie.jpg',
            'bio' => 'Famous British writer, often called the Queen of Mystery.',
        ]);

        Author::create([
            'name' => 'George Orwell',
            'photo' => 'george_orwell.jpg',
            'bio' => 'English novelist, essayist, and critic, best known for 1984 and Animal Farm.',
        ]);

        Author::create([
            'name' => 'Haruki Murakami',
            'photo' => 'haruki_murakami.jpg',
            'bio' => 'Japanese writer known for blending surrealism with contemporary themes.',
        ]);

        Author::create([
            'name' => 'Stephen King',
            'photo' => 'stephen_king.jpg',
            'bio' => 'American author of horror, supernatural fiction, suspense, and fantasy novels.',
        ]);
    }
}
