<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php");
    exit;
}

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

    <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
        a i {
            font-size: 18px;
            color: #555;
            margin: 0 5px;
            transition: 0.3s;
        }
        a i:hover {
            color: #ff4081;
            transform: scale(1.2);
        }
    </style>
</head>
<body>

<h1>Daftar Produk</h1>

<a href="logout.php">Logout</a> |
<a href="keranjang.php"><i class="fas fa-shopping-cart"></i> Keranjang</a> |
<a href="tambah.php">+ Tambah Produk Baru</a>

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
        <img src="gambar/<?php echo $data['gambar']; ?>" width="150" height="150">
        <h3><?php echo $data['nama_produk']; ?></h3>
        <p>Kategori: <?php echo $data['kategori']; ?></p>
        <p>Harga: Rp <?php echo number_format($data['harga']); ?></p>

        <!-- Icon Action -->
        <a href="detail.php?id=<?php echo $data['id']; ?>" title="Detail">
            <i class="fas fa-eye"></i>
        </a>

        <a href="cart.php?id=<?php echo $data['id']; ?>" title="Tambah ke Keranjang">
            <i class="fas fa-cart-plus"></i>
        </a>

        <a href="edit.php?id=<?php echo $data['id']; ?>" title="Edit">
            <i class="fas fa-pen"></i>
        </a>

        <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin mau hapus?')" title="Hapus">
            <i class="fas fa-trash"></i>
        </a>
    </div>
<?php } ?>

</body>
</html>
