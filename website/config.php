<?php
if (eregi("config.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

# Site specific configuration
// $bgcolor1 = "#F0F0F0";
$bgcolor1 = "#BBEAD7";
//$bgcolor1 = "#CE383D";
//$bgcolor1 = "#CCCCCC";
$bgcolor2 = "999999";
$bgcolor3 = "FFFFFF";
$bgcolor4 = "CCCCCC";
//$bgcolor4 = "FFFFFF";
$textcolor1 = "#000000";
$textcolor2 = "#FFFFFF";
$sidetop = "<a href=\"index.php?op=contact\"><img src=\"images/sidemenu_top.gif\" border=0></a><br>";
$sidebtm = "<img src=\"images/sidemenu_btm.gif\">";
?>