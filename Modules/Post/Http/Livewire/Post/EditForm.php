<?php

namespace Modules\Post\Http\Livewire\Post;

use Modules\Post\Entities\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class EditForm extends Component
{
    use WithFileUploads;

    public $postId;
    public $title;
    public $content;
    public $cover;
    public $newCover;

    protected $rules = [
        'title' => 'required|string|min:10|max:255',
        'content' => 'required|string',
        'newCover' => 'nullable|image|max:2048',
    ];

    public function updatedCover()
    {
        $this->validate([
            'newCover' => 'required|image|max:2048', // 2MB max
        ]);
    }

    public function edit(){
        // Validamos los campos
        $params = $this->validate($this->rules);
        // Inicializamos el modelo con la informacion de los campos recibidos
        $post = Post::where([
            ['id','=',$this->postId],
        ])->first();
        $post->title = $this->title;
        $post->content = $this->content;

        //Guarmaos la publicacion
        $status = $post->save();
        if($status){
            if (!empty($this->newCover)) {
                // Store the uploaded file in the "posts" directory of the default filesystem disk.
                $pathCover = $this->newCover->store('posts/' . $post->id . '/cover', 'public');

                // generamos una copia del archivo y modificamos su tamaño
                $pathThumbnail = $this->newCover->store('posts/' . $post->id . '/thumbnail', 'public');
                $image = $this->createThumbnail(storage_path('app/public/') . $pathThumbnail, null, Post::THUMBNAIL_SIZE_HEIGHT);

                // Update
                $post->update([
                    'cover' => $pathCover,
                    'thumbnail' => $pathThumbnail,
                ]);
            }

            return redirect()->route('posts.show', $post)->with('success','ALL OK SAVE');
        }
    }

    public function createThumbnail($pathThumbnail, $width=null, $height=200)
    {
        $img = Image::make($pathThumbnail)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        return $img->save($pathThumbnail);
    }

    public function inputClear($inputId)
    {
        $this->$inputId = "";
    }

    public function mount(Post $post){
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->cover = asset('storage/'.$post->cover);
    }

    public function render()
    {
        return view('post::livewire.post.edit-form');
    }
}
