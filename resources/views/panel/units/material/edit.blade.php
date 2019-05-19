
@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>$data['material'][0]->name_ar,'link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'المواد الدراسيه','link'=>route('panel.material.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'تعديل الماده الدراسيه' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'PUT','url'=>lang_route('panel.material.edit',['id'=>$data['material'][0]->id]),'to'=>lang_route('panel.material.all')]) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">


                        <fieldset class="form-group">
                            <label>اسم الكليه </label>
                            <select class="form-control" name="faculty_id" data-placeholder="إختيار الكليه" required >
                                <option disabled selected hidden>إختيار الكليه</option>
                                @if(isset($data['faculties']) && ($data['faculties'])->count() > 0)
                                    @foreach(($data['faculties']) as $item)

                                        <option value="{{$item->id}}" selected>{{get_text_locale($item,'name_ar')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>


                        <fieldset class="form-group">
                            <label>اسم الفرقه </label>
                            <select class="form-control" select name="class_id" data-placeholder="إختيار الفرقه" required>
                                <option disabled selected hidden>اختيار الفرقه</option>
                                @if(isset($data['classes']) && ($data['classes'])->count() > 0)
                                    @foreach(($data['classes']) as $item)

                                        <option value="{{$item->id}}"  {{is_selected($item->id,$item->faculty_id) }} >{{get_text_locale($item,'name_ar')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>


                        <fieldset class="form-group">
                            <label>اسم القسم </label>
                            <select class="form-control"  name="department_id" data-placeholder="إختيار القسم" required>
                                <option disabled selected hidden>إختيار القسم</option>
                                @if(isset($data['department']) && ($data['department'])->count() > 0)
                                    @foreach(($data['department']) as $item)
                                        <option value="{{$item->id}}"  {{is_selected($item->id,$item->faculty_id) }} >{{get_text_locale($item,'name_ar')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>


                        <fieldset class="form-group">
                            <label>اسم الترم </label>
                            <select class="form-control" select name="semester_id" data-placeholder="إختيار الترم" required>
                                <option disabled selected hidden>إختيار الترم</option>
                                @if(isset($data['semester']) && $data['semester'])->count() > 0)
                                @foreach(($data['semester']) as $item)

                                    <option value="{{$item->id}}"  {{is_selected($item->id,$item->faculty_id) }} >{{get_text_locale($item,'name_ar')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>اسم الماده </label>
                            <input class="form-control"  type="text" name="name_ar" placeholder="لرجاء ادخل الاسم"  value="{{$data['material'][0]->name_ar}}" required>
                       </fieldset>

                        <fieldset class="form-group">
                            <label>اسم الماده </label>
                            <input class="form-control"  type="text" name="name_en" placeholder="لرجاء ادخل الاسم"  value="{{$data['material'][0]->name_en}}" required>
                        </fieldset>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="margin-bottom: 30px">
                    <div class="card-body">
                        <div class="row btn_padding">
                            <button style="width: 90%" class=" btn btn-primary">حفظ&nbsp; &nbsp;
                                <i style="top: inherit;left: AUTO;" class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}

    </div>

    @push('top_js')
        {!! HTML::script(asset('/js/app.js')) !!}
    @endpush

    @push('panel_js')

        {!! HTML::script('panel/js/jasny-bootstrap.min.js') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        {!! HTML::script('panel/plugins/summernote/summernote-bs4.js') !!}
        {!! HTML::script('/panel/js/post.js') !!}

    @endpush
@stop