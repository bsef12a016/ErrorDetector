    
<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-chartjs/Chart.min.js" type="text/javascript"></script>
    
<?php
$session=  $this->session->all_userdata();
?>
    
    
<?php
$ip  = array("111.68.105.70","66.249.67.46","39.42.1.83","172.16.12.69");
$lat=array();
$lon=array();
foreach ($ip as $value){
    $url = "http://freegeoip.net/json/$value";
    $ch  = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $data = curl_exec($ch);
    curl_close($ch);
    if ($data) {
        $location = json_decode($data);
        $lat[]= $location->latitude;
        $lon[] = $location->longitude;
    }    
}
?>
    
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUstEMWunH22j5D0mpJatREDNcYpUCMrc&=false"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.1.min.js"></script>

<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-thin">
    <div class="row">
        <div class="col-xlg-12 col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <div id="map"></div>       
                </div>
            </div>
        </div>
            
        <div class="col-xlg-12 col-lg-12 m-t-30">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel no-bd bd-3 panel-stat">
                        <div class="panel-header">
                            <h3><i class="icon-graph"></i> <strong>Visitors</strong> Statistic</h3>
                            <div class="control-btn">
                                <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
                            </div>
                        </div>
                        <div class="panel-body p-15 p-b-0">
                            <div class="row m-b-10">
                                <div class="col-xs-3 big-icon">
                                    <i class="icon-users"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="3500" data-height="60">
                                        <div>
                                            <small class="stat-title">Visits today</small>
                                            <h1 class="f-40 m-0 w-300">25 610</h1>
                                        </div>
                                        <div>
                                            <small class="stat-title">Visits yesterday</small>
                                            <h1 class="f-40 m-0 w-300">22 420</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <small class="stat-title">New Visitors</small>
                                    <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="3500" data-height="23">
                                        <div>
                                            <h3 class="f-20 m-0 w-300">37.5%</h3>
                                        </div>
                                        <div>
                                            <h3 class="f-20 m-0 w-300">34.2%</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <small class="stat-title">Bounce Rate</small>
                                    <div class="live-tile f-right" data-mode="carousel" data-direction="vertical" data-delay="3500" data-height="23">
                                        <div>
                                            <h3 class="f-20 t-right m-0 w-500">5.6%</h3>
                                        </div>
                                        <div>
                                            <h3 class="f-20 t-right m-0 w-500">7.4%</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-stat-chart">
                            <canvas id="visitorsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</div>
<!-- END PAGE CONTENT -->
<script>
        
    var visitorsData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [
            {
                label: "New Visitors",
                fillColor: "rgba(200,200,200,0.5)",
                strokeColor: "rgba(200,200,200,1)",
                pointColor: "rgba(200,200,200,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(200,200,200,1)",
                data: [4275, 4321, 7275, 6512, 5472, 6540, 7542, 5475, 6547, 7454, 9544, 10245]
            },
            {
                label: "Returning visitors",
                fillColor: "rgba(49, 157, 181,0.5)",
                strokeColor: "rgba(49, 157, 181,0.7)",
                pointColor: "rgba(49, 157, 181,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(49, 157, 181,1)",
                data: [3255, 3758, 4538, 2723, 6752, 6534, 8760, 7544, 5424, 4244, 6547, 7857]
            }
        ]
    };
    var chartOptions = {
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        bezierCurve: true,
        pointDot: true,
        pointHitDetectionRadius: 20,
        tooltipCornerRadius: 0,
        scaleShowLabels: false,
        tooltipTemplate: "dffdff",
        multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>",
        responsive: true,
        scaleShowLabels: false,
        showScale: false,
    };
    var ctx = document.getElementById("visitorsChart").getContext("2d");
    var myNewChart = new Chart(ctx).Line(visitorsData, chartOptions);
        
