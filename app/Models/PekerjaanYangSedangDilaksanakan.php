<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanYangSedangDilaksanakan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_yang_sedang_dilaksanakans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'nama_paket_pekerjaan',
        'kelompok',
        'ringkas_lingkup_paket_pekerjaan',
        'lokasi',
        'nama_pemberi_pekerjaan',
        'alamat_pemberi_pekerjaan',
        'tanggal_kontrak',
        'nilai_kontrak',
        'progres_terakhir_berdasarkan_kontrak',
        'progres_terakhir_berdasarkan_prestasi_kerja',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
