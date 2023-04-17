<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolios';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'judul_portofolio',
        'portofolio',
        'alamat_portofolio',
        'isi_portofolio',
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
