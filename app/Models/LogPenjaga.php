<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogPenjaga extends Model
{
    protected $fillable = [
        'nama_penjaga', 'tanggal', 'aktivitas', 'lampiran_path'
      ];
}
