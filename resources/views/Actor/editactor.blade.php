@extends('layout.app')
@section('content')

<div class="w3-content" style="max-width:1100px">
    <!-- About Section -->
    <div class="w3-row w3-padding-64"  >
        <form  action="{{route('updateActor',['id'=>$actor['id']])}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col">
                     <span style="center">Update</span>
                 </div>
               <div class="col">
                  <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$actor['name']}}">
               </div>
            <div class="col">
                <input type="submit" class="form-control"  value="submit">
            </div>
            </div>
        </form>
    </div>

</div>

@endsection
