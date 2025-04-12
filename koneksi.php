<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ecommerce";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>
