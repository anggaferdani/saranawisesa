<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataFasilitas extends Model
{
    use HasFactory;

    protected $table = 'data_fasilitas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'jenis',
        'jumlah',
        'kapasitas_pada_saat_ini',
        'merek_dan_tipe',
        'tahun_pembuatan',
        'kondisi',
        'lokasi',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
