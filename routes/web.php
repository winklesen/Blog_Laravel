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
    $blog = App\Blog::orderBy('id','DESC')->paginate(6);        
    return view('home',['blog' => $blog]);
});

Auth::routes();

Route::get('/home', 'BlogController@index')->name('home');

Route::resource('/admin','BlogController');

Route::get('/show/{id}','BlogController@show')->name('details');

Route::get('/delete/{id}','BlogController@delete')->name('delete');

Route::get('/edit/{id}','BlogController@edit')->name('edit');

Route::post('/update{id}','BlogController@update')->name('update');

Route::get('/showcategory/{category}','BlogController@showCategory')->name('category');

Route::resource('/komen','CommentsController');
