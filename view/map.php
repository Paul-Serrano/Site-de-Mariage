<?php

require_once "../includes/_nav.php";
require_once "../controller/map_post.php";

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
        var cp = <?php echo json_encode($cp); ?>;
        var adress = <?php echo json_encode($adress); ?>;
        var ville = <?php echo json_encode($ville); ?>;
        console.log(ville);
    </script>
    <script src="../public/map.js">
    </script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
</body>