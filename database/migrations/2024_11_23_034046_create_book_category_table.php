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
        Schema::create('books_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('books_id');
            $table->unsignedBigInteger('categories_id');
            $table->timestamps();

            $table->foreign('books_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_category');
    }
};
