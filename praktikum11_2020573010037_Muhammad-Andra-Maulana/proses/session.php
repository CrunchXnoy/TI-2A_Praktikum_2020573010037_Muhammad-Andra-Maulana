<?php
    session_start();
    require "koneksi.php";
    if(empty($_SESSION['email'])){
      echo "<script>window.location='sign-in';</script>";
    }else{
      $hasil = mysqli_query($conn,"SELECT * FROM user u LEFT JOIN tb_mahasiswa mhs ON u.id = mhs.id_user WHERE email='$_SESSION[email]'");
      $result = mysqli_query($conn, "SELECT * FROM user");
      $sidebar = mysqli_query($conn, "SELECT * FROM sidebar");
      $row = mysqli_fetch_array($hasil);
      }
      
?>