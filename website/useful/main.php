<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Article Index</H4>

<!-- THIS TABLE CONTAINS THE PAGE LOGO AND THE CONTENT -->
<table border=0 width=100% cellspacing=0 cellpadding=0>
<!-- ------------------------------------------------------------------- -->
<tr>
<td bgcolor="paleturquoise">
<b>Writing UDF's in Delphi for Interbase/Firebird</b><br>
<a href="mailto:flooder at global.co.za" style="text-decoration:none;color:#800080;">Gerhardus Geldenhuis</a> documents <a href="index.php?op=useful&amp;id=geldenhuis">how to write a UDF in Delphi</a> using techniques he learned from using resources around the IB/FB community web sites.</td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>

<!-- ------------------------------------------------------------------- -->
<tr>
<td>
<b>Some Stored Procs to Massage Dates</b><br>
<a href="mailto:chef_007 at gmx.net" style="text-decoration:none;color:#800080;">Markus Ostenried</a> shares <a href="index.php?op=useful&amp;id=ostenried_1">some time and date routines</a> that he has converted to Stored Procedures from RxLib and the <a href="http://delphi-jedi.org/CODELIBJCL" style="text-decoration:none;color:#800080;">Jedi Code Library</a>. </td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>

<!-- ------------------------------------------------------------------- -->
<tr>
<td bgcolor="paleturquoise">
<b>Instant GBAK &amp; Restore on Win2K</b><br>
<a href="mailto:chef_007 at gmx.net" style="text-decoration:none;color:#800080;">Markus Ostenried</a> offers <a href="index.php?op=useful&amp;id=ostenried_2">a .REG file for Win2K</a> that creates a new entry in the Windows Explorer's context
menu for *.gdb and *.gbk files.
</td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>

<!-- ------------------------------------------------------------------- -->
<tr>
<td>
<b>Autostart Shell script for IB/FB on Linux</b><br>
Jorge Alvarez <a href="index.php?op=useful&amp;id=alvarez">shares the trick</a> for getting ibserver to load and run when you boot up your Linux server machine.
</td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>

<!-- ------------------------------------------------------------------- -->
<tr>
<td bgcolor="paleturquoise">
<B>Claudio Valderrama's Writings</B><br> 
Claudio is a famous contributor to IB lists, newsgroups and beta groups.  These pages of original articles document his experiences as an often critical and rigorous user, tester and mentor of IB/Firebird over many years.<br>  
Link :: <a href="http://www.cvalde.com/ibDocumentation.htm">Click here</a> ::
from :: <a href="MAILTO:cvalde at myrealbox.com">Claudio Valderrama</a>
</td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>
<!-- ------------------------------------------------------------------- -->

<tr>
<td>
<a href="http://www.volny.cz/iprenosil/interbase/"><img src="images/ivan_prenosil.gif" width=67 height=55 border=0></a>
<B>Ivan Prenosil's Articles</B><br> 
Ivan has been working with IB for five years and has contributed about 1000 messages to IB lists and newsgroups.  He tests everything he posts about and his answers to questions are reliable.  On these pages, he has begun putting together some of the topics into essays to help others.
<ul>
<li><a href="http://www.volny.cz/iprenosil/interbase/ip_ib_isc4.htm">Security - Enhanced isc4.gdb</a> is certainly topical at present.  
<li><a href="http://www.volny.cz/iprenosil/interbase/ip_ib_cache.htm">Cache settings</A> covers things that are already in documentation, but it is based on tests
that revealed that documentation is sometimes not clear, sometimes completely wrong.
<li><a href="http://www.volny.cz/iprenosil/interbase/ip_ib_strings.htm">To BLOB or not to BLOB</a> corrects some
superstitions about BLOBs and VARCHARs. 
</ul>
Link :: <a href="http://www.volny.cz/iprenosil/interbase/">Click here</a> ::
from :: <a href="mailto:prenosil at ms.anet.cz">Ivan Prenosil</a>
</td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>
<!-- ------------------------------------------------------------------- -->

<tr>
<td bgcolor="paleturquoise">
<B>Some notes on Linux and Unix installs</B><br> 

Link :: <a href="index.php?op=useful&amp;id=schnepper">Click here</a> ::
from :: various sources
</td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>
<!-- ------------------------------------------------------------------- -->

