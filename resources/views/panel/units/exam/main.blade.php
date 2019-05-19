@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'الرئيسيه','link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'مستودع الامتحانات','link'=> lang_route('panel.department.all')]));
@endphp

@extends('panel.layouts.index',['sub_title'=>'مستودع الامتحانات | الرئيسيه' ,'breadcrumb_array'=> $breadcrumb_array])

@section('main')
    @push('panel_css')
        {!! HTML::style('panel/css/jasny-bootstrap.min.css') !!}
        {!! HTML::style('panel/plugins/summernote/summernote-bs4.css') !!}
    @endpush

    <div class="content">

<div class="row">
    <div class="col-lg-8">
        <div class="info-box">
            <div class="col-12">
                <h5>Revenue Statistics</h5>
                <div class="row m-t-2 m-b-2">
                    <div class="col-md-6">
                        <h1 class="font-weight-500">$23,743</h1>
                        <p>Total Revenue</p>
                    </div>
                    <div class="col-md-3">
                        <h6 class="text-blue font-weight-bold">Organic Traffic</h6>
                        <p class="f-13">+ 40% this month</p>
                    </div>
                    <div class="col-md-3">
                        <h6 class="text-green font-weight-bold">Page Views</h6>
                        <p class="f-13">+ 25% this month</p>
                    </div>
                </div>
            </div>
            <div id="earning"></div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card m-b-3">
            <div class="card-body">
                <div class="m-b-3 font-weight-bold">
                    <h5>New Clients
                        <button type="button" class="btn btn-sm btn-rounded btn-info pull-left">250</button>
                    </h5>
                </div>
                <div class="m-b-2 f-25">09.5% <i class="ti-bar-chart pull-right f-30"></i> </div>
                <div><i class="f-20 ti-upload text-aqua"></i> 35% Increase in 30 Days</div>
            </div>
        </div>

    </div>
</div>


        <div class="row">
            <div class="col-lg-8">
                <div class="info-box">
                    <div class="col-12">
                        <h5>Revenue Statistics</h5>
                        <div class="row m-t-2 m-b-2">
                            <div class="col-md-6">
                                <h1 class="font-weight-500">$23,743</h1>
                                <p>Total Revenue</p>
                            </div>
                            <div class="col-md-3">
                                <h6 class="text-blue font-weight-bold">Organic Traffic</h6>
                                <p class="f-13">+ 40% this month</p>
                            </div>
                            <div class="col-md-3">
                                <h6 class="text-green font-weight-bold">Page Views</h6>
                                <p class="f-13">+ 25% this month</p>
                            </div>
                        </div>
                    </div>
                    <div id="earning"></div>
                </div>
            </div>

        </div>

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
<!-- /.row -->