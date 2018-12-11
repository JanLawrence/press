<?php 
	$controller = $this->router->fetch_class();
	$method = $this->router->fetch_method();
	$userSession = $this->session->userdata['user'];
	$userInfo = $this->db->get_where('tbl_user_info', array('user_id' => $userSession->id));
	$userInfo = $userInfo->result();
?>
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
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/publish' ? 'active' : ''?>" href="<?= base_url()?>admin/publish"> Publish</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/users' ? 'active' : ''?>" href="<?= base_url()?>admin/users"> Users</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/articletype' ? 'active' : ''?>" href="<?= base_url()?>admin/articletype"> Article Type</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/notification' ? 'active' : ''?>" href="<?= base_url()?>admin/notification"> Notification</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'admin/coe' ? 'active' : ''?>" href="<?= base_url()?>admin/coe"> Mission/Vision</a>
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
					<a class="dropdown-item" href="<?=base_url()?>admin/logout"><i class="ti-power-off"></i> Logout</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">