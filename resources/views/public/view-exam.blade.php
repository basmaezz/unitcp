@extends('public.layouts.app')
@section('content')
    <div  id="container" class="sidebar-wrapper wrapper document-viewer">
        <!-- Sidebar -->
        <nav id="sidebar" >
            <div class="sidebar-content">
                <div class="sidebar-header">
                    <h1 class="docTitle"></h1>

                    Solution Manual of Probability & Statistics for Engineers & Scientists (9th Edition) - Ronal E. Walpole, Raymond H. Mayers, Sharon L. Mayers & Keying Ye
                </div>
                <!-- rating -->
                <div class="document-info-row row">
                    <p class="title">Ratings</p>
                    <div class="col-md-6">
                        <button class="btn-wrapper btn btn-success ">
                            <i class="fa fa-thumbs-up"></i>
                            <p class="rating-positive-number">1405</p>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn-wrapper btn btn-danger">
                            <i class="fa fa-thumbs-down"></i>
                            <p class="rating-negative-number">74</p>
                        </button>
                    </div>
                </div>
                <!-- social -->

                <div class="document-info-row  row">
                    <p class="title">Share</p>
                    <div class="col-md-4">
                        <button class="btn-wrapper btn btn-primary  btn-lg">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                    </div>
                    <div class="col-md-4">

                        <button class="btn-wrapper btn  btn-success  btn-lg">
                            <i class="fab fa-whatsapp"></i>
                        </button>
                    </div>
                    <div class="col-md-4">

                        <button class="btn-wrapper btn  btn-info  btn-lg">
                            <i class="fab fa-facebook-messenger"></i>
                        </button>
                    </div>


                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">copy</button>
                        </div>
                    </div>

                </div>



                <!--comment-->

                <div class="document-info-row  row">
                    <p class="title">Comments</p>
                    <div class="col-md-12 ">
                        <textarea class="form-control" placeholder="write a comment..." rows="1"></textarea>
                    </div>
                    <div class="clearfix"></div>

                    <ul class="comment-user-post">
                        <li class="comment-det" >
                            <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                            <div class="comment-user-txt">
                                <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                                <span>thank you a lot. You save my semester</span>
                            </div>
                        </li>

                        <li class="comment-det" >
                            <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                            <div class="comment-user-txt">
                                <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                                <span>thank you a lot. You save my semester</span>
                            </div>
                        </li>

                        <li class="comment-det" >
                            <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                            <div class="comment-user-txt">
                                <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                                <span>thank you a lot. You save my semester</span>
                            </div>
                        </li>

                        <li class="comment-det" >
                            <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                            <div class="comment-user-txt">
                                <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                                <span>thank you a lot. You save my semester</span>
                            </div>
                        </li>	<li class="comment-det" >
                            <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                            <div class="comment-user-txt">
                                <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                                <span>thank you a lot. You save my semester</span>
                            </div>
                        </li>	<li class="comment-det" >
                            <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                            <div class="comment-user-txt">
                                <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                                <span>thank you a lot. You save my semester</span>
                            </div>
                        </li>
                    </ul>
                    <div class="show-more-comments"><button class="btn btn-outline-primary btn-block"> Show 5 more comments.</button></div>
                </div>



                <!--comment-->

            </div>
        </nav>



        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="content-header row">
                        <div class="col-md-4 ">
                            <button type="button" id="sidebarCollapse" class="btn btn-info">
                                <i class="fas fa-align-left"></i>
                            </button>
                        </div>
                        <div class="col-md-8 right  download-exam">
                            <button type="button" class="btn btn-success">Download</button>
                        </div>
                    </div>
                </div>

                <!-- 4:3 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                </div>
            </nav>
        </div>
    </div>

    <!--
    End Home search
    ==================================== -->


@endsection