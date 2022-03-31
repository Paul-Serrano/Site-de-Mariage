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
            <p>Pour une liste plus exhaustives des possibilités de logement, voici deux liens qui pourraient vous être utiles :</p>
            <div class="map-side-block-content">
                <a class="map-link" target="_blank" href="https://www.airbnb.fr/s/Arthez~de~B%C3%A9arn--France/homes?tab_id=home_tab&refinement_paths%5B%5D=%2Fhomes&flexible_trip_dates%5B%5D=april&flexible_trip_dates%5B%5D=may&flexible_trip_lengths%5B%5D=weekend_trip&date_picker_type=calendar&query=Arthez-de-B%C3%A9arn%2C%20France&place_id=ChIJ4UzTbzn1Vg0RMKwTSBdlBgQ&checkin=2022-08-13&checkout=2022-08-14&source=structured_search_input_header&search_type=autocomplete_click">
                    <img class="map-icon" src="../public/img/airbnb.png" alt="airbnb">
                </a>
                <a class="map-link" target="_blank" href="https://www.booking.com/searchresults.fr.html?ac_position=0&ac_suggestion_list_length=5&group_adults=2&group_children=0&from_sf=1&checkin_month=8&sb=1&search_pageview_id=b4b96eb14a800103&checkin_year=2022&checkout_month=8&b_h4u_keep_filters=&checkout_year=2022&dest_id=-1408624&checkout_monthday=14&sid=9f0199190780c944ba6a0abbbe35bfb8&src=index&no_rooms=1&ss_raw=Arthez&ac_suggestion_theme_list_length=0&place_id_lon=-0.6&place_id_lat=43.4667&auth_success=1&src_elem=sb&ac_click_type=b&ss=Arthez-de-B%C3%A9arn%2C+Aquitaine%2C+France&search_selected=true&dest_type=city&label=gen173bo-1DCAEoggI46AdIDVgDaE2IAQGYAQ24ARfIAQzYAQPoAQH4AQOIAgGYAgKoAgO4AuOYl5IGwAIB0gIkMjcxOThmZTgtMGEzNC00ZDJjLTg2MDEtOTU0NjdjOWUxOTM52AIE4AIB&ac_langcode=fr&error_url=https%3A%2F%2Fwww.booking.com%2Findex.fr.html%3Flabel%3Dgen173bo-1DCAEoggI46AdIDVgDaE2IAQGYAQ24ARfIAQzYAQPoAQH4AQOIAgGYAgKoAgO4AuOYl5IGwAIB0gIkMjcxOThmZTgtMGEzNC00ZDJjLTg2MDEtOTU0NjdjOWUxOTM52AIE4AIB%3Bsid%3D9f0199190780c944ba6a0abbbe35bfb8%3Bsb_price_type%3Dtotal%26%3B&is_ski_area=&sb_lp=1&checkin_monthday=13">
                    <img class="map-icon" src="../public/img/booking.png" alt="booking">
                </a>
            </div>
        </div>
    </main>
    <script src="../public/map.js">
    </script>
    <script src="../public/open-menu-burger.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
</body>