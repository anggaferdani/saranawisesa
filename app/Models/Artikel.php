<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'judul_artikel',
        'thumbnail',
        'tanggal_publikasi',
        'isi_artikel',
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
