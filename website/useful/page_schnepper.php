<?php
if (eregi("page_schnepper.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>IB 6 Installation notes - Linux and Unix</H4>

<!-- THIS TABLE CONTAINS THE PAGE LOGO AND THE CONTENT -->
<table>
<tr>
<td>
Miscellaneous notes from <b>Dave Schnepper</b> and others<hr size=1></td>
</tr>
<tr>
<td colspan=2><font face="Verdana" size="-1">
<p>
<b>The Linux kits require Linux Kernel 2.2.12 and glibc 2.1.</b>
<p>
<font face="Verdana" size="-1">
The install script looks for a '.tgz' file to perform the install.<br>

When performing the TGZ install do:
<ul>
<li>Change the perms on the install file to executable. (eg. chmod 777 ./install)<P>
<li>cp ./InterBaseLI-B6.0.tgz /usr<p>
<li>cp ./install /usr<p>
 
<li>/** ./install <AbsolutePathToTarFile> **/<br>


./install /usr/InterBaseLI-B6.0.tgz<br>
 
/** you will be prompted for the ib install dir **/
<P>
<li>/usr
</ul>

<b>Proprietary Unixes</b><br>
The Getting Started guide states that the default install for a Solaris package is in /usr.  It has been pointed out that the only place for vendor-supplied stuff is in /opt and files that change in size should be in /var/opt.
<P>Dave Schnepper notes:<br>

Interbase's default location on Unix is /usr/interbase - this predates
the modern tradition of /opt and /var on Solaris.  The default can be
overridden with the use of $INTERBASE* environment variables.
<p>

Certainly this is something that can be looked at and modernized -
post-open-source.  (At the cost of backwards compatibility for
customers used to having it in /usr/interbase).
<P>

The physical install location can be in /opt - but, by default, a
slink would still be needed from /usr/interbase
</td></tr>

<!-- ------------------------------------------------------------------- -->
<!-- END OF PAGE CONTENT -->
</table>

<p>
Back to <A href=index.php?op=useful>Really Useful</A> Index
<p>