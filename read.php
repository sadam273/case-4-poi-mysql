<?php

require "koneksi.php";

$sql = "SELECT PK_POI, X(KOORDINAT_POSISI) AS latitude, Y(KOORDINAT_POSISI) AS longitude, NAMA, DESKRIPSI FROM poi_data";
$result = mysqli_query($kon, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(array("message" => "Tidak ada data POI."));
}

?>