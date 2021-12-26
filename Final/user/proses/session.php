<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","growtani")
    or die ("koneksi gagal");
    if(empty($_SESSION['email'])){
      echo "<script>window.location='../landing';</script>";
    }else{
      $hasil = mysqli_query($conn,"SELECT * FROM user u LEFT JOIN tb_mahasiswa mhs ON u.id = mhs.id_user WHERE email='$_SESSION[email]'");
      $row = mysqli_fetch_array($hasil);
      }
      
?>