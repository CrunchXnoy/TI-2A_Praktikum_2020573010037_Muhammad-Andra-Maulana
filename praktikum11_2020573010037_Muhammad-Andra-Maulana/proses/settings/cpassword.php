<?php
    require "../koneksi.php";

    $cpassword      = $_POST['cpassword'];
    $npassword      = $_POST['npassword'];
    $npassword2      = $_POST['npassword2'];

    $query = "UPDATE `user` SET `password` = MD5('$npassword') WHERE `user`.`password` = $cpassword";
    
    if($conn->query($query)) {
        header("location: ../../settings.php");
    } else {
        echo "Gagal Mengganti Password!";
    }
?>