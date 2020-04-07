{{-- 
@foreach ($posts as $follo)
    {{$follo}}
    @if($follo->cover_images!=null)
    <img src = "/images/{{$follo->cover_images}}" height="100px" width="100px" alt="try" />
@endif
@endforeach
 --}}
 <!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}
img {
  /* border-radius: 50%; */
}
#more  {display:  none;}
body {
  font-family: "Lato", sans-serif;
  font-family: Arial;
  padding: 30px;
  background: black;
}

/* Header/Blog Title */
.header {
  padding: 10px;
  text-align: center;
  background-image:url("https://images.all-free-download.com/images/graphicthumb/nostalgic_blue_background_03_hd_picture_169784.jpg");
}

.header h1 {
  font-size: 50px;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: rgb(90, 123, 136);
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(14, 13, 13);
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 30px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Fake image */
.fakeimg {
  /* background-image: url("https://images.all-free-download.com/images/graphicthumb/sad_child_at_a_stone_wall_205292.jpg"); */
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-image:url("https://images.all-free-download.com/images/graphicthumb/rippled_wall_background_01_hd_pictures_169887.jpg");
 
  padding: 20px;
  margin-top: 20px;
}

.footer {
  padding: 20px;
  text-align: center;
  background-image:url("https://images.all-free-download.com/images/graphicthumb/nostalgic_blue_background_03_hd_picture_169784.jpg");
  
  margin-top: 10px;
}
.avatar {
  vertical-align: middle;
  width: 100px;
  height: 100px;
  border-radius: 50%;
}

</style>
</head>
<body>


    <div class="header">
   <h1>!!Easy Blogs!!</h1>
   <p style="text-align:right;">An initiative by ju students</p>
  </div>

  <div class="topnav">
  
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="card">
        <img src="https://wallpaperboat.com/wp-content/uploads/2019/06/cool-deadpool-14.jpg" class="avatar"  alt="Avatar" style="width:200px ">
      </div>
      <a href="/user">Profile</a>
      <a href="#">Messages</a>
      <a href="#">Requests</a>
      <a href="#">Notifications</a>
      <a href="#">Settings</a>
      <a href="#">Donate us</a>
      {{-- <a href="#">About us</a> --}}
      <a href="/logout">Logout</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
    <span  > <a href="posts/create">Write Something</a> </span>
    <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }


    function readMore() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}






    </script>
    
    <a href="#" style="float:right">Services</a>
  </div>

  <div class="row">
   
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

        <p>
            {{-- {{ str_limit($follo->body, 100, '') }} --}}
            {{ \Illuminate\Support\Str::limit($post->body, 100, '...') }}
            {{-- @if (strlen($follo->body) > 100) --}}
                <span id="dots">...</span>
                <span id="more">{{ substr($post->body, 100) }}</span>
            {{-- @endif --}}
        </p>
        
        <button onclick="readMore()" id="myBtn">Read more</button>


        {{-- <p>{{$follo->body}}</p> --}}
      </div>
     
      @endforeach
  
      </div>


<div class="footer">
    <h2>You are all caught up!</h2>
  </div>
     
  </body>
  </html> 
  
