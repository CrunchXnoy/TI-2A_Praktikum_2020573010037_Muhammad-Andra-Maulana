<?php

//include koneksi database
require "../koneksi.php";

//get data dari form
$username           = $_POST['username'];
$email              = $_POST['email'];
$password           = $_POST['password'];
$level              = $_POST['level'];

//query insert data ke dalam database
$query = "INSERT INTO `user` (`id`, `username`, `email`, `password`, `level`) VALUES (NULL, '$username', '$email', MD5('$password'), '$level')";


//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if ($conn->query($query)) {

    //redirect ke halaman index.php 
    header("location: ../../user");
} else {
    //pesan error gagal insert data
    echo "Data Gagal Disimpan! <br>";
}
