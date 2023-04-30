<?php

namespace App\Models;

use App\Models\Lelang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdditionalLampiranPengadaan extends Model
{
    use HasFactory;

    protected $table = 'additional_lampiran_pengadaans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'lelang_id',
        'nama_perusahaan',
        'email_perusahaan',
        'alamat_perusahaan',
        'pengajuan_anggaran',
    ];

    public function lelangs(){
        return $this->belongsTo(Lelang::class, 'lelang_id');
    }
}
