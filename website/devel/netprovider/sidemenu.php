<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = ".NET data provider";
  $content = "<a href=\"index.php?op=devel&amp;sub=netprovider&amp;id=features\" title=\"Features\">Feature list</a>
  <br>";

  sidebox($title,$content);

?>
