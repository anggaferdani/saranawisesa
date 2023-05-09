<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lelang;
use App\Models\Lampiran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'lelang_id',
        'user_id',
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

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lampirans(){
        return $this->hasMany(Lampiran::class);
    }
}
