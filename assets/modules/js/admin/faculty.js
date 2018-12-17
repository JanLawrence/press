$(function(){
    // $('#tableList').DataTable();
    $('.btn-add').click(function(){
        $('#addModal').modal('toggle');
    })
    $('.btnAppendSched').click(function(){
        var sample = '<tr>'+
                        '<td><input class="form-control" name="subject[]"></td>'+
                        '<td><input class="form-control" name="days[]"></td>'+
                        '<td><input class="form-control" name="time[]"></td>'+
                        '<td><button type="button" class="btn btn-danger btn-sm btnRemoveSched"><i class="ti-minus"></i></button></td>'+
                    '</tr>';
        $('#appendSched tbody').append(sample);
        $('.btnRemoveSched').click(function(){
            $(this).closest('tr').remove();
        })
    })
    $('#addForm').submit(function(){
        // if(confirm('Are you sure you want to save this faculty member?') == true){
        //     var form = $(this).serialize();
        //     $.post(URL+'admin/addFaculty', form)
        //     .done(function(returnData){
        //         alert("You have successfully saved this faculty member.");
        //         location.reload();
        //     })
        // } else {
        //     return false;
        // }
        // return false;
        if(confirm('Are you sure you want to save this faculty member?') == true){
            var form = new FormData(this); // get form data
            $.ajax({
                url: URL + 'admin/addFaculty', // post to admin/addPublish
                type: "POST",
                data:  form,
                contentType: false, // for file uploading purposes
                cache: false,  // for file uploading purposes
                processData:false, // for file uploading purposes
                success: function(returnData){ // get returned data in the posted link by using returnData variable
                    alert("You have successfully saved this faculty member.");
                    location.reload();
                }
            });
        } else {
            return false;
        }
    })
     $('#editForm').submit(function(){
        if(confirm('Are you sure you want to edit this faculty member?') == true){
            var form = new FormData(this); // get form data
            $.ajax({
                url: URL + 'admin/editFaculty', // post to admin/addPublish
                type: "POST",
                data:  form,
                data:  form,
                contentType: false, // for file uploading purposes
                cache: false,  // for file uploading purposes
                processData:false, // for file uploading purposes
                success: function(returnData){ // get returned data in the posted link by using returnData variable
                    alert("You have successfully edit this faculty member.");
                    location.reload();
                }
            });
        } else {
            return false;
        }
        return false;
    })

    $("#tableList").on('click','.btn-edit',function(){ // on click edit button on list
        $('#editModal').modal('toggle'); // toggle edit modal
        // get values on attr of the button clicked
        var id = $(this).attr('a_id');
        var fname = $(this).attr('a_fname');
        var mname = $(this).attr('a_mname');
        var lname = $(this).attr('a_lname');
        var dept = $(this).attr('a_dept');
        var pos = $(this).attr('a_position');
        var contact = $(this).attr('a_contact');
        var address = $(this).attr('a_address');
        var email = $(this).attr('a_email');

        // put attr values on each specific input 
        $('#editForm').find('input[name="id"]').val(id);
        $('#editForm').find('input[name="fname"]').val(fname);
        $('#editForm').find('input[name="mname"]').val(mname);
        $('#editForm').find('input[name="lname"]').val(lname);
        $('#editForm').find('input[name="department"]').val(dept);
        $('#editForm').find('select[name="position"]').val(pos).change();
        $('#editForm').find('input[name="contact"]').val(contact);
        $('#editForm').find('input[name="email"]').val(email);
        $('#editForm').find('textarea[name="address"]').val(address);

        $.post(URL +'admin/getFacultySched', {'id': id})
        .done(function(returnData){
            var data = $.parseJSON(returnData);
            var append = '';
            $.each(data,function(key,a){
                append += '<tr>'+
                            '<td><input class="form-control" name="subject[]" value="'+a.subject+'"></td>'+
                            '<td><input class="form-control" name="days[]" value="'+a.days+'"></td>'+
                            '<td><input class="form-control" name="time[]" value="'+a.time+'"></td>'+
                            '<td><button type="button" class="btn btn-danger btn-sm btnRemoveSched"><i class="ti-minus"></i></button></td>'+
                        '</tr>';
            })
            $('.appendSchedEdit tbody').html(append);
        })
        return false;
    })

    $("#tableList").on('click','.btn-delete',function(){ // on click edit button on list
        // get values on attr of the button clicked
        var id = $(this).attr('a_id');

        if(confirm('Are you sure you want to delete this faculty member?') == true){
            $.post(URL+'admin/deleteFaculty', {'id': id})
            .done(function(returnData){
                alert("You have successfully deleted this faculty member.");
                location.reload();
            })
        } else {
            return false;
        }
        return false;
    })
})