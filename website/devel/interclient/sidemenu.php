<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<?PHP

  $title = "InterClient/InterServer";
  $content = "Sub-project specific material is not yet available.
  <br>";

  sidebox($title,$content);

?>
