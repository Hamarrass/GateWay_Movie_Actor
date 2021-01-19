@extends('layout.app')
@section('content')

<div class="w3-content" style="max-width:1100px">

    <!-- About Section -->
    <div class="w3-row w3-padding-64" id="about">
        <h2>Details d'un acteur </h2>
        <ul class="list-group">
          <li class="list-group-item">Id  :{{$actor['id']}}</li>
          <li class="list-group-item">Nam :{{$actor['name']}}</li>
        </ul>
    </div>

  </div>


@endsection
