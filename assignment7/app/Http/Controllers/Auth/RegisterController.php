<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',

            'student_id' => 'required|unique:users',
            'birthdate' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'course' => 'required',
            'year_level' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            'student_id' => $request->student_id,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'course' => $request->course,
            'year_level' => $request->year_level,
        ]);

        system_log('register', 'User registered');

        return redirect('/login');
    }
}
