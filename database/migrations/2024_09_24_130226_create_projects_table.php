<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Project;
use App\Models\Type;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            // Aggiungi la colonna per il percorso dell'immagine
            $table->string('path_image')->nullable();

            // Aggiungi la colonna per il nome originale dell'immagine
            $table->string('image_original_name')->nullable();
            $table->string('slug')->unique();
            // campo per la chiave
            $table->unsignedBigInteger('type_id')->nullable();
            $table->timestamps();

            // inserisco la chiave
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
