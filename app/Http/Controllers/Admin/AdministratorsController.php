<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdministratorsController extends Controller
{
    public function index()
    {
        $administrators = User::where('role', 'admin')->orderBy('secondname')->orderBy('firstname')->orderBy('middlename')->get();
        return view('admin/administrators/index', [
            'administrators' => $administrators,
        ]);
    }


    /**
     * Store a new flight in the database.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $administrators = new User();
//        if (isset($_POST)){
            dd($_POST);
//            $administrators->name = $request->name;
//
//            $administrators->save();
//        }
        return view('admin/administrators/create');
    }

    public function update($id)
    {
        $administrator = User::find($id);

        $administrator->name = 'Paris to London';

        $administrator->save();
    }

    public function delete($id)
    {
        $flight = User::find($id);
        $flight->delete();
    }
}
