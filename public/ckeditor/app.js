var areas = Array('body_uz', 'body_oz', 'body_ru', 'body_en', 'description_uz', 'description_oz', 'description_ru', 'description_en', 'extra1_uz', 'extra1_oz', 'extra1_ru', 'extra1_en', 'extra2_uz', 'extra2_oz', 'extra2_ru', 'extra2_en');

$.each(areas, function (i, area) {
    CKEDITOR.replace(area, {
        // contentsCss: ['https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'],
        allowedContent: true,
        // filebrowserBrowseUrl: '/backend/elfinder/manager?filter=all',
        // filebrowserBrowseUrl = '/elfinder/ckeditor',

        // filebrowserImageBrowseUrl: '/backend/elfinder/manager?filter=image',
        // filebrowserVideoBrowseUrl: '/backend/elfinder/manager?filter=video',
        //filebrowserUploadUrl : '/storage/web/source/1/',
        customConfig: '/ckeditor/config.js',
        // on: {
        //     instanceReady: loadBootstrap,
        //     mode: loadBootstrap
        // }
    });
});

function loadBootstrap(event) {
    if (event.name == 'mode' && event.editor.mode == 'source')
        return; // Skip loading jQuery and Bootstrap when switching to source mode.

    var jQueryScriptTag = document.createElement('script');
    var bootstrapScriptTag = document.createElement('script');

    // jQueryScriptTag.src = 'https://code.jquery.com/jquery-1.11.3.min.js';
    // bootstrapScriptTag.src = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js';

    var editorHead = event.editor.document.$.head;

    editorHead.appendChild(jQueryScriptTag);
    jQueryScriptTag.onload = function () {
        editorHead.appendChild(bootstrapScriptTag);
    };
}