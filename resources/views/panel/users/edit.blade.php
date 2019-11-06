@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>$user->name,'link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'مديرى النظام','link'=> ('panel.users.all')]));
@endphp

@extends('panel.layouts.index',['sub_title'=>'تعديل بيانات ' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'PUT','url'=>route('panel.users.edit',['id'=>$user->id]),'to'=>route('panel.users.all'),'enctype'=>('multipart/form-data')]) !!}

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="col-md-12">
                            <div class="form-group mt-20 mb-20">
                                <label><strong>نوع المسستخدم </strong></label> <br>
                                @if(!isset($user->faculty_id))
                                <label class="radio-inline">
                                    <input type="radio"  value="0" name="user" id="radio-admin"checked disabled >
                                    مدير نظام
                                </label>
                                @endif
                                @if(isset($user->faculty_id))
                                <label class="radio-inline">
                                        <input type="radio" value="1" name="user" id="radio-user" checked disabled >
                                        مستخدم وحده فرعيه
                                    </label>
                            </div>
                        </div>


                        @php
                            $items = get_fac_data();
                        @endphp

                        <fieldset class="form-group " id="sub-admin" >
                            <label>اسم الكليه </label>
                            <select class="form-control "  name="faculty_id" data-placeholder="إختيار الكليه"required >
                                <option disabled selected hidden>إختيار الكليه</option>
                                @if(isset($items) && $items->count() > 0)
                                    @foreach($items as $item)
{{--                                        <option value="{{$item->id}}" {{is_selected($item->id,$user->faculty_id)}} >{{get_text_locale($item,'name_ar')}}</option>--}}
                                        <option value="{{$item->id}}" {{is_selected($item->id,$user->faculty_id)}} >{{$item->name_ar}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>
                        @endif

                        <fieldset class="form-group">
                            <label>الأسم</label><span><font color="red">*</font></span>
                            <input class="form-control"  type="text" name="name" placeholder="الرجاء إدخال الأسم"  value="{{$user->name}}" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label> أسم المستخدم</label><span><font color="red">*</font></span>
                            <input class="form-control"  type="text" name="username" placeholder="الرجاء إدخال اسم المستخدم"  value="{{$user->username}}" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>البريد الألكترونى</label><span><font color="red">*</font></span>
                            <input class="form-control"  type="text" name="email" placeholder="الرجاء ادخال البريد الالكترونى"  value="{{$user->email}}" required >
                        </fieldset>

                        <fieldset class="form-group">
                            <label>كلمه المرور</label><span><font color="red">*</font></span>
                            <input class="form-control"  type="password" name="password" placeholder="" value=""   required >
                        </fieldset>

                        <p style="color: #0d6aad;">اعاده تعيين كلمه المرور!</p>

                        {{--<fieldset class="form-group">--}}
                            {{--<label class="btn btn-outline-primary" id="chang-pw" > اعاده تعيين كلمه المرور</label>--}}
                        {{--</fieldset>--}}

                        <fieldset class="form-group hidden" id="chg-pw">
                            <label>كلمه المرور الجديده</label>
                            <input class="form-control"  type="password" name="repeat_pw" novalidate placeholder="الرجاء إدخال كلمه المرور"  value="" >
                        </fieldset>


                        <fieldset class="form-group">
                            <label>الحاله</label>
                            <select class="form-control" name="active" data-placeholder="إختيار الفاعليه" >
                                <option disabled selected hidden>إختيار الفاعليه</option>
                                <option value="0"  {{($user->active==0) ? 'selected' : ''  }} >موقوف</option>
                                <option value="1"  {{($user->active==1) ? 'selected' : ''  }} >فعال</option>

                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>الصوره الشخصيه</label>
                            <input class="form-control"  type="file" name="img">
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

        {{--</script>--}}
        <script>
            $(document).ready(function(){
                $("p").click(function(){
                    $('#chg-pw').removeClass('hidden');
                });
            });
        </script>

    @endpush
@stop