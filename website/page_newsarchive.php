<?php
if (eregi("page_newsarchive.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4 class="centre">Archive of Firebird Project Development News</H4>
<br>
<?php
include("oldnews.php");
?>
