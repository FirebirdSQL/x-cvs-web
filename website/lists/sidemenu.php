<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "Lists &amp; Newsgroups";
  $content = "
  Discussion and support lists and newsgroups currently available in the 
  Firebird and InterBase community. 
  <hr size=1>";
  $filelist = GetFileList($op."/data","R","^sup-.*\.dat") ;
  if ($filelist) {
    $content .= "<b>Support Lists:</b><p>";
    foreach ($filelist as $file) {
      $list_name = "" ; $list_id = "" ;
      include ($op."/data/".$file);
      $content .= "<li><a href=\"#$list_id\">$list_name</a><br>" ;
    }
    $content .= "<p>";
  }
  $filelist = GetFileList($op."/data","R","^fb-.*\.dat") ;
  if ($filelist) {
    $content .= "<b>Firebird Project Lists:</b><p>";
    foreach ($filelist as $file) {
      $list_name = "" ; $list_id = "" ;
      include ($op."/data/".$file);
      $content .= "<li><a href=\"#$list_id\">$list_name</a><br>" ;
    }
    $content .= "<p>";
  }
  $filelist = GetFileList($op."/data","R","^gen-.*\.dat") ;
  if ($filelist) {
    $content .= "<b>Other Firebird/InterBase related Lists:</b><p>";
    foreach ($filelist as $file) {
      $list_name = "" ; $list_id = "" ;
      include ($op."/data/".$file);
      $content .= "<li><a href=\"#$list_id\">$list_name</a><br>" ;
    }
    $content .= "<p>";
  }
  $filelist = GetFileList($op."/data","R","^ng-.*\.dat") ;
  if ($filelist) {
    asort($filelist);
    $content .= "<b>News Servers:</b><p>";
    foreach ($filelist as $file) {
      $ng_name = "" ; $ng_id = "" ;
      include ($op."/data/".$file);
      $content .= "<li><a href=\"#$ng_id\">$ng_name</a><br>" ;
    }
    $content .= "<p>";
  }
  $content .="
  <hr size=1>
  You are invited to ".GetRabbitSafeEMailLink("helebor","submit information")."
  about your list for inclusion here.<br>";

  sidebox($title,$content);

?>
