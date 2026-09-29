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
    Schema::create('tamus', function (Blueprint $table) {
        $table->id();
        $table->string('nama_tamu', 120);
        $table->string('instansi', 160)->nullable();
        $table->string('no_hp', 30)->nullable();

        // simpan kode pilihan dropdown agar konsisten
        $table->string('kebutuhan', 50);

        // untuk isi bebas jika kebutuhan = 'keterangan'
        $table->text('keterangan')->nullable();

        $table->date('tanggal');
        $table->timestamps();

        $table->index('tanggal');
        $table->index('kebutuhan');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamus');
    }
};
