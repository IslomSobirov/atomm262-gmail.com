<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedReq = $request->validate([
            'name' => 'required',
            'about' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'contact' => '',
            'reference' => ''
        ]);

        Post::create($validatedReq);

        return redirect()
                ->action('HomeController@index')
                ->with(['msg' => 'Post has been created successfuly']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('/post/show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('/post/edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedReq = $request->validate([
            'name' => 'required',
            'about' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'contact' => '',
            'reference' => ''
        ]);
        $post->update($validatedReq);
        return redirect()
                ->action('HomeController@index')
                ->with(['msg' => 'Project has been updated successfuly']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        
        if(\Auth::user()->id == $post->user_id)
        {
            $post->delete();
            return redirect()
                    ->back()
                    ->with(['msg' => 'Project has been deleted successfuly']);
        }

        return redirect()
                ->back()
                ->with(['msg' => 'Project can only be deleted by author']);
    }


    public function search(Request $request)
    {
        $request->validate([
            'search' => 'min:1'
        ]);
        $search = $request->search;

        $posts = \DB::table('posts')
                ->where('name', 'like', '%'. $search .'%')
                ->get();
        
        return view('/home', ['posts' => $posts]);
    }
}
