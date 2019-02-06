<?php
    $ci =&get_instance();
	$ci->load->model('admin_model');
    $access = $ci->admin_model->getUserLimit($_SESSION['user']->id, 'notif');
    $month = array('January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'November', 'December');
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
                        <h3 class="card-title">Newspaper</h3>
                    </div>
                    <div class="float-right">
                        <a href="<?= base_url() ?>admin/newspaperAdd" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-plus"></i> Add Newspaper</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hovered" id="tableList">
                    <thead>
                        <tr>
                            <th>Months edition</th>
                            <th>Year</th>
                            <th>Pages</th>
                            <th>Print</th>
                            <!-- <th style="width: 10%"><i class="ti-settings"></i></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($newspaper as $each): ?>
                            <tr>
                                <td><?= $month[$each->month]?></td>
                                <td><?= $each->year?></td>
                                <td><?= $each->pages?></td>
                                <td><a class="btn btn-success" target="_blank" href="<?= base_url()?>admin/newspaperprint/?id=<?= $each->id?>">Print</a></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>

</script>