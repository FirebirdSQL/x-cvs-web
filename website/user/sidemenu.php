<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "User Account";
  $content = "
  If you'll register as a Firebird community member, you'll get access to
  web personalization services and some web areas reserved only for community members 
  (like community polls).
  <br>";

  sidebox($title,$content);

?>
