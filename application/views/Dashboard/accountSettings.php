<?php $session=  $this->session->all_userdata();?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="<?=base_url()?>public/dashboard_assets/css/style.css" rel="stylesheet">
<link href="<?=base_url()?>public/dashboard_assets/css/ui.css" rel="stylesheet">
<link href="<?=base_url()?>public/dashboard_assets/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
<script type="text/javascript">
    function f2() {
        alert("ok");
        var email = $("input#email").val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "/Dashboard/reemail",
            data: {email: email},
            success: function(res) {
                alert(res);
                if(res){
                    jQuery("div#test1").show();
                    jQuery("div#value1").html(" email has been changed");
                }
                else{
                    jQuery("div#test1").show();
                    jQuery("div#value1").html("email is empty");
                }
            }
        });
    }
    function f3() {
        alert("ok");
        var oldpwd = $("input#oldpwd").val();
        var newpwd = $("input#newpwd").val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "/Dashboard/repwd",
            dataType: 'json',
            data: {old: oldpwd ,New:newpwd},
            success: function(res) {
                if(res){
                    jQuery("div#test").show();
                    jQuery("div#value").html("password has been changed");
                }
                else{
                    jQuery("div#test").show();
                    jQuery("div#value").html("old password is incorrect");
                }
            }
        });
    }
    function f1() {
        alert("ok");
        var user_name = $("input#uName").val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "/Dashboard/redata",
            dataType: 'json',
            data: {name: user_name},
            success: function(res) {
                alert(res);
                if(res){
                    jQuery("div#test2").show();
                    jQuery("div#value2").html(" username has been changed");
                }
                else{
                    jQuery("div#test2").show();
                    jQuery("div#value2").html("username is empty");
                }
            }
        });
    }
</script>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-wizard">
    <div class="header">
        <h2>Account <strong>Settings</strong></h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header bg-dark">
                    <p style="font-size:15px;" class="panel-title">Update or delete your jErrors user account</p>
                </div>
                <div class="panel-content bg-dark">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form class="form-horizontal" role="form" novalidate="novalidate" action="<?=site_url('Dashboard/projectIntegration')?>" method="post">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        Name
                                    </label>
                                    <div class="col-sm-9 prepend-icon">
                                        <input name="my" class="form-control" aria-required="true" id="uName" required="" type="text" placeholder="Enter Project Name" minlength="3" >
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <div class="pull-right">
                                            <input class="btn btn-embossed btn-primary m-t-10 m-b-40" id="create" type="button" value="Update/Change Name" disabled="disabled" onclick="f1()">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <form class="form-horizontal" role="form" novalidate="novalidate" action="<?=site_url('Dashboard/projectIntegration')?>" method="post">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        Email
                                    </label>
                                    <div class="col-sm-9 prepend-icon">
                                        <input name="my" class="form-control" aria-required="true" id="projName" required="" type="text" placeholder="Enter Project Name" minlength="3" >
                                        <i class="icon-envelope"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <div class="pull-right">
                                            <input class="btn btn-embossed btn-primary m-t-10 m-b-40" id="create" type="submit" value="Update/Change Email" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <form class="form-horizontal" role="form" novalidate="novalidate" action="<?=site_url('Dashboard/projectIntegration')?>" method="post">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        Old Password
                                    </label>
                                    <div class="col-sm-9 prepend-icon">
                                        <input name="my" class="form-control" aria-required="true" id="projName" required="" type="text" placeholder="Enter Project Name" minlength="3" >
                                        <i class="icon-lock"></i>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        New Password
                                    </label>
                                    <div class="col-sm-9 prepend-icon">
                                        <input name="my" class="form-control" aria-required="true" id="projName" required="" type="text" placeholder="Enter Project Name" minlength="3" >
                                        <i class="icon-lock"></i>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <div class="pull-right">
                                            <input class="btn btn-embossed btn-primary m-t-10 m-b-40" id="create" type="submit" value="Update/Change Password" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->
