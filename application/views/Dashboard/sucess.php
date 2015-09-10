<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
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
                                <form enctype="multipart/form-data" action="<?=site_url('Dashboard/uploadpic')?>">
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
        <div>TODO write content</div>
        <img src="<?php $img?>">
    </body>
</html>
