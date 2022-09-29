@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Blank Page</li>
@endsection

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <h1>Classic editor</h1>
            <div id="editor">
                <p>This is some sample content.</p>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>


    <!-- /.card -->

    <p>
        <img src="https://miro.medium.com/max/875/1*lqR-AVU5L_i9qu4lnfls-w.jpeg">
    </p>
    <div class="hz ia ib ic id" style="box-sizing:inherit;overflow-wrap:break-word;word-break:break-word;">
        <p class="pw-post-body-paragraph jo jp ig jq b jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl hz gh" style="box-sizing:inherit;color:rgb(41, 41, 41);font-family:source-serif-pro, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif;font-size:20px;font-style:normal;font-weight:400;letter-spacing:-0.003em;line-height:32px;margin:2em 0px -0.46em;text-align:justify;word-break:break-word;" id="8e08" data-selectable-paragraph="">
            Seguramente en algún punto dentro del desarrollo de nuestra base de datos hemos atravesado por alguna de estas fases: <em class="km" style="box-sizing:inherit;"><i>Análisis de requerimientos</i></em> donde definimos las reglas de negocio, <em class="km" style="box-sizing:inherit;"><i>Diseño de la Solución</i></em> donde modelamos la información (Modelo Conceptual) y la representamos de forma gráfica, y la <em class="km" style="box-sizing:inherit;"><i>Implementación</i></em> (Modelo Físico) donde básicamente llevamos a la realidad la manera en que se almacenará nuestra información, es decir, donde creamos la base de datos, las tablas, las columnas, generamos los índices, establecemos las restricciones, etc.
        </p>
        <p class="pw-post-body-paragraph jo jp ig jq b jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl hz gh" style="box-sizing:inherit;color:rgb(41, 41, 41);font-family:source-serif-pro, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif;font-size:20px;font-style:normal;font-weight:400;letter-spacing:-0.003em;line-height:32px;margin:2em 0px -0.46em;text-align:justify;word-break:break-word;" id="44c0" data-selectable-paragraph="">
            Es en esta fase de <em class="km" style="box-sizing:inherit;"><i>implementación</i></em> donde por lo regular hacemos uso de un gestor de base de datos como Mysql, Oracle, PostgreSQL, SQL Server, Mongodb, etc, para llevar a cabo las tareas previamente mencionadas, y es en esta fase donde haremos mayor énfasis.
        </p>
        <p class="pw-post-body-paragraph jo jp ig jq b jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl hz gh" style="box-sizing:inherit;color:rgb(41, 41, 41);font-family:source-serif-pro, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif;font-size:20px;font-style:normal;font-weight:400;letter-spacing:-0.003em;line-height:32px;margin:2em 0px -0.46em;text-align:justify;word-break:break-word;" id="50c5" data-selectable-paragraph="">
            Por lo común, las tareas dentro del <em class="km" style="box-sizing:inherit;"><i>Modelo Físico</i></em> se llevan a cabo de forma manual, por ejemplo, directamente a través de un cliente en consola o a través de una interfaz gráfica como Mysql Workbench o DBeaver. Otra manera de lidiar con esta tarea es a través de la codificación de un script que automatice esta tarea por nosotros. En cualquier caso, llegar a ejecutar los cambios de nuestra db de alguna de estas formas puede llegar a ser complicada y/o engorrosa.
        </p>
        <p class="pw-post-body-paragraph jo jp ig jq b jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl hz gh" style="box-sizing:inherit;color:rgb(41, 41, 41);font-family:source-serif-pro, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif;font-size:20px;font-style:normal;font-weight:400;letter-spacing:-0.003em;line-height:32px;margin:2em 0px -0.46em;text-align:justify;word-break:break-word;" id="4cf2" data-selectable-paragraph="">
            Con Laravel, todas estas tareas pueden ser llevadas a cabo de una forma más sencilla y gestionable a través del uso de las <em class="km" style="box-sizing:inherit;"><i><strong class="jq ih" style="box-sizing:inherit;font-family:source-serif-pro, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif;">migraciones</strong></i></em>.
        </p>
        <p class="pw-post-body-paragraph jo jp ig jq b jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl hz gh" style="box-sizing:inherit;color:rgb(41, 41, 41);font-family:source-serif-pro, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif;font-size:20px;font-style:normal;font-weight:400;letter-spacing:-0.003em;line-height:32px;margin:2em 0px -0.46em;text-align:justify;word-break:break-word;" id="81e0" data-selectable-paragraph="">
            Una <em class="km" style="box-sizing:inherit;"><i><strong class="jq ih" style="box-sizing:inherit;font-family:source-serif-pro, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif;">migración</strong></i></em> nos permite crear y alterar el esquema de nuestras tablas, generar índices, establecer restricciones, etc, sin embargo, también actúa como una especie de control de versiones sobre nuestra base de datos, esto es, si eventualmente necesitamos consultar un cambio anterior o decidimos que la versión inicial o previa era la que se necesita, en lugar de reescribir todo, simplemente lanzando algunos comandos podemos volver hacia atrás en la línea de tiempo de nuestra db.
        </p>
        <p class="pw-post-body-paragraph jo jp ig jq b jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl hz gh" style="box-sizing:inherit;color:rgb(41, 41, 41);font-family:source-serif-pro, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif;font-size:20px;font-style:normal;font-weight:400;letter-spacing:-0.003em;line-height:32px;margin:2em 0px -0.46em;text-align:justify;word-break:break-word;" id="81e0" data-selectable-paragraph="">
            &lt;script src="https://gist.github.com/manigandham/65543a0bc2bf7006a487.js"&gt;&lt;/script&gt;
        </p>
        <div class="raw-html-embed">
            <script src="https://gist.github.com/manigandham/65543a0bc2bf7006a487.js"></script>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // This sample still does not showcase all CKEditor 5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'exportPDF','exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
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
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
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
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
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
                // 'ExportPdf',
                // 'ExportWord',
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
        });
    </script>

@endsection
