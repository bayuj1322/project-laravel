<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
            "title" => "Home Admin"
        ]);
    }



    function UserView()
    {

        return view('dashboard.AdminUser', [
            "title" => "Data User",
            "user" => User::orderBy("id", "asc")
                ->get()


        ]);

        return back()->with([
            "success" => "Berhasil Menambah Data!"
        ]);

        // return back()->with('success', 'Data Berhasil ditambahkan !!!');

        // return redirect('/dashboard/admin/user')->withSuccess('Task Created Successfully!');
    }

    function UserAdd(Request $request)
    {

        User::create([
            "uid" => Str::random(15),
            "name" => $request->name,
            "email" => $request->email,
            "access" => $request->access,
            "password" => $request->password,
            "team" => $request->in1,
            "code" => $request->in2,
            "desc" => $request->in3,
            "emp_no" => $request->in4,
            "phone" => $request->in5,
            "is_active" => $request->is_active,
            "created_by" => Auth::user()->name

        ]);
        // return back()->with('info', 'Task Created Successfully!');
        // return redirect('/dashboard/admin/user')->with('msg', 'Task Created Successfully!');

        return back()->with([
            "success" => "Berhasil Menambah Data!"
        ]);
    }

    public function TeknisiView()
    {
        return view('dashboard.AdminTeknisi', [
            "title" => "Data Teknisi",
            // "tk" => Teknisi::orderBy("id", "asc")
            //     ->get(),
            "tks" => User::where("access", "teknisi")
                ->orderBy("name", "asc")
                ->get(),
            "prshs" => Perusahaan::orderBy("pr_name", "asc")
                ->get(),
            "apks" => Aplikasi::orderBy("apk_name", "asc")
                ->get(),

            "tka" => Teknisi::orderBy("teknisis.id", "asc")
                ->join("users", "users.uid", "=", "teknisis.tk_name")
                ->join("perusahaans", "perusahaans.pr_id", "=", "teknisis.tk_prshid")
                ->join("aplikasis", "aplikasis.apk_id", "=", "teknisis.tk_apkid")
                ->get(),
        ]);

        // return back()->with('success', 'Data Berhasil ditambahkan !!!');

    }

    function TeknisiAdd(Request $request)
    {

        Teknisi::create([
            "tk_id" => Str::random(15),
            "tk_name" => $request->tk_name,
            "tk_prshid" => $request->tk_prshid,
            "tk_apkid" => $request->tk_apkid,
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
            "apks" => Aplikasi::orderBy("aplikasis.id", "asc")
                ->join("users", "users.uid", "=", "aplikasis.apkt_id")
                ->get(),
            "teknisi" => User::where("access", "teknisi")
                ->orderBy("name", "asc")->get(),

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
            "apk_desc" => $request->i3,
            "apkt_id" => $request->i4
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

        // return back()->with('success', 'Data Berhasil ditambahkan !!!');
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

    public function PerusahaanEdit($id)
    {

        return view('dashboard.Edit1', [
            "title" => "Edit Perusahaan",
            "prshs" => Perusahaan::find($id)
        ]);
    }

    public function PerusahaanEditProses($id, Request $request)
    {
        Perusahaan::where("id", $id)->update(
            [
                "pr_name" => $request->i1,
                "pr_url" => $request->i2,
            ]
        );
        return redirect('/dashboard/admin/perusahaan')->with([
            "success" => "Berhasil Menambah Data!"
        ]);
    }
}
