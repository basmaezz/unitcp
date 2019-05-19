<?php

namespace App\Http\Controllers\units;

use App\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CreateClasses;
use App\faculty;
use Auth;
use App\traits\collections;

class ClassesController extends Controller
{

    public function index()
    {
               return view('panel.units.classes.all');
    }


    public function create()
    {
        $fac_id= Auth::user()->faculty_id;
        $items=Faculty::where('id',$fac_id)->get();

        return view('panel.units.classes.create',compact('items'));
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['classes'] = Classes::find($id);
//        dd($data['classes']['faculty']->name_ar);
        return (isset($data['classes'])) ? view('panel.units.classes.edit', $data) : redirect()->route(get_current_locale() . '.panel.dashboard');
    }
    public function update($id, CreateClasses $request)
    {
        $classes = classes::updateOrCreate(['id' => $id], $request->all());
        $status = ($classes) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, ' Classes', 'تم التعديل فى فصل الدراسى '.$classes->id, $classes, $status);

        return (isset($classes)) ? $this->response_api(true, 'تمت عمليه التعديل بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function store(CreateClasses $request)
    {
        $data= $request->except('_token');
        $classes = Classes::create($data);
        $status = ($classes) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, ' Classes', 'تم اضافه فصل داسى جديد '.$classes->name_ar, $classes, $status);
        return (isset($classes)) ? $this->response_api(true, 'تمت عمليه الاضافه  بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function delete($id)
    {
        $item = classes::find($id);
        $status = ($item) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, ' Classes', 'تم حذف فصل دراسى '.$item->name_ar, $item, $status);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }



    public function destroy($id)
    {
        //
    }

    public function get_fac_classes_data_table(classes $items){

        $fac_id= Auth::user()->faculty_id;
        $items=Classes::where('faculty_id',$fac_id)->get();

        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;

            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' .route('units.classes.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                      <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . units_url('classes/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }

    }
}
