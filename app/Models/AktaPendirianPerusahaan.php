<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaPendirianPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'akta_pendirian_perusahaans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'no_pengesahan',
        'tanggal_pengesahan',
        'nama_notaris',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
