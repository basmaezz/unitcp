@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'الرئيسيه','link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'مستودع الامتحانات','link'=> route('panel.department.all')]));
@endphp

@extends('panel.layouts.index',['sub_title'=>'مستودع الامتحانات | الرئيسيه' ,'breadcrumb_array'=> $breadcrumb_array])

@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">

<div class="row">
    <div class="col-lg-8">
        <div class="info-box">
            <div class="col-12">
                <h5>أحدث الأمتحانات المرفوعه</h5>
                <div class="row m-t-6 m-b-6">
                    @foreach($latest as $key => $last)

                    <div class="col-md-9">
                        <td ><h6 class="text-blue font-weight-bold">
                                {{ getFullNamearray($last->faculty_id, $last->class_id, $last->material_id, $last->semester_id, $last->year_id) }}</h6></td>

                    </div><br>
                    <div class="col-md-3">
                        <a title="Download" href="{{ url('storage/faculty/exams/'.$last->faculty_id ."/".$last->department_id."/".
                            $last->class_id ."/".$last->semester_id ."/".$last->material_id ."/".$last->year_id ."/".$last->files($last->file)) }}" target="_blank" style="margin-right: 9px;
    height: 42px; margin-bottom: 6px; " data-id="{{ $last->id }}"  class="btn btn-primary download" > تحميل </a>

                    </div>
                        @endforeach
                </div>
            </div>
            <div id="earning"></div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card m-b-3">
            <div class="card-body">
                <div class="m-b-3 font-weight-bold">
                    <h5>الأحصائيات
                        <button type="button" class="btn btn-sm btn-rounded btn-info pull-left">250</button>
                    </h5>
                </div>
                <div><i class="f-20 ti-upload text-aqua"></i>عدد الأمتحانات المرفوعه
                <h7 class="text-blue font-weight-bold"> {{$examcount}}</h7>
                </div>
                <div><i class="f-20 ti-upload text-aqua"></i> عدد الزيارات
                    <h7 class="text-blue font-weight-bold"> {{$visitorcount}}</h7>
                </div>
            </div>
        </div>

    </div>
</div>


        <div class="row">
            <div class="col-lg-8">
                <div class="info-box">
                    <div class="col-12">
                        <h5>أكثر الأمتحانات تحميلا</h5>
                        <div class="row m-t-6 m-b-6">
                            @foreach($downloads as $key => $down)

                                <div class="col-md-9">
                                    <td ><h6 class="text-blue font-weight-bold">
                                            {{ getFullNamearray($last->faculty_id, $last->class_id, $last->material_id, $last->semester_id, $last->year_id) }}</h6></td>

                                </div><br>
                                <div class="col-md-3">
                                    <a title="Download" href="{{ url('storage/faculty/exams/'.$last->faculty_id ."/".$last->department_id."/".
                            $last->class_id ."/".$last->semester_id ."/".$last->material_id ."/".$last->year_id ."/".$last->files($last->file)) }}" target="_blank" style="margin-right: 9px;
    height: 42px; margin-bottom: 6px; " data-id="{{ $last->id }}"  class="btn btn-primary download" > تحميل </a>

                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="earning"></div>
                </div>
            </div>

        </div>

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
<!-- /.row -->