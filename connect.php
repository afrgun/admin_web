<?php 
$servername = "localhost";
$database = "erp_web";
$username = "root";
$password = "afrgun123";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
#echo "Koneksi berhasil";
#mysqli_close($conn);

?>