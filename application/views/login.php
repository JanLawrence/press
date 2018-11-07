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
        <form class="form-signin" action="" method="post">
            <div class="text-center mb-5" style="font-size: 25px;"><span>INTEL</span><span><strong>PRESS</strong></span></div>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" id="inputEmail" class="form-control" placeholder="Username" required="" autofocus="" name="username">
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">
            </div>
            <div class="form-group text-center">
                <?php if(validation_errors() == true):?> 
                <div class="alert alert-danger"><i class="ti-alert"></i> Invalid Username or Password</div>
                <?php endif;?> 
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                <p class="mt-5 mb-3 text-muted text-center">© 2017-2018</p>
            </div>
        </form>
    </body>
</html>