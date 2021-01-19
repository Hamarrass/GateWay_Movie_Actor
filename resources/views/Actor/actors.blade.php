@extends('layout.app')
@section('content')

<div class="w3-content" style="max-width:1100px">

    <!-- About Section -->
    <div class="w3-row w3-padding-64" id="about">
        <h2>List des acteurs </h2>
        <ul class="list-group">
          @foreach ($allActors as $actor)
                 <li class="list-group-item"><a href="{{route('actorDetails',['id'=>$actor['id']])}}">{{$actor['name']}}</a></li>
          @endforeach
        </ul>
    </div>

  </div>


@endsection




