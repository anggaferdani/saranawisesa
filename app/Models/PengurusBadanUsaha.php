<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusBadanUsaha extends Model
{
    use HasFactory;

    protected $table = 'pengurus_badan_usahas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'nama_pengurus_badan_usaha',
        'no_ktp_paspor_keterangan_domisili_tinggal',
        'jabatan',
        'jabatan_pengurus_badan_usaha',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
