<?php

/****************** COLLEGE MIDDLEWARE PAGES ROUTES START****************/

Route::group(['prefix' => 'college', 'as'=>'college.','middleware' => 'auth:user','college'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','college.dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/     
});
/****************** COLLEGE MIDDLEWARE PAGES ROUTES END****************/
?>