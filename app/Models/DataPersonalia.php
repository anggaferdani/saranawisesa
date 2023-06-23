<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPersonalia extends Model
{
    use HasFactory;

    protected $table = 'data_personalias';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'nama',
        'tanggal_lahir',
        'jabatan',
        'pengalaman_kerja',
        'profesi_keahlian',
        'tahun_sertifikat_ijazah',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
