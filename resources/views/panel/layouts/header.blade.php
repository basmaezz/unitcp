@php
   $admin = auth()->user();
@endphp

<header class="main-header">
    <meta charset="utf-8">
    <!-- Logo -->
    <a href="#" class="logo blue-bg">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="" alt=""></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="/panel/img/assistlogo.jpeg" style="margin-left: 10px;" alt=""></span> </a>
    {{--/*********Meta Tag For Upload */--}}
       <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Header Navbar -->
    <nav class="navbar blue-bg navbar-static-top">
        <!-- Sidebar toggle button-->
        <ul class="nav navbar-nav pull-left">
            <li><a class="sidebar-toggle" data-toggle="push-menu" href="#"></a> </li>
        </ul>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages -->
                <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 new Tickets</li>
                        <li>
                            <ul class="menu">
                                {{--<li><a href="#">--}}{{--  <i class="fa fa-clipboard"></i> <i class="fi-ticket"></i>--}}
                                        {{--<div class="pull-left"><img src="/panel/img/img1.jpg" class="img-circle" alt="User Image"> <span class="profile-status online pull-right"></span></div>--}}
                                        {{--<h4>Alex C. Patton</h4>--}}
                                        {{--<p>I've finished it! See you so...</p>--}}
                                        {{--<p><span class="time">9:30 AM</span></p>--}}
                                    {{--</a></li>--}}
                                {{--<li><a href="#">--}}
                                        {{--<div class="pull-left"><img src="/panel/img/img3.jpg" class="img-circle" alt="User Image"> <span class="profile-status offline pull-right"></span></div>--}}
                                        {{--<h4>Nikolaj S. Henriksen</h4>--}}
                                        {{--<p>I've finished it! See you so...</p>--}}
                                        {{--<p><span class="time">10:15 AM</span></p>--}}
                                    {{--</a></li>--}}
                                {{--<li><a href="#">--}}
                                        {{--<div class="pull-left"><img src="/panel/img/img2.jpg" class="img-circle" alt="User Image"> <span class="profile-status away pull-right"></span></div>--}}
                                        {{--<h4>Kasper S. Jessen</h4>--}}
                                        {{--<p>I've finished it! See you so...</p>--}}
                                        {{--<p><span class="time">8:45 AM</span></p>--}}
                                    {{--</a></li>--}}
                                {{--<li><a href="#">--}}
                                        {{--<div class="pull-left"><img src="/panel/img/img4.jpg" class="img-circle" alt="User Image"> <span class="profile-status busy pull-right"></span></div>--}}
                                        {{--<h4>Florence S. Kasper</h4>--}}
                                        {{--<p>I've finished it! See you so...</p>--}}
                                        {{--<p><span class="time">12:15 AM</span></p>--}}
                                    {{--</a></li>--}}
                            </ul>
                        </li>
                        <li class="footer" disabled="true"><a href="#">View All Messages</a></li>

                    </ul>
                </li>
                <!-- Notifications  -->
                <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Notifications</li>
                        <li>
                            <ul class="menu">

                                <li>
                                    <a href="#">
                                        <div class="pull-left icon-circle red"><i class="icon-lightbulb"></i></div>
                                        <h4>Alex C. Patton</h4>
                                        <p>I've finished it! See you so...</p>
                                        <p><span class="time">9:30 AM</span></p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="footer" disabled="true"><a href="#">Check all Notifications</a></li>
                    </ul>
                </li>
                <!-- User Account  -->
                <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img src="{{url('uploads/users/profiles/'.@$admin->img)}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{$admin->name}}</span> </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <div class="pull-left user-img"><img src="" class="img-responsive img-circle" alt="User"></div>
                            <p class="text-left"> {{$admin->name}} <small> {{ $admin->email }}</small> </p>
                        </li>
                        <li><a href="#">الملف الشخصي <i class="icon-profile-male drop-icon-item"></i>  </a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"> إعدادات الحساب <i class="icon-gears drop-icon-item"></i> </a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ @csrf_field() }}

                            </form>
                        </li>

                        {{--<li><a href="#"> تسجيل الخروج <i class="fa fa-power-off drop-icon-item"></i> </a></li>--}}
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li> <a href="{{route('panel.users.profile',auth()->id())}}" data-toggle="control-sidebar"><i class="/frontend "></i></a> </li>
            </ul>
        </div>
    </nav>



    @push('panel_js')
        {!! HTML::script(panel_url('plugins/datatables/jquery.dataTables.min.js')) !!}
        {!! HTML::script(panel_url('plugins/datatables/dataTables.bootstrap.min.js')) !!}

        <script>
            var id;
            var loader = $('#loader');
            var name_ar = $('#name_ar');
            var name_en = $('#name_en');
            var active = $('#active');
            var constant_id = $('#id');
            var modal_body = $('#modal_body');
            var modal = $('#edit_modal');
            $(document).on('click', '.edit', function (event) {
                constant_id.val($(this).data('id'));
                if (constant_id.val() !== undefined && constant_id.val() !== '') {
                    modal_body.addClass('hidden');
                    loader.removeClass('hidden');
                    $.ajax({
                        url: base_url + '/data/' + constant_id.val(),
                        method: 'GET',
                        type: 'json',
                        success: function (response) {
                            if (response.status) {
                                loader.addClass('hidden');
                                modal_body.removeClass('hidden');
                                name_ar.val(response.item.name_ar);
                                name_en.val(response.item.name_en);
                                active.val(response.item.active);
                                constant_id.val(response.item.id);
                            }
                        },
                        error: function (response) {
                            modal.hide();
                        }
                    });
                }
                event.preventDefault();
            });
        </script>

</header>

