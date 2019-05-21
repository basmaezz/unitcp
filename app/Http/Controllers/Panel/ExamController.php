<?php

namespace App\Http\Controllers\Panel;

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
use App\visitor;
use App\Tag;
use App\Tag_Exam;


class ExamController extends Controller
{
    public function index()
    {

        return view('panel.exam.all');
    }

    public function main()
    {
        $exams= Exam::all();
        $examcount=$exams->count();

        $visitors= visitor::all();
//        dd($visitors);
        $visitorcount=$visitors->count();

        $downloads = Exam::orderBy('download_num','desc')->paginate(5);
        $latest= Exam::orderBy('created_at','desc')->paginate(5);
//        dd($visitors);
        return view('panel.exam.main', compact('downloads','latest','examcount','visitorcount'));

    }

    public function create()
    {
        $tags = Tag::all();
        return view('panel.exam.create')->with(["tag"=>$tags]);
    }


//    public function getData($id) {

    public function store(CreateExam $request)
    {
//        dd($request);
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
//        $allowed_filename = 'file_' . time() . mt_rand() . '.' . $extension;
        $fac_id=$request->get('faculty');
        $dep_id=$request->get('department_id');
        $class_id=$request->get('class_id');
        $semester_id=$request->get('semester_id');
        $material_id=$request->get('material_id');

        $material=Material::find($material_id);
        $mat_name=$material->name_ar;

        $year_id=$request->get('year_id');

        $year=Year::find($year_id);
        $year_name=$year->name;


//        $allowed_filename = 'file_' . time() .  '.' . $extension;
        $allowed_filename = $mat_name  . '-' .$year_name.'.' . $extension;

        $originalName = str_replace('.' . $extension, '', $fileRequeste->getClientOriginalName());
        $fileStatus = $fileRequeste->storeAs('faculty/exams/'.$fac_id.'/'.$dep_id.'/'.$class_id.'/'.$semester_id.'/'.$material_id.'/'.$year_id.
            request('facid'), $allowed_filename);

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
        $exam->faculty_id = $fac_id;
        $exam->class_id = $class_id;
        $exam->department_id = $dep_id;
        $exam->semester_id = $semester_id;
        $exam->material_id = $material_id;
        $exam->year_id = $year_id;
        $exam->file = $fileModule->display_name;
        $exam->key_search_ar = $request->key_search_ar;
        $exam->key_search_en = $request->key_search_en;

        $exam->save();




        $tags=$request->input('tags');

        foreach($tags as $tag){
            $tag= Tag::firstOrCreate([
                'name_ar' =>$tag]);
                //here code of povit table
            $tag_exam= new Tag_Exam;
            $tag_exam->exam_id=$exam->id;
            $tag_exam->tag_id=$tag->id;
            $tag_exam->save();

        }

//        $exam = Exam::create($request->all());
        return (isset($exam)) ? $this->response_api(true, 'تم الأضافة بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function delete($id)
    {
        $item = exam::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }


    public function getExamData($id)
    {
        $classes = classes::where("faculty_id", $id)->get();
        $department = DB::table("departments")->where("faculty_id", $id)->get();
        $classes = DB::table("classes")->where("faculty_id", $id)->get();
        $materials = DB::table("materials")->where("faculty_id", $id)->get();
        $semesters = DB::table("semesters")->where("faculty_id", $id)->get();

        $year = Year::all();

        $data = ["classes" => $classes, "department" => $department, "materials" => $materials, "semesters" => $semesters,"year"=>$year ];

        $view = view('panel.exam.exam-selectors', $data)->render();

        return response()->json(['status' => true, 'item' => $view]);
    }


    public function get_exams_data_table(exam $items, Request $request)
    {

        if ($request->has('faculty_id') && !empty($request->faculty_id)) {
            $items = $items->where('faculty_id', $request->faculty_id)->orderBy('id', 'ASC')->get();
        } else {
            $items = $items->orderBy('id', 'ASC')->get();
        }

        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;

            })
                ->addColumn('fullName', function ($item) {
                    return $item->getFullName();
                })
                ->addColumn('action', function ($item) {
                    return '<div class="row">
                      <a  title="download" style="margin-right: 10px"  href="'.url("storage/faculty/exams/".$item->files($item->file)).'" class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تحميل</a>
                      <a  title="Edit" style="margin-right: 10px"  href="' . route('panel.exam.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                      <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . admin_url('exam/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
                    </div>';
                })->rawColumns(['action', 'fullName'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
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

        public function get_exam_data_table(exam $items)
        {
            $items = $items->orderBy('id', 'ASC')->get();

            try {
                return DataTables::of($items)->editColumn('id', function ($item) {
                    return $item->id;
                })->editColumn('created_at', function ($item) {
                    return get_date_from_timestamp($item->created_at);

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


    public function search_table(exam $items,Request $request){

//        $items = $items ->orderBy('id', 'ASC')->get();
        $items=  exam::search($request);

        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;

            })
                ->addColumn('fullName',function ($item){
                    return $item->getFullName();
                })
                ->addColumn('action', function ($item) {
                    return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' .route('panel.exam.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                      <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . admin_url('exam/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
                    </div>';
                })->rawColumns([ 'action','fullName'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }

    }

        public function edit($id)
        {
            $exam = Exam::find($id);
            $fac_id = $exam->faculty_id;
            $department = Department::where("faculty_id", $fac_id)->get();
            $faculty = Faculty::where("id", $fac_id)->get();
            $classes = DB::table('classes')->where("faculty_id", $fac_id)->get();
            $material = Material::where("faculty_id", $fac_id)->get();

            $semester = Semester::where("faculty_id", $fac_id)->get();
            $year = year::get();
            $data = [
                "exam"=> $exam,
                "department" => $department,
                "faculties" => $faculty,
                "classes" => $classes,
                "material" => $material,
                "semester" => $semester,
                "year"=>$year
            ];
            return view('panel.exam.edit')->with('data',$data);
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

                $oldFile = \App\File::where('file_name','like',$exam->file)->first();
                if($oldFile){
                    if(file_exists('faculty/exams/'.$oldFile->file_name))
                    {
                        Storage::delete('faculty/exams/'.$oldFile->file_name)->delete();
                    }
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

            //$exam = Exam::updateOrCreate(['id' => $id], $request->all());

            return (isset($exam)) ? $this->response_api(true, 'تم تعديل بيانات الأمتحان بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
        }



    public function delfile($id){
        $item = exam::find($id)->first();
        $item->file = NULL;
        $item->save();
        return 'Success';

    }


}

