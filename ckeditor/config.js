CKEDITOR.editorConfig = function( config )
{
    config.enterMode = CKEDITOR.ENTER_BR;
    config.font_defaultLabel = 'Arial';
    config.fontSize_defaultLabel = '12px';
    //config.extraPlugins = 'base64image';  
	

    config.toolbar =
    [
    {name: 'clipboard', items: ['Copy', 'Paste', 'Cut', 'PasteText', 'PasteFromWord', 'CopyFormatting', '-', 'Undo',  'Redo'] },
    {name: 'editing', items: ['Find', 'SelectAll', 'Scayt'] },
    {name: 'links', items: ['Link', 'Unlink'] },
    {name: 'insert', items: ['base64image', 'Table', 'HorizontalRule', 'SpecialChar'] },
    {name: 'tools', items: ['Maximize'] },
    '/',
    {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
    {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
    {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize', 'TextColor', 'BGColor'] }
    ];
	
	config.filebrowserUploadUrl = '/uploader/upload.php';
};
