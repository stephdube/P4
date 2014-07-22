@extends('_master')

@section('content')
<?php
	echo "You searched: <i>" . $album . "</i><br>";

	//$rows= DB::table('albums')->where('title', '=', $album)->get();

	//$rows = DB::select("SELECT title, name FROM albums a
	//	JOIN bands b ON b.id = a.band_id
	//	WHERE a.title = ?", array($album));

	$albums = DB::table('albums')->join('bands', 'bands.band_id', '=', 'albums.band_id')
		->leftJoin('reviews', 'reviews.album_id', '=', 'albums.album_id')
		->select('albums.album_id', 'albums.album_title', 'bands.band_name', 'bands.genre', 'albums.release_type', 'bands.country', 'albums.release_date', 'albums.label', DB::raw('avg(rating) as avg_rating'), DB::raw('count(rating) as review_count'))
		->where('album_title', 'LIKE', "%$album%")
		->groupBy('albums.album_id', 'albums.album_title', 'bands.band_name', 'bands.genre', 'albums.release_type', 'bands.country', 'albums.release_date', 'albums.label')
		->get();

	echo "<ul>";
	foreach ($albums as $album){
		echo "<li>";
		echo "Album: <a href='/album?id=" . $album->album_id ."'>" . $album->album_title . "</a><br>";
		echo "Band: " . $album->band_name . "<br>";
		echo "Genre: " . $album->genre . "<br>";
		echo "Release Type: " . $album->release_type . "<br>";
		echo "Country: " . $album->country . "<br>";
		echo "Released: " . $album->release_date . "<br>";
		echo "Label: " . $album->label . "<br>";
		echo "Average rating of this album: " . $album->avg_rating . "<br>";
		echo "Number of ratings: " . $album->review_count . "<br>";
		echo "</li><br><br>";
	}
	echo "</ul>";

?>

@stop