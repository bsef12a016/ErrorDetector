</div>
<!-- END MAIN CONTENT -->
<?php
 $session=  $this->session->all_userdata();
?>
</section>

<!-- BEGIN SEARCH -->
<div id="morphsearch" class="morphsearch">
    <form class="morphsearch-form">
        <input class="morphsearch-input" type="search" placeholder="Search..." />
        <button class="morphsearch-submit" type="submit">Search</button>
    </form>
    <!-- morphsearch-content -->
    <span class="morphsearch-close"></span>
</div>
<!-- END SEARCH -->
<!-- BEGIN PRELOADER -->
<div class="loader-overlay">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<div id='usrname' style='display: none'>
    <input name="usrname1" class="form-control" aria-required="true"  id="uName1" required type="text" value=" <?php echo $session[USER_NAME] ?>" placeholder="Enter User Name" minlength="3"  required >                                         
</div>
<div id='email' style='display: none'>
    <input name="email2" class="form-control" aria-required="true"  id="uemail1" required type="text" value=" <?php echo $session['email'] ?>" placeholder="Enter User Name" minlength="3"  required >                                        
</div>
<!-- END PRELOADER -->
<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>
<script src="<?=base_url()?>public/dashboard_assets/plugins/jquery/jquery-1.11.1.min.js"></script>
<script src="<?=base_url()?>public/assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/dashboard_assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url()?>public/dashboard_assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
<script src="<?=base_url()?>public/dashboard_assets/plugins/gsap/main-gsap.min.js"></script>
<script src="<?=base_url()?>public/dashboard_assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>public/dashboard_assets/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/translate/jqueryTranslator.min.js"></script> <!-- Translate Plugin with JSON data -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
<script src="<?=base_url()?>public/dashboard_assets/js/builder.js"></script> <!-- Theme Builder -->
<script src="<?=base_url()?>public/dashboard_assets/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
<script src="<?=base_url()?>public/dashboard_assets/js/application.js"></script> <!-- Main Application Script -->
<script src="<?=base_url()?>public/dashboard_assets/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
<script src="<?=base_url()?>public/dashboard_assets/js/widgets/notes.js"></script> <!-- Notes Widget -->
<script src="<?=base_url()?>public/dashboard_assets/js/quickview.js"></script> <!-- Chat Script -->
<script src="<?=base_url()?>public/dashboard_assets/js/pages/search.js"></script> <!-- Search Script -->
<!-- BEGIN PAGE SCRIPT -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script> <!-- Inline Edition X-editable -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script> <!-- Context Menu -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
<script src="<?=base_url()?>public/dashboard_assets/js/widgets/todo_list.js"></script>
<script src="<?=base_url()?>public/dashboard_assets/plugins/metrojs/metrojs.min.js"></script> <!-- Flipping Panel -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-chartjs/Chart.min.js"></script>  <!-- ChartJS Chart -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-highstock/js/highstock.min.js"></script> <!-- financial Charts -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-highstock/js/modules/exporting.min.js"></script> <!-- Financial Charts Export Tool -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/skycons/skycons.min.js"></script> <!-- Animated Weather Icons -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/simple-weather/jquery.simpleWeather.js"></script> <!-- Weather Plugin -->
<script src="<?=base_url()?>public/dashboard_assets/js/widgets/widget_weather.js"></script>
<script src="<?=base_url()?>public/dashboard_assets/js/pages/dashboard.js"></script>
<!-- END PAGE SCRIPT -->
<!-- BEGIN PAGE SCRIPTS -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/jquery-validation/jquery.validate.js"></script> <!-- Form Validation -->
<!--tabular view-->
<script src="<?=base_url()?>public/dashboard_assets/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
<script src="<?=base_url()?>public/dashboard_assets/js/pages/table_dynamic.js"></script>
<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-highstock/js/highstock.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-highstock/js/modules/exporting.js" type="text/javascript"></script>
<!--graph page-->
<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-highstock/js/highstock.min.js"></script> <!-- Financial Charts -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-highstock/js/highcharts-more.min.js"></script> <!-- Financial Charts additional -->
<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-highstock/js/modules/exporting.min.js"></script> <!-- Financial Charts export tool -->
<script src="<?=base_url()?>public/dashboard_assets/js/pages/charts_finance.js"></script>
<script src="<?=base_url()?>public/dashboard_assets/plugins/dropzone/dropzone.min.js"></script>  <!-- Upload Image & File in dropzone -->
<!-- END PAGE SCRIPTS -->
<script>
    var a=false;
    var b=false;
    $("#projURL").on("keydown",function (e){
        
        var val1=$("#projURL").val();
        
        if(val1){
            a=true;
        }else{
            a=false;
            $("#create").prop('disabled',true);
        }
        proj();
    });
    $("#projName").on("keydown",function (e){
        var val=$("#projName").val();
        
        
        if(val){
            b=true;
        }else{
            b=false;
            $("#create").prop('disabled',true);
        }
        proj();
    });
    function proj()
    {
        
        if(a && b)
        {
            $("#create").prop('disabled',false);
        }
    }
    $("#seusrName").on("keyup",function (){
        var val1=$("#seusrName").val();
        var s = $("input#uName1").val();
        
        if(val1.trim()){
            if(val1.trim()===s.trim())
            {
                $("#username1").prop('disabled',true);
            }
            else
            {
                $("#username1").prop('disabled',false);
            }
        }else{
            
            $("#username1").prop('disabled',true);
        }
    });
    
    $("#emailset").on("keyup",function (){ 
        var val1=$("#emailset").val();
        var s1 = $("input#uemail1").val();
        
        if(val1){
            if(val1.trim()===s1.trim())
            {
                $("#reemail1").prop('disabled',true);
            }
            else
            {
                $("#reemail1").prop('disabled',false);
            }  
        }else{
            $("#reemail1").prop('disabled',true);
        }
    });
    x=false;
    y=false;
    $("#oldpwd").on("keydown",function (e){
        
        var val1=$("#oldpwd").val();
        
        if(val1){
            x=true;
            
        }else{
            x=false;
            $("#createacc").prop('disabled',true);
        }
        f2();
    });
    $("#newpwd").on("keydown",function (e){
        var val=$("#newpwd").val();
        
        if(val){
            
            y=true;
        }
        else{
            y=false;
            $("#createacc").prop('disabled',true);
        }
        f2();
    });
    function f2()
    {
        
        if(x && y)
        {
            $("#createacc").prop('disabled',false);
        }
    }
    function replaceemail() {
        var email = $("input#emailset").val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "/Dashboard/reemail",
            data: {email: email},
            success: function(res) {
                
                if(res)
                {
                    
                    jQuery("div#test1").show();
                    jQuery("div#value1").html(" Email has been changed");
                }
                else
                {
                    jQuery("div#test1").show();
                    jQuery("div#value1").html("Email is empty");
                }
                
            }
            
        });
    }
    function replacepwd() {
        
        var oldpwd = $("input#oldpwd").val();
        var newpwd = $("input#newpwd").val();
        
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "/Dashboard/repwd",
            dataType: 'json',
            data: {old: oldpwd ,New:newpwd},
            success: function(res) {
                
                if(res)
                {
                    
                    
                    jQuery("div#test").show();
                    jQuery("div#value").html("Password has been changed");
                    
                }
                else
                {
                    jQuery("div#test").show();
                    jQuery("div#value").html("Old password is incorrect");
                }
                
                
                
            }
            
        });
    }
    function changeUsername() {
        var user_name = $("input#seusrName").val(); 
        jQuery.ajax({
            type: "POST",
            
            url: "<?php echo base_url(); ?>" + "Dashboard/redata",
            dataType: 'json',
            data: {name: user_name},
            success: function(res) {
                
                if(res)
                {  
                    jQuery("div#test2").show();
                    jQuery("div#value2").html(" Username has been changed");
                }
                else
                {
                    jQuery("div#test2").show();
                    jQuery("div#value2").html("Username is empty");
                }
            },error:function(res) {
                alert("error");
            }
        });
    }
</script>

</script>
</body>
</html>