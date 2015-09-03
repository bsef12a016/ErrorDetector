
<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-wizard">
    <div class="header">
        <h2>Account <strong>Settings</strong></h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header bg-dark">
                    <p style="font-size:15px;" class="panel-title">Update or delete your SNIK user account</p>
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
                                        <input name="my" class="form-control" aria-required="true" id="projName" required="" type="text" placeholder="Enter Project Name" minlength="3" >
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <div class="pull-right">
                                            <input class="btn btn-embossed btn-primary m-t-10 m-b-40" id="create" type="submit" value="Update/Change Name" disabled="disabled">
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
