<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Page is under development</H4>
<p>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>