<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "poi";

$kon = mysqli_connect($host, $user, $password, $db);
if (!$kon) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil konten dari body permintaan
    $json = file_get_contents('php://input');
    // Decode JSON menjadi array asosiatif
    $data = json_decode($json, true);

    // Ambil nilai dari data
    $id_poi = $data['id_poi'] ?? '';
    $nama = $data['nama'] ?? '';
    $deskripsi = $data['deskripsi'] ?? '';
    $longitude = $data['longitude'] ?? '';
    $latitude = $data['latitude'] ?? '';

    // Update data di database
    if ($id_poi && $nama && $deskripsi && $longitude && $latitude) {
        $sql = "UPDATE poi_data SET KOORDINAT_POSISI = POINT($longitude, $latitude), NAMA = '$nama', DESKRIPSI = '$deskripsi' WHERE PK_POI = $id_poi";
        $result = mysqli_query($kon, $sql);

        if ($result) {
            echo "Data POI berhasil diupdate.";
        } else {
            echo "Error: " . mysqli_error($kon);
        }
    } else {
        echo "Data yang dikirim tidak lengkap.";
    }
} else {
    echo "Metode pengiriman tidak valid.";
}

mysqli_close($kon);
?>
