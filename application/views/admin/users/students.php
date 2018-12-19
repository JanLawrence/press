<!-- List of Users -->
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h3 class="card-title">Student List</h3>
                    </div>
                    <div class="float-right">
                        <!-- <a href="#" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-plus"></i> Add User</a> -->
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hovered" id="tableList">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 50%">Name</th>
                            <th style="width: 20%">Username</th>
                            <th style="width: 15%">User Level</th>
                            <th style="width: 15%">Article</th>
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
                                <td><?= $each->username?></td>
                                <td><?= $each->user_type?></td>
                                <td><?= $each->article_type?></td>
                                <td>
                                    <?php if($each->confirm == 'no') :?>
                                        <button class="btn btn-primary btn-sm btn-act" 
                                        userid="<?= $each->user_id?>" stat="activate">
                                            Activate
                                        </button>
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
<script src="<?= base_url()?>assets/modules/js/admin/user.js"></script>