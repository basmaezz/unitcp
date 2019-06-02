<?php

namespace App\Http\Controllers\Panel;

use App\Department;
use App\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Material;
use App\Faculty;
use App\classes;
use DB;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CreateMaterial;
use Auth;

class MaterialController extends Controller
{

    public  function index(){

        return view('panel.material.all');

    }
    public function create()
    {
        if (Auth::user()->has('faculty') && !empty(Auth::user()->faculty)) {
            $faculty = Faculty ::where('id', Auth::user()->faculty_id)->orderBy('id', 'ASC')->get();
        } else {
            $faculty = Faculty ::orderBy('id', 'ASC')->get();
        }
        return view('panel.material.create',compact('faculty'));
    }


    public function getData($id) {

        $classes = classes::where("faculty_id",$id)->get();
        $department = DB::table("departments")->where("faculty_id",$id)->get();
        $materials = DB::table("materials")->where("faculty_id",$id)->get();
        $semesters = DB::table("semesters")->where("faculty_id",$id)->get();

        $data = ["classes"=>$classes,"department"=>$department,"materials"=>$materials,"semesters"=>$semesters,
            ];

        $view =view('panel.material.fac-selectors', $data)->render();

        return response()->json(['status'=>true,'item'=>$view]);
    }


    public function store(CreateMaterial $request)
    {

        $material = Material::create($request->all());

        return (isset($material)) ? $this->response_api(true, 'تم إضافة ماده دراسيه بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }


    public function edit($id)
    {
        $data['material'] = Material::find($id);
         $fac_id = $data['material']->faculty_id;
        $faculty = Faculty::where("id", $fac_id)->get();

        $department = Department::where("faculty_id", $fac_id)->get();
        $classes = DB::table('classes')->where("faculty_id", $fac_id)->get();
        $material = Material::where("faculty_id", $fac_id)->get();

        $semester = Semester::where("faculty_id", $fac_id)->get();
        $data = [
            "faculties" => $faculty,
            "classes" => $classes,
            "department" => $department,
            "material" => $material,
            "semester" => $semester
        ];
        session()->flash('response', __('تم تعديل البيانات بنجاح'));
        return view('panel.material.edit')->with('data',$data);

    }


    public function update($id, CreateMaterial $request)
    {
        $material = Material::updateOrCreate(['id' => $id], $request->all());

        return (isset($material)) ? $this->response_api(true, 'تم تعديل البيانات بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }



    public function delete($id)
    {
        $item = Material::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }


    public function get_material_data_table(material $items)
    {
        if (Auth::user()->has('faculty') && !empty(Auth::user()->faculty)) {
            $items = $items->where('faculty_id', Auth::user()->faculty_id)->orderBy('id', 'ASC')->get();
        } else {
            $items = $items->orderBy('id', 'ASC')->get();
        }


        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;

            })->editColumn('faculty_id', function ($item) {
                if(!empty($item->faculty))
                {
                    return ($item['faculty']->name_ar);
                } else {
                    return 'admin';
                }

            })->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);

            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' . route('panel.material.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }



}
