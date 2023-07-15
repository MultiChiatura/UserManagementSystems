<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('auth.pages.login');
    }

    public function signup(LoginRequest $request){
        if (Auth::attempt($request->validated())) {
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['message' => 'Incorrect Data']);
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('dashboard');
    }
}
