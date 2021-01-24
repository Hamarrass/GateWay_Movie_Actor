@extends('layout.app')

@section('css')

<link href="{{url('assets/vendor/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet">
@endsection

@section('content')

<h1 class="h3 mb-2 text-gray-800">Lists des Films</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-flex bd-highlight">
            <div class="p-2 w-100 bd-highlight">
                <h6 class="m-0 font-weight-bold text-primary">Films</h6>
            </div>
            <div class=" flex-shrink-1 bd-highlight">
                <a href="#" class="btn btn-primary btn-icon-split"  role="button" data-toggle="modal" data-target="#modal-ajouter">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Ajouter</span>
                </a>
            </div>
          </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 10%;">Id</th>
                        <th style="width: 20%;">Libelle</th>
                        <th style="width: 20%;">Année</th>
                        <th style="width: 25%;">Acteur</th>
                        <th style="width: 20%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allMovies as $movie)
                        <tr>
                            <th style="width: 10%;">{{$movie['id']}}</th>
                            <th style="width: 20%;">{{$movie['name']}}</th>
                            <th style="width: 20%;">{{$movie['year']}}</th>
                            <th style="width: 25%;">
                                @php
                                   $dec = json_decode(unserialize($movie['actors']) );

                               for($idx = 0; $idx < count($dec); $idx++){
                                    $obj = (Array)$dec[$idx];
                                    echo $obj["name"].",";
                                }
                                @endphp
                            </th>
                            <th style="width: 25%;">
                                <div class="d-flex justify-content-center">
                                    <form id="form-delete-{{$movie['id']}}" action="{{route('deleteMovie',['id'=>$movie['id']])}}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="javascript:void(0)" onclick="$('#form-delete-{{$movie['id']}}').submit()"  class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </form>
                                    <a data-id="{{$movie['id']}}" data-libelle="{{$movie['name']}}" data-annee="{{$movie['year']}}" data-acteur="{{unserialize($movie['actors'])}}" onclick="afficherInformation(this)" href="#"  class=" btn btn-warning btn-circle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('movieDetails',['id'=>$movie['id']])}}" class=" btn btn-primary btn-circle">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Modifier Film</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-modifier" method="post">
            <div class="modal-body">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="edit-libelle">Libelle</label>
                    <input type="text" class="form-control" id="edit-libelle" name="name" placeholder="Enter Libelle">
                </div>
                <div class="form-group">
                    <label for="annee-libelle">année</label>
                    <input type="text" class="form-control" id="edit-annee" name="year" placeholder="Enter Année">
                </div>
                <div class="form-group">
                    <label for="acteur-libelle">Acteur</label>
                    <select name="actors[]" id="edit-acteur"   multiple="" data-style="btn-light" class="selectpicker form-control" data-actions-box="true">
                        @foreach ($allActors as $allActor)
                            <option value="{{$allActor['id']}}">{{$allActor['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="modal-ajouter" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Ajouter Film</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('addMovie')}}" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="libelle">Nom</label>
                    <input type="text" class="form-control" id="libelle" name="name" placeholder="Enter Libelle">
                </div>
                <div class="form-group">
                    <label for="libelle">année</label>
                    <input type="text" class="form-control" id="annee" name="year" placeholder="Enter Année">
                </div>
                <div class="form-group">
                    <label for="libelle">Acteur</label>
                    <select name="actors[]" id="acteur"   multiple="" data-style="btn-light" class="selectpicker form-control" data-actions-box="true">
                        @foreach ($allActors as $allActor)
                            <option value="{{$allActor['id']}}">{{$allActor['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
      </div>
    </div>
</div>

@endsection




@section('js')

<script src="{{url('assets/vendor/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script>

    function afficherInformation(e)
    {
        let id      = $(e).attr("data-id");
        let libelle = $(e).attr("data-libelle");
        let annee   = $(e).attr("data-annee");
        var acteurs = $(e).attr("data-acteur");

        $("#edit-libelle").val(libelle);
        $("#edit-annee").val(annee);
        var acteurs = JSON.parse(acteurs);
        var valueActeur=[];
        acteurs.forEach(function(item){
          valueActeur =valueActeur.concat(item.id);
        });

        $('#edit-acteur').selectpicker('deselectAll');
        $("#edit-acteur").selectpicker('val',valueActeur);
        $('#edit-acteur').selectpicker('refresh');
        let url="{{route('updateMovie',['id'=>':id'])}}";
        url = url.replace(":id",id);
        $("#form-modifier").attr("action",url);
        $("#modal-edit").modal("show");
    }
</script>
@endsection
