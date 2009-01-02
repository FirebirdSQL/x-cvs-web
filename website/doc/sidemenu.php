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
  sidebox($title,$content,1);
  
  $title = "Firebird Documentation Project";
  $content = "
  This Firebird subproject aims to provide you with high-quality
  documentation for Firebird. If you are interested in our documentation
  developments, visit the <A href=index.php?op=devel&sub=doc>
  Documentation Subproject pages</A> in the Developer's corner.
  <br>";

  sidebox($title,$content);
  
  $title = "Firebird License Conditions";
  $content = "
  InterBase&reg; was released by Inprise under <A href=\"index.php?op=doc&amp;id=ipl\">InterBase 
  Public Licence</A>.   New Firebird&reg; modules are released under the <A href=\"index.php?op=doc&amp;id=idpl\">Initial Developer's Public License</a>.  Both are variants of the <A href=http://www.mozilla.org/MPL/MPL-1.1.html>Mozilla 
  Public Licence V.1.1</A> (MPL).
<br><br>
  Firebird Project documentation is released under the <a href=\"./manual/pdl.html\">Public Documentation License</a> unless stated otherwise.
  <br>";

  sidebox($title,$content,2);

?>
