<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<h4>About the Firebird ADO.NET Data Provider</h4>
<h5>By Carlos Guzm�n �lvarez</h5>
26th July 2004
<p>
The new .NET data provider is written in C# and provides a high-performance 
native implementation of the GDS32/API functions. 
This means that .Net developers will be able to access Firebird databases 
without the need of Firebird client install.
</p>
<p>
Actual stable version is <b>1.6.2</b>
</p>
<p>
Actual development version is <b>1.7 Alpha 2</b>
</p>

<p>
<?php
$action="topics";
$fid=4;
require('tf.actions.php');

?>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>