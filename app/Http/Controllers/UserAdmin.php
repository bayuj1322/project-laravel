<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAdmin extends Controller
{
    //
    public function TeknisiView()
    {
        return view('dashboard.AdminTeknisi', [
            "title" => "Data Teknisi"
        ]);
    }

    public function AplikasiView()
    {
        return view('dashboard.AdminAplikasi', [
            "title" => "Data Aplikasi"
        ]);
    }

    public function PerusahaanView()
    {
        return view('dashboard.AdminPerusahaan', [
            "title" => "Data Nama Perusahaan"
        ]);
    }
}
