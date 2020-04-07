<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Post;
class UsersController extends Controller
{
    public function index()
    {
        $id=Auth::id();
        $user=User::find($id);
    $posts=Post::all()->where('userId',$id)->sortByDesc('updated_at');
    return view('users/profile',compact('user','posts'));
      
    }
    public function upload()
    {
        return view('users/uploadprofileimage');
    }

    public function store(CreatePostRequest $request)
    {
       //echo Auth::id();
        $input=$request->all();
        // $userId=Auth::id();
        // $input['userId']=$userId;
         if($file = $request->file('file'))
        {
             $fileNameWithExt = $request->file('file')->getClientOriginalName();
        //     // get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //     // get extension
            $extension = $request->file('file')->getClientOriginalExtension();

         $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //     // upload
           
             $file->move('images',$fileNameToStore);
        //     $input['cover_images']=$fileNameToStore;
             $user=User::find(Auth::id());
             $user->cover_images=$fileNameToStore;
             $user->save();
         }
         return redirect()->action('UsersController@index');
        // Post::create($input);

    }
    public function show()
    {
       //return view('users/uploadprofileimage');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
