<?php 
    $userSession = $this->session->userdata['user'];
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
                        <h3 class="card-title">Publish</h3>
                    </div>
                    <!-- <div class="float-right">
                        <a href="#" class="btn btn-secondary btn-sm mb-4 btn-headline">Headline</a>
                    </div> -->
                </div>
                <table class="table table-bordered table-striped table-hovered" id="tableList">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>Article Title</th>
                            <th>Type</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Picture</th>
                            <th><i class="ti-settings"></i></th>
                            <th>Headline</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $ctr = 1;
                            foreach($article as $each){
                                ?>
                            <tr>
                                <td><?= $ctr++?></td>
                                <td><?= $each->title?></td>
                                <td><?= $each->type?></td>
                                <td><?= $each->author?></td>
                                <td><?= $each->published == 'yes' ? 'Published' : 'Unpublished'?></td>
                                <td><?= $each->date_published?></td>
                                <td class="text-center">
                                    <?php
                                        if(!empty($each->ab_type)){
                                    ?>
                                            <img style="width:20%"; src="data:image/<?= $each->ab_type?>;base64, <?= base64_encode($each->content) ?>" >
                                    <?php        
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php if($each->published === 'no'):?>
                                        <button class="btn btn-primary btn-sm btn-publish"
                                        id ="<?= $each->id?>" 
                                        article ="<?= $each->title?>"
                                        type ="<?= $each->type?>"
                                        author="<?= $each->author?>"
                                        >
                                            Publish 
                                        </button>
                                    <?php else:?>
                                        <button class="btn btn-danger btn-sm btn-unpublish" 
                                        a_id="<?= $each->id?>">
                                            Unpublish 
                                        </button>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <?php if($each->headline === 'no'):?>
                                        <button class="btn btn-success btn-sm btn-yes"
                                        id ="<?= $each->id?>"
                                        >
                                            Yes 
                                        </button>
                                    <?php else:?>
                                        <button class="btn btn-danger btn-sm btn-no" 
                                        id="<?= $each->id?>">
                                            No 
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
<form id="publishForm" method="post" enctype="multipart/form-data">
    <div class="modal" id="publishModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><i class="ti-plus"></i> Publish</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Article:</label>
                                <input type="text" class="form-control" name="article" readonly>
                                <input type="hidden" class="form-control" name="id" readonly>
                            </div>
                            <div class="form-group">
                                <label> Author:</label>
                                <input type="text" class="form-control" name="author" readonly>
                            </div>
                            <div class="form-group">
                                <label> Type:</label>
                                <input type="text" class="form-control" name="type" readonly>
                            </div>
                            <div class="form-group">
                                <div class="file btn btn-info text-center">
                                    <i class="ti-upload"></i> <label class="m-0"> Upload Article Banner/Picture</label>
                                    <input type="file" name="file"/>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <a href="#" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="ti-close"></i> Close</a>
                        <button class="btn btn-success btn-sm btn-submit" type="submit" atr-type="publish"><i class="ti-save"></i> Publish Now</button>
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
<script src="<?= base_url()?>assets/modules/js/admin/publish.js"></script>
