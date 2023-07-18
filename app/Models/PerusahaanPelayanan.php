<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerusahaanPelayanan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan_pelayanans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'perusahaan_id',
        'pelayanan_id',
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
}
