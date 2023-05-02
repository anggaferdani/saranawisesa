<?php

namespace App\Models;

use App\Models\Lelang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LampiranPengadaan extends Model
{
    use HasFactory;

    protected $table = 'lampiran_pengadaans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'lelang_id',
        'nama_perusahaan',
        'email_perusahaan',
        'alamat_perusahaan',
        'pengajuan_anggaran',
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
}
