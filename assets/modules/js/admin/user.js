$(function(){
    $('.btn-add').click(function(){
        $('.articleBox').hide();
        $('select[name=article]').prop('required', 'false');
        $('#addModal').modal('toggle'); // toggle add modal
    });
    $('.btn-validate').click(function(){
        $('#validateModal').modal('toggle'); // toggle add modal
    })
    $("#tableList").dataTable();
    $('select[name=usertype]').change(function(){
        var type = $(this).val();
        if(type == 'admin' || type == 'student'){
            $('.articleBox').hide();
            $('select[name=article]').prop('required', false);
        } else {
            $('.articleBox').show();
            $('select[name=article]').prop('required', true);
        }
    })
    $('#addForm').submit(function(){ // submit add user form
        if(confirm('Are you sure you want to save this user?') == true){
            var pass = $(this).find('input[name="password"]').val();
            var confirmpass = $(this).find('input[name="confirmpass"]').val();
            var that = $(this);
            if(pass == confirmpass){ // validation password and confirm pass
                $.post(URL+'admin/saveUser',that.serialize()) // post to admin/saveUser
                .done(function(returnData){
                    if(returnData == 1){ // if existing username
                        alert('Existing Username.') // alert error
                    } else {
                        alert('You have successfully saved this user.') // alert success
                        location.reload(); // reload if success
                    }
                })
            } else {
                alert('Password do not match.'); // alert error if pass not match
            }
        } else {
            return false;
        }
        return false;
    })    
    $('#validateForm').submit(function(){
        /* $.post(URL+'admin/validateStudent',$(this).serialize()) 
        .done(function(returnData){
            alert(returnData);
            return false;

            // location.reload();
        }) */
        var form = new FormData(this);
        $.ajax({
            url: URL + 'admin/validateStudent', // post to admin/validateStudent
            type: "POST",
            data:  form,
            contentType: false, // for file uploading purposes
            cache: false,  // for file uploading purposes
            processData:false, // for file uploading purposes
            success: function(returnData){ // get returned data in the posted link by using returnData variable
                if(returnData != '[]'){
                    let data = JSON.parse(returnData);
                    let append = '';
                    $.each(data, function(key, a){
                        append += '<tr>'+
                        '<td><input type="hidden" name="id[]" value="'+a.id+'">'+(a.school_id == null ? '' : a.school_id)+'</td>'+
                        '<td>'+a.name+'</td>'+
                        '</tr>';
                    })
                    $('#displayValidatedStudentsTable tbody').html(append);
                    $('#validateModal2').modal('toggle');
                } else {
                    alert('No data imported');
                }
            }
        })   
        return false;
    }) 
    $("#validateForm2").submit(function(){ // on click delete button on user list
        // get values on attr of the button clicked
        var form = $(this).serialize();
        if(confirm('Are you sure you want to validate this user/s?')){

            $.post(URL+'admin/validateStudent2', form)  // post to admin/deleteUser
            .done(function(returnData){
                alert('You have successfully validated the user/s.'); //alert success
                location.reload(); // reload
            })
        } else {
            return false;
        }    
        return false;
    })
    $("#tableList").on('click','.btn-edit',function(){ // on click edit button on user list
        $('#editModal').modal('toggle'); // toggle edit modal
        
        // get values on attr of the button clicked
        var uid = $(this).attr('userid');
        var fname = $(this).attr('u_fname');
        var lname = $(this).attr('u_lname');
        var mname = $(this).attr('u_mname');
        var userType = $(this).attr('u_user_type');
        var email = $(this).attr('u_email');
        var username = $(this).attr('u_username');
        var password = $(this).attr('u_password');
        var article = $(this).attr('u_article');
        
        if(userType == 'admin' || userType == 'student'){
            $('.articleBox').hide();
            $('select[name=article]').prop('required', false);
        } else {
            $('.articleBox').show();
            $('select[name=article]').prop('required', true);
        }

        // put attr values on each specific input 
        $('#editForm').find('input[name="id"]').val(uid);
        $('#editForm').find('input[name="fname"]').val(fname);
        $('#editForm').find('input[name="mname"]').val(mname);
        $('#editForm').find('input[name="lname"]').val(lname);
        $('#editForm').find('input[name="email"]').val(email);
        $('#editForm').find('input[name="username"]').val(username);
        $('#editForm').find('input[name="password"]').val(password);
        $('#editForm').find('input[name="confirmpass"]').val(password);
        $('#editForm').find('select[name="usertype"]').val(userType).change();
        $('#editForm').find('select[name="article"]').val(article).change();
        
        return false;
    })
    $("#tableList").on('click','.btn-delete',function(){ // on click delete button on user list
        // get values on attr of the button clicked
        if(confirm('Are you sure you want to delete this user?')){
            var uid = $(this).attr('userid');
            $.post(URL+'admin/deleteUser', {'id': uid})  // post to admin/deleteUser
            .done(function(){
                alert('You have successfully deleted this user.'); //alert success
                location.reload(); // reload
            })
        } else {
            return false;
        }    
        return false;
    })
    $("#tableList").on('click','.btn-act',function(){ 
        if(confirm('Are you sure you want to activate this user?')){
            var uid = $(this).attr('userid');
            var stat = $(this).attr('stat');
            $.post(URL+'admin/confirmStudent', {'id': uid, 'status': stat})
            .done(function(){
                alert('You have successfully activated this user.'); //alert success
                location.reload(); // reload
            })
        } else {
            return false;
        }    
        return false;
    })
    $("#tableList").on('click','.btn-deac',function(){
        if(confirm('Are you sure you want to deactivate this user?')){
            var uid = $(this).attr('userid');
            var stat = $(this).attr('stat');
            $.post(URL+'admin/confirmStudent', {'id': uid, 'status': stat})
            .done(function(){
                alert('You have successfully deactivated this user.'); //alert success
                location.reload(); // reload
            })
        } else {
            return false;
        }    
        return false;
    })
    $('#editForm').submit(function(){ // submit edit user form
        if(confirm('Are you sure you want to edit this user?')){
            var pass = $(this).find('input[name="password"]').val();
            var confirmpass = $(this).find('input[name="confirmpass"]').val();
            var that = $(this);
            if(pass == confirmpass){ // validation password and confirm pass
                $.post(URL+'admin/editUser',that.serialize()) // post to admin/editUser
                .done(function(returnData){
                    if(returnData == 1){ // if existing username
                        alert('Exisitng Username') // alert error
                    } else {
                        alert('You have successfully updated the user.') // alert success
                        location.reload(); // reload if success
                    }
                })
            } else {
                alert('Password do not match.'); // alert error if pass not match
            }
            return false;
        }
    })
})