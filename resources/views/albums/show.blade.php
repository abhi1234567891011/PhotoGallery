@extends('layouts.app')


@section('content')
    <h1>{{$album->name}}</h1>
    <a href="/albums" class="btn btn-secondary">Go Back</a>
    <a href="/photos/create/{{$album->id}}" class="btn btn-primary">Upload Photo To Album</a>
    <hr>


<h3>Albums</h3>

@if(count($album->photos) > 0)

<?php
    $colcount = count($album->photos);
    $i = 1; 
    // dd($i);
?>

        <div class="container" id="photos">
            <div class="row text-center">
                @foreach($album->photos as $photo)
                    @if($i == $colcount)
                        <div class="medium-4 columns end mr-4">
                            <a href="/photos/{{$photo->id}}">
                                <!-- <img class="img-fluid" src="/storage/photos".    {{$photo->album_id}}.    "/{{$photo->photo}}" alt="{{$photo->title}}">                         -->
                                <img class="img-fluid" src="/storage/photos/{{$photo->photo}}" alt="{{$photo->title}}">                        
                            </a>
                            <br>
                            

                            <h4>{{$photo->title}}</h4>
                    @else
                        <div class="medium-4 columns mr-4">
                             <a href="/photos/{{$photo->id}}">
                             <img class="img-fluid" src="/storage/photos/{{$photo->photo}}" alt="{{$photo->title}}">
                             </a>  
                            <h4>{{$photo->title}}</h4>

                    @endif

                    @if($i % 3 == 0)
                     </div></div>
                     <div class="row text-center">
                
                    @else
                    </div>
                    @endif
                    <?php $i++ ?>
                @endforeach
            </div>
        </div>
        @else
        <p>No albums to display</p>
        @endif

@endsection