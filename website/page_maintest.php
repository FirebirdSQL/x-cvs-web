<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Firebird&trade; - Relational Database for the New Millennium</H4>
Firebird is a relational database offering many ANSI SQL-92 features that runs on Linux, Windows, and a variety of Unix platforms. Firebird offers excellent concurrency, high performance, and powerful language support for stored procedures and triggers. It has been used in production systems, under a variety of names since 1981.
<p>
Firebird is a commercially independent project of C and C++ programmers, technical advisors and supporters developing and enhancing a multi-platform relational database management system based on the source code released by Inprise Corp (now known as Borland Software Corp) under the <A href="index.php?op=doc&id=ipl">InterBase Public License v.1.0</A> on 25 July, 2000. 
<p>
<hr>
<?php

$action="news";

require('tf.actions.php');
//include("newsflash.php");
include("news.php");
?>