</script>
        
        
        
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <h3 class="m-t-30 m-b-10"><strong>Counters</strong></h3>
    <p>Counters are bigger infobox with animated numbers.</p>
    <div class="row m-t-10">
        <div class="col-xlg-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel">
                <div class="panel-content widget-info">
                    <div class="row">
                        <div class="left">
                            <i class="fa fa-umbrella bg-green"></i>
                        </div>
                        <div class="right">
                            <p class="number countup" data-from="0" data-to="<?= $session[USER_COUNT] ?>">0</p>
                            <p class="text">User's</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xlg-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel">
                <div class="panel-content widget-info">
                    <div class="row">
                        <div class="left">
                            <i class="fa fa-bug bg-blue"></i>
                        </div>
                        <div class="right">
                            <p class="number countup" data-from="0" data-to="<?= $session[PROJECTS_COUNT] ?>">0</p>
                            <p class="text">Project's</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xlg-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel">
                <div class="panel-content widget-info">
                    <div class="row">
                        <div class="left">
                            <i class="fa fa-fire-extinguisher bg-red"></i>
                        </div>
                        <div class="right">
                            <p class="number countup" data-from="0" data-to="<?= $session[ERRORS_COUNT] ?>">0</p>
                            <p class="text">Error's</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <h3><strong>User</strong> Widgets</h3>
    <p class="f-16">We have created various user widgets look to let you choose what you like.</p>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel widget-member2">
                <div class="row">
                    <div class="col-lg-2 col-xs-3">
                        <img src="<?=base_url()?>public/dashboard_assets/images/avatars/profil4.jpg" alt="profil 4" class="pull-left img-responsive">
                    </div>
                    <div class="col-lg-10 col-xs-9">
                        <div class="clearfix">
                            <h3 class="m-t-0 member-name"><strong>John Snow</strong> <span class="member-job">Software Engineer</span></h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p><i class="fa fa-map-marker c-gray-light p-r-10"></i> Cebu Business Park, Cebu City, Philippines</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xlg-4 col-lg-6 col-sm-4">
                                <p><i class="fa fa-skype c-gray-light p-r-10"></i> weno.camesong</p>
                            </div>
                            <div class="col-xlg-4 col-lg-6 col-sm-4 align-right">
                                <p><i class="icon-envelope  c-gray-light p-r-10"></i> cameso@it.com</p>
                            </div>
                            <div class="col-xlg-4 col-lg-6 col-sm-4 align-right">
                                <p><i class="icon-target c-gray-light p-r-10"></i> New York</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel widget-member2">
                <div class="row">
                    <div class="col-lg-2 col-xs-3">
                        <img src="<?=base_url()?>public/dashboard_assets/images/avatars/profil4.jpg" alt="profil 4" class="pull-left img-responsive">
                    </div>
                    <div class="col-lg-10 col-xs-9">
                        <div class="clearfix">
                            <h3 class="m-t-0 member-name"><strong>John Snow</strong> <span class="member-job">Software Engineer</span></h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p><i class="fa fa-map-marker c-gray-light p-r-10"></i> Cebu Business Park, Cebu City, Philippines</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xlg-4 col-lg-6 col-sm-4">
                                <p><i class="fa fa-skype c-gray-light p-r-10"></i> weno.camesong</p>
                            </div>
                            <div class="col-xlg-4 col-lg-6 col-sm-4 align-right">
                                <p><i class="icon-envelope  c-gray-light p-r-10"></i> cameso@it.com</p>
                            </div>
                            <div class="col-xlg-4 col-lg-6 col-sm-4 align-right">
                                <p><i class="icon-target c-gray-light p-r-10"></i> New York</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->

<script type="text/javascript">
    var locations = [ <?php for($i=0;$i<sizeof($ip); $i++)
           {
               if($i ===  sizeof($ip)-1)
               {
                   echo "[".$lat[$i].",".$lon[$i]."]";                    
               }
               else
               {
                   echo "[".$lat[$i].",".$lon[$i]."],";                    
               }
                       
           }?>
               ];
               var map = new google.maps.Map(document.getElementById('map'), {
                   zoom: 20,
                   center: new google.maps.LatLng(-39.92, 151.25),
                   mapTypeId: google.maps.MapTypeId.ROADMAP
               });
               var infowindow = new google.maps.InfoWindow();
               var marker, i;
               var markers = new Array();
               for (i = 0; i < locations.length; i++) {  
                   marker = new google.maps.Marker({
                       position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                       map: map
                   });
                   markers.push(marker);
               }
               function AutoCenter() {
                   //  Create a new viewpoint bound
                   var bounds = new google.maps.LatLngBounds();
                   //  Go through each...
                   $.each(markers, function (index, marker) {
                       bounds.extend(marker.position);
                   });
                   //  Fit these bounds to the map
                   map.fitBounds(bounds);
               }
               AutoCenter();
</script>