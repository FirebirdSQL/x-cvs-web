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

if (!eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
$hlpfile = "manual/topics.html";
$result = mysql_query("select radmintopic, radminsuper from authors where aid='$aid'");
list($radmintopic, $radminsuper) = mysql_fetch_row($result);
if (($radmintopic==1) OR ($radminsuper==1)) {

/*********************************************************/
/* Topics Manager Functions                              */
/*********************************************************/

function topicsmanager() {
	global $hlpfile, $admin, $tipath;
	include("header.php");
	GraphicAdmin($hlpfile);
	$result = mysql_query("select topicid, topicname, topicimage, topictext from topics order by topicname");
	if (mysql_num_rows($result)==0) {
	    echo "
	    <table border=0 bgcolor=000000 cellpadding=0 cellspacing=1 width=95%><tr><td>
	    <table border=0 bgcolor=FFFFFF cellpadding=8 cellspacing=1 width=100%>";
	}
	if (mysql_num_rows($result) > 0) {
	OpenTable3();
	echo "
	<b><center>".translate("Current Active Topics")."</b><br>".translate("Click to Edit")."</center><br>
	<center><table border=0 width=100% align=center cellpadding=2><tr>";
		while(list($topicid, $topicname, $topicimage, $topictext) = mysql_fetch_array($result)) {
?>
		<td align=center>
		<?php echo "<a href=admin.php?op=topicedit&topicid=$topicid>"; ?><img src=<?php echo "$tipath$topicimage"; ?> border=0></a><br>
		<font size=2><b><?php echo "$topictext"; ?>
		</td>
		<?php
		
		// Thanks to John Hoffmann from softlinux.org for the next 5 lines ;)
		
		$count++;
		if ($count == 5) {
		    echo "</tr></tr>";
		    $count = 0;
		}
		}
	echo "</tr></table>";
	} 
	?>
	</td></tr></table></td></tr></table>
	<br><a name=Add>
	<?php OpenTable4(); ?>
	<font size=4><b><?php echo translate("Add a New Topic"); ?></b><font size=2>
	<br><br>
	<form action="admin.php" method="post"><br>
	<b><?php echo translate("Topic Name:"); ?></b> <?php echo translate("(just a name without spaces - max: 20 characters)"); ?><br>
	<?php echo translate("for example: gamesandhobbies"); ?><br>
	<input class=textbox type="text" name="topicname" size=20 maxlength=20 value="<?php echo "$topicname"; ?>"><br><br>
	<b><?php echo translate("Topic Text:"); ?></b> <?php echo translate("(the full topic text or description - max: 40 characters)"); ?><br>
	<?php echo translate("for example: Games and Hobbies"); ?><br>
	<input class=textbox type="text" name="topictext" size=40 maxlength=40 value="<?php echo "$topictext"; ?>"><br><br>
	<b><?php echo translate("Topic Image:"); ?></b> <?php echo translate("(image name + extension located in"); ?> <?php echo "$tipath"; ?>)<br>
	<?php echo translate("for example: games.gif"); ?><br>
	<input class=textbox type="text" name="topicimage" size=20 maxlength=20 value="<?php echo "$topicimage"; ?>"><br><br>
	<input type=hidden name=op value=topicmake>
	<INPUT type="submit" value="<?php echo translate("Add Topic!"); ?>">
	</form>
	</td></tr></table></td></tr></table>	
	<?php
	mysql_free_result($result);
	include("footer.php");
}

function topicedit($topicid) {
	global $tipath;
	include("header.php");
	GraphicAdmin($hlpfile);
	$result = mysql_query("select topicid, topicname, topicimage, topictext from topics where topicid=$topicid");
	list($topicid, $topicname, $topicimage, $topictext) = mysql_fetch_array($result);
	OpenTable4();
	?>
	<img src=<?php echo "$tipath$topicimage"; ?> border=0 align=right>
	<font size=4><b><?php echo translate("Edit Topic:"); ?> <?php echo "$topictext"; ?></b><font size=2>
	<br><br>
	<form action="admin.php" method="post"><br>
	<b><?php echo translate("Topic Name:"); ?></b> <?php echo translate("(just a name without spaces - max: 20 characters)"); ?><br>
	<?php echo translate("for example: gamesandhobbies"); ?><br>
	<input class=textbox type="text" name="topicname" size=20 maxlength=20 value="<?php echo "$topicname"; ?>"><br><br>
	<b><?php echo translate("Topic Text:"); ?></b> <?php echo translate("(the full topic text or description - max: 40 characters)"); ?><br>
	<?php echo translate("for example: Games and Hobbies"); ?><br>
	<input class=textbox type="text" name="topictext" size=40 maxlength=40 value="<?php echo "$topictext"; ?>"><br><br>
	<b><?php echo translate("Topic Image:"); ?></b> <?php echo translate("(image name + extension located in"); ?> <?php echo "$tipath"; ?>)<br>
	<?php echo translate("for example: games.gif"); ?><br>
	<input class=textbox type="text" name="topicimage" size=20 maxlength=20 value="<?php echo "$topicimage"; ?>"><br><br>

	<b><?php echo translate("Add Related Links:"); ?></b><br>
	<?php echo translate("Site Name: "); ?><input class=textbox type="text" name="name" size=30 maxlength=30><br>
	<?php echo translate("URL: "); ?><input class=textbox type="text" name="url" value="http://" size=50 maxlength=200><br><br>

	<b><?php echo translate("Active Related Links:"); ?></b><br>
	<?php
	$res=mysql_query("select rid, name, url from related where tid=$topicid");
	echo "<table width=100% border=0><tr><td>";
	while(list($rid, $name, $url) = mysql_fetch_row($res)) {
	    echo "<font size=1><li> <a href=$url>$name</a></td><td>";
	    echo "<font size=1><a href=$url>$url</a></td><td><font size=1>[ <a href=admin.php?op=relatededit&tid=$topicid&rid=$rid>".translate("Edit")."</a> | <a href=admin.php?op=relateddelete&tid=$topicid&rid=$rid>".translate("Delete")."</a> ]</td></tr><tr><td>";
	}
	echo "</td></tr></table>";
	?>
	<input type=hidden name=topicid value="<?php echo "$topicid"; ?>">
	<input type=hidden name=op value=topicchange>
	<table border=0><tr><td>
	<INPUT type="submit" value="<?php echo translate("Save Changes!"); ?>">
	</form></td><td>
	<form action="admin.php" method="post"><br>
	<input type=hidden name=topicid value="<?php echo "$topicid"; ?>">
	<input type=hidden name=op value=topicdelete>
	<INPUT type="submit" value="<?php echo translate("Delete Topic!"); ?>">
	</form></td></tr></table>
	</td></tr></table></td></tr></table>
	<?php
	include("footer.php");
}

