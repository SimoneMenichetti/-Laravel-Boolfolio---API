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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title', 100);
            $table->string('slug', 255)->unique();
            $table->string('topic');
            $table->timestamp('published_at')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('number_of_posts');
            $table->text('collaborators');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
