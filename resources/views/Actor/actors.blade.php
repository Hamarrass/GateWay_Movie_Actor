@extends('layout.app')
@section('content')

<div class="w3-content" style="max-width:1100px">

    <!-- About Section -->
    <div class="w3-row w3-padding-64" id="about">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ajouter un actor</button>
        <h2>List des acteurs </h2>

        <div style="margin-left: 20%;margin-right: 20%; ">
            <table class="table">
                @foreach ($allActors as $actor)
                        <tr>
                            <td style="width: 75%"> <a href="{{route('actorDetails',['id'=>$actor['id']])}}">{{$actor['name']}}</a></td>
                            <td><a href="{{route('editActor',['id'=>$actor['id']])}}"> <span style="color: black"> Edit </span></a></td>
                            <td>
                                <form action="{{route('deleteActor',['id'=>$actor['id']])}}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" value="delete">
                                </form>
                            </td>
                        </tr>

                @endforeach
            </table>
        </div>

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




