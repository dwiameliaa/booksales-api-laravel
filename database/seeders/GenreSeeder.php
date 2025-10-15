<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Genre ini dari models
        Genre::create([
            'name' => 'Fiction',
            'description' => 'A literary work based on the imagination and not necessarily on fact.',
        ]);

        Genre::create([
            'name' => 'Non-Fiction',
            'description' => 'A literary work based on facts and real events.',
        ]);

        Genre::create([
            'name' => 'Science Fiction',
            'description' => 'A genre that deals with imagination and futuristic concepts.',
        ]);

        Genre::create([
            'name' => 'Fantasy',
            'description' => 'A genre that features magical elements, mythical creatures, or supernatural settings.',
        ]);

        Genre::create([
            'name' => 'Mystery',
            'description' => 'A genre focused on solving crimes, uncovering secrets, or unraveling suspenseful events.',
        ]);

        Genre::create([
            'name' => 'Romance',
            'description' => 'A genre that emphasizes love stories and emotional relationships between characters.',
        ]);

        Genre::create([
            'name' => 'Horror',
            'description' => 'A genre designed to evoke fear, dread, or shock, often involving supernatural or terrifying elements.',
        ]);

        Genre::create([
            'name' => 'Adventure',
            'description' => 'A genre centered on exciting journeys, exploration, and action-filled experiences.',
        ]);

    }
}
