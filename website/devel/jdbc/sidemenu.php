<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "JDBC type 4 driver";
  $content = "<a href=\"index.php?op=devel&amp;sub=jdbc&amp;id=faq\" title=\"JayBird FAQ\">JayBird FAQ</a>

  <br>";

  sidebox($title,$content);

?>
