<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<title>Firebird Project Downloads</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="DESCRIPTION" content="Firebird is a relational database offering many ANSI SQL-92 features that runs on Linux, Windows, and a variety of Unix platforms. Firebird offers excellent concurrency, high performance, and powerful language support for stored procedures and triggers. It has been used in production systems, under a variety of names since 1981. Firebird is a commercially independent project of C and C++ programmers, technical advisors and supporters developing and enhancing a multi-platform relational database management system based on the source code released by Inprise Corp (now known as Borland Software Corp) under the InterBase Public License v.1.0 on 25 July, 2000.">
<meta name="KEYWORDS" content="Firebird, InterBase, ISC, interbase, Database, database, Relational, relational, Relational Database, PostgreSQL, MYSQL, Borland, IBPhoenix, BORLAND, INPRISE, Inprise Corporation, Client/Server, client server products, client/server solutions, Development Tools, Delphi, JBuilder, Linux, Open Source, Web Database Development, C++Builder, database tools, database development tools, database engines, database programming, SQL, SQL programming, SQL links, SQL databases">
<link rel="stylesheet" href="./forum/tf.tpl/default/default.css" type="text/css" />
<script language="JavaScript" type="text/javascript" src="./forum/tf.tpl/default/tf.js"></script>
<link rel="icon" type="image/jpg" href="/images/favicon.jpg">
</head>

<body bgcolor="#FFFFFF">

<?php

function GetDirectoryList ($path) {
  global $rootDir;
  $pwd = getcwd();
  chdir($path);
  $d = dir(".");
  while($entry=$d->read()) {
      if (is_dir($entry) && ($entry != ".")) $dir[] = $entry ;
  }
  $d->close();
  chdir($pwd);
  return $dir;
}

function GetFileList ($path, $flags = "", $regexp = "") {
  global $rootDir;
  $flags .= " ";  // Important for correct evaluation of strpos below !!!
  $pwd = getcwd();
  chdir($path);
  if ($regexp == "") $regexp = ".*";
  $d = dir(".");
  while($entry=$d->read()) {
      if (is_file($entry) && ($entry != "index.php")) {
        if (!((strpos($flags,"R") && !is_readable($entry))
           || (strpos($flags,"W") && !is_writable($entry)))
           && ereg(strtoupper($regexp),strtoupper($entry))
           )
        $dir[] = $entry ;
      }
  }
  $d->close();
  chdir($pwd);
  return $dir;
}

function ShowDirectory($content)
{
  $filedate = date("Y-m-d",filemtime($content));
  $filetime = date("H:i:s",filemtime($content));
?>
  <tr valign="top">
    <td nowrap><?php echo $filedate; ?></td>
    <td></td>
    <td nowrap><?php echo $filetime; ?></td>
    <td></td>
    <td class=content><?php echo "<a href=\"$content\">$content</a>"; ?></td>
    <td></td>
    <td align="right">(dir)</td> 
  </tr>
<?php
}

function ShowSeparator()
{
?>
  <tr valign="top">
    <td colspan=7><hr size=2></td>
  </tr>
<?php
}

function ShowFile($content, $size)
{
  if ($size == 0) {
    $unit = "";
    $size = "";
  }
  else {
    $unit = "bytes";
    if ($size > 1024) {
      $size = ceil($size / 1024);
      $unit = "KB";
      if ($size > 1024) {
        $size = ceil($size / 1024);
        $unit = "MB";
      }
    }
    $size .= " $unit";
  }
  $filedate = date("Y-m-d",filemtime($content));
  $filetime = date("H:i:s",filemtime($content));
?>
  <tr valign="top">
    <td nowrap><?php echo $filedate; ?></td>
    <td></td>
    <td nowrap><?php echo $filetime; ?></td>    
    <td></td>
    <td nowrap class=content><?php echo "<a href=\"$content\">$content</a>"; ?></td>
    <td></td>
    <td nowrap align="right"><?php echo $size; ?></td>
  </tr>
<?php
}

?>


<?php
  $base = '/htdocs/'; 
  $dir = getcwd();
  $pos = strpos( $dir, $base );
  if ($pos !== false)
  {
    $dir = substr( $dir, $pos + strlen( $base ) );
  } 
  $uri = $_SERVER['REQUEST_URI'];
  if ( $uri == '' ) $uri = $dir;
?>


<H4 class="centre">Index of <?php echo "$uri"; ?></H4>
<p>
<TABLE CELLSPACING="2" CELLPADDING="2" SUMMARY="Latest News">

<?php

$dirItems  = GetDirectoryList(".","R","^.*\.*");
$fileItems = GetFileList(".","R","^.*\.*");

if ($dirItems != NULL)
{
  natcasesort($dirItems);
  foreach ($dirItems as $newItem) {
    ShowDirectory($newItem);
  }
}

if ($fileItems != NULL) {
  if ($dirItems != NULL) {
    ShowSeparator();
  }
  natcasesort($fileItems);
  foreach ($fileItems as $newItem) {
    ShowFile($newItem, filesize($newItem));
  }
}


?>
</table>

</body>
</html>
