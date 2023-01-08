<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

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
    public function create(Request $request)
    {
        if ($request->isMethod('post') && isset($_POST)){
            $administrator = new User;

            $administrator->role = 'admin';
            $administrator->secondname = $request->secondname;
            $administrator->firstname = $request->firstname;
            $administrator->middlename = $request->middlename;
            $administrator->email = $request->email;
            $administrator->password = Hash::make($request->password);
            $administrator->save();
        }
        return view('admin/administrators/create');
    }

    public function update(Request $request ,$id)
    {
        $administrator = User::find($id);
        if ($request->isMethod('post') && isset($_POST)) {

            $administrator->save();
        }
        return view('admin/administrators/update', [
            'administrator' => $administrator,
        ]);
    }

    public function delete($id)
    {
        $flight = User::find($id);
        $flight->delete();
    }
}
