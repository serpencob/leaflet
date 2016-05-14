<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
<link rel="stylesheet" href="style.css"/>
<link rel="stylesheet" href="leaflet/leaflet.css"/>
<script src="leaflet/leaflet.js"></script>
<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script src='https://api.mapbox.com/mapbox.js/v2.3.0/mapbox.js'></script>
<script src="leaflet/leaf-green.png"></script>
<link href='https://api.mapbox.com/mapbox.js/v2.3.0/mapbox.css' rel='stylesheet' />

</head>

<body>
<div id="mapid">
<script>
L.mapbox.accessToken = 'pk.eyJ1IjoibWFiaWRyYXNvb2wiLCJhIjoiY2lsaDhsYmp4MmJmN3Y2bTA5cnE5ODI1cCJ9.urUEPZSyHz6sQYuGrz4OKA';
				var mymap = L.mapbox.map('mapid', 'mapbox.streets', {
					// These options apply to the tile layer in the map.
					tileLayer: {
						// This map option disables world wrapping. by default, it is false.
						continuousWorld: false,
						// This option disables loading tiles outside of the world bounds.
						noWrap: true,
						
						minZoom: 3,
						maxZoom: 18
					}
				}).setView([0, 0], 3);
				
var LeafIcon = L.Icon.extend({
    options: {
        shadowUrl: 'leaflet/images/leaf-shadow.png',
        iconSize:     [38, 95],
        shadowSize:   [50, 64],
        iconAnchor:   [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
    }
});

var greenIcon = new LeafIcon({iconUrl: 'leaflet/images/leaf-green.png'}),
    redIcon = new LeafIcon({iconUrl: 'leaflet/images/leaf-red.png'}),
    orangeIcon = new LeafIcon({iconUrl: 'leaflet/images/leaf-orange.png'});

var marker = L.marker([51.5, -0.09], {icon: greenIcon}).addTo(mymap);

/*var popup = L.popup()
    .setLatLng([51.5, -0.09])
    .setContent("I am a standalone popup.")
    .openOn(mymap);*/
var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
}

function onMarkerOver() {
	marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
}
function onMarkerOut(){
	marker.closePopup();
}

mymap.on('click', onMapClick);
marker.on('mouseover', onMarkerOver);
marker.on('mouseout', onMarkerOut);
</script>
</div>

</body>
</html>