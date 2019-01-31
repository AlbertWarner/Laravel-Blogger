@extends('layouts.app')
@section('content')
    <h1>Posts</h1>
    @if(count($post)>0)
        @foreach ($post as $posts)
          
        <div class="well">
            <h3><a href="/lsapp/public/posts/{{$posts->id}}"> {{$posts->title}}</a></h3>
            <small>Written on {{$posts->created_at}}</small>

        </div>
        @endforeach
        {{$post->links()}} {{-- paginate link --}}
        
    @else
        <p>No Post Found</p>        
    @endif

    
@endsection