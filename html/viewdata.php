<?php
include "connect.php";
$id_spbu = $_POST['id_spbu'];
$lokasi = $_POST['lokasi'];
$fasilitas = $_POST['fasilitas'];
$produk = $_POST['produk'];
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];
$gambar = $_FILES["file"]["name"];

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

?>