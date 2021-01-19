@extends('layout.app')
@section('content')

<div class="w3-content" style="max-width:1100px">

    <!-- About Section -->
    <div class="w3-row w3-padding-64" id="about">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ajouter un actor</button>
        <h2>List des acteurs </h2>
        <ul class="list-group">
          @foreach ($allActors as $actor)
                 <li class="list-group-item"><a href="{{route('actorDetails',['id'=>$actor['id']])}}">{{$actor['name']}}</a> <a style="color:black " href="{{route('editActor',['id'=>$actor['id']])}}">Edit</a></li>
          @endforeach
        </ul>
    </div>

  </div>
   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter</h4>
        </div>
        <div class="modal-body">
              <form action="{{route('addActor')}}" method="post">
                 <label>Name</label>
                 <input type="text" name="name" >
                 <button type="submit" >Submite</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

@endsection




