<?php
if (eregi("page_bugdb.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<h4>Firebird RDBMS Downloads</h4>
<H5>Choice of server architecture</H5>
First you need to choose a Firebird server architecture. There are two models: the <u>classic</u> and the <u>super server</u> architecture. The super server is the main architecture for Microsoft win32 platforms (classic architecture is available on Win32 only from v1.5 onward). Unix style environments often have a choice of both the classic or super architecture. If you are unsure start with the classic architecture which is a little easier to experiment with and to learn the basics. Then once you know more you will be able to determine which architecture is best for your installation. From a functional point of view both are equivalent and they are interchangable.
<p>
<b>Classic</b><br>
The classic architecture allows for programs to directly open the database file. It is architected to allow the same database to be opened by several programs at once. The classic engine also allows remote connections to local databases by providing an inetd or xinetd service (This spawns a seperate task per user connection).
<p>
<b>Super Server</b><br>
The super server architecture provides a server process, and client process cannot directly open the database file and all SQL requests are done via the server using a socket. The super server makes use of lightweight theads to process the requests.
<p>
For more technical details and information about differences between Classic and SuperServer, please refer to <A href="http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_ss_vs_classic">this article</a> published by IBPhoenix.
<H5>Supported platforms</H5>
Currently our <b>main supported platforms</b> are 32-bit <b>Windows</b>, <b>Linux</b> (i386), <b>Solaris</b> (Sparc and Intel), <b>HP-UX</b> (i386), <b>FreeBSD</b>, <b>MacOS X</b> and <b>Sinix-Z</b>. Main development is done on Windows and Linux, so all new releases are usually offered first for these platforms, followed by other platforms after few days (or weeks).
<p>
<b>Some builds</b> are also available for <b>WinCE</b> and <b>AIX</b>.
<p>

<h4><a name="v15"></a>Firebird V1.5 Downloads</h4>

The V1.5 release of Firebird represents a major upgrade to the V1.0 database engine, which has been developed by an independent team of voluntary developers from the original InterBase source code that was released by Borland under the InterBase Public License on 25th July 2000.<br><br>
Development on the Firebird 2 codebase began early on during the Firebird V1.0 development process, with the porting of the Firebird 1.0 C code to C++ and the
first major steps at code clean up. Firebird V1.5 is the first release of the
Firebird 2 codebase and represents a significant milestone for the developers
and the whole Firebird project, but it is not an end in itself. As Firebird V1.5 goes to release, major development continues toward the next point release on the journey to Firebird V2.0.<br><br>
There are many new features and bugs fixed and the list of major changes beyond the original V1.0 version is quite long. Please read the Release Notes for more information.

<p>Release Notes</p>

<ul>
<li><a href="http://www.ibphoenix.com/downloads/Firebird_v15.108_ReleaseNotes.pdf">Release Notes 1.5</a> (English) (.pdf) V1.08
 <ul>
 <li><a href="http://www.ibphoenix.com/downloads/Firebird_v15pt1_ReleaseNotes.pdf">Release Notes 1.5.1</a> (English) (.pdf)
 </ul>
<li><a href="http://www.ibphoenix.com/downloads/Firebird_v15.108_ReleaseNotesItalian.pdf">Release Notes 1.5</a> (Italian) (.pdf) V1.08
<li><a href="http://www.ibphoenix.com/downloads/Firebird_v15.108_ReleaseNotesGerman.pdf">Release Notes 1.5</a> (German) (.pdf) V1.08

<li><a href="http://www.ibphoenix.com/downloads/Firebird_v15.108_ReleaseNotesSpanish.pdf">Release Notes 1.5</a> (Spanish) (.pdf) V1.08
<li><a href="http://www.ibphoenix.com/downloads/Firebird_v15.108_ReleaseNotesPortuguese.pdf">Release Notes 1.5</a> (Portuguese) (.pdf) V1.08
<li><a href="http://www.ibphoenix.com/downloads/Firebird_v15.108_ReleaseNotesPortugBrasil.pdf">Release Notes 1.5</a> (Brazilian Portuguese) (.pdf) V1.08
<li><a href="http://www.ibphoenix.com/downloads/Firebird_v15.108_ReleaseNotesCzech.pdf">Release Notes 1.5</a> (Czech) (.pdf) V1.08
<li><a href="http://www.ibphoenix.com/downloads/Firebird_v15.108_ReleaseNotesFrench.pdf">Release Notes</a> (French) (.pdf) V1.08
 <ul>
 <li><a href="http://www.ibphoenix.com/downloads/Firebird_v15pt1_ReleaseNotes_French.pdf">Release Notes 1.5.1</a> (French) (.pdf)
 </ul>

</ul>

<p>Other</p>
<ul>
<li><a href="http://www.ibphoenix.com/downloads/Firebird_Factsheet.pdf">Firebird Factsheet</a> (.pdf)
<li><a href="http://www.firebirdsql.org/ff/foundation/FBFactsheet.html">Firebird Factsheet</a> (.html)
<li><a href="http://www.comunidade-firebird.org/cflp/html_docs/001_FacSheet/Firebird%201_5%20Factsheet.htm">Firebird Factsheet in Portuguese</a> (.html)
<li><a href="http://www.ibphoenix.com/downloads/Firebird15_New.pdf">Whats New in Firebird V1.5</a> (.pdf)

<li><a href="http://www.firebirdsql.org/ff/foundation/FB15_New.html">Whats New in Firebird V1.5</a> (.html)
<li>Part of Sean Leyne's presentation (.pdf) to the Toronto Delphi Users Group that focuses on Firebird V1.5.
  <ul>
  <li><a href="http://www.ibphoenix.com/downloads/Firebird15update.pdf">English</a>.
  <li><a href="http://www.ibphoenix.com/downloads/firebird15update_jp.pdf">Japanese</a>.
  </ul>
<li>The embedded server is a fully functional server linked as a dynamic library (fbembed.dll). It has exactly the same features as the usual server and exports the standard Firebird API entrypoints.
<li>Firebird Superserver has a link-time backward compatibility issue with the NPTL (Native POSIX Thread Library) that may cause it to be unstable on Linux distributions that enable the NPTL in the GNU C library, e.g. Red Hat 9, Mandrake 10 and Fedora Core. The new NPTL builds of Superserver should solve
these problems.
</ul>

<p><b>Useful Tools and Information</b></p>

<ul>
<li>9th Apr 2003 <A HREF="http://prdownloads.sourceforge.net/firebird/FbConfigManager.zip">Firebird Configuration Manager</a> (.zip) (229k)<br>
Tool for manipulating the Firebird V1.5 Configuration file.
<li>2nd Aug 2003
<a href="http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_pdb_win32" >Tracking Down Crashes on Win32 Systems</a> By Nickolay Samatov 
</ul>


<p><b>Downloads</b></p>

<ul>
<li>16th Jul 2004 <A HREF="http://prdownloads.sourceforge.net/firebird/Firebird-1.5.1.4481-Win32.exe">Official Windows Setup and Installer For Classic and SuperServer</A> V1.5.1 (.exe) (4.0mb)</li>
<li>16th Jul 2004 
<A HREF="http://prdownloads.sourceforge.net/firebird/Firebird-1.5.1.4481_win32.zip">SuperServer and Classic for Windows</A> V1.5.1 (.zip) (3.5mb)</li>
<li>16th Jul 2004<A HREF="http://prdownloads.sourceforge.net/firebird/Firebird-1.5.1.4481_embed_win32.zip"> Embedded Server for Windows</A> V1.5.1 (.zip) (1.4mb)</li>

<li>16th Jul 2004 <A HREF="http://prdownloads.sourceforge.net/firebird/Firebird-1.5.1.4481_win32_pdb.zip">Windows Debug Build</A> V1.5.1 (.zip) (6.0mb)</li>
<li>16th Jul 2004 <A HREF="http://prdownloads.sourceforge.net/firebird/Firebird-1.5.1.4481_embed_win32_pdb.zip">Embedded Server Debug Build for Windows</A> 1.5.1 (.zip) (2.3mb)</li>
<li>16th Jul 2004 
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdCS-1.5.1.4481-0.i686.rpm">Classic for Linux</A> V1.5.1 (.rpm) (3.0mb)</li>
<li>16th Jul 2004 
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdCS-1.5.1.4481-0.i686.tar.gz">Classic for Linux</A> V1.5.1 (.tar.gz) (2.8mb)</li>

<li>16th Jul 2004 
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdCS-debuginfo-1.5.1.4481-0.i686.tar.gz">Classic Debug Build for Linux</A> V1.5.1 (.tar.gz) (13.4mb)</li>
<li>16th Jul 2004 
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.5.1.4481-0.i686.rpm">
SuperServer for Linux</A> V1.5.1 (.rpm) (3.0mb) 
</li>
<li>28th Jul 2004
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.5.1.4500-0.i686.nptl.rpm" >SuperServer for Linux NPTL</A> V1.5.1 (.rpm) (2.5mb)
</li>
<li>16th Jul 2004 

<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.5.1.4481-0.i686.tar.gz">SuperServer for Linux</A> V1.5.1 (.tar.gz) (3.0mb)
<li>28th Jul 2004
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.5.1.4500-0.i686.nptl.tar.gz" >SuperServer for Linux NPTL</A> V1.5.1 (.tar.gz) (2.5mb)
</li>
<li>16th Jul 2004 
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-debuginfo-1.5.1.4481-0.i686.tar.gz"> SuperServer Debug Build for Linux</A> V1.5.1 (.tar.gz) (13.4mb)
</li>
<li>28th Jul 2004
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-debuginfo-1.5.1.4500-0.i686.nptl.tar.gz" >SuperServer Debug Build for Linux NPTL</A> V1.5.1 (.tar.gz) (12.5mb)

</li>
<li>15th May 2004 
<A HREF="http://prdownloads.sourceforge.net/firebird/firebird-1.5.0-fbsd48.tgz">Classic for FreeBSD 4.8 and 4.9</A> V1.5 (.tgz) (3.7mb)
<li>15th May 2004 
<A HREF="http://prdownloads.sourceforge.net/firebird/firebird-1.5.0-fbsd51.tbz">Classic for FreeBSD 5.1 and 5.2</A> V1.5 (.tbz) (2.0mb)
<li>26th Nov 2003 
<A HREF="http://prdownloads.sourceforge.net/firebird/MacOS-X-Firebird-CS-1.5-RC-7.pkg.tar.gz">Classic for MacOS X</A> Release Candidate 7.0 (.tar.gz) (3.0mb)
</ul>

<p>
<a name="v10"></a><h4>Firebird V1.0x Downloads</h4>
<TR>
<TD>

<H5>Latest Firebird V1.0 Releases<BR>
Main V1.0 release on 12th March 2002<br>
V1.03 release on 4th June 2003</H5>
<p><b>Documentation</b></p>
<p>
<UL>
<LI><a href="http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_fb1_faq" >Firebird 1.0 FAQ</A></LI>
<LI>

<a href="http://www.ibphoenix.com/main.nfs?a=ibphoenix&l=;FAQS;NAME='ibp_firebird_103_faq'">Firebird 1.03 FAQ</a>

<LI><A
HREF="http://prdownloads.sourceforge.net/firebird/Firebird_v1_ReleaseNotes.pdf">Release Notes (.pdf)</A>
<LI><A
HREF="http://firebird.sourceforge.net/download.php?op=file&id=Firebird_v1_ReleaseNotes_Pt.pdf">Release Notes (Portugese) (.pdf)</A>
<LI><a href="http://www.ibphoenix.com/downloads/Firebird_v1_ReleaseNotes-J.pdf">Release Notes (Japanese) (.pdf)</A>
<LI><A
HREF="http://prdownloads.sourceforge.net/firebird/Firebird_v1_ClosedBugs.html">Firebird Bugs Closed</A>
<LI><A
HREF="http://prdownloads.sourceforge.net/firebird/Firebird_v1_OpenBugs.html">Firebird Bugs Still Open</A>
<LI><A
HREF="http://prdownloads.sourceforge.net/firebird/Firebird_v1_ClosedFeatures.html">Closed Feature Requests</A>
<LI><A HREF="http://prdownloads.sourceforge.net/firebird/Firebird_v1_OpenFeatures.html">Open Feature Requests</A>
<LI><A HREF="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/interbase/builds_win32/install/Readme.txt?rev=1.6&content-type=text/vnd.viewcvs-markup">V1.03 ReadMe</A>

</UL>
</p>
<p><b>Firebird 1 Windows Control Panel Applets</b><br>
The binaries are available in two varieties: a exe file, that can be run as an normal application, and a .cpl file (Control Panel Applet). The Zip files include both versions.<br>
Installing the applet is simple: just copy it to your windows system32 directory <code>[[Windows]System32]</code></p>
<p>
<UL>
<LI>
<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_dutch.zip">Dutch Version</a> (.zip) (452kb)
<LI>
<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_english.zip">English Version</a> (.zip) (452kb)

<LI>
<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_french.zip">French Version</a> (.zip) (452kb)
<LI>
<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_german.zip">German Version</a> (.zip) (452kb)
<LI>
<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_greek.zip">Greek Version</a> (.zip) (452kb)
<LI>
<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_italian.zip">Italian Version</a> (.zip) (452kb)
<LI>

<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_portuguese.zip">Portugese Version</a> (.zip) (452kb)
<LI>
<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_romanian.zip">Romanian Version</a> (.zip) (452kb)
<LI>
<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_russian.zip">Russian Version</a> (.zip) (452kb)
<LI>
<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_slovenian.zip">Slovenian Version</a> (.zip) (452kb)
<LI>
<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_spanish.zip">Spanish Version</a> (.zip) (452kb)

<LI>
<a href="http://prdownloads.sourceforge.net/firebird/fbmgr_turkish.zip">Turkish Version</a> (.zip) (452kb)
</UL>
</p>

<p><b><P>Fully tested downloads</b><br>
for a variety of operating systems.</P>
<p>
<UL>
<LI>
V1.03 4th Jun 2003
<A HREF="http://prdownloads.sourceforge.net/firebird/Firebird-1.0.3.972-Win32.exe">SuperServer for Windows</A> (full install) (.exe) (2.9mb)</LI>

<LI>
V1.03 4th Jun 2003
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdCS-1.0.3.972-0.i386.rpm">Classic Server for Linux</A> (32-bit I/O) (X86) (.rpm) (2.6mb)</LI>
<LI>
V1.03 4th Jun 2003
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdCS-1.0.3.972-0.tar.gz">Classic Server for Linux</A> (32-bit I/O) (X86) (.tar.gz) (2.6mb) <LI>V1.03 4th Jun 2003
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.0.3.972-0.i386.rpm">SuperServer for Linux</A> (32-bit I/O) (X86) (.rpm) (2.6mb)
<LI>
V1.03 4th Jun 2003

<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.0.3.972-0.tar.gz">SuperServer for Linux</A> (32-bit I/O) (X86) (.tar.gz) (2.6mb)
<LI>
V1.03 4th Jun 2003
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdCS-1.0.3.972-0.64IO.i386.rpm">Classic Server for Linux</A> (64-bit I/O) (X86) (.rpm) (2.6mb) <LI>
V1.03 4th Jun 2003
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdCS-1.0.3.972-0.64IO.tar.gz">Classic Server for Linux</A> (64-bit I/O) (X86) (.tar.gz) (2.6mb)
<LI>
V1.03 4th Jun 2003
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.0.3.972-0.64IO.i386.rpm">SuperServer for Linux</A> (64-bit I/O) (X86) (.rpm) (2.6mb) <LI>

V1.03 4th Jun 2003
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.0.3.972-0.64IO.tar.gz">SuperServer for Linux</A> (64-bit I/O) (X86) (.tar.gz) (2.6mb) <LI>
V1.01 3rd Oct 2002
<A HREF="http://prdownloads.sourceforge.net/firebird/MacOS_X-CS-1.0.1-Release.pkg.tar.gz">Classic Server for MacOS X</A> (.tar.gz) (2.8mb)
<LI>
V1.01 3rd Oct 2002
<A HREF="http://prdownloads.sourceforge.net/firebird/Darwin-CS-1.0.1-Release.tar.gz">Classic Server for Darwin</A> (.tar.gz) (2.8mb)
<LI>
V1.0 16th Mar 2002
<A HREF="http://prdownloads.sourceforge.net/firebird/firebird
1.0_43.tgz">Classic Server for FreeBSD 4.3</A> (.tgz) (2.3mb)

<LI>V1.02 21st Jan 2003
<A HREF="http://prdownloads.sourceforge.net/firebird/firebird-1.0.2_44.tgz">Classic Server for FreeBSD 4.4</A> (.tgz) (3.0mb)
<LI>V1.02 21st Jan 2003
<A HREF="http://prdownloads.sourceforge.net/firebird/firebird-1.0.2_50.tbz">Classic Server for FreeBSD 5.0</A> (.tbz) (2.6mb)
<LI>
V1.0 30th Mar 2002
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdCS-1.0.0.796-Solaris-Sparc.tar.gz">Classic Server for Solaris (Sparc)</A> (32-bit I/O) (.tar.gz) (2.4mb)
<LI>
V1.0 30th Mar 2002
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.0.0.796-Solaris-Sparc.tar.gz">SuperServer for Solaris (Sparc)</A> (32-bit I/O) (.tar.gz) (2.4mb)

<LI>V1.0 30th Mar 2002
<A HREF="http://firebird.sourceforge.net/download/snapshot_builds/solaris_sparc/FirebirdSS-1.0.0.796-64IO-Solaris-Sparc.tar.gz">SuperServer for Solaris (Sparc)</A> (64-bit I/O) (.tar.gz) (2.4mb) 
<LI>V1.0 5th Apr 2002
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdCS-1.0.0.809-Solaris-X86.tar.gz">Classic Server for Solaris (X86)</A> (32-bit I/O) (.tar.gz) (2.8mb)
<LI>V1.0 5th April 2002
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.0.0.809-Solaris-X86.tar.gz">SuperServer for Solaris (X86)</A> (32-bit I/O) (.tar.gz) (2.6mb)
<LI>V1.0 5th Apr 2002
<A  HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.0.0.809-Solaris-X86-64ioTEST.tar.gz">SuperServer for Solaris (X86)</A> (64-bit I/O) (.tar.gz) (2.6mb)
<LI>V1.0 1st May 2002

<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdCS-1.0.0.821-HP1020.tar.gz">Classic Server for HP-UX 10.20</A> (32-bit I/O) (.tar.gz) (2.5mb)<LI>V1.0 28th May 2002
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSS-1.0.0.821-HP11.tar.gz">SuperServer for HP-UX 11</A> (32-bit I/O) (.tar.gz) (2.75mb)
<LI>V0.94 18th Jan 2001
<A HREF="http://firebird.sourceforge.net/download/FirebirdCS-0.9-4.AIX.bff.Z">Classic Server for AIX</A> (PPC) (.bff.Z) (4.51mb) 
<A HREF="http://firebird.sourceforge.net/download/FirebirdCS-0.9-4.AIX.readme">ReadMe</A>
<LI>
15th May 2002 <A HREF="http://firebird-ce.tigris.org/">Alpha Release for
WinCE 3.0</A> (.tar.gz) (6.65mb)

</UL>
</p>