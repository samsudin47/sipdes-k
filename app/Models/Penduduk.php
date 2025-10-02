<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey = 'id';

    public function jenisKelamin()
    {
        return $this->belongsTo('App\Models\Sex', 'jenis_kelamin', 'id');
    }
    public function agama()
    {
        return $this->belongsTo('App\Models\Agama', 'agama', 'id');
    }
    public function pendidikanKk()
    {
        return $this->belongsTo('App\Models\PendidikanKK', 'pendidikan_kk', 'id');
    }
    public function pendidikanSedang()
    {
        return $this->belongsTo('App\Models\PendidikanSedang', 'pendidikan_sedang', 'id');
    }
    public function pekerjaan()
    {
        return $this->belongsTo('App\Models\Pekerjaan', 'pekerjaan', 'id');
    }
    public function statusKawin()
    {
        return $this->belongsTo('App\Models\StatusKawin', 'status_menikah', 'id');
    }
    public function kkLevel()
    {
        return $this->belongsTo('App\Models\KkLevel', 'kk_level', 'id');
    }
    public function wargaNegara()
    {
        return $this->belongsTo('App\Models\WargaNegara', 'warga_negara', 'id');
    }
    public function golonganDarah()
    {
        return $this->belongsTo('App\Models\GolonganDarah', 'golongan_darah', 'id');
    }
    public function jamkesnas()
    {
        return $this->belongsTo('App\Models\Jamkesnas', 'jamkesnas', 'id');
    }
    public function cacat()
    {
        return $this->belongsTo('App\Models\Cacat', 'cacat', 'id');
    }
    public function caraKb()
    {
        return $this->belongsTo('App\Models\CaraKb', 'cara_kb', 'id');
    }
    public function hamil()
    {
        return $this->belongsTo('App\Models\Hamil', 'hamil', 'id');
    }
    public function ktpEl()
    {
        return $this->belongsTo('App\Models\KtpEl', 'ktp_el', 'id');
    }
    public function statusRekam()
    {
        return $this->belongsTo('App\Models\StatusRekam', 'status_rekam', 'id');
    }
    public function statusDasar()
    {
        return $this->belongsTo('App\Models\StatusDasar', 'status_dasar', 'id');
    }
    public function asuransi()
    {
        return $this->belongsTo('App\Models\Asuransi', 'asuransi', 'id');
    }

    protected $fillable = [
        // Data Identitas
        'no_kk',
        'nik',
        'nama_lengkap',
        'alamat',
        'dusun',
        'rt',
        'rw',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',

        // Data Pendidikan & Pekerjaan
        'pendidikan_kk',
        'pendidikan_sedang',
        'pekerjaan',

        // Data Keluarga
        'status_menikah',
        'kk_level',
        'warga_negara',
        'nik_ayah',
        'nama_ayah',
        'nik_ibu',
        'nama_ibu',
        'golongan_darah',

        // Data Dokumen
        'akta_lahir',
        'dokumen_passport',
        'tanggal_akhir_passport',
        'akta_perkawinan',
        'tanggal_perkawinan',
        'akta_perceraian',
        'tanggal_perceraian',
        'dokumen_kitas',

        // Data Kesehatan & Lainnya
        'jamkesnas',
        'cacat',
        'cara_kb',
        'hamil',
        'ktp_el',
        'status_rekam',
        'status_dasar',
        'asuransi',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_akhir_passport' => 'date',
        'tanggal_perkawinan' => 'date',
        'tanggal_perceraian' => 'date',
        'jamkesnas' => 'boolean',
        'cacat' => 'boolean',
        'hamil' => 'boolean',
        'ktp_el' => 'boolean',
    ];
}
