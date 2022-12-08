<?php

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



Auth::routes();



Route::group(['middleware' => ['auth','verified']], function () {

  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

  //admin-menu routes
  Route::match(['get', 'post'], '/admin-menu', [App\Http\Controllers\AdminMenuController::class, 'index']);
  Route::match(['get', 'post'], '/admin-menu-create', [App\Http\Controllers\AdminMenuController::class, 'create']);
  Route::match(['get', 'post'], '/admin-menu-update/{id}', [App\Http\Controllers\AdminMenuController::class, 'update']);
  Route::match(['get', 'post'], '/admin-menu-delete/{id}', [App\Http\Controllers\AdminMenuController::class, 'delete']);
  Route::match(['get', 'post'], '/admin-menu-view/{id}', [App\Http\Controllers\AdminMenuController::class, 'view']);

  //admin-group routes
  Route::match(['get', 'post'], '/admin-group', [App\Http\Controllers\AdminGroupController::class, 'index']);
  Route::match(['get', 'post'], '/admin-group-create', [App\Http\Controllers\AdminGroupController::class, 'create']);
  Route::match(['get', 'post'], '/admin-group-update/{id}', [App\Http\Controllers\AdminGroupController::class, 'update']);
  Route::match(['get', 'post'], '/admin-group-delete/{id}', [App\Http\Controllers\AdminGroupController::class, 'delete']);
  Route::match(['get', 'post'], '/admin-group-view/{id}', [App\Http\Controllers\AdminGroupController::class, 'view']);


  Route::match(['get', 'post'], '/register-index', [App\Http\Controllers\Auth\RegisterController::class, 'index']);
  Route::match(['get', 'post'], '/register-update/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'update']);


  Route::match(['get', 'post'], '/contact-import', [App\Http\Controllers\CompanyController::class, 'index']);
  Route::match(['get', 'post'], '/upload-csv', [App\Http\Controllers\CompanyController::class, 'UploadCsv']);





  Route::match(['get', 'post'], '/ExtractPdf', [App\Http\Controllers\AdminGroupController::class, 'ExtractPdf']);
  
  
  
  Route::match(['get', 'post'], '/makeQueries', [App\Http\Controllers\HomeController::class, 'makeQueries']);
  
  Route::match(['get', 'post'], '/makeCategoryQueries', [App\Http\Controllers\HomeController::class, 'makeCategoryQueries']);


  

});
