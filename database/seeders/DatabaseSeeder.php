<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Alamat;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User Admin
        User::create([
            'name' => 'Admin Desa',
            'email' => 'admin@desa.com',
            'password' => Hash::make('password'),
        ]);

        // Provinsi
        $papua = Provinsi::create(['nama_provinsi' => 'Papua', 'kode_provinsi' => '94', 'jumlah_kabupaten' => 29]);
        $papuaBarat = Provinsi::create(['nama_provinsi' => 'Papua Barat', 'kode_provinsi' => '91', 'jumlah_kabupaten' => 13]);
        $maluku = Provinsi::create(['nama_provinsi' => 'Maluku', 'kode_provinsi' => '81', 'jumlah_kabupaten' => 11]);

        // Alamat
        $alamat1 = Alamat::create([
            'provinsi_id' => $papua->id,
            'kabupaten' => 'Kota Jayapura',
            'kecamatan' => 'Abepura',
            'desa' => 'Vim',
            'rt' => '002',
            'rw' => '001',
            'detail_alamat' => 'Jl. Raya Abepura No. 10'
        ]);

        $alamat2 = Alamat::create([
            'provinsi_id' => $papua->id,
            'kabupaten' => 'Kota Jayapura',
            'kecamatan' => 'Jayapura Utara',
            'desa' => 'Angkasapura',
            'rt' => '001',
            'rw' => '003',
            'detail_alamat' => 'Jl. Percetakan No. 5'
        ]);

        $alamat3 = Alamat::create([
            'provinsi_id' => $papuaBarat->id,
            'kabupaten' => 'Manokwari',
            'kecamatan' => 'Manokwari Barat',
            'desa' => 'Sanggeng',
            'rt' => '003',
            'rw' => '002',
            'detail_alamat' => 'Jl. Trikora No. 8'
        ]);

        // Keluarga
        $kel1 = Keluarga::create([
            'alamat_id' => $alamat1->id,
            'no_kk' => '9401010101000001',
            'kepala_keluarga' => 'Yohanes Wambrauw',
            'jumlah_anggota' => 4,
            'status_ekonomi' => 'Mampu'
        ]);

        $kel2 = Keluarga::create([
            'alamat_id' => $alamat2->id,
            'no_kk' => '9401010201000002',
            'kepala_keluarga' => 'Marthen Sroyer',
            'jumlah_anggota' => 3,
            'status_ekonomi' => 'Menengah'
        ]);

        $kel3 = Keluarga::create([
            'alamat_id' => $alamat3->id,
            'no_kk' => '9102010301000003',
            'kepala_keluarga' => 'Agus Rumbekwan',
            'jumlah_anggota' => 5,
            'status_ekonomi' => 'Menengah'
        ]);

        // Penduduk Keluarga 1
        Penduduk::create([
            'keluarga_id' => $kel1->id, 'nik' => '9401010101000011',
            'nama' => 'Yohanes Wambrauw', 'tempat_lahir' => 'Jayapura',
            'tanggal_lahir' => '1980-05-15', 'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Kristen', 'pekerjaan' => 'PNS',
            'status_perkawinan' => 'Kawin', 'pendidikan' => 'S1',
            'hubungan_keluarga' => 'Kepala Keluarga'
        ]);
        Penduduk::create([
            'keluarga_id' => $kel1->id, 'nik' => '9401010101000012',
            'nama' => 'Maria Wambrauw', 'tempat_lahir' => 'Jayapura',
            'tanggal_lahir' => '1983-08-20', 'jenis_kelamin' => 'Perempuan',
            'agama' => 'Kristen', 'pekerjaan' => 'Guru',
            'status_perkawinan' => 'Kawin', 'pendidikan' => 'S1',
            'hubungan_keluarga' => 'Istri'
        ]);
        Penduduk::create([
            'keluarga_id' => $kel1->id, 'nik' => '9401010101000013',
            'nama' => 'Daniel Wambrauw', 'tempat_lahir' => 'Jayapura',
            'tanggal_lahir' => '2005-03-10', 'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Kristen', 'pekerjaan' => 'Pelajar',
            'status_perkawinan' => 'Belum Kawin', 'pendidikan' => 'SMA',
            'hubungan_keluarga' => 'Anak'
        ]);

        // Penduduk Keluarga 2
        Penduduk::create([
            'keluarga_id' => $kel2->id, 'nik' => '9401010201000021',
            'nama' => 'Marthen Sroyer', 'tempat_lahir' => 'Biak',
            'tanggal_lahir' => '1975-11-25', 'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Kristen', 'pekerjaan' => 'Wiraswasta',
            'status_perkawinan' => 'Kawin', 'pendidikan' => 'SMA',
            'hubungan_keluarga' => 'Kepala Keluarga'
        ]);
        Penduduk::create([
            'keluarga_id' => $kel2->id, 'nik' => '9401010201000022',
            'nama' => 'Selvi Sroyer', 'tempat_lahir' => 'Jayapura',
            'tanggal_lahir' => '1978-04-12', 'jenis_kelamin' => 'Perempuan',
            'agama' => 'Kristen', 'pekerjaan' => 'Ibu Rumah Tangga',
            'status_perkawinan' => 'Kawin', 'pendidikan' => 'SMP',
            'hubungan_keluarga' => 'Istri'
        ]);

        // Penduduk Keluarga 3
        Penduduk::create([
            'keluarga_id' => $kel3->id, 'nik' => '9102010301000031',
            'nama' => 'Agus Rumbekwan', 'tempat_lahir' => 'Manokwari',
            'tanggal_lahir' => '1970-01-05', 'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam', 'pekerjaan' => 'Nelayan',
            'status_perkawinan' => 'Kawin', 'pendidikan' => 'SD',
            'hubungan_keluarga' => 'Kepala Keluarga'
        ]);
        Penduduk::create([
            'keluarga_id' => $kel3->id, 'nik' => '9102010301000032',
            'nama' => 'Fatimah Rumbekwan', 'tempat_lahir' => 'Manokwari',
            'tanggal_lahir' => '1975-06-18', 'jenis_kelamin' => 'Perempuan',
            'agama' => 'Islam', 'pekerjaan' => 'Pedagang',
            'status_perkawinan' => 'Kawin', 'pendidikan' => 'SMP',
            'hubungan_keluarga' => 'Istri'
        ]);
    }
}
