<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use App\Models\Perusahaan;
use App\Models\User;
use App\Models\Teknisi;
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
            "title" => "Data User",
            "usr" => User::orderBy("id", "asc")
                ->get()
        ]);
    }

    function UserAdd(Request $request)
    {

        User::create([
            "uid" => Str::random(15),
            "name" => $request->name,
            "email" => $request->email,
            "access" => $request->access,
            "password" => $request->password
        ]);

        return back()->with([
            "success" => "Berhasil Menambah Data!"
        ]);
    }

    public function TeknisiView()
    {
        return view('dashboard.AdminTeknisi', [
            "title" => "Data Teknisi",
            "tk" => Teknisi::orderBy("id", "asc")
                ->get(),
            "tks" => User::where("access", "teknisi")
                ->orderBy("name", "asc")
                ->get(),
            "prshs" => Perusahaan::orderBy("pr_name", "asc")
                ->get(),
            "apks" => Aplikasi::orderBy("apk_name", "asc")
                ->get()
        ]);
    }

    function TeknisiAdd(Request $request)
    {

        Teknisi::create([
            "tk_id" => Str::random(15),
            "tk_name" => $request->user,
            "tk_prshid" => $request->prsh,
            "tk_apkid" => $request->apk,
            "tk_cp" => $request->contact
        ]);

        return back()->with([
            "success" => "Berhasil Menambah Data!"
        ]);
    }

    public function AplikasiView()
    {
        return view('dashboard.AdminAplikasi', [
            "title" => "Data Aplikasi",
            "apks" => Aplikasi::orderBy("id", "asc")
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
            "prshs" => Perusahaan::orderBy("id", "asc")
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
