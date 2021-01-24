@extends('layout.app')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Lists des Acteurs</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-flex bd-highlight">
            <div class="p-2 w-100 bd-highlight">
                <h6 class="m-0 font-weight-bold text-primary">Acteur</h6>
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
                        <th style="width: 75%;">Nom</th>
                        <th style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allActors as $actor)
                        <tr>
                            <th style="width: 10%;">{{$actor['id']}}</th>
                            <th style="width: 75%;">{{$actor['name']}}</th>
                            <th style="width: 15%;">
                                <div class="d-flex justify-content-center">
                                    <form id="form-delete-{{$actor['id']}}" action="{{route('deleteActor',['id'=>$actor['id']])}}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="javascript:void(0)" onclick="$('#form-delete-{{$actor['id']}}').submit()"  class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </form>
                                    <a href="{{route('actorDetails',['id'=>$actor['id']])}}" class=" btn btn-primary btn-circle">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a data-id="{{$actor['id']}}" data-libelle="{{$actor['name']}}" onclick="afficherInformation(this)" href="#"  class=" btn btn-warning btn-circle">
                                        <i class="fas fa-edit"></i>
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
          <h5 class="modal-title" >Edit Acteur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-modifier" action="" method="post">

            <input type="hidden" name="_method" value="PUT">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="edit-libelle" name="name" placeholder="Enter acteur">
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
          <h5 class="modal-title" >Ajouter Acteur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  action="{{route('addActor')}}" method="post">
            <div class="modal-body">
                <div class="form-group">

                    <input type="text" class="form-control" id="libelle" name="name" placeholder="Enter acteur">
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
<script>
    function afficherInformation(e)
    {
        let id = $(e).attr("data-id");
        let libelle = $(e).attr("data-libelle");
        $("#edit-libelle").val(libelle);
        let url="{{route('updateActor',['id'=>':id'])}}";
        url = url.replace(":id",id);
        $("#form-modifier").attr("action",url);
        $("#modal-edit").modal("show");
    }
</script>
@endsection



