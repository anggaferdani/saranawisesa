<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratIzinUsahaPerdagangan extends Model
{
    use HasFactory;

    protected $table = 'surat_izin_usaha_perdagangans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'kode_dokumen',
        'no_siup',
        'tanggal_terbit',
        'tanggal_jatuh_tempo',
        'siup',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
