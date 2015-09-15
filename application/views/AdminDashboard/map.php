<?php
$ip  = array("111.68.105.70","66.249.67.46","39.42.1.83","172.16.12.69");
$lat=array();
$lon=array();
foreach ($ip as $value)
{
$url = "http://freegeoip.net/json/$value";
$ch  = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
$data = curl_exec($ch);
curl_close($ch);

if ($data) {
    $location = json_decode($data);

    $lat[] = $location->latitude;
    $lon[] = $location->longitude;

}    
}



?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Marker Animations</title>
    
  </head>
  <body>
      <div style="width:200px; height:500px" id="map"></div>
    <script>

// The following example creates a marker in Stockholm, Sweden using a DROP
// animation. Clicking on the marker will toggle the animation between a BOUNCE
// animation and no animation.

    var marker= [];

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: {lat: <?php echo $lat[0] ?>, lng: <?php echo $lon[0]?>}
    });
    }
    
    function toggleBounce() {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}

<?php $i = 0?>
function drop() {
 for (; <?php echo $i ?> <  <?php echo sizeof($ip)?>; <?php echo $i++ ?>) 
  { 
    marker.push(new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: <?php echo $lat[$i] ?>, lng: <?php echo $lon[$i]?>}
  }));
    marker[i].addListener('click', toggleBounce);
  }

}


    </script>
    
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUstEMWunH22j5D0mpJatREDNcYpUCMrc&=false&callback=initMap"></script>
  </body>
</html>




