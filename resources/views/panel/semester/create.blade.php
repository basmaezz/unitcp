@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'أضف فصل دراسى جديد','link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'الفصول الدراسيه','link'=> route('panel.semester.all')]));
@endphp

@extends('panel.layouts.index',['sub_title'=>'إضافة فصل دراسى جديد' ,'breadcrumb_array'=> $breadcrumb_array])

@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'POST','url'=>route('panel.semester.create'),'to'=>route('panel.semester.all')]) !!}
        <div class="row">
            <div class="col-md-8">
                {{--<input type="hidden" id="photo" name="image" value="{{$post->image}}">--}}
                <div class="card">
                    <div class="card-body">

                        @php
                            $items = get_fac_data_user();
                        @endphp

                       <fieldset class="form-group">
                            <label>اختر الكليه</label><font color="red">*</font></span>
                            <select class="form-control" name="faculty_id" data-placeholder="إختيار الكليه" required >

                                <option disabled selected hidden>اختيار الكليه</option>
                                @foreach($faculty as $items)
                                    <option value="{{$items->id}}" name="faculty_id" @if($items->id == Auth::user()->faculty_id)selected @endif>{{$items->name_ar}}</option>
                                @endforeach
                            </select>
                        </fieldset>
                        <fieldset class="form-group"><font color="red">*</font></span>
                            <label>الأسم</label>
                            <input class="form-control"  type="text" name="name_ar" placeholder="الرجاء إدخال الأسم"  value="" maxlength="20" required >
                        </fieldset>

                        <fieldset class="form-group"><font color="red">*</font></span>
                            <label>الاسم باللغه الانجليزيه</label>
                            <input class="form-control"  type="text" name="name_en" placeholder="الرجاء الاسم باللغه الانجليزيه"  value="" maxlength="20" required>

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