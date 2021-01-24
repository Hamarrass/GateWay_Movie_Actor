@extends('layout.app')
@section('content')

<div class="w3-content" style="max-width:1100px">

    <!-- About Section -->
    <div class="w3-row w3-padding-64" id="about">
        <h2>  les films de cet acteur </h2>
        <ul class="list-group">
        @foreach ($actorsMovie  as $item)
            <li class="list-group-item">{{$item['name']}}</li>
            <li class="list-group-item">{{$item['year']}}</li>
        @endforeach


        </ul>
    </div>

  </div>


@endsection
