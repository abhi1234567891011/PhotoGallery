@extends('layouts.app')


@section('content')

<h3>Upload Photo</h3>

<div class="container mt-4">
<form action="/photos/store" method="post" enctype="multipart/form-data">

<div class="form-group">

    @csrf

    <!-- Equivalent to... -->
    <input type="hidden" name="album_id" value="{{$album_id}}" >

    <input type="title" class="form-control" id="title" name="title"  placeholder="Photo Name">
    <small id="small1" class="form-text text-muted">Please enter the name of your Photo.</small>
</div>

<div class="form-group">
    <input type="textarea" class="form-control" id="description" name="description" placeholder="Photo Description">
    <small id="small2" class="form-text text-muted">Please enter the description of your Photo.</small>
</div>
<div class="form-group">
    <input type="file" class="form-control" id="photo" name="photo" >
    <small id="small3" class="form-text text-muted">Please enter the Photograph for your Photo.</small>
</div>
    <input type="submit" name="submit" class="btn btn-dark">

</form>
</div>
@endsection