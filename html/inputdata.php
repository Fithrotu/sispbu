<?php
include "connect.php";
$kode_spbu = $_POST['kode_spbu'];
$lokasi_spbu = $_POST['lokasi_spbu'];
$fasilitas_spbu = $_POST['fasilitas_spbu'];
$produk = $_POST['produk'];
$jam_operasi = $_POST['jam_operasi'];
$gambar = $_FILES["file"]["name"];

$file_basename = substr($gambar, 0, strripos($gambar, '.')); // get file extention
$file_ext = substr($gambar, strripos($gambar, '.')); // get file name
$allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "PNG", "JPEG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$link = "../assets/gambar/" . $kode_spbu . ".jpg";
if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/JPEG") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/PNG") || ($_FILES["file"]["type"] == "image/png")) && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        if (file_exists($link)) {
            unlink($link);
            move_uploaded_file($_FILES["file"]["tmp_name"], $link);
            $query = mysql_query("INSERT INTO `spbulist` (`kode_spbu`, `lokasi_spbu`, `fasilitas_spbu`, `jam_operasi`, `produk`)"
                    . "VALUES ('$kode_spbu', '$lokasi_spbu', '$fasilitas_spbu', '$jam_operasi', '$produk')");
            if ($query === TRUE) {
                ?><script language="JavaScript">alert('Data Anda telah tersimpan');
                        document.location = 'tambahdata.php'</script><?php
            } else {
                ?><script language="JavaScript">alert('Data gagal disimpan');
                        document.location = 'tambahdata.php'</script><?php
                echo mysql_error();
            }
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $link);
            $query = mysql_query("INSERT INTO `spbulist` (`kode_spbu`, `lokasi_spbu`, `fasilitas_spbu`, `jam_operasi`, `produk`)"
                    . "VALUES ('$kode_spbu', '$lokasi_spbu', '$fasilitas_spbu', '$jam_operasi', '$produk')");
            if ($query === TRUE) {
                ?><script language="JavaScript">alert('Data Anda telah tersimpan');
                        document.location = 'tambahdata.php'</script><?php
            } else {
                ?><script language="JavaScript">alert('Data gagal disimpan');
                        document.location = 'tambahdata.php'</script><?php
                echo mysql_error();
            }
        }
    }
} else {
    ?><script language="JavaScript">alert('error');
            document.location = 'tambahdata.php'</script><?php
}
?>