<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "Rabbit Holes";
  $content = "<table cellspacing=0 cellpadding=0 border=0 width=\"100%\"><tr><td valign=top>
  <img src=\"images/rabbithole.png\" alt=\"Rabbit hole\" border=0 hspace=5 vspace=5 align=\"middle\"></td><td>
  Here you can find personal pages of Firebird Project members.<p></td></table>";
  $filelist = GetFileList($op,"R","^.*\.dat") ;
  if ($filelist) {
    asort($filelist);
    foreach ($filelist as $file) {
      $content .= GetRabbitInfoLink($file)."<br>" ;
    }
    $content .= "<p>";
  }

  $content .= "<br>";

  sidebox($title,$content);

?>
