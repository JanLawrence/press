<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Language" content="en">
        <title>IntelPress</title>
        <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/themify-icons.css" >
        <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/modern-business.css" >
        <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/style-me.css" >
        <script src="<?= base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?= base_url();?>assets/js/popper.min.js"></script>
        <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url();?>assets/ckeditor/ckeditor.js"></script>
        <script>
            var URL = "<?= base_url()?>";
        </script>
        <style>
            .form-signin {
                width: 100%;
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="form-group text-right">
            <a class="btn btn-info btn-lg" href="<?=base_url('main/login')?>">Login</a>
            <a class="btn btn-info btn-lg" href="<?=base_url('main/register')?>">Signup</a>
        </div>
        <div class="card rounded-0 p-5">
            <div class="card-body" style="font-size: 20px;">
                    <label>COE</label>
                <div class="form-group">
                    <label>Mission: </label>
                    <?= isset($coe[0]->mission) ? $coe[0]->mission : ''?>
                </div>    
                <div class="form-group">
                    <label>Vision: </label>
                    <?= isset($coe[0]->vision) ? $coe[0]->vision : ''?>
                </div>    
                <div class="form-group">
                    <label>EVSU CORE VALUES: </label>
                    <?= isset($coe[0]->core_values) ? $coe[0]->core_values : ''?>
                </div>    
                <div class="form-group">
                    <label>EVSU PALANTAW TINGUHA: </label>
                    <?= isset($coe[0]->palantaw_tinguha) ? $coe[0]->palantaw_tinguha : ''?>
                </div>    
                <div class="form-group">
                    <label>OBJECTIVES: </label>
                    <?= isset($coe[0]->objectives) ? $coe[0]->objectives : ''?>
                </div>    
                <div class="form-group">
                    <label>PROGRAM MISSION: </label>
                    <?= isset($coe[0]->program_mission) ? $coe[0]->program_mission : ''?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row mt-4">
    <?php foreach($pres as $each):?>
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <?php if($each->image_name != ''):?>
                    <img class="card-img-top" src="data:image/<?= $each->type?>;base64, <?= base64_encode($each->content) ?>" style="height: 220px" alt="Card image cap">
                <?php else:?>
                    <img class="card-img-top" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="height: 220px">
                <?php endif;1?>
                <div class="card-body">
                    <h5 class="card-title"><?= $each->name?></h5>
                    <p class="card-text"><?= $each->position?></p>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    </div>
    <div class="row mt-4">
    <?php foreach($vice as $each):?>
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <?php if($each->image_name != ''):?>
                    <img class="card-img-top" src="data:image/<?= $each->type?>;base64, <?= base64_encode($each->content) ?>" style="height: 220px" alt="Card image cap">
                <?php else:?>
                    <img class="card-img-top" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="height: 220px">
                <?php endif;1?>
                <div class="card-body">
                    <h5 class="card-title"><?= $each->name?></h5>
                    <p class="card-text"><?= $each->position?></p>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    </div>
    <div class="row mt-4">
    <?php foreach($dean as $each):?>
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <?php if($each->image_name != ''):?>
                    <img class="card-img-top" src="data:image/<?= $each->type?>;base64, <?= base64_encode($each->content) ?>" style="height: 220px" alt="Card image cap">
                <?php else:?>
                    <img class="card-img-top" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="height: 220px">
                <?php endif;1?>
                <div class="card-body">
                    <h5 class="card-title"><?= $each->name?></h5>
                    <p class="card-text"><?= $each->position?></p>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    </div>
    <div class="row mt-4">
    <?php foreach($head as $each):?>
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <?php if($each->image_name != ''):?>
                    <img class="card-img-top" src="data:image/<?= $each->type?>;base64, <?= base64_encode($each->content) ?>" style="height: 220px" alt="Card image cap">
                <?php else:?>
                    <img class="card-img-top" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="height: 220px">
                <?php endif;1?>
                <div class="card-body">
                    <h5 class="card-title"><?= $each->name?></h5>
                    <p class="card-text"><?= $each->position?></p>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    </div>
    <div class="row mt-4">
    <?php foreach($faculty as $each):?>
        <div class="col-md-4">
            <div class="card">
                <?php if($each->image_name != ''):?>
                    <img class="card-img-top" src="data:image/<?= $each->type?>;base64, <?= base64_encode($each->content) ?>" style="height: 220px" alt="Card image cap">
                <?php else:?>
                    <img class="card-img-top" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="height: 220px">
                <?php endif;1?>
                <div class="card-body">
                    <h5 class="card-title"><?= $each->name?></h5>
                    <p class="card-text"><?= $each->position?></p>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
</div>
</body>
</html>