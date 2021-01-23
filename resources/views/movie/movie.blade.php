@extends('layout.app')
@section('content')

<div class="w3-content" style="max-width:1100px">

    <!-- About Section -->
    <div class="w3-row w3-padding-64" id="about">
        <h2>Details d'un Movie </h2>
        <ul class="list-group">
          <li class="list-group-item">Id  :{{$movie['id']}}</li>
          <li class="list-group-item">Nam :{{$movie['name']}}</li>
        </ul>

        <h2>Les acteurs </h2>
        <ul class="list-group">
            @foreach(unserialize($movie['actors']) as $actors)
             <li class="list-group-item">{{$actors}};</li>
            @endforeach
         </ul>
    </div>

  </div>


@endsection
