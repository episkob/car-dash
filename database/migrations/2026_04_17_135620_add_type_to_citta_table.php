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
        Schema::table('citta', function (Blueprint $table) {
            $table->enum('type', ['città', 'frazione'])->default('città')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citta', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
