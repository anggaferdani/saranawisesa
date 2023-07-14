<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeteranganDomisiliPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_domisili_perusahaans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'no_dokumen',
        'no_skdp',
        'tanggal_terbit',
        'tanggal_jatuh_tempo',
        'skdp',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
