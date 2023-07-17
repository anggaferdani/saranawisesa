<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengalaman extends Model
{
    use HasFactory;

    protected $table = 'pengalamans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'nama_pekerjaan',
        'pemberi_pekerjaan',
        'ringkas_lingkup_pekerjaan',
        'lokasi',
        'tanggal_kontrak',
        'nilai_kontrak',
        'kontrak',
        'tanggal_selesai_berdasarkan_kontrak',
        'tanggal_selesai_berdasarkan_ba_serah_terima',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
