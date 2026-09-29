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
    Schema::create('log_penjagas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_penjaga', 120);
        $table->date('tanggal');
        $table->text('aktivitas');
        $table->string('lampiran_path')->nullable(); // simpan path foto
        $table->timestamps();

        $table->index('tanggal');
        $table->index('nama_penjaga');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_penjagas');
    }
};
