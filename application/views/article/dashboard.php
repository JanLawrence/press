<div class="row">
    <div class="col-md-12">
        <h5 class="text-center">Notifications</h5>
        <div class="box" style="height: 450px; overflow-y: auto;">
            <?php if(!empty($notif)): ?>
            <?php foreach($notif as $each): ?>
                <div class="card m-4">
                    <div class="card-body">
                        <label><?=date('F m, Y', strtotime($each->date_created))?></label>
                        <p><?=$each->summary?></p>
                        <a notif-id="<?=$each->id?>" href="#" class="read-more">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center"> No Notifications </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="modal" id="notif-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                 Notification</h4>
            </div>
            <div class="modal-body">
                Date: <span class="date"></span> <br><br><br>
                <label>Summary:</label>
                <p class="summary"></p>
                <label>Content:</label>
                <p class="content"></p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="ti-close"></i> Close</a>
            </div>
        </div>
    </div>   
</div>
<script>
    $(function(){
        $('.read-more').click(function(){
            var id = $(this).attr('notif-id');
            $.post(URL + 'admin/notifById', {'id': id})
            .done(function(returnData){
                var data = $.parseJSON(returnData);
                $('#notif-modal').find('.date').text(data[0].date_created);
                $('#notif-modal').find('.summary').text(data[0].summary);
                $('#notif-modal').find('.content').text(data[0].content);
            })
            $('#notif-modal').modal('toggle');
        })
    })
</script>