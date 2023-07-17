<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratPengukuhanPerusahaanKenaPajak extends Model
{
    use HasFactory;

    protected $table = 'surat_pengukuhan_perusahaan_kena_pajaks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'kode_dokumen',
        'no_sppkp',
        'tanggal_terbit',
        'sppkp',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
