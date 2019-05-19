@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'الاعدادات ','link'=> '#']));
@endphp

@extends('panel.layouts.index',['sub_title'=>'الاعدادات' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('/panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('/panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'POST','url'=>route('updateconfig')]) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <label>اسم الموقع</label>


                            <input class="form-control"  type="text" name="name_ar" placeholder="الرجاء إدخال الأسم" value="{{ \App\Config::where('name', 'site_name')->first()->config}}">

                        </fieldset>

                        <fieldset class="form-group">
                            <label>ايقاف التحميل</label> <br><br>
                            <div class="radio" name="upload">
                                <label>
                                    <input type="radio" name="upload" value="off"
                                           {{ \App\Config::where('name', 'upload')->first()->config == 'off' ? "checked" : ""}}> ايقاف
                                        <input type="radio" name="upload" value="on"
                                       {{ \App\Config::where('name', 'upload')->first()->config == 'on' ? "checked" : ""}}> تشغيل



                                </label>
                            </div>

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

<script>


    $(document).ready(function() {

        $('select[name="upload"]').on('change', function(){


                $.ajax({
                    url: '/admin/exam/create/getExamData/',
                    type:"GET",
                    dataType:"json",
                    success:function(response) {
                        if(response.status)
                        {
                            // alert('ok');
                            $('#selectors_div').html(response.item);
                        }
                    },

                });


        });



    });




</script>
    @endpush
@stop