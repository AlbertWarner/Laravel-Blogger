@extends('layouts.app')
@section('content')
<a href="/lsapp/public/posts/" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    @if (!Auth::guest()) {{-- doesnt allow user to see the buttons if not logged in --}}
        @if (!Auth::user()->id == $post->user_id)
 
        <a href="/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-edit">Edit</a> 
        
        {!!Form::open(['action'=>['PostController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}
        @endif    
    @endif
    
@endsection