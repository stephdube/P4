@extends('_master')

@section('content')

<form method="POST" action="/search">
Search: <input type="text" name="album_query"><br>

<input type="submit" value="Quick Search"></br>
</form>


@stop