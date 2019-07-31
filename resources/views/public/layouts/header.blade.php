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

        <div class="collapse navbar-collapse navbar-right" role="navigation">
            <ul class="nav navbar-nav">
                @if (Auth::check())
                    <li>
                        <a href ="#"  id="login" rel="nofollow">{{auth()->user()->name}}

                        </a>
                    </li>

                    <li>
                      <a href ="{{ route('public.logout') }}">@lang('exam.Logout') </a>
                    </li>

                @else
                    <li>
                        <a href ="{{route('panel.login')}}"  id="login" rel="nofollow">@lang('exam.Sign in')
                        </a>
                    </li>
                @endif
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">

                            <span class="username username-hide-on-mobile"> @lang('exam.Change Language')   </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </li>

            </ul>
        </div>


    </nav>
    <!-- /main nav -->


</header