<?php

Auth::routes();

Route::get('/', function () {
    return view('panel.login');
});
//Route::get('/index','site\HomeController@index');
Route::get('/sitehome','site\HomeController@welcome');
Route::get('/search', 'site\HomeController@search')->name('search');
Route::post('/search','site\HomeController@searchexam')->name('searchexam');

Route::get('tests','site\HomeController@test');
Route::get('getdata/{id}','site\HomeController@getData');
Route::get('download/{id}','site\HomeController@download');//


        Route::prefix('public')->group(function () {
            Route::get('/logout', 'site\HomeController@logout')->name('public.logout');
            Route::get('/changelang/{locale}', 'site\HomeController@changeLang');
            Route::get('index', ['as' => 'public.index', 'uses' => 'site\HomeController@index']);
            Route::post('all', ['as' => 'public.search', 'uses' => 'site\HomeController@getall']);
            Route::get('index/data', ['as' => 'panel.exam.search-s', 'uses' => 'site\HomeController@get_exam_search']);
            Route::get('getsearchExamData/{id}', ['as' => 'panel.exam.search', 'uses' => 'site\HomeController@getsearchExamData']);
            Route::get('searchExams/{deid?}/{classid?}/{yearid?}/', ['as' => 'panel.search.exam', 'uses' => 'site\HomeController@getsearchExam']);

            Route::get('popular', 'site\HomeController@popular')->name('popular');
            Route::get('recent', 'site\HomeController@recent')->name('recent');
            Route::get('comment/{id}/{comment}', 'site\CommentController@store');
            Route::get('viewpdf/{id}', 'site\HomeController@viewpdf');
            Route::get('storelike/{id}/{type}', 'site\LikeController@store')->where(['id' => '[0-9]+', 'type' => '[0-1]']);;
            //Route::get('dislike/{id}','site\LikeController@dislike');

            Route::get('/studentlogout', 'site\HomeController@logout')->name('logout.public');

            Route::post('search/exam', 'site\HomeController@getExamData')->name('searchexamx');
            Route::post('download/exam', 'site\HomeController@getDownload')->name('downloadexamx');
            Route::get('home', 'site\HomeController@home')->name('mostdownload');

            Route::get('chglang/{lang}', 'site\HomeController@changeLang')->name('changelang');
        });

            Route::get('locale/{locale}', function ($locale){
                Session::put('locale', $locale);
                return redirect()->back();
        });



