<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SisaKemampuanNyata extends Model
{
    use HasFactory;

    protected $table = 'sisa_kemampuan_nyatas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'kekayaan_bersih',
        'modal_kerja',
        'kemampuan_nyata',
        'sisa_kemampuan_nyata',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
