<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLelang extends Model
{
    use HasFactory;

    protected $table = 'user_lelangs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'lelang_id',
        'user_id',
    ];
}
