@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>$faculty->name_ar,'link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'الكليات','link'=> ('panel.faculty.all')]));
@endphp

@extends('panel.layouts.index',['sub_title'=>'تعديل بيانات الكليه ' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'post','url'=>route('panel.faculty.edit',['id'=>$faculty->id]),'to'=>route('panel.faculty.all')]) !!}

        <div class="row">
            <div class="col-md-8">
                {{--<input type="hidden" id="photo" name="image" value="{{$post->image}}">--}}
                <div class="card">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <label>الأسم</label>
                            <input class="form-control"  type="text" name="name_ar" placeholder="لرجاء ادخل الاسم"  value="{{$faculty->name_ar}}" maxlength="20" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>الاسم باللغه الانجليزيه</label>
                            <input class="form-control"  type="text" name="name_en" placeholder="لرجاء ادخل الاسم"  value="{{$faculty->name_en}}" maxlength="20" required>
                        </fieldset>


                        <fieldset class="form-group">
                            <label>الحاله</label>
                            <select class="form-control" name="active" data-placeholder="إختيار التصنيف" required >
                                <option disabled selected hidden>إختيار الفاعليه</option>

                                <option value="0"  {{($faculty->active==0) ? 'selected' : ''  }} >موقوفه</option>
                                <option value="1"  {{($faculty->active==1) ? 'selected' : ''  }} >فعاله</option>


                            </select>
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