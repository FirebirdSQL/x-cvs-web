<?php

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
$hlpfile = "manual/forumrank.html";
$result = mysql_query("select radminforum, radminsuper from authors where aid='$aid'");
list($radminforum, $radminsuper) = mysql_fetch_row($result);
if (($radminforum==1) OR ($radminsuper==1)) {

/*********************************************************/
/* PHPBB Forum Admin Function                            */
/*********************************************************/

function RankForumAdmin() {
    global $hlpfile, $admin, $bgcolor4;
    include ("config.php");
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "
    <center><font size=4><b>".translate("Forum Ranking System")."</b></font></center>
    <form action=admin.php method=post>
    <center><table border=1 width=100%><tr>
	<td bgcolor=$bgcolor4><center>".translate("Title")."</td>
	<td bgcolor=$bgcolor4><center>".translate("Min. Posts")."</td>
	<td bgcolor=$bgcolor4><center>".translate("Max. Posts")."</td>
	<td bgcolor=$bgcolor4><center>".translate("Special Ranks")."</td><td>&nbsp</td></tr>";

    $result = mysql_query("select rank_id, rank_title, rank_min, rank_max, rank_special from ranks order by rank_id");
    while(list($rank_id, $rank_title, $rank_min, $rank_max, $rank_special) = mysql_fetch_row($result)) {
    	echo "
	<td align=center>$rank_title</td>
	<td align=center>$rank_min</td>
	<td align=center>$rank_max</td>";
	if ($rank_special ==1) {
	echo"
	<td align=center>on</td>";}
	else {
	echo"
	<td align=center>off</td>";}
	echo"
	<td align=center><a href=admin.php?op=RankForumEdit&rank_id=$rank_id>".translate("Edit")."</a> | <a href=admin.php?op=RankForumDel&rank_id=$rank_id&ok=0>".translate("Delete")."</a></td><tr>";
    }
    echo "</form></td></tr></table>
    <br><br>
    </center><font size=4><b>".translate("Add New Ranks")."</b><br><br>
    <font size=2>
    <form action=admin.php method=post>
    <table border=0 width=100%><tr><td>
    ".translate("Rank Title:")." </td><td><input type=text name=rank_title size=31></td></tr><tr><td>
    ".translate("Min. Ranks:")." </td><td><input type=text name=rank_min size=3 maxsize=3></td></tr><tr><td>
    ".translate("Max. Ranks:")." </td><td><input type=text name=rank_max size=3 maxsize=3></td></tr><tr><td>
    ".translate("Special:")." </td><td><input type=checkbox name=rank_special value=1></td></tr><tr><td>
    </td></tr></table>
    <input type=hidden name=op value=RankForumAdd>
    <input type=submit value=".translate("Add").">
    </form>
    </td></tr></table></td></tr></table>";
    include("footer.php");
}

function RankForumAdd($rank_title,$rank_min,$rank_max,$rank_special) {
    if ($rank_special == 1) {
    mysql_query("insert into ranks values (NULL, '$rank_title', '-1' ,'-1' ,'$rank_special')");
    } else {
    mysql_query("insert into ranks values (NULL, '$rank_title', '$rank_min' ,'$rank_max' ,'0')");
    }
    Header("Location: admin.php?op=RankForumAdmin");
}

function RankForumEdit($rank_id) {
    global $hlpfile, $admin;
    include ("config.php");
    $hlpfile = "manual/$language/rankphpbb.html";
    include ("header.php");
    GraphicAdmin($hlpfile);
    $result = mysql_query("select rank_title, rank_min, rank_max, rank_special from ranks where rank_id='$rank_id'");
    list($rank_title, $rank_min, $rank_max, $rank_special) = mysql_fetch_row($result);
    OpenTable4();
    echo "
    <center><font size=4><b>".translate("Edit Ranks")."</b></font></center>
    <form action=admin.php method=post>
    <input type=hidden name=rank_id value=$rank_id>
    <table border=0 width=100%><tr><td>
    ".translate("Rank Title:")." </td><td><input type=text name=rank_title size=31 value=\"$rank_title\"></td></tr>";
    if ($rank_special == 1) {
    echo "<tr><td>".translate("Special:")." </td><td>active</td></tr>
    <input type=hidden name=rank_min value=\"$rank_min\">
    <input type=hidden name=rank_max value=\"$rank_max\">
    <input type=hidden name=rank_special value=$rank_special>";
    } else {
    echo "<tr><td>".translate("Min. Ranks:")." </td><td><input type=text name=rank_min size=3 value=\"$rank_min\"></td></tr>
    <tr><td>".translate("Max. Ranks:")." </td><td><input type=text name=rank_max size=3 value=\"$rank_max\"></td></tr>
    <tr><td>".translate("Special:")." </td><td><input type=checkbox name=rank_special value=1></td></tr>";
    }
    echo"
    <tr><td></td></tr></table>
    <input type=hidden name=op value=RankForumSave>
    <input type=submit value=".translate("Save Changes").">
    </form>
    </td></tr></table></td></tr></table>";
    include("footer.php");
}

function RankForumSave($rank_id, $rank_title, $rank_min, $rank_max, $rank_special) {
    mysql_query("update ranks set rank_title='$rank_title',rank_min='$rank_min',rank_max='$rank_max',rank_special='$rank_special' where rank_id='$rank_id'");
    Header("Location: admin.php?op=RankForumAdmin");
}

function RankForumDel($rank_id, $ok=0) {
    if($ok==1) {
	mysql_query("delete from ranks where rank_id=$rank_id");
	Header("Location: admin.php?op=ForumAdmin");
    } else {
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("WARNING: Are you sure you want to delete this Ranking?")."</b><br><br><font color=Black>";
    }
	echo "[ <a href=admin.php?op=RankForumDel&rank_id=$rank_id&ok=1>".translate("Yes")."</a> | <a href=admin.php?op=RankForumAdmin>".translate("No")."</a> ]<br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");	
}

} else {
    echo "Access Denied";
}

?>