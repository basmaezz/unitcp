<header>

    <nav class="navbar  navigation ">
        <!-- logo -->
        <div class="navbar-left"></div>
        <a class="navbar-brand" href="#body">
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
                        <a href ="{{route('logout.panel')}}"  id="login" rel="nofollow">Logout

                        </a>
                    </li>
                    {{--<div class="btn-group">--}}
                        {{--<a href="{{route('logout')}}"--}}
                           {{--data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm"--}}
                           {{--onclick="event.preventDefault();--}}
                   {{--document.getElementById('logout-form').submit();">--}}
                            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                {{--{{ @csrf_field() }}--}}

                            {{--</form>--}}
                            {{--<li>--}}
                                {{--Logout--}}
                            {{--</li>--}}
                        {{--</a>--}}
                    {{--</div>--}}

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


    </nav>
    <!-- /main nav -->


</header