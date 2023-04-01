<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

/******************LOGIN PAGE ROUTES START****************/
Route::view('/','auth.login');
Route::post('login',[AuthController::class,'login'])->name('login');
/******************LOGIN PAGE ROUTES END****************/

/*******************REGISTER ROUTE START*************/      
Route::view('register','auth.register');
Route::post('register',[AuthController::class,'register'])->name('register');
/*******************REGISTER ROUTE END*************/     

/*******************LOGOUT ROUTE START*************/       
Route::get('logout',[AuthController::class,'logout'])->name('logout');
/*******************LOGOUT ROUTE END*************/     


/*******************ADMIN ROUTE START*************/       
include __DIR__ . '/admin.php';
/*******************ADMIN ROUTE END*************/     

/*******************STUDENT ROUTE START*************/       
include __DIR__ . '/student.php';
/*******************STUDENT ROUTE END*************/     

/*******************COLLEGE ROUTE START*************/       
include __DIR__ . '/college.php';
/*******************COLLEGE ROUTE END*************/    

/*******************TEACHER ROUTE START*************/       
include __DIR__ . '/teacher.php';
/*******************TEACHER ROUTE END*************/     
/******************FUNCTIONALITY ROUTES****************/
Route::get('cd', function() {
    Artisan::call('config:cache');
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed', [ '--class' => DatabaseSeeder::class]);
    Artisan::call('view:clear');
    return 'DONE';
  });
  Route::get('migrate', function() {
    Artisan::call('config:cache');
    Artisan::call('migrate');
    Artisan::call('view:clear');
    return 'DONE';
  });