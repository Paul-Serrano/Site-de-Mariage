<?php

require_once "../includes/_nav.php";
require_once "../controller/map_post.php";

$adressDefault = 'Place Clémenceau';
$cpDefault = '64000';
$villeDefault = 'Pau';



?>

<body>
    <main class="map-main">
        <div class="map-block">
            <div class="map" id="map"></div>
        </div>
        <div class="map-side-block">
        </div>
    </main>
    <script>
        var cp = <?php 
        if($connect) {
            echo json_encode($cp);
        } 
        else{
            echo json_encode($cpDefault);
        }
            ?>;
        
        var adress = <?php 
        if($connect) {
            echo json_encode($adress);
        } 
        else{
            echo json_encode($adressDefault);
        }
            ?>;

        var ville = <?php 
        if($connect) {
            echo json_encode($ville);
        } 
        else{
            echo json_encode($villeDefault);
        }
            ?>;
        console.log(adress);
        console.log(adressDefault);
    </script>
    <script src="../public/map.js">
    </script>
    <script src="../public/open-menu-burger.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
</body>