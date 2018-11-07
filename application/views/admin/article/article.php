<?php 
    $userSession = $this->session->userdata['user'];
?>
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h3 class="card-title">Article Type List</h3>
                    </div>
                    <div class="float-right">
                        <?php if($userSession->user_type == 'writer'):?>
                            <a href="#" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-plus"></i> New</a>
                        <?php endif; ?>
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
                            <th style="width: 85%"><i class="ti-settings"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $ctr = 1;
                            foreach($articles as $each){
                                ?>
                            <tr>
                                <td><?= $ctr++?></td>
                                <td><?= $each->title?></td>
                                <td><?= date('F d, Y', strtotime($each->date_published))?></td>
                                <td><?= $each->artice_type_name?></td>
                                <td><?= $each->edited == 'no' ? 'Unedited' : 'Edited'?></td>
                                <td><?= $each->editor_date_modified == '0000-00-00 00:00:00' ? '' : date('F d, Y', strtotime($each->editor_date_modified))?></td>
                                <td><?= $each->editor_name?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm btn-edit" 
                                    a_id="<?= $each->id?>" 
                                    a_title="<?= $each->title?>"
                                    a_writer="<?= $each->writer?>"
                                    a_type="<?= $each->article_type?>"
                                    a_description="<?= $each->description?>"
                                    a_article="<?= $each->article?>"
                                    >
                                        <i class="ti-pencil-alt"></i> 
                                    </button>
                                    <?php if($userSession->user_type == 'writer'):?>
                                    <button class="btn btn-danger btn-sm btn-delete" 
                                    a_id="<?= $each->id?>">
                                        <i class="ti-trash"></i> 
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
<form id="editForm" method="post">
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
</form>
<script src="<?= base_url()?>assets/modules/js/admin/article.js"></script>