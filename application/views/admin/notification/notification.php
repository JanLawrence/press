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
                        <h3 class="card-title">Notification</h3>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-plus"></i> Add Notfication</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hovered" id="tableList">
                    <thead>
                        <tr>
                            <th>User Notified</th>
                            <th>Name</th>
                            <th>Summary</th>
                            <th>Date</th>
                            <th>Time</th>
                            <!-- <th style="width: 10%"><i class="ti-settings"></i></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($notifList as $each):?>
                        <tr>
                            <td><?=ucwords($each->user_type)?></td>
                            <td><?=$each->names?></td>
                            <td><?=$each->summary?></td>
                            <td><?=date('F m, Y', strtotime($each->date_created))?></td>
                            <td><?=date('H:i A', strtotime($each->date_created))?></td>
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
                <h4><i class="ti-plus"></i> New Notification</h4>
            </div>
            <form id="addForm" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label class="col-sm-3"> Type:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="user">
                                        <option selected disabled value="">Select User</option>
                                        <option value="student">Student</option>
                                        <option value="writer">Writer</option>
                                        <option value="editor">Editor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> Name:</label>
                                <div class="col-sm-9">
                                    <table style="width: 100%" class="table-name">
                                        <thead>
                                            <tr>
                                                <td style="width: 80%">
                                                    <select class="form-control selectpicker dropdown-toggle" name="name[]" data-live-search="true">
                                                    </select>
                                                </td>
                                                <td style="width: 20%">
                                                    <button type="button" class="btn btn-success btn-sm btn-append"><i class="ti-plus"></i></button>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Summary:</label>
                        <textarea class="form-control" type="text" name="summary" required></textarea>
                    </div>
                    <div class="form-group">
                        <label> Content:</label>
                        <textarea class="form-control" type="text" name="content" required></textarea>
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
<script src="<?= base_url()?>assets/modules/js/admin/notification.js"></script>