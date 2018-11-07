<!-- List of Users -->
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h3 class="card-title">Article Type List</h3>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-plus"></i> New</a>
                        <a href="#" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-pencil-alt"></i> Edit</a>
                        <a href="#" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-trash"></i> Delete</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hovered" id="tableList">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 85%">Title</th>
                            <th style="width: 85%">Published Date</th>
                            <th style="width: 85%">Type</th>
                            <th style="width: 85%">Status</th>
                            <th style="width: 85%">Edited Date</th>
                            <th style="width: 85%">Editor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Variable $userList was declared in Admin Controller $data['userList'] -->
                        <!-- Displays Data of $userList -->
                        <!-- <?php 
                            $ctr = 1;
                            foreach($articleList as $each){
                        ?>
                            <tr>
                                <td><?= $ctr++?></td>
                                <td><?= $each->type?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm btn-edit" 
                                    a_id="<?= $each->id?>" 
                                    a_type="<?= $each->type?>">
                                        <i class="ti-pencil-alt"></i> 
                                    </button>
                                    <button class="btn btn-danger btn-sm btn-delete" 
                                    a_id="<?= $each->id?>">
                                        <i class="ti-trash"></i> 
                                    </button>
                                </td>
                            </tr>
                        <?php } ?> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- For Adding of user -->
<form id="addForm" method="post">
<div class="modal" id="addModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="ti-plus"></i> Add Article</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label> Title:</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label> Writer:</label>
                    <input type="text" class="form-control" name="writer" required>
                </div>
                <div class="form-group">
                    <label> Type:</label>
                    <input type="text" class="form-control" name="type" required>
                </div>
                <div class="form-group">
                    <label> Description:</label>
                    <textarea type="text" class="form-control" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label> Article:</label>
                    <textarea type="text" class="form-control" name="article" id="editor"></textarea>
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
<!-- For Update/Edit of user -->
<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="ti-pencil-alt"></i> Edit Article Type</h4>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3"> Type:</label>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="id" required>
                                    <input type="text" class="form-control" name="type" required>
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
<script src="<?= base_url()?>assets/modules/js/admin/article.js"></script>