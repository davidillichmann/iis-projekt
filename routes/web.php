<?php

//Homepage
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/doc', 'HomeController@doc')->name('doc');

//concert
Route::get('/concert/new', 'ConcertController@add')->name('concert.add');
Route::post('/concert/new', 'ConcertController@sent')->name('concert.sent');
Route::get('/concert/{id}', 'ConcertController@show')->name('concert.show');
Route::get('/concert/{id}/addInterpret', 'ConcertController@addInterpret')->name('concert.addInterpret');
Route::post('/concert/{id}/sentInterpret', 'ConcertController@sentInterpret')->name('concert.sentInterpret');
Route::get('/concert/{concertid}/deleteInterpret/{concertinterpretid}', 'ConcertController@deleteInterpret')->name('concert.deleteInterpret');
Route::get('/concert/{id}/addTicketType', 'ConcertController@addTicketType')->name('concert.addTicketType');
Route::post('/concert/{id}/sentTicketType', 'ConcertController@sentTicketType')->name('concert.sentTicketType');
Route::get('/concert/{concertid}/deleteTicketType/{tickettypeid}', 'ConcertController@deleteTicketType')->name('concert.deleteTicketType');
Route::get('/concert/{id}/editForm', 'ConcertController@editForm')->name('concert.editForm');
Route::post('/concert/{concertid}/edit', 'ConcertController@edit')->name('concert.edit');
Route::get('/concert/{concertid}/delete/{eventid}', 'ConcertController@delete')->name('concert.delete');

//festival
Route::get('/festival/new', 'FestivalController@add')->name('festival.add');
Route::post('/festival/new', 'FestivalController@sent')->name('festival.sent');
Route::get('/festival/{id}', 'FestivalController@show')->name('festival.show');
Route::get('/festival/{id}/editForm', 'FestivalController@editForm')->name('festival.editForm');
Route::post('/festival/{id}/edit', 'FestivalController@edit')->name('festival.edit');
Route::get('/festival/{festivalid}/delete/{eventid}', 'FestivalController@delete')->name('festival.delete');
Route::get('/festival/{id}/addTicketType', 'FestivalController@addTicketType')->name('festival.addTicketType');
Route::post('/festival/{id}/sentTicketType', 'FestivalController@sentTicketType')->name('festival.sentTicketType');
Route::get('/festival/{festivalid}/deleteTicketType/{tickettypeid}', 'FestivalController@deleteTicketType')->name('festival.deleteTicketType');

//stage
Route::get('/festival/{id}/stage/add', 'StageController@add')->name('stage.add');
Route::post('/festival/{id}/stage/add', 'StageController@sent')->name('stage.sent');
Route::get('/festival/{festivalid}/stage/{stageid}/addInterpret', 'StageController@addInterpret')->name('stage.addInterpret');
Route::post('/festival/{festivalid}/stage/{stageid}/sentInterpret', 'StageController@sentInterpret')->name('stage.sentInterpret');
Route::get('/festival/{festivalid}/stage/{stageid}/deleteInterpret/{stageinterpretid}', 'StageController@deleteInterpret')->name('stage.deleteInterpret');
Route::get('/festival/{festivalid}/stage/{stageid}/delete', 'StageController@delete')->name('stage.delete');
Route::get('/festival/{festivalid}/stage/{stageid}/editForm', 'StageController@editForm')->name('stage.editForm');
Route::post('/festival/{festivalid}/stage/{stageid}/edit', 'StageController@edit')->name('stage.edit');

//ticket
Route::get('/event/{eventid}/orderTicket', 'TicketController@add')->name('ticket.add');
Route::post('/event/orderTicket', 'TicketController@sent')->name('ticket.sent');
Route::get('/event/pay', 'TicketController@payment')->name('ticket.payment');

//user
Route::get('/profile/{userId}', 'UserController@show')->name('user.show');
Route::get('/profile/{userId}/editForm', 'UserController@editForm')->name('user.editForm');
Route::post('/profile/{userId}/edit', 'UserController@edit')->name('user.edit');
Route::get('/profile/{userId}/toUser', 'UserController@changeToUser')->name('user.changeToUser');
Route::get('/profile/{userId}/toOragniser', 'UserController@changeToOrganiser')->name('user.changeToOrganiser');
Route::get('/profile/{userId}/delete', 'UserController@delete')->name('user.delete');
Route::get('/profile/{userId}/deactivate', 'UserController@deactivate')->name('user.deactivate');

//search
Route::get('/search', 'SearchController@index')->name('search.index');

//interpret
Route::get('/interprets', 'InterpretController@index')->name('interpret.index');
Route::get('/interpret/new', 'InterpretController@add')->name('interpret.add');
Route::post('/interpret/new', 'InterpretController@sent')->name('interpret.sent');
Route::get('/interpret/{id}', 'InterpretController@show')->name('interpret.show');
Route::get('/interpret/{id}/delete', 'InterpretController@delete')->name('interpret.delete');
Route::get('/interpret/{id}/editForm', 'InterpretController@editForm')->name('interpret.editForm');
Route::post('/interpret/{id}/edit', 'InterpretController@edit')->name('interpret.edit');

Route::get('/interpret/{id}/like', 'InterpretController@like')->name('interpret.like');
Route::get('/interpret/{id}/dislike', 'InterpretController@dislike')->name('interpret.dislike');

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