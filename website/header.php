<?php
if (eregi("header.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php 

# here we print current langfile encoding
# if this isnt correct, u can change it from /tf.lang/??.php,
# where ?? is your lang code (english->en etc)

print $l['ENCODING'];

?>">
<meta name="DESCRIPTION" content="Firebird is a relational database offering many ANSI SQL-92 features that runs on Linux, Windows, and a variety of Unix platforms. Firebird offers excellent concurrency, high performance, and powerful language support for stored procedures and triggers. It has been used in production systems, under a variety of names since 1981. Firebird is a commercially independent project of C and C++ programmers, technical advisors and supporters developing and enhancing a multi-platform relational database management system based on the source code released by Inprise Corp (now known as Borland Software Corp) under the InterBase Public License v.1.0 on 25 July, 2000.">
<meta name="KEYWORDS" content="Firebird, InterBase, ISC, interbase, Database, database, Relational, relational, Relational Database, PostgreSQL, MYSQL, Borland, IBPhoenix, BORLAND, INPRISE, Inprise Corporation, Client/Server, client server products, client/server solutions, Development Tools, Delphi, JBuilder, Linux, Open Source, Web Database Development, C++Builder, database tools, database development tools, database engines, database programming, SQL, SQL programming, SQL links, SQL databases">
<title>Firebird - Relational Database for the New Millennium</title>

<link rel="stylesheet" href="<?php

# if there are user logged in we get him/her personal template css-file
# else we use current board one. css file should be in template dir
# with same name as template (default/default.css) or with name "style.css"

print get_css_path();
?>" type="text/css" />
<script language="JavaScript" type="text/javascript" src="<?php
	# here we load javascript. javascript should be in template dir with name tf.js
	print get_template_path().'tf.js';
?>"></script>
<?php
if (get_favicon_path() != false)
{
	print '<link rel="shortcut icon" href="'.get_favicon_path().'" />'."\n";
}
?>
</head>

<body bgcolor="#FFFFFF">
