@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'أضف جديد ','link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'مديرى النظام','link'=> route('panel.users.all')]));
@endphp

@extends('panel.layouts.index',['sub_title'=>'إضافة  جديد' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'POST','url'=>route('panel.users.create'),'to'=>route('panel.users.all'),'enctype'=>('multipart/form-data')]) !!}
        <div class="row">
            <div class="col-md-8">
                 <div class="card">
                    <div class="card-body">

                        <div class="col-md-12">
                            <div class="form-group mt-20 mb-20">
                                <label><strong>نوع المسستخدم </strong></label><span><font color="red">*</font></span> <br>
                                <label class="radio-inline">
                                    <input type="radio"  value="1" name="user" id="radio-admin">
                                   مدير نظام
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="2" name="user" id="radio-user">
                                 مستخدم وحده فرعيه
                                </label>

                            </div>
                        </div>


                        @php
                            $items = get_fac_data();
                        @endphp

                        <fieldset class="form-group  hidden" id="sub-admin" >
                            <label>اسم الكليه </label>
                            <select class="form-control "  name="faculty_id" data-placeholder="إختيار الكليه" required>
                                <option disabled selected hidden>إختيار الكليه</option>
                                @if(isset($items) && $items->count() > 0)
                                    @foreach($items as $item)

                                        <option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>


                        <fieldset class="form-group">
                            <label>الأسم</label><span><font color="red">*</font></span>
                            <input class="form-control"  type="text" name="name" placeholder="الرجاء إدخال الأسم"  value="" maxlength="10" required >
                        </fieldset>

                        <fieldset class="form-group">
                            <label>اسم المستخدم</label><span><font color="red">*</font></span>
                            <input class="form-control"  type="text" name="username" id="username" placeholder="الرجاء إدخال اسم المستخدم"  value=""  maxlength="10" required >
                        </fieldset>


                        <fieldset class="form-group">
                            <label>البريد الألكترونى</label><span><font color="red">*</font></span>
                            <input class="form-control"  type="email" name="email" placeholder="الرجاء ادخال البريد الالكترونى"  value=""  maxlength="10" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>كلمه المرور</label><span><font color="red">*</font></span>
                            <input class="form-control"  type="password" name="password" id="password" placeholder="الرجاء إدخال كلمه المرور"  value="" maxlength="10" required >
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
                                <input class="form-control" id="choose-img" type="file" name="choose-img" value="الصوره"accept="image/gif,image/jpeg" >
                        </fieldset>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="margin-bottom: 30px">
                    <div class="card-body">
                        <div class="row btn_padding">
                            <button style="width: 90%" class=" btn btn-primary" >                                حفظ
                                &nbsp;<i class="fa fa-save"></i> &nbsp;
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

                $('#radio-user').change(function() {
                    $('#sub-admin').removeClass('hidden');
                });
                $('#radio-admin').change(function() {
                    $('#sub-admin').addClass('hidden');
                });
                $("#choose-img ").attr( 'text','nnnnnnnnnn');
            });

        </script>






    @endpush
@stop