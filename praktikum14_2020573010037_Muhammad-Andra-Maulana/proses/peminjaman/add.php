<?php
session_start();

$brg = $_POST['brg'];
$mk = $_POST['mk'];

$select = mysqli_query($conn, "SELECT id FROM user WHERE username ='$_SESSION[username]'");
$hasilnya = mysqli_fetch_array($select);

if($hasilnya){
    $select1 = mysqli_query($conn, "SELECT barang FROM tb_peminjaman WHERE barang= '$brg'");
    $hasilnya1 = mysqli_fetch_array($select1);
    exit();
    if($hasilnya1['barang'] == '$brg' ) {
        echo "Peminjaman gagal dilakukan karena barang sudah dipinjam<br>";
        header("location: ../../peminjaman");
    }else {
        $input = mysqli_query($conn, "INSERT INTO tb_peminjaman (barang,user,status,matakuliah
        VALUES ($brg,$hasilnya[id], 1, '$mk'");
    }
}

?>