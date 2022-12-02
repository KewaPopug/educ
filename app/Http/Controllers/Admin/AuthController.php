<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::check()){
            return redirect()->intended(route('admin.auth.main'));
        }

        $formFields = $request->only(['email','password']);

        if(Auth::attempt($formFields)){
            return redirect()->intended(route('admin.auth.main'));
        }

        return redirect(route('admin.auth.login'))->withErrors([
            'email'=>'Не удалось авторизироваться'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
