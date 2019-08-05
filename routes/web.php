<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/add', function () {
    return view('category.add');});
Route::post('category/add','categorycontroller@add')  ;
Route::get('category','categorycontroller@view');
 
Route::get('category/update/{id}','categorycontroller@update');
Route::post('category/update/{id}','categorycontroller@save_update');
Route::delete('category/delete/{id}','categorycontroller@delete');

 Route::resource('posts','postscontroller');