<div>
    <div class="table-responsive blog-tags">
        <table class="table table-hover p-0 m-0 text-nowrap">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Color</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($tags as $tag)
                <tr>
                    <td class="category-name">
                        <a href="{{ route('tags.show', $tag) }}">
                            {{ $tag->name }}
                        </a>
                    </td>
                    <td class="category-description">
                        {{ Str::limit($tag->description, 50) }}
                    </td>
                    <td class="category-color">
                        {{ $tag->color }}
                    </td>
                    <td class="category-color">
                        {{ $tag->created_at }}
                    </td>
                    <td class="blog-actions">
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('tags.show', $tag) }}">
                            Ver
                        </a>
                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('tags.edit', $tag) }}">
                            Editar
                        </a>
                        @if($tag->trashed())
                            <button class="btn btn-sm btn-success">
                                <i class="fas fa-trash-restore"></i>
                            </button>
                        @else
                            <button class="btn btn-sm btn-danger"
                                    wire:click="$emit('showModalDeleteTag', {{ $tag->id }})"
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
        {{ $tags->links() }}
    </div>
    <div class="float-right p-0 mt-3 mx-3">
        <a class="btn btn-outline-success" href="{{route('tags.create')}}">
            {{ __('Nueva Entrada') }}
        </a>
    </div>
</div>

@push('script')
    @include('blog::livewire.tag._script_livewire_delete_tag')
@endpush
