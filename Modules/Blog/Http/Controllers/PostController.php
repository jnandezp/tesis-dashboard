<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::orderByDesc('id')->paginate(10)->withQueryString();;
        return view('blog::index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $publish = $request->publish;
        $post = new Post($request->all());
        $post->created_by = $request->user()->id;
        if ($publish!=='on'){
            $post->publication = 'draft';
        }
        $status = $post->save();

        // ALL OK
        if ($status){
            return redirect()->route('posts.show', $post->id)->with('success','se proceso correctamente');
        }

        return redirect()->route('home')->with('error','ocurrio un error al procesar tu peticion');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Post $post)
    {
        return view('blog::show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Post $post)
    {
        return view('blog::edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Post $post)
    {
        $post->fill($request->all());
        $status = $post->save();

        // ALL OK
        if ($status){
            return redirect()->route('posts.show', $post->id)->with('success','se proceso correctamente');
        }

        return redirect()->route('home')->with('error','ocurrio un error al procesar tu peticion');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Post $post)
    {
        $status = $post->delete();

        // ALL OK
        if ($status){
            return redirect()->route('posts.index')->with('success','se proceso correctamente');
        }

        return redirect()->route('home')->with('error','ocurrio un error al procesar tu peticion');

    }
}
