<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\GroupSpecialization;
use Illuminate\Http\Request;

class GroupSpecializationController extends Controller
{
    public function index(Request $request)
    {
        $faculties = Faculty::query()->pluck('name_faculty', 'id');
        $groups_specializations= GroupSpecialization::query()
            ->orderBy('name_group_specialization')
            ->get();

        if ($request->isMethod('get') && isset($_GET['faculty_id'])){
            $groups_specializations_sort = $groups_specializations->where('faculty_id', $_GET['faculty_id']);

            return view('admin/groups_specializations/index', [
                'faculties' => $faculties,
                'groups_specializations' => $groups_specializations_sort,
            ]);
        }

        return view('admin/groups_specializations/index', [
            'faculties' => $faculties,
            'groups_specializations' => $groups_specializations,
        ]);
    }


    /**
     * Store a new flight in the database.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse | \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $faculties = Faculty::pluck('name_faculty','id');

        if ($request->isMethod('post') && isset($_POST)){
            $groupSpecialization = new GroupSpecialization;
            $groupSpecialization->name_group_specialization = $request->name_group_specialization;
            $groupSpecialization->faculty_id = $request->faculty_id;
            $groupSpecialization->save();

            return redirect()->route('admin.groups_specializations.groups_specializations');
        }

        return view('admin/groups_specializations/create', compact('faculties'),
        );
    }

    public function update(Request $request ,$id)
    {
        $faculties = GroupSpecialization::query()->find($id)->faculty->pluck('name_faculty','id');
        $groupsSpecializations = GroupSpecialization::query()->find($id);


        if ($request->isMethod('post') && isset($_POST)) {

            $groupsSpecializations->name_group_specialization = $request->name_group_specialization;
            $groupsSpecializations->faculty_id = $request->faculty_id;
            $groupsSpecializations->save();

            if($groupsSpecializations->update($request->all())){
                return redirect()->route('admin.groups_specializations.groups_specializations');
            };
        }

        return view('admin/groups_specializations/update',[
            'faculties' => $faculties,
            'groupsSpecializations' => $groupsSpecializations,
        ]);
    }

    public function delete($id)
    {
        $groupSpecialization = groupSpecialization::find($id);
        $groupSpecialization->delete();
        return redirect()->route('admin.groups_specializations.groups_specializations');
    }
}
