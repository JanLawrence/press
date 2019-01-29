<?php
 	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename= Student.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
<!-- List of Users -->
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-0">
            <div class="card-body">
                <table class="table table-bordered table-striped table-hovered datatables" id="tableList">
                    <thead>
                        <tr>
                            <th style="border: 1px solid black; width: 5%">ID</th>
                            <th style="border: 1px solid black; width: 20%">School ID</th>
                            <th style="border: 1px solid black; width: 50%">Name</th>
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
                                <td style="border: 1px solid black;"><?= $each->user_id?></td>
                                <td style="border: 1px solid black;"><?= $each->student_id?></td>
                                <td style="border: 1px solid black;"><?= $each->name?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url()?>assets/modules/js/admin/user.js"></script>