<?PHP

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)            */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!isset($mainfile)) { include("mainfile.php"); }

function defaultDisplay() {
	include ('header.php');
	global $user, $cookie;
	OpenTable4();
	echo "<font size=4><b>".translate("Submit News")."</b><font size=2>";
	if (isset($user)) getusrinfo($user);
	echo "<p><FORM action=\"submit.php\" method=post>"
		."<b>".translate("Your Name")."</b> ";
	if ($user) {
		cookiedecode($user);
		echo "<a href=\"user.php\">$cookie[1]</a> <font size=2>[ <a href=\"user.php?op=logout\">".translate("Logout")."</a> ]</font>";
	} else {
		echo "$anonymous <font size=2>[ <a href=\"user.php\">".translate("New User")."</a> ]</font>";
	} ?>
	<P><B><?php echo translate("Title"); ?></B>
	(<?php echo translate ("Be Descriptive, Clear and Simple"); ?>)<BR>
	<input class=textbox type="text" NAME="subject" SIZE=70 maxlength=80><BR><FONT size=2>(<?php echo translate("bad titles='Check This Out!' or 'An Article'."); ?>)</FONT>
	<BR>
	<p><b><?php echo translate("Topic"); ?></b> <SELECT class=textbox NAME=topic>
	<?PHP
	$toplist = mysql_query("select topicid, topictext from topics order by topictext");
        echo "<OPTION VALUE=\"\">".translate("Select Topic")."</option>\n";
        while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    	    if ($topicid==$topic) { $sel = "selected "; }
            echo "<option $sel value=\"$topicid\">$topics</option>\n";
	    $sel = "";
        }
	?>
	</select>
	<P><B><?php echo translate("The Scoop"); ?></B>
	(<?php echo translate("HTML is fine, but double check those URLs and HTML tags!"); ?>)<BR>
	<TEXTAREA class=textbox wrap=virtual cols=70 rows=12 name=story></TEXTAREA><BR>
	<FONT size=2>(<?php echo translate("Are you sure you included a URL? Did you test them for typos?"); ?>)</FONT><P>
	<INPUT type=submit name=op value="Preview"> (<?php echo translate("You must preview once before you can submit"); ?>)</FORM>
	<?PHP
	CloseTable();
	include ('footer.php');
}

function PreviewStory($name, $address, $subject, $story, $topic) {
	global $user, $cookie, $tipath;
	include ('header.php');
	$subject = stripslashes(check_html($subject, "nohtml"));
	$story = stripslashes(check_html($story, ""));
	echo "<table border=0 width=100% cellpadding=0 cellspacing=1 bgcolor=000000><tr><td>";
	echo "<table border=0 width=100% cellpadding=8 cellspacing=1 bgcolor=FFFFFF><tr><td>";
	echo "<font size=3><b>".translate("Submit News")."</b></font><br><br>";
	echo "<p><FORM action=\"submit.php\" method=post>"
		."<b>".translate("Your Name")."</b> ";
	if ($user) {
		cookiedecode($user);
		echo "<a href=\"user.php\">$cookie[1]</a> <font size=2>[ <a href=\"user.php?op=logout\">".translate("Logout")."</a> ]</font>";
	} else {
		echo "$anonymous";
	} ?>
	<p><b><?php echo translate("Title"); ?></b><br>
	<input class=textbox type="text" NAME="subject" SIZE=70 maxlength=80 value="<?PHP echo"$subject"; ?>">
	<?PHP
	
	echo "<br><br><center><table border=0 width=75% cellpadding=0 cellspacing=1 bgcolor=000000><tr><td>";
	echo "<table border=0 width=100% cellpadding=8 cellspacing=1 bgcolor=FFFFFF><tr><td>";
	if ($topic=="") {
	    $topicimage="AllTopics.gif";
	    $warning = "<center><blink><b>".translate("Select Topic")."</b></blink></center>";
	} else {
	    $warning = "";
	    $result = mysql_query("select topicimage from topics where topicid='$topic'");
	    list($topicimage) = mysql_fetch_row($result);
	}
	echo "<img src=$tipath$topicimage border=0 align=right>";
	themepreview($subject, $story);
	echo "$warning";
	echo "</td></tr></table></td></tr></table></center>";
	
	?>
	<p><b><?php echo translate("Topic"); ?></b><select class=textbox name=topic>
	<?PHP
	$toplist = mysql_query("select topicid, topictext from topics order by topictext");
	echo "<OPTION VALUE=\"\">".translate("Select Topic")."</option>\n";
        while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    	    if ($topicid==$topic) { $sel = "selected "; }
            echo "<option $sel value=\"$topicid\">$topics</option>\n";
	    $sel = "";
        }
	?>
	</select>
	<P><B><?php echo translate("The Scoop"); ?></B>
	(<?php echo translate("HTML is fine, but double check those URLs and HTML tags!"); ?>)<BR>
	<TEXTAREA class=textbox wrap=virtual cols=50 rows=12 name=story><?PHP echo"$story"; ?></TEXTAREA><BR>
	<FONT size=2>(<?php echo translate("Are you sure you included a URL? Did you test them for typos?"); ?>)</FONT><P>
	<INPUT type=submit name=op value="Preview"> <INPUT type=submit name=op value="Ok!">
	</td></tr></table></td></tr></table></FORM>

	<?PHP
	include ('footer.php');
}

function submitStory($name, $address, $subject, $story, $topic) {
	global $user, $EditedMessage, $cookie;
  include('config.php');
	include ('header.php');
	echo translate("Thanks for your submission.");
	include ('footer.php');
	if ($user) {
		cookiedecode($user);
		$uid = $cookie[0];
		$name = $cookie[1];
	} else {
		$uid = -1;
		$name = "Anonymous";
	}
	$subject = stripslashes(FixQuotes(check_html($subject, "nohtml")));
	$story = stripslashes(FixQuotes(check_html($story, "")));
	$result = mysql_query("insert into queue values (NULL, '$uid', '$name', '$subject', '$story', now(), '$topic')");
	if(!$result) {
		echo mysql_errno(). ": ".mysql_error(). "<br>";
		exit();
	}
	if($notify) {
		mail($notify_email, $notify_subject, $notify_message, "From: $notify_from\nX-Mailer: PHP/" . phpversion());
	}
}

switch($op)
{
	case "Preview":
		PreviewStory($name, $address, $subject, $story, $topic);
		break;

	case "Ok!":
		SubmitStory($name, $address, $subject, $story, $topic);
		break;

	default:
		defaultDisplay();
		break;

}

?>
