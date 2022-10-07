<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Image;
use Modules\Post\Entities\Post;

class PostController extends Controller
{

    public function imageUpload(Request $request){
        $image = $request->file('upload');
        if (!empty($image)) {
            /*$post = Post::find(2);
            $image = $post->addMediaFromRequest('upload')->toMediaCollection('images');*/

            $pathImage = Storage::disk('public')->putFile('posts/images', $image);
            // $urlImage = asset('storage/'.$pathImage);

            $pathThumbnail = Storage::disk('public')->putFile('posts/images/thumbnails', $image);
            $urlThumbnail = asset('storage/'.$pathThumbnail);

            $image = $this->createThumbnail(storage_path('app/public/').$pathThumbnail, null, Post::THUMBNAIL_SIZE_HEIGHT);

            return response()->json([
                'url' => $urlThumbnail
            ]);
        }
    }

    public function createThumbnail($pathThumbnail, $width=null, $height=200)
    {
        $img = Image::make($pathThumbnail)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        return $img->save($pathThumbnail);
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('post::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('post::create');
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
        return view('post::show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Post $post)
    {
        return view('post::edit', compact('post'));
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
