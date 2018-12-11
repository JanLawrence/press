$(function(){
    $('#addForm').submit(function(){
        if(confirm("Are you sure you want to save the changes you've made? These data will be displayed in the homepage.") == true){
            var form = $(this).serialize();
            $.post(URL+'admin/saveCoe', form)
            .done(function(returnData){
                alert("Changes successfully saved.");
                location.reload();
            })
        } else {
            return false;
        }
        return false;
    })
})