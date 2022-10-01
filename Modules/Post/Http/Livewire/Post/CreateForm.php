<?php

namespace Modules\Post\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class CreateForm extends Component
{
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|string|min:10|max:255',
        'content' => 'required|string',
    ];

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
            return redirect()->route('posts.show', $post)->with('message','ALL OK SAVE');
        }
    }

    public function render()
    {
        return view('post::livewire.post.create-form');
    }
}
