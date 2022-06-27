<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Occupant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        if (Auth::guard('occupant')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/dashboardpenghuni');
        } elseif (Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/dashboard');
        }
        return redirect('/');
    }
    public function postlogout(Request $request)
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } else if (Auth::guard('occupant')->check()) {
            Auth::guard('occupant')->logout();
        }
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

        // dd(Auth::guard('occupant')->check());
        // Auth::logout();
    }
}
