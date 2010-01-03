<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">


<?php

  /* FUNCTION DEFINITIONS */


  function path_to_file ($dir, $filename)
  {
    $pathsep = '/';
    $len = strlen($dir);
    if ($len == 0 || $dir[$len-1] == $pathsep) {
      return $dir.$filename;
    }
    else {
      return $dir.$pathsep.$filename;
    }
  }
  
  
/*
   Get entries from a directory.

   $path    - path to directory to be listed (default is current dir)
   $type    - 'd'          : list only directories
              'f'          : list only regular files
              anything else: list all types (default)
   $flags   - 'R': entry must be readable to be listed
              'W': entry must be writable to be listed
              R and W may be combined, or be both absent (latter is default)
   $include - a Perl-compatible regexp pattern or array thereof (default includes all)
   $exclude - a Perl-compatible regexp pattern or array thereof (default excludes nothing)

   @result: an array with zero or more strings.

   An entry is listed if and only if all of the following are true:
   - the (optional) type is matched
   - the (optional) flags are matched
   - at least one include pattern is matched
   - no exclude pattern is matched

   With the default argument values, every entry is included.
*/
function GetDirEntries ($path = '.', $type = '', $flags = '', $include = array('/.*/'), $exclude = array()) {
  if (is_string($include)) $include = array($include);
  if (is_string($exclude)) $exclude = array($exclude);

  $d = dir($path);
  if (!is_object($d)) return array();  // or null - but then caller must be prepared for this

  $entries = array();
  while (false !== ($entry = $d->read())) {
    // prepend path for use in file/dir functions:
    $path_to_entry = path_to_file($path, $entry);
    // skip if entry is not of the right type:
    if (   $type == 'd' && !is_dir($path_to_entry)
        || $type == 'f' && !is_file($path_to_entry)) {
      continue;
    }
    // skip if entry is not readable/writable while it ought to be:
    if (   (strpos($flags, 'R') !== false && !is_readable($path_to_entry))
        || (strpos($flags, 'W') !== false && !is_writable($path_to_entry))) {
      continue;
    }
    // skip if any exclude pattern matched:
    foreach ($exclude as $excl) {
      if (preg_match($excl, $entry)) {
        continue 2; // i.e. continue the while loop
      }
    }
    // add if any include pattern matched:
    foreach ($include as $incl) {
      if (preg_match($incl, $entry)) {
        $entries[] = $entry;
        break;
      }
    }
  }
  $d->close();

  return $entries;
}


  function GetDirectoryList ($path = '.', $flags = '') {
    return GetDirEntries($path, 'd', $flags, '/.*/', '/^\.$/');  // exclude '.' (current dir)
  }


  function GetFileList ($path = '.', $flags = '') {
    $excl = array('/^index\.php$/', '/^\.ht/');  // exclude index.php and .ht* files
    return GetDirEntries($path, 'f', $flags, '/.*/', $excl);
  }


  function ShowDirectory($dirname, $parentdir)
  {
    $dirpath = path_to_file($parentdir, $dirname);

    $filedate = date('Y-m-d', filemtime($dirpath));
    $filetime = date('H:i:s', filemtime($dirpath));
  ?>
    <tr valign='top'>
      <td nowrap><?php echo $filedate; ?></td>
      <td></td>
      <td nowrap><?php echo $filetime; ?></td>
      <td></td>
      <td class=content><?php echo "<a href='$dirpath'>$dirname</a>"; ?></td>
      <td></td>
      <td align='right'>(dir)</td>
    </tr>
  <?php
  }


  function ShowSeparator()
  {
  ?>
    <tr valign='top'>
      <td colspan=7><hr size=2></td>
    </tr>
  <?php
  }


  function ShowFile($filename, $dir = '')
  {
    $filepath = path_to_file($dir, $filename);

    $size = filesize($filepath);
    if ($size == 0) {
      $unit = '';
      $size = '';
    }
    else {
      $unit = 'bytes';
      if ($size > 1024) {
        $size = ceil($size / 1024);
        $unit = 'KB';
        if ($size > 1024) {
          $size = ceil($size / 1024);
          $unit = 'MB';
        }
      }
      $size .= " $unit";
    }
    $filedate = date('Y-m-d', filemtime($filepath));
    $filetime = date('H:i:s', filemtime($filepath));
  ?>
    <tr valign='top'>
      <td nowrap><?php echo $filedate; ?></td>
      <td></td>
      <td nowrap><?php echo $filetime; ?></td>
      <td></td>
      <td nowrap class=content><?php echo "<a href='$filepath'>$filename</a>"; ?></td>
      <td></td>
      <td nowrap align='right'><?php echo $size; ?></td>
    </tr>
  <?php
  }


  /*  END OF FUNCTION DEFINITIONS */

?>


<html>
<head>
  <title>Firebird Website - Directory Index</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta name="DESCRIPTION" content="Firebird is a relational database offering many ANSI SQL-92 features that runs on Linux, Windows, and a variety of Unix platforms. Firebird offers excellent concurrency, high performance, and powerful language support for stored procedures and triggers. It has been used in production systems, under a variety of names since 1981. Firebird is a commercially independent project of C and C++ programmers, technical advisors and supporters developing and enhancing a multi-platform relational database management system based on the source code released by Inprise Corp (now known as Borland Software Corp) under the InterBase Public License v.1.0 on 25 July, 2000.">
  <meta name="KEYWORDS" content="Firebird, InterBase, ISC, interbase, Database, database, Relational, relational, Relational Database, PostgreSQL, MYSQL, Borland, IBPhoenix, BORLAND, INPRISE, Inprise Corporation, Client/Server, client server products, client/server solutions, Development Tools, Delphi, JBuilder, Linux, Open Source, Web Database Development, C++Builder, database tools, database development tools, database engines, database programming, SQL, SQL programming, SQL links, SQL databases">
</head>


<body bgcolor="#FFFFFF">


<?php

  $base = '/htdocs/';
  $dir = getcwd();
  $pos = strpos($dir, $base);
  if ($pos !== false) {
    $dir = substr($dir, $pos + strlen($base));
  }
  $uri = $_SERVER['REQUEST_URI'];
  if ($uri == '') $uri = $dir;
?>


  <H4 class="centre">Index of <?php echo "$uri"; ?></H4>
  <p>
  <table cellspacing="2" cellpadding="2">


<?php

  $path = '.';
  
  $dirItems  = GetDirectoryList($path, 'R');
  $fileItems = GetFileList($path, 'R');

  if ($dirItems) {
    natcasesort($dirItems);
    foreach ($dirItems as $item) {
      ShowDirectory($item, $path);
    }
  }
  
  if ($fileItems) {
    if ($dirItems) {
      ShowSeparator();
    }
    natcasesort($fileItems);
    foreach ($fileItems as $item) {
      ShowFile($item, $path);
    }
  }
?>

</table>

</body>
</html>
