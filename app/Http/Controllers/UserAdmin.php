<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAdmin extends Controller
{
    //
    public function Teknisi()
    {
        return view('teknisi', [
            "title" => "Data Teknisi"
        ]);
    }

    public function Aplikasi()
    {

        return view('aplikasi', [
            "title" => "Data Aplikasi"
        ]);
    }

    public function Perusahaan()
    {
        return view('perusahaan', [
            "title" => "Data Nama Perusahaan"
        ]);
    }
}
