<?php

/****************** COLLEGE MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\College\StudentController;
use App\Http\Controllers\College\StudentProfileController;

Route::group(['prefix' => 'college', 'as'=>'college.','middleware' => 'auth:user','college'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','college.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/     
      
    /*******************STUDENT ROUTE START*************/  
    /*******************COLLEGE PROFILE ROUTE START*************/ 
    Route::get('user/verified/{id}',[StudentProfileController::class,'verified'])->name('student_profile.verified');
    Route::get('user/revert_verification/{id}',[StudentProfileController::class,'revert_verification'])->name('student_profile.revert_verification');
    Route::get('user/active/{id}',[StudentProfileController::class,'active'])->name('student_profile.active');
    Route::get('user/in_active/{id}',[StudentProfileController::class,'in_active'])->name('student_profile.in_active');
    Route::resource('student_profile',StudentProfileController::class);
    /*******************COLLEGE PROFILE ROUTE END*************/ 
    Route::resource('student',StudentController::class);
    /*******************STUDENT ROUTE END*************/    
});
/****************** COLLEGE MIDDLEWARE PAGES ROUTES END****************/
?>