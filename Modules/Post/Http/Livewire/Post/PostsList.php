<?php

namespace Modules\Post\Http\Livewire\Post;

use Modules\Post\Entities\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
    use WithPagination;

    /**
     * @var string
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * @var string[]
     */
    protected $listeners = ['deletePost'];

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $posts = Post::orderByDesc('id')->paginate(10)->withQueryString();

        return view('post::livewire.post.posts-list', ['posts' => $posts]);
    }

    /**
     * Delete post
     * @param Post $post
     * @return void
     */
    public function deletePost(Post $post)
    {
        $post->delete();

        // Emitir evento success
        $this->emit('showDeleteSuccess', 'success');
    }
}
