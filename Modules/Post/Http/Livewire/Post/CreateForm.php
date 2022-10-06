<?php

namespace Modules\Post\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class CreateForm extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $cover;

    protected $rules = [
        'title' => 'required|string|min:10|max:255',
        'content' => 'required|string',
        'cover' => 'required|image|max:2048',
    ];

    public function updatedCover()
    {
        $this->validate([
            'cover' => 'required|image|max:2048', // 2MB max
        ]);
    }

    public function create(){
        // Validamos los campos
        $params = $this->validate($this->rules);
        // Inicializamos el modelo con la informacion de los campos recibidos
        $post = new Post($params);

        // Asignamos quien esta creandolo
        $post->created_by = auth()->user()->id;

        //Guarmaos la publicacion
        $status = $post->save();
        if($status){
            // Store the uploaded file in the "posts" directory of the default filesystem disk.
            $pathCover = $this->cover->store('posts/'.$post->id.'/cover', 'public');

            // generamos una copia del archivo y modificamos su tamaño
            $pathThumbnail = $this->cover->store('posts/'.$post->id.'/thumbnail', 'public');
            $image = $this->createThumbnail(storage_path('app/public/').$pathThumbnail, null, 200);

            // Update
            $post->update([
                'cover' => $pathCover,
                'thumbnail' => $pathThumbnail,
            ]);

            return redirect()->route('posts.show', $post)->with('message','ALL OK SAVE');
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

    public function render()
    {
        return view('post::livewire.post.create-form');
    }
}