<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaDaftarUsaha extends Model
{
    use HasFactory;

    protected $table = 'tanda_daftar_usahas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'masa_berlaku_izin_usaha',
        'instansi_pemberi_izin_usaha',
        'no_tanda_daftar_usaha',
        'kualifikasi_usaha',
        'klasifikasi_usaha',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
