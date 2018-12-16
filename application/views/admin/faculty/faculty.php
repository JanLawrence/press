<?php 
    $userSession = $this->session->userdata['user'];
    $posi = array();
    foreach($position as $eachpos){
        $posi[]= $eachpos->position;
    }
?>
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
                        <h3 class="card-title">Faculty</h3>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-plus"></i> New</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hovered" id="tableList">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Picture</th>
                            <th><i class="ti-settings"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $ctr = 1;
                            foreach($faculty as $each){
                                ?>
                            <tr>
                                <td><?= $ctr++?></td>
                                <td><?= $each->name?></td>
                                <td><?= $each->department?></td>
                                <td><?= $each->position?></td>
                                <td><?= $each->contact_num?></td>
                                <td><?= $each->address?></td>
                                <td><?= $each->email?></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary btn-sm btn-edit" 
                                    a_id="<?= $each->id?>" 
                                    a_fname="<?= $each->fname?>"
                                    a_mname="<?= $each->mname?>"
                                    a_lname="<?= $each->lname?>"
                                    a_dept="<?= $each->department?>"
                                    a_position="<?= $each->position?>"
                                    a_contact="<?= $each->contact_num?>"
                                    a_address="<?= $each->address?>"
                                    a_email="<?= $each->email?>"
                                    >
                                        <i class="ti-pencil-alt"></i> 
                                    </button>
                                    <button class="btn btn-danger btn-sm btn-delete" 
                                    a_id="<?= $each->id?>">
                                        <i class="ti-trash"></i> 
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<form id="addForm" method="post" enctype="multipart/form-data">
    <div class="modal" id="addModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><i class="ti-plus"></i> Add Faculty</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label> First Name:</label>
                                    <input type="text" class="form-control" name="fname" required>
                                </div>
                                <div class="col-md-4">
                                    <label> Middle Name:</label>
                                    <input type="text" class="form-control" name="mname">
                                </div>
                                <div class="col-md-4">
                                    <label> Last Name:</label>
                                    <input type="text" class="form-control" name="lname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label> Address:</label>
                                    <textarea name="address" class="form-control" type="text" required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label> Department:</label>
                                    <input type="text" class="form-control" name="department" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label> Contact Number:</label>
                                    <input type="text" class="form-control" name="contact" required>
                                </div>
                                <div class="col-md-6">
                                    <label> Position:</label>
                                    <select name="position" class="form-control" required>
                                        <option value="" selected disabled> Select Position</option>
                                        <?php
                                            $pos = array('University President','Vice President of Academic Affairs','Dean, College of Engineering','Head','Faculty');
                                            foreach($pos as $each){ 
                                        ?> 
                                            <option value="<?= $each?>" <?= in_array($each, $posi) ? 'hidden' : ''?>><?= $each?></option>
                                        <?php }             
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label> Email:</label>
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                                <!-- <div class="col-md-6">
                                    <label> Upload Profile Picture:</label>
                                    <div class="file btn btn-info">
                                        <i class="ti-upload"></i> <label class="m-0"> Upload</label>
                                        <input type="file" name="file"/>
                                    </div>
                                </div> -->
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success btn-sm" id="btnAppendSched"><i class="ti-plus"></i></button>
                                <table class="table table-bordered" id="appendSched">
                                    <thead>
                                        <tr>
                                            <th>Subjectsss</th>
                                            <th>Days</th>
                                            <th>Time</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>   
                                </table>
                            </div>
                            <div class="form-group">
                                <div class="file btn btn-info text-center">
                                    <i class="ti-upload"></i> <label class="m-0"> Upload Profile Pic</label>
                                    <input type="file" name="file"/>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <a href="#" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="ti-close"></i> Close</a>
                        <button class="btn btn-success btn-sm btn-submit" type="submit"><i class="ti-save"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</form>
<form id="editForm" method="post">
    <div class="modal" id="editModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><i class="ti-plus"></i> Edit Faculty</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label> First Name:</label>
                                    <input type="text" class="form-control" name="fname" required>
                                    <input type="hidden" class="form-control" name="id" required>
                                </div>
                                <div class="col-md-4">
                                    <label> Middle Name:</label>
                                    <input type="text" class="form-control" name="mname">
                                </div>
                                <div class="col-md-4">
                                    <label> Last Name:</label>
                                    <input type="text" class="form-control" name="lname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label> Address:</label>
                                    <textarea name="address" class="form-control" type="text" required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label> Department:</label>
                                    <input type="text" class="form-control" name="department" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label> Contact Number:</label>
                                    <input type="text" class="form-control" name="contact" required>
                                </div>
                                <div class="col-md-6">
                                    <label> Position:</label>
                                    <select name="position" class="form-control" required>
                                        <option value="" selected disabled> Select Position</option>
                                        <?php 
                                            $pos = array('University President','Vice President of Academic Affairs','Dean, College of Engineering','Head','Faculty');
                                            foreach($pos as $each){
                                        ?>
                                            <option value="<?= $each?>" <?= in_array($each, $posi) ? 'hidden' : ''?>><?= $each?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label> Email:</label>
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                                <!-- <div class="col-md-6">
                                    <label> Upload Profile Picture:</label>
                                    <div class="file btn btn-info">
                                        <i class="ti-upload"></i> <label class="m-0"> Upload</label>
                                        <input type="file" name="file"/>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <a href="#" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="ti-close"></i> Close</a>
                        <button class="btn btn-success btn-sm btn-submit" type="submit"><i class="ti-save"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</form>
<!-- <form id="editForm" method="post">
    <div class="modal" id="editModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><i class="ti-plus"></i> Edit Article</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Title:</label>
                        <input type="hidden" class="form-control" name="id" required>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label> Writer:</label>
                        <input type="text" class="form-control" name="writer" required>
                    </div>
                    <div class="form-group">
                        <label> Type:</label>
                        <select name="type" class="form-control" required>
                            <?php foreach($type as $each): ?>
                                <option value="<?= $each->id ?>"><?= $each->type ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Description:</label>
                        <textarea type="text" class="form-control" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label> Article:</label>
                        <textarea type="text" class="form-control" name="article" id="editor2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <a href="#" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="ti-close"></i> Close</a>
                        <button class="btn btn-success btn-sm btn-submit" type="submit"><i class="ti-save"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</form> -->
<script src="<?= base_url()?>assets/modules/js/admin/faculty.js"></script>
