@extends('_master')

@section('content')

<form method="POST" action="/rate">
Search: <input type="text" name="album_query"><br>


<input type="submit" value="Search"></br>
</form>


@stop