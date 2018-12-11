$(function(){
    $('.btn-add').click(function(){
        $('#addModal').modal('toggle'); // toggle add modal
    });
    var count = 2;
    $('.btn-append').click(function(){
        var append = '<tr>'+
                        '<td style="width: 80%">'+
                            '<select class="form-control name-'+count+'" name="name[]">'+
                            '</select>'+
                        '</td>'+
                        '<td style="width: 20%">'+
                            '<button type="button" class="btn btn-danger btn-sm btn-remove"><i class="ti-minus"></i></button>'+
                        '</td>'+
                    '</tr>';
        $('.table-name tbody').append(append);
        var user = $('select[name="user"]').val();
        getNameByUser(user,'select.name-'+count);
        count++;
        $('.btn-remove').click(function(){
            $(this).closest('tr').remove();
        })
    })
    $('select[name="user"]').change(function(){
        var user = $(this).val();
        getNameByUser(user,'select[name="name[]"]');
       
    })
    $('#addForm').submit(function(){
        var form = $(this).serialize();
        if(confirm('Are you sure you want to submit this notification?')){
            $.post(URL + 'admin/addNotif', form)
            .done(function(returnData){
                alert('You have successfully submitted the notification')
                location.reload(); // reload if success
            }) 
        } else {
            return false;
        }
        return false;
    })
})
function getNameByUser(user,select){
    $.post(URL +'admin/getNameByUser', {'user': user})
    .done(function(returnData){
        var data = $.parseJSON(returnData);
        var append = '';
        $.each(data, function(key,a){
            append += '<option value="'+a.user_id+'">'+a.name+'</option>';
        })
        $(select).html(append);
    })
}