<style>
    .card {
  background-image:url("https://images.all-free-download.com/images/graphicthumb/rippled_wall_background_01_hd_pictures_169887.jpg");
 
  padding: 20px;
  margin-top: 20px;
}

.fakeimg {
  /* background-image: url("https://images.all-free-download.com/images/graphicthumb/sad_child_at_a_stone_wall_205292.jpg"); */
  width: 100%;
  padding: 20px;
}


.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}




</style>


<div>
    
    

    @if($user->cover_images!=null)
    <img src = "/images/{{$user->cover_images}}" class="fakeimg" style="height:200px; width:200px; border-radius:50%;" alt="try" />
@else

<a href="user/uploadimage"><img src = "/images/upload.png" class="fakeimg" style="height:200px; width:200px; border-radius:50%;" alt="try" /></a>
@endif

</div>
<div>
     @if($posts->count()==0)
     <h1>NO POSTS </h1>
     @else


     @foreach($posts as $post)
    
   
    

     <div class="card">
       <h1><a href="post/{{$post->id}}/show">{{$post->title}}</a></h1>
       {{-- {{$post->userId}}
       $user=App\User::find($post->userId); --}}
       {{-- <h5 >By {{$user->name}}</h5> --}}
     
       {{-- <div class="fakeimg" style="height:200px; width:400px;"></div> --}}
       @if($post->cover_images!=null)
       <img src = "/images/{{$post->cover_images}}" class="fakeimg" style="height:200px; width:400px;" alt="try" />
       @endif


       <p>{{$post->body}}</p>
     </div>
    
     @endforeach

     @endif

     <button class="button button1" onclick="history.back(-1)">&larr;Go Back</button>
</div>







