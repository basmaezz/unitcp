<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Faculty;
use App\Exam;
use App\Year;
use App\classes;
use App\Department;
use App\User;
use DB;
use App\Comment;

class HomeController extends Controller
{

    public function Index()
    {
        $exams = Exam::orderBy('id', 'desc')->take(4)->get();
//        dd($exams);
        $examcount=Exam::all()->count();
        $user=User::all()->count();
        $faculty=Faculty::all()->count();

        return view('public.Index',compact('exams','examcount','user','faculty'));
    }

    public function getall()
    {
        return view('panel.public.all');
    }

    public function get_exam_search_data_table(exam $items, Request $request)
    {
        //dd(request()->id);
          $items=Exam::Where('faculty_id', \request()->id)->get();
        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;

            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' .route('panel.exam.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تحميل</a>
                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }

    public function get_exam_search(Request $request)
    {
//        $request->validate([
////            'txtsearch'=>'required'
////        ]);
///
        $txtsearch=$request->txtsearch;

        $items= Exam::with('tags')->where('file', 'like', '%' . $txtsearch . '%')
            ->orWhere('key_search_ar', 'like', '%' . $txtsearch . '%')
            ->orWhere('key_search_en', 'like', '%' . $txtsearch. '%')
            ->orWhereHas('tags',function($query) use ($txtsearch){
                $query->where('name_en', 'like', '%' . $txtsearch. '%')
                    ->orWhere('name_ar', 'like', '%' . $txtsearch. '%');
            })->get();

//        dd($items);
        if(!empty($items)){
            return view('public.search')->with(['item'=>$items ,'txtsearch'=>$txtsearch]);
        }
        else{
            $items = Exam::orderBy('id', 'desc')->take(4)->get();
            return view('panel.search')->with(['item'=>$items ,'txtsearch'=>'']);
        }

    }

//    public function get_exam_search(Request $request)
//    {
//        $items=Exam::Where('faculty_id', request('id'))->get();
//        return view('panel.public.all',['item'=>$items]);
//    }

    public function getExamData(Request $request)
    {
        $faculty=Exam::Where('faculty_id', $request->faculty)->get();
        $items=[];
        foreach($faculty as $fac) {
            $json = json_decode($fac);
            if(!empty($request->class_id) && $json->class_id == $request->class_id)
            {
                $items[] = $json;
                continue;
            }

            if(!empty($request->semester_id) && $json->semester_id == $request->semester_id) {
                foreach ($items as $item){
                    if (!empty($items->id) && $json->id == $items->id) {
                        continue;
                    }
                }
                $items[] = $json;
            }

            if(!empty($request->department_id) && $json->semester_id == $request->department_id) {
                foreach ($items as $item){
                    if (!empty($items->id) && $json->id == $items->id) {
                        continue;
                    }
                }
                $items[] = $json;
            }

            if(!empty($request->material_id) && $json->material_id == $request->material_id) {
                foreach ($items as $item){
                    if (!empty($items->id) && $json->id == $items->id) {
                        continue;
                    }
                }
                $items[] = $json;
            }
            if(!empty($request->year_id) && $json->year_id == $request->year_id) {
                foreach ($items as $item){
                    if (!empty($items->id) && $json->id == $items->id) {
                        continue;
                    }
                }
                $items[] = $json;
            }
            if(empty($request->class_id) && empty($request->semester_id)&& empty($request->department_id)&& empty($request->material_id)&& empty($request->year_id)) {
                $items[] = $json;
            }

        }

        return view('panel.public.all',['item'=>$items]);
    }

    public function getDownload(Request $request)
    {
        $num = Exam::find($request->id);
        $num->download_num = $num->download_num+1;
        if($num->save())
        {
            return url('storage/faculty/exams/'.$num->file);
        }
        return 'FAILED';
    }

    public function home(){
        $downloads = Exam::orderBy('download_num','desc')->paginate(5);
        $latest= Exam::orderBy('created_at','desc')->paginate(5);
        return view('panel.public.frontend', compact('downloads','latest'));
    }

    public function mostDownload(){

    }


    public function getsearchExamData($id)
    {


        $classes = classes::where("faculty_id", $id)->get();
//        dd($classes);
        $department = DB::table("departments")->where("faculty_id", $id)->get();
        $classes = DB::table("classes")->where("faculty_id", $id)->get();
        $materials = DB::table("materials")->where("faculty_id", $id)->get();
        $semesters = DB::table("semesters")->where("faculty_id", $id)->get();
        $year = DB::table("years")->get();

        $data = ["classes" => $classes, "department" => $department, "materials" => $materials, "semesters" => $semesters, "year" => $year];

        $view = view('public.fac-exam', $data)->render();
        return response()->json(['status' => true, 'item' => $view]);

//        $exams = ['exams' => Exam::where('faculty_id', $id)->paginate(3)];
//        $exams_v = view('public.exam-result', $exams)->render();
//        $exams_v_pag_v = view('public.paginate', $exams)->render();
//        return response()->json(['status' => true, 'item' => $view, 'exams' => $exams_v, 'paginate' => $exams_v_pag_v]);
        return response()->json(['status' => true, 'item' => $view, 'exams' => $exams_v, 'paginate' => $exams_v_pag_v]);
    }

    public function getsearchExam($deid = null, $classid = null, $yearid = null)
    {
        $exams = [];
        if($deid =! NULL)
        {
            $exams = Exam::where('department_id', $deid)->get();
        }

        if($classid =! NULL && $deid =! NULL)
        {
            $exams = Exam::where('department_id', $deid)->where('class_id', $classid)->get();
        }
        if($yearid =! NULL && $classid =! NULL && $deid =! NULL)
        {
            $exams = Exam::where('department_id', $deid)->where('class_id', $classid)->where('year_id', $yearid)->get();
        }
        $exams = ['exams' => $exams];
        $exams_v = view('public.exam-result', $exams)->render();
        return response()->json(['exams' => $exams_v]);
    }

   public function viewpdf($id){

        $exam= Exam::find($id);
        $comments= Comment::where('exam_id',$id)->orderBy('id', 'desc')->get();


        return view('public.view-exam',compact('exam','comments'));
   }

   public function recent(){
       $exams = Exam::orderBy('id', 'desc')->take(4)->get();

       return view('public.recent-exams',compact('exams'));

    }

    public function popular(){
        $exams = Exam::orderBy('id', 'desc')->take(4)->get();

        return view('public.popular-exams',compact('exams'));

    }


}
