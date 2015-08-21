 <!-- BEGIN PAGE CONTENT -->
            <div class="page-content page-thin">
                <div class="row">
                    <?php
                    foreach ($projects as $value) {
                        $href = 'Dashboard/userDashboard/';
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