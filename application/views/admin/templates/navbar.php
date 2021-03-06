<?php 
	$controller = $this->router->fetch_class();
	$method = $this->router->fetch_method();
	$userSession = $this->session->userdata['user'];
	$userInfo = $this->db->get_where('tbl_user_info', array('user_id' => $userSession->id));
	$userInfo = $userInfo->result();
	$ci =&get_instance();
	$ci->load->model('admin_model');
    $accessPublish = $ci->admin_model->getUserLimit($_SESSION['user']->id, 'publish');
    $accessMission = $ci->admin_model->getUserLimit($_SESSION['user']->id, 'mission');
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
	.navbar-nav li a{
		font-size: 10px;
	}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand ml-2" href="#">INTEL<strong>PRESS</strong></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
	 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto nav-tabs-standard ml-3">
			<?php if($userSession->user_type == 'admin'): ?>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/dashboard' ? 'active' : ''?>" href="<?= base_url()?>admin/dashboard"> Dashboard</a>
			</li>
			<?php if($accessPublish[0]->limits == 'yes'): ?>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/publish' ? 'active' : ''?>" href="<?= base_url()?>admin/publish"> Publish</a>
			</li>
			<?php endif;?>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/users' ? 'active' : ''?>" href="<?= base_url()?>admin/users"> Users</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/articletype' ? 'active' : ''?>" href="<?= base_url()?>admin/articletype"> Article Type</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/notification' ? 'active' : ''?>" href="<?= base_url()?>admin/notification"> Notification</a>
			</li>
			<?php if($accessMission[0]->limits == 'yes'): ?>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/coe' ? 'active' : ''?>" href="<?= base_url()?>admin/coe"> Mission/Vision</a>
			</li>
			<?php endif;?>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/faculty' ? 'active' : ''?>" href="<?= base_url()?>admin/faculty"> Faculty</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/activitylog' ? 'active' : ''?>" href="<?= base_url()?>admin/activitylog"> Activity Log</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/student' ? 'active' : ''?>" href="<?= base_url()?>admin/student"> Student</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/contactus' ? 'active' : ''?>" href="<?= base_url()?>admin/contactus"> About Us / Contact Us</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/permit' ? 'active' : ''?>" href="<?= base_url()?>admin/permit"> Parent's Permit</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/newspaper' ? 'active' : ''?>" href="<?= base_url()?>admin/newspaper"> Newspaper</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/announcement' ? 'active' : ''?>" href="<?= base_url()?>admin/announcement"> Announcement</a>
			</li>
			<?php endif; ?>
			<?php if($userSession->user_type == 'writer' || $userSession->user_type == 'editor'): ?>
				<li class="nav-item">
					<a class="nav-link <?= $controller.'/'.$method == 'admin/dashboard' ? 'active' : ''?>" href="<?= base_url()?>admin/dashboard"> Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= $controller.'/'.$method == 'admin/article' ? 'active' : ''?>" href="<?= base_url()?>admin/article"> Article</a>
				</li>
			<?php endif; ?>
            
		</ul>
		<ul class="navbar-nav ml-auto nav-tabs-standard">
			<?php if($userSession->user_type == 'admin'): ?>
			<li class="nav-item">
				<a class="nav-link backup-btn" href="#"> Backup and Restore</a>
			</li>
			<?php endif;?>
			<li class="nav-item dropdown d-none">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
				 aria-expanded="false">
					<!-- Display User Info of user -->
				 	Menu
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown2">
					<!-- <a class="dropdown-item" href="#"><i class="ti-settings"></i> Manage Accounts</a>
					<a class="dropdown-item" href="#"><i class="ti-key"></i> Change Password</a>
					<div class="dropdown-divider"></div> -->
					<?php if($userSession->user_type == 'admin'): ?>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/dashboard' ? 'active' : ''?>" href="<?= base_url()?>admin/dashboard"> Dashboard</a>
					<?php if($accessPublish[0]->limits == 'yes'): ?>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/publish' ? 'active' : ''?>" href="<?= base_url()?>admin/publish"> Publish</a>
					<?php endif;?>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/users' ? 'active' : ''?>" href="<?= base_url()?>admin/users"> Users</a>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/articletype' ? 'active' : ''?>" href="<?= base_url()?>admin/articletype"> Article Type</a>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/notification' ? 'active' : ''?>" href="<?= base_url()?>admin/notification"> Notification</a>
					<?php if($accessMission[0]->limits == 'yes'): ?>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/coe' ? 'active' : ''?>" href="<?= base_url()?>admin/coe"> Mission/Vision</a>
					<?php endif;?>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/faculty' ? 'active' : ''?>" href="<?= base_url()?>admin/faculty"> Faculty</a>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/activitylog' ? 'active' : ''?>" href="<?= base_url()?>admin/activitylog"> Activity Log</a>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/student' ? 'active' : ''?>" href="<?= base_url()?>admin/student"> Student</a>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/contactus' ? 'active' : ''?>" href="<?= base_url()?>admin/contactus"> About Us / Contact Us</a>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/permit' ? 'active' : ''?>" href="<?= base_url()?>admin/permit"> Parent's Permit</a>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/newspaper' ? 'active' : ''?>" href="<?= base_url()?>admin/newspaper"> Newspaper</a>
						<a class="dropdown-item <?= $controller.'/'.$method == 'admin/announcement' ? 'active' : ''?>" href="<?= base_url()?>admin/announcement"> Announcement</a>
					<?php endif; ?>
					<?php if($userSession->user_type == 'writer' || $userSession->user_type == 'editor'): ?>

							<a class="dropdown-item <?= $controller.'/'.$method == 'admin/dashboard' ? 'active' : ''?>" href="<?= base_url()?>admin/dashboard"> Dashboard</a>


							<a class="dropdown-item <?= $controller.'/'.$method == 'admin/article' ? 'active' : ''?>" href="<?= base_url()?>admin/article"> Article</a>

					<?php endif; ?>
            
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
				 aria-expanded="false">
					<!-- Display User Info of user -->
				 	Welcome! <strong><?= $userInfo[0]->fname.' '.($userInfo[0]->mname != '' ? substr(ucwords($userInfo[0]->mname), 0, 1).'.' : '').' '. $userInfo[0]->lname?></strong>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<!-- <a class="dropdown-item" href="#"><i class="ti-settings"></i> Manage Accounts</a>
					<a class="dropdown-item" href="#"><i class="ti-key"></i> Change Password</a>
					<div class="dropdown-divider"></div> -->
					<a class="dropdown-item" href="<?=base_url()?>admin/accounts"><i class="ti-settings"></i> Manage Accounts</a>
					<a class="dropdown-item" href="#" id="openPass"><i class="ti-key"></i> Change Password</a>
					<a class="dropdown-item" href="<?=base_url()?>admin/logout"><i class="ti-power-off"></i> Logout</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
