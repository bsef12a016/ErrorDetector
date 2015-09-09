<!DOCTYPE html>
<html>
    <head>
        <!-- BEGIN META SECTION -->
        <meta charset="utf-8">
        <title>Themes Lab - Creative Laborator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="assets/img/favicon.png">
        <!-- END META SECTION -->
        <!-- BEGIN MANDATORY STYLE -->
        <link href="<?=base_url()?>public/dashboard_assets/css/style.css" rel="stylesheet">
        <link href="<?=base_url()?>public/dashboard_assets/css/ui.css" rel="stylesheet">
        <!-- END  MANDATORY STYLE -->
    </head>
    <body class="coming-soon coming-map">
        <div class="map-container">
            <div id="map"></div>
        </div>
        <div class="coming-container">
            <!-- BEGIN LOGIN BOX -->
            <!-- Social Links -->
            <nav class="social-nav">
<!--                <ul>
                    <li><a href="#"><img src="<?=base_url()?>public/dashboard_assets/images/social/icon-facebook.png" alt="facebook"/></a></li>
                    <li><a href="#"><img src="<?=base_url()?>public/dashboard_assets/images/social/icon-twitter.png" alt="twitter"/></a></li>
                    <li><a href="#"><img src="<?=base_url()?>public/dashboard_assets/images/social/icon-google.png" alt="google"/></a></li>
                    <li><a href="#"><img src="<?=base_url()?>public/dashboard_assets/images/social/icon-dribbble.png" alt="dribbble"/></a></li>
                    <li><a href="#"><img src="<?=base_url()?>public/dashboard_assets/images/social/icon-linkedin.png" alt="facebook"/></a></li>
                    <li><a href="#"><img src="<?=base_url()?>public/dashboard_assets/images/social/icon-pinterest.png" alt="linkedin" /></a></li>
                </ul>-->
            </nav>
            <!-- Site Logo -->
            <div id="logo"><img src="<?=base_url()?>public/dashboard_assets/images/logo/logo-white.png" alt="logo"></div>
            <!-- Main Navigation -->
            <nav class="main-nav">
                <ul>
                    <li><a href="<?php echo site_url('Home/index') ?>" class="active">Home</a></li>
                    <li><a href="<?php echo site_url('Home/about') ?>">About</a></li>
                    <li><a href="<?php echo site_url('Home/contact') ?>">Contact</a></li>
                </ul>
            </nav>
            <!-- Home Page -->
            <div class="row">
                <div class="col-md-12">
                    <section class="content show" id="home">
                        <h1>Welcome</h1>
                        <h5>Our new site is coming soon!</h5>
                        <p>Site is currently in Beta version. Signup is not currently available. Website is running on invitation bases. Need Invitation? Send us mail at jerrors@gamil.com</p>
                        <p><a href="#about">Need Invitation? Send us mail at jerrors@gamil.com</a></p>
                    </section>
                </div>
<!--                <div class="col-md-6">
                    <div id="countdown">00 weeks 00 days <br> 00:00:00</div>
                </div>-->
            </div>
        </div>
        <div class="loader-overlay">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <!-- BEGIN MANDATORY SCRIPTS -->
        <script src="<?=base_url()?>public/dashboard_assets/plugins/jquery/jquery-1.11.1.min.js"></script>
        <script src="<?=base_url()?>public/dashboard_assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?=base_url()?>public/dashboard_assets/plugins/gsap/main-gsap.min.js"></script>
        <script src="<?=base_url()?>public/dashboard_assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>public/dashboard_assets/plugins/countdown/jquery.countdown.min.js"></script>
        <script src="//maps.google.com/maps/api/js?sensor=true"></script> <!-- Google Maps -->
        <script src="https://google-maps-utility-library-v3.googlecode.com/svn-history/r391/trunk/markerwithlabel/src/markerwithlabel.js"></script>
        <script src="<?=base_url()?>public/dashboard_assets/plugins/google-maps/gmaps.min.js"></script>  <!-- Google Maps Easy -->
        <script src="<?=base_url()?>public/dashboard_assets/plugins/backstretch/backstretch.min.js"></script>
        <script src="<?=base_url()?>public/dashboard_assets/js/pages/coming_soon.js"></script>
    </body>
</html>