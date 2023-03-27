<?php

/****************** STUDENT MIDDLEWARE PAGES ROUTES START****************/


Route::group(['prefix' => 'student', 'as'=>'student.','middleware' => 'auth:user','student'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','student.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/     
});
/****************** STUDENT MIDDLEWARE PAGES ROUTES END****************/
?>