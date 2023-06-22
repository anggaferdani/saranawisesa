<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrasi extends Model
{
    use HasFactory;

    protected $table = 'administrasis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'nama_badan_usaha',
        'status_badan_usaha',
        'alamat_badan_usaha',
        'no_telepon_badan_usaha',
        'email_badan_usaha',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
