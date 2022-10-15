<div>
    <div>
        <form method="POST" wire:submit.prevent="edit">
            <div class="card-header">
                <h3 class="card-title">Editar Categoria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">

                @csrf
                <div class="form-group">
                    <label for="category-name">Nombre</label>
                    <input type="text" class="form-control @error('category.name') is-invalid @enderror" id="category-name"
                           wire:model.lazy="category.name" name="name" placeholder="Enter a name">
                    @error('category.name')
                    <span id="category-name-error" class="error invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category-description">Descripcion</label>
                    <textarea class="form-control @error('category.name') is-invalid @enderror" id="category-description" wire:model.lazy="category.description" name="description"
                              placeholder="Enter a description">
                    </textarea>
                    @error('category.description')
                    <span id="category-description-error" class="error invalid-feedback" style="display: inline;">
                            {{ $message }}
                        </span>
                    @enderror
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

@endpush
