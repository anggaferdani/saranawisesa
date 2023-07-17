<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AktaPendirian extends Model
{
    use HasFactory;

    protected $table = 'akta_pendirians';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'kode_dokumen',
        'no_akta',
        'tanggal_akta',
        'nama_notaris',
        'no_sk',
        'tanggal_sk',
        'akta',
        'sk',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
