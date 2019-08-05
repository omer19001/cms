<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\posts;
use App\category;
use Illuminate\Support\Facades\Storage;
class postscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('posts.index')->with('posts',posts::all() );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create')->with('categories',category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        //
        
      
            
             if(isset($request->image)){

                $name=$request->image->store('posts');
             }
             else{
                $name=null;
             }
             
           

        $post=new posts();
        $post->title=request('title');
        $post->description=request('description');
        $post->content=request('content');
        $post->category_id=request('cat');
        $post->published_at=request('published_at');
       $post->image=$name;

        $post->save();
      
        session::flash('success','post created successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(posts $post)
    {
        //

        return  view('posts.create')->with('post',$post)->with('categories',category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, posts $post)
    {
        //
          
        if(isset($request->image)){

            $name=$request->image->store('posts');
            storage::delete($request->image);
         }
         else{
            $name=null;
         }
         $post->title=$request->title;
         $post->description=$request->description;
         $post->content=$request->content;
         $post->published_at=$request->published_at;
         $post->category_id=$request->cat;
         $post->image=$name;
         $post->save();
         session::flash('success','post updated successfully');
        return redirect(route('posts.index'));

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(posts $post)
    {
        //
$post->delete();

session::flash('success',"post deleted successfully");

return redirect(route('posts.index'));
    }
}
