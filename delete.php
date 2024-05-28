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
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $id_poi = $data['marker_id'] ?? '';

    if ($id_poi) {
        $id_poi = intval($id_poi);
        $sql = "DELETE FROM poi_data WHERE PK_POI = ?";
        $stmt = mysqli_prepare($kon, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id_poi);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo json_encode(array("status" => "success", "message" => "Data POI berhasil dihapus."));
            } else {
                echo json_encode(array("status" => "error", "message" => "Data dengan ID POI $id_poi tidak ditemukan."));
            }

            mysqli_stmt_close($stmt);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error: " . mysqli_error($kon)));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "ID POI tidak valid."));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Metode pengiriman tidak valid."));
}

mysqli_close($kon);
?>
