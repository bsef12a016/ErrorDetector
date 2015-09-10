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
                    <a class="hidden" id="dropdownMenu1" data-toggle="dropdown">
                        <i class="icon-settings"></i>
                    </a>
                    <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
                        <li>
                            <a href="#">Action</a>
                        </li>
                        <li>
                            <a href="#">Another action</a>
                        </li>
                        <li>
                            <a href="#">Something else here</a>
                        </li>
                    </ul>
                    <a title="Pop Out/In" class="panel-popout hidden tt" href="#"><i class="icons-office-58"></i></a>
                    <a class="panel-maximize hidden" href="#"><i class="icon-size-fullscreen"></i></a>
                    <a class="panel-toggle" href="#"><i class="fa fa-angle-down"></i></a>
                    <a class="panel-close" href="#"><i class="icon-trash"></i></a>
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
                                        $href .= $session["userID"];
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
        
    <!--                <div class="row">
                        <div class="col-lg-12 portlets">
                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Showing all open <strong>Errors</strong></h3>
                                            <div class="panel-group panel-accordion dark-accordion" id="accordion2">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4>
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2">
                                                                Collapsible Group Item #1
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne2" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                            </div>
                                        </div>
                                            
                                         <div class="col-md-12">
                                        <?php
                                        $status = FALSE;
//                                        foreach ($errors as $value) {
//                                            $status=TRUE;
//                                            break;
                                        ?>
                                            <h3>Showing all open <strong>Errors</strong></h3>
                                            <div class="panel-group panel-accordion dark-accordion" id="accordion2">                                
                                        <?php
                                            foreach ($errors as $value) {
                                                $message  = $value->message;
                                                $pieces = explode(":", $message);
                                                $link_2 = '<strong>';
                                                $link_2 .=  $pieces[0];
                                                $link_2 .= '</strong>/';
                                                $link_2 .= $value->fileUrl;
                                                    
                                                $status=TRUE;
                                                $href="#collapse";
                                                $href .=$value->id;
                                                $href .=2;
                                                $id="collapse";
                                                $id .=$value->id;
                                                $id .=2;
                                                    
                                        ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4>
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="<?= $href ?>">
                                                            <?= $link_2 ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="<?= $id ?>" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="row column-seperation">
                                                                <div class="col-md-12">
                                                                    <h3><strong><?= $pieces[0] ?> </strong><?= $pieces[1]?></h3>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>Error File Url: </strong><?= $value->fileUrl;?></h4>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>Webpage Url: </strong><?= $value->webPageUrl;?></h4>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>Row #: </strong><?= $value->rowNum;?></h4>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>Column #: </strong><?= $value->colNum;?></h4>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>Client IP: </strong><?= $value->clientIP;?></h4>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>Webpage Url: </strong><?= $value->webPageUrl;?></h4>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>Browser name: </strong><?= $value->browswer;?></h4>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>Language: </strong><?= $value->language;?></h4>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>User Agent: </strong><?= $value->userAgent;?></h4>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>Project Root: </strong><?= $value->projectRoot;?></h4>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>Webpage Url: </strong><?= $value->webPageUrl;?></h4>
                                                                    <h4 style="font-size: 15px; margin: 10px;"><strong>Last Occurence: </strong><?= $value->lastOccurence;?></h4>
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                            <?php
                                            }
                                            if($status==FALSE){
                                                echo '<p><h3 style="margin:0px;">No Errors existing currently</h3></p>';
                                                }
                                            ?>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>-->
    <!-- END PAGE CONTENT -->
        
        
    <div class="row">
        <div class="col-md-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3>Colored  <strong>version</strong></h3>
                </div>
                <div class="panel-content">
                    <ul class="nav nav-tabs nav-primary">
                        <li class=""><a href="#tab2_1" data-toggle="tab"><i class="icon-home"></i> Home</a></li>
                        <li class="active"><a href="#tab2_2" data-toggle="tab"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="#tab2_3" data-toggle="tab"><i class="icon-cloud-download"></i> Other Tab</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="tab2_1">
                            <div class="row">
                                <h3>"Sooner or later, those who win are those who think they <strong>can</strong>."</h3>
                                <div class="col-md-12">
                                    <h3>Showing all open <strong>Errors</strong></h3>
                                    <div class="panel-group panel-accordion dark-accordion" id="accordion2">                                
                                        <?php
                                        foreach ($errors as $value) {
                                            $message  = $value->message;
                                                $pieces = explode(":", $message);
                                                $link_2 = '<strong>';
                                                $link_2 .=  $pieces[0];
                                                $link_2 .= '</strong>/';
                                                $link_2 .= $value->fileUrl;
                                                    
                                                $status=TRUE;
                                                $href="#collapse";
                                                $href .=$value->id;
                                                $href .=2;
                                                $id="collapse";
                                                $id .=$value->id;
                                                $id .=2;
                                                    
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="<?= $href ?>">
                                                            <?= $link_2 ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="<?= $id ?>" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="row column-seperation">
                                                        <div class="col-md-12">
                                                            <h3><strong><?= $pieces[0] ?> </strong><?= $pieces[1]?></h3>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>Error File Url: </strong><?= $value->fileUrl;?></h4>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>Webpage Url: </strong><?= $value->webPageUrl;?></h4>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>Row #: </strong><?= $value->rowNum;?></h4>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>Column #: </strong><?= $value->colNum;?></h4>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>Client IP: </strong><?= $value->clientIP;?></h4>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>Webpage Url: </strong><?= $value->webPageUrl;?></h4>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>Browser name: </strong><?= $value->browswer;?></h4>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>Language: </strong><?= $value->language;?></h4>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>User Agent: </strong><?= $value->userAgent;?></h4>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>Project Root: </strong><?= $value->projectRoot;?></h4>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>Webpage Url: </strong><?= $value->webPageUrl;?></h4>
                                                            <h4 style="font-size: 15px; margin: 10px;"><strong>Last Occurence: </strong><?= $value->lastOccurence;?></h4>
                                                        </div>
                                                    </div> 
                                                </div> 
                                            </div> 
                                            <?php
                                            }
                                            if($status==FALSE){
                                                echo '<p><h3 style="margin:0px;">No Errors existing currently</h3></p>';
                                                }
                                            ?>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade active in" id="tab2_2">
                            <h3>"Sooner or later, those who win are those who think they <strong>can</strong>."</h3>
                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial.</p>
                        </div>
                        <div class="tab-pane fade" id="tab2_3">
                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
