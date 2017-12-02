<?php

//Homepage
Route::get('/', 'HomeController@index')->name('home.index');

//concert
Route::get('/concert/new', 'ConcertController@add')->name('concert.add');
Route::post('/concert/new', 'ConcertController@sent')->name('concert.sent');
Route::get('/concert/{id}', 'ConcertController@show')->name('concert.show');
Route::get('/concert/{id}/addInterpret', 'ConcertController@addInterpret')->name('concert.addInterpret');
Route::post('/concert/{id}/sentInterpret', 'ConcertController@sentInterpret')->name('concert.sentInterpret');

//festival
Route::get('/festival/{id}', 'FestivalController@show')->name('festival.show');

//stage
Route::get('/festival/{id}/stage/add', 'StageController@add')->name('stage.add');
Route::post('/festival/{id}/stage/add', 'StageController@sent')->name('stage.sent');
Route::get('/festival/{festivalid}/stage/{stageid}/addInterpret', 'StageController@addInterpret')->name('stage.addInterpret');
Route::post('/festival/{festivalid}/stage/{stageid}/sentInterpret', 'StageController@sentInterpret')->name('stage.sentInterpret');
Route::get('/festival/{festivalid}/stage/{stageid}/deleteInterpret/{stageinterpretid}', 'StageController@deleteInterpret')->name('stage.deleteInterpret');
Route::get('/festival/{festivalid}/stage/{stageid}/delete', 'StageController@delete')->name('stage.delete');
Route::get('/festival/{festivalid}/stage/{stageid}/editForm', 'StageController@editForm')->name('stage.editForm');
Route::post('/festival/{festivalid}/stage/{stageid}/edit', 'StageController@edit')->name('stage.edit');

//search
Route::get('/search', 'SearchController@index')->name('search.index');

//interpret
Route::get('/interprets', 'InterpretController@index')->name('interpret.index');
Route::get('/interpret/new', 'InterpretController@add')->name('interpret.add');
Route::post('/interpret/new', 'InterpretController@sent')->name('interpret.sent');
Route::get('/interpret/{id}', 'InterpretController@show')->name('interpret.show');


// Login and Register Routes
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('/password/reset', 'Auth\ResetPasswordController@reset');