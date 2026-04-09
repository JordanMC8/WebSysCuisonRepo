<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    system_log('login', 'User logged in');

    return redirect('/dashboard');
}

// log failed login
system_log('login_failed', 'Invalid login attempt: ' . $request->email);

return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        system_log('logout', 'User logged out');

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}