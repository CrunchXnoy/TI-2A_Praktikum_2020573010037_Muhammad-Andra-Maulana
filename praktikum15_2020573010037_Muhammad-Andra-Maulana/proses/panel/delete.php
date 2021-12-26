<?php
    require "../koneksi.php";

    $id = $_GET['id'];

    $query = "DELETE FROM sidebar WHERE id = '$id'";
    
    if($conn->query($query)) {
        header("location: ../../panel.php");
    } else {
        echo "DATA GAGAL DIHAPUS!";
    }
?>