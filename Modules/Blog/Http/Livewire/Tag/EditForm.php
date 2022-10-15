<?php

namespace Modules\Blog\Http\Livewire\Tag;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Blog\Entities\Tag;

class EditForm extends Component
{
    use WithFileUploads;

    public Tag $tag;

    protected $rules = [
        'tag.name' => 'required|string|min:3|max:255',
        'tag.description' => 'required|string',
        'tag.color' => 'nullable|string|max:10',
    ];

    public function edit()
    {
        // Validamos los campos
        $params = $this->validate();

        //Guarmaos la publicacion
        $status = $this->tag->save();

        if ($status) {
            return redirect()->route('tags.index')->with('success', 'ALL OK SAVE');
        }
    }

    public function render()
    {
        return view('blog::livewire.tag.edit-form');
    }
}
