<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "Surveys";
  $content = "
  From time to time, we're run public or internal polls to collect opinions
  about various topics.
  <p>
  <b>Public polls</b> are open for anyone.<p>
  <b>Community polls</b> are open only for registered community members.<p>
  <b>Project polls</b> are open only for project members.
  <br>";

  sidebox($title,$content);

?>
