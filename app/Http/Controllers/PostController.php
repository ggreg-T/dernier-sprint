<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;

use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::with('category', 'user')->latest()->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StorePostRequest $request)

    public function store(StorePostRequest $request)
    {
        $imageName = $request->file('image')->store('public/post');
        // $imageName = $request->image->store('post');
        Post::create([
            'nom_objet' => $request->nom_objet,
            'description' => $request->description,
            'dco' => $request->dco,
            'image' => $imageName
        ]);

        return redirect()->route('dashboard')->with('success', 'Votre objet à bien été enregistré.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Gate::denies('update-post', $post)) {
            abort(403);
        }

        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Post $post, UpdatePostRequest $postUpdateAction)
    // UpdatePostRequest $request,
    {
        if (Gate::denies('update-post', $post)) {
            abort(403);
        }

        $postUpdateAction->handle($request, $post);

        return redirect()->route('dashboard')->with('success', 'Votre post a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Gate::denies('delete-post', $post)) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Votre post a été supprimé');
    }
}
