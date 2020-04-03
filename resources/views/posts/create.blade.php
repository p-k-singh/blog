@extends('layouts.blog')



@section('content')
    {!! Form::open(['method'=>'POST','action'=>'PostsController@store','files'=>true]) !!}



    <div class="form-group">
        {!! Form::file('file',['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body','Body') !!}
        {!! Form::text('body',null,['class'=>'form-control']) !!}
    </div>
    {!! Form::submit('createPost') !!}

    {{csrf_field()}}


    {!! Form::close() !!}


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


