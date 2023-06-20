<?php

namespace App\Models;

use App\Models\SubprodukDanLayanan;
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
    ];

    public function subproduk_dan_layanans(){
        return $this->hasMany(SubprodukDanLayanan::class);
    }
}
