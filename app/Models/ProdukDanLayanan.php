<?php

namespace App\Models;

use App\Models\SubprodukDanLayanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukDanLayanan extends Model
{
    use HasFactory;

    protected $table = 'produk_dan_layanans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'deskripsi',
        'thumbnail',
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

    public function subproduk_dan_layanans(){
        return $this->hasMany(SubprodukDanLayanan::class);
    }
}
