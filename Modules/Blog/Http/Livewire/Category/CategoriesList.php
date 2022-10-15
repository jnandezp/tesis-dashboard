<?php

namespace Modules\Blog\Http\Livewire\Category;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Blog\Entities\Category;

class CategoriesList extends Component
{

    use WithPagination;

    /**
     * @var string
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * @var string[]
     */
    protected $listeners = ['deleteCategory'];

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $categories = Category::orderByDesc('id')->paginate(10)->withQueryString();

        return view('blog::livewire.category.categories-list', ['categories' => $categories]);
    }

    /**
     * Delete category
     * @param Category $category
     * @return void
     */
    public function deleteCategory(Category $category)
    {
        $category->delete();

        // Emitir evento success
        $this->emit('showDeleteSuccess', 'success');
    }
}
