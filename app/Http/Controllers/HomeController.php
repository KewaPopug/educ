<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function welcome()
    {
//        var_dump(Hash::make('qweasdzxc15'));
//        die;
        return view('welcome');
    }
}
