<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

# Other links

  $content .= "
  <li><a href=\"index.php?op=devel&amp;sub=doc&amp;id=development#tools\" title=\"Used tools\">Tools</a>
  <li><a href=\"index.php?op=devel&amp;sub=doc&amp;id=development#environment\" title=\"Environment setup\">Environment</a>
  <li><a href=\"index.php?op=devel&amp;sub=doc&amp;id=development#compiling\" title=\"Compiling the documentation\">Compiling</a>
  <li><a href=\"index.php?op=devel&amp;sub=doc&amp;id=development#deploying\" title=\"Deploying the compiled files\">Deploying</a>
  <li><a href=\"index.php?op=devel&amp;sub=doc&amp;id=development#contribute\" title=\"Contribute to the Firebird Documentation Project\">Contribute</a>
  <li><a href=\"index.php?op=devel&amp;sub=doc&amp;id=development#guidelines\" title=\"Docbook documentation guidelines\">Guidelines</a>
  <li><a href=\"index.php?op=devel&amp;sub=doc&amp;id=development#faq\" title=\"Frequently Asked Questions\">FAQ</a>
  <li><a href=\"index.php?op=devel&amp;sub=doc&amp;id=development#additional\" title=\"Additional informations and resources\">Additional</a>
  <li>Downloads
  <br>";

  sidebox($title,$content);

?>
