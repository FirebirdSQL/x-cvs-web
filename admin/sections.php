<?PHP

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)            */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* =========================                                            */
/* Part of phpBB integration                                            */
/* Copyright (c) 2001 by                                                */
/*    Richard Tirtadji AKA King Richard (rtirtadji@hotmail.com)         */
/*    Hutdik Hermawan AKA hotFix (hutdik76@hotmail.com)                 */
/* http://www.phpnuke.web.id                                            */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
$hlpfile = "manual/sections.html";
$result = mysql_query("select radminsection, radminsuper from authors where aid='$aid'");
list($radminsection, $radminsuper) = mysql_fetch_row($result);
if (($radminsection==1) OR ($radminsuper==1)) {

/*********************************************************/
/* Sections Manager Functions                            */
/*********************************************************/

function sections() {
    global $hlpfile, $admin, $admart;
	include("header.php");
	GraphicAdmin($hlpfile);
	$result = mysql_query("select secid, secname from sections order by secid");
	if (mysql_num_rows($result)==0) {
	}

if (mysql_num_rows($result) > 0) {
	OpenTable4();
	echo "
	<b><center>".translate("Current Active Sections")."</b><br>".translate("Click to Edit")."</center><br>
	<center><table border=0 width=100% align=center cellpadding=1><tr><td align=center>
	";
		while(list($secid, $secname) = mysql_fetch_array($result)) {
		?>
		<li><?php echo "<a href=admin.php?op=sectionedit&secid=$secid>"; ?><?php echo "$secname"; ?></a>
		<?php
		}
		echo "</td></tr></table>";
	?>
	</td></tr></table></td></tr></table>
	<br>
	<?php OpenTable4(); ?>
	<font size=4><b><?php echo translate("Add Article in Sections"); ?></b><font size=2>
	<br><br>
	<form action="admin.php" method="post"><br>
	<b><?php echo translate("Title:"); ?></b><br>
	<input class=textbox type="text" name="title" size=60 value=""><br><br>
	<?php
	$result = mysql_query("select secid, secname from sections order by secid");
	while(list($secid, $secname) = mysql_fetch_array($result)) {
	echo "<input type=radio name=secid value=$secid>$secname<br>";
	} ?>
	<br>
	<b><?php echo translate("Content:"); ?></b><br>
	<textarea class=textbox name="content" cols=60 rows=10></textarea><br><br>
	<input type=hidden name=op value=secarticleadd>
	<INPUT type="submit" value="<?php echo translate("Add Article!"); ?>">
	</form>
	</td></tr></table></td></tr></table>
	<br>
	<?php OpenTable4(); ?>
	<font size=4><b><?php echo translate("Last"); echo " $admart "; echo translate("Articles"); ?></b><font size=2>
	<br><br>
	<ul>
	<?php
	$result = mysql_query("select artid, secid, title, content from seccont order by artid desc limit 0,$admart");
	while(list($artid, $secid, $title, $content) = mysql_fetch_array($result)) {
	    $result2 = mysql_query("select secid, secname from sections where secid='$secid'");
	    list($secid, $secname) = mysql_fetch_row($result2);
	    echo "<li>$title ($secname) [ <a href=admin.php?op=secartedit&artid=$artid>".translate("Edit")."</a> ]";
	} ?>
	</ul>
	<form action="admin.php" method="post">
	<?php echo translate("Edit Article ID:"); ?> <input class=textbox type="text" NAME="artid" SIZE=10>
	<input type=hidden name=op value="secartedit">
	<input type="submit" value="<?php echo translate("Go!");?>">
	<?php mysql_free_result($result); ?>
	</form></td></tr></table></td></tr></table>
	</ul>
<?php } 
	OpenTable4(); ?>
	<font size=4><b><?php echo translate("Add a New Section"); ?></b><font size=2>
	<br><br>
	<form action="admin.php" method="post"><br>
	<b><?php echo translate("Section Name:"); ?></b><br>
	<input class=textbox type="text" name="secname" size=40 maxlength=40><br><br>
	<b><?php echo translate("Section Image:"); ?> </b>&nbsp; <?php echo translate("(example: opinion.gif)"); ?><br>
	<input class=textbox type="text" name="image" size=40 maxlength=50><br><br>
	<input type=hidden name=op value=sectionmake>
	<INPUT type="submit" value="<?php echo translate("Add Section!"); ?>">
	</form>
	</td></tr></table></td></tr></table></td></tr></table>
	<?php
	include("footer.php");
}

function secarticleadd($secid, $title, $content) {
	$title = stripslashes(FixQuotes($title));
	$content = stripslashes(FixQuotes($content));
	mysql_query("INSERT INTO seccont VALUES (NULL,'$secid','$title','$content','0')");
	Header("Location: admin.php?op=sections");
}

function secartedit($artid) {
	include("header.php");
	GraphicAdmin($hlpfile);
	$result = mysql_query("select artid, secid, title, content from seccont where artid='$artid'");
	list($artid, $secid, $title, $content) = mysql_fetch_array($result);
	OpenTable4();
	?>
	<font size=4><b><?php echo translate("Edit Article"); ?></b><font size=2>
	<br><br>
	<form action="admin.php" method="post"><br>
	<b><?php echo translate("Title:"); ?></b><br>
	<input class=textbox type="text" name="title" size=60 value="<?php echo "$title"; ?>"><br><br>
	<?php
	$result2 = mysql_query("select secid, secname from sections order by secname");
	while(list($secid2, $secname) = mysql_fetch_array($result2)) {
	    if ($secid2==$secid) { $che = "checked"; }
	    echo "<input type=radio name=secid value=$secid2 $che>$secname<br>";
	    $che = "";
	} ?>
	<br>
	<b><?php echo translate("Content"); ?></b><br>
	<textarea class=textbox name=content cols=60 rows=10><?php echo "$content"; ?></textarea>
	<input type=hidden name=artid value="<?php echo "$artid"; ?>">
	<input type=hidden name=op value=secartchange>
	<table border=0><tr><td>
	<INPUT type="submit" value="<?php echo translate("Save Changes!"); ?>">
	</form></td><td>
	<form action="admin.php" method="post"><br>
	<input type=hidden name=artid value="<?php echo "$artid"; ?>">
	<input type=hidden name=op value=secartdelete>
	<INPUT type="submit" value="<?php echo translate("Delete Article!"); ?>">
	</form></td></tr></table>
	</td></tr></table></td></tr></table>	
	<?php
	include("footer.php");
}

function sectionmake($secname, $image) {
	$secname = stripslashes(FixQuotes($secname));
	$image = stripslashes(FixQuotes($image));
	mysql_query("INSERT INTO sections VALUES (NULL,'$secname', '$image')");
	Header("Location: admin.php?op=sections");
}

function sectionedit($secid) {
	include("header.php");
	GraphicAdmin($hlpfile);
	$result = mysql_query("select secid, secname, image from sections where secid=$secid");
	list($secid, $secname, $image) = mysql_fetch_array($result);
	
	$result2 = mysql_query("select artid from seccont where secid=$secid");
	$number = mysql_num_rows($result2);
	OpenTable4();
	?>
	<?php echo "<img src=images/sections/$image border=0><br><br>"; ?>
	<font size=4><b><?php echo translate("Edit Section:"); ?> <?php echo "$secname"; ?></b><font size=2>
	<br>
	(This Section has <?php echo "$number"; ?> Articles attached)
	<br><br>
	<form action="admin.php" method="post"><br>
	<b><?php echo translate("Section Name:"); ?></b> <?php echo translate("(40 characters Max.)"); ?><br>
	<input class=textbox type="text" name="secname" size=40 maxlength=40 value="<?php echo "$secname"; ?>"><br><br>
	<b><?php echo translate("Section Image:"); ?></b> <?php echo translate("(example: opinion.gif)"); ?><br>
	<input class=textbox type="text" name="image" size=40 maxlength=50 value="<?php echo "$image"; ?>"><br><br>
	<input type=hidden name=secid value="<?php echo "$secid"; ?>">
	<input type=hidden name=op value=sectionchange>
	<table border=0><tr><td>
	<INPUT type="submit" value="<?php echo translate("Save Changes!"); ?>">
	</form></td><td>
	<form action="admin.php" method="post"><br>
	<input type=hidden name=secid value="<?php echo "$secid"; ?>">
	<input type=hidden name=op value=sectiondelete>
	<INPUT type="submit" value="Delete Section!">
	</form></td></tr></table>
	
	</td></tr></table></td></tr></table>
	<?php
	include("footer.php");
}

function sectionchange($secid, $secname, $image) {
	$secname = stripslashes(FixQuotes($secname));
	$image = stripslashes(FixQuotes($image));
	mysql_query("update sections set secname='$secname', image='$image' where secid=$secid");
	Header("Location: admin.php?op=sections");
}

function secartchange($artid, $secid, $title, $content) {
	$title = stripslashes(FixQuotes($title));
	$content = stripslashes(FixQuotes($content));
	mysql_query("update seccont set secid='$secid', title='$title', content='$content' where artid=$artid");
	Header("Location: admin.php?op=sections");
}

function sectiondelete($secid, $ok=0) {
	if ($ok==1) {
	    mysql_query("delete from seccont where secid='$secid'");
	    mysql_query("delete from sections where secid='$secid'");
	    Header("Location: admin.php?op=sections");
	} else {
	    include("header.php");
	    GraphicAdmin($hlpfile);
	    $result=mysql_query("select secname from sections where secid=$secid");
	    list($secname) = mysql_fetch_row($result);
	    OpenTable4();
	    echo "
	    <center><b>".translate("Delete Section: ")."$secname</b><br><br>
	    ".translate("Are you sure you want to delete section")." $secname?<br>
	    ".translate("This will delete ALL its articles!")."<br><br>
	    [ <a href=\"admin.php?op=sections\">".translate("No")."</a> | <a href=\"admin.php?op=sectiondelete&secid=$secid&ok=1\">".translate("Yes")."</a> ]</center><br><br></center>
	    </td></tr></table></center></td></tr></table>";
	    include("footer.php");
	}
}

function secartdelete($artid, $ok=0) {
	if ($ok==1) {
	    mysql_query("delete from seccont where artid='$artid'");
	    Header("Location: admin.php?op=sections");
	} else {
	    include("header.php");
	    GraphicAdmin($hlpfile);
	    $result = mysql_query("select title from seccont where artid=$artid");
	    list($title) = mysql_fetch_row($result);
	    OpenTable4();
	    echo "
	    <center><b>".translate("Delete Article: ")."$title</b><br><br>
	    ".translate("Are you sure you want to delete this article?")."<br><br>
	    [ <a href=\"admin.php?op=sections\">".translate("No")."</a> | <a href=\"admin.php?op=secartdelete&artid=$artid&ok=1\">".translate("Yes")."</a> ]</center><br><br></center>
	    </td></tr></table></center></td></tr></table>";
	    include("footer.php");
	}
}

switch ($op) {

		case "sections":
			sections();
			break;

		case "sectionedit":
			sectionedit($secid);
			break;

		case "sectionmake":
			sectionmake($secname, $image);
			break;

		case "sectiondelete":
			sectiondelete($secid, $ok);
			break;

		case "sectionchange":
			sectionchange($secid, $secname, $image);
			break;

		case "secarticleadd":
			secarticleadd($secid, $title, $content);
			break;
		
		case "secartedit":
			secartedit($artid);
			break;
			
		case "secartchange":
			secartchange($artid, $secid, $title, $content);
			break;
		
		case "secartdelete":
			secartdelete($artid, $ok);
			break;

}

} else {
    echo "Access Denied";
}
?>