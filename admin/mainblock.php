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
$hlpfile = "manual/mainblock.html";
$result = mysql_query("select radminsuper from authors where aid='$aid'");
list($radminsuper) = mysql_fetch_row($result);
if ($radminsuper==1) {

/*********************************************************/
/* MAIN Block Functions                                  */
/*********************************************************/

function mblock() {
	global $hlpfile, $admin;
	include("header.php");
	GraphicAdmin($hlpfile);
	$result = mysql_query("select title, content from mainblock");
	if (mysql_num_rows($result) > 0) {
		while(list($title, $content) = mysql_fetch_array($result)) {
			OpenTable4();
			?>
			<font size=4><center><b><?php echo "".translate("Edit Main Block").""; ?></center></b></font><br><br>
			<form action="admin.php" method="post">
			<?php echo translate("Title:"); ?>
			<input class=textbox type="text" name="title" size="30" maxlength="60" value="<?php echo $title; ?>"><br>
			<?php echo translate("Content:"); ?>
			<br><textarea class=textbox cols="50" rows="10" name="content"><?php echo $content; ?></textarea><br>
			<input type="hidden" name="op" value="changemblock">
			<input type="submit" VALUE="<?php echo translate("Go!"); ?>">
			</form></td></tr></table></td></tr></table>
			<br><br>
<?php
		}
	} ?>
	<?php
	include("footer.php");
}

function changemblock($title, $content) {
	$title = stripslashes(FixQuotes($title));
	$content = stripslashes(FixQuotes($content));
	mysql_query("update mainblock set title='$title', content='$content'");
	Header("Location: admin.php?op=adminMain");
}

switch ($op){

		case "mblock":
			mblock();
			break;

		case "changemblock":
			changemblock($title, $content);
			break;

}

} else {
    echo "Access Denied";
}
?>