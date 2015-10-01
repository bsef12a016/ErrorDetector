<?php
 $session=  $this->session->all_userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>jErrors - JavaScript Error Tracking for Modern Web</title>
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>public/assets/base/img/content/misc/js1.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
    <link href="<?=base_url()?>public/assets/plugins/socicon/socicon.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN: BASE PLUGINS  -->
    <link href="<?=base_url()?>public/assets/plugins/revo-slider/css/settings.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/plugins/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/plugins/owl-carousel/owl.transitions.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css" />
    <!-- END: BASE PLUGINS -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?=base_url()?>public/assets/base/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/base/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>public/assets/base/css/themes/dark1.css" rel="stylesheet" id="style_theme" type="text/css" />
    <link href="<?=base_url()?>public/assets/base/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<body class="c-layout-header-fixed c-layout-header-fullscreen c-layout-header-topbar">
    <!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
    <!-- BEGIN: HEADER -->
    <header class="c-layout-header c-layout-header-default c-layout-header-default-mobile">
        <div class="c-navbar">
            <div class="container">
                <!-- BEGIN: BRAND -->
                <div class="c-navbar-wrapper clearfix">
                    <div class="c-brand c-pull-left">
                        <a href="<?php echo site_url('Home/index')?>" class="c-logo">
                            <img src="<?=base_url()?>public/assets/base/img/layout/logos/logo-1.png" alt="JANGO" class="c-desktop-logo">
                            <img src="<?=base_url()?>public/assets/base/img/layout/logos/logo-1.png" alt="JANGO" class="c-desktop-logo-inverse">
                            <img src="<?=base_url()?>public/assets/base/img/layout/logos/logo-1.png" alt="JANGO" class="c-mobile-logo">
                        </a>
                    </div>
                    <!-- END: BRAND -->
                    <!-- BEGIN: HOR NAV -->
                    <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
                    <!-- BEGIN: MEGA MENU -->
                    <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
                        <!-- BEGIN: MEGA MENU -->
                        <ul class="nav navbar-nav c-theme-nav">
                            <li class="c-active c-menu-type-classic">
                                <a href="<?php echo site_url('Home/index')?>" class="c-link dropdown-toggle">Home</a>
                            </li>
<!--                            <li class="c-menu-type-classic">
                                <a href="<?php echo site_url('Home/features')?>" class="c-link dropdown-toggle">Features</a>
                            </li>-->
                            <li>
                                <a href="<?php echo site_url('Home/tour')?>" class="c-link dropdown-toggle">Tour</a>
                            </li>
                            <li class="c-menu-type-classic">
                                <a href="<?php echo site_url('Home/pricing')?>" class="c-link dropdown-toggle">Pricing</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Home/docs')?>" class="c-link dropdown-toggle">Docs</a>
                            </li>
                            <li>
                                <?php
                                if($session[LOGIN_STATUS] === LOGIN_STATUS_TRUE){
                                    $href_dashboard = 'Dashboard/projects/';
                                    $href_dashboard .= $session[USER_ID];
                                    
                                    ?>
                                <a href="<?= site_url($href_dashboard)?>" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-white c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i>Dashboard</a>
                                <?php
                                
                                }else{
                                ?>
                                <a href="<?php echo site_url('User/login')?>" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-white c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> Sign In</a>
                                <?php
                                }
                                ?>
                            </li>
                        </ul>
                        <!-- END MEGA MENU -->
                    </nav>
                    <!-- END: MEGA MENU -->
                    <!-- END: LAYOUT/HEADERS/MEGA-MENU -->
                    <!-- END: HOR NAV -->
                </div>
            </div>
        </div>
    </header>
    <!-- END: HEADER -->
    <!-- END: LAYOUT/HEADERS/HEADER-1 -->