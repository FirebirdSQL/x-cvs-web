<?php

$thename = "Firebird";
$bgcolor1 = "#CE383D";
//$bgcolor1 = "#CCCCCC";
$bgcolor2 = "999999";
$bgcolor3 = "FFFFFF";
$bgcolor4 = "CCCCCC";
//$bgcolor4 = "FFFFFF";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

function themepreview($title, $hometext, $bodytext="", $notes="") {
    global $textcolor2;
    echo "<font color=$textcolor2><p><b>$title</b><br>$hometext $bodytext $notes</font>";
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
	global $tipath, $anonymous, $bgcolor4, $textcolor2;

	if ("$aid" == "$informant") { ?>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
  <td>
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr><td colspan="1" bgcolor="FFFFFF" align="left">
    <font size="3" color=<?php echo"$textcolor2"; ?>><b><?php echo"$title"; ?></b>
    </td></tr>
  </table>
  <table border="0" cellPadding="0" cellSpacing="0" width="100%">
  <tr bgColor="#000000">
    <td><img alt height="2" src="themes/Firebird/1x1.gif" width="1"></td>
  </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="3" width="100%" bgcolor="000000">
  <tr><td bgcolor=FFFFFF>
<img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10>
  <font size=2>
  <?php echo translate("Posted by "); ?> <b><?php formatAidHeader($aid) ?></b> <?php echo translate("on"); ?> <?php echo"$time $timezone"; ?><br>(<?php echo $counter; ?> <?php echo translate("reads"); ?>)
  </font><br><br><font size=2>
  <?php echo"$thetext<br><br>"; ?></font>
  </td></tr>
  <tr><td align=left bgcolor=FFFFFF>
    <font size=2><i><?php echo "$morelink"; ?></i>
  </td></tr>
  </table>
</td></tr>
</table><br>


<?php	} else {
		if($informant != "") $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= "".translate("writes")." <i>\"$thetext\"</i> $notes";
?>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
  <td>
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr><td colspan="1" bgcolor="FFFFFF" align="left">
    <font size="3" color=<?php echo"$textcolor2"; ?>><b><?php echo"$title"; ?></b>
    </td></tr>
  </table>
  <table border="0" cellPadding="0" cellSpacing="0" width="100%">
  <tr bgColor="#000000">
    <td><img alt height="2" src="themes/Firebird/1x1.gif" width="1"></td>
  </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="3" width="100%" bgcolor="000000">
  <tr><td bgcolor=FFFFFF>
<img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10>  <font size=2>
  <?php echo translate("Posted by "); ?> <b><?php formatAidHeader($aid) ?></b> <?php echo translate("on"); ?> <?php echo"$time"; ?><br> (<?php echo $counter; ?> <?php echo translate("reads"); ?>)
  </font><br><br><font size=2>
  <?php echo"$boxstuff<br><br>"; ?></font>
  </td></tr>
  <tr><td align=left bgcolor=FFFFFF>
    <font size=2><i><?php echo "$morelink"; ?></i>
  </td></tr>
  </table>
</td></tr>
</table><br>


<?php	}
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
	global $admin, $sid, $tipath, $bgcolor4, $textcolor2;
	if ("$aid" == "$informant") {
echo"

<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>

<table border=0 cellpadding=3 cellspacing=0 width=100%>
<tr><td bgcolor=$bgcolor4><font color=$textcolor2>
<font size=4>
<b>$title</b><br><font size=2> $datetime
<br><a href=\"print.php?sid=$sid\"><img src=\"images/print.gif\" border=0 Alt=\"".translate("Printer Friendly Page")."\" width=15 height=11></a>&nbsp;&nbsp;
<a href=\"friend.php?op=FriendSend&sid=$sid\"><img src=\"images/friend.gif\" border=0 Alt=\"".translate("Send this Story to a Friend")."\" width=15 height=11></a>
";
if ($admin) {
    echo "<font size=2> [ <a href=admin.php?op=EditStory&sid=$sid>".translate("Edit")."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>".translate("Delete")."</a> ]";
}
echo "
</td>
</tr>
<tr>
<td bgcolor=ffffff>
<font size=2>
$thetext
</td>
</tr>
</table>
</td>
</tr>
</table><br>
";

	} else {
		if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= "".translate("writes")." <i>\"$thetext\"</i> $notes";
echo "

<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>
<table border=0 cellpadding=3 cellspacing=0 width=100%>
<tr><td bgcolor=$bgcolor4><font color=$textcolor2>
<font size=4>
<b>$title</b><br><font size=2> ".translate("Contributed by")." $informant ".translate("on")." $datetime</font>
";
if ($admin) {
    echo "<br> <font size=2> [ <a href=admin.php?op=EditStory&sid=$sid>".translate("Edit")."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>".translate("Delete")."</a> ]";
}
echo "
</td>
</tr>
<tr>
<td bgcolor=ffffff>
<font size=2>
 $thetext
</td>
</tr>
</table>
</td>
</tr>
</table><br>
";

	}
}

?>

<?php
function themesidebox($title, $content) {
global $textcolor1, $textcolor2;
?>
<table border=0 cellspacing=0 cellpadding=0 width=200 bgcolor=CE383D>
  <tr>
  <td>
  <table width=100% border=0 cellspacing=0 cellpadding=3>
    <tr>
    <td colspan=1 bgcolor=FFFFFF align=left>
    <font size=3 color=<?php echo"$textcolor2"; ?>><b><?php echo"$title"; ?></b>
    </td>
    </tr>
  </table>
  <table border="0" cellPadding="0" cellSpacing="0" width="100%">
  <TBODY>
  <tr bgColor="#000000">
    <td><img alt height="2" src="themes/Firebird/1x1.gif" width="1"></td>
  </tr>
  </TBODY>
  </table>
  <table border=0 cellspacing=0 cellpadding=3 width=200 bgcolor=000000>
  <tr><td bgcolor=FFFFFF>
  <font size=2>
    <?php echo"$content"; ?>
  </td></tr>
  </table>
</td></tr>
</table><br>
    
<?php
}

function thememainbox($title, $content) {
global $textcolor1, $textcolor2;

if ("$title" != "") { ?>
<table border=0 cellspacing=0 cellpadding=0 width=100% bgcolor=CE383D>
<tr><td>
  <table width=100% border=0 cellspacing=0 cellpadding=3>
  <tr>
  <td colspan=1 bgcolor=FFFFFF align=left>
    <font size=3 color=<?php echo"$textcolor2"; ?>><b><?php echo"$title"; ?></b>
  </td>
  </tr>
  </table>
  <table border="0" cellPadding="0" cellSpacing="0" width="100%">
  <TBODY>
    <tr bgColor="#000000">
    <td><img alt height="2" src="themes/Firebird/1x1.gif" width="1"></td>
    </tr>
  </TBODY>
  </table>
<?php
  } ?>
  <table border=0 cellspacing=0 cellpadding=3 width=100% bgcolor=000000>
  <tr><td bgcolor=FFFFFF>
  <font size=2>
  <?php echo"$content"; 
if ("$title" != "") { ?>
  </td>
  </tr>
  </table>
<?php
  } ?>
</td></tr>
</table><br>
    
<?php
}
?>
