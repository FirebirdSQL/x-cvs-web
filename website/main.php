<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>About Firebird&reg;</H4>
Firebird is a relational database offering many ANSI SQL-92 features that runs on Linux, Windows, and a variety of Unix platforms. Firebird offers excellent concurrency, high performance, and powerful language support for stored procedures and triggers. It has been used in production systems, under a variety of names since 1981.
<p>
Firebird is a commercially independent project of C and C++ programmers, technical advisors and supporters developing and enhancing a multi-platform relational database management system based on the source code released by Inprise Corp (now known as Borland Software Corp) on 25 July, 2000 under the InterBase Public License v.1.0.
<table colspecs=2 cellpadding=2 cellspacing=2>
  <tr>
    <td width=76 valign="middle">
<a href="http://www.opensource.org/docs/definition.php"><img src="images/opensource.gif" alt="Open Source Logo" border="0" width="75" height="65"></a>
    </td>
    <td>
New code modules added to Firebird are licensed under the <a href="index.php?op=docs&id=idpl">Initial Developer's Public License</a>. (IDPL).  The original modules released by Inprise are licensed under the <a href="index.php?op=docs&id=idpl">InterBase Public License v.1.0</a>.  Both licences are modified versions of the <a href="http://www.opensource.org/licenses/mozilla1.1.php">Mozilla Public License v.1.1</a>.
    </td>
  </tr>
</table>

<hr size=1>
<table>
  <tr>
    <td>
<a href="http://www.flamerobin.org">
<img src="images/flamerobin2.gif" alt="FlameRobin Project" width=218 height=47 border=0></a>
    </td>
    <td><a href="http://www.flamerobin.org">FlameRobin</a> is a project to build a cross-platform, lightweight GUI admin tool for Firebird completely with open source components.  Alpha builds for Linux and Windows are ready--try them out and feed back to the FlameRobin team, please!
    </td>
  </tr>
</table>
<hr size=1>
<?php

$action="news";

require('tf.actions.php');
//include("newsflash.php");
include("news.php");
?>
