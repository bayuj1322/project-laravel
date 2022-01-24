<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    function Check()
    {
        $user = Auth::user();
        if ($user->access == "admin") {
            return redirect('/dashboard/admin');
        } elseif ($user->access == "reporter") {
            return redirect('/dashboard/reporter');
        } elseif ($user->access == "teknisi") {
            return redirect('/dashboard/teknisi');
        } else {
            return abort(404);
        }
    }
}
