<!-- List of Users -->
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h3 class="card-title">User List</h3>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-plus"></i> Add User</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hovered" id="tableList">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 50%">Name</th>
                            <th style="width: 20%">Email</th>
                            <th style="width: 15%">Type</th>
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
                                <td><?= $each->name?></td>
                                <td><?= $each->email?></td>
                                <td><?= $each->user_type?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm btn-edit" 
                                    userid="<?= $each->user_id?>" 
                                    u_fname="<?= $each->f_name?>"
                                    u_lname="<?= $each->l_name?>"
                                    u_mname="<?= $each->m_name?>"
                                    u_user_type="<?= $each->user_type?>"
                                    u_email="<?= $each->email?>"
                                    u_username="<?= $each->username?>"
                                    u_password="<?= $each->password?>"
                                    u_article="<?= $each->article_type_id?>">
                                        <i class="ti-pencil-alt"></i> 
                                    </button>
                                    <button class="btn btn-danger btn-sm btn-delete" 
                                    userid="<?= $each->user_id?>">
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
<!-- For Adding of user -->
<div class="modal" id="addModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="ti-plus"></i> Add User</h4>
            </div>
            <form id="addForm" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6> User Information</h6>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-3"> First Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> Middle Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> Last Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row articleBox">
                                <label class="col-sm-3"> Article Type:</label>
                                <div class="col-sm-9">
                                    <select name="article" class="form-control" required>
                                        <?php foreach($articleList as $each): ?>
                                            <option value="<?= $each->id ?>"><?= $each->type ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6> User Login Information </h6>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-3"> Username:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> Password:</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> Confirm Password:</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="confirmpass" required>
                                    <span class="alert-notif"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> User Type:</label>
                                <div class="col-sm-9">
                                    <select name="usertype" class="form-control" required>
                                        <option value="admin">Admin</option>
                                        <option value="writer">Writer</option>
                                        <option value="editor">Editor</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
<!-- For Update/Edit of user -->
<div class="modal" id="editModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="ti-pencil-alt"></i> Edit User</h4>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6> User Information</h6>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-3"> First Name:</label>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="id" required>
                                    <input type="text" class="form-control" name="fname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> Middle Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> Last Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row articleBox">
                                <label class="col-sm-3"> Article Type:</label>
                                <div class="col-sm-9">
                                    <select name="article" class="form-control" required>
                                        <?php foreach($articleList as $each): ?>
                                            <option value="<?= $each->id ?>"><?= $each->type ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6> User Login Information </h6>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-3"> Username:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> Password:</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> Confirm Password:</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="confirmpass" required>
                                    <span class="alert-notif"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"> User Type:</label>
                                <div class="col-sm-9">
                                    <select name="usertype" class="form-control" required>
                                        <option value="admin">Admin</option>
                                        <option value="writer">Writer</option>
                                        <option value="editor">Editor</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
<script src="<?= base_url()?>assets/modules/js/admin/user.js"></script>