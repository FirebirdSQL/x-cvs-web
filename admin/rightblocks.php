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
$hlpfile = "manual/rightblocks.html";
$result = mysql_query("select radminright, radminsuper from authors where aid='$aid'");
list($radminright, $radminsuper) = mysql_fetch_row($result);
if (($radminright==1) OR ($radminsuper==1)) {

/*********************************************************/
/* RIGHT Blocks Functions                                */
/*********************************************************/

function rblocks() {
	global $hlpfile, $admin;
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "
	<font size=4><b><center>".translate("Edit Right Blocks")."</b></center></font><br><br>
	";
	$result = mysql_query("select id, title, content from rblocks");
	if (mysql_num_rows($result) > 0) {
		while(list($id, $title, $content) = mysql_fetch_array($result)) {
?>
			<?php echo ""; ?>
			<form action="admin.php" method="post">
			<?php echo translate("Title:"); ?>
			<input class=textbox type="text" name="title" size="30" maxlength="60" value="<?php echo $title; ?>"><br>
			<?php echo translate("Content:"); ?>
			<br><textarea class=textbox cols="50" rows="6" name="content"><?php echo $content; ?></textarea><br>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<select name="op">
			<option VALUE="changerblock" SELECTED><?php echo translate("changerblock"); ?></option>
			<option VALUE="deleterblock"><?php echo translate("deleterblock"); ?></option>
			</select>
			<input type="submit" VALUE="<?php echo translate("Go!"); ?>">
			</form>
			<br><br>
<?php
		}
	}
	echo "<hr noshade> 
	<font size=4><b><center>".translate("Create New Right Block")."</b></center></font><br><br>";
	?>
	<form action="admin.php" method="post">
	<?php echo translate("Title:"); ?>
	<input class=textbox type="text" name="title" size=30 maxlength=60><br>
	<?php echo translate("Content:"); ?><br>
	<textarea class=textbox wrap=virtual cols=50 rows=6 name=content></textarea><br>
	<input type="hidden" NAME="op" VALUE="makerblock">
	<input type="submit" VALUE="<?php echo translate("makerblock") ?>">
	</form></td></tr></table></td></tr></table>
	<?php
	include("footer.php");
}

function makerblock($title, $content) {
	$title = stripslashes(FixQuotes($title));
	$content = stripslashes(FixQuotes($content));
	mysql_query("INSERT INTO rblocks VALUES (NULL,'$title','$content')");
	Header("Location: admin.php?op=rblocks");
}

function changerblock($id, $title, $content) {
	$title = stripslashes(FixQuotes($title));
	$content = stripslashes(FixQuotes($content));
	mysql_query("update rblocks set title='$title', content='$content' where id=$id");
	Header("Location: admin.php?op=rblocks");
}

function deleterblock($id) {
	mysql_query("delete from rblocks where id='$id'");
	Header("Location: admin.php?op=rblocks");
}


switch($op) {

		case "rblocks":
			rblocks();
			break;

		case "makerblock":
			makerblock($title, $content);
			break;

		case "deleterblock":
			deleterblock($id);
			break;

		case "changerblock":
			changerblock($id, $title, $content);
			break;

}

} else {
    echo "Access Denied";
}
?>