<?php
if (eregi("header.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="DESCRIPTION" content="Firebird Relational Database.">
<meta name="KEYWORDS" content="Firebird, SQL, jbird, IBPhoenix, InterBase, ISC,  interbase, Database, database, Relational, relational, Relational Database, PostgreSQL, MYSQL, Borland, BORLAND, INPRISE, Inprise Corporation, Client/Server, client server products, client/server solutions, Development Tools, Delphi, JBuilder, Linux, Open Source, Web Database Development, C++Builder, database tools, database development tools, database engines, database programming, SQL, SQL programming, SQL links, SQL databases">
<title>The Firebird Project</title>
<link REL="shortcut icon" HREF="<?=$rootDir ?>images/firebird.ico" TYPE="image/x-icon">
<LINK REL=STYLESHEET HREF="<?=$rootDir ?>firebird.css" TYPE="text/css">
</head>
