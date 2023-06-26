<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengalamanPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'pengalaman_perusahaans';

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
        'status_penyedia_pekerjaan',
        'tanggal_selesai_berdasarkan_kontrak',
        'tanggal_selesai_berdasarkan_ba_serah_terima',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
