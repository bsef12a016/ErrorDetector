    
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url(<?=base_url()?>public/assets/base/img/content/backgrounds/bg-37.jpg)">
        <div class="container" style="margin-top:40px;">
            <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim">Contect Us</h3>
                    <h4 class="c-font-white c-font-thin c-opacity-07">
			----------------------
                    </h4>
                </div>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
        
    <!-- BEGIN: CONTENT/CONTACT/FEEDBACK-1 -->
    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <div class="c-content-feedback-1 c-option-1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="c-contact">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">Keep in touch</h3>
                                <div class="c-line-left">
                                </div>
                                <p class="c-font-lowercase">
                                    Our helpline is always open to receive any inquiry or feedback. Please feel free to drop us an email from the form below and we will get back to you as soon as we can.
                                </p>
                            </div>
                            <form action="<?=site_url('Home/sendMail')?>" method="post">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="Your Name" class="form-control c-square c-theme input-lg" required>
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" placeholder="Your Email" class="form-control c-square c-theme input-lg" required>
                                </div>
                                <div class="form-group">
                                    <input name="subject" type="text" placeholder="Subject" class="form-control c-square c-theme input-lg"required>
                                </div>
                                <div class="form-group">
                                    <textarea rows="8" name="message" required placeholder="Write comment here ..." class="form-control c-theme c-square input-lg"></textarea>
                                </div>
                                <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: CONTENT/CONTACT/FEEDBACK-1 -->
        
    <!-- END: PAGE CONTENT -->
</div>
<!-- END: PAGE CONTAINER -->