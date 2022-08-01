<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $id_category = Category::query()
            ->where('id', '=', $request->category)
            ->get();
        $id_category = $id_category[0]->id;

        $imageName = $request->image->store('post');
       
;        // $imageName = $request->file('image')->store('public/post');
        
        Post::create([
            'nom_objet' => $request->nom_objet,
            'description' => $request->description,
            'dco' => $request->dco,
            'image' => $imageName,
            'user_id' => Auth::user()->id,
            'category_id' => $id_category

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
        $categories = Category::all();

        return view('post.edit', [
            'categories' => $categories, 
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request,  $id_post, UpdatePostRequest $postUpdateAction)
    // // UpdatePostRequest $request,
    // {
    //     // if (Gate::denies('update-post', $post)) {
    //     //     abort(403);
    //     // }

    //     $postUpdateAction->handle($request, $id_post);

    //     return redirect()->route('dashboard')->with('success', 'Votre post a été modifié');
    // }

    public function update(Request $request,  $id_post)
    {
        // dd($request->image);
        $id_category = Category::query()
            ->where('id', '=', $request->category)
            ->get();
        $id_category = $id_category[0]->id;

        // $imageName = $request->image->store('post');

        try {
            $post = Post::find($id_post);
            $post->nom_objet = $request->nom_objet;
            $post->description = $request->description;
            // $post->image = $imageName;
            $post->category_id = $id_category;
            $post->save();
        } catch (Exception $error) {
            return redirect()->route('dashboard')->with('error', 'Problème d\'update!');
        }
        return redirect()->route('dashboard')->with('success', 'Votre post a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id_post)
    {
        // if (Gate::denies('delete-post', $post)) {
        //     abort(403);
        // }

        try {
            DB::table('posts')
                ->where('id', '=', $id_post)
                ->delete();
            return redirect()->back()
                ->with('success', 'Post a été supprimé avec succès!');

        } catch(Exception $error) {
            return redirect()->back()
                ->with('error', 'problème de suppression du post!');
        }
        

        // return redirect()->route('dashboard')->with('success', 'Votre post a été supprimé');
    }
}
