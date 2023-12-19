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


        $validated = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required',
        ]);

    
        User::create($validated);


        return redirect()->route('index')->with('success', 'Account created successfully !');
    }




    public function login()
    {

        return view('auth.login');
    }



    public function authenticate(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validated)) {

            request()->session()->regenerate();
            return redirect()->route('index')->with('success', 'Loged with success');
        }



        return redirect()->route('login')->withErrors([
            'email' => "Something went wrong",
        ]);
    }


    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('index')->with('success', 'Logout successfully');
    }
}
