<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Mapa Ruta</title>
        <style>
            html, body, #map-canvas {
                height: 100%;
                margin: 0px;
                padding: 0px
            }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script>
        function initialize() {
            var entrerios = new google.maps.LatLng(-32.73956326757087,-59.76738095018715);
            var mapOptions = {
                zoom: 11,
                center: entrerios,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            var ctaLayer = new google.maps.KmlLayer({
            url: "http://errorsalud.vacau.com/sgo/Archivos/kml_<?php echo $oObraVO->getKml(); ?>"
            });
            ctaLayer.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);

        </script>
    </head>
    <body>
        <div id="map-canvas" style="width: 100%; height: 360px;"></div>
    </body>
</html>