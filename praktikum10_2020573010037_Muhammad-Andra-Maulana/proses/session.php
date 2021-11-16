<?php
    session_start();
    require "koneksi.php";
    if(empty($_SESSION['email'])){
      echo "<script>window.location='sign-in';</script>";
    }else{
      $hasil = mysqli_query($conn,"select * from user WHERE email='$_SESSION[email]'");
      $row = mysqli_fetch_array($hasil);
      }
      
?>