<form id="changePassForm" method="post">
    <div class="modal fade" id="changePassModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="ti-key"></i> Change Password</h5>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control" name="oldpass">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpass">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                    <button type="submit" class="btn btn-default"><i class="ti-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="backupModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="ti-key"></i> Backup and Restore</h5>
                </div>
                <div class="modal-body">
					<div class="form-group text-center">
						<button class="btn btn-info btn-backup"> Backup </button>
						<!-- <button class="btn btn-info btn-restore"> Restore </button> -->
					</div>
					<form id="formRestore" method="post" enctype="multipart/form-data">
						<div class="form-group text-center">
							<div class="file btn btn-info text-center">
								<label class="m-0"> Restore</label>
								<input type="file" name="file"/>
							</div>
						</div>
					</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<script>
	$('.backup-btn').click(function(){
		$('#backupModal').modal('toggle');
	})
	$('.btn-backup').click(function(){
		var r = confirm('Are you sure you want to backup your file?');
		if(r==true){
			alert('Backup successfully saved, please visit the Backup database folder in local disk C')
			location.href = URL + "backup/add";
		} else {
			return false;
		}
	})
	$('input[name="file"]').change(function(){
		var alrtmsg = 'Are you sure you want to restore your data?';
		var form = new FormData($('#formRestore')[0]);
		if(confirm(alrtmsg)){ // if yes in alert message
            $.ajax({
                url: URL + 'backup/restore',
                type: "POST",
                data:  form,
                contentType: false, // for file uploading purposes
                cache: false,  // for file uploading purposes
                processData:false, // for file uploading purposes
                success: function(returnData){
					alert("Backup file succcessfully restored. You'll be logged out") 
					location.href = URL + 'admin/logout';
                }
            });
        } else {
            return false;
        }
	})
	$('#openPass').click(function(){
		$('#changePassModal').modal('toggle');
	})
	$('#changePassForm').submit(function(){
		var r = confirm('Are you sure you want to change your password?');
		if(r==true){
			var form = $(this).serialize(); // get form declare to variable form
			var pass = $('#changePassForm').find('input[name=pass]').val(); // get value of pass input to changepassform
			var confirmpass = $('#changePassForm').find('input[name=confirmpass]').val(); // get value of confirmpass input to changepassform
			if(pass == confirmpass){ //if equal return to post
				$.post(URL+'admin/changepass', form) // post to register/changepass
				.done(function(returnData){
					if(returnData == 1){
						alert('Invalid Old Password'); // alert error if old password is invalid
					} else {
						alert('Password successfully changed');
						location.reload();
					}
				})
			} else {
				alert('Password do not match'); // alert error
			}
		} else {
			return false;
		}
		return false;
	})
</script>


<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">