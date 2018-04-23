<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMnztLCRxhXcbLXB8PDKLJ4oSV2q00geA&callback=initMap" type="text/javascript"></script>

<div id="google_maps">   
    <div style="height: 100%;width: 100%;" id="google_maps_map"></div>
</div>
<script>

var latlong = {
    lat : {{$Lat}},
    lng : {{$Lon}}
};
var map = new google.maps.Map(document.getElementById('google_maps_map'), {
    zoom: 13,
    center: latlong,
    mapTypeId: 'hybrid'
});
var marker = new google.maps.Marker({
    position: latlong,
    map: map
});
</script>
    