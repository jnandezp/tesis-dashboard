<?php

namespace Modules\Blog\Http\Livewire\Category;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Blog\Entities\Category;

class CreateForm extends Component
{
    public Category $category;

    protected $rules = [
        'category.name' => 'required|string|min:3|max:255',
        'category.description' => 'required|string',
        'category.color' => 'nullable|string|max:10',
    ];

    public function create()
    {
        // Validamos los campos
        $params = $this->validate();

        //Guarmaos la publicacion
        $status = $this->category->save();

        if ($status) {
            return redirect()->route('categories.show', $this->category)->with('success', 'ALL OK SAVE');
        }
    }

    public function mount()
    {
        $this->category = new Category();
    }

    public function render()
    {
        return view('blog::livewire.category.create-form');
    }
}
