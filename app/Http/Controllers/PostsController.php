<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $id=Auth::id();
             show($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
       // echo Auth::id();
        $input=$request->all();
        $userId=Auth::id();
        $input['userId']=$userId;
        if($file = $request->file('file'))
        {
             $fileNameWithExt = $request->file('file')->getClientOriginalName();
            // get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get extension
            $extension = $request->file('file')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload
           
            $file->move('images',$fileNameToStore);
            $input['cover_images']=$fileNameToStore;
        }
      
        Post::create($input);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user=User::find(Auth::id());
          $followings=$user->following;//->select('id');

         $arr=array();
         foreach($followings as $following){
             $arr[]=$following->id;
         }
         $users=array();
        $posts=Post::all()->whereIn('userId',$arr)->sortByDesc('updated_at');
        //return view('posts.show',compact('follower'));
        foreach($posts as $post)
        {
            $users[]=User::find($post->userId);
        }
          return view('posts.show',compact('posts','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
