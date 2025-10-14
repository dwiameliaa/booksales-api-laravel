<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model disini berarti adalah kelas parent, dan Book adalah kelas anak
// kelas Book ini melakukan inheritance dari kelas Model
class Book extends Model
{
    // karena berkaitan dengan data sebaiknya ditulis sebagai private (akses modifier) supaya datanya aman

    // membuat array multidimensi
    private $books = [
        // array asosiatif karena ada key dan value
        [
            // key => value
            'title' => 'Pulang',
            'description' => 'Petualangan seorang pemuda yang kembali ke desa kelahirannya',
            'price' => 40000,
            'stock' => 15,
            'cover_photo' => 'pulang.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ],
        [
            'title' => 'Sebuah Seni untuk Bersikap Bodo Amat',
            'description' => 'Buku yang membahas tentang kehidupan dan filosofi hidup seseorang.',
            'price' => 60000,
            'stock' => 5,
            'cover_photo' => 'sebuah_seni.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ],
        [
            'title' => 'Naruto',
            'description' => 'Buku yang membahas tentang jalan ninja seseorang.',
            'price' => 100000,
            'stock' => 55,
            'cover_photo' => 'naruto.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ],
    ];

    // karena di set sebagai private maka data buku tidak bisa langsung dikirim ke bagian controller
    
    // maka harus dibuat method 
    public function getBooks()
    {
        return $this->books; // ini untuk mengirim data-data buku
    }
}
