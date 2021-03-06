<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClasses;
use Yajra\DataTables\DataTables;
use App\Classes;
use App\Faculty;
use App\traits\collections;
use Auth;
use App\Notifications\MyFirstNotification;
use DB;

class ClassesController extends Controller
{
    use collections;
    public function index(){




        return view('panel.classes.all');
    }

    public function create()
    {
        if (Auth::user()->has('faculty') && !empty(Auth::user()->faculty)) {
            $faculty = Faculty ::where('id', Auth::user()->faculty_id)->orderBy('id', 'ASC')->get();
        } else {
            $faculty = Faculty ::orderBy('id', 'ASC')->get();
        }
//        $faculty= Faculty::get();

        return view('panel.classes.create',compact('faculty'));
    }

    public function edit($id)
    {
        $data['classes'] = Classes::find($id);

        $fac_id = $data['classes']->faculty_id;
        $faculty = Faculty::where("id", $fac_id)->get();
        $classes = DB::table('classes')->where("faculty_id", $fac_id)->get();
        $data = [
            "faculties" => $faculty,
            "classes" => $classes,
        ];
//        dd($data);
        session()->flash('response', __('تم تعديل البيانات بنجاح'));
        return view('panel.classes.edit')->with('data',$data);
//        return (isset($data['classes'])) ? view('panel.classes.edit', $data) : redirect()->route(get_current_locale() . '.panel.dashboard');
    }

    public function update($id, CreateClasses $request)
    {
        $classes = classes::updateOrCreate(['id' => $id], $request->all());
        $status = $classes ? true : false;
        collections::log(auth()->user()->id , 'Classes', 'تم تعديل بيانات فرقه دراسيه ', $classes, $status);

             return (isset($classes)) ? $this->response_api(true, 'تمت عمليه التعديل بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function store(CreateClasses $request)
    {
        $data= $request->except('_token');
        $classes = Classes::create($data);
        $status = $classes ? true : false;
        collections::log(auth()->user()->id , 'Classes', 'تم اضافه فرقه دراسيه جديده', $classes, $status);
//        auth()->user()->notify(new MyFirstNotification($classes) );


        return (isset($classes)) ? $this->response_api(true, 'تمت عمليه الاضافه  بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function delete($id)
    {
        $item = classes::find($id);
        $status = $item ? true : false;
        collections::log(auth()->user()->id , 'Classes', 'تم حذف بيانات فرقه دراسيه ', $item, $status);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function get_classes_data_table(classes $items, Request $request){


        if (Auth::user()->has('faculty') && !empty(Auth::user()->faculty)) {
            $items = $items->where('faculty_id', Auth::user()->faculty_id)->orderBy('id', 'ASC')->get();
        } else {
            $items = $items->orderBy('id', 'ASC')->get();
        }


        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;
            })->editColumn('faculty_id', function ($item) {
                if(!empty($item->faculty))                {
                    return ($item['faculty']->name_ar);
                } else {
                    return 'مدير نظام';
                }
            })->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);

            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' . route('panel.classes.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                   <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . admin_url('classes/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>

                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }

    }


}
