<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'password' => ['required','confirmed','min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $users = User::create($formFields);

        auth()->login($users);

        return redirect('/')->with('message','User created and logged in!');
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($formFields,$request->remember)){
            $request->session()->regenerate();

            return redirect('/')->with('message','You are logged in!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function destroy(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out!');
    }
}
