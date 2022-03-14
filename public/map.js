// map -- start

var map = L.map("map").setView([43.42750127515835, -0.5714950582478197], 11);

L.tileLayer(
  "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
  {
    attribution:
      'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 20,
    minZoom: 4,
    id: "mapbox/streets-v11",
    tileSize: 512,
    zoomOffset: -1,
    accessToken:
      "pk.eyJ1IjoicGF1bC1zZXJyYW5vIiwiYSI6ImNsMG1md2NyZDA2NHcza3BhNDZuZG1jNzMifQ.1w7IuCAcF1GDd22qb4eJ9Q",
  }
).addTo(map);

var weddingMarkerIcon = L.icon({
  iconUrl: "../public/img/rings.png",
  iconSize: [50, 50],
  iconAnchor: [25, 25],
});

var partyMarkerIcon = L.icon({
  iconUrl: "../public/img/party.png",
  iconSize: [50, 50],
  iconAnchor: [25, 25],
});

var housingMarkerIcon = L.icon({
  iconUrl: "../public/img/sleep.png",
  iconSize: [50, 50],
  iconAnchor: [25, 25],
});


var events = {
  mairie: {
    spot: "Mairie d'Arthez",
    event: "Mariage civil",
    lat: 43.464725494384766,
    lon: -0.6177549958229065,
    link:
      "https://www.google.com/maps/dir/" +
      adress +
      ",+" +
      cp +
      ",+" +
      ville +
      "/Mairie,+18+Rue+la+Carr%C3%A8re,+64370+Arthez-de-B%C3%A9arn",
    marker: weddingMarkerIcon,
  },
  Salle: {
    spot: "Salle des fêtes",
    event: "Soirée de célébration",
    lat: 43.50549324389578,
    lon: -0.6157836935017258,
    link:
      "https://www.google.com/maps/dir/" +
      adress +
      ",+" +
      cp +
      ",+" +
      ville +
      "/Salle+des+fêtes+Maison+tous+d+Hagetaubin,+64370,+Hagetaubin",
    marker: partyMarkerIcon,
  },
};

var houses = {
  "Chambre d'hôte": {
    ville: "Arthèz de Béarn",
    lat: 43.46139599730327,
    lon: -0.601218994986823,
    link: "https://www.chambres-hotes.fr/chambres-hotes_o-jardin_arthez-de-bearn_h4114288.htm",
    time: "6 min",
  },
  "Maison campagne": {
    ville: "Villenave d'Arthez",
    lat: 43.409646449775565,
    lon: -0.49921917921892606,
    link: "https://www.tripadvisor.fr/VacationRentalReview-g1915792-d20307020-Maison_de_campagne-Cescau_Bearn_Bearn_Basque_Country_Pyrenees_Atlantiques_Nouvelle_A.html",
    time: "16 min",
  },
  "Chalet pleine nature": {
    ville: "Villeségure",
    lat: 43.3578249823397,
    lon: -0.6835942269026418,
    link: "https://www.holidaylettings.co.uk/rentals/viellesegure/6758001?m=59524",
    time: "27 min",
  },
  Bungalow: {
    ville: "Fichous-Ruiamyou",
    lat: 43.48146533669104,
    lon: -0.4560742379544536,
    link: "https://www.tripadvisor.fr/VacationRentalReview-g1915850-d12724430-CHALET_STUDIO_EN_BEARN-Fichous_Riumayou_Bearn_Bearn_Basque_Country_Pyrenees_Atlantiq.html",
    time: "18 min",
  },
  Maison: {
    ville: "Piets-Plasence-Moustrou",
    lat: 43.52571326654744,
    lon: -0.49853253371111356,
    link: "https://travel.homerez.com/fr/book/87446964/property?from=2022-04-02&to=2022-04-03&numberOfGuests=2&adults=2",
    time: "15 min",
  },
};

for (e in events) {
  var weddingMarker = L.marker([events[e].lat, events[e].lon], {
    icon: events[e].marker,
  }).addTo(map);
  weddingMarker.bindPopup(
    "<p>" +
      events[e].spot +
      "</p><p>" +
      events[e].event +
      "</p><a href='" +
      events[e].link +
      "' target='_blank'><p>Itinéraire</p></a>"
  );
}

for (house in houses) {
  var houseMarker = L.marker([houses[house].lat, houses[house].lon], {
    icon: housingMarkerIcon,
  }).addTo(map);
  houseMarker.bindPopup(
    "<div class='marker-block'><a href='" +
      houses[house].link +
      "' target='_blank'><p>" +
      house +
      "</p><p>" +
      houses[house].ville +
      "</p><p><img class='map-car-icon' src='../public/img/car.png' alt='voiture'>" +
      houses[house].time +
      "</p></a></div>"
  );
}

// map -- end

// Loader --start

$(window).on("load", function () {
  $(".loader-main").fadeOut(750);
});

// Loader -- end
