<?php

Route::middleware(['authsubpermission','checkactive'])->group(function() {
    Route::prefix('/classes')->group(function () {
        Route::get('/fac-classes', ['as' => 'units.classes.all', 'uses' => 'ClassesController@index']);
        Route::get('/all/data', ['as' => 'units.fac-classes.all.data', 'uses' => 'ClassesController@get_fac_classes_data_table']);
        Route::prefix('/create')->group(function () {
            Route::get('/', ['as' => 'units.classes.create', 'uses' => 'ClassesController@create']);
            Route::post('/', ['as' => 'units.classes.create', 'uses' => 'ClassesController@store']);
        });
        Route::delete('/delete/{id}', ['as' => 'units.classes.delete', 'uses' => 'ClassesController@delete']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{classes}', ['as' => 'units.classes.edit', 'uses' => 'ClassesController@edit']);
            Route::put('/{classes}', ['as' => 'units.classes.edit', 'uses' => 'ClassesController@update']);
        });
    });

    Route::prefix('/semester')->group(function () {
        Route::get('/fac-semester', ['as' => 'units.semester.all', 'uses' => 'SemesterController@index']);
        Route::get('/all/data', ['as' => 'units.semester.all.data', 'uses' => 'SemesterController@get_fac_semester_data_table']);
        Route::prefix('/create')->group(function () {
            Route::get('/', ['as' => 'units.semester.create', 'uses' => 'SemesterController@create']);
            Route::post('/', ['as' => 'units.semester.create', 'uses' => 'SemesterController@store']);
        });
        Route::delete('/delete/{id}', ['as' => 'units.semester.delete', 'uses' => 'SemesterController@delete']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{semester}', ['as' => 'units.semester.edit', 'uses' => 'SemesterController@edit']);
            Route::put('/{semester}', ['as' => 'units.semester.edit', 'uses' => 'SemesterController@update']);
        });
    });

    Route::prefix('material')->group(function () {
        Route::get('/fac-material', ['as' => 'units.material.all', 'uses' => 'MaterialController@index']);
        Route::get('all/data', ['as' => 'units.fac-material.all.data', 'uses' => 'MaterialController@get_fac_material_data_table']);
        Route::prefix('/create')->group(function () {
            Route::get('/', ['as' => 'units.material.create', 'uses' => 'MaterialController@create']);
            Route::get('getData/{id}', ['as' => 'units.material.create', 'uses' => 'MaterialController@getData']);
            Route::post('/', ['as' => 'units.material.create', 'uses' => 'MaterialController@store']);
        });
        Route::delete('/delete/{id}', ['as' => 'units.material.delete', 'uses' => 'MaterialController@delete']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{material}', ['as' => 'units.material.edit', 'uses' => 'MaterialController@edit']);
//            Route::get('/{material}', ['as' => 'panel.material.edit', 'uses' => 'MaterialController@getMaterialData']);
            Route::put('/{material}', ['as' => 'units.material.edit', 'uses' => 'MaterialController@update']);
        });
    });

    //*******************Exams*****************
    Route::prefix('/file')->group(function () {
        Route::post('/upload', ['as' => 'units.file.upload', 'uses' => 'FileController@uploadFile']);
        Route::post('/delete', ['as' => 'units.file.delete', 'uses' => 'FileController@delete_file']);
        Route::get('/{id}', 'FileController@get_file');
    });
    Route::prefix('exam')->group(function () {
        Route::get('fac-exam', ['as' => 'units.exam.all', 'uses' => 'ExamController@index']);
        Route::get('/all/data', ['as' => 'units.fac-exam.all.data', 'uses' => 'ExamController@get_fac_exams_data_table']);
//        Route::get('/searchTable', ['as' => 'panel.exam.all', 'uses' => 'ExamController@search_table']);
        Route::get('/searchTable/{id}',  'ExamController@search_table');
        Route::get('main', ['as' => 'units.exam.main', 'uses' => 'ExamController@main']);
        Route::prefix('/create')->group(function () {
            Route::get('/', ['as' => 'units.exam.create', 'uses' => 'ExamController@create']);
            Route::get('getExamData/{id}', ['as' => 'units.exam.create', 'uses' => 'ExamController@getExamData']);
            Route::post('/', ['as' => 'units.exam.create', 'uses' => 'ExamController@store']);
        });
        Route::delete('/delete/{id}', ['as' => 'units.exam.delete', 'uses' => 'ExamController@delete']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{material}', ['as' => 'units.exam.edit', 'uses' => 'ExamController@edit']);
            Route::put('/{material}', ['as' => 'units.exam.edit', 'uses' => 'ExamController@update']);
        });
    });

});

