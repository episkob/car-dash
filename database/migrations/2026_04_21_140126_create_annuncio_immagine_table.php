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
        Schema::create('annuncio_immagine', function (Blueprint $table) {
            $table->foreignId('annuncio_id')->constrained('annunci')->cascadeOnDelete();
            $table->foreignId('immagine_id')->constrained('immagini')->cascadeOnDelete();
            $table->primary(['annuncio_id', 'immagine_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annuncio_immagine');
    }
};
