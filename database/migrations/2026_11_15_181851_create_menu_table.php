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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->enum('kategori', ['Food', 'Drink']);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 12, 2);
            $table->string('alergen')->nullable();
            $table->enum('status_halal', ['Halal', 'Non-Halal']);
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
