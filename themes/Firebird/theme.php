<?php

$thename = "Firebird";
$bgcolor1 = "#CE383D";
$bgcolor2 = "999999";
$bgcolor3 = "FFFFFF";
$bgcolor4 = "CCCCCC";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

function themepreview($title, $hometext, $bodytext="", $notes="") {
    global $textcolor2;
    echo "<font color=$textcolor2><p><b>$title</b><br>$hometext $bodytext $notes</font>";
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
	global $tipath, $anonymous;



	if ("$aid" == "$informant") { ?>

<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>

<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=CE383D>
<font size=4 color=FFFFFF>
<b><?php echo"$title"; ?></b><br>
</td></tr><tr><td bgcolor=FFFFFF>
<a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
<font size=2>
<?php echo translate("Posted by "); ?> <b><?php formatAidHeader($aid) ?></b> <?php echo translate("on"); ?> <?php echo"$time $timezone"; ?><br>(<?php echo $counter; ?> <?php echo translate("reads"); ?>)
<br><br>
<?php echo"$thetext<br><br>
</td></tr><tr><td align=left bgcolor=CCCCCC>
<font size=2>$morelink"; ?>
</td>
</tr>
</table>

</td></tr></table>
<br>

<?php	} else {
		if($informant != "") $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= "".translate("writes")." <i>\"$thetext\"</i> $notes";
?>

<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>

<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=CE383D>
<font size=4 color=FFFFFF>
<b><?php echo"$title"; ?></b><br>
<font size=2>
</td></tr><tr><td bgcolor=FFFFFF>
<a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
<font size=2>
<?php echo translate("Posted by "); ?> <?php formatAidHeader($aid); ?> <?php echo translate("on"); ?> <?php echo"$time $timezone"; ?><br>(<?php echo $counter; ?> <?php echo translate("reads"); ?>)
<br><br>

<?php echo"$boxstuff<br><br>
</td></tr><tr><td align=left bgcolor=CCCCCC>
<font size=2>$morelink"; ?>
</td>
</tr>
</table>

</td></tr></table>
<br>

<?php	}
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
	global $admin, $sid, $tipath;
	if ("$aid" == "$informant") {
echo"

<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>

<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=CE383D><font color=FFFFFF>
<font size=4>
<b>$title</b><br><font size=2> $datetime
";
if ($admin) {
    echo "&nbsp;&nbsp; <font size=2> [ <a href=admin.php?op=EditStory&sid=$sid>".translate("Edit")."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>".translate("Delete")."</a> ]";
}
echo "
</td>
</tr>
<tr>
<td bgcolor=ffffff>
<font size=2>
<a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
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
<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=CE383D><font color=FFFFFF>
<font size=4>
<b>$title</b><br><font size=2> ".translate("Contributed by")." $informant ".translate("on")." $datetime</font>
";
if ($admin) {
    echo "&nbsp;&nbsp; <font size=2> [ <a href=admin.php?op=EditStory&sid=$sid>".translate("Edit")."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>".translate("Delete")."</a> ]";
}
echo "
</td>
</tr>
<tr>
<td bgcolor=ffffff>
<font size=2>
<a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
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
?>
<table border=0 cellspacing=0 cellpadding=0 width=200 bgcolor=000000>
<tr>
<td>
<table width=100% border=0 cellspacing=2 cellpadding=3>
<tr>
<td colspan=1 bgcolor=CE383D align=center>
<font size=3 color=FFFFFF><b><?php echo"$title"; ?></b>
</td>
</tr>
<tr>
<td bgcolor=FFFFFF>
<font size=2>
<?php echo"$content"; ?>
</td>
</tr>
</table>
</td>
</tr>
</table><br>
    
<?php
}
?>
