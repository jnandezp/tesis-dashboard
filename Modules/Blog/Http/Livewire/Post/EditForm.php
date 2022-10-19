<?php

namespace Modules\Blog\Http\Livewire\Post;

use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
use Modules\Blog\Entities\PostTag;
use Modules\Blog\Entities\Tag;

class EditForm extends Component
{
    use WithFileUploads;

    public $postId;
    public $title;
    public $content;
    public $cover;
    public $newCover;
    public $tag;
    public $tags;
    public $categories;
    public $category;

    protected $rules = [
        'title' => 'required|string|min:10|max:255',
        'category' => 'required|numeric',
        'tag' => 'nullable|array',
        'content' => 'required|string',
        'newCover' => 'nullable|image|max:2048',
    ];

    public function updatedCover()
    {
        $this->validate([
            'newCover' => 'required|image|max:2048', // 2MB max
        ]);
    }

    public function edit()
    {
        // Validamos los campos
        $params = $this->validate($this->rules);
        // Inicializamos el modelo con la informacion de los campos recibidos
        $post = Post::where([
            ['id', '=', $this->postId],
        ])->first();
        $post->title = $this->title;
        $post->content = $this->content;
        $post->category_id = $this->category;

        //Guarmaos la publicacion
        $status = $post->save();
        if ($status) {
            if (!empty($this->tag)) {
                // SAVE TAGS
                foreach ($this->tag as $itemTag) {
                    $exist = Tag::exists($itemTag);
                    if ($exist) {
                        $postTag = PostTag::firstOrNew(['post_id' => $post->id, 'tag_id' => intval($itemTag)]);
                        $postTag->save();
                    }
                }
            }

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

            return redirect()->route('posts.show', $post)->with('success', 'ALL OK SAVE');
        }
    }

    public function createThumbnail($pathThumbnail, $width = null, $height = 200)
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

    public function mount(Post $post)
    {
        $this->categories = Category::pluck('name', 'id');
        $this->tags = Tag::pluck('name', 'id');
        $this->category = $post->category_id;
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->cover = asset('storage/' . $post->cover);
        $this->tag = $this->getTagsOfThisPost($post);
    }

    private function getTagsOfThisPost($post)
    {
        $tags = null;
        if (!empty($post->tags()->exists())) {
            $idTags = $post->tags()->pluck('tag_id');
            if ($idTags->count() > 0) {
                $tags = $idTags->toJson();
            }
        }

        return $tags;
    }

    public function render()
    {
        return view('blog::livewire.post.edit-form');
    }
}
