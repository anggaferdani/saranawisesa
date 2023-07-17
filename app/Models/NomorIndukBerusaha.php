<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NomorIndukBerusaha extends Model
{
    use HasFactory;

    protected $table = 'nomor_induk_berusahas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'kode_dokumen',
        'tanggal_terbit',
        'nib',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
