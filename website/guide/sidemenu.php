<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "Novice's Guide";
  $content = "
  This guide provide you with basic information about Firebird project.
  <p>
  Content:<br>
  <li><A href=\"index.php?op=guide\">Introduction</A> 
  <li><A href=\"index.php?op=guide&amp;id=rdbms\">Firebird relational database</a>
  <li><A href=\"index.php?op=guide&amp;id=project\">Firebird project</A>
  <li><A href=\"index.php?op=guide&amp;id=links\">Other information sources</A>
  <p>
  If you have any further questions or suggestions how we can improve 
  this guide, feel free to ".GetRabbitSafeEMailLink("firebirds","contact us").".
  <br>";

  sidebox($title,$content);

?>
