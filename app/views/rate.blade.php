@extends('_master')

@section('content')
<?php
	echo $album."<br>";

	//$rows= DB::table('albums')->where('title', '=', $album)->get();

	$rows = DB::select("SELECT title, name FROM albums a
		JOIN bands b ON b.id = a.band_id
		WHERE a.title = 'Nightfall'");

	echo Pre::render($rows);

	foreach ($rows as $row){
		echo $row->title;
	}


?>

@stop