/* map box inställningar */
mapboxgl.accessToken = 'pk.eyJ1Ijoia2FyeWUiLCJhIjoiY2pwOXRtbWc1MGdmNjNwc2JmdGxzeDR5byJ9.whp8f2Ttws57ctAf_stuag';

/* start position NTI*/
var latNTI = 59.336885;
var lonNTI = 18.048323;

/* skapa karta */
var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v9',
  center: [lonNTI, latNTI],
  zoom: 10
});

getLocation();

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    console.log("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  var latHem = position.coords.latitude;
  var lonHem = position.coords.longitude;
  console.log("Latitude: " + latHem + "<br>Longitude: " + lonHem);

  /* infoga en marker på kartan */
  var marker = new mapboxgl.Marker()
    .setLngLat([lonHem, latHem])
    .addTo(map);

  /* skicka lat och lon till php */
  var ajax = new XMLHttpRequest();

  /* Omvandla data till POST */
  var postData = new FormData();
  postData.append("lat", latHem);
  postData.append("lon", lonHem);

  /* skicka data */
  ajax.open("POST", "./trafiklab.php")
  ajax.send(postData);

  /* ta emot svaret */
  ajax.addEventListener("loadend", function () {
    //console.log(this.responseText);

    var hållplatser = JSON.parse(this.responseText);

    hållplatser.forEach(function (hållplats) {

      console.log(hållplats.name, hållplats.lat, hållplats.lon);

      /* Skapa en special markerikon för skolan */
      var buss = document.createElement('div');
      buss.className = 'buss';

      /* Skapa en popup med text */
      var popup = new mapboxgl.Popup({ offset: 25 })
        .setText(hållplats.name);

      /* Infoga specialmarkern */
      new mapboxgl.Marker(buss)
        .setLngLat([hållplats.lon, hållplats.lat])
        .setPopup(popup)
        .addTo(map);

    });
  });
}