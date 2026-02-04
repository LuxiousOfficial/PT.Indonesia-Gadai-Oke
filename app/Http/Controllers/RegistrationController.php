<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('auth.registration');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:200'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/')->with('success', 'Registration Successfully, Please Login!!');
    }
}
