<?php
$link = array("home", "panel", "user", "peminjaman", "settings", "database", "logpeminjaman");

if(empty($_GET['x'])){
  echo "<script>window.location='home'</script>";
}else{
  foreach($link as $value){
    if($value == $_GET['x']){
      require "$value".".php";
    }
  }
}
?>