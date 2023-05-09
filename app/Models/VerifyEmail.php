<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VerifyEmail extends Model
{
    use HasFactory;

    protected $table = 'verify_emails';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'token',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
