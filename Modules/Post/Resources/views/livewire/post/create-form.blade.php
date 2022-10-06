<div>
    <form action="{{route('posts.store')}}" method="POST" wire:submit.prevent="create">
        <div class="card-header">
            <h3 class="card-title">Nueva Entrada</h3>
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
                <label for="post-content">Contenido</label>
                <div wire:ignore>
                <textarea class="form-control" id="post-content" wire:model="content" name="content"
                          placeholder="Enter a lorem">
                    {{ old('content') }}
                </textarea>
                </div>
                @error('content')
                <span id="post-content-error" class="error invalid-feedback" style="display: inline;">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div>
                @if($cover)
                    <div class="form-group">
                        <label for="post-preview">Preview</label>
                        <div class="input-group">
                            <div>
                                <img src="{{ $cover->temporaryUrl() }}" alt="" class="img-fluid img-thumbnail">
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="post-cover">Portada</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="post-cover"
                           wire:model="cover"
                           wire:click="inputClear('cover')"
                           name="cover"
                           accept="image/*">
                </div>
                <div wire:loading wire:target="cover">
                    <div>
                        <p>
                            Uploading...
                        </p>
                    </div>
                </div>
                @error('cover')
                <span id="post-cover-error" class="error invalid-feedback" style="display: inline;">
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


<script>
    // This sample still does not showcase all CKEditor 5 features (!)
    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
    CKEDITOR.ClassicEditor.create(document.getElementById("post-content"), {
        minHeight: '300px',
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', '|',
                'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', '|',
                'code', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                {model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6'}
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        // placeholder: 'Welcome to CKEditor 5!',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        /*fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },*/
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            'findAndReplace',
            'ExportPdf',
            'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    })
        .then(editor => {
            editor.model.document.on('change:data', function () {
            @this.set('content', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
    ;
</script>
