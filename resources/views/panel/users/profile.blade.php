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
        {!! Form::open(['id'=>'form','method'=>'post','url'=>route('panel.users.editprofile',['id'=>$user->id]),'to'=>route('panel.dashboard'),'enctype'=>('multipart/form-data')]) !!}

        <div class="row">
            <div class="col-md-8">
                {{--<input type="hidden" id="photo" name="image" value="{{$post->image}}">--}}
                <div class="card">
                    <div class="card-body">



                        <fieldset class="form-group">
                            <label>الأسم</label>
                            <input class="form-control"  type="text" name="name" placeholder="الرجاء إدخال الأسم"  value="{{$user->name}}" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label> أسم المستخدم</label>
                            <input class="form-control"  type="text" name="username" placeholder="الرجاء إدخال اسم المستخدم"  value="{{$user->username}}" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>البريد الألكترونى</label>
                            <input class="form-control"  type="text" name="email" placeholder="الرجاء ادخال البريد الالكترونى"  value="{{$user->email}}" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>كلمه المرور</label>
                            <input class="form-control"  type="password" name="password" placeholder="الرجاء إدخال كله المرور"  value="" required>
                        </fieldset>

                        <p style="color: #0d6aad;">اعاده تعيين كلمه المرور!</p>

                        {{--<fieldset class="form-group">--}}
                        {{--<label class="btn btn-outline-primary" id="chang-pw" > اعاده تعيين كلمه المرور</label>--}}
                        {{--</fieldset>--}}

                        <fieldset class="form-group hidden" id="chg-pw">
                            <label>كلمه المرور الجديده</label>
                            <input class="form-control"  type="password" name="repeat_pw" novalidate placeholder="الرجاء إدخال كله المرور"   >
                        </fieldset>

                        {{--<fieldset class="form-group hidden" id="chg-pw-confirm">--}}
                            {{--<label>اعاده ادخال كلمه المرور الجديده</label>--}}
                            {{--<input class="form-control"  type="password" name="repeat_pw_confirm" placeholder="الرجاء اعاده ادخال كلمه المرور الجديده"  >--}}
                        {{--</fieldset>--}}


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


        <script>
            $(document).ready(function(){
                $("p").click(function(){
                    $('#chg-pw').removeClass('hidden');
                    $('#chg-pw-confirm').removeClass('hidden');
                });
            });
        </script>

    @endpush
@stop