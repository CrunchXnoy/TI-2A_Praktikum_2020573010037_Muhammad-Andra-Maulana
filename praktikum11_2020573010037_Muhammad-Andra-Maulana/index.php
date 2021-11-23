<?php
$link = array("home", "panel", "mahasiswa");

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