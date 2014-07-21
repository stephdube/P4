<?php

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/signup', function()
{
	return View::make('signup');
});

Route::get('/rate', function()
{
	if(Input::get('album_query')){
		$album = Input::get('album_query');
		return View::make('rate')
		->with('album',$album);
	}
	else{
		return View::make('search');
	};
});

Route::post('/rate', function()
{
	if(Input::get('album_query')){
		$album = Input::get('album_query');
		return View::make('rate')
		->with('album',$album);
	}
	else{
		return View::make('search');
	};
});
