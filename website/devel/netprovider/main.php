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
The Firebird ADO.NET Data Provider is distributed under the terms of the
<a href="http://www.firebirdsql.org/index.php?op=doc&id=idpl">Initial Developer's Public License Version 1.0</a>
</p>
<p>
The new .NET data provider is written in C# and provides a high-performance 
native implementation of the GDS32/API functions. 
This means that .Net developers will be able to access Firebird databases 
without the need of Firebird client install.
</p>
<H4>Latest Developer Reports</H4>
<blockquote>
<ul>
<li><a href="index.php?op=devel&sub=netprovider&id=dotnetff200409">Carlos Guzm�n �lvarez, 2004-09-28</a>
<li>
</ul>
<p>
<?php
$action="topics";
$fid=4;
require('tf.actions.php');

?>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>