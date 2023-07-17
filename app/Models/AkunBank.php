<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AkunBank extends Model
{
    use HasFactory;

    protected $table = 'akun_banks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'nama_pemilik',
        'nama_bank',
        'no_akun',
        'catatan',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
