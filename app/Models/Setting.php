<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_perusahaan',
        'no_telepon_perusahaan',
        'email_perusahaan',
        'alamat_perusahaan',
        'instagram',
        'facebook',
        'twitter',
        'youtube',
    ];
}
