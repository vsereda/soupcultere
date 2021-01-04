<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes(['verify' => true]);


Route::middleware(['verified.custom'])->group(function () {
    Route::get('/', 'HomeController@indexSoup')->name('home');
    Route::get('/menu', 'HomeController@menuSoup')->name('menu');
    Route::get('/delivery', 'HomeController@deliverySoup')->name('delivery');
    Route::get('/about', 'HomeController@aboutSoup')->name('about');
});

Route::get('/facebook/redirect', 'SocialAuthController@facebookRedirect');
Route::get('/facebook/callback', 'SocialAuthController@facebookCallback');

Route::get('/google/redirect', 'SocialAuthController@googleRedirect');
Route::get('/google/callback', 'SocialAuthController@googleCallback');
