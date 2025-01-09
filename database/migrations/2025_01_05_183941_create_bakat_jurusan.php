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
        Schema::create('bakat_jurusan', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('bakat_id')->constrained()->onDelete('restrict');
            $table->foreignId('jurusan_id')->constrained()->onDelete('cascade');
            // $table->foreign('bakat_id')->references('id')->on('bakats')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bakat_jurusan');
    }
};
