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
        Schema::table('annunci', function (Blueprint $table) {
            $table->foreignId('citta_id')->nullable()->constrained('citta')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('annunci', function (Blueprint $table) {
            $table->dropForeign(['citta_id']);
            $table->dropColumn('citta_id');
        });
    }
};
