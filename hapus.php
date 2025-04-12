<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<?php 
include 'koneksi.php';

$id = $_GET['id'];

// Hapus gambar dari folder
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'"));
unlink("gambar/".$data['gambar']);

// Hapus dari database
mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");

header("location:index.php");
?>
