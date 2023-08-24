<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Type;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Dalla Classe POST prendo tutti gli elementi e li inserisco in $posts */
        $posts = Post::all();
        /* visualizzo il tutto in index dentro posts dentro admin */
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.posts.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $form_data = $request->all();

        $post = new Post();

        if ($request->hasFile('image')) {

            $path = Storage::put('posts_image', $request->image);

            $form_data['image'] = $path;
        }

        $form_data['slug'] =  $post->generateSlug($form_data['title']);

        $post->fill($form_data);

        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $types = Type::all();
        /* rimanda al file edit.blade.php */
        return view('admin.posts.edit', compact('post', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $form_data = $request->all();

        if ($request->hasFile('image')) {
            Storage::delete($post->image);
        }

        if ($request->hasFile('image')) {

            $path = Storage::put('posts_image', $request->image);

            $form_data['image'] = $path;
        }

        $form_data['slug'] =  $post->generateSlug($form_data['title']);

        $post->update($form_data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /* elimino il post */
        $post->delete();
        /* effettuo il rediresct alla pagina index */
        return redirect()->route('admin.posts.index');
    }
}
