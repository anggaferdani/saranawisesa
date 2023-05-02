<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komisaris extends Model
{
    use HasFactory;

    protected $table = 'komisaris';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_komisaris',
        'komisaris',
        'jabatan_komisaris',
        'pendapat_komisaris',
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
