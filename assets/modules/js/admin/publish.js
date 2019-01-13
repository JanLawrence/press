$(function(){
    
    // $('.btn-publish').click(function(){
    //     $('#publishModal').modal('toggle');
    // })
    $("#tableList").on('click','.btn-publish',function(){ // on click edit button on list
        $('#publishModal').modal('toggle'); // toggle edit modal
        // get values on attr of the button clicked
        var id = $(this).attr('id');
        var article = $(this).attr('article');
        var type = $(this).attr('type');
        var author = $(this).attr('author');

        // put attr values on each specific input 
        $('#publishForm').find('input[name="id"]').val(id);
        $('#publishForm').find('input[name="article"]').val(article);
        $('#publishForm').find('input[name="author"]').val(type);
        $('#publishForm').find('input[name="type"]').val(author);
        return false;
    })

    $("#tableList").on('click','.btn-unpublish',function(){ // on click edit button on list
        // get values on attr of the button clicked
        var id = $(this).attr('a_id');

        if(confirm('Are you sure you want to unpublish this article?') == true){
            $.post(URL+'admin/unpublish', {'id': id})
            .done(function(returnData){
                alert("You have successfully unpublished this article.");
                location.reload();
            })
        } else {
            return false;
        }
        return false;
    })
    $("#tableList").on('click','.btn-yes',function(){ // on click edit button on list
        // get values on attr of the button clicked
        var id = $(this).attr('id');
        if(confirm('Are you sure you want to set this headline?') == true){
            $.post(URL+'admin/setHeadline', {'id': id})
            .done(function(returnData){
                // alert(returnData);
                // return false;
                if(returnData == 1){
                    alert("You have successfully set this headline.");
                }else if(returnData == 2){
                    alert("There's already Top 3 Headlne.");
                }else if(returnData == 3){
                    alert("Publish article first.");
                }
                location.reload();
            })
        } else {
            return false;
        }
        return false;
    })
    $("#tableList").on('click','.btn-no',function(){ // on click edit button on list
        // get values on attr of the button clicked
        var id = $(this).attr('id');

        if(confirm('Are you sure you want to unset this headline?') == true){
            $.post(URL+'admin/unsetHeadline', {'id': id})
            .done(function(returnData){
                alert("You have successfully unset this headline.");
                location.reload();
            })
        } else {
            return false;
        }
        return false;
    })

    $('input[name="file"]').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('input[name="file"]')[0].files[0].name;
        $(this).prev('label').text(file);
    });
    $('#publishForm').submit(function(){
        var type = $(this).find('button[type="submit"]').attr('atr-type');
        var form = new FormData(this); // get form data
        
        //alert message
        if(type=='publish'){
            var alrtmsg = 'Are you sure you want to publish this newspaper? This will be seen by all of the students.';
        } else if(type == 'replace'){    
            var alrtmsg = 'Are you sure you want to replace the current newspaper? This will delete the current published one.';
        }

        if(confirm(alrtmsg)){ // if yes in alert message
            $.ajax({
                url: URL + 'admin/addPublish', // post to admin/addPublish
                type: "POST",
                data:  form,
                contentType: false, // for file uploading purposes
                cache: false,  // for file uploading purposes
                processData:false, // for file uploading purposes
                success: function(returnData){ // get returned data in the posted link by using returnData variable
                    // alert(returnData);
                    // return false;
                    if(returnData == 1){ // if returned data is equal to 1 success
                        alert('Article was successfully published.') //alert success
                        location.reload(); //reload page
                    } else if(returnData == 2){ // if returned data is equal to 2 deleted
                        location.reload(); //reload page
                    } else {
                        // alert(returnData); return false; // show error
                    }
                }
            });
        } else {
            return false;
        }
        return false;
    }) 
})