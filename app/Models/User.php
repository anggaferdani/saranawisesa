<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Lelang;
use App\Models\Lampiran;
use App\Models\Perusahaan;
use App\Models\VerifyEmail;
use App\Models\Administrasi;
use App\Models\DataPersonalia;
use App\Models\TandaDaftarUsaha;
use Laravel\Sanctum\HasApiTokens;
use App\Models\PengurusBadanUsaha;
use Illuminate\Support\Facades\Auth;
use App\Models\AktaPendirianPerusahaan;
use App\Models\SusunanKepemilikanSaham;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_panjang',
        'email',
        'status_verifikasi',
        'status_verifikasi2',
        'email_verified_at',
        'password',
        'level',
        'status_aktif',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
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
        return $this->belongsToMany(Lelang::class, 'user_lelangs', 'user_id', 'lelang_id');
    }

    public function lelangs2(){
        return $this->hasMany(Lelang::class);
    }

    public function perusahaans(){
        return $this->hasMany(Perusahaan::class);
    }

    public function lampirans(){
        return $this->hasMany(Lampiran::class);
    }

    public function verify_emails(){
        return $this->hasMany(VerifyEmail::class);
    }










    public function administrasis(){
        return $this->hasMany(Administrasi::class);
    }
    public function akta_pendirian_perusahaans(){
        return $this->hasMany(AktaPendirianPerusahaan::class);
    }
    public function pengurus_badan_usahas(){
        return $this->hasMany(PengurusBadanUsaha::class);
    }
    public function tanda_daftar_usahas(){
        return $this->hasMany(TandaDaftarUsaha::class);
    }
    public function susunan_kepemilikan_sahams(){
        return $this->hasMany(SusunanKepemilikanSaham::class);
    }
    public function data_personalias(){
        return $this->hasMany(DataPersonalia::class);
    }
}
