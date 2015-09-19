<?php
$session=  $this->session->all_userdata();
$status = FALSE;
?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-thin">
    <div class="col-md-12 portlets ui-sortable">
        <div class="panel">
            <div class="panel-header">
                <div class="control-btn">
                    <a class="panel-reload hidden" href="#"><i class="icon-reload"></i></a>
                    <a class="panel-maximize hidden" href="#"><i class="icon-size-fullscreen"></i></a>
                </div>
            </div>
            <div class="panel-content">
                <table class="table table-hover">
                                <?php
                                $status = FALSE;
                                foreach ($errors as $value) {
                                    $status=TRUE;
                                    break;
                                ?>
                    <thead>
                        <tr>
                            <th>
                    <h2><strong>Errors</strong></h2>
                    </th>
                    <th>Occurrences</th>
                    <th>Last occurrences</th>
                    </tr>
                    </thead>
                    
                                <?php
                                }
                                ?>
                    <tbody>
                                    <?php
                                    foreach ($errors as $value) {
                                        echo '<tr>';
                                        echo '<td>';
                                        $link = '<a href="';
                                        $href = 'Dashboard/error_details/';
                                        $href .= $session[USER_ID];
                                        $href .= '/';
                                        $href .= $value->id;
                                        $href .= '/';
                                        $href .= $value->project_id;
                                        $link .= site_url($href);
                                        $link .= '">';
                                        echo $link;
                                            
                                        $message  = $value->message;
                                        $pieces = explode(":", $message);
                                        $link_2 = '<h3 style="margin-top:0px; margin-bottom:10px;"><strong>';
                                        $link_2 .=  $pieces[0];
                                        $link_2 .='</strong>/';
                                        $link_2 .= $value->fileUrl;
                                        $link_2 .='</h3>';
                                        echo $link_2;
                                        echo $value->message;
                                        echo '</a>';
                                        echo '</td>';
                                        echo '<td>-</td>';
                                        $link_3 = '<td>';
                                        $link_3 .= $value->lastOccurence;
                                        $link_3 .= '</td>';
                                        echo $link_3;
                                        echo '</tr>';
                                        }
                                        if($status==FALSE){
                                            echo '<p><h3 style="margin:0px;">No Errors existing currently</h3></p>';
                                        }
                                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

