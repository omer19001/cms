@extends('layouts.app')

@section('content')
<div class="row">
 
 
<div class="col-md-12">
<div class="container">
<div class="card">
<div class="card-header"> new category </div>
<div class="card-body">
<form action='/category/add' method='post'>
@csrf

<div class="form-group">
<label for='name' >category name  </label>
<input id='name' name='name' placeholder='category name' name='name' class='form-control'>
 
<button type='submit' class="btn btn-primary my-2">save</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

</div>
 
@endsection
