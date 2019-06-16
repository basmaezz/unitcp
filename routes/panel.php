<?php
Route::get('/', ['as' => 'panel', 'uses' => 'PanelLoginController@index']);
Route::get('pause', ['as' => 'pause', 'uses' => 'PanelLoginController@pause']);
Route::get('/login', ['as' => 'panel.login', 'uses' => 'PanelLoginController@showLoginForm']);
Route::post('/login', ['as' => 'panel.login.post', 'uses' => 'PanelLoginController@login']);
Route::middleware(['authpermission','checkactive'])->group(function() {
    Route::get('/dashboard', ['as' => 'panel.dashboard', 'uses' => 'HomeController@index']);
    Route::get('/logout', 'HomeController@logout')->name('logout.panel');
    Route::get('/online','UserController@online')->name('users.online');
    Route::prefix('/user')->group(function () {
        Route::get('/all', ['as' => 'panel.users.all', 'uses' => 'UserController@index']);
        Route::get('/all/data', ['as' => 'panel.users.all.data', 'uses' => 'UserController@get_user_data_table']);


        Route::get('/allstudent', ['as' => 'panel.students.all', 'uses' => 'UserController@studentindex']);
        Route::get('/all/studentdata', ['as' => 'panel.students.all.data', 'uses' => 'UserController@get_student_data_table']);
        Route::prefix('/create')->group(function () {
            Route::get('/', ['as' => 'panel.users.create', 'uses' => 'UserController@create']);
            Route::post('/', ['as' => 'panel.users.create', 'uses' => 'UserController@store']);
        });
        Route::get('status/{id}', ['as' => 'panel.users.status', 'uses' => 'UserController@status']);
        Route::delete('/delete/{id}', ['as' => 'panel.users.delete', 'uses' => 'UserController@delete']);
        Route::get('/{profile}', ['as' => 'panel.users.profile', 'uses' => 'UserController@profile']);
        Route::post('/{profile}', ['as' => 'panel.users.editprofile', 'uses' => 'UserController@editprof']);
//        Route::get('/profile/{id}', ['as' => 'panel.users.profile', 'uses' => 'UserController@profile']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{user}', ['as' => 'panel.users.edit', 'uses' => 'UserController@edit']);
            Route::put('/{user}', ['as' => 'panel.users.edit', 'uses' => 'UserController@update']);
        });
    });

//    Route::prefix('/student')->middleware('authpermission')->group(function () {
//        Route::get('/all', ['as' => 'panel.student.all', 'uses' => 'StudentController@index']);
//        Route::get('/all/data', ['as' => 'panel.student.all.data', 'uses' => 'StudentController@get_student_data_table']);
//        Route::get('/data/{id}', ['as' => 'panel.student.item', 'uses' => 'StudentController@get_faculty_data']);
//        Route::prefix('/create')->group(function () {
//            Route::get('/', ['as' => 'panel.student.create', 'uses' => 'StudentController@create']);
//            Route::post('/', ['as' => 'panel.student.create', 'uses' => 'StudentController@store']);
//        });
//        Route::delete('/delete/{id}', ['as' => 'panel.student.delete', 'uses' => 'StudentController@delete']);
//        Route::prefix('/edit')->group(function () {
//            Route::get('/{student}', ['as' => 'panel.student.edit', 'uses' => 'StudentController@edit']);
//            Route::POST('/{student}', ['as' => 'panel.student.edit', 'uses' => 'StudentController@update']);
//        });
//    });

    Route::prefix('/faculty')->middleware('authpermission')->group(function () {
        Route::get('/all', ['as' => 'panel.faculty.all', 'uses' => 'FacultyController@index']);
        Route::get('/all/data', ['as' => 'panel.faculty.all.data', 'uses' => 'FacultyController@get_fac_data_table']);
        Route::get('/data/{id}', ['as' => 'panel.faculty.item', 'uses' => 'FacultyController@get_faculty_data']);
        Route::prefix('/create')->group(function () {
            Route::get('/', ['as' => 'panel.faculty.create', 'uses' => 'FacultyController@create']);
            Route::post('/', ['as' => 'panel.faculty.create', 'uses' => 'FacultyController@store']);
        });
        Route::delete('/delete/{id}', ['as' => 'panel.faculty.delete', 'uses' => 'FacultyController@delete']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{faculty}', ['as' => 'panel.faculty.edit', 'uses' => 'FacultyController@edit']);
            Route::POST('/{faculty}', ['as' => 'panel.faculty.edit', 'uses' => 'FacultyController@update']);
        });
    });
    Route::prefix('/classes')->group(function () {
        Route::get('/all', ['as' => 'panel.classes.all', 'uses' => 'ClassesController@index']);
        Route::get('/all/data', ['as' => 'panel.classes.all.data', 'uses' => 'ClassesController@get_classes_data_table']);
        Route::prefix('/create')->group(function () {
            Route::get('/', ['as' => 'panel.classes.create', 'uses' => 'ClassesController@create']);
            Route::post('/', ['as' => 'panel.classes.create', 'uses' => 'ClassesController@store']);
        });
        Route::delete('/delete/{id}', ['as' => 'panel.classes.delete', 'uses' => 'ClassesController@delete']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{classes}', ['as' => 'panel.classes.edit', 'uses' => 'ClassesController@edit']);
            Route::put('/{classes}', ['as' => 'panel.classes.edit', 'uses' => 'ClassesController@update']);
        });
    });
    Route::prefix('/semester')->group(function () {
        Route::get('/all', ['as' => 'panel.semester.all', 'uses' => 'SemesterController@index']);
        Route::get('/all/data', ['as' => 'panel.semester.all.data', 'uses' => 'SemesterController@get_semester_data_table']);
        Route::prefix('/create')->group(function () {
            Route::get('/', ['as' => 'panel.semester.create', 'uses' => 'SemesterController@create']);
            Route::post('/', ['as' => 'panel.semester.create', 'uses' => 'SemesterController@store']);
        });
        Route::delete('/delete/{id}', ['as' => 'panel.semester.delete', 'uses' => 'SemesterController@delete']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{classes}', ['as' => 'panel.semester.edit', 'uses' => 'SemesterController@edit']);
            Route::put('/{classes}', ['as' => 'panel.semester.edit', 'uses' => 'SemesterController@update']);
        });
    });
    Route::prefix('department')->group(function () {
        Route::get('all', ['as' => 'panel.department.all', 'uses' => 'DepartmentController@index']);
        Route::get('all/data', ['as' => 'panel.department.all.data', 'uses' => 'DepartmentController@get_department_data_table']);
        Route::prefix('/create')->group(function () {
            Route::get('/', ['as' => 'panel.department.create', 'uses' => 'DepartmentController@create']);
            Route::post('/', ['as' => 'panel.department.create', 'uses' => 'DepartmentController@store']);
        });
        Route::delete('/delete/{id}', ['as' => 'panel.department.delete', 'uses' => 'DepartmentController@delete']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{department}', ['as' => 'panel.department.edit', 'uses' => 'DepartmentController@edit']);
            Route::put('/{department}', ['as' => 'panel.department.edit', 'uses' => 'DepartmentController@update']);
        });
    });
    Route::prefix('material')->group(function () {
        Route::get('all', ['as' => 'panel.material.all', 'uses' => 'MaterialController@index']);
        Route::get('all/data', ['as' => 'panel.material.all.data', 'uses' => 'MaterialController@get_material_data_table']);
        Route::prefix('/create')->group(function () {
            Route::get('/', ['as' => 'panel.material.create', 'uses' => 'MaterialController@create']);
            Route::get('getData/{id}', ['as' => 'panel.material.create', 'uses' => 'MaterialController@getData']);
            Route::post('/', ['as' => 'panel.material.create', 'uses' => 'MaterialController@store']);
        });
        Route::delete('/delete/{id}', ['as' => 'panel.material.delete', 'uses' => 'MaterialController@delete']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{material}', ['as' => 'panel.material.edit', 'uses' => 'MaterialController@edit']);
            Route::put('/{material}', ['as' => 'panel.material.edit', 'uses' => 'MaterialController@update']);
        });
    });


