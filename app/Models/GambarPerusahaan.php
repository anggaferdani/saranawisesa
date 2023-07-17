<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GambarPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'gambar_perusahaans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'image',
        'keterangan',
        'tanggal_publikasi',
        'catatan',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
