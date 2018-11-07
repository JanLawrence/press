$(function(){
    CKEDITOR.replace( 'editor' ); // toggle ckeditor on textarea with id = editor
    $('#tableList').DataTable();


    $('.btn-add').click(function(){
        $('#addModal').modal('toggle');
    })
    $('#addForm').submit(function(){
        var content = CKEDITOR.instances.editor.getData(); // get CKeditor data
        var form = $(this).serialize();
        form = form + '&content=' + content;
        $.post(URL+'admin/addArticle', form)
        .done(function(returnData){
            alert(returnData);
        })
        return false;
    })
})