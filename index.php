<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php");
    exit;
}
?>
<a href="logout.php">Logout</a>
<link rel="stylesheet" type="text/css" href="style.css">

<?php
include 'koneksi.php';


// Ambil filter kategori (jika ada)
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// Query ambil data produk
if($kategori != ''){
    $query = mysqli_query($conn, "SELECT * FROM produk WHERE kategori='$kategori'");
} else {
    $query = mysqli_query($conn, "SELECT * FROM produk");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <style>
        .produk {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            display: inline-block;
            width: 200px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }
        img {
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h1>Daftar Produk</h1>

<!-- Link tambah produk -->
<a href="tambah.php">+ Tambah Produk Baru</a>

<!-- Form Filter -->
<h2>Filter Produk</h2>
<form method="GET" action="">
    <select name="kategori">
        <option value="">-- Semua Kategori --</option>
        <option value="Pakaian" <?php if($kategori=='Pakaian') echo 'selected'; ?>>Pakaian</option>
        <option value="Aksesoris" <?php if($kategori=='Aksesoris') echo 'selected'; ?>>Aksesoris</option>
    </select>
    <button type="submit">Filter</button>
</form>

<!-- Looping Produk -->
<?php while($data = mysqli_fetch_assoc($query)) { ?>
    <div class="produk">
        <a href="detail.php?id=<?php echo $data['id']; ?>">Lihat Detail</a> | 
        <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> | 
        <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin mau hapus?')">Hapus</a>

        <img src="gambar/<?php echo $data['gambar']; ?>" width="150" height="150">
        <h3><?php echo $data['nama_produk']; ?></h3>
        <p>Kategori: <?php echo $data['kategori']; ?></p>
        <p>Harga: Rp <?php echo number_format($data['harga']); ?></p>

        <!-- Link Edit & Hapus -->
        <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> | 
        <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
    </div>
<?php } ?>

</body>
</html>
