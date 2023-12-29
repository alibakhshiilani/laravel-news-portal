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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(["namespace"=>"App\Http\Controllers"],function(){
    Route::get('/',"HomeController@index");

    Route::get('/search',"HomeController@search")->name("search");
    Route::get('/statistics',"HomeController@index");
    Route::get('/start',"ScrapperController@start");

    Route::get('/tag/{slug}',"HomeController@index");
    Route::get('/category/{slug}',"HomeController@category")->name("category");
    Route::get('/{id}/{slug?}',"NewsController@show")->name("news.show");


});

