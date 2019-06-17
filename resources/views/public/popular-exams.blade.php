@extends('public.layouts.app')
@section('content')

    <!--Home search ==== -->
    <div class="search-page">

        <section class="container">
            <div class="search-page__results">
                <h1 class="search-page__title">
                    Most Recent Searches</h1>
                <div class="row"></div>
                <ul class="search-document-results list-unstyled" >
                    @foreach($exams as $key => $exam)
                        <li class="row search-document-result flex" >
                            <div class="search-document-result__details"><a href="#">
                                    <h3 class="search-document-result__title" >{{ getFullexamNamearray($exam->department_id, $exam->material_id,  $exam->year_id) }}</h3>
                                </a>
                                <div><a href="" class="search-document-result__course"><span > {{$exam->facultyexam->name_en}}</span></a><i class="fa fa-circle search-document-result__course-institution-separator"></i><span class="font-small">Mansoura University</span></div>
                                <div class="search-document-result__meta font-extra-small text-gray">

									<span title="Upload date" class="ic-text">
										<i class="ic fa fa-cloud-upload"></i> {{date('F d, Y', strtotime($exam->created_at))}}</span></div>

                            </div>
                            <span class=" search-document-result__rating"><i class="fa fa-thumbs-up"></i>10</span>
                        </li>
                    @endforeach




                </ul>
                <nav class="pagination-wrapper" >
                    <ul class="pagination justify-content-end ">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>



    </div>
    <!--
    End Home search
    ==================================== -->


@endsection