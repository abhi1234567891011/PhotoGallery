@extends('layouts.app')

@section('content')

<h3>Albums</h3>

@if(count($albums) > 0)

<?php
    $colcount = count($albums);
    $i = 1; 
?>

        <div class="container" id="albums">
            <div class="row text-center">
                @foreach($albums as $album)
                    @if($i == $colcount)
                        <div class="medium-4 columns end mr-4">
                            <a href="/albums/{{$album->id}}">
                                <img class="img-fluid" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">                        
                            </a>
                            <br>
                            
                            <h4>{{$album->name}}</h4>
                    @else
                        <div class="medium-4 columns mr-4">
                             <a href="/albums/{{$album->id}}">
                             <img class="img-fluid" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                             </a>  
                            <h4>{{$album->name}}</h4>

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