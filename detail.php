<?php 
include 'koneksi.php'; 

$id = $_GET['id']; // ambil id produk dari url

// Query ambil data produk
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'"));
?>

<h1>Detail Produk</h1>

<div style="border:1px solid #ddd; padding:10px; width:300px;">
    <img src="gambar/<?php echo $data['gambar']; ?>" width="200"><br><br>

    <strong>Nama Produk:</strong><br>
    <?php echo $data['nama_produk']; ?><br><br>

    <strong>Kategori:</strong><br>
    <?php echo $data['kategori']; ?><br><br>

    <strong>Harga:</strong><br>
    Rp <?php echo number_format($data['harga']); ?><br><br>

    <a href="index.php">Kembali</a>
</div>
