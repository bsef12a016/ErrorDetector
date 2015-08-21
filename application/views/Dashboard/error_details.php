 <!-- BEGIN PAGE CONTENT -->
            <div class="page-content page-thin">
               <div class="row">
                   <div class="col-md-12 portlets ui-sortable">
                       <div class="panel">
                           <div class="panel-header panel-controls">
                               <h3><strong>Error</strong> Details</h3>
                               <div class="control-btn"><a class="panel-reload hidden" href="#"><i class="icon-reload"></i></a><a class="hidden" id="dropdownMenu1" data-toggle="dropdown"><i class="icon-settings"></i></a><ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"><li><a href="#">Action</a></li><li><a href="#">Another action</a></li><li><a href="#">Something else here</a></li></ul><a title="Pop Out/In" class="panel-popout hidden tt" href="#"><i class="icons-office-58"></i></a><a class="panel-maximize hidden" href="#"><i class="icon-size-fullscreen"></i></a><a class="panel-toggle" href="#"><i class="fa fa-angle-down"></i></a><a class="panel-close" href="#"><i class="icon-trash"></i></a></div>
                           </div>
                           <?php
                           foreach ($error as $value) {
                               $pieces = explode(":", $value->message);
                           ?>
                           <div class="panel-content">
                               <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tab1_1" data-toggle="tab">Error</a></li>
                                   <li><a href="#tab1_2" data-toggle="tab">Request</a></li>
                                   <li><a href="#tab1_3" data-toggle="tab">Device</a></li>
                                   <li><a href="#tab1_4" data-toggle="tab">Metadata</a></li>
                               </ul>
                               <div class="tab-content">
                                   <div class="tab-pane fade active in" id="tab1_1">
                                       <div class="row column-seperation">
                                           <div class="col-md-12">
                                               <h3><strong><?= $pieces[0] ?> </strong><?= $pieces[1]?></h3>
                                               <h4 style="font-size: 15px;"><strong>Error File Url: </strong><?= $value->fileUrl;?></h4>
                                               <h4 style="font-size: 15px;"><strong>Webpage Url: </strong><?= $value->webPageUrl;?></h4>
                                               <h4 style="font-size: 15px;"><strong>Row #: </strong><?= $value->rowNum;?></h4>
                                               <h4 style="font-size: 15px;"><strong>Column #: </strong><?= $value->colNum;?></h4>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="tab-pane fade" id="tab1_2">
                                       <h4 style="font-size: 15px;"><strong>Client IP: </strong><?= $value->clientIP;?></h4>
                                       <h4 style="font-size: 15px;"><strong>Webpage Url: </strong><?= $value->webPageUrl;?></h4>
                                   </div>
                                   <div class="tab-pane fade" id="tab1_3">
                                       <h4 style="font-size: 15px;"><strong>Browser name: </strong><?= $value->browswer;?></h4>
                                       <h4 style="font-size: 15px;"><strong>Language: </strong><?= $value->language;?></h4>
                                       <h4 style="font-size: 15px;"><strong>User Agent: </strong><?= $value->userAgent;?></h4>
                                   </div>
                                   <div class="tab-pane fade" id="tab1_4">
                                       <h4 style="font-size: 15px;"><strong>Project Root: </strong><?= $value->projectRoot;?></h4>
                                       <h4 style="font-size: 15px;"><strong>Webpage Url: </strong><?= $value->webPageUrl;?></h4>
                                       <h4 style="font-size: 15px;"><strong>Last Occurence: </strong><?= $value->lastOccurence;?></h4>
                                   </div>
                               </div>
                           </div>
                           
                           <?php
                           
                           }
                           ?>
                       </div>
                   </div>
               </div>
            </div>
            <!-- END PAGE CONTENT -->