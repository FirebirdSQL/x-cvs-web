<?php

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

if(!isset($mainfile)) { include("mainfile.php"); }
include("header.php");

echo "<font size=3>
	<center>";
	OpenTable3();
	echo "<font size=4>
	<br><center><b>".translate("Welcome to the TOP page for")." $sitename!</b><br><br>";

// Top 10 read stories

$result = mysql_query("select sid, title, time, counter from stories order by counter DESC limit 0,$top");

echo "<table border=0 cellpadding=10 width=100%><tr><td align=left><font size=4>
      <b>$top ".translate("most read stories")."</b><br><br><font size=3>";
$lugar=1;
while(list($sid, $title, $time, $counter) = mysql_fetch_row($result)) {
    if($counter>0) {
	echo "<li>$lugar: <a href=article.php?sid=$sid>$title</a> - (".translate("read:")." $counter ".translate("times").")<br>";
	$lugar++;
    }
}
mysql_free_result($result);
echo "</td></tr></table><br>";

// Top 10 commented stories

$result = mysql_query("select sid, title, comments from stories order by comments DESC limit 0,$top");

echo "<table border=0 cellpadding=10 width=100%><tr><td align=left><font size=4>
      <b>$top ".translate("most commented stories")."</b><br><br><font size=3>";
$lugar=1;
while(list($sid, $title, $comments) = mysql_fetch_row($result)) {
    if($comments>0) {
	echo "<li>$lugar: <a href=article.php?sid=$sid>$title</a> - (".translate("comments:")." $comments)<br>";
	$lugar++;
    }
}
mysql_free_result($result);
echo "</td></tr></table><br>";

// Top 10 categories

$result = mysql_query("select catid, title, counter from stories_cat order by counter DESC limit 0,$top");

echo "<table border=0 cellpadding=10 width=100%><tr><td align=left><font size=4>
      <b>$top ".translate("most active categories")."</b><br><br><font size=3>";
$lugar=1;
while(list($catid, $title, $counter) = mysql_fetch_row($result)) {
    if($counter>0) {
	echo "<li>$lugar: <a href=categories.php?op=newindex&catid=$catid>$title</a> - ($counter ".translate("hits").")<br>";
	$lugar++;
    }
}
mysql_free_result($result);
echo "</td></tr></table><br>";


// Top 10 articles in special sections

$result = mysql_query("select artid, secid, title, content, counter from seccont order by counter DESC limit 0,$top");

echo "<table border=0 cellpadding=10 width=100%><tr><td align=left><font size=4>
      <b>$top ".translate("most read articles in special sections")."</b><br><br><font size=3>";
$lugar=1;
while(list($artid, $secid, $title, $content, $counter) = mysql_fetch_row($result)) {
    echo "<li>$lugar: <a href=sections.php?op=viewarticle&artid=$artid>$title</a> - (".translate("read:")." $counter ".translate("times").")<br>";
    $lugar++;
}
mysql_free_result($result);
echo "</td></tr></table><br>";

// Top 10 users submitters

$result = mysql_query("select uname, counter from users order by counter DESC limit 0,$top");

echo "<table border=0 cellpadding=10 width=100%><tr><td align=left><font size=4>
      <b>$top ".translate("most active news submitters")."</b><br><br><font size=3>";
$lugar=1;
while(list($uname, $counter) = mysql_fetch_row($result)) {
    if($counter>0) {
	echo "<li>$lugar: <a href=user.php?op=userinfo&uname=$uname>$uname</a> - (".translate("sent news:")." $counter)<br>";
	$lugar++;
    }
}
mysql_free_result($result);
echo "</td></tr></table><br>";

// Top 10 Polls

$result = mysql_query("select pollID, pollTitle, voters from poll_desc order by voters DESC limit 0,$top");

echo "<table border=0 cellpadding=10 width=100%><tr><td align=left><font size=4>
      <b>$top ".translate("most voted polls")."</b><br><br><font size=3>";
$lugar=1;
while(list($pollID, $pollTitle, $voters) = mysql_fetch_row($result)) {
    if($voters>0) {
	echo "<li>$lugar: <a href=pollBooth.php?op=results&pollID=$pollID>$pollTitle</a> - (".translate("votes:")." $voters)<br>";
	$lugar++;
    }
}
mysql_free_result($result);
echo "</td></tr></table><br>";

// Top 10 authors

$result = mysql_query("select aid, counter from authors order by counter DESC limit 0,$top");

echo "<table border=0 cellpadding=10 width=100%><tr><td align=left><font size=4>
      <b>$top ".translate("most active authors")."</b><br><br><font size=3>";
$lugar=1;
while(list($aid, $counter) = mysql_fetch_row($result)) {
    if($counter>0) {
	echo "<li>$lugar: <a href=search.php?query=&author=$aid>$aid</a> - (".translate("news published:")." $counter)<br>";
	$lugar++;
    }
}
mysql_free_result($result);
echo "</td></tr></table><br>";


// Top 10 reviews

$result = mysql_query("select id, title, hits from reviews order by hits DESC limit 0,$top");

echo "<table border=0 cellpadding=10 width=100%><tr><td align=left><font size=4>
      <b>$top ".translate("most read reviews")."</b><br><br><font size=3>";
$lugar=1;
while(list($id, $title, $hits) = mysql_fetch_row($result)) {
    if($hits>0) {
	echo "<li>$lugar: <a href=reviews.php?op=showcontent&id=$id>$title</a> - (".translate("read:")." $hits ".translate("times").")<br>";
	$lugar++;
    }
}
mysql_free_result($result);
echo "</td></tr></table><br>";

// Top 10 downloads

$result = mysql_query("select did, dcounter, dfilename, dcategory from downloads order by dcounter DESC limit 0,$top");

echo "<table border=0 cellpadding=10 width=100%><tr><td align=left><font size=4>
      <b>$top ".translate("most downloaded files")."</b></font><br><br><font size=3>";
$lugar=1;
while(list($did, $dcounter, $dfilename, $dcategory) = mysql_fetch_row($result)) {
    if($dcounter>0) {
	echo "<li>$lugar: <a href=\"download.php?op=geninfo&did=$did\">$dfilename</a> (Category: $dcategory) - ($dcounter downloads)<br>";
	$lugar++;
    }
}
mysql_free_result($result);
echo "</td></tr></table><br>
    <br><br></center>";
CloseTable();
include("footer.php");

?>
