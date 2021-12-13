<?php

//include koneksi database
require "../koneksi.php";

//get data dari form
$id             = $_POST['id'];
$icon           = $_POST['icon'];
$path1          = $_POST['path1'];
$path2          = $_POST['path2'];
$path3          = $_POST['path3'];
$sidebar_name   = $_POST['sidebar_name'];
$sidebar_url    = $_POST['sidebar_url'];
$sidebar_level  = $_POST['sidebar_level'];
// $is_active      = $_POST['is_active'];

if ( isset($_POST['check']) ) {
    $check = "0";
} else { 
    $check = "1";
}

//query insert data ke dalam database
$query = "UPDATE `sidebar` SET `icon` = '$icon', `path1` = '$path1', `path2` = '$path2', `path3` = '$path3', `sidebar_name` = '$sidebar_name', `sidebar_url` = '$sidebar_url', `sidebar_level` = '$sidebar_level', `is_active` = '$check' WHERE `sidebar`.`id` = $id";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php 
    header("location: ../../panel");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>