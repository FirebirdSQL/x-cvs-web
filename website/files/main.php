<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Firebird RDBMS</H4>
<H5>Choice of server architecture</H5>
First you need to choose a Firebird server architecture. There are two models: the <u>classic</u> and the <u>super</u> architecture. On Microsoft win32 platforms only the super server architecture is available. Unix style environments often have a choice of both the classic or super architecture. If you are unsure start with the classic architecture which is a little easier to experiment with and to learn the basics. Then once you know more you will be able to determine which architecture is best for your installation. From a functional point of view both are equivalent and they are interchangable.
<p>
<b>Classic</b><br>
The classic architecture allows for programs to directly open the database file, It is architected to allow the same database to be opened by several programs at once. The classic engine also allows remote connections to local databases by providing an inetd or xinetd service (This spawns a seperate task per user connection).
<p>
<b>Super</b><br>
The super server architecture provides a server process, and client process cannot directly open the database file and all SQL requests are done via the server using a socket. The super server makes use of lightweight theads to process the requests.
<p>
For more technical details and information about differences between Classic and SuperServer, please refer to <A href=http://www.ibphoenix.com/ibp_ss_vs_classic.html>this article</a> published by IBPhoenix.
<H4>Supported platforms</H4>
Currently our <b>main supported platforms</b> are 32-bit <b>Windows</b>, <b>Linux</b> (i386), <b>Solaris</b> (Sparc), <b>HP-UX</b> (i386) and <b>MacOS X</b>. Main development is done on Windows and Linux, so all new releases are usually offered first for these platforms, followed by other platforms after few days (or weeks).
<p>
<b>Some builds</b> are also available for <b>FreeBSD</b>, <b>Solaris</b> (i386) and <b>AIX</b>.
<p>
<b>Historically</b>, Firebird (under it's original name) has also been built and run on the following platforms:  <b>DG-UX</b>, <b>SGI-IRIX</b>, <b>NCR3000</b>, <b>CRAY</b>, <b>DEC-Ultrix</b>, <b>DEC-VMS</b>, <b>UnixWare</b>, <b>Apollo</b>, <b>OS2</b>, <b>Novell Netware</b> and <b>HP MPE/XL</b>. Anyone with an interest in reviving these platforms is welcome and help is available through our mailing lists (although obtaining Apollo hardware might be difficult, and anyone seriously expressing an interest in reviving the HP MPE/XL port will have to be thick skinned).
<p>
<H4>All Firebird RDBMS Kits released so far</H4>
This list contains only <b>official</b> Firebird Project <b>releases</b>, i.e. releases intended for use by general public and directly provided by Firebird project. If you're looking for various experimental kits, modules and all other works in progress, please refer to our <A href=index.php?op=devel>Developer's corner</A>,
for other sources of Firebird related downloadable materials and software, check out
the <b>Related Downloads</b> sidebar.
<H5>Last Stable Release</H5>
<ul>
<li><A href=index.php?op=files&amp;id=fb10>Firebird 1.0 (Final Release)</A>
</ul>
<H5>Older Releases</H5>
<ul>
<li><A href=index.php?op=files&amp;id=fbrc2>Firebird 1.0 RC2 (Release Candidate)</A></li>
<li><A href=index.php?op=files&amp;id=fbrc1>Firebird 1.0 RC1 (Release Candidate)</A></li>
<li><A href=index.php?op=files&amp;id=fb10b2>Firebird 1.0 Beta 2</A></li>
<li><A href=index.php?op=files&amp;id=fb095>Firebird Snapshots (0.9.5)</A></li>
<li><A href=index.php?op=files&amp;id=fb094>Firebird first main release (0.9.4)</A></li>
</ul>
<p>
<H4>Nightly Builds</H4>
Only for the daring and adventurous. Nightly, the latest source is checked
out and the install packages rebuilt. This provides the latest up to date bug
fixes/features but should only be used for experimentation since no testing has
been performed.</P>
<UL>
<LI><A HREF="http://firebird.sourceforge.net/download/snapshot_builds/linux/fb_cs_linux_snapshot.tar.gz">Classic Server for Linux</A> (.tar.gz)</LI>
<LI><A HREF="http://firebird.sourceforge.net/download/snapshot_builds/linux/fb_ss_linux_snapshot.tar.gz">SuperServer for Linux</A> (.tar.gz)</LI>
<LI><A HREF="http://firebird.sourceforge.net/download/snapshot_builds/darwin/fb_cs_darwin_snapshot.tar.gz">Classic Server for MacOS X (Darwin)</A> (.tar.gz)</LI>
<LI><A HREF="http://firebird.sourceforge.net/download/snapshot_builds/darwin/fb_ss_darwin_snapshot.tar.gz">SuperServer for MacOS X (Darwin)</A> (.tar.gz)</LI>
</UL>
