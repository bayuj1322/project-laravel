<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserAdmin extends Controller
{
    function AdminView()
    {
        return view('dashboard.AdminHome', [
            "title" => "Nama Perusahaan"
        ]);
    }

    function UserView()
    {
        return view('dashboard.AdminUser', [
            "title" => "Data User"
        ]);
    }

    public function TeknisiView()
    {
        return view('dashboard.AdminTeknisi', [
            "title" => "Data Teknisi",
            "tks" => User::where("access", "teknisi")
                ->orderBy("name", "desc")
                ->get(),
            "prshs" => Perusahaan::orderBy("pr_name", "desc")
                ->get(),
            "apks" => Aplikasi::orderBy("apk_name", "desc")
                ->get()
        ]);
    }

    public function AplikasiView()
    {
        return view('dashboard.AdminAplikasi', [
            "title" => "Data Aplikasi",
            "apks" => Aplikasi::orderBy("apk_name", "desc")
                ->get()
        ]);
    }

    function AplikasiAdd(Request $request)
    {

        $imgn = Str::random(15) . '.png';
        Image::make($request->file('i0'))
            ->fit(128, 128)
            ->save('./storage/aplikasi/' . $imgn);

        Aplikasi::create([
            "apk_id" => Str::random(15),
            "apk_img" => $imgn,
            "apk_name" => $request->i1,
            "apk_url" => $request->i2,
            "apk_desc" => $request->i3
        ]);

        return back()->with([
            "success" => "Berhasil Menambah Data!"
        ]);
    }

    public function PerusahaanView()
    {
        return view('dashboard.AdminPerusahaan', [
            "title" => "Data Nama Perusahaan",
            "prshs" => Perusahaan::orderBy("pr_name", "desc")
                ->paginate(10)
        ]);
    }

    function PerusahaanAdd(Request $request)
    {
        Perusahaan::create([
            "pr_id" => Str::random(15),
            "pr_name" => $request->i1,
            "pr_url" => $request->i2
        ]);

        return back()->with([
            "success" => "Berhasil Menambah Data!"
        ]);
    }
}
