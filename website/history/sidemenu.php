<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "History";
  $content = "
  <li><A href=\"index.php?op=history\">Introduction</A>
  <li><A href=\"index.php?op=history&amp;id=beginning\">How InterBase came to be</A>
  <li><A href=\"index.php?op=history&amp;id=borland\">InterBase at Borland</A>
  <li><A href=\"index.php?op=history&amp;id=opensource\">How InterBase became Open Source</A>
  <li><A href=\"index.php?op=history&amp;id=firebird\">Firebird records</A>
  <p>
  <b>Appendix:</b>
  <p>
  <li><A href=\"index.php?op=history&amp;id=whoiswho\">Who is Who</A>
  <li><A href=\"http://www.cvalde.net/IbRoadmap.htm\">InterBase Roadmap</A>
  <br>";

  sidebox($title,$content);

?>
