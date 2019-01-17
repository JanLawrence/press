<div class="row">
    <div class="col-md-12">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h3 class="card-title">Activity Log</h3>
                    </div>
                    <!-- <div class="float-right">
                        <a href="<?= base_url()?>admin/userlimit" class="btn btn-secondary btn-sm mb-4">User Limitation</a>
                        <?php if($access[0]->limits == 'yes'): ?>
                        <a href="#" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-plus"></i> Add User</a>
                        <?php endif?>
                    </div> -->
                </div>
                    <hr>
                <div class="clearfix">
                    <form method="get" id="generateForm">
                        <div class="float-left">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>From:</label>
                                    <input type="date" class="form-control" name="from" value="<?= isset($_GET['from']) ? $_GET['from'] : ''?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>To:</label>
                                    <input type="date" class="form-control" name="to" value="<?= isset($_GET['to']) ? $_GET['to'] : ''?>">
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-info" type="submit">Generate</button>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered table-striped table-hovered" id="tableList">
                    <thead>
                        <tr>
                            <th style="width: 50%">Name</th>
                            <th style="width: 15%">User Type</th>
                            <th style="width: 15%">Date</th>
                            <th style="width: 15%">Time</th>
                            <th style="width: 20%">Transaction</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($logs as $each){
                        ?>
                            <tr>
                                <td><?= $each->name?></td>
                                <td><?= $each->user_type?></td>
                                <td><?= date('F d, Y', strtotime($each->date_created))?></td>
                                <td><?= date('H:i A', strtotime($each->date_created))?></td>
                                <td><?= $each->transaction?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('table').DataTable();
    })
</script>