function relatededit($tid, $rid) {
    include("header.php");
    GraphicAdmin($hlpfile);
    $result=mysql_query("select name, url from related where rid=$rid");
    list($name, $url) = mysql_fetch_row($result);
    $result2=mysql_query("select topictext, topicimage from topics where topicid=$tid");
    list($topictext, $topicimage) = mysql_fetch_row($result2);
    OpenTable4();    
    echo "
    <center><font size=4>
    <img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right>
    <b>".translate("Edit Related Link")."</b><br>
    <font size=2><b>".translate("Topic:")."</b> $topictext</center>
    <form action=admin.php method=post>
    <font size=2>
    ".translate("Site Name: ")."<input type=text class=textbox name=name value=\"$name\" size=30 maxlength=30><br><br>
    ".translate("URL: ")."<input type=text class=textbox name=url value=\"$url\" size=60 maxlength=200><br><br>
    <input type=hidden name=op value=relatedsave>
    <input type=hidden name=tid value=$tid>
    <input type=hidden name=rid value=$rid>
    <input type=submit value=".translate("Save Changes").">
    </form></td></tr></table></td></tr></table>";
    include("footer.php");
}

function relatedsave($tid, $rid, $name, $url) {
    mysql_query("update related set name='$name', url='$url' where rid=$rid");
    Header("Location: admin.php?op=topicedit&topicid=$tid");
}

