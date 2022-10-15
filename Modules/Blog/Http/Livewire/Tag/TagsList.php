<?php

namespace Modules\Blog\Http\Livewire\Tag;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Blog\Entities\Tag;

class TagsList extends Component
{

    use WithPagination;

    /**
     * @var string
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * @var string[]
     */
    protected $listeners = ['deleteTag'];

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $tags = Tag::orderByDesc('id')->paginate(10)->withQueryString();

        return view('blog::livewire.tag.tags-list', ['tags' => $tags]);
    }

    /**
     * Delete tag
     * @param Tag $tag
     * @return void
     */
    public function deleteTag(Tag $tag)
    {
        $tag->delete();

        // Emitir evento success
        $this->emit('showDeleteSuccess', 'success');
    }
}
