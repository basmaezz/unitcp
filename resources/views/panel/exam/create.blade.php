@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'اضافه امتحان ','link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'مستودع الامتحانات','link'=> route('panel.exam.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'مستودع الامتحانات' ,'breadcrumb_array'=> $breadcrumb_array])

@section('main')
    @push('panel_css')
        <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
        {!! HTML::style('/panel/css/select2/select2.min.css') !!}
        {!! HTML::style('/panel/css/select2/select2-bootstrap.min.css') !!}
    @endpush
    @if(\App\config::where('name', 'upload')->first()->config == 'off')
    <div class="content">
       <div class="container">
           <div class="row">
               <div class="col-lg-9 col-md-6 m-b-3">
                   <div class="widget-info bg-danger">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-6 text-white">
                                   <p>اضافه امتحان موقوف حاليا </p>
                                   <h2 class="font-weight-bold"></h2>
                                 </div>
                               <div class="col-md-6 m-t-2 text-right">  </div>
                           </div>
                       </div>
                   </div>
               </div>
               {{--<img src="{{url('settings/under-upgrade.jpg')}}" style="float: right; padding-right: -10px;">--}}
           </div>

       </div>
    </div>
    @else

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'POST','url'=>route('panel.exam.create'),'to'=>route('panel.exam.main'),'enctype'=>('multipart/form-data')]) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        @php
                            $items = get_fac_data();
                        @endphp

                        <fieldset class="form-group">
                            <label>اسم الكليه </label>
                            <select class="form-control faculty" name="faculty" data-placeholder="إختيار الكليه" id="faculty_id" required>
                                <option disabled selected hidden>إختيار الكليه</option>
                                @if(isset($items) && $items->count() > 0)
                                    @foreach($faculty as $item)
                                        <option value="{{$item->id}}"  >{{get_text_locale($item,'name_ar')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>

                        <div id="selectors_div">
                            @include('panel.exam.exam-selectors')
                        </div>

                        <fieldset class="form-group">
                            <label>اسم التاج </label>

                                <div class="input-group select2-bootstrap-append">
                                    <select id="multi-append" data-tags="true" class="form-control select2" multiple name="tags[]">

                                        <option>إختر التاج</option>

                                        @if(isset($tag) && $tag->count() > 0)
                                            @foreach($tag as $item)
                                                <option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>
                                            @endforeach
                                        @endif

                                    </select>

                                </div>

                        </fieldset>
                        <fieldset class="form-group">
                            <label>كلمات البحث</label>
                            <textarea class="form-control " rows="4" type="text" name="key_search_ar" placeholder="الرجاء إدخال كلمات البحث" ></textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>كلمات البحث باللغه الانجليزيه</label>
                            <textarea class="form-control " rows="4" type="text" name="key_search_en" placeholder="الرجاء إدخال كلمات البحث باللغه الانجليزيه" ></textarea>
                        </fieldset>

                        @if(\App\config::where('name', 'upload')->first()->config == 'on')
                        <input type="hidden" id="exam_file_name" name="fexam">
                        <div id="fileuploader" class="hidden">
                            <input type="file" name="file">
                        </div>
                            @else
                            <h5>رفع الملفات موقوف حاليا</h5>
                        @endif

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
    @endif


    @push('panel_js')

        {!! HTML::script('panel/js/jasny-bootstrap.min.js') !!}
        {!! HTML::script('panel/js/jasny.js') !!}
        {!! HTML::script('panel/plugins/summernote/summernote-bs4.js') !!}
        {!! HTML::script('/panel/js/post.js') !!}
        {!! HTML::script(asset('/js/app.js')) !!}
        {!! HTML::script(asset('/panel/js/select2.full.min.js')) !!}
        {!! HTML::script(asset('/panel/js/app.min.js')) !!}
        {!! HTML::script(asset('/panel/js/components-select2.min.js')) !!}

        <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
        <script>
            $(document).ready(function()
            {
                $(document).on('change','.faculty',function () {
                    var cid = $('.faculty option:selected').val();
                    event.preventDefault();
                    if(cid  > 0)
                    {
                        $('#fileuploader').removeClass('hidden');
                        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        /*$("#fileuploader").uploadFile({
                            url:"{{url('admin/file/upload')}}",
                            multiple:false,
                            dragDrop:false,
                            formData: { _token: '{{csrf_token()}}',facid:cid },
                            maxFileCount:1,
                            fileName:"file",
                            onSuccess:function(files,data,xhr,pd)
                            {
                                $('#exam_file_name').val(data.file_name);
                            }
                        });*/
                    }
                });
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>





    @endpush
@stop