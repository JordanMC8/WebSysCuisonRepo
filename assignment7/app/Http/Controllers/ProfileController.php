<?php

namespace App\Http\Controllers;

use function system_log;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'student_id' => $request->student_id,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'course' => $request->course,
            'year_level' => $request->year_level,
        ]);

        system_log('update_profile', 'Profile updated');

        return back()->with('success', 'Updated');
    }
}
