<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

// class SessionController extends Controller
// {
//     //
//     // public function create(){
//     // }
//     // public function store(Request $request)
//     // {
//     //     // Validate request data
//     //     $request->validate([
//     //         'email' => ['required'],
//     //         'password' => ['required'],
//     //     ]);

//     //     // Attempt to authenticate
//     //     if (Auth::attempt([
//     //         'email' => $request->email,
//     //         'password' => $request->password,
//     //     ])) {
//     //         // Authentication passed
//     //         return redirect('/index');
//     //     }

//     //     // Authentication failed
//     //     return redirect()->back()->withErrors([
//     //         'email' => 'The provided credentials do not match our records.',
//     //     ])->withInput();
//     // }
// }
