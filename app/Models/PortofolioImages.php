<?php

namespace App\Models;

use App\Models\Portofolio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortofolioImages extends Model
{
    use HasFactory;

    protected $table = 'portofolio_images';

    protected $primaryKey = 'id';

    protected $fillable = [
        'portofolio_id',
        'image',
    ];

    public function portofolios(){
        return $this->belongsTo(Portofolio::class, 'portofolio_id');
    }
}
