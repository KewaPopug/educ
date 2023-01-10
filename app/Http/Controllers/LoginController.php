<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::check()){
            return redirect()->intended(route('site.auth.main'));
        }

        $formFields = $request->only(['email','password']);

        if(Auth::attempt($formFields)){
            return redirect()->intended(route('site.auth.main'));
        }

        return redirect(route('site.auth.login'))->withErrors([
            'email'=>'Не удалось авторизироваться'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
