<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<h3>Firebird JCA/JDBC Driver v 1.5.0</h3>
<h5>By Roman Rokytskyy</h5>
<b>Released 30 August 2004</b>

<h4>What's new in JayBird 1.5</h4>
<ul type=circle>
<li>full JDBC 2.0 compatibity (passed JDBC CTS 1.3.1 suite)
<li>full callable statement support
<li>batch updates
<li>support of ResultSet.TYPE_SCROLL_INSENSITIVE
<li>X/Open SQL states are reported by SQLException
<li>escaped syntax support for stored procedures and functions
<li>fixed JDBC specs deviations from 1.0.1 release
<li>
<h5>Type 2 JDBC driver support</h5>
Now you can use gds32.dll/libgds.so,
fbclient.dll/libfbclient.so and
fbembed.dll/libfbembed.so (requires native library, available as separate
package).  It allows you to
<ul type=circle>
<li>connect locally when the application runs on localhost
<li>use embedded version of the engine
<li>use the driver with InterBase 5.x, 6.5, 7.0.
</ul>
<li>multi-thread safety: now you can use one connection from multiple threads
<li>introduces Firebird-specific interfaces to enable you to utilize Firebird-specific
features: FirebirdConnection, FirebirdStatement, FirebirdPreparedStatement and FirebirdBlob
<li>completely rewritten JDBC connection pool with prepared statement caching,
more properties to control DataSource and
ConnectionPoolDataSource objects.
<li>savepoint support for Firebird 1.5 (JDBC 3.0 only, hence for JDK 1.4.x
only)
</ul>
<h4>Firebird Class 4 JCA-JDBC Driver Downloads</h4>
The driver requires at least JDK 1.3.1 to compile and run properly. Download <a href="index.
php?op=files&id=jaybird">here</a>.

<hr size=1>
For more information please refer to
<ul type=circle>
<li><a href="index.php?op=devel&sub=jdbc&id=aboutjbird.php">About Jaybird</a>: background about the
drivers<p>
<li><a href="http://jaybirdwiki.firebirdsql.org/JayBirdHome">JayBird Wiki pages</a>
</ul>
<p>
<?php
$action="topics";
$fid=3;
require('tf.actions.php');

?>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>
