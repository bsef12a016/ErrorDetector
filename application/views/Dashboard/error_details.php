<?php
$ip  = "111.68.105.70";
    
foreach ($error as $value) {
    $ip = $value->clientIP;
        
}
$url = "http://freegeoip.net/json/$ip";
$ch  = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
$data = curl_exec($ch);
curl_close($ch);
if ($data) {
    $location = json_decode($data);
    $lat = $location->latitude;
    $lon = $location->longitude;
    $sun_info = date_sun_info(time(), $lat, $lon);
    print_r("lat=".$lat.'<br>'."lon=".$lon);
    }
?>



<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUstEMWunH22j5D0mpJatREDNcYpUCMrc&=false&callback=initMap"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.1.min.js"></script>
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
                                    <h3><strong><?= $pieces[0] ?> </strong><?php if(count($pieces) == 2){ echo $pieces[1]; }?></h3>
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
                    <div class="row">
                        <div id="map"></div>
                    </div>
                    
                </div>
                <?php
                           }
                ?>
                    
            </div>
            <div class="row">
                <div id="map"></div>
            </div>
        </div>
    </div>
        
</div>
<!-- END PAGE CONTENT -->

<script>
    
    // The following example creates a marker in Stockholm, Sweden using a DROP
    // animation. Clicking on the marker will toggle the animation between a BOUNCE
    // animation and no animation.
    
    var marker;
    
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: {lat: <?php echo $lat ?>, lng: <?php echo $lon?>}
        });
        
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: <?php echo $lat ?>, lng: <?php echo $lon?>}
        });
        marker.addListener('click', toggleBounce);
    }
    
    function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }
    
</script>