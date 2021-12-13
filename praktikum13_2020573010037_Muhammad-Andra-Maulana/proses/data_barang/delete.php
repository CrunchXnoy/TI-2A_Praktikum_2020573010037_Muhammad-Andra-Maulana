<?php
    require "../koneksi.php";

    $kode_barang = $_GET['id'];

    $query = "DELETE FROM tb_barang WHERE kode_barang = '$kode_barang'";
    
    if($conn->query($query)) {
        header("location: ../../database");
    } else {
        echo "DATA GAGAL DIHAPUS!";
    }
?>