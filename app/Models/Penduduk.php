<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = [
        'keluarga_id', 'nik', 'nama', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'agama', 'pekerjaan', 'status_perkawinan',
        'pendidikan', 'hubungan_keluarga'
    ];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }
}
