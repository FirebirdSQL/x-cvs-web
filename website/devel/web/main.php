<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Under development</H4>
<li>Comment threads for ANY topic / page
<li>Developer's Corner pages
<li>Further refinement of Novice's Guide, History, Documentation and FAQ.

<p>
<H4>Future plans</H4>
<li>User accounts
<li>Surveys
<p>
<H4>Activities so far</H4>
<li>phpNuke is gone, along with MySQL backend. New framework was writtent from scratch.
<p>
<?php
$action="topics";
$fid=7;
require('tf.actions.php');

?>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>