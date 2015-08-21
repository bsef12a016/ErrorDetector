<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-wizard">
    <div class="header">
        <h2>Project <strong>Integration</strong></h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header bg-dark">
                    <p style="font-size:15px;" class="panel-title">Detection libraries enable us to capture data on errors in your application.
                        No matter which framework you use, our library is lightweight,
                        won't affect performance, and are easy to install.
                        Installing the JS detection library.</strong></p>
                </div>
                <div class="panel-content bg-dark">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group" style="margin-left:60px;">
                                    <code data-language="html" class="">
                                        <span class="">
                                            <span class="">&lt;</span><span class="">script</span>
                                        </span>
                                        <?php
                                        $session=  $this->session->all_userdata();
                                        
                                        ?>
                                        <span class="">src</span><span class="">=</span><span class="">"</span><span class="">Link of our JS Detection Library</span><span class="">"</span>
                                        <span class="">data-apikey</span><span class="">=</span><span class="">"</span><span class=""><?=$session["projapikey"]?></span><span class="">"</span><span class="">></span>
                                        <span class="">
                                            <span class="">&lt;</span><span class="">/</span><span class="">script</span>
                                        </span><span class="">&gt;</span>
                                    </code>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <div class="pull-right">
                                            <a href="<?= site_url('Dashboard/userDashboard')?>"><button class="btn btn-embossed btn-primary m-t-20" type="submit">View Dashboard</button></a>
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