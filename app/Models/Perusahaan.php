<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pelayanan;
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
        'user_id',
        'profile_picture',
        'nama_badan_usaha',
        'deskripsi',
        'email_badan_usaha',
        'alamat_badan_usaha',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pelayanans(){
        return $this->belongsToMany(Pelayanan::class, 'perusahaan_pelayanans', 'perusahaan_id', 'pelayanan_id');
    }
}
