<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::query()->orderBy('name_faculty')->get();
        return view('admin/faculties/index', [
            'faculties' => $faculties,
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
            $faculty = new Faculty;

            $faculty->name_faculty = $request->name_faculty;
            $faculty->faculty_reduction = $request->faculty_reduction;
            $faculty->save();
            $faculties = Faculty::query()->orderBy('name_faculty')->get();
            return view('admin/faculties/index', [
                'faculties' => $faculties,
            ]);
        }
        return view('admin/faculties/create');
    }

    public function update(Request $request ,$id)
    {
        $faculty = Faculty::query()->find($id);
        if ($request->isMethod('post') && isset($_POST)) {
            $faculty->name_faculty = $request->name_faculty;
            $faculty->faculty_reduction = $request->faculty_reduction;
            if($faculty->update($request->all())){
                $faculties = Faculty::query()->orderBy('name_faculty')->get();
                return view('admin/faculties/index', [
                    'faculties' => $faculties,
                ]);
            };
        }
        return view('admin/faculties/update', [
            'faculty' => $faculty,
        ]);
    }

    public function delete($id)
    {
        $faculty = Faculty::find($id);
        $faculty->delete();
        return redirect()->route('admin.faculties.faculties');
    }
}
