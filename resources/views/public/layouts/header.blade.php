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
            <ul id="nav" class="nav navbar-nav">
                <li>

                    <a href ="{{route('panel.login')}}"  id="login" rel="nofollow">Sign in
                    </a>
                </li>
                <li >
                    <a href=""  id="lang" rel="nofollow">Arabic
                    </a></li>

            </ul>
        </div>


    </nav>
    <!-- /main nav -->


</header>
