<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $fillable = ['nama_provinsi', 'kode_provinsi', 'jumlah_kabupaten'];

    public function alamats()
    {
        return $this->hasMany(Alamat::class);
    }
}