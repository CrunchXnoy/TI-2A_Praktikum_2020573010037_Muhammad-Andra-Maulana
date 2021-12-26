<?php
session_start();
if(!empty($_SESSION['email'])){
    session_destroy();
    echo "<script>window.location='../home';</script>";
}elseif(empty($_SESSION['email'])){
    echo "<script>window.location='../sign-in';</script>";
}

?>