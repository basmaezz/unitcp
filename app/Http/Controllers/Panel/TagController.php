<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Material;
use App\Faculty;
use App\Tag;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CreateTag;

class TagController extends Controller
{
    public function index(){
        return view('panel.tag.all');
    }

    public function create()
    {
        return view('panel.tag.create');

    }

    public function store(CreateTag $request)
    {

        $tag = Tag::create($request->all());

        return (isset($tag)) ? $this->response_api(true, 'تم إضافة  تاج جديد بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }



    public function edit($id)
    {
        $data['tag'] = Tag::find($id);
        return (isset($data['tag'])) ? view('panel.tag.edit', $data) : redirect()->route(get_current_locale() . '.panel.dashboard');
    }


    public function update($id, CreateTag $request)
    {
        $tag = Tag::updateOrCreate(['id' => $id], $request->all());

        return (isset($tag)) ? $this->response_api(true, 'تم تعديل بيانات التاج بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }



    public function delete($id)
    {
        $item = Tag::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }

    public function get_tag_data($id)
    {
        $item = Tag::find($id);
        return (isset($item)) ? $this->response_api(true, 'success', $item) : $this->response_api(false, 'success');
    }

    public function get_tag_data_table(tag $items)
    {
        $items = $items->get();


        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;


            })->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);

            })->addColumn('action', function ($item) {
                return '<div class="row">
                      <button title="Edit" style="margin-right: 10px" data-id="' . $item->id . '" data-toggle="modal" data-target="#edit_modal"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</button>

                    </div>';

            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }
}
