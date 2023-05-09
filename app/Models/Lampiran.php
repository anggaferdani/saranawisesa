<?php

namespace App\Models;

use App\Models\Lelang;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lampiran extends Model
{
    use HasFactory;

    protected $table = 'lampirans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'lelang_id',
        'perusahaan_id',
        'penawaran',
        'konsep',
        'penawaran_dan_konsep',
        'status_aktif',
        'created_by',
        'updated_by',
    ];

    protected static function booted(){
        static::creating(function($model){
            $model->created_by = Auth::id();
            $model->updated_by = Auth::id();
        });

        static::saving(function($model){
            $model->updated_by = Auth::id();
        });
    }

    public function lelangs(){
        return $this->belongsTo(Lelang::class, 'lelang_id');
    }

    public function perusahaans(){
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }
}
