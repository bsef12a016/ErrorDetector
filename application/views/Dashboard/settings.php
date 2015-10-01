<!-- BEGIN PAGE CONTENT -->
   <?php
   $session=  $this->session->all_userdata();
   $apiKey = NULL;
   $projectID = NULL;
   foreach ($projects as $value) {
       $href_delete = 'Dashboard/deleteproj1/';
       $href_delete .= $value->id;
//       $this->session->set_userdata(['projid'=>$value->id]);
//       $this->session->set_userdata(['apikey'=>$value->apikey]);
       $apiKey = $value->apikey;
       $projectID = $value->id;
       $u_id = $value->u_id;
       $href_regenerate = 'Dashboard/regeneratekey/';
       $href_regenerate .= $value->id;
       }
   ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    function regenerateApi() {
        a=confirm("This will regenerate your API key, and invalidate the existing key. Are you sure you want to do this?")
        if(a){
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Dashboard/regenerateApiKey/" + "<?= $u_id ?>" + "/" + "<?= $projectID ?>" + "/" + "<?= $apiKey ?>",
                dataType: 'json',
                success: function(res) {
                    if(res == "Key Is not Regenerated. Try again later."){
                        alert(res);
                    }else{   
                    jQuery("input#api").val(res);
                    jQuery("div#test2").show();
                    jQuery("div#value2").html(" Include new generated api key in your project \n\
                                   otherwise you will not get the errors.");
                    }
                },
                error:function(){
                    alert("ERROR");
                }
            });
        }
    }
    function deleteproject() {
        if(confirm("Do you realy want to delete Project??"))
        {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Dashboard/deleteProject/" + "<?= $u_id ?>" + "/" + "<?= $projectID ?>",
                dataType: 'json',
                success: function(res) {
                    if(res){
                        window.location.replace("Dashboard/projects");
                    }
                }   
            });
        }     
    } 
</script> 
<div class="page-content page-thin">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3> <strong>Project settings..</strong></h3>
                    <div class="control-btn"><a class="panel-reload hidden" href="#"><i class="icon-reload"></i></a><a class="hidden" id="dropdownMenu1" data-toggle="dropdown"><i class="icon-settings"></i></a><ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"><li><a href="#">Action</a></li><li><a href="#">Another action</a></li><li><a href="#">Something else here</a></li></ul><a title="Pop Out/In" class="panel-popout hidden tt" href="#"><i class="icons-office-58"></i></a><a class="panel-maximize hidden" href="#"><i class="icon-size-fullscreen"></i></a><a class="panel-toggle" href="#"><i class="fa fa-angle-down"></i></a><a class="panel-close" href="#"><i class="icon-trash"></i></a></div>
                </div>
                <div class="panel-content">
                    <div class="tab_left">
                        <ul class="nav nav-tabs nav-red">
                            <li class="active" ><a aria-expanded="false" href="#tab3_1" data-toggle="tab"><i class="icon-home"></i> General</a></li>
                            <li><a aria-expanded="false" href="#tab3_2" data-toggle="tab"><i class="icon-user"></i> Api key</a></li>
<!--                            <li ><a aria-expanded="false" href="#tab3_4" data-toggle="tab"><i class="icon-cloud-download"></i> Email notification</a></li>-->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade  active in" id="tab3_1">
                                <h2>Delete project</h2>
                                <p>Project Name: <b><?php echo ucwords($value->name);  ?></b></p>
                                <p>Once you delete this project, there is no going back.</p>
                                <input class="btn btn-embossed btn-primary m-t-20" id="submit" type="button" value="Delete Project" onclick="deleteproject()">
                            </div>
                            <div class="tab-pane fade" id="tab3_2" >
                                <p>Your Project's API key, used when configuring notifier libaries</p>
                                <input  name="api" class="form-control" id="api" type="text" value="<?= $apiKey ?>" size="40"  >
                                <input class="btn btn-embossed btn-primary m-t-20" id="re" type="button" value="Regenerate key"  onclick="regenerateApi()">
                                <div id='test2' style='display: none'>
                                    <div id='value2'> </div>
                                </div>
                            </div>
<!--                            <div class="tab-pane fade " id="tab3_4" >
                                <h1><strong>Email Notifications</strong></h1>
                                <p>  Configure personal email notifications for your projects</p>
                                <h3><strong>sample</strong></h3>
                                <p>Email subscriptions</p>
                                <div class="terms option-group">
                                    <label for="terms" class="m-t-10">
                                        <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue"  />
                                        A new error is received
                                    </label>
                                    <br>
                                    <label for="terms" class="m-t-10">
                                        <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue"  />
                                        An error occurs frequently (10, 100, 1000...etc times)
                                    </label>
                                    <br>
                                    <label for="terms" class="m-t-10">
                                        <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue"  />
                                        Each time an error occurs
                                    </label>
                                    <br>
                                    <label for="terms" class="m-t-10">
                                        <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue"  />
                                        An error is automatically reopened
                                    </label>
                                    <br>
                                    <label for="terms" class="m-t-10">
                                        <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue"  />
                                        Project error rate increases significantly
                                    </label>
                                    <br>
                                    <label for="terms" class="m-t-10">
                                        <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue"  />
                                        User comments on an error
                                    </label>
                                    <br>
                                    <label for="terms" class="m-t-10">
                                        <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue"  />
                                        Daily summary
                                    </label>
                                    <br>
                                    <label for="terms" class="m-t-10">
                                        <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue"  />
                                        Weekly summary
                                    </label>
                                </div>
                                <div id='test' style='display: none'>
                                    <INPUT  name="hideid" id="hideid" TYPE = "Text" VALUE = " <?php echo $session['projid'];  ?>" size="40"  >
                                        
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
<!-- END PAGE CONTENT -->