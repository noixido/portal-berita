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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();

            $table->string('judul');
            $table->string('slug');
            $table->text('deskripsi');
            $table->string('thumbnail')->nullable();
            $table->bigInteger('kategori_id');
            $table->string('status_berita');
            $table->string('status_publish');
            $table->integer('views');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
