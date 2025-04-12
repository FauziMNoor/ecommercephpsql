<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];

// ambil data produk
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'"));

// masukkan ke session keranjang
$_SESSION['keranjang'][$id] = [
    'nama' => $data['nama_produk'],
    'harga' => $data['harga'],
    'jumlah' => 1
];

echo "Produk berhasil ditambahkan ke keranjang! <a href='keranjang.php'>Lihat Keranjang</a> | <a href='index.php'>Kembali</a>";
