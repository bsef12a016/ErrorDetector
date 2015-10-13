<!-- BEGIN PAGE CONTENT -->
<?php $session=  $this->session->all_userdata();?>
<script src="<?=base_url()?>public/assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/assets/jquery.min.js" type="text/javascript"></script>
<link href="<?=base_url()?>public/dashboard_assets/css/style.css" rel="stylesheet">
<link href="<?=base_url()?>public/dashboard_assets/css/ui.css" rel="stylesheet">
<link href="<?=base_url()?>public/dashboard_assets/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
<div class="page-content page-wizard">
    <div class="header">
        <h2>Account <strong>Settings</strong></h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header bg-dark">
                    <p style="font-size:15px;" class="panel-title">Update or delete your jError's user account</p>
                </div>
                <div class="panel-content bg-dark">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Name
                                </label>
                                     <?php
                                    $session=  $this->session->all_userdata();                                    
                                     ?>
                                <div class="col-sm-9 prepend-icon">
                                    <input name="name" class="form-control" aria-required="true"  id="seusrName" required type="text" value=" <?= $session[USER_NAME] ?>" minlength="3"  required >
                                    <i class="icon-user" style="padding-left: 25px;"></i>
                                </div>
                            </div>
                            <div id='test2' style='display: none'>
                                <div id='value2'> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <div class="pull-right">
                                        <input class="btn btn-embossed btn-primary m-t-10 m-b-40" id="username1" type="button" value="Update/Change Name" onclick="changeUsername()" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Email
                                </label>
                                <div class="col-sm-9 prepend-icon">
                                    <input name="email1" class="form-control form-white email" aria-required="true" id="emailset" value= "<?php echo $session["email"] ?>" required  type="text" placeholder="Enter user email" minlength="3"  required >
                                    <i class="icon-envelope"  style="padding-left: 25px;"></i>
                                </div>
                            </div>
                            <div id='test1' style='display: none'>
                                <div id='value1'> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <div class="pull-right">
                                        <input class="btn btn-embossed btn-primary m-t-10 m-b-40" id="reemail1" type="button" value="Update/Change Email" onclick="replaceemail()" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Old Password
                                </label>
                                <div class="col-sm-9 prepend-icon">
                                    <input name="old" class="form-control" aria-required="true"  id="oldpwd" required type="password" placeholder="Enter old password" minlength="3"  required >
                                    <i class="icon-lock"  style="padding-left: 25px;"></i>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    New Password
                                </label>
                                <div class="col-sm-9 prepend-icon">
                                    <input name="new" class="form-control" aria-required="true"  id="newpwd" required type="password" placeholder="Enter new password" minlength="3"  required>
                                    <i class="icon-lock" style="padding-left: 25px;"></i>
                                </div>
                            </div>
                            <div id='test' style='display: none'>
                                <div id='value'> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <div class="pull-right">
                                        <input class="btn btn-embossed btn-primary m-t-10 m-b-40" id="createacc" type="button" value="Update/Change Password" onclick="replacepwd()" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->