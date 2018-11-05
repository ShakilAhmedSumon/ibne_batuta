<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
  <?php 


$dbhost= "localhost";
$dbuser= "root";
$dbname="homeauto";
$dbpassword="16121971";

$connection= mysqli_connect($dbhost,$dbuser, $dbpassword, $dbname);
if(mysqli_connect_errno()){
    
    die("database connection failed: ".
         mysqli_connect_error(). "(".

        mysqli_connect_errno().")"       
    );
}

 /* 
Takes the longitude and latitude of the apartment
and dispalys it on the google map
 */

       for($i=1; $i<6; $i++)
       {  $lat= array();
          $lang= array();
        $lat[1]= "SELECT latitude FROM map_latitude WHERE map_id=1";
        $lang[1]= "SELECT longitude FROM map_longitude WHERE map_id=1";

       }

      

/* function to geocode address, it will return false if unable to geocode address
encodes json responses to php and stores latitude and longitude in a php array
*/
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
       

        
         
        // verify if data is complete
        if($lati && $longi){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi 
                    
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}
?>
   <?php 
   $address="Road 5, Block C,Bashundhara r/a, Dhaka 1229";
    $data_arr = geocode($address);
 
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        
        }
   ?>
    <div id="map"></div>
    <script>
      // Note: This example requires consent to location sharing when
      // prompted by browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow, pos, lati, longi;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 15
        });
        infoWindow = new google.maps.InfoWindow;

        // HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
             
            pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            
            //infoWindow.open(map);
            map.setCenter(pos);


      var marker1 = new google.maps.Marker({
          position: pos,
          map: map
        });

     
     var marker2 = new google.maps.Marker({
          position: {lat: 23.816, lng: 90.426},
          map: map
        });

     var marker2 = new google.maps.Marker({
          position: {lat: 23.818, lng: 90.428},
          map: map
        });

     var marker2 = new google.maps.Marker({
          position: {lat: 23.819, lng: 90.429},
          map: map
        });

     var marker2 = new google.maps.Marker({
          position: {lat: 23.806, lng: 90.426},
          map: map
        });
     var marker2 = new google.maps.Marker({
          position: {lat: 23.816, lng: 90.416},
          map: map
        });


      var marker = new google.maps.Marker({
          position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
          map: map
        });
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(position);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

    </script>
    <script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqxO79s_5vqC4fTkONhcBm_-WS3A9G59o&callback=initMap">
    </script>
  </body>
</html>