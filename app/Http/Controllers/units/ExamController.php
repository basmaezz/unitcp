<?php

namespace App\Http\Controllers\units;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CreateExam;
use App\Material;
use App\Faculty;
use App\classes;
use App\Exam;
use App\Year;
use Validator;
use DB;
use Auth;
use Response;
use App\Department;
use App\Semester;
use App\traits\collections;

class ExamController extends Controller
{

    public function index()
    {
        return view('panel.units.exam.all');
    }


    public function get_fac_exams_data_table(exam $items, Request $request)
    {

        $fac_id= Auth::user()->faculty_id;
        $items=Exam::where('faculty_id',$fac_id)->get();

        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;

            })
                ->addColumn('fullName', function ($item) {
                    return $item->getFullName();
                })
                ->addColumn('action', function ($item) {
                    return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="'.url("storage/faculty/exams/".$item->files($item->file)).'"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تحميل</a>
                      <a  title="Edit" style="margin-right: 10px"  href="' . route('units.exam.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>

                      <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"   data-url="' . units_url('exam/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
                    </div>';
                })->rawColumns(['action', 'fullName'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }

    }

    public function main()
    {
        return view('panel.units.exam.main');

    }

    public function create()
    {
        $fac_id= Auth::user()->faculty_id;
        $faculty=Faculty::where('id',$fac_id)->get();
        $classes = classes::where("faculty_id",$fac_id)->get();
        $department = DB::table("departments")->where("faculty_id",$fac_id)->get();
        $material = DB::table("materials")->where("faculty_id",$fac_id)->get();
        $semesters = DB::table("semesters")->where("faculty_id",$fac_id)->get();
        $year = DB::table("years")->get();

        $data = ["faculty"=>$faculty,"classes"=>$classes,"department"=>$department,"semesters"=>$semesters,"material"=>$material,"year" => $year];

        return view('panel.units.exam.create')->with('data',$data);

    }


