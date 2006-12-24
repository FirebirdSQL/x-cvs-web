<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>About Firebird&reg;</H4>
Firebird is a relational database offering many <a href="index.php?op=devel&sub=engine&id=SQL_conformance&nosb=1">ANSI SQL standard features</a> that runs on Linux, Windows, and a variety of Unix platforms. Firebird offers excellent concurrency, high performance, and powerful language support for stored procedures and triggers. It has been used in production systems, under a variety of names since 1981.
<p>
Firebird is a commercially independent project of C and C++ programmers, technical advisors and supporters developing and enhancing a multi-platform relational database management system based on the source code released by Inprise Corp (now known as Borland Software Corp) on 25 July, 2000 under the InterBase Public License v.1.0.
<table colspecs=2 cellpadding=2 cellspacing=2>
  <tr>
    <td width=285 valign="middle">

<img src="images/ChristmasWishes.gif"width="261" height="233"></a>

    </td>
    <td>
Firebird is completely free of any registration, licensing or deployment fees.  It may be deployed freely for use with any third-party software, whether commercial or not. 
<p>
New code modules added to Firebird are licensed under the <a href="index.php?op=doc&id=idpl">Initial Developer's Public License</a>. (IDPL).  The original modules released by Inprise are licensed under the <a href="index.php?op=doc&id=ipl">InterBase Public License v.1.0</a>.  Both licences are modified versions of the <a href="http://www.opensource.org/licenses/mozilla1.1.php">Mozilla Public License v.1.1</a>.
    </td>
  </tr>
</table>


<hr size=1>
<h4>Latest Release: Firebird v.2.0</h4>
<table cellpadding=3>
  <tr>
    <td bgcolor=#2e8b57>
<font color="white">
<p>
<b>The Firebird Project officially released the much-anticipated version 2.0 of its open source Firebird relational database software during the opening session of the fourth international 
Firebird Conference in Prague, Czech Republic on Nov. 12.</b> </font>
<p>
    </td>
  </tr>
  <tr>
    <td>
<a href="index.php?op=devel&sub=engine&id=fb20_release"  style="text-decoration:none;color:#006400;font-size:10pt;"><b>More details...</b></a>
    </td>
  </tr>
</table>


<hr size=1>
<?php

//$action="news";

//require('tf.actions.php');
//include("newsflash.php");
include("news.php");
?>
