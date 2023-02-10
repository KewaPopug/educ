<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\GroupSpecialization;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $faculties = Faculty::query()->pluck('name_faculty', 'id');
        $departments= Department::query()
            ->orderBy('department')
            ->get();

        if ($request->isMethod('get') && isset($_GET['faculty_id'])){
            $departments_sort = $departments->where('faculty_id', $_GET['faculty_id']);

            return view('admin/departments/index', [
                'faculties' => $faculties,
                'departments' => $departments_sort,
            ]);
        }

        return view('admin/departments/index', [
            'faculties' => $faculties,
            'departments' => $departments,
        ]);
    }


    /**
     * Store a new flight in the database.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create(Request $request)
    {
        $faculties = Faculty::pluck('name_faculty','id');

        if ($request->isMethod('post') && isset($_POST)){
            $department = new Department();
            $department->name_department = $request->name_department;
            $department->short_name = $request->short_name;
            $department->faculty_id = $request->faculty_id;
            $department->save();

            return redirect()->route('admin.departments.departments');
        }

        return view('admin/departments/create', compact('faculties'),
        );
    }

    public function update(Request $request ,$id)
    {
        $faculties = Department::query()->find($id)->faculty->pluck('name_faculty','id');
        $departments = Department::query()->find($id);

        if ($request->isMethod('post') && isset($_POST)) {

            $departments->name_department = $request->name_department;
            $departments->short_name = $request->short_name;
            $departments->faculty_id = $request->faculty_id;
            $departments->save();

            if($departments->update($request->all())){
                return redirect()->route('admin.departments.departments');
            };
        }

        return view('admin/departments/update',[
            'faculties' => $faculties,
            'departments' => $departments,
        ]);
    }

    public function delete($id)
    {
        $groupSpecialization = Department::find($id);
        $groupSpecialization->delete();
        return redirect()->route('admin.departments.departments');
    }
}
