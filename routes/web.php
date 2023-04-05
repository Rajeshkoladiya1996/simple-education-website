<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace' => 'Admin'], function () {
    Route::get('login', 'AuthController@login');
    Route::get('signup', 'AuthController@signup');
    Route::post('signup', 'AuthController@regigster');
    Route::post('login', 'AuthController@doLogin');
    Route::get('lock', 'AuthController@lock');
    Route::post('lock', 'AuthController@unLock');
    Route::get('forget', 'AuthController@forget');

    Route::group(['middleware' => ['AdminAuth','Lock']], function () {
        Route::get('/logout','AuthController@logout');
        Route::get('/', 'DashboardController@index');

        Route::get('/studentdash', 'DashboardController@studentdash');
        Route::get('/student/myquestion', 'QuestionController@myquestion');
        Route::post('/student/addquestion', 'QuestionController@addquestion'); 
        Route::get('/student/questionlist', 'QuestionController@questionlist');


        Route::get('/student/mycourse', 'CourseController@mycourse'); 
        Route::post('/student/deleteenrolledcourse', 'CourseController@deleteenrolledcourse');
        Route::get('/student/enrollcourselist', 'CourseController@enrollcourselist');
        Route::post('/student/deletecourse', 'CourseController@studentdeletecourse');
        Route::get('/student/courselist', 'CourseController@courselisting');

        Route::get('/student/notes', 'NotesController@index');
        Route::POST('/student/addnotes', 'NotesController@addnotes'); 
        Route::get('/student/notelist', 'NotesController@notelist');
        Route::POST('student/deletenotes', 'NotesController@deletenotes');
        Route::get('student/viewcourse/{id}','CourseController@studentviewcourse');
        
        
        
        

        

        Route::resource('user','UserController');
        Route::get('user/{id}/status','UserController@statusChange');

        // address
        Route::post('admin/addcourse','CourseController@addcourse');
        Route::get('admin/courselist','CourseController@courselist');
        Route::post('admin/deletecourse','CourseController@deletecourse'); 
        Route::post('admin/editcoursedata','CourseController@editcoursedata');
        Route::post('admin/updatecourse','CourseController@updatecourse');

        Route::post('admin/replycourse','CourseController@replycourse');
        Route::post('admin/enrollcourse','CourseController@enrollcourse');
        Route::get('admin/viewcourse/{id}','CourseController@viewcourse');
   

        

        
        


        //Ship List
        Route::get('shiplist/','ShipController@index');
    

    });
});
