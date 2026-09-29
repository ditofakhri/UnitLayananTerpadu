<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('log_penjagas', function (Blueprint $table) {
            $table->dateTime('waktu')->nullable()->after('tanggal');
            $table->index('waktu');
        });
    }

    public function down(): void
    {
        Schema::table('log_penjagas', function (Blueprint $table) {
            $table->dropIndex(['waktu']);
            $table->dropColumn('waktu');
        });
    }
};
