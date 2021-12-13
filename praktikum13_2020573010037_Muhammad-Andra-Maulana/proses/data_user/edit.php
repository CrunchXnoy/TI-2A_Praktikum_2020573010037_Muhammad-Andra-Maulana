<?php

//include koneksi database
require "../koneksi.php";

//get data dari form
$id                 = $_POST['id'];
$username           = $_POST['username'];
$email              = $_POST['email'];
$password           = $_POST['password'];
$level              = $_POST['level'];

//query insert data ke dalam database
$query = "UPDATE `user` SET `username` = '$username', `email` = '$email', `password` = MD5('$password'), `level` = '$level' WHERE `user`.`id` = $id";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php 
    header("location: ../../user");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>