<?php 
    $userSession = $this->session->userdata['user'];
?>
<div class="row">
    <?php if($userSession->user_type == 'editor' || $userSession->user_type == 'writer'): ?>
    <div class="col-md-6">
        <div class="card text-white bg-dark mb-3 pt-1">
            <div class="card-header text-center"><h6>Number of Editor Articles</h6></div>
            <div class="card-body">
                <h1 class="card-title text-center"><?= count($total1)?></h1>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-white bg-dark mb-3 pt-1">
            <div class="card-header text-center"><h6>Number of Articles Submitted</h6></div>
            <div class="card-body">
                <h1 class="card-title text-center"><?= count($total2)?></h1>
            </div>
        </div>
    </div>
    <?php elseif($userSession->user_type == 'admin'): ?>
    <div class="col-md-4">
        <div class="card text-white bg-dark mb-3 pt-1">
            <div class="card-header text-center"><h6>Number of Editors</h6></div>
            <div class="card-body">
                <h1 class="card-title text-center"><?= count($total1)?></h1>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-dark mb-3 pt-1">
            <div class="card-header text-center"><h6>Number of Writers</h6></div>
            <div class="card-body">
                <h1 class="card-title text-center"><?= count($total2)?></h1>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-dark mb-3 pt-1">
            <div class="card-header text-center"><h6>Number of Articles</h6></div>
            <div class="card-body">
                <h1 class="card-title text-center"><?= count($total3)?></h1>
            </div>
        </div>
    </div>
    <?php endif;?>
</div>