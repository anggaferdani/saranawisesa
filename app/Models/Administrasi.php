<?php

namespace App\Models;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrasi extends Model
{
    use HasFactory;

    protected $table = 'administrasis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'perusahaan_id',
    ];

    public function perusahaans(){
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }
}
