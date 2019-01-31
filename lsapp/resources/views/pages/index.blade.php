
   @extends('layouts.app')

   @section('content')
   
   <h1>{{$title}}</h1>
   <h1> This is the Index Page</h1>

   <div class="jumbotron">
         <div class="container">
           <h1 class="display-3">Hello, world!</h1>
           <p><a class="btn btn-primary btn-lg" href="/lsapp/public/register" role="button">Register</a> <a class="btn btn-primary btn-lg" href="/lsapp/public/login" role="button">Login</a></p>
         </div>
       </div>

   @endsection
   

   
