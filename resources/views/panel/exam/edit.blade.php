@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>($data['exam'])->file,'link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'مستودع الامتحانات','link'=> route('panel.exam.all')]));
@endphp

@extends('panel.layouts.index',['sub_title'=>'تعديل الأمتحان' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
        {!! Form::open(['id'=>'form','method'=>'PUT','url'=>route('panel.exam.edit',['id'=>($data['exam'])->id]),'to'=>route('panel.exam.all')]) !!}

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">


                        <fieldset class="form-group">
                            <label>اسم الكليه </label>
                            <select class="form-control" name="faculty_id" data-placeholder="إختيار الكليه" required >
                                <option disabled selected hidden>إختيار الكليه</option>
                                @if(isset($data['faculties']) && ($data['faculties'])->count() > 0)
                                    @foreach(($data['faculties']) as $item)

                                        <option value="{{$item->id}}" selected {{is_selected($item->id,$item->faculty_id) }}>{{get_text_locale($item,'name_ar')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>اسم الفرقه </label>
                            <select class="form-control" select name="class_id" data-placeholder="إختيار الفرقه" required>
                                <option disabled selected hidden>اختيار الفرقه</option>
                                @if(isset($data['classes']) && ($data['classes'])->count() > 0)
                                    @foreach(($data['classes']) as $item)
                                        <option value="{{$item->id}}" {{is_selected($item->id,$data['exam']->class_id) }} >{{get_text_locale($item,'name_ar')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>


                        <fieldset class="form-group">
                            <label>اسم القسم </label>
                            <select class="form-control"  name="department_id" data-placeholder="إختيار القسم" required>
                                <option disabled selected hidden>إختيار القسم</option>
                                @if(isset($data['department']) && ($data['department'])->count() > 0)
                                    @foreach(($data['department']) as $item)
                                        <?php  echo ($data['department']);?>
                                        <option value="{{$item->id}}" {{is_selected($item->id,$data['exam']->department_id) }} >{{get_text_locale($item,'name_ar')}}</option>

                                    @endforeach
                                @endif
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>اسم الترم </label>
                            <select class="form-control" select name="semester_id" data-placeholder="إختيار الترم" required>
                                <option disabled selected hidden>إختيار الترم</option>
                                @if(isset($data['semester']) && $data['semester'])->count() > 0)
                                     @foreach(($data['semester']) as $item)
                                        <?php echo ($data['exam']->semester_id); ?>
                                    <option value="{{$item->id}}" {{is_selected($item->id,$data['exam']->semester_id) }} >{{get_text_locale($item,'name_ar')}}</option>
                                @endforeach
                                @endif
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>اسم الماده </label>

                            <select class="form-control" name="material_id" data-placeholder="إختيار الماده" >
                                <option disabled selected hidden>إختيار الماده</option>
                                @if(isset($data['material']) && ($data['material'])->count() > 0)
                                    @foreach( ($data['material']) as $item)
                                        <option value="{{$item->id}}" {{is_selected($item->id,$data['exam']->material_id) }} >{{get_text_locale($item,'name_ar')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>



                        <fieldset class="form-group">
                            <label>اختر السنه </label>
                            <select class="form-control" id="year_id" name="year_id" data-placeholder="إختيار السنه" >
                                <option disabled selected hidden>إختر السنه</option>
                                @if(isset($data['year']) && ($data['year'])->count() > 0)
                                    @foreach(($data['year']) as $item)
                                        <option value="{{$item->id}}"selected {{is_selected($item->id,($data['exam'])->year_id)}}>{{get_text_locale($item,'name')}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>كلمات البحث</label>
                            <textarea class="form-control " rows="4" type="text" name="key_search_ar" placeholder="الرجاء إدخال كلمات البحث" >{{($data['exam'])->key_search_ar}}</textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <label>كلمات البحث باللغه الانجليزيه</label>
                            <textarea class="form-control " rows="4" type="text" name="key_search_en" placeholder="الرجاء إدخال كلمات البحث باللغه الانجليزيه" >{{($data['exam'])->key_search_en}}</textarea>
                        </fieldset>

                        <button  type="button" class="btn btn-danger del-file {{is_null($data['exam']->file) ? 'hidden' : ''  }}" data-id="{{$data['exam']->id}}">حذف ملف : ({{($data['exam'])->file}})</button>
{{--                        <div class="{{is_null($data['exam']->file) ? 'hidden' : ''  }}">--}}
                        <div id="fileuploader" class="{{!is_null($data['exam']->file) ? 'hidden' : ''  }}">
                            <input type="file" name="file" accept="application/pdf">
                        </div>


{{--                        <div id="fileuploader" >--}}
{{--                            @if(!empty($data['exam']->file))--}}
{{--                                <button  type="button" class="btn btn-danger del-file" data-id="{{$data['exam']->id}}">حذف ملف : ({{($data['exam'])->file}})</button>--}}

{{--                                @else--}}
{{--                                <input type="file" name="file" class="hidden" id="delete_file"> {{($data['exam'])->file}}--}}
{{--                            @endif--}}

                            {{--@if(\App\config::where('name', 'upload')->first()->config == 'on')--}}

                            {{--<p class="help-block" id="">يمكنك رفع ملف جديد ليتم تحميله</p>--}}
                            {{--@else--}}
                                {{--<h5>لا يمكن رفع ملف اخر الان</h5>--}}
                                {{--@endif--}}
                        {{--</div>--}}
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

                $('.del-file').on('click', function(){
                    $('#fileuploader').removeClass('hidden');
                    $('.del-file').addClass('hidden');
                    var fileId = $(this).data('id');

                    if(fileId) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: '/admin/exam/delfile/'+fileId,
                            type:"GET",
                            dataType:"json",
                            success:function(response) {
                                if(response.status)
                                {
                                    alert('ok');
                                }
                            },

                        });
                    }
                });


            });
        </script>

    @endpush
@stop