<div class="sidebar-content">
    <div class="sidebar-header">
        <h1 class="docTitle"></h1>

        Solution Manual of Probability & Statistics for Engineers & Scientists (9th Edition) - Ronal E. Walpole, Raymond H. Mayers, Sharon L. Mayers & Keying Ye
    </div>
    <!-- rating -->
    <div class="document-info-row row">
        <p class="title">Ratings</p>
        <div class="col-md-6">
            <button class="btn-wrapper btn btn-success like-btn">
                {{--<a href="{{url('public/storelike/'.$exam->id)}}" class="btn-wrapper btn btn-success ">--}}
                <i class="fa fa-thumbs-up"></i>
                @php
                $likes_count= 0 ;
                $dislikes_count= 0 ;

                @endphp

                @foreach($exam->likes as $like)
                    @php
                    if($like->likenum==1){
                     $likes_count++;

                    }elseif ($like->likenum==0){
                         $dislikes_count++;
                    }
                    @endphp

                    @endforeach
                <p class="rating-positive-number">{{$likes_count}}</p>
                {{--</a>--}}
            </button>
        </div>
        <div class="col-md-6">
            <button class="btn-wrapper btn btn-danger dislike-btn">
                {{--                    <a href="{{url('public/dislike/'.$exam->id)}}" class="btn-wrapper btn btn-danger ">--}}
                <i class="fa fa-thumbs-down"></i>
                <p class="rating-negative-number">{{$dislikes_count}}</p>
            </button>
            {{--</a>--}}
        </div>
    </div>
    <!-- social -->

    <div class="document-info-row  row">
        <p class="title">Share</p>
        <div class="col-md-4">
            <div class="fb-share-button btn-wrapper btn btn-primary  btn-lg" data-href="{{url('storage/faculty/exams/'.$exam->faculty_id ."/".$exam->department_id."/".
                            $exam->class_id ."/".$exam->semester_id ."/".$exam->material_id ."/".$exam->year_id ."/".$exam->files($exam->file))}}"
                 data-layout="button_count"></div>

        </div>
        <div class="col-md-4">
            <a class="btn-wrapper btn  btn-success  btn-lg" href="https://web.whatsapp.com/send?text=url={{url('storage/faculty/exams/'.$exam->faculty_id ."/".$exam->department_id."/".
                            $exam->class_id ."/".$exam->semester_id ."/".$exam->material_id ."/".$exam->year_id ."/".$exam->files($exam->file))}}" target="_blank">
                <i class="fab fa-whatsapp"></i>
            </a>


        </div>
        <div class="col-md-4">
            {{--<div class="fb-send-to-messenger"--}}
            {{--messenger_app_id="<APP_ID>"--}}
            {{--page_id="PAGE_ID"--}}
            {{--data-ref="{{url('storage/faculty/exams/'.$exam->faculty_id ."/".$exam->department_id."/".--}}
            {{--$exam->class_id ."/".$exam->semester_id ."/".$exam->material_id ."/".$exam->year_id ."/".$exam->files($exam->file))}}"--}}
            {{--color="<blue | white>"--}}
            {{--size="<standard | large | xlarge>">--}}
            {{--</div>--}}

            <button class="btn-wrapper btn  btn-info  btn-lg" data-href="{{url('storage/faculty/exams/'.$exam->faculty_id ."/".$exam->department_id."/".
                            $exam->class_id ."/".$exam->semester_id ."/".$exam->material_id ."/".$exam->year_id ."/".$exam->files($exam->file))}}">
                <i class="fab fa-facebook-messenger"></i>
            </button>
        </div>


        <div class="input-group mb-3">
            <input type="text" class="form-control" value="{{url('public/viewpdf/'.$exam->id)}}">
            <div class="input-group-append">
                <button class="btn btn-success" type="submit">copy</button>
            </div>
        </div>

    </div>



    <!--comment-->

    <div class="document-info-row  row">
        <p class="title">Comments</p>
        <div class="col ">



            <form method="get" id="comment-form">
                <div class="input-group mb-5">

                    <input type="hidden" name="exam_id" class="form-control exam_id" value="{{$exam->id}}">
                    @if (Auth::check())
                        <input type="text" name="txtcomment" class="form-control txtcomment" placeholder="write comment">
                    @else
                        <input type="text" name="txtcomment" class="form-control" placeholder="write comment" disabled>
                    @endif
                </div>

            </form>


        </div>
        <div class="clearfix"></div>

        <ul class="comment-user-post">
            @foreach($exam->comments as $comment)
                <li class="comment-det" >
                    <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                    <div class="comment-user-txt">
                        <span ><a href="" >{{$comment->student->name}}</a>•<span >{{$comment->created_at->diffForHumans()}}</span></span>
                        <span>{{$comment->comment}}</span>
                    </div>
                </li>
            @endforeach


        </ul>
        <div class="show-more-comments"><button class="btn btn-outline-primary btn-block"> Show 5 more comments.</button></div>
    </div>




    <!--comment-->

</div>