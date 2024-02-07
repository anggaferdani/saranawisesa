<?php

namespace App\Imports;

use App\Models\Berita;
use Maatwebsite\Excel\Concerns\ToModel;

class BeritaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Berita([
            'judul_berita' => $row[0],
            'thumbnail' => 'null',
            'tanggal_publikasi' => date('Y-m-d'),
            'isi_berita' => $row[1],
            'created_by' => $row[2] ?? 1,
        ]);
    }
}
