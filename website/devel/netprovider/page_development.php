<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<h4>Firebird ADO.NET Data Provider Development v1.7</h4>

<p>
The development of the v1.7 is going to be focused in:
</p>
<p>
	<ul>
		<li>The reimplementation of the Firebird events system.</li>
		<li>Improve management of resources allocated in the Firebird server (connections, statements, transactions, ...).</li>
		<li>Improve .NET provider internals.</li>
		<li>Make the API more consistent, for example, in the usage of connection strings.</li>
		<li>Changes on database schema support, to implement it in similar way as in the 
		.NET 2.0 Beta 1 documentation (when the changes are ready it will be back-ported to v1.6).</li>
	</ul>
</p>

<p>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>