<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {


        User::create([
            'name' => $request->name,
            'email' =>   $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('index')->with('success', 'Account created successfully !');
    }
}
