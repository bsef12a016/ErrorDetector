    
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url(<?=base_url()?>public/assets/base/img/content/backgrounds/bg-37.jpg)">
        <div class="container" style="margin-top:40px;">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim">Features</h3>
                <h4 class="c-font-white c-font-thin c-opacity-07">
                    Page Sub Title Goes Here
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
                            <form action="<?=site_url('Home/sendMail')?>">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="Your Name" class="form-control c-square c-theme input-lg" required>
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" placeholder="Your Email" class="form-control c-square c-theme input-lg" required>
                                </div>
                                <div class="form-group">
                                    <input name="phoneNum" type="text" placeholder="Contact Phone" class="form-control c-square c-theme input-lg"required>
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
                            <a href="<?php echo site_url('Home/login')?>" class="btn btn-lg c-btn-square c-btn-border-2x c-btn-white c-btn-sbold c-btn-uppercase">Start your free trial</a>
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
    
    
<!--    
    
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><META http-equiv="Content-Type" content="text/html; charset=utf-8"></head><body><form name="0.1_contactform" method="post" action="http://send_form_email.php" target="_blank" onsubmit="try {return window.confirm(&quot;You are submitting information to an external page.\nAre you sure?&quot;);} catch (e) {return false;}">
            <table width="450px">
                <tr>
                    <td valign="top">
                        <label>First Name *</label>
                    </td>
                    <td valign="top">
                        <input type="text" name="first_name" maxlength="50" size="30">
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <label>Last Name *</label>
                    </td>
                    <td valign="top">
                        <input type="text" name="last_name" maxlength="50" size="30">
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <label>Email Address *</label>
                    </td>
                    <td valign="top">
                        <input type="text" name="email" maxlength="80" size="30">
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <label>Telephone Number</label>
                    </td>
                    <td valign="top">
                        <input type="text" name="telephone" maxlength="30" size="30">
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <label>Comments *</label>
                    </td>
                    <td valign="top">
                        <textarea name="comments" maxlength="1000" cols="25" rows="6"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center">
                        <input type="submit" value="Submit">   <a href="http://www.freecontactform.com/email_form.php" target="_blank">Email Form</a>
                    </td>
                </tr>
            </table>
        </form>
        <br>&quot;;
        echo $error.&quot;<br><br>&quot;;
        echo &quot;Please go back and fix these errors.<br><br>&quot;;
        die();
        }
        // validation expected data exists
        if(!isset($_POST[&#39;first_name&#39;]<wbr>) ||
        !isset($_POST[&#39;last_name&#39;]) ||
        !isset($_POST[&#39;email&#39;]) ||
        !isset($_POST[&#39;telephone&#39;]) ||
        !isset($_POST[&#39;comments&#39;])) {
        died(&#39;We are sorry, but there appears to be a problem with the form you submitted.&#39;);       
        }
        $first_name = $_POST[&#39;first_name&#39;]; // required
        $last_name = $_POST[&#39;last_name&#39;]; // required
        $email_from = $_POST[&#39;email&#39;]; // required
        $telephone = $_POST[&#39;telephone&#39;]; // not required
        $comments = $_POST[&#39;comments&#39;]; // required
            
        $error_message = &quot;&quot;;
        $email_exp = &#39;/^[A-Za-z0-9._%-]+@[A-Za-z0-<wbr>9.-]+\.[A-Za-z]{2,4}$/&#39;;
            
        if(!preg_match($email_exp,$<wbr>email_from)) {
        $error_message .= &#39;The Email Address you entered does not appear to be valid.<br>&#39;;
        }
        $string_exp = &quot;/^[A-Za-z .&#39;-]+$/&quot;;
        if(!preg_match($string_exp,$<wbr>first_name)) {
        $error_message .= &#39;The First Name you entered does not appear to be valid.<br>&#39;;
        }
        if(!preg_match($string_exp,$<wbr>last_name)) {
        $error_message .= &#39;The Last Name you entered does not appear to be valid.<br>&#39;;
        }
        if(strlen($comments) &lt; 2) {
        $error_message .= &#39;The Comments you entered do not appear to be valid.<br>&#39;;
        }
        if(strlen($error_message) &gt; 0) {
        died($error_message);
        }
        $email_message = &quot;Form details below.\n\n&quot;;
            
        function clean_string($string) {
        $bad = array(&quot;content-type&quot;,&quot;bcc:&quot;,&quot;<wbr>to:&quot;,&quot;cc:&quot;,&quot;href&quot;);
        return str_replace($bad,&quot;&quot;,$string);
        }
            
        $email_message .= &quot;First Name: &quot;.clean_string($first_name).&quot;\<wbr>n&quot;;
        $email_message .= &quot;Last Name: &quot;.clean_string($last_name).&quot;\<wbr>n&quot;;
        $email_message .= &quot;Email: &quot;.clean_string($email_from).&quot;\<wbr>n&quot;;
        $email_message .= &quot;Telephone: &quot;.clean_string($telephone).&quot;\<wbr>n&quot;;
        $email_message .= &quot;Comments: &quot;.clean_string($comments).&quot;\n&quot;<wbr>;
            
        // create email headers
        $headers = &#39;From: &#39;.$email_from.&quot;\r\n&quot;.
        &#39;Reply-To: &#39;.$email_from.&quot;\r\n&quot; .
        &#39;X-Mailer: PHP/&#39; . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);  
        ?&gt;
        Thank you for contacting us. We will be in touch with you very soon.
    </body>
</html>-->