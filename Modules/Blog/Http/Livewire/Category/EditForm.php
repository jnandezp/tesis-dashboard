<?php

namespace Modules\Blog\Http\Livewire\Category;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Blog\Entities\Category;

class EditForm extends Component
{
    use WithFileUploads;

    public Category $category;

    protected $rules = [
        'category.name' => 'required|string|min:3|max:255',
        'category.description' => 'required|string',
        'category.color' => 'nullable|string|max:10',
    ];

    public function edit()
    {
        // Validamos los campos
        $params = $this->validate();

        //Guarmaos la publicacion
        $status = $this->category->save();

        if ($status) {
            return redirect()->route('categories.index')->with('success', 'ALL OK SAVE');
        }
    }

    public function render()
    {
        return view('blog::livewire.category.edit-form');
    }
}
