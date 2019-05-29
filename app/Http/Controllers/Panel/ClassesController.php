<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClasses;
use Yajra\DataTables\DataTables;
use App\classes;
use App\faculty;
use App\traits\collections;

class ClassesController extends Controller
{
    use collections;
    public function index(){

        return view('panel.classes.all');
    }

    public function create()
    {
        $faculty= Faculty::get();

        return view('panel.classes.create',compact('faculty'));
    }

    public function edit($id)
    {
        $data['classes'] = Classes::find($id);
        return (isset($data['classes'])) ? view('panel.classes.edit', $data) : redirect()->route(get_current_locale() . '.panel.dashboard');
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

        return (isset($classes)) ? $this->response_api(true, 'تمت عمليه الاضافه  بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function delete($id)
    {
        $item = classes::find($id);
        $status = $item ? true : false;
        collections::log(auth()->user()->id , 'Classes', 'تم حذف بيانات فرقه دراسيه ', $item, $status);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function get_classes_data_table(classes $items){

        $items = $items ->orderBy('id', 'ASC')->get();
//        dd($items);

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
                      <a  title="Edit" style="margin-right: 10px"  href="' . route('panel.classes.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                   <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . admin_url('classes/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>

                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }

    }
}
