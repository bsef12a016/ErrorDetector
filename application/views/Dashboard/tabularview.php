<?php
$session=  $this->session->all_userdata();
?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="header">
        <h2><strong>Tabular </strong> View </h2>
    </div>
    <div class="row">
        <div class="col-md-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="icon-bulb"></i> <strong>Filter </strong> with <strong>Text</strong> Inputs in <strong>Header</strong></h3>
                </div>
                <div class="panel-content">
                    <table class="table table-hover table-dynamic filter-head">
                        <thead>
                            <tr>
                                <th>Client IP</th>
                                <th>Message</th>
                                <th>Browser</th>
                                <th>Project Root</th>
                                <th>Web Page Url</th>
                                <th>File Url</th>
                                <th>Row #</th>
                                <th>Column #</th>
                                <th>Last Occurence</th>
                                <th>User Agent</th>
                            </tr>
                        </thead>
                        <tbody>
                               <?php
                                $status = FALSE;
                                foreach ($errors as $value) {
                                ?>
                            <tr>
                                <td><?= $value->clientIP ?></td>
                                <td><?= $value->message ?></td>
                                <td><?= $value->browswer ?></td>
                                <td><?= $value->projectRoot ?></td>
                                <td><?= $value->webPageUrl ?></td>
                                <td><?= $value->fileUrl ?></td>
                                <td><?= $value->rowNum ?></td>
                                <td><?= $value->colNum ?></td>
                                <td><?= $value->lastOccurence ?></td>
                                <td><?= $value->userAgent ?></td>
                            </tr>
                               <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="copyright">
            <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2015 </span>
                <span>jError's</span>.
                <span>All rights reserved. </span>
            </p>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->
<?php
    $href_table = 'Dashboard/tabularview/';
    $href_table .= $session[USER_ID];
    $href_table .= '/';
    $href_table .= $session[PROJECT_ID];
    ?>
<script>
    (function myFunction() {
        setTimeout(function(){
            window.location = "<?= site_url($href_table)?>";
        }, 300000);
    })();    
    
</script>