<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-chartjs/Chart.min.js" type="text/javascript"></script>
<?php
    $session=  $this->session->all_userdata();
    $temp=$months[0];
    $i=0;
    $count=array();
    $count[0]=0;
    foreach($months as $value){
        if($value==$temp){
            $count[$i]++;   
        }
        else{
            $i++;
            $count[$i]=1;
            $temp=$value;
        }
    }    
    $index=0;
    $each_month=array();
    foreach ($count as $x){
        $each_month[]=$months[$index];
        $index=$index+$x;
    }
    $all_months=array();
    $points=array();
    $flag=true;
    for($i=1;$i<13;$i++){
        $all_months[]=date('0'.$i);
        for($j=0;$j<sizeof($each_month);$j++){
            if($all_months[$i-1]===$each_month[$j]){
                $flag=false;
                $points[$i-1]=$count[$j];
            }
        }
        if($flag===true){
            $points[$i-1]=0;
        }
        else {
            $flag=true;
        }
    }
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUstEMWunH22j5D0mpJatREDNcYpUCMrc&=false"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.1.min.js"></script>
<script type="text/javascript">       
    $(function () {
        Highcharts.setOptions({
            global : {
                useUTC : false
            }
        });
        // Create the chart
        $('#container').highcharts('StockChart', {
            chart : {
                events : {
                    load : function () {
                        // set up the updating of the chart each second
                        var series = this.series[0];
                        setInterval(function () {
                            jQuery.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>" + "/AdminDashboard/getadmerrors",
                                success: function(res) {
                                    var x = (new Date()).getTime(), // current time
                                    y = Math.round(res);
                                    series.addPoint([x, y], true, true);
                                }
                            });
                        }, 1000);
                    }
                }
            },
            rangeSelector: {
                buttons: [{
                        count: 1,
                        type: 'minute',
                        text: '1M'
                    }, {
                        count: 5,
                        type: 'minute',
                        text: '5M'
                    }, {
                        type: 'all',
                        text: 'All'
                    }],
                inputEnabled: false,
                selected: 0
            },
            
            title : {
                text : 'Live random data'
            },
            
            exporting: {
                enabled: false
            },
            
            series : [{
                    name : 'Random data',
                    data : (function () {
                        // generate an array of random data
                        var data = [], time = (new Date()).getTime(), i;
                        
                        for (i = -999; i <= 0; i += 1) {
                            data.push([
                                time + i * 1000,
                                Math.round(Math.random() * 100)
                            ]);
                        }
                        return data;
                    }())
                }]
        });
    });
</script> 
<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-thin">
    <div class="row">
        <div class="col-xlg-12 col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <h4><strong>Login </strong> User's</h4>       
                </div>
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
                            <h3><i class="icon-graph"></i> <strong>User's</strong> Monthly Database Consumption (Per month error's)</h3>
                            <div class="control-btn">
                                <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
                            </div>
                        </div>
                        <div class="panel-body p-15 p-b-0">
                        </div>
                        <div class="panel-stat-chart" style="margin:20px; margin-right: 40px">
                            <canvas id="visitorsChart" style="margin:20px "></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div id="container" style="height: 400px; min-width: 310px"></div>                
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->
<script>
    var visitorsData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [
            {
                label: "Error Count this year",
                fillColor: "rgba(200,200,200,0.5)",
                strokeColor: "rgba(200,200,200,1)",
                pointColor: "rgba(200,200,200,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(200,200,200,1)",
                data: [<?php for($i=0;$i<sizeof($points);$i++)
                {
                    if($i=== sizeof($points)-1){
                        echo '"'.$points[$i].'",'; 
                    }
                    else {
                        echo $points[$i].',';      
                    }
                } ?>]
                                }
                            ]
                        };
                        var chartOptions = {
                            scaleShowGridLines : false,
                            bezierCurve: true,
                            pointDot: true,
                            pointHitDetectionRadius: 20,
                            tooltipCornerRadius: 0,
                            scaleShowLabels: false,
                            showTooltips: true,
                            responsive: true,
                            showScale: true                
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
                            <i class="fa fa-user bg-green"></i>
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
                            <i class="fa fa-globe bg-blue"></i>
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
                            <i class="fa fa-bug bg-red"></i>
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
</div>
<!-- END PAGE CONTENT -->
<script type="text/javascript">
        var locations = [ <?php for($i=0;$i<sizeof($ip); $i++){
            if($i ===  sizeof($ip)-1){
                echo "[".$lat[$i].",".$lon[$i]."]";                    
            }
            else{
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