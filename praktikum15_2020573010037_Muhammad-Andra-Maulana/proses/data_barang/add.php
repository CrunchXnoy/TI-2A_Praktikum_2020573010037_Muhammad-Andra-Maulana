<?php

//include koneksi database
require "../koneksi.php";

//get data dari form
$kode_barang        = $_POST['kode_barang'];
$nama_barang        = $_POST['nama_barang'];
$keterangan         = $_POST['keterangan'];
$gambar             = $_POST['gambar'];
$stok               = $_POST['stok'];

if(empty($nama_barang)){
    $nama_barang = "DATA KOSONG";
}
if(empty($keterangan)){
    $keterangan = "DATA KOSONG";
}
if(empty($gambar)){
    $gambar = "assets/empty.jpg";
}
if(empty($stok)){
    $stok = "0";
}

//query insert data ke dalam database
$query = "INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `keterangan`, `gambar`, `stok`) VALUES ($kode_barang, '$nama_barang', '$keterangan', '$gambar', '$stok')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php 
    header("location: ../../database.php");

} else {
    //pesan error gagal insert data
    echo "Data Gagal Disimpan! <br>";

}

?>