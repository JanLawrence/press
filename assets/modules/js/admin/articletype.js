$(function(){
    $('.btn-add').click(function(){
        $('#addModal').modal('toggle'); // toggle add modal
    });
    $('#addForm').submit(function(){ // submit add user form
        var form = $(this).serialize();
        if(confirm('Are you sure you want to save this type?') == true){
            $.post(URL+'admin/addArticleType',form) // post to admin/addArticleType
            .done(function(returnData){
                if(returnData == 1){ // if existing type
                    alert('Existing Article Type.') // alert error
                } else {
                    alert('You have successfully saved this type.') // alert success
                    location.reload(); // reload if success
                }
            })
        }
        return false;
    })
    $("#tableList").on('click','.btn-edit',function(){ // on click edit button on article type list
        $('#editModal').modal('toggle'); // toggle edit modal
        
        // get values on attr of the button clicked
        var aid = $(this).attr('a_id');
        var type = $(this).attr('a_type');

        // put attr values on each specific input 
        $('#editForm').find('input[name="id"]').val(aid);
        $('#editForm').find('input[name="type"]').val(type);
        
        return false;
    })
    $("#tableList").on('click','.btn-delete',function(){ // on click delete button on user list
        // get values on attr of the button clicked
        if(confirm('Are you sure you want to delete this type?')){
            var aid = $(this).attr('a_id');
            $.post(URL+'admin/deleteArticleType', {'id': aid})  // post to admin/deleteArticleType
            .done(function(){
                alert('You have successfully deleted this type.'); //alert success
                location.reload(); // reload
            })
        } else {
            return false;
        }    
        return false;
    })
    $('#editForm').submit(function(){ // submit edit user form
        var form = $(this).serialize();
        if(confirm('Are you sure you want to edit this type?')){
            $.post(URL+'admin/editArticleType', form) // post to admin/editArticleType
            .done(function(returnData){
                if(returnData == 1){ // if existing type
                    alert('Exisitng Article Type') // alert error
                } else {
                    alert('You have successfully updated this type.') // alert success
                    location.reload(); // reload if success
                }
            })
        } else {
            return false;
        }
        return false;
    })
})