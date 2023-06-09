<?php

namespace App\Models;

use App\Models\PortofolioImages;
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
            $model->created_by = Auth::id();
            $model->updated_by = Auth::id();
        });

        static::saving(function($model){
            $model->updated_by = Auth::id();
        });
    }

    public function portofolio_images(){
        return $this->hasMany(PortofolioImages::class);
    }
}
