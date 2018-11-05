<!doctype html>
<html>
  <head>
    <title>Challenge Tracking</title>
    <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
  </head>
  <body>
      <div class="container-fluid">
      
      <div id="map-canvas" style="width:1400px;height:800px"></div>
    </div>
     <script>
    window.lat = 23.8151;
    window.lng = 90.4255;
   /* navigator.geolocation.getCurrentPosition(function(position) {
  window.lat = position.coords.latitude;
  window.lng = position.coords.longitude; 
}); */
    var map;
    var mark;
    var lineCoords = [];

     var initialize = function() {
      map  = new google.maps.Map(document.getElementById('map-canvas'), {center:{lat:lat,lng:lng},zoom:15});
      mark = new google.maps.Marker({position:{lat:lat, lng:lng}, map:map});
      lineCoords.push(new google.maps.LatLng(window.lat, window.lng));
    };
    window.initialize = initialize;

        var redraw = function(payload) {
      lat = payload.message.lat;
      lng = payload.message.lng;
      map.setCenter({lat:lat, lng:lng, alt:0});
      mark.setPosition({lat:lat, lng:lng, alt:0});
      lineCoords.push(new google.maps.LatLng(lat, lng));
      var lineCoordinatesPath = new google.maps.Polyline({
        path: lineCoords,
        geodesic: true,
        strokeColor: '#2E10FF'
      });
      
      lineCoordinatesPath.setMap(map);
    };

    var pnChannel = "map-channel";
    var pubnub = new PubNub({
      publishKey: 'pub-c-6988363a-fee5-417f-99ca-8c591628b668',
      subscribeKey: 'sub-c-7bdf812a-ce05-11e7-a7e0-ba9127ff21d1'
    });

     pubnub.subscribe({channels: [pnChannel]});
    pubnub.addListener({message:redraw});


      setInterval(function() {
      pubnub.publish({channel:pnChannel, message:{lat:window.lat + 0.0001, lng:window.lng + 0.001}});
    }, 5000);
  </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAqxO79s_5vqC4fTkONhcBm_-WS3A9G59o&callback=initialize"></script>
  </body>
</html>