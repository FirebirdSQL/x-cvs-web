<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "Firebird QA";
  $content = "
  <li><a href=\"index.php?op=devel&amp;sub=qa\" title=\"Main page\">Main page</a>
  <li><a href=\"index.php?op=devel&amp;sub=qa&amp;id=methods\" title=\"Methodology and Tools used in Firebird QA\">Methodology and Tools</a>
  <li><a href=\"index.php?op=devel&amp;sub=qa&amp;id=bugreport_howto\" title=\"How to Report Bugs Effectively\">How to Report Bugs</a>
  <li><a href=\"index.php?op=devel&amp;sub=qa&amp;id=qmtest_howto\" title=\"Firebird test suite\">Firebird test suite</a>
  <li><a href=\"index.php?op=devel&amp;sub=qa&amp;id=testdesign_howto\" title=\"How to design test\">How to design new tests</a>
  <li><a href=\"index.php?op=devel&amp;sub=qa&amp;id=testimplementation_howto\" title=\"How to implement test\">How to implement new tests</a>
  <li><a href=\"index.php?op=devel&amp;sub=qa&amp;id=testlist\" title=\"Tests in suite\">Tests in suite</a>
  <br>";

  sidebox($title,$content);

?>
