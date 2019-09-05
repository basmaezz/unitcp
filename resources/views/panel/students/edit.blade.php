@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>$student->name,'link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'مديرى النظام','link'=> ('panel.students.all')]));
@endphp

@extends('panel.layouts.index',['sub_title'=>'تعديل بيانات ' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'PUT','url'=>route('panel.students.edit',['id'=>$student->id]),'to'=>route('panel.students.all'),'enctype'=>('multipart/form-data')]) !!}

        <div class="row">
            <div class="col-md-8">
                {{--<input type="hidden" id="photo" name="image" value="{{$post->image}}">--}}
                <div class="card">
                    <div class="card-body">

                        <fieldset class="form-group">
                            <label>اسم الطالب</label>
                            <input class="form-control"  type="text" name="name"   value="" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>اسم المستخدم</label>
                            <input class="form-control"  type="text" name="username" value="" required>
                        </fieldset>


                        <fieldset class="form-group">
                            <label>البريد الألكترونى</label>
                            <input class="form-control"  type="text" name="email" value="" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>كلمه المرور</label>
                            <input class="form-control"  type="password" name="password" value="" required>
                        </fieldset>


                        @php
                            $items = get_fac_data();
                        @endphp

                        <fieldset class="form-group  " id="sub-admin" >
                            <label>اختر الكليه </label>
                            <select class="form-control "  name="faculty_id" data-placeholder="إختيار الكليه" required>
                                <option disabled selected >إختيار الكليه</option>
                                @if(isset($items) && $items->count() > 0)
                                    @foreach($items as $item)

                                        <option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>
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
                            <input class="form-control"  type="file" name="img">
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


    @endpush
@stop