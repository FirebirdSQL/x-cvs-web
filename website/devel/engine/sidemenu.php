<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $content = "
  <li><a href=\"index.php?op=devel&amp;sub=engine&amp;id=development#tools\" title=\"Used tools\">Tools</a>
  <li><a href=\"index.php?op=devel&amp;sub=engine&amp;id=development#environment\" title=\"Environment setup\">Environment</a>
  <li><a href=\"index.php?op=devel&amp;sub=engine&amp;id=development#compiling\" title=\"Compiling the documentation\">Compiling</a>
  <li><a href=\"index.php?op=devel&amp;sub=engine&amp;id=development#deploying\" title=\"Deploying the compiled files\">Deploying</a>
  <li><a href=\"index.php?op=devel&amp;sub=engine&amp;id=development#contribute\" title=\"Contribute to the Firebird Documentation Project\">Contribute</a>
  <li><a href=\"index.php?op=devel&amp;sub=engine&amp;id=development#guidelines\" title=\"Docbook documentation guidelines\">Guidelines</a>
  <li><a href=\"index.php?op=devel&amp;sub=engine&amp;id=development#faq\" title=\"Frequently Asked Questions\">FAQ</a>
  <li><a href=\"index.php?op=devel&amp;sub=engine&amp;id=development#additional\" title=\"Additional informations and resources\">Additional</a>
  <li><a href=\"index.php?op=files\">Downloads</A>
  <br>";

  sidebox($title,$content);
?>
