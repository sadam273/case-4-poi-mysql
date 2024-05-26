<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div id="map"></div>
    
    <dialog id="modal">
        <h2>Simpan ke database?</h2>
        <p>Longitude: <div id="longitude"></div></p>
        <p >Latitude: <div id="latittude"></div></p>
        <form class="form" method="dialog">
            <label for="nama"> Nama Lokasi</label>
            <input type="text" name="nama"> <br>
            <label for="nama"> Deskripsi Lokasi</label>
            <input type="text" name="deskripsi"> <br>
            <button id="cancel">Cancel</button>
            <button id="simpan" type="submit">Simpan</button>
        </form>
        

    </dialog>
    
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

    <script src="script.js"></script>
</body>

</html>
