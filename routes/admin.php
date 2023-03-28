<?php 
/****************** ADMIN MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;

Route::group(['prefix' => 'admin', 'as'=>'admin.','middleware' => 'auth:user','admin'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','admin.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/       
    /*******************USER ROUTE START*************/       
    Route::get('user/verified/{id}',[UserController::class,'verified'])->name('user.verified');
    Route::get('user/revert_verification/{id}',[UserController::class,'revert_verification'])->name('user.revert_verification');
    Route::get('user/active/{id}',[UserController::class,'active'])->name('user.active');
    Route::get('user/in_active/{id}',[UserController::class,'in_active'])->name('user.in_active');
    Route::resource('user',UserController::class);
    /*******************USER ROUTE END*************/             
    /*******************COLLEGE ROUTE START*************/       
    Route::resource('college',CollegeController::class);
    /*******************COLLEGE ROUTE END*************/         
    /*******************STUDENT ROUTE START*************/       
    Route::resource('student',StudentController::class);
    /*******************STUDENT ROUTE END*************/       
    /*******************TEACHER ROUTE START*************/       
    Route::resource('teacher',TeacherController::class);
    /*******************TEACHER ROUTE END*************/    
    /*******************COURSE ROUTE START*************/       
    Route::resource('course',CourseController::class);
    /*******************COURSE ROUTE END*************/          
    /*******************SEMESTER ROUTE START*************/       
    Route::resource('semester',SemesterController::class);
    /*******************SEMESTER ROUTE END*************/         
    /*******************SUBJECT ROUTE START*************/       
    Route::resource('subject',SubjectController::class);
    /*******************SUBJECT ROUTE END*************/           
});
/****************** ADMIN MIDDLEWARE PAGES ROUTES END****************/
?>