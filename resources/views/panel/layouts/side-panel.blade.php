@php
    $admin = auth()->user();
@endphp
<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image text-center"><img src="/panel/img/img1.jpg" class="img-circle" alt="User Image"></div>
            <div class="info">
                <p>{{$admin->name}}</p>
                <a href="#"><i class="fa fa-envelope"></i></a>
                <a href="#"><i class="fa fa-gear"></i></a>
                <a href="#"><i class="fa fa-power-off"></i></a>
            </div>
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">أقسام الموقع</li>
            <li class="{{is_active('dashboard')}}">
                <a href="{{route('panel.dashboard')}}">
                <a href="{{route('panel.dashboard')}}">
                    <i class="icon-home"></i>
                    <span>الصفحة الرئيسية</span>
                </a>
            </li>
            <li class="treeview {{is_element_active('/post/i')}}">
                <a href="#">
                    <i class="ti-layout-list-post"></i>
                    <span>مديرى النظام</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{is_active('user/create')}}"><a href="{{route('panel.users.create')}}"><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('user/all')}}"><a href="{{route('panel.users.all')}}"><i class="fa fa-angle-left"></i> عرض الكل </a></li>

                </ul>
            </li>
            <li class="treeview {{is_element_active('/project/i')}}">
                <a href="#">
                    <i class="ti-view-list-alt"></i>
                    <span>مديرى الوحدات الفرعيه</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('user/create')}}"><a href=""><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('project/all')}}"><a href=" "><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>
            </li>

            <li class="treeview {{is_element_active('/service/i')}}">
                <a href="#">
                    <i class="ti-bar-chart-alt"></i>
                    <span>الكليات</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{is_active('service/create')}}"><a href="{{route('panel.faculty.create')}}"><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('service/all')}}"><a href=" {{route('panel.faculty.all')}}"><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>
            </li>


            <li class="treeview {{is_element_active('/album/i')}}">
                <a href="#">
                    <i class="ti-gallery"></i>
                    <span>الفرق الدراسيه</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('service/create')}}"><a href="{{route('panel.classes.create')}}"><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('service/all')}}"><a href=" {{route('panel.classes.all')}}"><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>
            </li>



            <li class="treeview {{is_element_active('/album/i')}}">
                <a href="#">
                    <i class="ti-gallery"></i>
                    <span>الفصول الدراسيه</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('service/create')}}"><a href="{{route('panel.semester.create')}}"><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('service/all')}}"><a href=" {{route('panel.semester.all')}}"><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>
            </li>

            <li class="treeview {{is_element_active('/service/i')}}">
                <a href="#">
                    <i class="ti-bar-chart-alt"></i>
                    <span>الأقسام</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('service/create')}}"><a href="{{route('panel.department.create')}}"><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('service/all')}}"><a href=" {{route('panel.department.all')}}"><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>
            </li>


            <li class="treeview {{is_element_active('/service/i')}}">
                <a href="#">
                    <i class="ti-bar-chart-alt"></i>
                    <span>المواد الدراسيه</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('material/create')}}"><a href="{{route('panel.material.create')}}"><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('service/all')}}"><a href=" {{route('panel.material.all')}}"><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>
            </li>


            <li class="treeview {{is_element_active('/album/i')}}">
                <a href="#">
                    <i class="ti-gallery"></i>
                    <span>مستودع الامتحانات </span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('exam/index')}}"><a href="{{route('panel.exam.index')}}"><i class="fa fa-angle-left"></i> الرئيسيه </a></li>
                    <li class="{{is_active('material/create')}}"><a href=""><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('service/all')}}"><a href=" "><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>

            </li>


            <li class="treeview {{is_element_active('/album/i')}}">
                <a href="#">
                    <i class="ti-gallery"></i>
                    <span>مستودع الامتحانات الرقميه</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{is_active('material/create')}}"><a href=""><i class="fa fa-angle-left"></i> الرئيسيه </a></li>
                    <li class="{{is_active('material/create')}}"><a href=""><i class="fa fa-angle-left"></i> إضافة جديد </a></li>
                    <li class="{{is_active('service/all')}}"><a href=" "><i class="fa fa-angle-left"></i> عرض الكل </a></li>
                </ul>

            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>