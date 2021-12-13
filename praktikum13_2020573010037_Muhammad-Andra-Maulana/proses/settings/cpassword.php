<?php
    require "../koneksi.php";

    $id             = $_GET['id'];
    $cpassword      = $_POST['cpassword'];
    $npassword      = $_POST['npassword'];
    $npassword2     = $_POST['npassword2'];

    $query = "UPDATE `user` SET `password` = MD5('$npassword') WHERE `user`.`id` = $id";

    if($npassword == $cpassword){
        echo "<script>alert ('Password baru tidak boleh sama dengan password saat ini')</script>";
        echo "<script>window.location='../../settings.php';</script>";
    }else if ($npassword != $npassword2){
        echo "<script>alert ('Password baru tidak sama dengan konfirmasi password baru')</script>";
        echo "<script>window.location='../../settings.php';</script>";
    }else if($conn->query($query)) {
        echo "<script>alert ('Password berhasil di ganti')</script>";
        echo "<script>window.location='../../settings.php';</script>";
    }
    
    // if($conn->query($query)) {
    //     header("location: ../../settings.php");
    // } else {
    //     echo "Gagal Mengganti Password!";
    // }
?>