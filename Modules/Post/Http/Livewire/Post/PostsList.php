<?php

namespace Modules\Post\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $posts = Post::orderByDesc('id')->paginate(10)->withQueryString();

        return view('post::livewire.post.posts-list', compact('posts'));
    }
}
