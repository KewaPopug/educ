<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->orderBy('secondname')->orderBy('firstname')->orderBy('middlename')->get();
        return view('admin/students/index', [
            'students' => $students,
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
            $student = new User;
            $student->role = 'student';
            $student->secondname = $request->secondname;
            $student->firstname = $request->firstname;
            $student->middlename = $request->middlename;
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->save();
            $students = User::where('role', 'student')->orderBy('secondname')->orderBy('firstname')->orderBy('middlename')->get();
            return view('admin/students/index', [
                'students' => $students,
            ]);
        }
        return view('admin/students/create');
    }

    public function update(Request $request ,$id)
    {
        $student = User::find($id);
        if ($request->isMethod('post') && isset($_POST)) {

            $student->save();
        }
        return view('admin/students/update', [
            'student' => $student,
        ]);
    }

    public function delete($id)
    {
        $student = User::find($id);
        $student->delete();
        $students = User::where('role', 'student')->orderBy('secondname')->orderBy('firstname')->orderBy('middlename')->get();
        return view('admin/students/index', [
            'students' => $students,
        ]);

    }
}
