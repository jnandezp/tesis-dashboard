<div>
    <div>
        <form method="POST" wire:submit.prevent="edit">
            <div class="card-header">
                <h3 class="card-title">Editar Entrada</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">

                @csrf
                <div class="form-group">
                    <label for="post-title">Titulo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="post-title"
                           wire:model="title" name="title" placeholder="Enter a title" value="{{ old('title') }}">
                    @error('title')
                    <span id="post-title-error" class="error invalid-feedback">
                    {{ $message }}
                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="post-category">Categoria</label>
                    <select class="form-control select2 @error('category') is-invalid @enderror" id="post-category" style="width: 100%;"
                            wire:model="category" name="category">
                        <option selected="selected" value="">Selecciona una categoria</option>
                        @foreach($categories as $categoryId => $categoryName)
                            <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span id="post-category-error" class="error invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group" wire:ignore>
                    <label for="post-content">Contenido</label>
                    <div wire:ignore>
                        <textarea class="form-control" id="post-content" wire:ignore wire:model.lazy="content"
                                  name="content" wire:key="editor-{{ now() }}"
                                  placeholder="Enter a lorem">
                            {!! $content !!}
                        </textarea>
                    </div>
                    @error('content')
                    <span id="post-content-error" class="error invalid-feedback" style="display: inline;">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    @if($newCover || $cover)
                        <div class="form-group">
                            <label for="post-preview">Preview</label>
                            <div class="input-group">
                                <div>
                                    <img src="{{ (!empty($newCover)) ? $newCover->temporaryUrl() : $cover }}" alt=""
                                         class="img-fluid img-thumbnail">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="post-newCover">Portada</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="post-newCover"
                               wire:model="newCover"
                               wire:click="inputClear('cover')"
                               name="cover"
                               accept="image/*">
                    </div>
                    <div wire:loading wire:target="newCover">
                        <div>
                            <p>
                                Uploading...
                            </p>
                        </div>
                    </div>
                    @error('newCover')
                    <span id="post-newCover-error" class="error invalid-feedback" style="display: inline;">
                    {{ $message }}
                </span>
                    @enderror
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="publish" name="publish">
                    <label class="form-check-label" for="publish">¿Deseas publicar?</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

</div>

@push('script')
    @include('blog::livewire.post._script_ckeditor_on_content')
@endpush
