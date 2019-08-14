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



        <div id="navbar" class="navbar-collapse collapse navbar-right">
            <ul  class="nav navbar-nav">
                @if (Auth::check())
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown-item">
                                <a href ="{{ route('public.logout') }}">@lang('exam.Logout') </a>
                            </li>

                        </ul>

                @else
                    <li>
                        <a href ="{{route('panel.login')}}"  id="login" rel="nofollow">@lang('exam.Sign in')
                        </a>
                    </li>
                @endif

                    @if(app()->getLocale() =='ar')
                <li >
                    <a href="{{url('/en/public/index')}}"  id="lang" rel="nofollow">English
                    </a>
                </li>
                        @else
                <li > <a href="{{url('/ar/public/index')}}"  id="lang" rel="nofollow">عربى</a>
                        </li>

                        @endif

            </ul>
        </div>

    </nav>
    <!-- /main nav -->


</header>