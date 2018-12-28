  <script type="text/javascript" src="{{URL::asset('tinymce/tinymce.min.js')}}"></script>
    <script>tinymce.init({ selector:'.texteditor',
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'template paste textcolor colorpicker textpattern imagetools codesample toc code responsivefilemanager'
            ],
            relative_urls: false,
            remove_script_host : false,
            filemanager_title:"EKCMS Filemanager",
            filemanager_crossdomain: true,
            external_filemanager_path:"{{URL::asset('filemanager')}}/",
            external_plugins: { "filemanager" : "{{URL::asset('filemanager/plugin.min.js')}}"},

            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor code',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ]



        });</script>