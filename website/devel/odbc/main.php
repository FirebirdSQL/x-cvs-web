<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<h2>ODBC/JDBC Driver Development</h2>
<H4>Latest Developer Reports</H4>
<blockquote>
<ul>
<li><a href="index.php?op=devel&sub=odbc&id=odbcff200409">Vladimir Tsvigun, 2004-09-30</a>
</ol>
</blockquote>
<p>
<?php
$action="topics";
$fid=5;
require('tf.actions.php');

?>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>