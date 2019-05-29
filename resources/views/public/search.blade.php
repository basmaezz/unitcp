@extends('public.layouts.app')
@section('content')
    <!--Home search ==== -->
    <div class="search-page">
        <section class=" search-page__controls">
            <div class="container clearfix">
                <div class="search-page_input-wrapper">
                    <div class="search-bar search-bar-big">
                        <i class="fa fa-search search-bar__icon"></i>
                        <input type="search" placeholder="Search for Exams" autofocus=""  spellcheck="true" value="">
                    </div>

                </div>

                <div class="search-filter-bar__filters">
                    <div class="row">

                        <div class="goldenforms-pro">
                            <div class="goldenforms-wrapper">
                                <div class="goldenforms-container ">
                                    <form action="" method="post" id="gform-pro">

                                        <div class="frm-body">




                                            <div class="frm-row">
                                                <div class="frm-section colm colm3">

                                                    <label class="search-filter-label "  >faculty filter</label>

                                                    <label class="field">
                                                        <input class="uit-input" placeholder="search for your faculty" type="text">
                                                    </label>
                                                </div>

                                                <div class="frm-section colm colm3">

                                                    <label class="search-filter-label "  >Department filter</label>

                                                    <label class="field">
                                                        <input class="uit-input" placeholder="search for your Department" type="text">
                                                    </label>
                                                </div>

                                                <div class="frm-section colm colm3">

                                                    <label class="search-filter-label "  >level filter</label>

                                                    <label class="field uit-select">
                                                        <select name="select2">
                                                            <option selected="selected" value="">Select your level</option>
                                                            <option value="1"> Select option 1 </option>
                                                            <option value="2"> Select option 2 </option>
                                                            <option value="3"> Select option 3 </option>
                                                            <option value="4"> Select option 4 </option>
                                                            <option value="5"> Select option 5 </option>
                                                        </select>
                                                        <i class="select-arrow"></i>
                                                    </label>
                                                </div>

                                                <div class="frm-section colm colm3">

                                                    <label class="search-filter-label "  >year filter</label>

                                                    <label class="field uit-select">
                                                        <select name="select2">
                                                            <option selected="selected" value="">Select year</option>
                                                            <option value="1"> Select option 1 </option>
                                                            <option value="2"> Select option 2 </option>
                                                            <option value="3"> Select option 3 </option>
                                                            <option value="4"> Select option 4 </option>
                                                            <option value="5"> Select option 5 </option>
                                                        </select>
                                                        <i class="select-arrow"></i>
                                                    </label>
                                                </div>


                                            </div>

                                        </div>
                                    </form>



                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </section>

        <section class="container">
            <div class="search-page__results">
                <h1 class="search-page__title"> Search Results</h1>
                <div class="row"></div>
                <ul class="search-document-results list-unstyled" >
                    <li class="row search-document-result flex" >
                        <div class="search-document-result__details"><a href="#">
                                <h3 class="search-document-result__title" >Electronic-Electronic and communication-3th level</h3>
                            </a>
                            <div><a href="" class="search-document-result__course"><span >Engineering fac</span></a><i class="fa fa-circle search-document-result__course-institution-separator"></i><span class="font-small">Mansoura University</span></div>
                            <div class="search-document-result__meta font-extra-small text-gray">

									<span title="Upload date" class="ic-text">
										<i class="ic fa fa-cloud-upload"></i> 17/06/2018</span></div>

                        </div>
                        <span class=" search-document-result__rating"><i class="fa fa-thumbs-up"></i>10</span>
                    </li>


                    <li class="row search-document-result flex" >
                        <div class="search-document-result__details"><a href="#">
                                <h3 class="search-document-result__title" >Electronic-Electronic and communication-3th level</h3>
                            </a>
                            <div><a href="" class="search-document-result__course">Engineering fac</a><i class="fa fa-circle search-document-result__course-institution-separator"></i><span class="font-small">Mansoura University</span></div>
                            <div class="search-document-result__meta font-extra-small text-gray">

										<span title="Upload date" class="ic-text">
											<i class="ic fa fa-cloud-upload"></i> 17/06/2018</span></div>

                        </div>
                        <span class=" search-document-result__rating" ><i class="fa fa-thumbs-up"></i>10</span>
                    </li>
                    <li class="row search-document-result flex" >
                        <div class="search-document-result__details"><a href="#">
                                <h3 class="search-document-result__title" >Electronic-Electronic and communication-3th level</h3>
                            </a>
                            <div><a href="" class="search-document-result__course"><span >Engineering fac</span></a><i class="fa fa-circle search-document-result__course-institution-separator"></i><span class="font-small">Mansoura University</span></div>
                            <div class="search-document-result__meta font-extra-small text-gray">

											<span title="Upload date" class="ic-text">
												<i class="ic fa fa-cloud-upload"></i> 17/06/2018</span></div>

                        </div>
                        <span class=" search-document-result__rating"><i class="fa fa-thumbs-up"></i>10</span>
                    </li>

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
@endsection
