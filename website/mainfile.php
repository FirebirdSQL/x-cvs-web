<?php

foreach ($_GET as $secvalue) {
    if (eregi("<[^>]*script*\"?[^>]*>", $secvalue) OR eregi("\([^>]*.*\"?[^>]*\)", $secvalue)) {
	die ("I don't like you...");
    }
}

if (eregi("mainfile.php",$PHP_SELF)) {
    Header("Location: index.php");
    die();
}


require_once($rootDir."/config.php");
$mainfile = 1;

function GetMailingListPageLink($listdesc, $caption = "", $echo = false) {
  global $rootDir;
  $list_name = "" ; $list_id = "" ;
  if (!eregi ("\.dat$",$listdesc)) $listdesc .= ".dat" ;
  include ("lists/data/".$listdesc);
//  echo ">".$list_name."<";
  if ($caption == "") $caption = $list_name;
  $result = "<a href=\"index.php?op=lists#$list_id\">$caption</a>" ;
  if ($echo) { echo $result ; return true ; }
  else return $result ;
}

function IsRabbitInProject ($rabbit, $project) {
  global $rootDir;
  $title = "" ; $login = "" ; $sfuid = "" ; $name = "" ; $email = "" ;
  $function = "" ; $subprojects = ""; $mainpage = "" ;
  if (!eregi ("\.dat$",$rabbit)) $rabbit .= ".dat" ;
  include ($rootDir."rabbits/".$rabbit);
  $projects = explode(":",$subprojects) ;
  $result = false ;
  foreach ($projects as $testproj)
    if ($project == $testproj) $result = true ;
  return $result ;
}

function GetRabbitEMail ($rabbit, $echo = false) {
  global $rootDir;
  $title = "" ; $login = "" ; $sfuid = "" ; $name = "" ; $email = "" ;
  $function = "" ; $subprojects = ""; $mainpage = "" ;
  if (!eregi ("\.dat$",$rabbit)) $rabbit .= ".dat" ;
  include ($rootDir."rabbits/".$rabbit);
  if ($email == "") $email = $login."@users.sourceforge.net" ;
  $result = $email ;
  if ($echo) { echo $result ; return true ; }
  else return $result ;
}

function GetRabbitEMailLink ($rabbit, $echo = false) {
  global $rootDir;
  $title = "" ; $login = "" ; $sfuid = "" ; $name = "" ; $email = "" ;
  $function = "" ; $subprojects = ""; $mainpage = "" ;
  if (!eregi ("\.dat$",$rabbit)) $rabbit .= ".dat" ;
  include ($rootDir."rabbits/".$rabbit);
  if ($email == "") $email = $login."@users.sourceforge.net" ;
  $result = "<A href=\"mailto:$email\">$name</A>" ;
  if ($echo) { echo $result ; return true ; }
  else return $result ;
}

function GetRabbitSafeEMailLink ($rabbit, $caption = "", $echo = false) {
  global $rootDir;
  $title = "" ; $login = "" ; $sfuid = "" ; $name = "" ; $email = "" ;
  $function = "" ; $subprojects = ""; $mainpage = "" ;
  if (!eregi ("\.dat$",$rabbit)) $rabbit .= ".dat" ;
  include ($rootDir."rabbits/".$rabbit);
  if ($caption != "") $name = $caption;
  $result = "<A href=\"http://sourceforge.net/sendmessage.php?touser=$sfuid\">$name</A>" ;
  if ($echo) { echo $result ; return true ; }
  else return $result ;
}

function GetRabbitInfoLink ($rabbit, $echo = false) {
  global $rootDir;
  $title = "" ; $login = "" ; $sfuid = "" ; $name = "" ; $email = "" ;
  $function = "" ; $subprojects = ""; $mainpage = "" ;
  if (!eregi ("\.dat$",$rabbit)) {$rabbit .= ".dat" ;}
  include ($rootDir."rabbits/".$rabbit);
  $result = "<A href=\"index.php?op=rabbits&amp;info=$login\">$name</A>" ;
  if ($echo) { echo $result ; return true ; }
  else return $result ;
}

function path_to_file ($dir, $filename) {
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
  // get all dir entries except '.' and '..'
  return GetDirEntries($path, 'd', $flags, '/.*/', '/^\.{1,2}$/');
}

