@extends('panel.layouts.index')
@section('main')


    <div class="content">

        <div class="row">
            @if(Auth::user()->permission==1)
            <div class="col-lg-4 col-md-6 m-b-3" >
                <div class="widget-info bg-primary" >
                    <div class="card-body" style="background-color: #003B51">
                        <div class="row">
                            <div class="col-md-6 text-white">
                                <p>عدد الكليات </p>
                                <h2 class="font-weight-bold">{{$faculty}}</h2>
                                <a href="{{route('panel.faculty.all')}}">المزيد</a> </div>
                            <div class="col-md-6 m-t-2 text-right"> <span id="spa-bar"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 m-b-3">
                <div class="widget-info bg-aqua">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-white">
                                <p>عدد المستخدمين </p>
                                <h2 class="font-weight-bold">{{$user}}</h2>
                                <a href="{{route('panel.users.all')}}">المزيد</a> </div>
                            <div class="col-md-6 m-t-2 text-right"> <span id="spa-line"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-4 col-md-6 m-b-3">
                <div class="widget-info bg-danger">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-white">
                                <p>عدد الامتحانات </p>
                                <h2 class="font-weight-bold">{{$exam}}</h2>
                                <a href="{{route('panel.exam.all')}}">المزيد</a> </div>
                            <div class="col-md-6 m-t-2 text-right"> <span id="spa-pie"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row -->

        <div class="row">

            <div class="col-lg-8">
                <div class="info-box">
                    <div class="col-12">
                        <h5>أحدث الأمتحانات المرفوعه</h5>
                        <div class="row m-t-6 m-b-6" >
                            @foreach($latest as $key => $last)

                                <div class="col-md-9">
                                    <td ><h6 class="text-blue font-weight-bold">
                                            {{ @getFullNamearray($last->faculty_id, $last->class_id, $last->material_id, $last->semester_id, $last->year_id) }}</h6></td>

                                </div><br>
                                <div class="col-md-3"  >
                                    <a title="Download" style="background-color: #003B51; margin-bottom: 10px;"
                                       href="{{ url('storage/faculty/exams/'.$last->faculty_id ."/".$last->department_id."/".
                            $last->class_id ."/".$last->semester_id ."/".$last->material_id ."/".$last->year_id ."/".$last->files($last->file)) }}" target="_blank" style="margin-right: 9px;
    height: 42px; margin-bottom: 6px; " data-id="{{ $last->id }}"  class="btn btn-primary download"   >

                                       تحميل
                                    </a>

                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="earning"></div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="card m-b-3">
                    <div class="card-body">
                        <div class="m-b-3 font-weight-bold">
                            <h5>عدد الزائرين
                                <button type="button" class="btn btn-sm btn-rounded btn-info pull-left" style="background-color: #003B51;cursor: default;">{{$visitor}}</button>
                            </h5>


                        </div>
                        <div class="m-b-3 font-weight-bold">
                            <h5> <a href="{{route('users.online')}}"> عدد المتواجدين حاليا</a>
                                <button type="button" class="btn btn-sm btn-rounded btn-info pull-left" style="background-color: #003B51;cursor: default;">{{$users}}</button>
                            </h5>


                        </div>


                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
@if(Auth::user()->permission==1)
        <div class="row">
            <div class="col-lg-5 m-b-3">
                <div class="card">
                    <div class="card-body">
                        <h5>اخر الأنشطه <span class="pull-left f-13"><a href="{{route('panel.log.all')}}">المزيد</a></span></h5>
                        <div class="message-widget">
                            @foreach($logs as $key => $logs)
                            <a href="#">

                                <div class="user-img pull-left">
                                    <img src="{{url('uploads/users/profiles/'.$logs->who_users->img)}}" class="img-circle img-responsive" alt="User Image">
                                </div>

                                <div class="mail-contnet">
                                    <h5 style="font-weight: bold;">{{$logs->who_users->name}}</h5>
                                    <span class="mail-desc" style="color: #0E7AC4;">{{$logs->what}}</span>
                                    <span class="time">{{$logs->created_at->diffForHumans()}} </span>
                                </div>
                            </a>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
        <!-- /.row -->
    </div>

    @push('panel_js')

    @endpush
@stop