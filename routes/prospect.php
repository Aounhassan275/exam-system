<?php

/****************** PROSPECT MIDDLEWARE PAGES ROUTES START****************/

use App\Http\Controllers\Prospect\DashboardController;
use App\Http\Controllers\Prospect\StudentAcademicQualificationController;

Route::group(['prefix' => 'prospect', 'as'=>'prospect.','middleware' => 'auth:user','prospect'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');  
    Route::post('dashboard/student_profile_update',[DashboardController::class,'studentProfileUpdate'])->name('dashboard.student_profile_update');  
    Route::post('dashboard/student_address_update',[DashboardController::class,'studentAddressUpdate'])->name('dashboard.student_address_update');  
    Route::post('dashboard/student_document_update',[DashboardController::class,'studentDocumentUpdate'])->name('dashboard.student_document_update');  
    Route::get('dashboard/download_document/{id}',[DashboardController::class,'downloadFile'])->name('dashboard.download_document');
    /*******************DASHBOARD ROUTE END*************/ 
    Route::resource('academic_qualification',StudentAcademicQualificationController::class);
});
/****************** PROSPECT MIDDLEWARE PAGES ROUTES END****************/
?>