function GetFileList ($path = '.', $flags = '', $regexp = '') {
  // GetDirEntries wants a delimited regexp; ereg will disappear!
  $include = $regexp == '' ? '/.*/' : '/'.$regexp.'/';
  return GetDirEntries($path, 'f', $flags, $include);
}

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=0 bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=8 bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<center>";
    echo "<table border=0 cellspacing=1 cellpadding=0 bgcolor=\"$bgcolor1\"><tr><td>\n";
    echo "<table border=0 cellspacing=1 cellpadding=8 bgcolor=\"$bgcolor2\"><tr><td>\n";
}

function OpenTable3() {
    global $bgcolor1, $bgcolor3;
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=0 bgcolor=\"$bgcolor1\"><tr><td>\n";
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=8 bgcolor=\"$bgcolor3\"><tr><td>\n";
}

function OpenTable4() {
    global $bgcolor1, $bgcolor4;
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=0 bgcolor=\"$bgcolor1\"><tr><td>\n";
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=8 bgcolor=\"$bgcolor4\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function FixQuotes ($what = "") {
	$what = ereg_replace("'","''",$what);
	while (eregi("\\\\'", $what)) {
		$what = ereg_replace("\\\\'","'",$what);
	}
	return $what;
}

function delQuotes($string){
    /* no recursive function to add quote to an HTML tag if needed */
    /* and delete duplicate spaces between attribs. */
    $tmp="";    # string buffer
    $result=""; # result string
    $i=0;
    $attrib=-1; # Are us in an HTML attrib ?   -1: no attrib   0: name of the attrib   1: value of the atrib
    $quote=0;   # Is a string quote delimited opened ? 0=no, 1=yes
    $len = strlen($string);
    while ($i<$len) {
	switch($string[$i]) { # What car is it in the buffer ?
	    case "\"": #"       # a quote.
		if ($quote==0) {
		    $quote=1;
		} else {
		    $quote=0;
		    if (($attrib>0) && ($tmp != "")) { $result .= "=\"$tmp\""; }
		    $tmp="";
		    $attrib=-1;
		}
		break;
	    case "=":           # an equal - attrib delimiter
		if ($quote==0) {  # Is it found in a string ?
		    $attrib=1;
		    if ($tmp!="") $result.=" $tmp";
		    $tmp="";
		} else $tmp .= '=';
		break;
	    case " ":           # a blank ?
		if ($attrib>0) {  # add it to the string, if one opened.
		    $tmp .= $string[$i];
		}
		break;
	    default:            # Other
		if ($attrib<0)    # If we weren't in an attrib, set attrib to 0
		$attrib=0;
		$tmp .= $string[$i];
		break;
	}
	$i++;
    }
    if (($quote!=0) && ($tmp != "")) {
	if ($attrib==1) $result .= "=";
	/* If it is the value of an atrib, add the '=' */
	$result .= "\"$tmp\"";  /* Add quote if needed (the reason of the function ;-) */
    }
    return $result;
}

function check_html ($str, $strip="") {
    /* The core of this code has been lifted from phpslash */
    /* which is licenced under the GPL. */
    include("config.php");
    if ($strip == "nohtml")
    	$AllowableHTML=array('');
	$str = stripslashes($str);
	$str = eregi_replace("<[[:space:]]*([^>]*)[[:space:]]*>",
                         '<\\1>', $str);
               // Delete all spaces from html tags .
	$str = eregi_replace("<a[^>]*href[[:space:]]*=[[:space:]]*\"?[[:space:]]*([^\" >]*)[[:space:]]*\"?[^>]*>",
                         '<a href="\\1">', $str); # "
               // Delete all attribs from Anchor, except an href, double quoted.
	$str = eregi_replace("<img?",
                         '', $str); # "
	$tmp = "";
	while (ereg("<(/?[[:alpha:]]*)[[:space:]]*([^>]*)>",$str,$reg)) {
		$i = strpos($str,$reg[0]);
		$l = strlen($reg[0]);
		if ($reg[1][0] == "/") $tag = strtolower(substr($reg[1],1));
		else $tag = strtolower($reg[1]);
		if ($a = $AllowableHTML[$tag])
			if ($reg[1][0] == "/") $tag = "</$tag>";
			elseif (($a == 1) || ($reg[2] == "")) $tag = "<$tag>";
			else {
			  # Place here the double quote fix function.
			  $attrb_list=delQuotes($reg[2]);
			  // A VER
			  $attrb_list = ereg_replace("&","&amp;",$attrb_list);

			  $tag = "<$tag" . $attrb_list . ">";
			} # Attribs in tag allowed
		else $tag = "";
		$tmp .= substr($str,0,$i) . $tag;
		$str = substr($str,$i+$l);
	}
	$str = $tmp . $str;
	return $str;
	exit;
	/* Squash PHP tags unconditionally */
	$str = ereg_replace("<\?","",$str);
	return $str;
}

