{{--@php--}}
    {{--$breadcrumb_array = [];--}}
    {{--array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'أضف جديد ','link'=> '#']));--}}
    {{--array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'الطلاب','link'=> route('panel.students.all')]));--}}
{{--@endphp--}}

@extends('panel.layouts.index',['sub_title'=>'إضافة طالب جديد' ])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'POST','url'=>route('panel.users.create'),'to'=>route('panel.students.all'),'enctype'=>('multipart/form-data')]) !!}
        <div class="row">
            <div class="col-md-8">
                {{--<input type="hidden" id="photo" name="image" value="{{$post->image}}">--}}
                <div class="card">
                    <div class="card-body">


                        <fieldset class="form-group">
                            <label>اسم الطالب</label><font color="red">*</font></span>
                            <input class="form-control"  type="text" name="name" id="name"  placeholder="الرجاء إدخال اسم المستخدم"  value="" maxlength="10" required>
{{--                            <input class="form-control"  type="text" name="name" placeholder="الرجاء إدخال الأسم"  value="" maxlength="20" required >--}}
                        </fieldset>

                        <fieldset class="form-group">
                            <label>اسم المستخدم</label><font color="red">*</font></span>
                            <input class="form-control"  type="text" name="username" id="username"  placeholder="الرجاء إدخال اسم المستخدم"  value="" maxlength="10" required>
                        </fieldset>


                        <fieldset class="form-group">
                            <label>البريد الألكترونى</label><font color="red">*</font></span>
                            <input class="form-control"  type="email" name="email" placeholder="الرجاء ادخال البريد الالكترونى"  value="" required >
                        </fieldset>

                        <fieldset class="form-group">
                            <label>كلمه المرور</label><font color="red">*</font></span>
                            <input class="form-control"  type="password" name="password" id="password" placeholder=""  value="" maxlength="10" required>
                        </fieldset>


                        @php
                            $items = get_fac_data();
                        @endphp

                        <fieldset class="form-group  " id="sub-admin" >
                            <label>اختر الكليه </label><font color="red">*</font></span>
                            <select class="form-control "  name="faculty_id" data-placeholder="إختيار الكليه" >
                                <option disabled selected >إختيار الكليه</option>
                                @if(isset($items) && $items->count() > 0)
                                    @foreach($items as $item)

                                        <option value="{{$item->id}}" >{{$item->name_ar}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>الحاله</label>
                            <select class="form-control" name="active" data-placeholder="إختيار التصنيف" >
                                <option disabled selected hidden>اختيار الحاله</option>

                                <option value="1" name="active">فعال</option>
                                <option value="0" name="active">موقوف</option>
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>الصوره الشخصيه</label>
                            <input class="form-control"  type="file" name="img" placeholder="اختر الملف" value="اختر الصوره"accept="image/gif,image/jpeg">
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="margin-bottom: 30px">
                    <div class="card-body">
                        <div class="row btn_padding">
                            <button style="width: 90%" class=" btn btn-primary"> &nbsp; حفظ<i class="fa fa-save"></i> &nbsp;
                                <i style="top: inherit;left: AUTO;" class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  "></i></button>


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

                $('#radio-user').change(function() {
                    $('#sub-admin').removeClass('hidden');
                });
                $('#radio-student').change(function() {
                    $('#sub-admin').removeClass('hidden');
                });
                $('#radio-admin').change(function() {
                    $('#sub-admin').addClass('hidden');
                });

            });

        </script>


        <script>
            $(document).ready(function() {

                var username = document.getElementById('username');
                var password = document.getElementById('password');


                username.value = 'الرجاء إدخال اسم المستخدم';
                // password.value = '';


            });
        </script>




    @endpush
@stop