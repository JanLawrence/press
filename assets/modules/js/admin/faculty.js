$(function(){
    // $('#tableList').DataTable();
    $('.btn-add').click(function(){
        $('#addModal').modal('toggle');
    })
    $('#addForm').submit(function(){
        if(confirm('Are you sure you want to save this faculty member?') == true){
            var form = $(this).serialize();
            $.post(URL+'admin/addFaculty', form)
            .done(function(returnData){
                alert("You have successfully saved this faculty member.");
                location.reload();
            })
        } else {
            return false;
        }
        return false;
    })
     $('#editForm').submit(function(){
        if(confirm('Are you sure you want to edit this faculty member?') == true){
            var form = $(this).serialize();
            $.post(URL+'admin/editFaculty', form)
            .done(function(returnData){
                alert("You have successfully edit this faculty member.");
                location.reload();
            })
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