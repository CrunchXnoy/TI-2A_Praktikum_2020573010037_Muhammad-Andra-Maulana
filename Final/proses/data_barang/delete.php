<?php
    require "../koneksi.php";

    $id = $_GET['id'];

    $query = "DELETE FROM tb_barang WHERE id = '$id'";
    
    if($conn->query($query)) {
        header("location: ../../database");
    } else {
        echo "DATA GAGAL DIHAPUS!";
    }
?>