$(function(){
    CKEDITOR.replace( 'editor' ); // toggle ckeditor on textarea with id = editor
    CKEDITOR.replace( 'editor2' ); // toggle ckeditor on textarea with id = editor2
    // $('textarea[name="article"]').ckeditor();
    $('#tableList').DataTable();


    $('.btn-add').click(function(){
        $('#addModal').modal('toggle');
    })
    $("#tableList").on('click','.btn-edit',function(){ // on click edit button on article type list
        $('#editModal').modal('toggle'); // toggle edit modal
        
        // get values on attr of the button clicked
        var id = $(this).attr('a_id');
        var title = $(this).attr('a_title');
        var writer = $(this).attr('a_writer');
        var type = $(this).attr('a_type');
        var description = $(this).attr('a_description');
        var article = $(this).attr('a_article');

        // put attr values on each specific input 
        $('#editForm').find('input[name="id"]').val(id);
        $('#editForm').find('input[name="title"]').val(title);
        $('#editForm').find('input[name="writer"]').val(writer);
        $('#editForm').find('select[name="type"]').val(type).change();
        $('#editForm').find('textarea[name="description"]').val(description);
        $('#editForm').find('textarea[name="article"]').val(article);
        CKEDITOR.instances['editor2'].setData(article)
     
        return false;
    })
    $("#tableList").on('click','.btn-delete',function(){ // on click edit button on article type list
        // get values on attr of the button clicked
        var id = $(this).attr('a_id');

        if(confirm('Are you sure you want to delete this article?') == true){
            $.post(URL+'admin/deleteArticle', {'id': id})
            .done(function(returnData){
                alert("You have successfully deleted this article.");
                location.reload();
            })
        } else {
            return false;
        }
        return false;
    })
    $('#addForm').submit(function(){
        if(confirm('Are you sure you want to save this article?') == true){
            var content = CKEDITOR.instances.editor.getData(); // get CKeditor data
            var form = $(this).serialize();
            form = form + '&content=' + content;
            $.post(URL+'admin/addArticle', form)
            .done(function(returnData){
                alert("You have successfully saved this article.");
                location.reload();
            })
        } else {
            return false;
        }
        return false;
    })
    $('#editForm').submit(function(){
        if(confirm('Are you sure you want to edit this article?') == true){
            var content = CKEDITOR.instances.editor2.getData(); // get CKeditor data
            var form = $(this).serialize();
            form = form + '&content=' + content;
            $.post(URL+'admin/editArticle', form)
            .done(function(returnData){
                alert("You have successfully updated this article.");
                location.reload();
            })
        } else {
            return false;
        }
        return false;
    })
})