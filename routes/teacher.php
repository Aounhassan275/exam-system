<?php

/****************** TEACHER MIDDLEWARE PAGES ROUTES START****************/


Route::group(['prefix' => 'teacher', 'as'=>'teacher.','middleware' => 'auth:user','teacher'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','teacher.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/     
});
/****************** TEACHER MIDDLEWARE PAGES ROUTES END****************/
?>