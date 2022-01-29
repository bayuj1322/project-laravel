<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $user = User::create([
            'uid' => Str::random(15),
            'name' => $request->name,
            'email' => $request->email,
            'access' => $request->access,
            'password' => Hash::make($request->password),
            'team' => $request->in1,
            'code' => $request->in2,
            'desc' => $request->in3,
            'emp_no' => $request->in4,
            'phone' => $request->in5
        ]);

        event(new Registered($user));

        return back()->with([
            "success" => "Berhasil Menambah Data!"
        ]);
    }
}
