<!-- BEGIN: CONTENT/SLIDERS/TESTIMONIALS-3 -->
    <div class="c-content-box c-size-lg c-bg-parallax" style="background-image: url(<?=base_url()?>public/assets/base/img/content/backgrounds/bg-3.jpg)">
        <div class="container">
            <!-- Begin: testimonials 1 component -->
            <div class="c-content-testimonials-1" data-slider="owl" data-single-item="true" data-auto-play="5000">
                <!-- Begin: Title 1 component -->
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-white c-font-uppercase c-font-bold">Make more customers happy</h3>
                    <div class="c-line-center c-theme-bg">
                    </div>
                </div>
                <!-- End-->
                <!-- Begin: Owlcarousel -->
                <div class="owl-carousel owl-theme c-theme">
                    <div class="item">
                        <div class="c-testimonial">
                            <p>
                                Everything you need to avoid bad user experience and make your site awesome for your users.
                            </p>
                            <h3>
                              <!--  <a href="<?php echo site_url('Home/login')?>" class="btn btn-lg c-btn-square c-btn-border-2x c-btn-white c-btn-sbold c-btn-uppercase">Start your free trial</a>-->
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- End-->
            </div>
            <!-- End-->
        </div>
    </div>
    <!-- END: CONTENT/SLIDERS/TESTIMONIALS-3 -->
 <a name="footer"></a>
    <footer class="c-layout-footer c-layout-footer-3 c-bg-dark">
        <div class="c-prefooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="c-container c-first">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold c-font-white">jErrors<span class="c-theme-font"></span></h3>
                                <div class="c-line-left hide">
                                </div>
                                <p class="c-text">

                                </p>
                            </div>
                            <ul class="c-links">
                                <li>
                                    <a href="<?php echo site_url('Home/index')?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('Home/about')?>">About</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('Home/contact')?>">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="c-container c-last">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold c-font-white">Find us</h3>
                                <div class="c-line-left hide">
                                </div>
                                <p>
                                </p>
                            </div>
                            <ul class="c-socials">
                                <li>
                                    <a href="#"><i class="icon-social-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-social-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-social-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-social-tumblr"></i></a>
                                </li>
                            </ul>
                            <ul class="c-address">
                                <li>
                                    <i class="icon-pointer c-theme-font"></i>PUCIT, Old Campus Mall Road Lahore Pakistan
                                </li>
                                <li>
                                    <i class="icon-call-end c-theme-font"></i> +923244456881
                                </li>
                                <li>
                                    <i class="icon-envelope c-theme-font"></i> jerrors@gamil.com
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-postfooter">
            <div class="container">
                <p class="c-font-oswald c-font-14">
                    Copyright &copy; jErrors Inc.
                </p>
            </div>
        </div>
    </footer>
    <!-- END: LAYOUT/FOOTERS/FOOTER-5 -->
    <!-- BEGIN: LAYOUT/FOOTERS/GO2TOP -->
    <div class="c-layout-go2top">
        <i class="icon-arrow-up"></i>
    </div>
    <!-- END: LAYOUT/FOOTERS/GO2TOP -->
    <!-- BEGIN: LAYOUT/BASE/BOTTOM -->
    <!-- BEGIN: CORE PLUGINS -->
    <!--[if lt IE 9]>
        <script src="../<?=base_url()?>public/assets/global/plugins/excanvas.min.js"></script>
        <![endif]-->
    <script src="<?=base_url()?>public/assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- END: CORE PLUGINS -->
    <!-- BEGIN: LAYOUT PLUGINS -->
    <script src="<?=base_url()?>public/assets/plugins/revo-slider/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assets/plugins/revo-slider/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assets/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assets/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
    <!-- END: LAYOUT PLUGINS -->
    <!-- BEGIN: THEME SCRIPTS -->
    <script src="<?=base_url()?>public/assets/base/js/components.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assets/base/js/app.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            App.init(); // init core

            // init main slider
            var slider = $('.c-layout-revo-slider .tp-banner');
            var cont = $('.c-layout-revo-slider .tp-banner-container');
            var api = slider.show().revolution({
                delay: 15000,
                startwidth: 1170,
                startheight: 620,
                navigationType: "hide",
                navigationArrows: "solo",
                touchenabled: "on",
                onHoverStop: "on",
                keyboardNavigation: "off",
                navigationStyle: "circle",
                navigationHAlign: "center",
                navigationVAlign: "bottom",
                spinner: "spinner2",
                fullScreen: "on",
                fullScreenAlignForce: "on",
                fullScreenOffsetContainer: (App.getViewPort().width < App.getBreakpoint('md') ? '.c-layout-header' : ''),
                shadow: 0,
                fullWidth: "off",
                forceFullWidth: "off",
                hideTimerBar: "on",
                hideThumbsOnMobile: "on",
                hideNavDelayOnMobile: 1500,
                hideBulletsOnMobile: "on",
                hideArrowsOnMobile: "on",
                hideThumbsUnderResolution: 0
            });
        });
    </script>
    <!-- END: THEME SCRIPTS -->
    <!-- END: LAYOUT/BASE/BOTTOM -->
</body>
</html>