<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "JDBC type 4 driver";
  $content = "<a href=\"index.php?op=devel&amp;sub=jdbc&amp;id=faq\" title=\"JayBird FAQ\">JayBird FAQ</a>

  <br>
  <a href=\"index.php?op=devel&amp;sub=jdbc&amp;id=aboutjbird\" title=\"About JayBird\">About JayBird</a>

  <br>
  ";

  sidebox($title,$content);

?>
