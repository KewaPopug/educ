<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 'teacher')->orderBy('secondname')->orderBy('firstname')->orderBy('middlename')->get();
        return view('admin/teachers/index', [
            'teachers' => $teachers,
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
//            dd('asdasd');
            $teacher = new User;
            $teacher->role = 'teacher';

            $teacher->secondname = $request->secondname;
            $teacher->firstname = $request->firstname;
            $teacher->middlename = $request->middlename;
            $teacher->email = $request->email;
            $teacher->password = Hash::make($request->password);
            $teacher->save();
            $teachers = User::where('role', 'teacher')->orderBy('secondname')->orderBy('firstname')->orderBy('middlename')->get();
            return view('admin/teachers/index', [
                'teachers' => $teachers,
            ]);
        }
        return view('admin/teachers/create');
    }

    public function update(Request $request ,$id)
    {
        $teacher = User::find($id);
        if (isset($_POST)) {
            if ($request->isMethod('post') && isset($_POST)) {
                $teacher->role = 'teacher';
                $teacher->secondname = $request->secondname;
                $teacher->firstname = $request->firstname;
                $teacher->middlename = $request->middlename;
                $teacher->email = $request->email;
                if($teacher->update($request->all())){
                    $teachers = User::where('role', 'teacher')->orderBy('secondname')->orderBy('firstname')->orderBy('middlename')->get();
                    return view('admin/teachers/index', [
                        'teachers' => $teachers,
                    ]);
                };
            }
        }
        return view('admin/teachers/update', [
            'teacher' => $teacher,
        ]);
    }

    public function delete($id)
    {
        $teacher = User::find($id);
        $teacher->delete();
        return redirect()->route('admin.teachers.teachers');
    }
}
