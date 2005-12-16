<?php
if (eregi("page_cvs_howto.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>CVS How to</H4>
<H5>Anonymous CVS Access</H5> 

Firebird's CVS repository can be checked out through anonymous (pserver) CVS 
with the following instruction set. The module you wish to check out must be 
specified as the <I>modulename</I>. When prompted for a password for 
<I>anonymous</I>, simply press the Enter key.
<P><PRE>
cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/firebird login
cvs -z3 -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/firebird co <I>modulename</I>
</PRE>
<P>Updates from within the module's directory do not need the -d parameter.

<H5>Developer CVS Access via SSH</H5> 

Only project developers can access the CVS tree via this method. 
SSH1 must be installed on your client machine. Substitute <I>modulename</I> 
and <I>developername</I> with the proper values. Enter your site password 
when prompted.
<P><PRE>
export CVS_RSH=ssh
cvs -z3 -d:ext:<I>developername</I>@cvs.sourceforge.net:/cvsroot/firebird co <I>modulename</I>
</PRE></P>
<p>
Please read <a href="http://sourceforge.net/docman/?group_id=1" target="_blank"
title="CVS - OS Specific Information">here</a> about how to set up and 
configure your CVS and SSH software properly.</p>

<H5>List of Firebird CVS modules</H5>
Case is significant.
<ul>
<li><b>interbase</b> : Firebird 1.0
<li><b>firebird2</b> : Firebird 1.5 and 2.x
<li><b>OdbcJdbc</b> : Firebird ODBC driver
<li><b>client-java</b> : JayBird - New type 4 JDBC driver for Firebird
<li><b>interclient</b> : InterClient/InterServer (not in active develpment, 
                         see client-java)
<li><b>NETProvider</b> : Firebird .NET Data Provider
<li><b>Net-Provider</b> : Firebird .NET Data Provider (deprecated)
<li><b>Benchmarks</b> : Benchmarks for Firebird
<li><b>addons</b> : Various small utilities for Firebird, like Control Panel Applet,
                    configManager etc.
<li><b>qmdb</b> : test control system for Firebird RDBMS (deprecated)
<li><b>fbtcs</b> : TCS test control system for Firebird that's still in use,
                   but it's being replaced by QMTest suite (qmdb)
<li><b>TCS</b> : TCS test control system for Firebird (deprecated, see fbtc)
<li><b>manual</b> : Firebird Documentation Project files
<li><b>web</b> : Firebird web site PHP sources
<li><b>tools</b> : various tools we inherited with InterBase, like Marion VCS 
                   etc. (not in active development)
<li><b>ibx</b> : InterBase eXpress for Delphi (not in active develpment)
<li><b>ibconsole</b> : InterBase Console (not in active development)
</ul>
<p>
Back to <A href=index.php?op=devel>Developer's corner</A>
<p>