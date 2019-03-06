<?php 
require "../config.php";
$year = 2019;;
$disease_id ="all";
if(isset($_GET['year'])){
  $year = $_GET['year'];
}
if(isset($_GET['disease_id'])){
  $disease_id = $_GET['disease_id'];
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Polygon</title>
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
    
    <div id="map"></div>
    </script>
    <script>

      // This example creates a simple polygon representing the Bermuda Triangle.
var year = <?=$year?> 
function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center:  {lat: 14.665159,lng:120.493361},
          //mapTypeId: 'terrain'
        });
        /*
        google.maps.event.addListener(map, 'click', function (event) {
              displayCoordinates(event.latLng);               
          });

        function displayCoordinates(pnt) {

          var lat = pnt.lat();
          lat = lat.toFixed(4);
          var lng = pnt.lng();
          lng = lng.toFixed(4);
          alert("Latitude: " + lat + "  Longitude: " + lng);
      } 
         
         */


        // Define the LatLng coordinates for the polygon's path.
        var balangaCoords = [
          {lat: 14.621543, lng: 120.458316},
          {lat: 14.620879, lng: 120.471189},
          {lat: 14.623515, lng: 120.472273},
          {lat: 14.621247, lng: 120.473265},
          {lat: 14.628590, lng: 120.476591},
          {lat: 14.628581, lng: 120.476479},
          {lat: 14.633406, lng: 120.476912},
          {lat: 14.638381, lng: 120.482702},
          {lat: 14.637052, lng: 120.485191},
          {lat: 14.637051, lng: 120.485325},
          {lat: 14.640041, lng: 120.496993},
          {lat: 14.635939, lng: 120.506401},
          {lat: 14.634694, lng: 120.505971},
          {lat: 14.634029, lng: 120.506744},
          {lat: 14.635275, lng: 120.517344},
          {lat: 14.635939, lng: 120.518760},
          {lat: 14.635607, lng: 120.521207},
          {lat: 14.638679, lng: 120.526443},
          {lat: 14.639551, lng: 120.530991},
          {lat: 14.643164, lng: 120.532150},
          {lat: 14.643994, lng: 120.534081},
          {lat: 14.643039, lng: 120.535111},
          {lat: 14.644036, lng: 120.536055},
          {lat: 14.649143, lng: 120.536227},
          {lat: 14.650679, lng: 120.534467},
          {lat: 14.651510, lng: 120.534553},
          {lat: 14.652838, lng: 120.537343},
          {lat: 14.656741, lng: 120.536956},
          {lat: 14.658776, lng: 120.536227},
          {lat: 14.660810, lng: 120.537858},
          {lat: 14.661225, lng: 120.540046},
          {lat: 14.660602, lng: 120.541076},
          {lat: 14.662429, lng: 120.544724},
          {lat: 14.664131, lng: 120.548157},
          {lat: 14.668117, lng: 120.549144},
          {lat: 14.671604, lng: 120.546741},
          {lat: 14.674345, lng: 120.544689},
          {lat: 14.675798, lng: 120.543573},
          {lat: 14.676586, lng: 120.543831},
          {lat: 14.681900, lng: 120.549281},
          {lat: 14.685719, lng: 120.549839},
          {lat: 14.687172, lng: 120.556920},
          {lat: 14.692112, lng: 120.562456},
          {lat: 14.694354, lng: 120.566876},
          {lat: 14.695433, lng: 120.566189},
          {lat: 14.695433, lng: 120.565760},
          {lat: 14.696098, lng: 120.565245},
          {lat: 14.696450, lng: 120.564194},
          {lat: 14.698505, lng: 120.562842},
          
          {lat: 14.699730, lng: 120.563142},
          {lat: 14.700581, lng: 120.562670},
          {lat: 14.702054, lng: 120.561447},
          {lat: 14.701619, lng: 120.560889},
          {lat: 14.701826, lng: 120.559280},
          {lat: 14.701764, lng: 120.558078},
          {lat: 14.702096, lng: 120.557521},
          {lat: 14.702615, lng: 120.557306},
          {lat: 14.703175, lng: 120.556684},
          {lat: 14.703383, lng: 120.555396},
          {lat: 14.704005, lng: 120.554023},
          {lat: 14.705292, lng: 120.553293},
          {lat: 14.705458, lng: 120.551985},
          {lat: 14.704379, lng: 120.549324},
          {lat: 14.704794, lng: 120.548187},
          {lat: 14.702117, lng: 120.537844},
          {lat: 14.702283, lng: 120.534952},
          {lat: 14.701637, lng: 120.534467},
          {lat: 14.700639, lng: 120.534649},
          {lat: 14.700316, lng: 120.533890},
          {lat: 14.699289, lng: 120.530188},
          {lat: 14.699465, lng: 120.528913},
          {lat: 14.699715, lng: 120.528807},
          {lat: 14.699627, lng: 120.527988},
          {lat: 14.699157, lng: 120.527866},
          {lat: 14.699010, lng: 120.527047},
          {lat: 14.699274, lng: 120.525894},
          {lat: 14.698805, lng: 120.525348},
          {lat: 14.699749, lng: 120.523462},
          {lat: 14.699749, lng: 120.523462},
          {lat: 14.697871, lng: 120.512932},
          {lat: 14.697078, lng: 120.511687},
          {lat: 14.696433, lng: 120.511809},
          {lat: 14.694671, lng: 120.508258},
          {lat: 14.694760, lng: 120.506104},
          {lat: 14.693820, lng: 120.505831},
          {lat: 14.694349, lng: 120.505315},
          {lat: 14.693556, lng: 120.503494},
          {lat: 14.692617, lng: 120.500004},
          {lat: 14.691795, lng: 120.500065},
          {lat: 14.691208, lng: 120.497789},
          {lat: 14.691854, lng: 120.497334},
          {lat: 14.691002, lng: 120.496454},
          {lat: 14.691038, lng: 120.491921},
          {lat: 14.689928, lng: 120.489906},
          {lat: 14.688866, lng: 120.484292},
          {lat: 14.687904, lng: 120.483450},
          {lat: 14.697569, lng: 120.450076}, //here
          {lat: 14.695471, lng: 120.441630},
          {lat: 14.694952, lng: 120.434970},
          {lat: 14.676162, lng: 120.425869},
          {lat: 14.673767, lng: 120.426686},
          {lat: 14.672335, lng: 120.428013},
          {lat: 14.672187, lng: 120.429493},
          {lat: 14.668366, lng: 120.431678},
          {lat: 14.667231, lng: 120.435021},
          {lat: 14.662923, lng: 120.439182},
          {lat: 14.662600, lng: 120.440760},
          {lat: 14.661660, lng: 120.441610},
          {lat: 14.662335, lng: 120.443613},
          {lat: 14.659928, lng: 120.450410},
          {lat: 14.659341, lng: 120.454567},
          {lat: 14.646922, lng: 120.445555},
          {lat: 14.629541, lng: 120.461213},
          {lat: 14.628397, lng: 120.460299},
          {lat: 14.626232, lng: 120.460587},
          {lat: 14.626302, lng: 120.459144},
          {lat: 14.623299, lng: 120.458494},
          {lat: 14.621762, lng: 120.458206}
        ];
        var cabogCoords = [
          {lat: 14.621543, lng: 120.458316},
          {lat: 14.620879, lng: 120.471189},
          {lat: 14.623515, lng: 120.472273},
          {lat: 14.621247, lng: 120.473265},
          {lat: 14.628590, lng: 120.476591},
          {lat: 14.628581, lng: 120.476479},
          {lat: 14.633406, lng: 120.476912},
          {lat: 14.638381, lng: 120.482702},
          {lat: 14.626232, lng: 120.460587},
          {lat: 14.626302, lng: 120.459144},
          {lat: 14.623299, lng: 120.458494},
          {lat: 14.621762, lng: 120.458206}
        ]
        var tanatoCoords = [  
          {lat: 14.634753, lng: 120.475786},
          {lat: 14.648540, lng: 120.463296},
          {lat: 14.649721, lng: 120.479143},
          {lat: 14.654620, lng: 120.482062},
          {lat: 14.662936, lng: 120.468620},
          {lat: 14.697569, lng: 120.450076},
          {lat: 14.695471, lng: 120.441630},
          {lat: 14.694952, lng: 120.434970},
          {lat: 14.676162, lng: 120.425869},
          {lat: 14.673767, lng: 120.426686},
          {lat: 14.672335, lng: 120.428013},
          {lat: 14.672187, lng: 120.429493},
          {lat: 14.668366, lng: 120.431678},
          {lat: 14.667231, lng: 120.435021},
          {lat: 14.662923, lng: 120.439182},
          {lat: 14.662600, lng: 120.440760},
          {lat: 14.661660, lng: 120.441610},
          {lat: 14.662335, lng: 120.443613},
          {lat: 14.659928, lng: 120.450410},
          {lat: 14.659341, lng: 120.454567},
          {lat: 14.646922, lng: 120.445555},
          {lat: 14.629541, lng: 120.461213},
          {lat: 14.628397, lng: 120.460299},
          {lat: 14.626232, lng: 120.460587}
        ]
        var dangcolCoord = [
          {lat: 14.637052, lng: 120.485191},
          {lat: 14.638381, lng: 120.482702},
          {lat: 14.634753, lng: 120.475786},
          {lat: 14.648540, lng: 120.463296},
          {lat: 14.649721, lng: 120.479143},
          {lat: 14.647657, lng: 120.496646},  
          {lat: 14.640041, lng: 120.496993},
        ]

        var cupangCoord = [
            {lat: 14.649721, lng: 120.479143},
            {lat: 14.654620, lng: 120.482062},
            {lat: 14.656741, lng: 120.536956},
            {lat: 14.652838, lng: 120.537343},
            {lat: 14.651510, lng: 120.534553},
            {lat: 14.650679, lng: 120.534467},
            {lat: 14.649143, lng: 120.536227},
            {lat: 14.644036, lng: 120.536055},
            {lat: 14.643039, lng: 120.535111},


            {lat: 14.643994, lng: 120.534081},
            {lat: 14.643164, lng: 120.532150},
            {lat: 14.639551, lng: 120.530991},
            {lat: 14.638679, lng: 120.526443},
            {lat: 14.635607, lng: 120.521207},



            {lat: 14.635939, lng: 120.518760},
            {lat: 14.635275, lng: 120.517344},
            {lat: 14.634029, lng: 120.506744},
            {lat: 14.634694, lng: 120.505971},
            {lat: 14.635939, lng: 120.506401},          
            {lat: 14.640041, lng: 120.496993},


            {lat: 14.647657, lng: 120.496646}, 
            {lat: 14.649721, lng: 120.479143},
        ]
        var tuyoCoord = [
            {lat: 14.678035, lng: 120.492971},
            {lat: 14.684512, lng: 120.504301},
            {lat: 14.687833, lng: 120.508764},
            {lat: 14.687334, lng: 120.514086},
            {lat: 14.688661, lng: 120.529708},
            {lat: 14.692812, lng: 120.532284},
            {lat: 14.694640, lng: 120.527992},
            {lat: 14.699289, lng: 120.530188},
            {lat: 14.699465, lng: 120.528913},
            {lat: 14.699715, lng: 120.528807},
            {lat: 14.699627, lng: 120.527988},
            {lat: 14.699157, lng: 120.527866},
            {lat: 14.699010, lng: 120.527047},
            {lat: 14.699274, lng: 120.525894},
            {lat: 14.698805, lng: 120.525348},
            {lat: 14.699749, lng: 120.523462},
            {lat: 14.699749, lng: 120.523462},
            {lat: 14.697871, lng: 120.512932},
            {lat: 14.697078, lng: 120.511687},
            {lat: 14.696433, lng: 120.511809},
            {lat: 14.694671, lng: 120.508258},
            {lat: 14.694760, lng: 120.506104},
            {lat: 14.693820, lng: 120.505831},
            {lat: 14.694349, lng: 120.505315},
            {lat: 14.693556, lng: 120.503494},
            {lat: 14.692617, lng: 120.500004},
            {lat: 14.691795, lng: 120.500065},
            {lat: 14.691208, lng: 120.497789},
            {lat: 14.691854, lng: 120.497334},
            {lat: 14.691002, lng: 120.496454},
            {lat: 14.691038, lng: 120.491921},
            {lat: 14.689928, lng: 120.489906},
            {lat: 14.688866, lng: 120.484292},
            {lat: 14.687904, lng: 120.483450},
            {lat: 14.697569, lng: 120.450076},
            {lat: 14.674045, lng: 120.462488},
        ]
        var muntingBatangasCoords = [
          
          {lat: 14.662902, lng: 120.468806},
          {lat: 14.674045, lng: 120.462488},

          {lat: 14.678035, lng: 120.492971},
         

          {lat: 14.684512, lng: 120.504301},
          {lat: 14.687833, lng: 120.508764},
          
          {lat: 14.687334, lng: 120.514086},
          
          {lat: 14.688661, lng: 120.529708},

           {lat: 14.677478, lng: 120.507673}, 
          

          {lat: 14.670367, lng: 120.497974}, 
        ]
        var bagongSilangCoords = [
          {lat: 14.682524, lng: 120.517533},
          {lat: 14.667674, lng: 120.518746},
          {lat: 14.656097, lng: 120.507940},
          {lat: 14.654465, lng: 120.482004},
          {lat: 14.662916, lng: 120.468809},
          {lat: 14.670469, lng: 120.497911},
          {lat: 14.677467, lng: 120.507754},

        ]
        var cataningCoords = [
          {lat: 14.656058, lng: 120.507921},
          //{lat: 14.656731, lng: 120.536964},
          {lat: 14.656421, lng: 120.528148},
          {lat: 14.659242, lng: 120.530540},
          {lat: 14.663327, lng: 120.531298},
          {lat: 14.666434, lng: 120.533932},
          {lat: 14.667674, lng: 120.518746},


        ]
        var cupangProperCoords = [
          {lat: 14.656407, lng: 120.528111},
          {lat: 14.659113, lng: 120.530335},
          {lat: 14.663309, lng: 120.531297},
          {lat: 14.666330, lng: 120.533974},
          {lat: 14.668117, lng: 120.549144},
          {lat: 14.664131, lng: 120.548157},
          {lat: 14.662429, lng: 120.544724},
          {lat: 14.662429, lng: 120.544724},
          
          {lat: 14.662429, lng: 120.544724},
          {lat: 14.660602, lng: 120.541076},
          {lat: 14.661225, lng: 120.540046},
          {lat: 14.660810, lng: 120.537858},
          {lat: 14.658776, lng: 120.536227},       
          {lat: 14.656831, lng: 120.536936},
        ]
        var cupangWestCoords = [
          {lat: 14.667674, lng: 120.518746},
          {lat: 14.672050, lng: 120.546547},
          {lat: 14.668117, lng: 120.549144},
          {lat: 14.666330, lng: 120.533974},
        ]
        var cupangNorthCoords = [
          {lat: 14.667674, lng: 120.518746},
          {lat: 14.675798, lng: 120.543573},
          {lat: 14.672050, lng: 120.546547},
        ]

        var camachoCoords = [
           {lat: 14.682524, lng: 120.517533},
           //{lat: 14.677980, lng: 120.517907},
           {lat: 14.676718, lng: 120.517961},
           {lat: 14.681571, lng: 120.531382},
           {lat: 14.688452, lng: 120.529357},
        ]
        var tenejeroCoords = [
          {lat: 14.676718, lng: 120.517961},
          {lat: 14.667674, lng: 120.518746},
          {lat: 14.673175, lng: 120.535447},
          {lat: 14.681571, lng: 120.531382},
        ]
        var ibayoCoords = [
          {lat: 14.681571, lng: 120.531382},
          {lat: 14.683542, lng: 120.540144},
          {lat: 14.686645, lng: 120.537676},
          {lat: 14.688452, lng: 120.529357},
        ]
        var malabiaCoords = [
          {lat: 14.681571, lng: 120.531382},

          {lat: 14.683542, lng: 120.540144},
          {lat: 14.681686, lng: 120.541821},
          {lat: 14.677117, lng: 120.533426},

        ]
        var sanjoseCoords = [
            {lat: 14.677117, lng: 120.533426},
            {lat: 14.675798, lng: 120.543573},
            {lat: 14.673175, lng: 120.535447},
        ]

        var poblacionCoords = [
          {lat: 14.677117, lng: 120.533426},
          {lat: 14.681686, lng: 120.541821},
          {lat: 14.675798, lng: 120.543573},

        ]

        var bagumbayanCoords = [
          {lat: 14.681686, lng: 120.541821},
          {lat: 14.679559, lng: 120.546874},

          {lat: 14.676586, lng: 120.543831},
          {lat: 14.675798, lng: 120.543573},
        ]

        var talisayCoords = [
         {lat: 14.681686, lng: 120.541821},
         {lat: 14.679559, lng: 120.546874},
         {lat: 14.681900, lng: 120.549281},
         {lat: 14.684004, lng: 120.549542},

        ]

        var donaCoords = [
          {lat: 14.686645, lng: 120.537676},
          {lat: 14.684004, lng: 120.549542},
          {lat: 14.681686, lng: 120.541821},
        ]

        var puertoRivasLotteCoords = [
          {lat: 14.685250, lng: 120.544055},
          {lat: 14.684004, lng: 120.549542},
          {lat: 14.685719, lng: 120.549839},
          {lat: 14.687224, lng: 120.556797},
          {lat: 14.690242, lng: 120.553995},
          {lat: 14.688064, lng: 120.547157},



        ]

        var tortugasCoords = [
          {lat: 14.700585, lng: 120.562653},
          {lat: 14.687158, lng: 120.556909},
          {lat: 14.692048, lng: 120.562345},
          {lat: 14.694389, lng: 120.566867},
          {lat: 14.695423, lng: 120.566174},
          {lat: 14.695480, lng: 120.565776},
          {lat: 14.696139, lng: 120.565259},
          {lat: 14.696370, lng: 120.564164},
          {lat: 14.698629, lng: 120.562788},
          {lat: 14.699617, lng: 120.563164},
          {lat: 14.700043, lng: 120.562962},
        ]

        var pueroRivasIbabaCoords = [
          {lat: 14.700581, lng: 120.562670},
          {lat: 14.702054, lng: 120.561447},
          {lat: 14.702054, lng: 120.561447},
          {lat: 14.701619, lng: 120.560889},
          {lat: 14.701826, lng: 120.559280},
          {lat: 14.701764, lng: 120.558078},
          {lat: 14.702096, lng: 120.557521},
          {lat: 14.702615, lng: 120.557306},
          {lat: 14.703175, lng: 120.556684},
          {lat: 14.701216, lng: 120.554561},
          {lat: 14.699250, lng: 120.555255},
          {lat: 14.692839, lng: 120.557710},
          {lat: 14.691686, lng: 120.557184},
          {lat: 14.690940, lng: 120.558516},
          
        ]

        var puertoRivasItaasCoords = [
          {lat: 14.690940, lng: 120.558516},
          {lat: 14.691686, lng: 120.557184},
          {lat: 14.692839, lng: 120.557710},
          {lat: 14.699250, lng: 120.555255},
          {lat: 14.685990, lng: 120.540353},
          {lat: 14.685250, lng: 120.544055},

          {lat: 14.688064, lng: 120.547157},
          


          {lat: 14.690242, lng: 120.553995},

          {lat: 14.687224, lng: 120.556797},

          {lat: 14.687158, lng: 120.556909},


        ]

        var sibacanCoords =[
          {lat :14.688421, lng: 120.529335},
          {lat :14.686057, lng: 120.540429},
          {lat: 14.699250, lng: 120.555255},
          {lat: 14.699250, lng: 120.555255},
          {lat: 14.699250, lng: 120.555255},
          {lat: 14.701216, lng: 120.554561},


          {lat: 14.703175, lng: 120.556684},
           {lat: 14.703383, lng: 120.555396},
          {lat: 14.704005, lng: 120.554023},
          {lat: 14.705292, lng: 120.553293},
          {lat: 14.705458, lng: 120.551985},
          {lat: 14.704379, lng: 120.549324},
          {lat: 14.704794, lng: 120.548187},
          {lat: 14.702117, lng: 120.537844},
          {lat: 14.702283, lng: 120.534952},
          {lat: 14.701637, lng: 120.534467},
          {lat: 14.700639, lng: 120.534649},
          {lat: 14.700316, lng: 120.533890},
          {lat: 14.699289, lng: 120.530188},
          {lat: 14.699289, lng: 120.530188},
          {lat: 14.694719, lng: 120.528000},
          {lat: 14.692841, lng: 120.532341},

          
        ]

        // Balanga.
        var balangaMap = new google.maps.Polygon({
          paths: balangaCoords,
          strokeColor: 'green',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: 'green',
          fillOpacity: 0.6,
          text: 'Sample'
        });       
        // Cabog.
        <?php $mapColor = mapColor(23,$year,$disease_id); ?>
        var cabogMap = new google.maps.Polygon({
          paths: cabogCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        // Tanao.
        <?php $mapColor = mapColor(24,$year,$disease_id); ?>

        var tanatoMap = new google.maps.Polygon({
          paths: tanatoCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(22,$year,$disease_id); ?>

        var dangcolMap = new google.maps.Polygon({
          paths: dangcolCoord,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });        
        <?php $mapColor = mapColor(17,$year,$disease_id); ?>

        var cupangMap = new google.maps.Polygon({
          paths: cupangCoord,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });       
        <?php $mapColor = mapColor(13,$year,$disease_id); ?>

        var tuyoMap = new google.maps.Polygon({
          paths: tuyoCoord,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });   
        <?php $mapColor = mapColor(25,$year,$disease_id); ?>
    
        var muntingBatangas = new google.maps.Polygon({
          paths: muntingBatangasCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        }); 
        <?php $mapColor = mapColor(20,$year,$disease_id); ?>

        var bagongSilang = new google.maps.Polygon({
          paths: bagongSilangCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(2,$year,$disease_id); ?>

        var cataning = new google.maps.Polygon({
          paths: cataningCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(9,$year,$disease_id); ?>

        var cupangProper = new google.maps.Polygon({
          paths: cupangProperCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(11,$year,$disease_id); ?>

        var cupangWest = new google.maps.Polygon({
          paths: cupangWestCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(10,$year,$disease_id); ?>

        var cupangNorth = new google.maps.Polygon({
          paths: cupangNorthCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(19,$year,$disease_id); ?>

        var camacho = new google.maps.Polygon({
          paths: camachoCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(18,$year,$disease_id); ?>

        var tenejero = new google.maps.Polygon({
          paths: tenejeroCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });

        <?php $mapColor = mapColor(7,$year,$disease_id); ?>

        var ibayo = new google.maps.Polygon({
          paths: ibayoCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });

      <?php $mapColor = mapColor(5,$year,$disease_id); ?>

        var malabia = new google.maps.Polygon({
          paths: malabiaCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(6,$year,$disease_id); ?>

        var sanjose = new google.maps.Polygon({
          paths: sanjoseCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(1,$year,$disease_id); ?>

        var poblacion = new google.maps.Polygon({
          paths: poblacionCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(3,$year,$disease_id); ?>

        var bagumbayan = new google.maps.Polygon({
          paths: bagumbayanCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(4,$year,$disease_id); ?>

        var talisay = new google.maps.Polygon({
          paths: talisayCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(8,$year,$disease_id); ?>

        var dona = new google.maps.Polygon({
          paths: donaCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });

<?php $mapColor = mapColor(21,$year,$disease_id); ?>

        var puertoRivasLotte = new google.maps.Polygon({
          paths: puertoRivasLotteCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
<?php $mapColor = mapColor(16,$year,$disease_id); ?>

        var tortugas = new google.maps.Polygon({
          paths: tortugasCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });
        <?php $mapColor = mapColor(14,$year,$disease_id); ?>

        var puertoRivasIbaba = new google.maps.Polygon({
          paths: pueroRivasIbabaCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });

<?php $mapColor = mapColor(15,$year,$disease_id); ?>

        var puertoRivasItaas = new google.maps.Polygon({
          paths: puertoRivasItaasCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });

<?php $mapColor = mapColor(12,$year,$disease_id); ?>

        var sibacan = new google.maps.Polygon({
          paths: sibacanCoords,
          strokeColor: '<?=$mapColor?>',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '<?=$mapColor?>',
          fillOpacity: 0.35,
          text: 'Sample'
        });


        balangaMap.setMap(map);
        balangaMap.setOptions({
          //zIndex: 99999
        });
        google.maps.event.addListener(balangaMap, "click", function (event) {
            var latitude = event.latLng.lat();
            var longitude = event.latLng.lng();
            console.log( '{lat:'+ latitude + ', lng: ' + longitude +'}' );
        });




        



















        
        cabogMap.setMap(map);
        tanatoMap.setMap(map);
        dangcolMap.setMap(map);
        cupangMap.setMap(map);
        tuyoMap.setMap(map);
        muntingBatangas.setMap(map);
        bagongSilang.setMap(map);
        cataning.setMap(map);
        cupangProper.setMap(map);
        cupangWest.setMap(map);
        cupangNorth.setMap(map);
        camacho.setMap(map);
        tenejero.setMap(map);
        ibayo.setMap(map);
        malabia.setMap(map);
        sanjose.setMap(map);
        poblacion.setMap(map);
        bagumbayan.setMap(map);
        talisay.setMap(map);
        dona.setMap(map);
        puertoRivasLotte.setMap(map);
        tortugas.setMap(map);
        puertoRivasIbaba.setMap(map);
        puertoRivasItaas.setMap(map);
        sibacan.setMap(map);


       /* attachPolygonInfoWindow(balangaMap)

        function attachPolygonInfoWindow(polygon) {
            var infoWindow = new google.maps.InfoWindow();
            google.maps.event.addListener(balangaMap, 'mousehover', function (e) {
                infoWindow.setContent("Polygon Name");
                var latLng = e.latLng;
                infoWindow.setPosition(latLng);
                infoWindow.open(map);
            });
        }
*/  
        var total_marker = 0;

        var cabog = {lat: 14.626774, lng:120.469129}
        addMarker(cabog,map,'Cabog-Cabog');

        var tanato = {lat: 14.650364, lng: 120.456317}
        addMarker(tanato,map,'Tanato');
      
        var dangcol = {lat:14.644233310012991, lng: 120.4822030104981}
        addMarker(dangcol,map,'Dangcol');
        
        var tuyo = {lat:14.68279672986537, lng: 120.48215180230352}
        addMarker(tuyo,map,'Tuyo');        

        var batangas = {lat:14.672766885422238, lng: 120.49024571555287}
        addMarker(batangas,map,'Munting Batangas');
        
        var bagong_silang = {lat:14.661007236331859, lng: 120.49679422753911}
        addMarker(bagong_silang,map,'Bagong Silang');     
           
        var cataning = {lat:14.661210005459923, lng: 120.52228594201665}
        addMarker(cataning,map,'Cataning');

                   
        var central = {lat:14.64456547942856, lng: 120.5129303969727}
        addMarker(central,map,'Cupang Central');
         
        var proper = {lat:14.662852140708944, lng: 120.5404518320072}
        addMarker(proper,map,'Cupang Proper');

        var west = {lat:14.667276369157742, lng: 120.53447389978032}
        addMarker(west,map,'Cupang West');

        var north = {lat:14.671344981814649, lng: 120.53842211145025}
        addMarker(north,map,'Cupang North');    

        var tenejero = {lat:14.674104598737305, lng: 120.52418998998291}
        addMarker(tenejero,map,'Tenejero');

        var camacho = {lat:14.681494241157603, lng: 120.52101425450928}
        addMarker(camacho,map,'Camacho');

        var sanjose = {lat:14.674652318389986, lng: 120.5357428697721}
        addMarker(sanjose,map,'San Jose');

        var poblacion_ = {lat:14.678065150246209, lng: 120.53938573679216}
        addMarker(poblacion_,map,'Poblacion');
        
        var malabia = {lat:14.680505917440097, lng: 120.53554975072302}
        addMarker(malabia,map,'Malabia');    

        var talisay = {lat:14.681626922813864, lng: 120.54530459609941}
        addMarker(talisay,map,'Talisay');
        
        var ibayo = {lat:14.683260097963343, lng: 120.53414239242147}
        addMarker(ibayo,map,'Ibayo');

        var dona = {lat:14.683343125564651, lng: 120.54173840835165}
        addMarker(dona,map,'Doña Francisca');

        var lote ={lat:14.687264534032025, lng: 120.5495346558746}
        addMarker(lote,map,'Puerto Rivas Lote');

   
        var itaas ={lat:14.692344318515385, lng: 120.55267571432296}
        addMarker(itaas,map,'Puerto Rivas Itaas');  
        
        var ibaba = {lat:14.698949532280018, lng: 120.55775346872974}
        addMarker(ibaba,map,'Puerto Rivas Ibaba');  
        
        var tortugas = {lat:14.69436591104696, lng: 120.56167783860428}
        addMarker(tortugas,map,'Tortugas');

      
        var sibacan = {lat:14.695667859094668, lng: 120.54263938704457}
        addMarker(sibacan,map,'Sibacan');
      
        var bagumbayan = {lat:14.679477535774799, lng: 120.54370867468617}
        addMarker(bagumbayan,map,'Bagumbayan');



        function addMarker(location, map, text) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
        var marker = new google.maps.Marker({
          position: location,
          label: {
            text: text,
            color: 'black',
            fontSize: '12px',
            fontWeight: '50px',
          },
          map: map
        });
        total_marker++

      }
      console.log(total_marker);
}


    </script>
    <script  
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAk5RXqU-ZflY3hK5MQAisdPhGUw1VAZls&callback=initMap">
    </script>
    <script type="text/javascript" src="marker.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



  </body>
</html>