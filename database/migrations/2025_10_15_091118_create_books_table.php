<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255); 
            $table->text('description'); 
            $table->decimal('price', 10, 2); 
            $table->integer('stock'); 
            $table->string('cover_photo', 255); 

            // Foreign key: genre_id -> genres(id)
            $table->foreignId('genre_id')
                  ->constrained('genres')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            // Foreign key: author_id -> authors(id)
            $table->foreignId('author_id')
                  ->constrained('authors')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

                  
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
