@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blog Post Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">

                    <a href="/lsapp/public/posts/create" class="btn btn-primary">Create Posts</a>
                    <h3>Your blog posts</h3>
                    @if (count($post)>0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($post as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td><a href="/lsapp/public/posts/{{$item->id}}/edit" class="btn btn-default">edit</a></td>
                                <td>
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <h3>No Blog Post</h3>
                        @endif    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
