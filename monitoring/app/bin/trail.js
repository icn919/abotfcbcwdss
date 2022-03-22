var map = L.map('map',{zoomSnap: 1.00}),
    trail = {
        type: 'Feature',
        properties: {
            id: 1
        },
        geometry: {
            type: 'LineString',
            coordinates: []
        }
    },
    realtime = L.realtime(function(success, error) {
        fetch('https://io.adafruit.com/api/v2/gveloria/feeds/gps-monitoring/data/last?x-aio-key=aio_vKiv07vdwEnb1QdO50AgL30yvhX4')
        .then(function(response) { return response.json(); })
        .then(function(data) {
            var trailCoords = trail.geometry.coordinates;
            coorz=[data.lon,data.lat];
            trailCoords.push(coorz);
            trailCoords.splice(0, Math.max(0, trailCoords.length - 10));
            success({
                type: 'FeatureCollection',
                features: [data, trail]
            });
        })
        .catch(error);
    },{
        interval: 10000,
    }).addTo(map);

    busloc=[];
    userloc=[];

L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=P63ZA9kzUfoZt3x35I2k', {
    tileSize: 512,
    zoomOffset: -1,
    minZoom: 1,
    crossOrigin: true,
    attribution: '&copy; <a href="https://www.maptiler.com/">MapTiler</a> | GVeloria',    
}).addTo(map);

realtime.on('update', function() {
    busloc=L.latLng(coorz[1],coorz[0]);
    bounds = L.latLngBounds(busloc, userloc);
    map.fitBounds(bounds, {maxZoom: 17});
    L.circleMarker(busloc,{
        "radius": 5,
        "fillColor": "#2ecc71",
        "color": "#003606",
        "weight": 1,
        "opacity": 1
    }).addTo(map);
});

function onLocationFound(e) {
    var radius = e.accuracy / 2;

    L.marker(e.latlng).addTo(map).bindPopup("You are within " + radius + " meters from this point").openPopup();

    L.circle(e.latlng, radius).addTo(map);
    userloc=e.latlng;
}

function onLocationError(e) {
    alert("("+e.message+"): Error! Please check if location is turned on or if this website is allowed to access it.");
}

map.on('locationfound', onLocationFound);
map.on('locationerror', onLocationError);

map.locate({setView: true, maxZoom: 16});
