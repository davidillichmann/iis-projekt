<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');




//concert
Route::get('/concert/{id}', 'ConcertController@show')->name('concert.show');

//festival
Route::get('/festival/{id}', 'FestivalController@show')->name('festival.show');



//events
Route::get('/events', function() {
    return view('event.index');
})->name('event.index');

//interprets



// Login and Register Routes
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('logout');
Route::post('/password/email', 'Auth\ResetPasswordController@showResetForm')->name('logout');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');