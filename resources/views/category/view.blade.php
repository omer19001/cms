@extends('layouts.app')

@section('content')
<div class="contianer">
<div class="row">
 
<div class="col-md-12">
<div class="card">
<div class="card-header  text-center">categories</div>
<div class="card-body">
<ul class="list-group"> 
@foreach($categoriess as $category)
<li class="list-group-item">{{$category->name}} 
<a href="category/update/{{$category->id}}" class="btn btn-primary  btn-sm float-right">update </a> 
<span class="badge badge-light ml-3">{{$category->posts()->count()}}</span>
 <button  onclick="handledelete({{$category->id}})" class="btn btn-danger  btn-sm float-right mx-1">delete </button></li> 
@endforeach
</ul>
<!-- Modal -->
<form action="" method="post" id='formid'>
@csrf 
@method('delete')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div></form>
<div class="col">
<a  class="btn btn-success my-2" href="category/add" role="button">add</a></div>

</div>
</div>

</div>
</div>
</div>
@endsection
@section('scripts')
<script>
function handledelete(id) {
    
   
    var form=document.getElementById('formid')
    form.action='/category/delete/'+id
    console.log('deleting',form)
    $('#exampleModal').modal('show')

}


</script>
@endsection