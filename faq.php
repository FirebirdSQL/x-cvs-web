<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)            */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* ======================                                               */
/* Based on Automated FAQ                                               */
/* Copyright (c) 2001 by                                                */
/*    Richard Tirtadji AKA King Richard (rtirtadji@hotmail.com)         */
/*    Hutdik Hermawan AKA hotFix (hutdik76@hotmail.com)                 */
/* http://www.phpnuke.web.id                                            */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!isset($mainfile)) { include("mainfile.php"); }

function ShowFaq($id_cat, $categories) {
    global $bgcolor2, $sitename;
    OpenTable();
    echo"
    <center><font size=2><b>$sitename FAQ (Frequently Asked Questions)</b></font></center><br><br>
    <a name=top><br><b>
    Category: <a href=\"faq.php\">Main</a> -> $categories
    </b><br><br>
    <table width=100% cellpadding=4 cellspacing=0 border=0>
    <tr bgcolor=$bgcolor2><td colspan=2><font color=white><b>Question</b></font></td></tr><tr><td colspan=2>";
    $result = mysql_query("select id, id_cat, question, answer from faqAnswer where id_cat='$id_cat'");
    while(list($id, $id_cat, $question, $answer) = mysql_fetch_row($result)) {
	echo"<li><a href=\"#$id\">$question</a>";
    }
    echo "</td></tr></table>
    <br>";
}

function ShowFaqAll($id_cat) {
    global $bgcolor2;
    echo"
    <table width=100% cellpadding=4 cellspacing=0 border=0>
    <tr bgcolor=$bgcolor2><td colspan=2><font color=white><b>Answer</b></font></td></tr>";
    $result = mysql_query("select id, id_cat, question, answer from faqAnswer where id_cat='$id_cat'");
    while(list($id, $id_cat, $question, $answer) = mysql_fetch_row($result)) {
	echo"<tr><td><a name=\"$id\"><li><b>$question</b>
	<p align=justify>$answer</p>
	<a href=\"#top\">Back to Top</a>
	<br><br>
	</td></tr>";
    }
    echo"</table><br><br>
    <div align=center><b>[ <a href=\"faq.php\">Back to FAQ Index</a> ]</b></div>
    ";
}


if (!$myfaq) {
    include ("header.php");
    OpenTable3();
    echo"
    <center><font size=4>FAQ (Frequently Asked Question)</font></center><br><br>
    <table width=100% cellpadding=4 cellspacing=0 border=0>
    <tr bgcolor=$bgcolor2><td colspan=2><font color=white><b>Categories</b></font></td></tr><tr><td>
    ";
    $result = mysql_query("select id_cat, categories from faqCategories");
    while(list($id_cat, $categories) = mysql_fetch_row($result)) {
	$catname = urlencode($categories);
	echo"<li><b><a href=\"faq.php?myfaq=yes&id_cat=$id_cat&categories=$catname\">$categories</a></b>";
    }
    CloseTable();
    echo"</td></tr></table>";
    include ("footer.php");
} else {
    include("header.php");
    ShowFaq($id_cat, $categories);
    ShowFaqAll($id_cat);
    CloseTable();
    include("footer.php");
}

?>