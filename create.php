<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil konten dari body permintaan
    $json = file_get_contents('php://input');
    // Decode JSON menjadi array asosiatif
    $data = json_decode($json, true);

    // Ambil nilai dari data
    $nama = $data['nama'] ?? '';
    $deskripsi = $data['deskripsi'] ?? '';
    $longitude = $data['longitude'] ?? '';
    $latitude = $data['latitude'] ?? '';

    //Masukkan nilai di atas ke database
    if($nama && $deskripsi && $longitude && $latitude){
        $sql1 = "insert into poi_data(KOORDINAT_POSISI, NAMA, DESKRIPSI)  values (POINT($longitude, $latitude), '$nama', '$deskripsi')";
        $q1 = mysqli_query($kon, $sql1); 

    }



    

    // Beri respon ke klien
    echo "Nama Lokasi: " . htmlspecialchars($nama) . "\n";
    echo "Deskripsi Lokasi: " . htmlspecialchars($deskripsi) . "\n";
    echo "Long: " . htmlspecialchars($longitude) . "\n";
    echo "Lat: " . htmlspecialchars($latitude);
} else {
    echo "Metode pengiriman tidak valid.";
}