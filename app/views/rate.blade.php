@extends('_master')

@section('content')
<?php

echo "You searched: <i>" . $album . "</i><br>";

// Query for albums that match user's search input
// along with relevant album-data
$albums = DB::table('albums')
	->join('bands', 'bands.band_id', '=', 'albums.band_id') // get band info for album
	->leftJoin('reviews', 'reviews.album_id', '=', 'albums.album_id') // get review info for album
	->select('albums.album_id', 'albums.album_title', 'bands.band_name', 'bands.genre', 'albums.release_type', 'bands.country', 'albums.release_date', 'albums.label', DB::raw('AVG(rating) as avg_rating'), DB::raw('count(rating) as review_count'), 
		// Aggregate data about reviews -- this divides possible scores into buckets and counts how many reviews an album has in each bucket, to give a better idea of how it's been received
		DB::raw('count(CASE WHEN rating <= 10 THEN 1 ELSE null END) as rat10'),
		DB::raw('count(CASE WHEN 10 < rating AND rating <= 20 THEN 1 END) as rat20'),
		DB::raw('count(CASE WHEN 20 < rating AND rating <= 30 THEN 1 END) as rat30'),
		DB::raw('count(CASE WHEN 30 < rating AND rating <= 40 THEN 1 END) as rat40'),
		DB::raw('count(CASE WHEN 40 < rating AND rating <= 50 THEN 1 END) as rat50'),
		DB::raw('count(CASE WHEN 50 < rating AND rating <= 60 THEN 1 END) as rat60'),
		DB::raw('count(CASE WHEN 60 < rating AND rating <= 70 THEN 1 END) as rat70'),
		DB::raw('count(CASE WHEN 70 < rating AND rating <= 80 THEN 1 END) as rat80'),
		DB::raw('count(CASE WHEN 80 < rating AND rating <= 90 THEN 1 END) as rat90'),
		DB::raw('count(CASE WHEN 90 < rating THEN 1 END) as rat100'))
	// Filter album names for user's search query
	->where('album_title', 'LIKE', "%$album%")
	// Combine data into unique rows based on albums
	->groupBy('albums.album_id', 'albums.album_title', 'bands.band_name', 'bands.genre', 'albums.release_type', 'bands.country', 'albums.release_date', 'albums.label')
	->get();

	echo Pre::render($albums);

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