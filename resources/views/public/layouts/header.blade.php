<header>

    <nav class="navbar  navigation ">
        <!-- logo -->
        <div class="navbar-left"></div>
        <a class="navbar-brand" href="{{route('public.index')}}">
            <img  src="{{url('/frontend/img/logo.png')}}" alt="Exams">
        </a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span> <i class="fa fa-bars fa-2x"></i>
        </button>
        </div>


        <!-- main nav -->
        @if (app()->getLocale() == 'ar')
            <div class="collapse navbar-collapse navbar-right" role="navigation">
                <ul id="nav" class="nav navbar-nav">
                    <li>
                        <a href=""  id="login" rel="nofollow">تسجيل الدخول
                        </a>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">

                            <span class="username username-hide-on-mobile"> @lang('exam.Change Language')   </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ url('public/changelang' , 'ar') }}">
                                    <i class="icon-globe"></i>@lang('exam.Arabic') </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="{{ url('public/changelang' , 'en') }}">
                                    <i class="icon-globe"></i> @lang ('exam.English')</a>
                            </li>

                        </ul>

                    </li>

                </ul>
            </div>


        @else
        <div class="collapse navbar-collapse navbar-right" role="navigation">
            <ul class="nav navbar-nav">
                @if (Auth::check())
                    <li>
                        <a href ="#"  id="login" rel="nofollow">{{auth()->user()->name}}

                        </a>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">

                            <span class="username username-hide-on-mobile"> Change Language  </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="">
                                    <i class="icon-globe"></i>Arabic </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="">
                                    <i class="icon-globe"></i> English  </a>
                            </li>

                        </ul>

                    </li>

                    <li>
                        <a href ="{{route('logout.public')}}"  id="login" rel="nofollow">Logout

                        </a>
                    </li>

                @else
               <li>
                   <a href ="{{route('panel.login')}}"  id="login" rel="nofollow">Sign in
                   </a>
               </li>
                @endif
                <li >
                    <a href=""  id="lang" rel="nofollow">Arabic
                    </a></li>   

            </ul>
        </div>
            @endif


    </nav>
    <!-- /main nav -->


</header