<?php 
    $userSession = $this->session->userdata['user'];
?>
<div class="row">
    <div class="col-md-6">
        <div class="card text-white bg-dark mb-3 pt-1">
            <div class="card-header text-center"><h6>Number of editor articles</h6></div>
            <div class="card-body">
                <h1 class="card-title text-center"><?= count($total1)?></h1>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-white bg-dark mb-3 pt-1">
            <div class="card-header text-center"><h6>Number of articles submitted</h6></div>
            <div class="card-body">
                <h1 class="card-title text-center"><?= count($total2)?></h1>
            </div>
        </div>
    </div>
</div>