@extends('_master')

@section('content')
<?php
	echo "You searched: <i>" . $album . "</i><br>";

	//$rows= DB::table('albums')->where('title', '=', $album)->get();

	//$rows = DB::select("SELECT title, name FROM albums a
	//	JOIN bands b ON b.id = a.band_id
	//	WHERE a.title = ?", array($album));

	$rows = DB::table('albums')->join('bands', 'bands.id', '=', 'albums.band_id')
		->select('title', 'name')->where('title', "=", $album)->get();

	echo Pre::render($rows);

	foreach ($rows as $row){
		echo $row->title;
	}

?>

@stop