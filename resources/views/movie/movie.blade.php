@extends('layout.app')
@section('content')

<div class="w3-content" style="max-width:1100px">

    <!-- About Section -->
    <div class="w3-row w3-padding-64" id="about">
        <h2>Details d'un Movie </h2>
        <ul class="list-group">
          <li class="list-group-item">Id  :{{$movie['id']}}</li>
          <li class="list-group-item">Nom :{{$movie['name']}}</li>
        </ul>

        <h2>Les acteurs </h2>
        <ul class="list-group">
            @php
            $dec = json_decode(unserialize($movie['actors']) );

            for($idx = 0; $idx < count($dec); $idx++){
                $obj = (Array)$dec[$idx];
                echo $obj["name"].",";
            }
         @endphp
         </ul>


    </div>

  </div>


@endsection
