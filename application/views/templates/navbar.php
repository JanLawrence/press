<?php 
	$controller = $this->router->fetch_class();
	$method = $this->router->fetch_method();
	$userSession = $this->session->userdata['user'];
	$userInfo = $this->db->get_where('tbl_user_info', array('user_id' => $userSession->id));
	$userInfo = $userInfo->result();

	$this->db->where("type NOT LIKE '%all%' AND status = 'saved'");
	$article2 = $this->db->get('tbl_article_type');
	$data = $article2->result();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand ml-2" href="#">INTEL<strong>PRESS</strong></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
	 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto nav-tabs-standard ml-3">
			<!-- <li class="nav-item dropdown">
				<a class="nav-link <?= $controller.'/'.$method == 'article' ? 'active' : ''?>" id="articleDropdown" 
				role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Article
				</a>
				<div class="dropdown-menu dropdown-article" aria-labelledby="articleDropdown">
					<a class="dropdown-item" href="<?=base_url()?>article/newspaper">Newspaper</a>
					<?php foreach($data as $each):?>
						<a class="dropdown-item" href="<?=base_url()?>article/articles?type=<?=$each->type?>"><?= ucwords($each->type)?></a>
					<?php endforeach;?>
				</div>
			</li> -->
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'article/index' ? 'active' : ''?>" href="<?= base_url()?>article"> Notification</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?= $controller.'/'.$method == 'article/articles' ? 'active' : ''?>" href="<?= base_url()?>article/articles"> Article</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link <?= $controller.'/'.$method == 'games' ? 'active' : ''?>" id="articleDropdown" 
				role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Games
				</a>
				<div class="dropdown-menu dropdown-article" aria-labelledby="articleDropdown">
					<a class="dropdown-item" href="<?=base_url()?>games/game1">Maze Game</a>
					<a class="dropdown-item" href="<?=base_url()?>games/game2">Tic Tac Toe</a>
					<a class="dropdown-item" href="<?=base_url()?>games/game3">Memory Game</a>
				</div>
			</li>
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