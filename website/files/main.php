<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

include("page_engine.php");
?>

