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

##################################################
# Include some common header for HTML generation #
##################################################

$header = 1;

function head() {
    global $index;
    if (!isset($index)) {
	include("config.php");
    } else {
	global $slogan, $site_font, $sitename, $banners, $Default_Theme, $uimages;
    }
    global $artpage, $topic, $hlpfile, $user, $hr, $theme, $cookie, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, $textcolor2, $forumpage;
    echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
    echo "<html>\n<head>\n";
    echo "<title>$sitename</title>\n";
    echo "<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html; charset=\">\n";
    echo "<META NAME=\"AUTHOR\" CONTENT=\"$sitename\">\n";
    echo "<META NAME=\"COPYRIGHT\" CONTENT=\"Copyright (c) 2001 by $sitename\">\n";
    echo "<META NAME=\"KEYWORDS\" CONTENT=\"IBPhoenix, ibphoenix, Borland, borland, News, news, New, New, Technology, technology, Headlines, headlines, Linux, linux, Windows, windows, Software, software, Download, download, Downloads, downloads, Free, FREE, free, Community, community, Forum, forum, Forums, forums, Bulletin, bulletin, Board, board, Boards, boards, PHP, php, Survey, survey, Open, open, Open Source, OpenSource, Opensource, opensource, open source, Free Software, FreeSoftware, Freesoftware, free software, GNU, gnu, GPL, gpl, License, license, Unix, UNIX, *nix, unix, Firebird, firebird, InterBase, interbase, Interbase, SQL, sql, Database, DataBase, database, Mandrake, mandrake, Red Hat, RedHat, red hat, Slackware, slackware, SUSE, SuSE, suse, Debian, debian, Programming, programming, Web Site, web site, Guru, GURU, guru\">\n";
    echo "<META NAME=\"DESCRIPTION\" CONTENT=\"$slogan\">\n";
    echo "<META NAME=\"GENERATOR\" CONTENT=\"PHP-Nuke $Version_Num - http://phpnuke.org\">\n\n\n";
    echo "<style type=\"text/css\">\n";
    echo "<!--\n";
    $browser = getenv("HTTP_USER_AGENT");
    if (ereg("MSIE", "$browser")) {
	echo ".textbox { background: transparent; background-color: White; border: 1px solid #000000; color: #000000; font-family: $site_font; font-size: x-small; text-align: left; scrollbar-face-color: #CCCCCC; scrollbar-shadow-color: #FFFFFF; scrollbar-highlight-color: #FFFFFF; scrollbar-3dlight-color: #FFFFFF; scrollbar-darkshadow-color: #FFFFFF; scrollbar-track-color: #FFFFFF; scrollbar-arrow-color: #000000 }\n";
    } else {
	echo ".textbox { background: transparent; background-color: White; color: #000000; font-family: $site_font; font-size: x-small; text-align: left; scrollbar-face-color: #CCCCCC; scrollbar-shadow-color: #FFFFFF; scrollbar-highlight-color: #FFFFFF; scrollbar-3dlight-color: #FFFFFF; scrollbar-darkshadow-color: #FFFFFF; scrollbar-track-color: #FFFFFF; scrollbar-arrow-color: #000000 }\n";
    }
    echo "TD {font-family: $site_font}\n";
    echo "DIV {font-family: $site_font}\n";
    echo "BODY {font-size: 10pt; font-family: $site_font}\n";
    echo "-->\n</style>\n";
    echo "<SCRIPT type=\"text/javascript\">\n";
    echo "<!--\n\n";
    echo "function showimage() {\n";
    echo "if (!document.images)\n";
    echo "return\n";
    echo "document.images.avatar.src=\n";
    echo "'/images/forum/avatar/' + document.Register.user_avatar.options[document.Register.user_avatar.selectedIndex].value\n";
    echo "}\n\n";
    echo "//-->\n";
    echo "</SCRIPT>\n";

    if ($forumpage==1) {

    echo "<SCRIPT type=\"text/javascript\"><!--\n\n";
    echo "function x () {\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";    
    echo "function DoSmilie(addSmilie) {\n";
    echo "\n";
    echo "var addSmilie;\n";
    echo "var revisedMessage;\n";
    echo "var currentMessage = document.coolsus.message.value;\n";
    echo "revisedMessage = currentMessage+addSmilie;\n";
    echo "document.coolsus.message.value=revisedMessage;\n";
    echo "document.coolsus.message.focus();\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";
    echo "function DoPrompt(action) {\n";
    echo "var revisedMessage;\n";
    echo "var currentMessage = document.coolsus.message.value;\n";
    echo "\n";
    echo "if (action == \"url\") {\n";
    echo "var thisURL = prompt(\"Enter the URL for the link you want to add.\", \"http://\");\n";
    echo "var thisTitle = prompt(\"Enter the web site title\", \"Page Title\");\n";
    echo "var urlBBCode = \"[URL=\"+thisURL+\"]\"+thisTitle+\"[/URL]\";\n";
    echo "revisedMessage = currentMessage+urlBBCode;\n";
    echo "document.coolsus.message.value=revisedMessage;\n";
    echo "document.coolsus.message.focus();\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";
    echo "if (action == \"email\") {\n";
    echo "var thisEmail = prompt(\"Enter the email address you want to add.\", \"\");\n";
    echo "var emailBBCode = \"[EMAIL]\"+thisEmail+\"[/EMAIL]\";\n";
    echo "revisedMessage = currentMessage+emailBBCode;\n";
    echo "document.coolsus.message.value=revisedMessage;\n";
    echo "document.coolsus.message.focus();\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";
    echo "if (action == \"bold\") {\n";
    echo "var thisBold = prompt(\"Enter the text that you want to make bold.\", \"\");\n";
    echo "var boldBBCode = \"[B]\"+thisBold+\"[/B]\";\n";
    echo "revisedMessage = currentMessage+boldBBCode;\n";
    echo "document.coolsus.message.value=revisedMessage;\n";
    echo "document.coolsus.message.focus();\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";
    echo "if (action == \"italic\") {\n";
    echo "var thisItal = prompt(\"Enter the text that you want to make italic.\", \"\");\n";
    echo "var italBBCode = \"[I]\"+thisItal+\"[/I]\";\n";
    echo "revisedMessage = currentMessage+italBBCode;\n";
    echo "document.coolsus.message.value=revisedMessage;\n";
    echo "document.coolsus.message.focus();\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";
    echo "if (action == \"image\") {\n";
    echo "var thisImage = prompt(\"Enter the URL for the image you want to display.\", \"http://\");\n";
    echo "var imageBBCode = \"[IMG]\"+thisImage+\"[/IMG]\";\n";
    echo "revisedMessage = currentMessage+imageBBCode;\n";
    echo "document.coolsus.message.value=revisedMessage;\n";
    echo "document.coolsus.message.focus();\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";
    echo "if (action == \"quote\") {\n";
    echo "var quoteBBCode = \"[QUOTE]  [/QUOTE]\";\n";
    echo "revisedMessage = currentMessage+quoteBBCode;\n";
    echo "document.coolsus.message.value=revisedMessage;\n";
    echo "document.coolsus.message.focus();\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";
    echo "if (action == \"code\") {\n";
    echo "var codeBBCode = \"[CODE]  [/CODE]\";\n";
    echo "revisedMessage = currentMessage+codeBBCode;\n";
    echo "document.coolsus.message.value=revisedMessage;\n";
    echo "document.coolsus.message.focus();\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";
    echo "if (action == \"listopen\") {\n";
    echo "var liststartBBCode = \"[LIST]\";\n";
    echo "revisedMessage = currentMessage+liststartBBCode;\n";
    echo "document.coolsus.message.value=revisedMessage;\n";
    echo "document.coolsus.message.focus();\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";
    echo "if (action == \"listclose\") {\n";
    echo "var listendBBCode = \"[/LIST]\";\n";
    echo "revisedMessage = currentMessage+listendBBCode;\n";
    echo "document.coolsus.message.value=revisedMessage;\n";
    echo "document.coolsus.message.focus();\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";
    echo "if (action == \"listitem\") {\n";
    echo "var thisItem = prompt(\"Enter the new list item. Note that each list group must be preceeded by a List Close and must be ended with List Close.\", \"\");\n";
    echo "var itemBBCode = \"[*]\"+thisItem;\n";
    echo "revisedMessage = currentMessage+itemBBCode;\n";
    echo "document.coolsus.message.value=revisedMessage;\n";
    echo "document.coolsus.message.focus();\n";
    echo "return;\n";
    echo "}\n";
    echo "\n";
    echo "}\n";
    echo "//--></SCRIPT>\n";
    echo "\n\n\n";
    }

//    if ($admin) {
	echo "<SCRIPT type=\"text/javascript\">\n";
	echo "<!--\n\n";
	echo "function openwindow(){\n";
	echo "	window.open (\"$hlpfile\",\"Help\",\"toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=no,copyhistory=no,width=600,height=400\");\n";
	echo "}\n\n";
	echo "//-->\n";
	echo "</SCRIPT>\n";
//    }
    if ($artpage==1) {
	echo "<script language=\"javascript\" src=\"dhtmllib.js\"></SCRIPT>\n";
	echo "<script language=\"javascript\" src=\"scroller.js\"></SCRIPT>\n";
	echo "<SCRIPT language=\"javascript\">\n\n";
//	echo "<SCRIPT type=\"text/javascript\">\n\n";
	echo "var myScroller1 = new Scroller(0, 0, 180, 42, 1, 0);\n";
	echo "myScroller1.setColors(\"#000000\", \"#FFFFFF\", \"#000000\");\n";
	echo "myScroller1.setFont(\"$site_font\", 1);\n";
	$result=mysql_query("select sid, title from stories where topic=$topic order by sid DESC limit 0,20");
	while(list($sid1, $title1) = mysql_fetch_row($result)) {
	    $title1 = ereg_replace("\"", "\\\"", $title1);
	    echo "myScroller1.addItem(\"<center><a href=\\\"article.php?sid=$sid1\\\">$title1</a></center>\");\n";
	}
	echo "\n";
	echo "function init() {\n\n";
	echo "var img;\n";
	echo "var x, y;\n";
	echo "img = getImage(\"placeholder\");\n";
	echo "x = getImagePageLeft(img);\n";
	echo "y = getImagePageTop(img);\n";
	echo "myScroller1.create();\n";
	echo "myScroller1.hide();\n";
	echo "myScroller1.moveTo(x, y);\n";
	echo "myScroller1.setzIndex(100);\n";
	echo "myScroller1.show();\n\n";
	echo "}\n";
	echo "</SCRIPT>\n";
    } else {
	echo "<SCRIPT type=\"text/javascript\">\n\n";
	echo "function init() {\n\n";
	echo "}\n";
	echo "</SCRIPT>\n";
    }
    echo "</head>\n\n";
    if(isset($user)) {
	$user2 = base64_decode($user);
	$cookie = explode(":", $user2);
	if($cookie[9]=="") $cookie[9]=$Default_Theme;
	if(isset($theme)) $cookie[9]=$theme;
	if(!$file=@opendir("themes/$cookie[9]")) {
	    include("themes/$Default_Theme/theme.php");
	    include("themes/$Default_Theme/header.php");
	} else {
	    include("themes/$cookie[9]/theme.php");
	    include("themes/$cookie[9]/header.php");
	}
    } else {
        include("themes/$Default_Theme/theme.php");
        include("themes/$Default_Theme/header.php");
    }
}

head();
include("counter.php");

?>