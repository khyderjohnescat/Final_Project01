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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title_name');
            $table->string('author');
            $table->text('content');
            $table->date('published_date');
            $table->json('photo')->nullable(); // JSON type
            $table->unsignedBigInteger('user_id'); // Relation user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relation user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
