<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // connection to post model page 
use DB; //use the DB Queries

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return Post::all(); //fetch all from the db and this will display all the data in array in html
        //$post = Post::all();
        //$post = Post::orderBy('title','desc')->get(); //eloquent -> db queries shortcut 
        // Post::where('title','Post Two')->get();
        //$post = DB::select('SELECT * FROM posts'); // normal db queries but eloquent is better
        $post = Post::orderBy('title','created_at')->paginate(1);
        return view('posts.index')->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        /* return Post::find($id); */ //returns array
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
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
        $post = Post::find($id);

        //check for correct user
        if(auth()->user()->id !==$post->user_id)
        {
            return redirect('/posts')->with('error','Unauthorised Page');   
        }
        return view('posts.edit')->with('post',$post);

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
        $this->validate($request,
        [ 'title' => 'required',
          /* 'boby' => 'required' */]);

        //Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts')->with('success','Post Updated');
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
        if(auth()->user()->id !==$post->user_id)
        {
            return redirect('/posts')->with('error','Unauthorised Page');   
        }
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success','Post Removed');
    }
}
