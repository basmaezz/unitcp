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

                <li> <a href="{{route('panel.users.profile',auth()->id())}}" data-toggle="control-sidebar"><i class="/frontend "></i></a> </li>
            </ul>
        </div>
    </nav>





</header>

