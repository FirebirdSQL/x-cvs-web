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

if(!isset($mainfile)) { include("mainfile.php"); }
if(!isset($sid)) { exit(); }

function PrintPage($sid) {
    global $site_logo, $nuke_url, $sitename, $site_font, $datetime;
    $result=mysql_query("select title, time, hometext, bodytext, topic, notes from stories where sid=$sid");
    list($title, $time, $hometext, $bodytext, $topic, $notes) = mysql_fetch_row($result);
    $result2=mysql_query("select topictext from topics where topicid=$topic");
    list($topictext) = mysql_fetch_row($result2);
    formatTimestamp($time);
    echo "
    <html>
    <head><title>$sitename</title></head>
    <body bgcolor=\"#FFFFFF\" text=\"#000000\">
    <table border=0><tr><td>
    
    <table border=0 width=640 cellpadding=0 cellspacing=1 bgcolor=\"#000000\"><tr><td>
    <table border=0 width=640 cellpadding=20 cellspacing=1 bgcolor=\"#FFFFFF\"><tr><td>
    <center>
    <img src=\"images/$site_logo\" border=0 alt=\"\"><br><br>
    <font face=\"$site_font\" size=\"+2\">
    <b>$title</b><br>
    <font size=1><b>".translate("Date:")."</b> $datetime<br><b>".translate("Topic:")."</b> $topictext<br><br>
    </center><font size=2>
    $hometext<br><br>
    $notes<br><br>
    $bodytext<br><br>
    </td></tr></table></td></tr></table>
    <br><br><center>
    <font face=\"$site_font\" size=2>
    ".translate("This article comes from")." $sitename<br>
    <a href=\"$nuke_url\">$nuke_url</a><br><br>
    ".translate("The URL for this story is:")."<br>
    <a href=\"$nuke_url/article.php?sid=$sid\">$nuke_url/article.php?sid=$sid</a>
    </td></tr></table>
    </body>
    </html>
    ";
}

PrintPage($sid);

?>