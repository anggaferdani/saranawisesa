<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorPokokWajibPajak extends Model
{
    use HasFactory;

    protected $table = 'nomor_pokok_wajib_pajaks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'kode_dokumen',
        'npwp',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
