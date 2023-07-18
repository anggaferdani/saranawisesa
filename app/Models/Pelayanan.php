<?php

namespace App\Models;

use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelayanan extends Model
{
    use HasFactory;

    protected $table = 'pelayanans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'pelayanan',
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

    public function perusahaans(){
        return $this->belongsToMany(Perusahaan::class, 'perusahaan_pelayanans', 'pelayanan_id', 'perusahaan_id');
    }
}
