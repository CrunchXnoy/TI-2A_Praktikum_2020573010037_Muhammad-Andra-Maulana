<?php 

require "../koneksi.php";

$id = $_POST['id_peminjaman'];
$aksi = $_POST ['aksi'];

$sql = mysqli_query($conn, "UPDATE tb_peminjaman SET status = $aksi WHERE id_peminjaman = $id");
if ($sql) {
    echo "<script>alert('Data berhasil diubah!');</script>";
    header("location: ../../datapeminjaman");
} else {
    echo "<script>alert('Data berhasil diubah!');</script>";
    header("location: ../../datapeminjaman");
}

?>