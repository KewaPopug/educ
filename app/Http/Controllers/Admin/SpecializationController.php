<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\GroupSpecialization;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
class SpecializationController extends Controller
{
    public function index(Request $request)
    {
        $groupSpecialization = GroupSpecialization::query()->pluck('name_group_specialization', 'id');
        $specializations= Specialization::query()
            ->orderBy('name_specialization')
            ->get();

        if ($request->isMethod('get') && isset($_GET['faculty_id'])){
            $specializations_sort = $specializations->where('faculty_id', $_GET['faculty_id']);

            return view('admin/specializations/index', [
                'groupSpecialization' => $groupSpecialization,
                'specializations' => $specializations_sort,
            ]);
        }

        return view('admin/specializations/index', [
            'groupSpecialization' => $groupSpecialization,
            'specializations' => $specializations,
        ]);
    }


    /**
     * Store a new flight in the database.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse | \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $faculty = Faculty::pluck('name_faculty','id');
        $groupSpecialization = GroupSpecialization::pluck('name_group_specialization','id');

        if ($request->isMethod('post') && isset($_POST)){
            $specialization = new Specialization;
            $specialization->name_specialization = $request->name_specialization;
            $specialization->group_specialization_id = $request->group_specialization_id;
            $specialization->specialization_reduction = $request->specialization_reduction;
            $specialization->save();

            return redirect()->route('admin.specializations.specializations');
        }

        return view('admin/specializations/create', compact('groupSpecialization'),compact('faculty'),
        );
    }

    public function update(Request $request ,$id)
    {
        $specializations = Specialization::query()->find($id);
        $faculty = Faculty::pluck('name_faculty','id');
        $groupSpecialization = GroupSpecialization::pluck('name_group_specialization','id');

        if ($request->isMethod('post') && isset($_POST)) {
//            var_dump($specializations);
//            die();
            $specializations->name_specialization = $request->name_specialization;
            $specializations->group_specialization_id = $request->group_specialization_id;
            $specializations->specialization_reduction = $request->specialization_reduction;

            $specializations->save();

            if($specializations->update($request->all())){
                return redirect()->route('admin.specializations.specializations');
            };
        }

        return view('admin/specializations/update',["specializations" => $specializations], compact('groupSpecialization', 'faculty'));
    }

    public function addGroupSpecialization(Request $request){

        $groupsSpecializations = GroupSpecialization::query()
            ->where(['faculty_id' => (int)$request->input('faculty_id')])
            ->pluck('name_group_specialization','id');
        return $groupsSpecializations;
    }

    public function delete($id)
    {
        $specialization = Specialization::find($id);
        $specialization->delete();
        return redirect()->route('admin.specializations.specializations');
    }
}
