<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "FAQ";
  $content = "
  If you have any further questions or suggestions how we can improve 
  this FAQ, feel free to ".GetRabbitSafeEMailLink("firebirds","contact us").".
  <br>";

  sidebox($title,$content);

?>
