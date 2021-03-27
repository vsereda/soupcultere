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

Route::get('/test', 'TestController@test');

Route::middleware(['verified.custom', 'check.user.additional.data'])->group(function () {
    Route::get('/', 'HomeController@indexSoup')->name('home');
    Route::resource('/menu', 'MenuController')->only(['index', 'show']);
    Route::get('/delivery', 'HomeController@deliverySoup')->name('delivery');
    Route::get('/about', 'HomeController@aboutSoup')->name('about');
});

Route::namespace('Auth')->group(function (){
    Route::get('/facebook/redirect', 'SocialAuthController@facebookRedirect');
    Route::get('/facebook/callback', 'SocialAuthController@facebookCallback');

    Route::get('/google/redirect', 'SocialAuthController@googleRedirect');
    Route::get('/google/callback', 'SocialAuthController@googleCallback');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/register/additional', 'Auth\AdditionalDataController@registerForm')->name('address_register_form');
    Route::post('/register/additional', 'Auth\AdditionalDataController@register')->name('address_register');
});
