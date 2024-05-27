var map = L.map("map").setView([51.505, -0.09], 13);

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution:
    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

const modal = document.querySelector("#modal");
const simpan = document.querySelector("#simpan");
const cancel = document.querySelector("#cancel");
const longitude = document.querySelector("#longitude");
const latittude = document.querySelector("#latittude");

cancel.addEventListener("click", () => {
  modal.close();
});

// Event yang terjadi kalo map diklik
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

  longitude.innerHTML = lng;
  latittude.innerHTML = lat;
  modal.showModal();
});

//Menjalankan fungsi asyncronous ketika simpan di klik
simpan.addEventListener("click", (e) => {
  e.preventDefault();

  const nama = document.getElementById("nama").value;
  const deskripsi = document.getElementById("deskripsi").value;

  const data = {
    nama: nama,
    deskripsi: deskripsi,
  };

  fetch("proses.php", {
    method: "POST", // Metode HTTP yang digunakan
    headers: {
      "Content-Type": "application/json", // Jenis konten yang dikirim
    },
    body: JSON.stringify(data), // Konversi objek data menjadi JSON
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("ERROR");
      }
      return response.text();
    })
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.error("Terjadi kesalahan: ", data);
    });

  modal.close();
});
