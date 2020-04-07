<style>
.card {
    background-image:url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQB-pRIVMTE0QFNvVCmqfs9sBDvFXDWMTpz-Azu3JzW3d3FeBsD&usqp=CAU");
    padding: 20px;
    margin-top: 20px;
    
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
<div class="card">
    <h1>{{$post->title}}</h1>
    <h5 ><a href="/user/{{$user->id}}">By {{$user->name}}</a></h5>
    {{-- <div class="fakeimg" style="height:200px; width:400px;"></div> --}}
    @if($post->cover_images!=null)
    <img src = "/images/{{$post->cover_images}}" class="fakeimg" style="height:200px; width:400px;" alt="try" />
    @endif

  


    <p>{{$post->body}}</p>
  </div>
  <button class="button button1" onclick="history.back(-1)">&larr;Go Back</button>
  {{-- <input type="button" value="Go Back From Whence You Came!" onclick="history.back(-1)" /> --}}
 
  