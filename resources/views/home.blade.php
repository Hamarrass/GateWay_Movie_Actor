@extends('layout.app')
@section('content')

<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <a href="{{route('actors')}}">Actors</a><br>
    <a href="{{route('movies')}}">Films</a>
  </div>

</div>
@endsection
