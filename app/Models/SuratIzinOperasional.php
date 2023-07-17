<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratIzinOperasional extends Model
{
    use HasFactory;

    protected $table = 'surat_izin_operasionals';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'kode_dokumen',
        'nama_sio',
        'no_sio',
        'tanggal_terbit',
        'tanggal_jatuh_tempo',
        'penerbit_sio',
        'sio',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
