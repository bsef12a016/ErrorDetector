<?php $session=  $this->session->all_userdata();?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - jErrors - JavaScript Error Tracking for Modern Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>public/assets/base/img/content/misc/js1.png" />
    <link href="<?=base_url()?>public/dashboard_assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>public/dashboard_assets/css/ui.css" rel="stylesheet">
    <link href="<?=base_url()?>public/dashboard_assets/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
</head>
<!--<body class="account" data-page="login" style="background-image: url('<?= base_url()?>public/dashboard_assets/images/gallery/login.jpg');">-->
<body class="account" data-page="login">
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                    <i class="user-img icons-faces-users-03"></i>
                    <form id="s" class="form-signin" role="form" method="post" action="<?=site_url('User/usr_login')?>">
                        <h4 style="color: red"><?php echo $session[SIGNIN_ERROR]; ?></h4>
                        <div class="append-icon">
                            <input type="text" name="u_name" id="name" class="form-control form-white username" placeholder="Username" required>
                            <i class="icon-user"></i>
                        </div>
                        <div class="append-icon m-b-20">
                            <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                            <i class="icon-lock"></i>
                        </div>
                        <input type="submit" id="sub" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-left" value="Sign in"></input>
<!--                        <div class="social-btn">
                            <button type="button" class="btn-fb btn btn-lg btn-block btn-primary"><i class="icons-socialmedia-08 pull-left"></i>Connect with Facebook</button>
                            <button type="button" class="btn btn-lg btn-block btn-blue"><i class="icon-social-twitter pull-left"></i>Login with Twitter</button>
                        </div>-->
                        <div class="clearfix">
<!--                            <p class="pull-left m-t-20"><a id="password" href="#">Forgot password?</a></p>-->
                            <p class="pull-left m-t-20"><a id="password" href="<?php echo site_url('Home/index')?>"><-Back to main page</a></p>
                            <p class="pull-right m-t-20"><a href="<?php echo site_url('User/comming_soon')?>">New here? Sign up</a></p>
                        </div>
<!--                        <div class="clearfix">
                            <p class="pull-left m-t-0"><a id="password" href="<?php echo site_url('Home/index')?>"><-Back to main page</a></p>
                        </div>-->

                    </form>
                    <form class="form-password" role="form">
                        <div class="append-icon m-b-20">
                            <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                            <i class="icon-lock"></i>
                        </div>
                        <button type="submit" id="submit-password" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-left">Send Password Reset Link</button>
                        <div class="clearfix">
                            <p class="pull-left m-t-20"><a id="login" href="#">Already got an account? Sign In</a></p>
                            <p class="pull-right m-t-20"><a href="signup.php">New here? Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <p class="account-copyright">
            <span>Copyright © 2015 </span><span>jErrors</span>.<span>All rights reserved.</span>
        </p>
    </div>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/gsap/main-gsap.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/backstretch/backstretch.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/bootstrap-loading/lada.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/js/pages/login-v1.js"></script>
   
    <script>
        $(function(){
            
          $("#s").submit(function(e){
        });
    </script>
    
</body>
</html>