function relateddelete($tid, $rid) {
    mysql_query("delete from related where rid='$rid'");
    Header("Location: admin.php?op=topicedit&topicid=$tid");
}

function topicmake($topicname, $topicimage, $topictext) {
	$topicname = stripslashes(FixQuotes($topicname));
	$topicimage = stripslashes(FixQuotes($topicimage));
	$topictext = stripslashes(FixQuotes($topictext));
	mysql_query("INSERT INTO topics VALUES (NULL,'$topicname','$topicimage','$topictext','0')");
	Header("Location: admin.php?op=topicsmanager#Add");
}

function topicchange($topicid, $topicname, $topicimage, $topictext, $name, $url) {
	$topicname = stripslashes(FixQuotes($topicname));
	$topicimage = stripslashes(FixQuotes($topicimage));
	$topictext = stripslashes(FixQuotes($topictext));
	$name = stripslashes(FixQuotes($name));
	$url = stripslashes(FixQuotes($url));
	mysql_query("update topics set topicname='$topicname', topicimage='$topicimage', topictext='$topictext' where topicid=$topicid");
	if (!$name) {
	} else {
	    mysql_query("insert into related VALUES (NULL, '$topicid','$name','$url')");
	}
	Header("Location: admin.php?op=topicedit&topicid=$topicid");
}

function topicdelete($topicid, $ok=0) {
	if ($ok==1) {
	    $result=mysql_query("select sid from stories where topic='$topicid'");
	    list($sid) = mysql_fetch_row($result);
	    mysql_query("delete from stories where topic='$topicid'");
	    mysql_query("delete from topics where topicid='$topicid'");
	    mysql_query("delete from related where tid='$topicid'");
	    $result=mysql_query("select sid from comments where sid='$sid'");
	    list($sid) = mysql_fetch_row($result);
	    mysql_query("delete from comments where sid='$sid'");
	    Header("Location: admin.php?op=topicsmanager");
	} else {
	    global $tipath, $topicimage;
	    include("header.php");
	    GraphicAdmin($hlpfile);
	    $result2=mysql_query("select topicimage, topictext from topics where topicid='$topicid'");
	    list($topicimage, $topictext) = mysql_fetch_row($result2);
	    OpenTable4();
	    echo "
	    <center><img src=$tipath$topicimage border=0><br>
	    <b>".translate("Delete Topic")." $topictext</b><br><br>
	    ".translate("Are you sure you want to delete Topic")." $topictext?<br>
	    ".translate("This will delete ALL it's stories and it's comments!")."<br><br>
	    [ <a href=\"admin.php?op=topicsmanager\">".translate("No")."</a> | <a href=\"admin.php?op=topicdelete&topicid=$topicid&ok=1\">".translate("Yes")."</a> ]</center><br><br>
	    </td></tr></table></td></tr></table>";
	    include("footer.php");
	}
}

switch ($op) {

		case "topicsmanager":
			topicsmanager();
			break;

		case "topicedit":
			topicedit($topicid);
			break;

		case "topicmake":
			topicmake($topicname, $topicimage, $topictext);
			break;

		case "topicdelete":
			topicdelete($topicid, $ok);
			break;

		case "topicchange":
			topicchange($topicid, $topicname, $topicimage, $topictext, $name, $url);
			break;

	case "relatedsave":
	    relatedsave($tid, $rid, $name, $url);
	    break;
		
	case "relatededit":
	    relatededit($tid, $rid);
	    break;
			
	case "relateddelete":
	    relateddelete($tid, $rid);
	    break;

}

} else {
    echo "Access Denied";
}

?>