//*******************Exams*****************
    Route::prefix('/file')->group(function () {
        Route::post('/upload', ['as' => 'panel.file.upload', 'uses' => 'FileController@uploadFile']);
        Route::post('/delete', ['as' => 'panel.file.delete', 'uses' => 'FileController@delete_file']);
        Route::get('/{id}', 'FileController@get_file');
    });
    Route::prefix('exam')->group(function () {
        Route::get('all', ['as' => 'panel.exam.all', 'uses' => 'ExamController@index']);
        Route::get('/all/data', ['as' => 'panel.exam.all.data', 'uses' => 'ExamController@get_exams_data_table']);
        Route::get('/searchTable/{id}',  'ExamController@search_table');
        Route::get('main', ['as' => 'panel.exam.main', 'uses' => 'ExamController@main']);
        Route::prefix('/create')->group(function () {
            Route::get('/', ['as' => 'panel.exam.create', 'uses' => 'ExamController@create']);
            Route::get('getExamData/{id}', ['as' => 'panel.exam.create', 'uses' => 'ExamController@getExamData']);
            Route::post('/', ['as' => 'panel.exam.create', 'uses' => 'ExamController@store']);
        });
        Route::delete('/delete/{id}', ['as' => 'panel.exam.delete', 'uses' => 'ExamController@delete']);
        Route::get('/delfile/{id}', ['as' => 'panel.exam.delfile', 'uses' => 'ExamController@delfile']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{exam}', ['as' => 'panel.exam.edit', 'uses' => 'ExamController@edit']);
            Route::put('/{exam}', ['as' => 'panel.exam.edit', 'uses' => 'ExamController@update']);
        });
    });

    Route::prefix('settings')->group(function () {
        Route::get('index', 'ConfigController@index')->name('stopupload');
        Route::POST('update', 'ConfigController@update')->name('updateconfig');

    });

    Route::prefix('logs')->group(function () {
        Route::get('all', ['as' => 'panel.log.all', 'uses' => 'LogController@index']);
        Route::get('all/data', ['as' => 'panel.log.all.data', 'uses' => 'LogController@get_log_data_table']);

    });



    Route::prefix('tag')->group(function () {
        Route::get('/all', ['as' => 'panel.tag.all', 'uses' => 'TagController@index']);
        Route::get('/all/data', ['as' => 'panel.tag.all.data', 'uses' => 'TagController@get_tag_data_table']);
        Route::get('/data/{id}', ['as' => 'panel.tag.item', 'uses' => 'TagController@get_tag_data']);
        Route::prefix('/create')->group(function () {

            Route::get('/', ['as' => 'panel.tag.create', 'uses' => 'TagController@create']);
            Route::POST('/', ['as' => 'panel.tag.create', 'uses' => 'TagController@store']);

        });
        Route::delete('/delete/{id}', ['as' => 'panel.tag.delete', 'uses' => 'TagController@delete']);
        Route::prefix('/edit')->group(function () {
            Route::get('/{tag}', ['as' => 'panel.tag.edit', 'uses' => 'TagController@edit']);
            Route::POST('/{tag}', ['as' => 'panel.tag.edit', 'uses' => 'TagController@update']);
        });
    });



});


