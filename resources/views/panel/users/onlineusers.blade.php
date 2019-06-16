@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'مديرى النظام','link'=> ('panel.users.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'عرض مديرى النظام' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/plugins/datatables/css/dataTables.bootstrap.min.css') !!}
    @endpush
    @include('panel.flash-message')
    <div class="content">

        <div class="row">
            <div class="col-lg-5 m-b-3">
                <div class="card">
                    <div class="card-body">
                        <h5>المتواجدين حاليا <span class="pull-left f-13"></span></h5>
                        <div class="message-widget">
                            @foreach($users as $key => $user)
                                <a href="#">

                                    <div class="user-img pull-left">
                                        {{--<img src="{{url('uploads/users/profiles/'.$logs->who_users->img)}}" class="img-circle img-responsive" alt="User Image">--}}
                                    </div>

                                    <div class="mail-contnet">
                                        <h5 style="font-weight: bold;">{{$user->username}}</h5>
                                        <span class="mail-desc" style="color: #0E7AC4;"></span>
                                        <span class="time">{{$user->created_at}} AM</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.row -->
    </div>


    </div>





    @push('panel_js')
        {!! HTML::script(panel_url('plugins/datatables/jquery.dataTables.min.js')) !!}
        {!! HTML::script(panel_url('plugins/datatables/dataTables.bootstrap.min.js')) !!}

    @endpush
@stop