<?php
    require "../koneksi.php";

    $id = $_GET['id'];

    $query = "DELETE FROM user WHERE id = '$id'";
    
    if($conn->query($query)) {
        header("location: ../../user");
    } else {
        echo "DATA GAGAL DIHAPUS!";
    }
?>