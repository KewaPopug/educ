<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function save(Request $request){
        if(Auth::check()){
            return redirect(route('user.private'));
        }

//        $validatefields = $request->validate([
//            'email'=>'required|email',
//            'password' => 'required',
////            'role'=> $request->role,
//        ]);
//
//        array_push($validatefields, 'role', $request->role);

//        dump($validatefields);
//        $user = User::create($validatefields);
        $user = User::create([
            'email'=> $request->email,
            'password' => $request->password,
            'role'=> $request->role,
        ]);
        if($user){
            Auth::login($user);
            return redirect(route('user.private'));
        }

        return redirect(route('user.login'))->withErrors([
            'formError' => 'Произошла ошибка при сохранение пользователя'
        ]);
    }

}
