<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Lelang;
use App\Models\AkunBank;
use App\Models\Lampiran;
use App\Models\Pengalaman;
use App\Models\Perusahaan;
use App\Models\VerifyEmail;
use App\Models\Administrasi;
use App\Models\AktaPendirian;
use App\Models\DataFasilitas;
use App\Models\DataPersonalia;
use App\Models\GambarPerusahaan;
use App\Models\TandaDaftarUsaha;
use Laravel\Sanctum\HasApiTokens;
use App\Models\NomorIndukBerusaha;
use App\Models\PengurusBadanUsaha;
use App\Models\StrukturOrganisasi;
use App\Models\LampiranKualifikasi;
use App\Models\NomorPokokWajibPajak;
use App\Models\PengalamanPerusahaan;
use App\Models\SuratIzinOperasional;
use Illuminate\Support\Facades\Auth;
use App\Models\AktaPendirianPerusahaan;
use App\Models\SusunanKepemilikanSaham;
use Illuminate\Notifications\Notifiable;
use App\Models\SuratIzinUsahaPerdagangan;
use App\Models\SuratKeteranganDomisiliPerusahaan;
use App\Models\SuratPengukuhanPerusahaanKenaPajak;
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






    
    public function akta_pendirians(){
        return $this->hasMany(AktaPendirian::class);
    }
    public function surat_keterangan_domisili_perusahaans(){
        return $this->hasMany(SuratKeteranganDomisiliPerusahaan::class);
    }
    public function surat_izin_usaha_perdagangans(){
        return $this->hasMany(SuratIzinUsahaPerdagangan::class);
    }
    public function nomor_induk_berusahas(){
        return $this->hasMany(NomorIndukBerusaha::class);
    }
    public function nomor_pokok_wajib_pajaks(){
        return $this->hasMany(NomorPokokWajibPajak::class);
    }
    public function surat_pengukuhan_perusahaan_kena_pajaks(){
        return $this->hasMany(SuratPengukuhanPerusahaanKenaPajak::class);
    }
    public function surat_izin_operasionals(){
        return $this->hasMany(SuratIzinOperasional::class);
    }
    public function akun_banks(){
        return $this->hasMany(AkunBank::class);
    }
    public function pengalamans(){
        return $this->hasMany(Pengalaman::class);
    }
    public function struktur_organisasis(){
        return $this->hasMany(StrukturOrganisasi::class);
    }
    public function gambar_perusahaans(){
        return $this->hasMany(GambarPerusahaan::class);
    }
}
