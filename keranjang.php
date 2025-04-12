<link rel="stylesheet" type="text/css" href="style.css">
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<?php
session_start();
?>

<h1>Keranjang Belanja</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
    </tr>

    <?php 
    $no = 1;
    if(isset($_SESSION['keranjang'])){
        foreach($_SESSION['keranjang'] as $id => $data){
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td>Rp <?php echo number_format($data['harga']); ?></td>
            <td><?php echo $data['jumlah']; ?></td>
        </tr>
    <?php } } else { ?>
        <tr>
            <td colspan="4">Keranjang kosong</td>
        </tr>
    <?php } ?>
</table>

<a href="index.php">Lanjut Belanja</a>
