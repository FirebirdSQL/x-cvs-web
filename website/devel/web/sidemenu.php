<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "Firebird Web Team";
  $content = "<li><a href=\"index.php?op=devel&sub=web\">Changes</a>
  <br>
  <li><a href=\"index.php?op=devel&sub=web&id=webtools\">About our Web tools</a>
  <br>
  ";

  sidebox($title,$content);

?>
