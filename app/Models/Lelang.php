<?php

namespace App\Models;

use App\Models\Lampiran;
use App\Models\JadwalLelang;
use App\Models\LampiranPengadaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdditionalLampiranPengadaan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lelang extends Model
{
    use HasFactory;

    protected $table = 'lelangs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kode_lelang',
        'jenis_pengadaan_id',
        'nama_lelang',
        'uraian_singkat_pekerjaan',
        'tanggal_mulai_lelang',
        'tanggal_akhir_lelang',
        'jenis_kontrak',
        'lokasi_pekerjaan',
        'hps',
        'syarat_kualifikasi',
        'lampiran_pengadaan',
        'status_pengadaan',
        'status_aktif',
        'created_by',
        'updated_by',
    ];

    protected static function booted(){
        static::creating(function($model){
            $model->created_by = Auth::id();
            $model->updated_by = Auth::id();
        });

        static::saving(function($model){
            $model->updated_by = Auth::id();
        });
    }

    public function jadwal_lelangs(){
        return $this->hasMany(JadwalLelang::class);
    }

    public function lampiran_pengadaans(){
        return $this->hasMany(LampiranPengadaan::class);
    }

    public function jenis_pengadaans(){
        return $this->belongsTo(JenisPengadaan::class, 'jenis_pengadaan_id');
    }

    public function perusahaans(){
        return $this->hasMany(Perusahaan::class);
    }

    public function lampirans(){
        return $this->hasMany(Lampiran::class);
    }
}
