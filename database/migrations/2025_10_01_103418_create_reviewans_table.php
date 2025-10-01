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
        Schema::create('reviewans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('kode_review', 5);
            $table->string('deskripsi', 255);
            $table->boolean('rekomendasi');
            $table->foreignId('produks_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewans');
    }
};
