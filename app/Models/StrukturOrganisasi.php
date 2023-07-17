<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'posisi',
        'nama',
        'no_ktp',
        'ktp',
        'no_npwp',
        'npwp',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
