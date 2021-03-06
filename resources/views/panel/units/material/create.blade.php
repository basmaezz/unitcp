@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'اضافه ماده دراسيه ','link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'المواد الدراسيه','link'=>route('units.material.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'المواد الدراسيه' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'POST','url'=>route('units.material.create'),'to'=>route('units.material.all')]) !!}
        <div class="row">
            <div class="col-md-8">
                 <div class="card">
                    <div class="card-body">


                        <fieldset class="form-group">
                            <label>اسم الكليه </label>
                            <select class="form-control" name="faculty_id" data-placeholder="إختيار الكليه" required >
                                <option disabled selected hidden>إختيار الكليه</option>
                                @if(isset($data['faculty']) && ($data['faculty'])->count() > 0)
                                    @foreach(($data['faculty']) as $item)
                                        <option value="{{$item->id}}" selected>{{get_text_locale($item,'name_ar')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>

                        <div id="selectors_div">
                            @include('panel.units.material.fac-selectors')
                        </div>

                        <fieldset class="form-group">
                            <label>الأسم</label>
                            <input class="form-control"  type="text" name="name_ar" placeholder="الرجاء إدخال الأسم"  value="" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>الاسم باللغه الانجليزيه</label>
                            <input class="form-control"  type="text" name="name_en" placeholder="الرجاء الاسم باللغه الانجليزيه"  value="" required>
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