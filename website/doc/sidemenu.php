<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "Documentation";
  $content = "
  Here we begin the project to build a centralized, linked index of 
  Firebird/InterBase documentation to put what you need literally at 
  your fingertips.
  <br>";
  sidebox($title,$content);
  
  $title = "Firebird Documentation Project";
  $content = "
  This Firebird's sub-project is aimed to provide you with high-quality 
  documentation for Firebird. If you are interested in our documentation 
  developments, visit the <A href=index.php?op=devel>Developer's corner</A>.
  <br>";

  sidebox($title,$content);
  
  $title = "Firebird License Conditions";
  $content = "
  InterBase® was released by Borland under <A href=index.php?op=doc&amp;id=ipl>InterBase 
  Public Licence</A>, a variant of <A href=http://www.mozilla.org/MPL/MPL-1.1.html>Mozilla 
  Public Licence</A> (MPL).
  <br>";

  sidebox($title,$content);

?>
