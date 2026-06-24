<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class StudentController extends Controller
{

    public function showRegister()
    {
        return view('frontend.pages.auth.register');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => Hash::make($validatedData['password']),
            'status' => 'active',
            'primary_role_id' => 5,

        ]);

        // Create the student record
        Student::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('login')->with('message', 'Registration successful.');
    }


    public function dashboard()
    {
        return view('frontend.pages.student.dashboard');
    }
}
