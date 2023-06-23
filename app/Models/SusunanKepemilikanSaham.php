<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SusunanKepemilikanSaham extends Model
{
    use HasFactory;

    protected $table = 'susunan_kepemilikan_sahams';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'nama_pemilik_saham',
        'no_ktp_paspor_keterangan_domisili_tinggal_pemilik_saham',
        'alamat_pemilik_saham',
        'persentase_kepemilikan_saham',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
