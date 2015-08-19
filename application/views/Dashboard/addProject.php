
<!-- BEGIN PAGE CONTENT -->
            <div class="page-content page-wizard">
                <div class="header">
                    <h2>Add <strong>Project</strong></h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs tabs-linetriangle">

                            <div class="tab-content">
                                <div class="tab-pane active" id="style">
                                    <div class="wizard-div current wizard-sea">
                                        <form class="wizard" data-style="sea" role="form" action="<?=site_url('Dashboard/userDashboard')?>">
                                            <fieldset>
                                                <legend>Create Project</legend>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Project Name</label>
                                                            <input type="text" name="my" class="form-control" placeholder="Enter Project Name" required="">
                                                        </div>
                                                        <?php
                                                          $val=  md5(uniqid(rand(),true));
                                                          $this->session->set_userdata(['projapikey'=>$val]);
                                                        ?>

                                                    </div>
                                                    <div class="col-lg-12">
                                                        Projects represent a single application that SNIK monitors for errors. 
                                                        We recommend creating a project for monitoring JAVASCRIPT error's in your application.
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Integrate your application</legend>
                                                <p>Detection libraries enable us to capture data on errors in your application. 
                                                    No matter which framework you use, our library is lightweight, 
                                                    won't affect performance, and are easy to install.
                                                    Installing the JS detection library</p>
                                                    <code data-language="html" class="">
                                                        <span class="">
                                                            <span class="">&lt;</span><span class="">script</span>
                                                        </span>
                                                        <span class="">src</span><span class="">=</span><span class="">"</span><span class="">Link of our JS Detection Library</span><span class="">"</span>
                                                        <span class="">data-apikey</span><span class="">=</span><span class="">"</span><span class=""><?=$val?></span><span class="">"</span><span class="">></span>
                                                        <span class="">
                                                            <span class="">&lt;</span><span class="">/</span><span class="">script</span></span><span class="">&gt;</span>
                                                    </code>
                                                
                                            </fieldset>
                                            <fieldset>
                                                <legend>Final step</legend>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p>
                                                        <h3>Click Fininsh Button and Start Monitor your Error's.</h3>
                                                        </p>
                                                    </div>
                                                    <noscript>
                                                        <input class="nocsript-finish-btn sf-right nocsript-sf-btn" type="submit"
                                                               name="no-js-clicked" value="finish" />
                                                    </noscript>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- END PAGE CONTENT -->
