<?php

namespace App\Models;

use App\Models\Lelang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisPengadaan extends Model
{
    use HasFactory;

    protected $table = 'jenis_pengadaans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'jenis_pengadaan',
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
}
