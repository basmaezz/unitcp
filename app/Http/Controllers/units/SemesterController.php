<?php

namespace App\Http\Controllers\units;

use App\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CreateSemester;
use App\Semester;
use App\Faculty;
use auth;
use App\traits\collections;

class SemesterController extends Controller
{

    public function index()
    {
        $fac_id= Auth::user()->faculty_id;
        $items=Semester::where('faculty_id',$fac_id)->get();

        return view('panel.units.semester.all');
    }


    public function create()
    {
        $fac_id= Auth::user()->faculty_id;
        $items=Faculty::where('id',$fac_id)->get();
        $status = ($items) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, 'Semester', 'Create '.$items->id, $items, $status);
        return view('panel.units.semester.create',compact('items'));
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $data['semester'] = Semester::find($id);

        return (isset($data['semester'])) ? view('panel.units.semester.edit', $data) : redirect()->route(get_current_locale() . '.panel.dashboard');
    }

    public function update($id, CreateSemester $request)
    {
        $semester = Semester::updateOrCreate(['id' => $id], $request->all());
        $status = ($semester) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, 'Semester', 'update '.$semester->id, $semester, $status);

        return (isset($semester)) ? $this->response_api(true, 'تمت عمليه التعديل بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function store(CreateSemester $request)
    {
        $data= $request->except('_token');
        $classes = Semester::create($data);
        $status = ($classes) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, 'Semester', 'Create '.$classes->id, $classes, $status);

        return (isset($classes)) ? $this->response_api(true, 'تمت عمليه الاضافه  بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function delete($id)
    {
        $item = Semester::find($id);
        $status = ($item) ?  'Success' : 'Failed';
        Collections::log(Auth::user()->id, 'Semester', 'Create '.$item->id, $item, $status);

        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }



    public function destroy($id)
    {
        //
    }

    public function get_fac_semester_data_table(semester $items){

        $fac_id= Auth::user()->faculty_id;
        $items=Semester::where('faculty_id',$fac_id)->get();
//        dd($items);

        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;

            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' .route('units.semester.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                      <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . units_url('Semester/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }

    }
}
