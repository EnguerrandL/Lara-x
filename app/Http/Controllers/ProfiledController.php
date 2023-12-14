<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfiledController extends Controller
{
    public function index()
    {
        return view('profile');
    }
}
