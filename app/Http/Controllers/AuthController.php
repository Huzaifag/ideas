<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(){
        return view("auth.register");
    }

    public function store(){
        $validated = request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6|max:255'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        if($user){
            Mail::to($user->email)->send(new WelcomeMail($user));
        }

        return redirect(route('home'))->with('success', 'Your account has been created');
    }

    public function login(){
        return view("auth.login");
    }

    public function authenticate(){
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        request()->session()->regenerate();

        if(Auth::attempt($validated)){
            return redirect(route('home'))->with('success','Welcome back!');
        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('home'))->with('success','You have been logged out');
    }
}
