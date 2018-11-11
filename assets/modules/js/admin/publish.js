$(function(){
    $('input[name="file"]').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('input[name="file"]')[0].files[0].name;
        $(this).prev('label').text(file);
    });
    $('#publishForm').submit(function(){
        var type = $(this).find('button[type="submit"]').attr('atr-type');
        
        //alert message
        if(type=='publish'){
            var alrtmsg = 'Are you sure you want to publish this newspaper? This will be seen by all of the students.';
        } else if(type == 'replace'){    
            var alrtmsg = 'Are you sure you want to replace the current newspaper? This will delete the current published one.';
        }

        if(confirm(alrtmsg)){ // if yes in alert message
            var form = new FormData(this); // get form data
            $.ajax({
                url: URL + 'admin/addPublish', // post to admin/addPublish
                type: "POST",
                data:  form,
                contentType: false, // for file uploading purposes
                cache: false,  // for file uploading purposes
                processData:false, // for file uploading purposes
                success: function(returnData){ // get returned data in the posted link by using returnData variable
                    if(returnData == 1){ // if returned data is equal to 1 success
                        alert('Newspaper was successfully published.') //alert success
                        location.reload(); //reload page
                    } else if(returnData == 2){ // if returned data is equal to 2 deleted
                        location.reload(); //reload page
                    } else {
                        alert(returnData); return false; // show error
                    }
                }
            });
        } else {
            return false;
        }
        return false;
    })
})