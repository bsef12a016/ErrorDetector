
<!-- BEGIN PAGE CONTENT -->
            <div class="page-content page-wizard">
                <div class="header">
                    <h2>Add <strong>Project</strong></h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-header bg-dark">
                                <p style="font-size:15px;" class="panel-title">Projects represent a single application that SNIK monitors for errors. We recommend creating a project for monitoring JAVASCRIPT error's in your application.</strong></p>
                            </div>
                            <div class="panel-content bg-dark">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <form class="form-horizontal" role="form" novalidate="novalidate" action="<?=site_url('Dashboard/projectIntegration')?>" method="post">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">
                                                    Project Name
                                                </label>
                                                <div class="col-sm-9 prepend-icon">
                                                    <input name="my" class="form-control" aria-required="true" id="projName" required="" type="text" placeholder="Enter Project Name" minlength="3" >
                                                    <i class="icon-globe"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9 col-sm-offset-3">
                                                    <div class="pull-right">
                                                        <input class="btn btn-embossed btn-primary m-t-20" id="create" type="submit" value="Create Project" disabled="disabled">
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
