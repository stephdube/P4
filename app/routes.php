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

Route::get('/search', function()
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

Route::post('/search', function()
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

// Once someone selects an album, go to the album's rating page to rate it..
Route::get('/album', function()
{
	$album_id = Input::get('id');
	echo $album_id;
});
