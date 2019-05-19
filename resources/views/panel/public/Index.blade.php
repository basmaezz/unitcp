@php
    $breadcrumb_array = [];

@endphp
@extends('panel.layouts.index',['sub_title'=>'الصفحه الرئيسيه' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">
{{--        {!! Form::open(['id'=>'form','method'=>'get','url'=>route('panel.exam.all')]) !!}--}}
        <form method="get" action="{{route('panel.exam.search-s')}}">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        @php
                            $items = get_fac_data();
                        @endphp

                        <fieldset class="form-group">
                            <label>كلمات البحث </label>
                            <input class="form-control"  type="text" name="txtsearch" placeholder="الرجاء كتابه كلمه البحث"  value="" >




                        </fieldset>

                        {{--<fieldset class="form-group">--}}
                            {{--<label>اسم الكليه </label>--}}
                            {{--<select class="form-control"  name="id" data-placeholder="إختيار الكليه" required>--}}
                                {{--<option disabled selected hidden>إختيار الكليه</option>--}}
                                {{--@if(isset($items) && $items->count() > 0)--}}
                                    {{--@foreach($items as $item)--}}
                                        {{--<option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                            {{--</select>--}}
                        {{--</fieldset>--}}

                        {{--<fieldset class="form-group">--}}
                            {{--<a href="" class="btn btn-info" id="search">Advanced Search</a>--}}
                        {{--</fieldset>--}}

                        <div id="selectors_div" class="hidden">
                            @include('panel.material.fac-selectors')
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="margin-bottom: 30px">
                    <div class="card-body">
                        <div class="row btn_padding">
                            <button style="width: 90%" class=" btn btn-primary" type="submit">بحث&nbsp; &nbsp;
                                <i style="top: inherit;left: AUTO;" class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div></form>
{{--        {!! Form::close() !!}--}}

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

                $('#search').click(function() {
                    $('#selectors_div').removeClass('hidden');
                });
            });

        </script>




    @endpush
@stop
