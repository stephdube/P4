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

Route::get('sql', function(){
	$results = DB::select('SHOW DATABASES;');
	return Pre::render($results);
});

Route::get('albums', function(){
	$albums = file_get_contents("C:\MAMP\htdocs\p4\app\database\MAAlbums.csv");
	$rows = explode("\r\n", $albums);
	print_r($rows);

});