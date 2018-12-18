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
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label style="font-weight:bolder;">Mission: </label></br>
                            <?= isset($coe[0]->mission) ? $coe[0]->mission : ''?>
                        </div>    
                        <div class="form-group">
                            <label style="font-weight:bolder;">Vision: </label></br>
                            <?= isset($coe[0]->vision) ? $coe[0]->vision : ''?>
                        </div>  
                    </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label style="font-weight:bolder;">EVSU CORE VALUES: </label></br>
                        <?= isset($coe[0]->core_values) ? $coe[0]->core_values : ''?>
                    </div>    
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label style="font-weight:bolder;">EVSU PALANTAW: </label></br>
                        <?= isset($coe[0]->palantaw) ? $coe[0]->palantaw : ''?>
                    </div>    
                    <div class="form-group">
                        <label style="font-weight:bolder;">EVSU TINGUHA: </label></br>
                        <?= isset($coe[0]->tinguha) ? $coe[0]->tinguha : ''?>
                    </div> 
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label style="font-weight:bolder;">OBJECTIVES: </label></br>
                        <?= isset($coe[0]->objectives) ? $coe[0]->objectives : ''?>
                    </div>    
                    <div class="form-group">
                        <label style="font-weight:bolder;">PROGRAM MISSION: </label></br>
                        <?= isset($coe[0]->program_mission) ? $coe[0]->program_mission : ''?>
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bolder;">PROGRAM EDUCATIONAL OBJECTIVE(INTEL PRESS): </label></br>
                        <?= isset($coe[0]->educational_objective) ? $coe[0]->educational_objective : ''?>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row mt-4">
    <?php foreach($pres as $each):?>

        <div class="col-md-4 offset-md-4">
            <a class="facultyView" fid="<?= $each->faculty_id?>" style="cursor: pointer">
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
            </a>
        </div>
    <?php endforeach;?>
    </div>
    <div class="row mt-4">
    <?php foreach($vice as $each):?>
        <div class="col-md-4 offset-md-4">
            <a class="facultyView" fid="<?= $each->faculty_id?>" style="cursor: pointer">
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
            </a>
        </div>
    <?php endforeach;?>
    </div>
    <div class="row mt-4">
    <?php foreach($dean as $each):?>
        <div class="col-md-4 offset-md-4">
            <a class="facultyView" fid="<?= $each->faculty_id?>" style="cursor: pointer">
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
            </a>
        </div>
    <?php endforeach;?>
    </div>
    <div class="row mt-4">
    <?php foreach($head as $each):?>
        <div class="col-md-4 offset-md-4">
            <a class="facultyView" fid="<?= $each->faculty_id?>" style="cursor: pointer">
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
            </a>
        </div>
    <?php endforeach;?>
    </div>
    <div class="row mt-4">
    <?php foreach($faculty as $each):?>
        <div class="col-md-4">
            <a class="facultyView" fid="<?= $each->faculty_id?>" style="cursor: pointer">
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
            </a>
        </div>
    <?php endforeach;?>
</div>
</div>
<div class="modal" id="viewModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="form-group">
                    <img class="facultyPic" src="data:image/<?= $each->type?>;base64, <?= base64_encode($each->content) ?>" style="height: 220px; display: block; margin: 0 auto;" alt="Card image cap">
                </div>
                <div class="form-group">
                    <h4 class="facultyName"></h4>
                </div>
                <div class="form-group">
                    <span class="facultyPosition"></span>
                </div>
                <div class="form-group">
                    <span class="facultyAddress"></span>
                </div>
                <div class="form-group">
                   <table class="table table-bordered facultySched">
                        <thead>
                            <th>Subject</th>
                            <th>Days</th>
                            <th>Time</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <a href="#" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="ti-close"></i> Close</a>
                </div>
            </div>
        </div>
    </div>   
</div>
<script>
    $(function(){
        $('.facultyView').click(function(){
            var id = $(this).attr('fid');
            $.post(URL +'admin/getFacultyById', {'id': id})
            .done(function(returnData){
                var data = $.parseJSON(returnData);
                if(data['info'].content == ''){
                    $('#viewModal').find('.facultyPic').attr('src', "<?= base_url('assets/img/no-image.png')?>");
                } else {
                    $('#viewModal').find('.facultyPic').attr('src', 'data:image/'+data['info'].type+';base64, '+data['info'].content);
                }
                $('#viewModal').find('.facultyName').text(data['info'].name);
                $('#viewModal').find('.facultyPosition').text(data['info'].position);
                $('#viewModal').find('.facultyAddress').text(data['info'].address);
                var append = '';
                if(data['sched'] != ''){
                    $.each(data['sched'], function(key,a){
                        append += '<tr>'+
                                    '<td>'+a.subject+'</td>'+
                                    '<td>'+a.days+'</td>'+
                                    '<td>'+a.time+'</td>'+
                                '</tr>';
                    })
                } else {
                    append = '<tr><td colspan="3" class="text-center">No Schedule</td>';
                }
                $('#viewModal').find('.facultySched tbody').html(append);
                $('#viewModal').modal('toggle');
            })
        })
    })
</script>
</body>
</html>