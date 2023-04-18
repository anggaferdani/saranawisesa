<?php

namespace App\Imports;

use App\Models\Artikel;
use Maatwebsite\Excel\Concerns\ToModel;

class ArtikelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Artikel([
            'judul_artikel' => $row[1],
            'thumbnail' => 'null',
            'tanggal_publikasi' => date('Y-m-d'),
            'isi_artikel' => $row[2],
            'created_by' => $row[3],
        ]);
    }
}
