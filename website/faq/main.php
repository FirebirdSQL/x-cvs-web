<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Content</H4>
<A href="#top"></A>
<?php


# Question List

  $filelist = GetFileList($op,"R","^q.*\.dat") ;
  if ($filelist) {
    asort($filelist);
    echo "<table border=0 cellspacing=0 cellpadding=0>";
    foreach ($filelist as $file) {
      $question = "" ; $answer = "" ;
      include ($op."/".$file);
      echo "<tr><td width=10><a href=\"#$file\"><img src=\"images/icon_go2.png\" width=21 height=10 border=0></a></td><td>$question</td></tr>
      " ;
    }
    echo "</table><p>" ;
  }

# Answers

  $filelist = GetFileList($op,"R","^q.*\.dat") ;
  if ($filelist) {
    asort($filelist);
    echo "<table border=0 cellspacing=0 cellpadding=0 width=\"100%\">";
    foreach ($filelist as $file) {
      $question = "" ; $answer = "" ;
      include ($op."/".$file);
      echo "<tr><td><hr size=1><a name=\"$file\"></a>
      <b>$question</b>
      $answer
      <p>
      Back to <A href=\"#top\">TOP</A><br></td></tr>" ;
    }
    echo "</table>" ;
  }

?>
