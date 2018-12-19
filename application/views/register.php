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
            .form-group span.error{
                color: #dc3545;
                font-size: 10px;
            }
        </style>
    </head>
    <body>
        <form class="form-signin" action="register" method="post">
            <div class="text-center mb-5" style="font-size: 25px;"><span>INTEL</span><span><strong>PRESS</strong></span></div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" required="" autofocus="" name="fname">
                <?= form_error('fname', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
            </div>
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" class="form-control" autofocus="" name="mname">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" required="" autofocus="" name="lname">
                <?= form_error('lname', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" required="" autofocus="" name="email">
                <?= form_error('email', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
            </div>
            <div class="form-group">
                <label>Birthday</label>
                <input type="text" class="form-control" required="" autofocus="" name="bday">
                <?= form_error('bday', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
            </div>
            <div class="form-group">
                <label>Contact No.</label>
                <input type="text" class="form-control" autofocus="" name="contact">
            </div>
            <div class="form-group">
                <label>Course Section</label>
                <input type="text" class="form-control" required="" autofocus="" name="course">
                <?= form_error('course', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" required="" autofocus="" name="username">
                <?= form_error('username', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" required="" name="password">
                <?= form_error('password', '<span class="error"><i class="ti-alert"></i> ','</span>')?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" required="" name="confirmpass">
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                <p class="mt-5 mb-3 text-muted text-center">© 2017-2018</p>
            </div>
        </form>
    </body>
</html>