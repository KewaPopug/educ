<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
     * @return RedirectResponse|Application|Factory|View

     */
    public function create(Request $request)
    {

        if ($request->isMethod('post') && isset($_POST)){
            $faculty = new Faculty;

            $faculty->name_faculty = $request->name_faculty;
            $faculty->faculty_reduction = $request->faculty_reduction;
            $faculty->save();
            $faculties = Faculty::query()->orderBy('name_faculty')->get();
            return redirect()->route('admin.faculties.faculties');
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
                return redirect()->route('admin.faculties.faculties');
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
