<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  $title = "Download";
  $content = "
  Our main commodity is the Firebird Relational Database Engine, but Firebird project is much more than the engine itself.
  <p>
  <li><a href=\"index.php?op=files&id=engine\">Firebird Database Engine</a></li>
  <li><a href=\"index.php?op=files&id=odbc\">Firebird ODBC Driver</a></li>
  <li><a href=\"index.php?op=files&id=jaybird\">Firebird JCA-JDBC Driver</a></li>
  <li><a href=\"index.php?op=files&id=netprovider\">Firebird .NET Data Provider</a></li>
  <li><A href=\"index.php?op=files&amp;id=interclient\">InterClient</A><br>
  <li>Test system</li>
  <li><a href=\"index.php?op=devel&sub=doc\">Documentation</a></li>
  <li><a href=\"http://www.ibphoenix.com/downloads/qsg.pdf\">Firebird Quick Start Guide</a></li>
  <p>
  You can also get all our sources directly from our <A href=\"http://sourceforge.net/cvs/?group_id=9028\">CVS</A>.
  <p>
  All our releases are also listed at our <a href=\"http://sourceforge.net/projects/firebird\">main SourceForge page</a>.
  <br>";
  sidebox($title,$content);
  
  $title = "Tip";
  $content = "
  If you are a registered <A href=http://sourceforge.net>SourceForge</A> user, 
  you can sign up for automatic mail <A href=http://sourceforge.net/projects/firebird>notification</A>
  for any future Firebird release.
  <br>";
  sidebox($title,$content);
  
  $title = "Related Downloads";
  $content = "
  The downloads here relate only to core Firebird modules and Firebird project
  works, but there are many projects surrounding the Firebird and Interbase community.
  <p>
  If you're looking for more, a good place to start is the 
  <A href=http://www.ibphoenix.com>IBPhoenix website</A> where they have a very large 
  collection of Firebird and Interbase(r) related materials including 
  <A href=http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_download>Firebird</A> downloads, 
  <A href=http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_contrib_download>contributed</A> downloads,
  and <A href=http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_interbase_download>Interbase related</A> downloads. 
  <br>";

  sidebox($title,$content);

?>

