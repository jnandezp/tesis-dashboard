<div>
    <div class="table-responsive blog-posts">
        <table class="table table-hover p-0 m-0 text-nowrap">
            <thead>
            <tr>
                <th>Cover</th>
                <th>Title</th>
                <th>Content</th>
                <th>Writer</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($posts as $post)
                <tr>
                    <td class="blog-cover">
                        <img src="{{ asset('storage/'.$post->thumbnail) }}" class="img-size-64"/>
                    </td>
                    <td class="blog-title">
                        <a href="{{ route('posts.show', $post) }}">
                            {{ $post->title }}
                        </a>
                    </td>
                    <td class="blog-content">
                        {{ Str::limit($post->content, 50) }}
                    </td>
                    <td class="blog-writer->name">
                        {{ $post->user->fullName }}
                    </td>
                    <td class="blog-writer-email">
                        {{ $post->user->email }}
                    </td>
                    <td class="blog-created-at">
                        {{ $post->created_at }}
                    </td>
                    <td class="blog-actions">
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('posts.show', $post) }}">
                            Ver
                        </a>
                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('posts.edit', $post) }}">
                            Editar
                        </a>
                        @if($post->trashed())
                            <button class="btn btn-sm btn-success">
                                <i class="fas fa-trash-restore"></i>
                            </button>
                        @else
                            <button class="btn btn-sm btn-danger"
                                    wire:click="$emit('showModalDeletePost', {{ $post->id }})"
                                {{--wire:click="deletePost({{$post->id}})"--}}
                            >
                                <i class="fas fa-trash"></i>
                            </button>
                        @endif
                    </td>
                </tr>
            @empty
                <div class="p-5">
                    <p class="text-center">
                        Por el momento no cuenta con ninguna entrada.
                    </p>
                </div>
            @endforelse

            </tbody>
        </table>
        <!-- /.table -->
    </div>
    <div class="float-left p-0 mt-3 mx-3">
        {{ $posts->links() }}
    </div>
    <div class="float-right p-0 mt-3 mx-3">
        <a class="btn btn-outline-success" href="{{route('posts.create')}}">
            {{ __('Nueva Entrada') }}
        </a>
    </div>
</div>

@push('script')
    @include('blog::livewire.post._script_livewire_delete_post')
@endpush
