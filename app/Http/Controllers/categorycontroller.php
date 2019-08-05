<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\category;
class categorycontroller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add()
    { 
        # code...
        $table=new category(); 
        $table->name=request('name');
        $table->save();
        Session::flash('success', 'category added successfully'); 
return redirect('category');

    }
    public function view()
    { $table= category::all();
        # code...
         
        return view('category.view')->with('categoriess',$table);
     
     
    }
    public function update($cat_id)
    {
        # code...
        $table=new category;
        $row=$table->find($cat_id);
        return view('category.update')->with("row",$row);
    }
    public function save_update($cat_id)
    {
        # code...
        $table=new category;
        $row=$table->find($cat_id);
        $row->name=request('name');
        $row->save();
        return redirect('category');
    }
    public function delete($cat_id)
    {
        # code...
        $ro=category::find($cat_id);
        $ro->delete();
        session::flash('success','item deleted successfully ');
       return redirect('category');
    }
}
