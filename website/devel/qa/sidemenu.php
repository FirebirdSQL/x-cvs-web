<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "Firebird QA";
  $content = "
  <li><a href=\"index.php?op=devel&amp;sub=qa#peerreview\" title=\"Peer Review\">Peer Review</a>
  <li><a href=\"index.php?op=devel&amp;sub=qa#codeaudit\" title=\"Code Audit\">Code Audit</a>
  <li><a href=\"index.php?op=devel&amp;sub=qa#devtestcases\" title=\"Development Test Cases\">Development Test Cases</a>
  <li><a href=\"index.php?op=devel&amp;sub=qa#blackbox\" title=\"Automated Black-box Testing\">Automated Black-box Testing</a>
  <p>
  <li><a href=\"index.php?op=devel&amp;sub=qa&amp;id=testdesign_howto\" title=\"How to design test\">How to design new tests</a>
  <li><a href=\"index.php?op=devel&amp;sub=qa&amp;id=testlist\" title=\"Tests in development\">Tests in development</a>
  <br>";

  sidebox($title,$content);

?>
