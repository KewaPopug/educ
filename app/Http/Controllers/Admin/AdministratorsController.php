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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
            $administrators = User::where('role', 'admin')->orderBy('secondname')->orderBy('firstname')->orderBy('middlename')->get();
            return view('admin/administrators/index', [
                'administrators' => $administrators,
            ]);
        }
        return view('admin/administrators/create');
    }

    public function update(Request $request ,$id)
    {
        $administrator = User::query()->find($id);
        if ($request->isMethod('post') && isset($_POST)) {
            $administrator->role = 'admin';
            $administrator->secondname = $request->secondname;
            $administrator->firstname = $request->firstname;
            $administrator->middlename = $request->middlename;
            $administrator->email = $request->email;
            if($administrator->update($request->all())){
                $administrators = User::where('role', 'admin')->orderBy('secondname')->orderBy('firstname')->orderBy('middlename')->get();
                return view('admin/administrators/index', [
                    'administrators' => $administrators,
                ]);
            };
        }
        return view('admin/administrators/update', [
            'administrator' => $administrator,
        ]);
    }

    public function delete($id)
    {
        $administrators = User::where('role', 'admin')->orderBy('secondname')->orderBy('firstname')->orderBy('middlename')->get();
        $administrator = User::find($id);
        $administrator->delete();
        return redirect()->route('admin.administrators.administrators');
    }
}
