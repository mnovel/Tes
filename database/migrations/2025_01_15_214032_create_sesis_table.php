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
        Schema::create('sesis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('peserta_id')->constrained('pesertas')->onDelete('cascade');
            $table->foreignUuid('versi_id')->constrained('versi_pertanyaans')->onDelete('cascade');
            $table->enum('status', ['Active', 'Completed'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesis');
    }
};
