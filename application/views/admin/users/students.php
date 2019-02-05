<!-- List of Users -->
<style>
    div.file {
        position: relative;
        overflow: hidden;
    }
    input[type=file]{
        position: absolute;
        font-size: 50px;
        opacity: 0;
        right: 0;
        top: 0;
    }
</style>    
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h3 class="card-title">Student List</h3>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-secondary btn-sm mb-4 btn-validate"><i class="ti-check"></i> Validate</a>
                        <a href="<?= base_url()?>admin/studentExport" class="btn btn-secondary btn-sm mb-4 btn-export"><i class="ti-download"></i> Export</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hovered datatables" id="tableList">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 20%">School ID</th>
                            <th style="width: 50%">Name</th>
                            <th style="width: 20%">Contact No.</th>
                            <th style="width: 20%">Username</th>
                            <th style="width: 20%">Section</th>
                            <th style="width: 20%">Status</th>
                            <th style="width: 10%"><i class="ti-settings"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Variable $userList was declared in Admin Controller $data['userList'] -->
                        <!-- Displays Data of $userList -->
                        <?php 
                            $ctr = 1;
                            foreach($userList as $each){
                        ?>
                            <tr>
                                <td><?= $ctr++?></td>
                                <td><?= $each->student_id?></td>
                                <td><?= $each->name?></td>
                                <td><?= $each->contact_no?></td>
                                <td><?= $each->username?></td>
                                <td><?= $each->section?></td>
                                <td><?= $each->confirm == 'yes' ? 'Active' : 'Inactive' ?></td>
                                <td>
                                    <?php if($each->confirm == 'no') :?>
                                        <!-- <button class="btn btn-primary btn-sm btn-act" 
                                        userid="<?= $each->user_id?>" stat="activate">
                                            Activate
                                        </button> -->
                                    <?php endif;?>
                                    <?php if($each->confirm == 'yes') :?>
                                        <button class="btn btn-danger btn-sm btn-deac" 
                                        userid="<?= $each->user_id?>" stat="deactivate">
                                            Deactivate
                                        </button>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<form id="validateForm" method="post" enctype="multipart/form-data">
    <div class="modal" id="validateModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><i class="ti-check"></i> Validate Student</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <div class="file btn btn-info text-center">
                                    <i class="ti-upload"></i> <label class="m-0"> Upload Student Template</label>
                                    <input type="file" name="file"/>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <a href="#" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="ti-close"></i> Close</a>
                        <button class="btn btn-success btn-sm btn-submit" type="submit" atr-type="validate"><i class="ti-check"></i> Validate</button>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</form>
<form id="validateForm2" method="post" enctype="multipart/form-data">
    <div class="modal" id="validateModal2">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><i class="ti-check"></i> Validate Student</h4>
                </div>
                <div class="modal-body">
                    <p> 
                        Below are the active student/s. Once you proceed, the student/s who are not <br>
                        displayed below, will have an inactive status. Therefore, they can not be able to login.
                    </p>
                    <table class="table table-bordered" id="displayValidatedStudentsTable">
                        <thead>
                            <tr>
                                <th>Student Id</th>
                                <th>Student Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <a href="#" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="ti-close"></i> Close</a>
                        <button class="btn btn-success btn-sm btn-submit" type="submit" atr-type="validate"><i class="ti-check"></i> Validate</button>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</form>
<script src="<?= base_url()?>assets/modules/js/admin/user.js"></script>