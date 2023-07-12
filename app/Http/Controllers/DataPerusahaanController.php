<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataPerusahaanController extends Controller
{
    public function dokumen(){
        return view('eproc.dokumen');
    }
}