function filter_text($Message, $strip="") {
    global $EditedMessage;
    check_words($Message);
    $EditedMessage=check_html($EditedMessage, $strip);
    return ($EditedMessage);
}

function sidebox($title, $content, $isfirst=0) {
global $textcolor1, $textcolor2, $bgcolor1,$sidetop,$sidebtm;

if ($isfirst == 1) {
  echo "$sidetop"; }
?>
<table border="0" cellspacing="0" cellpadding="0" width="200">
<tr><td>
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
  <td bgcolor="<?php echo"$bgcolor1"; ?>" align="left">
  <font color="<?php echo $textcolor1 ?>"><b><?php echo"$title"; ?></b></font>
  </td>
<!--   <td valign=top bgcolor="<?php echo $bgcolor1 ?>" width=2><img alt="" src=images/1x1.gif width=1></td> -->
  </tr>
  </table>
  <table border="0" cellPadding="0" cellSpacing="0" width="100%">
    <tr bgColor="<?php echo $textcolor1 ?>">
    <td><img alt="" height="2" src="images/1x1.gif" width="1"></td>
    </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="3" width="200" bgcolor="#000000">
  <tr><td class="normal" bgcolor="<?php echo"$bgcolor1"; ?>" align="left">
    <br><?php echo"$content"; ?><br>
    </td>
  </tr></table>
</td>
</tr>
<?php 
if ($isfirst == 2) {
  echo "
<tr><td>$sidebtm</td></tr>
"; }
?> 

</table>   
<?php
}

function mainbox($title, $content) {
global $textcolor1, $textcolor2, $bgcolor1;

if ("$title" != "") { ?>
<table border=0 cellspacing=0 cellpadding=0 width=100% bgcolor="<?php echo $bgcolor1 ?>">
<tr>
<td>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr>
<td colspan=1 bgcolor=<?php echo"$bgcolor1"; ?> align=left>
<font color=<?php echo"$textcolor2"; ?>><b><?php echo"$title"; ?></b>
</td>
</tr>
</table>
<table border="0" cellPadding="0" cellSpacing="0" width="100%">
  <tr bgColor="#000000">
    <td><img alt="" height="2" src="images/1x1.gif" width="1"></td>
  </tr>
</table>
<?php
  } ?>
<table border=0 cellspacing=0 cellpadding=0 width=100% bgcolor=000000>
<tr>
<td bgcolor=<?php echo"$bgcolor1"; ?>>
<?php echo"$content"; 
if ("$title" != "") { ?>
</td>
</tr>
</table>
<?php
  } ?>
</td>
</tr>
</table><br>
    
<?php
}

function NewsItem($datetime, $title, $content)
{
?>
  <tr><td class="news-head" valign="top" width="18%">
  <i><?php echo "$datetime"; ?></i></td>
  <td class="news-head" width="80%"><?php echo "<b>$title</b>"; ?></td></tr>
  <tr><td class="news-content" valign="top" width="18%"></td>
  <td class="news-content" width="80%"><?php echo "$content"; ?></td></tr>
<?php
}

function BlogItem($blogItem, $datetime, $title, $blogger, $content)
{
?>
  <tr>
    <td class="news-head" valign="top" width="18%">
    <?php echo "
    <a name=\"".basename($blogItem, ".blog")."\"></a>"; ?>
    <i>
    <?php echo "$datetime"; ?>
    </i>
    </td>
    <td class="news-head" width="64%" valign="top">
    <?php echo "<b>$title</b>"; ?>
    </td>
    <td class="news-head" width="18%" align="left" valign="top">
    <?php echo "$blogger"; ?>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan=2 class="news-content" width="82%">
    <?php echo "$content"; ?>
    </td>
  </tr>
  <tr>
    <td colspan=3><hr size=1></td>
  </tr>
<?php
}

?>
