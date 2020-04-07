<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Post;
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

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home','PostsController@show' );
Route::resource('/posts','PostsController');
Route::get('/posts/create','PostsController@create')->middleware('auth');
Route::get('/post/{id}/show',function($id){
    $post=App\Post::find($id);
    $user=App\User::find($post->userId);
    //return "efr";
    return view('posts/showOne',compact('post','user'));
})->middleware('auth');



Route::get('/user/uploadimage','UsersController@upload')->middleware('auth');

Route::get('/user/{id}/profile',function($id){
    $user=App\User::find($id);
    $posts=App\Post::all()->where('userId',$id)->sortByDesc('updated_at');
    return view('users/profile',compact('user','posts'));
});
Route::get('/user/{id}',function($id){
    $user=App\User::find($id);
    $posts=App\Post::all()->where('userId',$id)->sortByDesc('updated_at');
    return view('users/profileforothers',compact('user','posts'));
});
Route::post('/delete/{id}',function($id){
    
});
Route::get('/logout','UsersController@logout');
Route::resource('/user','UsersController');
// Route::get('/user/{id}/uploadimage',function($id){
//      if(Auth::id()==$id)
//      {
//            return view('users/uploadprofileimage');
//      }
//      else
//      {
        
//      }
// })->middleware('auth');
