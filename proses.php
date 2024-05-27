<?php

$host = "localhost";
$user="root";
$password="rahasia";
$db ="poi";

$kon = mysqli_connect($host, $user, $password, $db);
if(!$kon){
    die("Koneksi gagal: " . mysqli_connect_error());
}

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



    

    // Beri respon ke klien
    echo "Nama Lokasi: " . htmlspecialchars($nama) . "\n";
    echo "Deskripsi Lokasi: " . htmlspecialchars($deskripsi) . "\n";
    echo "Long: " . htmlspecialchars($longitude) . "\n";
    echo "Lat: " . htmlspecialchars($latitude);
} else {
    echo "Metode pengiriman tidak valid.";
}