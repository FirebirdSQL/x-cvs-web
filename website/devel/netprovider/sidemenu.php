<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = ".NET data provider";
  $content = "
  <li><a href=\"index.php?op=devel&amp;sub=netprovider&amp;id=faq\" title=\"Tools\">FAQ</a>
  <li><a href=\"index.php?op=devel&amp;sub=netprovider&amp;id=features\" title=\"Features\">Feature list</a>
  <li><a href=\"index.php?op=devel&amp;sub=netprovider&amp;id=development\" title=\"Development\">Development</a>
  <li><a href=\"index.php?op=devel&amp;sub=netprovider&amp;id=tools\" title=\"Tools\">Tools</a>  
  <br>";

  sidebox($title,$content);

?>
