<?php

namespace App\Models;

use App\Models\Lelang;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemenang extends Model
{
    use HasFactory;

    protected $table = 'pemenangs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'lelang_id',
        'perusahaan_id',
    ];

    public function lelangs(){
        return $this->belongsTo(Lelang::class, 'lelang_id');
    }
    
    public function perusahaans(){
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }
}
