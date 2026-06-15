<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $fillable = ['alamat_id', 'no_kk', 'kepala_keluarga', 'jumlah_anggota', 'status_ekonomi'];

    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class);
    }

    public function syncJumlahAnggota(): void
    {
        $this->update(['jumlah_anggota' => $this->penduduks()->count()]);
    }
}