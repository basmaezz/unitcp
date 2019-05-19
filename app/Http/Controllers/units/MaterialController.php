<?php

namespace App\Http\Controllers\units;

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
use App\traits\collections;

class MaterialController extends Controller
{

    public  function index(){

        return view('panel.units.material.all');

    }
    public function create()
    {
        $fac_id= Auth::user()->faculty_id;
        $faculty=Faculty::where('id',$fac_id)->get();
        $classes = classes::where("faculty_id",$fac_id)->get();

        $department = DB::table("departments")->where("faculty_id",$fac_id)->get();
//        $materials = DB::table("materials")->where("faculty_id",$fac_id)->get();
        $semesters = DB::table("semesters")->where("faculty_id",$fac_id)->get();

        $data = ["faculty"=>$faculty,"classes"=>$classes,"department"=>$department,"semesters"=>$semesters];
//        dd($data['classes']);


        return view('panel.units.material.create')->with('data',$data);

//        dd($data);
//        return view('panel.units.material.create',compact('items'));
//        $view =view('panel.units.material.create', $data)->render();
//
//        return response()->json(['status'=>true,'item'=>$view]);
    }


    public function getData($id) {

        $classes = classes::where("faculty_id",$id)->get();
        $department = DB::table("departments")->where("faculty_id",$id)->get();
        $materials = DB::table("materials")->where("faculty_id",$id)->get();
        $semesters = DB::table("semesters")->where("faculty_id",$id)->get();

        $data = ["classes"=>$classes,"department"=>$department,"materials"=>$materials,"semesters"=>$semesters];
        dd($data);

        $view =view('panel.material.fac-selectors', $data)->render();

        return response()->json(['status'=>true,'item'=>$view]);
    }


    public function store(CreateMaterial $request)
    {

        $material = Material::create($request->all());
        $status = ($material) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, 'Material', 'Create '.$material->id, $material, $status);
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

        return view('panel.material.edit')->with('data',$data);

    }


    public function update($id, CreateMaterial $request)
    {
        $material = Material::updateOrCreate(['id' => $id], $request->all());
        $status = ($material) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, 'Material', 'update '.$material->id, $material, $status);

        return (isset($material)) ? $this->response_api(true, 'تم تعديل البيانات بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }



    public function delete($id)
    {
        $item = Material::find($id);
        $status = ($item) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, 'Material', 'delete '.$item->id, $item, $status);

        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }


    public function get_fac_material_data_table(material $items)
    {
        $fac_id= Auth::user()->faculty_id;
        $items=Material::where('faculty_id',$fac_id)->get();
//        $items = $items ->orderBy('id', 'ASC')->get();

        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;

            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' .route('panel.material.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                      <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . units_url('material/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }



}
