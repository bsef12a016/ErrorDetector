<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-thin">
    <div class="row">
                    <?php
                    foreach ($projects as $value) {
                        $href = 'Dashboard/userDashboard/';
                        $href .= $value->u_id;
                        $href .= '/';
                        $href .= $value->id;
                    ?>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-header bg-dark">
                    <a href="<?= site_url($href) ?>"><h3><strong><?= $value->name?></strong></h3></a>
                </div>
                <div class="panel-content">
                    <p><h3 style="margin:0px;"><?= $value->creation_date ?></h3></p>
                    <!--<p>Error Count</p>-->
                </div>
            </div>
        </div>
                    <?php
                    }
                    ?>
        <!--                    <div class="col-md-4">
                                <div class="panel">
                                    <div class="panel-header bg-dark">
                                        <h3><strong>Project Name</strong></h3>
                                    </div>
                                    <div class="panel-content">
                                        <p><h3 style="margin:0px;">Created Date</h3></p>
                                        <p>Error Count</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel">
                                    <div class="panel-header bg-dark">
                                        <h3><strong>Project Name</strong></h3>
                                    </div>
                                    <div class="panel-content">
                                        <p><h3 style="margin:0px;">Created Date</h3></p>
                                        <p>Error Count</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel">
                                    <div class="panel-header bg-dark">
                                        <h3><strong>Project Name</strong></h3>
                                    </div>
                                    <div class="panel-content">
                                        <p><h3 style="margin:0px;">Created Date</h3></p>
                                        <p>Error Count</p>
                                    </div>
                                </div>
                            </div>-->
    </div>
</div>
<!-- END PAGE CONTENT -->
    
    
<div class="row">
    <div class="col-lg-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="icon-cloud-upload"></i> File <strong>Upload</strong></h3>
            </div>
            <div class="panel-content">
                <div class="row">
                    <div class="col-sm-5">
                        <h3>File &amp; Image <strong>Upload</strong></h3>
                        <form enctype="multipart/form-data" action="<?=site_url('Dashboard/uploadpic')?>" method="post">
<!--                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <p><strong>Image uploader</strong></p>
                                <div class="fileinput-new thumbnail">
                                    <img data-src="" src="<?=base_url()?>public/dashboard_assets/images/gallery/3.jpg" class="img-responsive" alt="gallery 3">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image...</span><span class="fileinput-exists">Change</span>-->
                                        <input type="file" name="pic">
                                        <input type="submit" name="pic">
<!--                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>