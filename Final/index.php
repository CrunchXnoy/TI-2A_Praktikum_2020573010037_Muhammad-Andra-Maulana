<?php
$link = array("home", "landing", "panel", "soon", "p2p");

if(empty($_GET['x'])){
  echo "<script>window.location='landing'</script>";
}else{
  foreach($link as $value){
    if($value == $_GET['x']){
      require "$value".".php";
    }
  }
}
?>