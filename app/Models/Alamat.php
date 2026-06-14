<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $fillable = ['provinsi_id', 'kabupaten', 'kecamatan', 'desa', 'rt', 'rw', 'detail_alamat'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function keluargas()
    {
        return $this->hasMany(Keluarga::class);
    }
}
