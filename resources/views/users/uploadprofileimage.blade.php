<style>
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
  
  @extends('layouts.blog')
  
  
  
  @section('content')
      {!! Form::open(['method'=>'POST','action'=>'UsersController@store','files'=>true]) !!}
  
      <div class="form-group">
          {!! Form::file('file',['class'=>'form-control']) !!}
      </div>
  
  
      
      {!! Form::submit('createPost') !!}
  
      {{csrf_field()}}
  
  
      {!! Form::close() !!}
  
      <button class="button button1" onclick="history.back(-1)">&larr;Go Back</button>
      @if(count($errors)>0)
  
          <div class="alert alert-danger">
              <ul>
                  @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                  @endforeach
  
              </ul>
  
          </div>
  
      @endif
  
  
  
  
  
  
  
  @endsection
  
  
  