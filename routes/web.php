<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|PP
*/
// Client
Route::get('/tutor_detail/{id}','EvalueController@tutordetail')->name('tutordetail');
Route::get('/evalue/{code}','EvalueController@evalue')->name('evalue');
Route::post('/evalue','EvalueController@evalue1')->name('evalue1');
Route::namespace('Client')->group(function () {
    Route::get('/', 'HomeController@index')->name('client.home');
    Route::get('/login', 'LoginController@showLogin')->name('client.show.login');
    Route::post('/login', 'LoginController@login')->name('client.post.login');
    Route::get('/logout', 'LoginController@logout')->name('client.logout');
    Route::get('/register-teacher', 'TeacherController@registerTeacher')->name('client.register.teacher');
    Route::post('/register-teacher', 'TeacherController@handleRegisterTeacher')->name('client.handle.register.teacher');
    Route::get('/ajax-class', 'TeacherController@ajaxClass');
    Route::get('/ajax-city', 'TeacherController@ajaxCity');
    Route::get('/contact', 'ContactController@contact')->name('client.contact');
    Route::post('/contact', 'ContactController@postContact')->name('client.post.contact');
    Route::get('/introduce', 'HomeController@introduce')->name('client.introduce');
    Route::get('/register-class/{id}', 'HomeController@registerClass')->name('client.register.class');
    Route::get('/posts', 'HomeController@showPosts')->name('client.posts');
    Route::get('/checkout/{id}', 'HomeController@checkout')->name('client.checkout')->middleware('check.payment');
    Route::post('/checkout/{id}', 'HomeController@pay')->name('client.pay')->middleware('check.payment');
    Route::get('done-payment-paypal', 'HomeController@donePaymentPaypal')->name('done.payment.paypal');
    Route::get('cancel-payment-paypal', 'HomeController@cancelPaymentPaypal')->name('cancel.payment.paypal');
    Route::get('/post/search', 'HomeController@searchPost')->name('client.search.post');
    Route::get('/find-teacher', 'HomeController@findTeacher')->name('client.find.teacher');
    Route::post('/find-teacher', 'HomeController@postFindTeacher')->name('client.post.find.teacher');
});

// Admin
Route::namespace('Admin')->prefix('ad')->group(function () {
    Route::get('/', function () {
        if (Auth::guard('admin')->check()) {
            if (Auth::guard('admin')->user()->role == 0) {
                return redirect()->route('classes.list');
            } else {
                return redirect()->route('register-teacher.list');
            }
        } else {
            return redirect()->route('admin.form.login');
        }
        return redirect()->route('admin.form.login');
    });
    // Login, logout
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.form.login');
    Route::post('/login', 'LoginController@login')->name('admin.handle.login');
    Route::get('/logout', 'LoginController@logout')->name('admin.handle.logout');
    //reset-password
    Route::post('reset-password', 'ResetPasswordController@sendMail')->name('admin.handle.forgotpassword');
    Route::put('reset-password/{token}', 'ResetPasswordController@reset')->name('admin.handle.resetpassword');
  

    Route::group(['middleware' => 'check.admin.login'], function() {
        // Staff
        Route::group(['prefix'=>'staff'],function(){
            Route::get('list','StaffController@index')->name('staff.list');

            Route::get('edit/{id}','StaffController@edit')->name('staff.edit.form');

            Route::post('edit/{id}','StaffController@update')->name('staff.edit');

            Route::get('add','StaffController@create')->name('staff.add.form');

            Route::post('add','StaffController@store')->name('staff.add');

            Route::get('delete/{id}','StaffController@destroy')->name('staff.delete');
        });
        // Classes
        Route::group(['prefix' => 'classes'],function(){
            Route::get('list','ClassesController@index')->name('classes.list');

            Route::get('edit/{id}','ClassesController@edit')->name('classes.edit.form');

            Route::post('edit/{id}','ClassesController@update')->name('classes.edit');

            Route::get('add','ClassesController@create')->name('classes.add.form');

            Route::post('add','ClassesController@store')->name('classes.add');

            Route::get('delete/{id}','ClassesController@destroy')->name('classes.delete');
        });
        // Subject
        Route::group(['prefix' => 'subject'],function(){
            Route::get('list','SubjectController@index')->name('subject.list');

            Route::get('edit/{id}','SubjectController@edit')->name('subject.edit.form');

            Route::post('edit/{id}','SubjectController@update')->name('subject.edit');

            Route::get('add','SubjectController@create')->name('subject.add.form');

            Route::post('add','SubjectController@store')->name('subject.add');

            Route::get('delete/{id}','SubjectController@destroy')->name('subject.delete');
        });
        // Post
        Route::group(['prefix'=>'post'],function(){
            Route::get('list','PostController@index')->name('post.list');

            Route::get('edit/{id}','PostController@edit')->name('post.edit.form');

            Route::post('edit/{id}','PostController@update')->name('post.edit');

            Route::get('add/{contactId}','PostController@create')->name('post.add.form');

            Route::post('add/{contactId}','PostController@store')->name('post.add');

            Route::get('delete/{id}','PostController@destroy')->name('post.delete');

            Route::get('show/{id}','PostController@show')->name('post.show');
        });
        // Contact
        Route::group(['prefix'=>'contact'],function(){
            Route::get('list','ContactController@index')->name('contact.list');

            Route::get('show/{id}','ContactController@show')->name('contact.show');
        });
        // Register teacher
        Route::group(['prefix'=>'register-teacher'],function(){
            Route::get('list','RegisterTeacherController@index')->name('register-teacher.list');

            Route::get('show/{id}','RegisterTeacherController@show')->name('register-teacher.show');

            Route::get('approve/{id}','RegisterTeacherController@approve')->name('register-teacher.approve');

            Route::get('update-active/{id}/{active}','RegisterTeacherController@updateActive')->name('register-teacher.update-active');
        });
        // Register class
        Route::group(['prefix'=>'register-class'],function(){
            Route::get('list','RegisterClassController@index')->name('register-class.list');

            Route::get('show/{id}','RegisterClassController@show')->name('register-class.show');

            Route::get('approve/{id}','RegisterClassController@approve')->name('register-class.approve');
        });
        // Assign tutor
        Route::group(['prefix'=>'assign-tutor'],function(){
            Route::get('list','AssignTutorController@index')->name('assign-tutor.list');

            Route::get('show/{id}','AssignTutorController@show')->name('assign-tutor.show');

            Route::get('tutor/{id}/{email}','AssignTutorController@showAssignTutor')->name('assign-tutor.tutor');

            Route::post('tutor','AssignTutorController@assignTutor')->name('assign-tutor.tutor');
        });
    });
});