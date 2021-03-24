@extends('layouts.app')


@section('content')

<h3>Create albums</h3>

<div class="container mt-4">
<form action="/albums/store" method="post" enctype="multipart/form-data">

<div class="form-group">

    @csrf

    <!-- Equivalent to...
    <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->

    <input type="text" class="form-control" id="name" name="name"  placeholder="Album Name">
    <small id="small1" class="form-text text-muted">Please enter the name of your album.</small>
</div>

<div class="form-group">
    <input type="textarea" class="form-control" id="description" name="description" placeholder="Album Description">
    <small id="small2" class="form-text text-muted">Please enter the description of your album.</small>
</div>
<div class="form-group">
    <input type="file" class="form-control" id="cover_image" name="cover_image" >
    <small id="small3" class="form-text text-muted">Please enter the Photograph for your album.</small>
</div>
    <input type="submit" name="submit" class="btn btn-dark">

</form>
</div>
@endsection