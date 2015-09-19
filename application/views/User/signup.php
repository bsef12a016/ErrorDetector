<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Signup - jErrors - JavaScript Error Tracking for Modern Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="<?=base_url()?>public/dashboard_assets/img/favicon.png">
    <link href="<?=base_url()?>public/dashboard_assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>public/dashboard_assets/css/ui.css" rel="stylesheet">
    <link href="<?=base_url()?>public/dashboard_assets/plugins/icheck/skins/all.css" rel="stylesheet" />
    <link href="<?=base_url()?>public/dashboard_assets/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
</head>
<body class="account separate-inputs boxed" data-page="signup">
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3">
                <div class="account-wall">
                    <i class="user-img icons-faces-users-03"></i>
                    <form class="form-signup" action="<?=site_url('User/user_signup')?>" method="post" role="form">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="append-icon">
                                    <input type="text" name="firstname" id="firstname" class="form-control form-white firstname" placeholder="First Name" required autofocus>
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="append-icon">
                                    <input type="text" name="lastname" id="lastname" class="form-control form-white lastname" placeholder="Last Name" required>
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="append-icon">
                            <input type="email" name="email" id="email" class="form-control form-white email" placeholder="Email" required>
                            <i class="icon-envelope"></i>
                        </div>

                        <div class="append-icon">
                            <input type="text" name="u_name" id="name" class="form-control form-white username" placeholder="Username" required>
                            <i class="icon-user"></i>
                        </div>
                        
                        <div class="append-icon">
                            <input type="password" name="password" id="password" class="form-control form-white password" placeholder="Password" required>
                            <i class="icon-lock"></i>
                        </div>
                        <div class="terms option-group">
                            <label for="terms" class="m-t-10">
                                <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue" required />
                                I agree with terms and conditions
                            </label>
                        </div>
                        <input type="submit" id="sub" class="btn btn-lg btn-dark m-t-20" data-style="expand-left" value="Register"></input>
                        <div class="social-btn">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-lg btn-block btn-primary"><i class="fa fa-facebook pull-left"></i>Sign In with Facebook</button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-lg btn-block btn-danger"><i class="fa fa-google pull-left"></i>Sign In with Google</button>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <p class="pull-right m-t-20"><a href="<?php echo site_url('User/login')?>">Already have an account? Sign In</a></p>
                            <p class="pull-left m-t-20"><a href="<?php echo site_url('Home/index')?>">Back to main page</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <p class="account-copyright">
            <span>Copyright © 2015 </span><span>jErrors</span>.<span>All rights reserved.</span>
        </p>
    </div>
    <!-- END LOCKSCREEN BOX -->
    <script src="<?=base_url()?>public/dashboard_assets/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/gsap/main-gsap.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/icheck/icheck.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/backstretch/backstretch.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/bootstrap-loading/lada.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/js/plugins.js"></script>
    <script src="<?=base_url()?>public/dashboard_assets/js/pages/login-v1.js"></script>
</body>
</html>