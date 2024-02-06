<?php

use App\Models\Faculty;
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

            $table->string('book_token');
            $table->string('book_name');
            $table->string('book_author');
            $table->string('book_serial_number')->unique();
            $table->text('book_description')->nullable();
            $table->integer('book_quantity');
            $table->text('book_image_path');
            $table->text('book_pdf_path')->nullable();
            $table->timestamp('published_at');

            $table->foreignIdFor(Faculty::class);

            $table->timestamps();
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
