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
        Schema::create('user_histories', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('old_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->foreignIdFor(Faculty::class)->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('library_card', 2048)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_histories');
    }
};
