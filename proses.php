<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil konten dari body permintaan
    $json = file_get_contents('php://input');
    // Decode JSON menjadi array asosiatif
    $data = json_decode($json, true);

    // Ambil nilai dari data
    $nama = $data['nama'] ?? '';
    $deskripsi = $data['deskripsi'] ?? '';

    // Lakukan sesuatu dengan nilai-nilai tersebut, misalnya menyimpannya ke database
    // ...

    // Beri respon ke klien
    echo "Nama Lokasi: " . htmlspecialchars($nama) . "\n";
    echo "Deskripsi Lokasi: " . htmlspecialchars($deskripsi);
} else {
    echo "Metode pengiriman tidak valid.";
}