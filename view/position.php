<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
<!--     <link rel="stylesheet" href="./assets/css/style.scss"> -->
    <link rel="stylesheet" href="./assets/css/base.css">
<!--     <link rel="stylesheet" href="./assets/css/position.scss"> -->
    <link rel="stylesheet" href="./assets/css/position.css">

    <title>Carte</title>
</head>

<body>
  <header>
      <section class="header-section-control">
          <a href="./index.php"><img class="header-arrow hover-img" src="assets/images/symbole-fleche-droite-noir.png" alt="Retour"></a>
          <h1>Position</h1>
      </section>
  </header>
  <div id="map">
      <!-- Ici s'affichera la carte -->
  </div>

  <section class="bloc-adresse">
    <h3 class="bloc-adresse-title">Votre adresse : </h3>
    <p id="bloc-adresse-content">Loading...</p>
  </section>
    
  <!-- Fichiers Javascript -->
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin="">
  </script>
    <script type="text/javascript">
      let macarte = null;
      // Fonction d'initialisation de la carte
      function initMap(lat, lon) {
          // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
          macarte = L.map('map').setView([lat, lon], 15);
          // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
          L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
              attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
              minZoom: 10,
              maxZoom: 20
          }).addTo(macarte);

     // Créer une nouvelle icône pour le marqueur
let myIcon = L.icon({
  iconUrl: 'https://tesla-app-php.tesla-app-ergo.repl.co/assets/images/cursor.png', // Chemin vers l'image de votre icône
  iconSize: [90, 105], // Taille de l'icône en pixels
  iconAnchor: [19, 38], // Point d'ancrage de l'icône
  popupAnchor: [0, -30] // Point d'ancrage du popup
});

// Créer le marqueur avec votre nouvelle icône
let marker = new L.marker([lat, lon], { icon: myIcon });
marker.addTo(macarte);

      }

      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else {
          console.log("Geolocation is not supported by this browser.");
        }
      }
        
      function showPosition(position) {
        initMap(position.coords.latitude, position.coords.longitude);
        showDetails(position.coords.latitude, position.coords.longitude);
      }
    
      window.onload = function () {
        getLocation();
      };

      function showDetails(lat, lon) {
        let nominatimUrl = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`;
        fetch(nominatimUrl)
          .then(response => response.json())
          .then(data => {
            let address = data.address;
            let addressString = `${address.quarter}, ${address.road}, ${address.postcode} - ${address.city}, ${address.state}`;
            console.log(address)
            document.getElementById("bloc-adresse-content").innerText = `${addressString}`;
          });
      }
    </script>
  </body>
</html>

