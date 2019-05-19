@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'اضافه امتحان ','link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'مستودع الامتحانات','link'=> lang_route('panel.exam.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'مستودع الامتحانات' ,'breadcrumb_array'=> $breadcrumb_array])

@section('main')
    @push('panel_css')
        <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'POST','url'=>route('units.exam.create'),'to'=>route('units.exam.main')]) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <fieldset class="form-group">
                            <label>اسم الكليه </label>
                            <select class="form-control faculty" name="faculty" data-placeholder="إختيار الكليه" id="faculty_id" required>
                                <option disabled selected hidden>إختيار الكليه</option>
                                @if(isset($data['faculty']) && ($data['faculty'])->count() > 0)
                                    @foreach(($data['faculty']) as $item)
                                        <option value="{{$item->id}}" selected>{{get_text_locale($item,'name_ar')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>


                        <div id="selectors_div">
                            @include('panel.units.exam.exam-selectors')
                        </div>

                        <fieldset class="form-group">
                            <label>كلمات البحث</label>
                            <textarea class="form-control " rows="4" type="text" name="key_search_ar" placeholder="الرجاء إدخال كلمات البحث" ></textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>كلمات البحث باللغه الانجليزيه</label>
                            <textarea class="form-control " rows="4" type="text" name="key_search_en" placeholder="الرجاء إدخال كلمات البحث باللغه الانجليزيه" ></textarea>
                        </fieldset>


                        <input type="hidden" id="exam_file_name" name="fexam">
                        <div id="fileuploader" class="">
                            <input type="file" name="file">
                        </div>


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


    @push('panel_js')

        {!! HTML::script('panel/js/jasny-bootstrap.min.js') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        {!! HTML::script('panel/plugins/summernote/summernote-bs4.js') !!}
        {!! HTML::script('/panel/js/post.js') !!}
        {!! HTML::script(asset('/js/app.js')) !!}

        <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>

        <script>
            $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            });
        </script>

        <script>

        </script>





    @endpush
@stop