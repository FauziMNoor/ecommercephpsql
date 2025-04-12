<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<?php 
include 'koneksi.php'; 
?>

<h1>Tambah Produk Baru</h1>

<!-- Form Input Produk -->
<form method="POST" action="" enctype="multipart/form-data">
    Nama Produk : <input type="text" name="nama_produk" required><br><br>
    Kategori    : 
    <select name="kategori" required>
        <option value="Pakaian">Pakaian</option>
        <option value="Aksesoris">Aksesoris</option>
    </select><br><br>
    Harga       : <input type="number" name="harga" required><br><br>
    Gambar      : <input type="file" name="gambar" required><br><br>

    <button type="submit" name="simpan">Simpan Produk</button>
</form>

<?php
// Proses Simpan Data
if(isset($_POST['simpan'])){
    $nama_produk = $_POST['nama_produk'];
    $kategori    = $_POST['kategori'];
    $harga       = $_POST['harga'];

    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    // Pindahkan file gambar ke folder gambar/
    move_uploaded_file($tmp, "gambar/".$gambar);

    // Simpan ke database
    mysqli_query($conn, "INSERT INTO produk VALUES(NULL, '$nama_produk', '$kategori', '$harga', '$gambar')");

    echo "<br><br>Produk Berhasil Ditambahkan! <a href='index.php'>Kembali</a>";
}
?>
