@extends('layouts.app')

@section('content')
<div class="container text-center">
<h3>{{$photo->title}}</h3>
<p>{{$photo->description}}</p>
<a href="/albums/{{$photo->albums_id}}" class="btn btn-secondary">Back To Gallery</a>
<br><br><br>
<img src="/storage/photos/{{$photo->photo}}" alt="{{$photo->title}}">
<hr><br><br><br>
<form action="/photos/{{$photo->id}}" method="POST">
    @csrf
    <input type="submit" id="submit" class="btn btn-danger" value="Delete photo">

</form>
</div>
@endsection