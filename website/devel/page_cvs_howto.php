<?php
if (eregi("page_cvs_howto.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>CVS How to</H4>
<H5>Anonymous CVS Access</H5> 

Firebird's CVS repository can be checked out through anonymous (pserver) CVS with the following instruction set. The module you wish to check out must be specified as the <I>modulename</I>. When prompted for a password for <I>anonymous</I>, simply press the Enter key. 
<P><PRE>
cvs -d:pserver:anonymous@cvs.firebird.sourceforge.net:/cvsroot/firebird login
cvs -z3 -d:pserver:anonymous@cvs.firebird.sourceforge.net:/cvsroot/firebird co <I>modulename</I> 
</PRE>
<P>Updates from within the module's directory do not need the -d parameter.

<H5>Developer CVS Access via SSH</H5> 

Only project developers can access the CVS tree via this method. SSH1 must be installed on your client machine. Substitute <I>modulename</I> and <I>developername</I> with the proper values. Enter your site password when prompted. 
<P><PRE>
export CVS_RSH=ssh
cvs -z3 -d:ext:<I>developername</I>@cvs.firebird.sourceforge.net:/cvsroot/firebird co <I>modulename</I> 
</PRE></P>
<p>
Please read <a href="http://sourceforge.net/docman/?group_id=1" target="_blank" title="CVS - OS Specific Information">here</a> about how to set-up and configure our cvs and ssh properly.</p>

<H5>List of Firebird CVS modules</H5>
Case is significant.
<ul>
<li><b>interbase</b> : Firebird v1.0
<li><b>firebird2</b> : New version of Firebird 2.x
<li><b>interclient</b> : InterClient/InterServer
<li><b>tools</b> : various tools
<li><b>OdbcJdbc</b> : ODBC driver
<li><b>Tcs</b> : test control system for Firebird RDBMS
<li><b>client-java</b> : New type 4 JDBC driver
<li><b>manual</b> : Firebird Documentation Project files
<li><b>web</b> : Firebird web site PHP sources
</ul>
<p>
Back to <A href=index.php?op=devel>Developer's corner</A>
<p>