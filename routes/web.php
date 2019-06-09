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

//Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('public')->group(function () {
    Route::get('index', ['as' => 'panel.exam.index', 'uses' => 'site\HomeController@index']);
    Route::post('all', ['as' => 'panel.exam.search', 'uses' => 'site\HomeController@getall']);
    Route::get('index/data', ['as' => 'panel.exam.search-s', 'uses' => 'site\HomeController@get_exam_search']);
    Route::post('search/exam', 'site\HomeController@getExamData')->name('searchexamx');
    Route::post('download/exam', 'site\HomeController@getDownload')->name('downloadexamx');
    Route::get('home','site\HomeController@home')->name('mostdownload');
});


Route::view('try','public.Index');
Route::view('tst','public.search');

Route::get('notify',function(){

    $notify= App\Notification ::get();
//    dd($notify);

    foreach ($notify as $notification){
        dd($notification->type);
    }
});


//Route::get('notification',function(){
//
//    $user= Auth::user();
////    auth()->user()->notify(new MyFirstNotification($classes) );
//
//
////    dd($notification);
//    foreach($user->notificaitons as $note){
//        var_dump($note->type);
//
//    }
//});
