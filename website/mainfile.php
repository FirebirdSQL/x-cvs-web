<?php

foreach ($HTTP_GET_VARS as $secvalue) {
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

function GetRabbitAdminLink ($rabbit, $echo = false) {
  global $rootDir;
  $title = "" ; $login = "" ; $sfuid = "" ; $name = "" ; $email = "" ;
  $function = "" ; $subprojects = ""; $mainpage = "" ;
  if (!eregi ("\.dat$",$rabbit)) {$rabbit .= ".dat" ;}
  include ($rootDir."rabbits/".$rabbit);
  $result = "<A href=\"index.php?op=admin&amp;info=$login\">$name</A>" ;
  if ($echo) { echo $result ; return true ; }
  else return $result ;
}

function GetDirectoryList ($path) {
  global $rootDir;
  $pwd = getcwd();
  chdir($path);
  $d = dir(".");
  while($entry=$d->read()) {
      if (is_dir($entry) && ($entry != ".") && ($entry != "..")) $dir[] = $entry ;
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
      if (is_file($entry)) {
        if (!((strpos($flags,"R") && !is_readable($entry))
           || (strpos($flags,"W") && !is_writable($entry)))
           && ereg($regexp,$entry)
           )
        $dir[] = $entry ;
      }
  }
  $d->close();
  chdir($pwd);
  return $dir;
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

function sidebox($title, $content) {
global $textcolor1, $textcolor2, $bgcolor1;
?>
<table border="0" cellspacing="0" cellpadding="0" width="200">
<tr><td>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
  <table border="0" cellspacing="0" cellpadding="0" width="200" bgcolor="#000000">
  <tr><td class="normal" bgcolor="<?php echo"$bgcolor1"; ?>" align="left">
    <br><?php echo"$content"; ?><br>
  </td>
<!--   <td valign=top bgcolor="<?php echo $bgcolor1 ?>" width=2><img alt="" src=images/1x1.gif width=1></td> -->
  </tr></table>
</td>
</tr></table>   
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
?>
