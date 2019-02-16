<?php
    $ci =&get_instance();
	$ci->load->model('admin_model');
    $access = $ci->admin_model->getUserLimit($_SESSION['user']->id, 'notif');
?>
<style>
    .dropdown-toggle{
        height: 38px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h3 class="card-title">Announcement</h3>
                    </div>
                    <div class="float-right">
                        <?php if($access[0]->limits == 'yes'): ?>
                        <a href="#" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-plus"></i> Add Announcement</a>
                        <?php endif;?>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hovered" id="tableList">
                    <thead>
                        <tr>
                            <th>Announcement No.</th>
                            <th>Date</th>
                            <th>Announcement</th>
                            <th>SMS</th>
                            <th>Student Portal</th>
                            <!-- <th style="width: 10%"><i class="ti-settings"></i></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($announcement as $each):?>
                        <tr>
                            <td><?=ucwords($each->announcement_no)?></td>
                            <td><?=date('F d, Y', strtotime($each->date))?></td>
                            <td><?=$each->content?></td>
                            <td><?=ucwords($each->sms)?></td>
                            <td><?=ucwords($each->display)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="addModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="ti-plus"></i> New Announcement</h4>
            </div>
            <form id="addForm" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label> No.:</label>
                        <input class="form-control" type="text" name="announcement_no" required value="<?= empty($series) ? 'AN-0000001' : $series[0]->newnum?>">
                    </div>
                    <div class="form-group">
                        <label> Date:</label>
                        <input class="form-control" type="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label> Announcement:</label>
                        <textarea class="form-control"  name="announcement" required rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label> Send Sms:</label>
                        <select name="sms" class="form-control">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Display in Student portal:</label>
                        <select name="display" class="form-control">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="ti-close"></i> Close</a>
                    <button class="btn btn-success btn-sm btn-submit" type="submit"><i class="ti-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>   
</div>
<script>
    $(function(){
        $("#tableList").dataTable();
        $('.btn-add').click(function(){
            $('#addModal').modal('toggle')
        })
        $('#addForm').submit(function(){
            if(confirm("Are you sure you want to save the changes you've made?") == true){
                var form = $(this).serialize();
                $.post(URL+'admin/saveAnnouncement', form)
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
</script>