<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "Really Useful";
  $content = "
  A page of files or links containing tips, tricks, techniques, practices 
  and 'gotchas' that InterBase users found 'Really Useful'.<P>
  If you have something like this, that you want to share on this page, please 
  email it to ".GetRabbitSafeEMailLink("helebor")." 
  with REALLY USEFUL in the Subject header.
  <br>";

  sidebox($title,$content);

?>
