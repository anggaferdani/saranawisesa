<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LampiranKualifikasi extends Model
{
    use HasFactory;

    protected $table = 'lampiran_kualifikasis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'bukti_kepemilikan_tempat_usaha',
        'surat_izin_usaha',
        'surat_izin_lainnya',
        'bukti_laporan_pajak_tahun_terakhir',
        'bukti_status_kepemilikan_fasilitas',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