//    public function getData($id) {

    public function store(CreateExam $request)
    {
        $validator = Validator::make(
            $request->all(),
            \App\File::$rules,
            \App\File::$messages);
        if ($validator->fails()) {
            return Response::json([
                'error' => true,
                'message' => $validator->messages()->first(),
            ], 400);
        }
        if (!config('app.allowUploadFiles')) {
            return Response::json([
                'error' => true,
                'message' => 'تم ايقاف رفع الملفات بشكل مؤقت برجاء التواصل مع الادارة',
            ], 400);
        }

        $fileRequeste = $request->file('file');
        $file_size = $fileRequeste->getClientSize();
        $extension = $fileRequeste->getClientOriginalExtension();
        $allowed_filename = 'file_' . time() . mt_rand() . '.' . $extension;


        $originalName = str_replace('.' . $extension, '', $fileRequeste->getClientOriginalName());

        $fileStatus = $fileRequeste->storeAs('faculty/exams/' . request('facid'), $allowed_filename);

        if (!$fileStatus) {
            return Response::json([
                'error' => true,
                'message' => 'حدثت مشكلة في الخادم أثناء رفع الملفات',
            ], 500);
        }
        $fileModule = new \App\File;
        $fileModule->display_name = $originalName . '.' . $extension;
        $fileModule->file_name = $allowed_filename;
        $fileModule->mime_type = $extension;
        $fileModule->size = $file_size;
        $fileModule->save();
        //Save Exam
        $exam = new Exam;
        $exam->faculty_id = $request->get('faculty');
        $exam->class_id = $request->get('class_id');
        $exam->department_id = $request->get('department_id');
        $exam->semester_id = $request->get('semester_id');
        $exam->material_id = $request->get('material_id');
        $exam->year_id = $request->get('year_id');
        $exam->file = $fileModule->display_name;
        $exam->key_search_ar = $request->key_search_ar;
        $exam->key_search_en = $request->key_search_en;
        $exam->save();

        $status = ($exam) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, 'Exam', 'تم اضافه امتحان جديد '.$exam->id, $exam, $status);
        return (isset($exam)) ? $this->response_api(true, 'تم الأضافة بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function delete($id)
    {
        $item = exam::find($id);
        $status = ($item) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, 'Exam', 'تم حذف ملف امتحان '.$item->id, $item, $status);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }


    public function getExamData($id)
    {

        $classes = classes::where("faculty_id", $id)->get();
        $department = DB::table("departments")->where("faculty_id", $id)->get();
        $classes = DB::table("classes")->where("faculty_id", $id)->get();
        $materials = DB::table("materials")->where("faculty_id", $id)->get();
        $semesters = DB::table("semesters")->where("faculty_id", $id)->get();
        $year = DB::table("years")->get();

        $data = ["classes" => $classes, "department" => $department, "materials" => $materials, "semesters" => $semesters, "year" => $year];

        $view = view('panel.exam.exam-selectors', $data)->render();

        return response()->json(['status' => true, 'item' => $view]);
    }




    public function uploads(request $request, $id)
    {

        $image = $request->file('file');
        $imageName = time() . $image->getClientOriginalName();
        $upload_success = $image->move(public_path('images'), $imageName);

        if ($upload_success) {
            return response()->json($upload_success, 200);
        } else {
            return response()->json('error', 400);
        }
    }

    public function get_fac_exam_data_table(exam $items)
    {

//            $items = $items->orderBy('id', 'ASC')->get();

        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;

            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <button title="Edit" style="margin-right: 10px" data-id="' . $item->id . '" data-toggle="modal" data-target="#edit_modal"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</button>

                      <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . admin_url('exam/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
                    </div>';
            })->rawColumns(['action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }

    public function edit($id)
    {
        $data['exam'] = Exam::find($id);
        $fac_id = $data['exam']->faculty_id;
        $faculty = Faculty::where("id", $fac_id)->get();

        $department = Department::where("faculty_id", $fac_id)->get();
        $classes = DB::table('classes')->where("faculty_id", $fac_id)->get();
        $material = Material::where("faculty_id", $fac_id)->get();
        $semester = Semester::where("faculty_id", $fac_id)->get();
        $exam = Exam::where("faculty_id", $fac_id)->get();
        $year = DB::table("years")->get();
        $data = [
            "faculties" => $faculty,
            "classes" => $classes,
            "department" => $department,
            "material" => $material,
            "semester" => $semester,
            "exam" =>$exam,
            "year"=>$year,
        ];
        $status = ($data) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, 'Exam', 'تم التعديل فى بيانات امتحان مرفوعه '.$data->id, $data, $status);

        return view('panel.units.exam.edit')->with('data',$data);
    }


    public  function update($id,Request $request)
    {
        $exam = Exam::findOrFail($id);
        if (!config('app.allowUploadFiles')) {
            return Response::json([
                'error' => true,
                'message' => 'تم ايقاف رفع الملفات بشكل مؤقت برجاء التواصل مع الادارة',
            ], 400);
        }

        if($request->hasFile('file')) {
            $fileRequeste = $request->file('file');
            $file_size = $fileRequeste->getClientSize();
            $extension = $fileRequeste->getClientOriginalExtension();
            $allowed_filename = 'file_' . time() . mt_rand() . '.' . $extension;
            $originalName = str_replace('.' . $extension, '', $fileRequeste->getClientOriginalName());
            $checkFileExist = \App\File::where('size', $file_size)->where('display_name', 'like', $originalName . '.' . $extension)->first();
            if (!empty($checkFileExist)) {
                return Response::json([
                    'error' => true,
                    'message' => 'هذا الملف قد تم رفعه مسبقا',
                ], 400);
            }
            $fileStatus = $fileRequeste->storeAs('faculty/exams/' . request('facid'), $allowed_filename);

            if (!$fileStatus) {
                return Response::json([
                    'error' => true,
                    'message' => 'حدثت مشكلة في الخادم أثناء رفع الملفات',
                ], 500);
            }
            //Delete old file & record
            $oldFile = \App\File::where('display_name','like',$exam->file)->first();
            if($oldFile)
            {
                Storage::delete('faculty/exams/'.$oldFile->file_name);
                $oldFile->delete();
            }
            //Create new record for uploaded file
            $fileModule = new \App\File;
            $fileModule->display_name = $originalName . '.' . $extension;
            $fileModule->file_name = $allowed_filename;
            $fileModule->mime_type = $extension;
            $fileModule->size = $file_size;
            $fileModule->save();
            //Update file name in Exam
            $exam->file = $fileModule->display_name;
        }

        //Save Exam


        $exam->faculty_id       = $request->get('faculty_id');
        $exam->class_id         = $request->get('class_id');
        $exam->department_id    = $request->get('department_id');
        $exam->semester_id      = $request->get('semester_id');
        $exam->material_id      = $request->get('material_id');//missing
        $exam->year_id          = $request->get('year_id');//missing
        $exam->key_search_ar    = $request->get('key_search_ar');//missing
        $exam->key_search_en    = $request->get('key_search_en');//missing
        $exam->save();

        $status = ($exam) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, 'Exam', 'Edit '.$exam->id, $exam, $status);

        return (isset($exam)) ? $this->response_api(true, 'تم تعديل بيانات الأمتحان بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }



}

