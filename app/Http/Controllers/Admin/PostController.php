<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Functions\Helper;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request)
    {

        // Le validazioni vengono eseguite automaticamente nel PostsRequest.

        // Creazione del post solo se la validazione ha successo.
        $post = new Post();
        $post->name = auth()->user()->name;
        $post->title = $request->title;
        $post->slug = Helper::generateSlug($request->title, Post::class);
        $post->topic = $request->topic;
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;
        $post->number_of_posts = $request->number_of_posts;
        $post->collaborators = $request->collaborators;
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post eliminato correttamente');
    }
}
