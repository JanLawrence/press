<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Intel Press</title>

    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/themify-icons.css" >
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
	 rel='stylesheet' type='text/css'>
    <link href="<?= base_url() ?>assets/clean-blog-style/css/clean-blog.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/style-me.css" >

    <script src="<?= base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url();?>assets/js/popper.min.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
    <script> var URL = "<?= base_url()?>"; </script>
    <style>
        .txt-12{
            font-size: 12px;
        }
        .txt-15{
            font-size: 15px;
        }
        header.masthead {
            margin-bottom: 0px;
        }
    </style>
</head>
<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="index.html">IntelPress</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
			 aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('main/login')?>">Login</a>
					</li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('main/register')?>">Signup</a>
                    </li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Page Header -->
	<header class="masthead" style="background-image: url('assets/img/evsu-bg.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="site-heading">
						<h2>Eastern Visayas State University</h2>
						<span class="subheading">Intel Press</span>
					</div>
				</div>
			</div>
		</div>
	</header>

    <!-- Main Content -->
    <section style="background: #fff">
	<div class="container">
		<div class="row">
			<div class="col-lg-11 mx-auto mb-5">
                <div class="row pt-5">
                    <div class="col-lg-12 text-center">
                         <h2 class="post-title">COE</h2>
                    </div>
                </div><hr>
                <div class="row mt-5 mb-5">
                    <div class="col-lg-6 text-center">
                         <h4 class="post-title">Mission</h4>
                         <p class="post-meta txt-15">  <?= isset($coe[0]->mission) ? $coe[0]->mission : ''?></p>
                    </div>
                    <div class="col-lg-6 text-center">
                         <h4 class="post-title">Vision</h4>
                         <p class="post-meta txt-15">  <?= isset($coe[0]->vision) ? $coe[0]->vision : ''?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <section style="background: #f8f9fa">
		<div class="container">
            <div class="row pt-5">
                <div class="col-lg-12 text-center">
                    <h3 class="post-title">EVSU</h3>
                </div>
            </div><hr>
            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                        <h4 class="post-title">Core Values</h4>
                        <p class="post-meta txt-15">  <?= isset($coe[0]->core_values) ? $coe[0]->core_values : ''?></p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6 text-center">
                        <h4 class="post-title">Palantaw</h4>
                        <p class="post-meta txt-15">  <?= isset($coe[0]->palantaw) ? $coe[0]->palantaw : ''?></p>
                </div>
                <div class="col-lg-6 text-center">
                        <h4 class="post-title">Tinguha</h4>
                        <p class="post-meta txt-15">  <?= isset($coe[0]->tinguha) ? $coe[0]->tinguha : ''?></p>
                </div>
            </div>
        </div>
    </section>	
    <section style="background: #fff">
        <div class="container">
            <div class="row mt-5 pt-5">
                <div class="col-lg-12 text-center">
                        <h4 class="post-title">Objectives</h4><hr>
                        <p class="post-meta txt-15">  <?= isset($coe[0]->objectives) ? $coe[0]->objectives : ''?></p>
                </div>
            </div>
            <div class="row mt-5 pb-5">
                <div class="col-lg-6 text-center">
                        <h4 class="post-title">Program Mission</h4>
                        <p class="post-meta txt-15">  <?= isset($coe[0]->program_mission) ? $coe[0]->program_mission : ''?></p>
                </div>
                <div class="col-lg-6 text-center">
                        <h4 class="post-title">Program Educational Objective (IntelPress)</h4>
                        <p class="post-meta txt-15">  <?= isset($coe[0]->educational_objective) ? $coe[0]->educational_objective : ''?></p>
                </div>
            </div>
        </div>
    </section>
    <section style="background: #f8f9fa">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12 text-center">
                    <h3 class="post-title">Faculty</h3>
                </div>
            </div><hr>
            <div class="row mt-4">
            <?php foreach($faculty as $each):?>
                <div class="col-md-4">
                    <a class="facultyView" fid="<?= $each->faculty_id?>" style="cursor: pointer">
                        <div class="card mb-5" style="background: transparent; border: 0">
                            <?php if($each->image_name != ''):?>
                                <img class="card-img-top rounded-circle" src="data:image/<?= $each->type?>;base64, <?= base64_encode($each->content) ?>" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;" alt="Card image cap">
                            <?php else:?>
                                <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                            <?php endif;1?>
                            <div class="card-body text-center">
                                <h6 class="card-title"><?= $each->name?></h6>
                                <p class="card-text" style="margin: 0;"><?= $each->position?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- <section style="background: #fff">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12 text-center">
                    <h3 class="post-title">Intel Officer</h3>
                </div>
            </div><hr>
            <div class="row mt-4">
            <?php foreach($officer as $each):?>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $each->name?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            </div>
        </div>
    </section> -->
    <section style="background: #fff">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12 text-center">
                    <h3 class="post-title">Intel Officer</h3>
                </div>
            </div><hr>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Kurt Emil A. Peckson</h5>
                            <p class="card-text" style="margin: 0;">President</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Hinna Orquiola</h5>
                            <p class="card-text" style="margin: 0;">Vice-President</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Shara Christine Serrano</h5>
                            <p class="card-text" style="margin: 0;">Secretary</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Smile Lily Rosaldo</h5>
                            <p class="card-text" style="margin: 0;">Asst. Secretary</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Rheylan Gonzales</h5>
                            <p class="card-text" style="margin: 0;">Treasurer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Melissa Lauronal</h5>
                            <p class="card-text" style="margin: 0;">Auditor</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Gabriel Steven Tragura</h5>
                            <p class="card-text" style="margin: 0;">Business Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Catherine Bohol</h5>
                            <p class="card-text" style="margin: 0;">P.R.O / P.I.O</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Kenneth A. Araza</h5>
                            <p class="card-text" style="margin: 0;">1st Representative</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Ronnel V. Traya</h5>
                            <p class="card-text" style="margin: 0;">1st Representative</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Crister Corsanes</h5>
                            <p class="card-text" style="margin: 0;">2nd Representative</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Juancho Maceda</h5>
                            <p class="card-text" style="margin: 0;">3rd Representative</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section style="background: #f8f9fa">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12 text-center">
                    <h3 class="post-title">Editorial Staff</h3>
                </div>
            </div><hr>
            <div class="row mt-4">
            <?php foreach($editor as $each):?>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $each->name?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            </div>
        </div>
    </section> -->
    <section style="background: #f8f9fa">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12 text-center">
                    <h3 class="post-title">Editorial Staff</h3>
                </div>
            </div><hr>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Publisher</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Editor-in-chief</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Managing Editor</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">News Editor</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Editor (Science)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Editor (Business)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Editor (Sports)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Editor (City)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Editor (Features)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Sub Editor</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Reporter</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Staff Writer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5" style="background: transparent; border: 0">
                        <img class="card-img-top rounded-circle" src="<?= base_url('assets/img/no-image.png')?>" alt="Card image cap" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sample Name</h5>
                            <p class="card-text" style="margin: 0;">Photographer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<!-- Footer -->
	<footer style="background: #fff">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto text-center">
                    <h6 class="post-title">Contact Us / About Us</h6>
                    <p class="post-meta txt-12"> <?= $contact[0]->content?></p>
                    <hr>
                </div>
				<div class="col-lg-8 col-md-10 mx-auto">
					<ul class="list-inline text-center">
						<li class="list-inline-item">
							<img src="<?= base_url()?>assets/img/logo1.jpg" class="mx-auto" style="width: 70px;">
						</li>
						<li class="list-inline-item">
                            <img src="<?= base_url()?>assets/img/logo2.jpg" class="mx-auto" style="width: 70px;">
						</li>
					</ul>
					<p class="copyright text-muted">Copyright &copy; IntelPress 2018-2019</p>
				</div>
			</div>
		</div>
	</footer>
<div class="modal" id="viewModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="form-group">
                    <img class="facultyPic rounded-circle" style="border: 3px solid #333333;height: 150px; width: 150px; margin: 0 auto; display: block;" alt="Card image cap">
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
                    <span class="facultyDesignation"></span>
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
                $('#viewModal').find('.facultyDesignation').text(data['info'].designation);
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