<tr>
<td>
<B>HOW-TOs for InterBase and Java</B><br> 
Joe Shevland's collates instructions and examples for using Interbase&reg; with the Java 2&reg; platform and JDBC. (Under construction at 8 November 2000).
<br>
Link :: <a href="http://www.kpi.com.au/interbase/">Click here</a> ::
from :: <a href="mailto:shevlandj at kpi.com.au">Joe Shevland</a>
</td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>
<!-- ------------------------------------------------------------------- -->

<tr>
<td bgcolor="paleturquoise">
<B>HOW-TO Install IB 6 on Linux Red Hat 6.2 ( + RH 7.0)</B><br> 
It's easy - quick HOW-TO for getting IB 6 up-and-running on your RH 6.2 box. With RH 7.0 notes added.
<br>
Link :: <a href="index.php?op=useful&amp;id=zamana">Click here</a> ::
from :: <a href="mailto:zamana at zip.net">C R Zamana</a>
</td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>
<!-- ------------------------------------------------------------------- -->

<tr>
<td>
<B>WRITING UDFs (User-defined Functions) FOR INTERBASE</B><br> 
Transcript of Gregory Deatz' presentation at Borcon 2000, San Diego. <BR>

It's not the &quot;definitive guide&quot;, according to Greg, but enough to demonstrate the basic guidelines and gotchas.  InterBase R &amp; D folk, past and present, are cordially invited to augment Greg's material in any way they consider useful, to help throw more light on this attractive IB feature.<BR>
Link :: <a href="index.php?op=useful&amp;id=deatz_udf">Click here</a> ::
from :: <a href="mailto:gdeatz at hoaglandlongo.com">Gregory Deatz</a>
</td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>
<!-- ------------------------------------------------------------------- -->

<tr><td bgcolor="paleturquoise">
<B>CONNECTING TO INTERBASE WITH DELPHI AND C++BUILDER</B><BR>
A digest of features of two data access component suites - InterBaseXpress and IB Objects - for connecting your application to the InterBase API. <br>
Link :: <a href="index.php?op=useful&amp;id=Connectivity&amp;nosb=1">Click here</a> ::
from :: various contributors
</td></tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>

<tr>
<td>
<B>SOME SOLUTIONS TO OLD PROBLEMS</B><br> 
Dalton Calford shares his solutions to some implementation problems that might affect you - collected from postings to the IB-Architecture list. <BR>

Approaching 24 X 7 Service, Hardware Configuration, Server Configuration, Methods for
Backing up your Data, Roll-Forward Logging, Replication, Reversing User Actions.<BR>
Link :: <a href="index.php?op=useful&amp;id=calford_1">Click here</a> ::
from :: the IB-Architect list
</td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>
<!-- ------------------------------------------------------------------- -->
<tr>
<td bgcolor="paleturquoise">
This BAT file (renamed as .txt for downloading purposes), is for doing a nightly backup and restore of a database on an NT platform only.  It does the restore to a copy of the production database. My apps accept a parameter pointing to the database. I usually put up a production and training icon on each user's desktop pointing to the respective
databases. So I backup nightly, check the backup by restoring to a database and have a fresh, up to date, training database each day.
<P>
The file should be generalized (drive and path names, etc) but I find I usually work it through each time adding whatever else I've come across.
<P>
The BAT file is really derived from input from several other people whose names I have lost. I apologize in advance to them and acknowledge my debt.<P> 
File :: <a href="download.php?op=file&amp;id=nightly.txt">Nightly Backup</a> (4K) ::
from :: <a href="MAILTO:wsurowiec at msn.com">Bill Surowiec</A>
</td>
</tr>
<tr><td height=20><img src="images/1x1.gif" width="1" height="1"></td></tr>
<!-- ------------------------------------------------------------------- -->
<tr>
<td>
A while ago I read some articles written by <a href="MAILTO:billtodd_az at qwest.net">Bill Todd</A> about
Interbase's MGA and record versioning in general that were published in
Delphi Informant. I wrote to Bill to ask him if could put the articles up on
his web site, which he has kindly done.<P> 
Link :: <a href="http://www.dbginc.com/tech_pprs/IB.html">Bill Todd's Articles</a> ::
from :: <a href="MAILTO:Daniel_Work at nemmco.com.au 
">Daniel Work</A>
</td>
</tr>

</table>
<!-- END OF PAGE CONTENT -->
