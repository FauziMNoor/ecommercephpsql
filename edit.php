<?php 
include 'koneksi.php'; 

$id = $_GET['id']; // ambil id produk dari url
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'"));
?>

<h1>Edit Produk</h1>

<form method="POST" action="" enctype="multipart/form-data">
    Nama Produk : <input type="text" name="nama_produk" value="<?php echo $data['nama_produk'] ?>" required><br><br>
    Kategori    : 
    <select name="kategori" required>
        <option value="Pakaian" <?php if($data['kategori']=='Pakaian') echo 'selected'; ?>>Pakaian</option>
        <option value="Aksesoris" <?php if($data['kategori']=='Aksesoris') echo 'selected'; ?>>Aksesoris</option>
    </select><br><br>
    Harga       : <input type="number" name="harga" value="<?php echo $data['harga'] ?>" required><br><br>
    Gambar Baru : <input type="file" name="gambar"><br><br>
    <img src="gambar/<?php echo $data['gambar'] ?>" width="150"><br><br>

    <button type="submit" name="update">Update Produk</button>
</form>

<?php
if(isset($_POST['update'])){
    $nama_produk = $_POST['nama_produk'];
    $kategori    = $_POST['kategori'];
    $harga       = $_POST['harga'];

    if($_FILES['gambar']['name'] != ''){
        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp, "gambar/".$gambar);
    } else {
        $gambar = $data['gambar']; // gambar lama
    }

    mysqli_query($conn, "UPDATE produk SET 
        nama_produk='$nama_produk',
        kategori='$kategori',
        harga='$harga',
        gambar='$gambar' 
        WHERE id='$id'
    ");

    echo "<br><br>Produk Berhasil Diupdate! <a href='index.php'>Kembali</a>";
}
?>
