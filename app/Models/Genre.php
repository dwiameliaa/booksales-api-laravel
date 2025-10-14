<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres =
        [
            [
                'id' => 1,
                'name' => 'Fiction',
                'description' => 'A literary work based on the imagination and not necessarily on fact.',
            ],
            [
                'id' => 2,
                'name' => 'Non-Fiction',
                'description' => 'A literary work based on facts and real events.',
            ],
            [
                'id' => 3,
                'name' => 'Science Fiction',
                'description' => 'A genre that deals with imagination and futuristic concepts.',
            ],
            [
                'id' => 4,
                'name' => 'Fantasy',
                'description' => 'A genre that features magical elements, mythical creatures, or supernatural settings.',
            ],
            [
                'id' => 5,
                'name' => 'Mystery',
                'description' => 'A genre focused on solving crimes, uncovering secrets, or unraveling suspenseful events.',
            ],
            [
                'id' => 6,
                'name' => 'Romance',
                'description' => 'A genre that emphasizes love stories and emotional relationships between characters.',
            ],
            [
                'id' => 7,
                'name' => 'Horror',
                'description' => 'A genre designed to evoke fear, dread, or shock, often involving supernatural or terrifying elements.',
            ],
            [
                'id' => 9,
                'name' => 'Adventure',
                'description' => 'A genre centered on exciting journeys, exploration, and action-filled experiences.',
            ],
        ];

    public function getGenres()
    {
        return $this->genres;
    }

}
