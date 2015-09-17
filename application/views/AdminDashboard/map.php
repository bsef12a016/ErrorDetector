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



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Marker Animations</title>
        <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUstEMWunH22j5D0mpJatREDNcYpUCMrc&=false"></script>
        
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.1.min.js"></script>
    </head> 
    <body>
        <div id="loginUserMap" style="width: 1100px; height: 600px;"></div>
        
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
                var map = new google.maps.Map(document.getElementById('loginUserMap'), {
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
    </body>
</html>




