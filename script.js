var map = L.map("map").setView([51.505, -0.09], 13);

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution:
    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

const modal = document.querySelector("#modal");
const simpan = document.querySelector("#simpan");
const cancel = document.querySelector("#cancel");

cancel.addEventListener("click", () => {
  modal.close();
});

map.on("click", function (e) {
  // Get the latitude and longitude from the event object
  var lat = e.latlng.lat;
  var lng = e.latlng.lng;

  // Output the coordinates to the console
  console.log("Coordinates: " + lat + ", " + lng);

  // Optionally, you can add a marker at the clicked location
  L.marker([lat, lng])
    .addTo(map)
    .bindPopup("Coordinates: " + lat + ", " + lng)
    .openPopup();

  modal.showModal();
});
