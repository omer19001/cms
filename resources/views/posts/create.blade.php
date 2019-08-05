@extends('layouts.app')
@section('content')
 <div class="containers">
<div class="card">

<div class="card-header">{{isset($post) ? 'edit a post':'create a post'}}</div>
<div class="card-body">
 
<form action="{{isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" method='post' enctype='multipart/form-data'>
@csrf
@if(isset($post))
  @method('PUT')
@else
@method('POST')  
@endif
<div class="form-group"><label for="title ">title</label>
<input type="text" id='title' name='title' palceholder='title' class="form-control" value={{ isset($post) ? $post->title:''}}></div>
<div class="form-group"><label for="description"   >description</label>
<textarea name="description" id="" cols="30" rows="10" class="form-control" >{{ isset($post) ? $post->description :''}}</textarea> </div>
<div class="form-group">
<label for="content"  >content</label>
<input id="content" type="hidden" name="content" value={{ isset($post) ? $post->content:''}}>
  <trix-editor input="content"  > {{ isset($post) ? $post->content: ""}}</trix-editor>
 
<div class="form-group"><label for="published_at"  >published at</label>
<input class="date form-control" type="date"     name="published_at" value={{ isset($post) ? $post->published_at:''}} >
 
<div class="form-group"><label for="image"  >image</label>
 
<select name="cat" class="custom-select">
   @foreach($categories as $cat)
   <option value="{{$cat->id}}">{{$cat['name']}}</option>
   @endforeach
</select>

  <label   for="image">Choose file</label>
    <input type="file" name='image' class="form-control" id="image" value={{ isset($post) ? $post->image:''}}>
    
   
</div>
<button type='submit' class="btn btn-success">{{isset($post) ?'update post' :'create post'}}</button>
</form>
</div>
 

</div>


 
 
 </div>


@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix-core.js"  ></script>
@endsection



@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css"     >
@endsection
 
 