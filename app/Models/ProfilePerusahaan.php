<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePerusahaan extends Model
{
    use HasFactory;

    protected $table = 'profile_perusahaans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'sejarah_perusahaan',
        'visi',
        'misi',
    ];
}
