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
if(!isset($sid) && !isset($tid)) { exit(); }

if($save) {
    cookiedecode($user);
    mysql_query("update users set umode='$mode', uorder='$order', thold='$thold' where uid='$cookie[0]'");
    getusrinfo($user);
    $info = base64_encode("$userinfo[uid]:$userinfo[uname]:$userinfo[pass]:$userinfo[storynum]:$userinfo[umode]:$userinfo[uorder]:$userinfo[thold]:$userinfo[noscore]");
    setcookie("user","$info",time()+$cookieusrtime);
}

if($op == "Reply") {
    Header("Location: comments.php?op=Reply&pid=0&sid=$sid&mode=$mode&order=$order&thold=$thold");
}

$result = mysql_query("select catid, aid, time, title, hometext, bodytext, topic, informant, notes FROM stories where sid=$sid");
list($catid, $aid, $time, $title, $hometext, $bodytext, $topic, $informant, $notes) = mysql_fetch_row($result);
mysql_query("UPDATE stories SET counter=counter+1 where sid=$sid");

$artpage = 1;
include ("header.php");
$artpage = 0;

formatTimestamp($time);
$title = stripslashes($title);
$hometext = stripslashes($hometext);
$bodytext = stripslashes($bodytext);
$notes = stripslashes($notes);

if($bodytext == "") { 
    $bodytext = "$hometext<br><br>$notes"; 
} else { 
    $bodytext = "$hometext<br><br>$notes<br><br>$bodytext";
}

if($informant == "") {
    $informant = $anonymous;
}

getTopics($sid);

if ($catid != 0) {
    $resultx = mysql_query("select title from stories_cat where catid='$catid'");
    list($title1) = mysql_fetch_row($resultx);
    $title = "<a href=\"categories.php?op=newindex&catid=$catid\">$title1</a>: $title";
}

echo "<table width=\"100%\" border=0><tr><td valign=top>";
themearticle($aid, $informant, $datetime, $title, $bodytext, $topic, $topicname, $topicimage, $topictext);
echo "</td><td>&nbsp;</td><td valign=top width=200>";
$boxtitle = "".translate("Related Links")."";
$boxstuff = "";
$result=mysql_query("select name, url from related where tid=$topic");
while(list($name, $url) = mysql_fetch_row($result)) {
    $boxstuff .= "<li><a href=\"$url\" target=\"new\">$name</a>";
}
$boxstuff .= "<li><a href=\"search.php?topic=$topic\">".translate("More about")." $topictext</a>";
$boxstuff .= "<li><a href=\"search.php?author=$aid\">".translate("News by")." $aid</a>";
$boxstuff .= "<br><br><hr noshade width=\"95%\" size=\"1\"><center><b>".translate("Most read story about")." $topictext:</b><br>";
$result2=mysql_query("select sid, title from stories where topic=$topic order by counter desc limit 0,1");
list($topstory, $ttitle) = mysql_fetch_row($result2);
$boxstuff .= "<a href=\"article.php?sid=$topstory\">$ttitle</a></center><br><br>";
$boxstuff .= "<center><b>".translate("Last news about")." $topictext:</b><br>";
$boxstuff .= "<img name=\"placeholder\" src=\"images/pix.gif\" border=0 width=180 height=42 vspace=2></center><br><br>";
$boxstuff .= "<table border=0 width=\"100%\"><tr><td align=left>";
if ($anonpost==1 OR $admin OR $user) {
    $boxstuff .= "<a href=\"comments.php?op=Reply&pid=0&sid=$sid\"><img src=\"$uimages/comment.gif\" border=\"0\" Alt=\"\"></a>";
}
$boxstuff .= "</td><td align=right>";
$boxstuff .= "<a href=\"print.php?sid=$sid\"><img src=\"images/print.gif\" border=0 Alt=\"".translate("Printer Friendly Page")."\" width=15 height=11></a>&nbsp;&nbsp;";
$boxstuff .= "<a href=\"friend.php?op=FriendSend&sid=$sid\"><img src=\"images/friend.gif\" border=0 Alt=\"".translate("Send this Story to a Friend")."\" width=15 height=11></a>";
$boxstuff .= "</td></tr></table>";
$tbl = 180;
themesidebox($boxtitle, $boxstuff);
$tbl = 0;
echo "</td></tr></table>";
cookiedecode($user);
if($mode != "nocomments") {
    include("comments.php");
}
include ("footer.php");
?>