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

	$row = explode(",", $rows[1]);

	for ($i = 0; $i<count($rows);$i++){
		$album = explode(",", $rows[$i]);
		print_r($album);
		echo "<br>";

		DB::insert("insert into albums (id, title, band_id, type, label, release_date)  values('$album[0]', '$album[1]', '$album[2]', '$album[3]', '$album[4]', '$album[5]')");
		echo "added row to database?<br>";
	}
	

});