<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'pengadaans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kode_pengadaan',
        'nama_pengadaan',
        'jenis_pengadaan',
        'hps',
        'tanggal_mulai_pengadaan',
        'tanggal_akhir_pengadaan',
        'status_aktif',
        'created_by',
        'updated_by',
    ];

    protected static function booted(){
        static::creating(function($model){
            $model->created_by = Auth::user()->email;
            $model->updated_by = Auth::user()->email;
        });

        static::saving(function($model){
            $model->updated_by = Auth::user()->email;
        });
    }
}
