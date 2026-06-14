<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alamat_id')->constrained('alamats')->onDelete('cascade');
            $table->string('no_kk', 16)->unique();
            $table->string('kepala_keluarga');
            $table->integer('jumlah_anggota')->default(1);
            $table->enum('status_ekonomi', ['Mampu', 'Menengah', 'Kurang Mampu'])->default('Menengah');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keluargas');
    }
};
