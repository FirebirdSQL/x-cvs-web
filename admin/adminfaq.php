<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)            */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* ---                                                                  */
/* Based on PHP-Nuke Add-On                                             */
/* Copyright (c) 2001 by Richard Tirtadji AKA King Richard              */
/*                       (rtirtadji@hotmail.com)                        */
/*                       Hutdik Hermawan AKA hotFix                     */
/*                       (hutdik76@hotmail.com)                         */
/* http://www.nukeaddon.com                                             */
/* ---                                                                  */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/


if (!eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
$hlpfile = "manual/faqs.html";
$result = mysql_query("select radminfaq, radminsuper from authors where aid='$aid'");
list($radminfaq, $radminsuper) = mysql_fetch_row($result);
if (($radminfaq==1) OR ($radminsuper==1)) {

/*********************************************************/
/* Faq Admin Function                                    */
/*********************************************************/

function FaqAdmin() {
    global $hlpfile, $admin;
    include ("config.php");
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "
    <center><font size=4><b>".translate("Faq")."</b></font></center>
    <form action=admin.php method=post>
    <center><table border=1 width=100%><tr>
	<td bgcolor=0000BA><font color=white><center>".translate("ID")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Categories")."</td><td>&nbsp</td></tr>";

    $result = mysql_query("select id_cat, categories from faqCategories order by id_cat");
    while(list($id_cat, $categories) = mysql_fetch_row($result)) {
	echo "
	<td bgcolor=008888 align=center><font color=white>$id_cat</td>
	<td bgcolor=008888 align=center><font color=white>$categories</td>
	<td bgcolor=008888 align=center><font color=white><a href=admin.php?op=FaqCatGo&id_cat=$id_cat>Question & Answer</a> | <a href=admin.php?op=FaqCatEdit&id_cat=$id_cat>".translate("Edit")."</a> | <a href=admin.php?op=FaqCatDel&id_cat=$id_cat&ok=0>".translate("Delete")."</a></td><tr>";
    }
    echo "</form></td></tr></table>
    <br><br>
    </center><font size=4><b>".translate("Add Categories")."</b><br><br>
    <font size=2>
    <form action=admin.php method=post>
    <table border=0 width=100%><tr><td>
    ".translate("Categories:")." </td><td><input type=text name=categories size=31></td></tr><tr><td>
    </td></tr></table>
    <input type=hidden name=op value=FaqCatAdd>
    <input type=submit value=".translate("Add").">
    </form>
    </td></tr></table></td></tr></table>";
    include("footer.php");
}

function FaqCatGo($id_cat) {
    global $hlpfile, $admin;
    include ("config.php");
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "
    <center><font size=4><b>".translate("Question and Answer")."</b></font></center>
    <form action=admin.php method=post>
    <center><table border=1 width=100%><tr>
	<td bgcolor=0000BA><font color=white><center>".translate("Question")."</td><td>&nbsp</td></tr>";

    $result = mysql_query("select id, question, answer from faqAnswer where id_cat='$id_cat' order by id");
    while(list($id, $question, $answer) = mysql_fetch_row($result)) {
	echo "
	<tr><td bgcolor=008888 align=center><font color=white>$question</td><td rowspan=2><font color=white><a href=admin.php?op=FaqCatGoEdit&id=$id>".translate("Edit")."</a> | <a href=admin.php?op=FaqCatGoDel&id=$id&ok=0>".translate("Delete")."</a></td></tr>
	<tr><td bgcolor=008888><font color=white><p>$answer</p></td></tr>";
    }
    echo "</form></td></tr></table>
    <br><br>
    </center><font size=4><b>".translate("Add Question")."</b><br><br>
    <font size=2>
    <form action=admin.php method=post>
    <table border=0 width=100%><tr><td>
    ".translate("Question:")." </td><td><input type=text name=question size=31></td></tr><tr><td>
    ".translate("Answer:")." </td><td><textarea name=answer cols=60 rows=5></textarea></td></tr><tr><td>
    </td></tr></table>
    <input type=hidden name=id_cat value=\"$id_cat\">
    <input type=hidden name=op value=FaqCatGoAdd>
    <input type=submit value=".translate("Add").">
    </form>
    </td></tr></table></td></tr></table>";
    include("footer.php");
}

function FaqCatEdit($id_cat) {
    global $hlpfile, $admin;
    include ("config.php");
    include ("header.php");
    GraphicAdmin($hlpfile);
    $result = mysql_query("select categories from faqCategories where id_cat='$id_cat'");
    list($categories) = mysql_fetch_row($result);
    OpenTable4();
    echo "
    <center><font size=4><b>".translate("Edit Categories")."</b></font></center>
    <form action=admin.php method=post>
    <input type=hidden name=id_cat value=$id_cat>
    <table border=0 width=100%><tr><td>
    ".translate("Categories:")." </td><td><input type=text name=categories size=31 value=\"$categories\"></td></tr><tr><td>
    </td></tr></table>
    <input type=hidden name=op value=FaqCatSave>
    <input type=submit value=".translate("Save Changes").">
    </form>
    </td></tr></table></td></tr></table>";
    include("footer.php");
}

function FaqCatGoEdit($id) {
    global $hlpfile, $admin;
    include ("config.php");
    include ("header.php");
    GraphicAdmin($hlpfile);
    $result = mysql_query("select question, answer from faqAnswer where id='$id'");
    list($question, $answer) = mysql_fetch_row($result);
    OpenTable4();
    echo "
    <center><font size=4><b>".translate("Edit Question and Answer")."</b></font></center>
    <form action=admin.php method=post>
    <input type=hidden name=id value=$id>
    <table border=0 width=100%><tr><td>
    ".translate("Question:")." </td><td><input type=text name=question size=31 value=\"$question\"></td></tr><tr><td>
    ".translate("Answer:")." </td><td><textarea name=answer cols=60 rows=5>$answer</textarea></td></tr><tr><td>    
    </td></tr></table>
    <input type=hidden name=op value=FaqCatGoSave>
    <input type=submit value=".translate("Save Changes").">
    </form>
    </td></tr></table></td></tr></table>";
    include("footer.php");
}


function FaqCatSave($id_cat, $categories) {
    $categories = stripslashes(FixQuotes($categories));
    mysql_query("update faqCategories set categories='$categories' where id_cat='$id_cat'");
    Header("Location: admin.php?op=FaqAdmin");
}

function FaqCatGoSave($id, $question, $answer) {
    $question = stripslashes(FixQuotes($question));
    $answer = stripslashes(FixQuotes($answer));	
    mysql_query("update faqAnswer set question='$question', answer='$answer' where id='$id'");
    Header("Location: admin.php?op=FaqAdmin");
}

function FaqCatAdd($categories) {
    $categories = stripslashes(FixQuotes($categories));
    mysql_query("insert into faqCategories values (NULL, '$categories')");
    Header("Location: admin.php?op=FaqAdmin");
}

function FaqCatGoAdd($id_cat, $question, $answer) {
    $question = stripslashes(FixQuotes($question));
    $answer = stripslashes(FixQuotes($answer));	
    mysql_query("insert into faqAnswer values (NULL, '$id_cat', '$question', '$answer')");
    Header("Location: admin.php?op=FaqCatGo&id_cat=$id_cat");
}

function FaqCatDel($id_cat, $ok=0) {
    if($ok==1) {
	mysql_query("delete from faqCategories where id_cat=$id_cat");
	mysql_query("delete from faqAnswer where id_cat=$id_cat");
	Header("Location: admin.php?op=FaqAdmin");
    } else {
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("WARNING: Are you sure you want to delete this Faq and all its question?")."</b><br><br><font color=Black>";
    }
	echo "[ <a href=admin.php?op=FaqCatDel&id_cat=$id_cat&ok=1>".translate("Yes")."</a> | <a href=admin.php?op=FaqAdmin>".translate("No")."</a> ]<br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");	
}

function FaqCatGoDel($id, $ok=0) {
    if($ok==1) {
	mysql_query("delete from faqAnswer where id=$id");
	Header("Location: admin.php?op=FaqAdmin");
    } else {
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("WARNING: Are you sure you want to delete this Question?")."</b><br><br><font color=Black>";
    }
	echo "[ <a href=admin.php?op=FaqCatGoDel&id=$id&ok=1>".translate("Yes")."</a> | <a href=admin.php?op=FaqAdmin>".translate("No")."</a> ]<br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");	
}

} else {
    echo "Access Denied";
}

?>