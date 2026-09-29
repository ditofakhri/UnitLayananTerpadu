<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
  protected $fillable = [
    'nama_tamu',
    'instansi',
    'no_hp',
    'kebutuhan',
    'keterangan',
    'tanggal'
  ];
  public function getTanggalFormattedAttribute()
{
    return \Carbon\Carbon::parse($this->tanggal)->format('d/m/Y');
}

}
