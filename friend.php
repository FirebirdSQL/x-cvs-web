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

function FriendSend($sid) {
    if(!isset($sid)) { exit(); }
    include ("header.php");
    $result=mysql_query("select title from stories where sid=$sid");
    list($title) = mysql_fetch_row($result);
    OpenTable4();
    echo "
    <font size=4><b>".translate("Send Story to a Friend")."</b></font><br><br>
    ".translate("You will send the story")." <b>$title</b> ".translate("to a specified friend:")."<br><br>
    <form action=\"friend.php\" method=post>
    <input type=hidden name=sid value=$sid>";
    global $user, $cookie;
    if ($user) {
	$result=mysql_query("select name, email from users where uname='$cookie[1]'");
	list($yn, $ye) = mysql_fetch_row($result);
    }
    echo "
    <b>".translate("Your Name: ")."</b> <input class=textbox type=text name=\"yname\" value=\"$yn\"><br>
    <b>".translate("Your Email: ")."</b> <input class=textbox type=text name=\"ymail\" value=\"$ye\"><br><br>
    <b>".translate("Friend Name: ")."</b> <input class=textbox type=text name=\"fname\"><br>
    <b>".translate("Friend Email: ")."</b> <input class=textbox type=text name=\"fmail\"><br><br>
    <input type=hidden name=op value=SendStory>
    <input type=submit value=".translate("Send").">
    </form>
    </td></tr></table></td></tr></table>
    ";
    include ('footer.php');
}

function SendStory($sid, $yname, $ymail, $fname, $fmail) {
    global $sitename, $nuke_url;
    $result2=mysql_query("select title, time, topic, from stories where sid=$sid");
    list($title, $time, $topic) = mysql_fetch_row($result2);
    $result3=mysql_query("select topictext from topics where topicid=$topic");
    list($topictext) = mysql_fetch_row($result3);
    $subject = "".translate("Interesting Article at")." $sitename";
    $message = "".translate("Hello")." $fname:\n\n".translate("Your Friend")." $yname ".translate("considered the following article interesting and wanted to send it to you.")."\n\n\n$title\n(".translate("Date:")." $time)\n".translate("Topic:")." $topictext\n\n".translate("URL").": $nukeurl/article.php?sid=$sid\n\n".translate("You can read interesting articles at")." $sitename\n$nuke_url";
    mail($fmail, $subject, $message, "From: \"$yname\" <$ymail>\nX-Mailer: PHP/" . phpversion());
    $title = urlencode($title);
    $fname = urlencode($fname);
    Header("Location: friend.php?op=StorySent&title=$title&fname=$fname");
}

function StorySent($title, $fname) {
    include ("header.php");
    $title = urldecode($title);
    $fname = urldecode($fname);
    echo "<table border=0 width=\"100%\" cellpadding=0 cellspacing=1 bgcolor=\"#000000\"><tr><td>";
    echo "<table border=0 width=\"100%\" cellpadding=10 cellspacing=1 bgcolor=\"#FFFFFF\"><tr><td>";
    echo "<center><font size=2>".translate("Story")." <b>$title</b> ".translate("has been sent to")." $fname... ".translate("Thanks!")."</font></center>";
    echo "</td></tr></table></td></tr></table>";
    include ("footer.php");
}

function RecommendSite() {
    include ("header.php");
    OpenTable4();
    echo "
    <font size=4><b>".translate("Recommend this Site to a Friend")."</b></font><br><br>
    <form action=\"friend.php\" method=post>
    <input type=hidden name=op value=SendSite>";
    global $user, $cookie;
    if ($user) {
	$result=mysql_query("select name, email from users where uname='$cookie[1]'");
	list($yn, $ye) = mysql_fetch_row($result);
    }
    echo "
    ".translate("Your Name: ")." <input class=textbox type=text name=\"yname\" value=\"$yn\"><br>
    ".translate("Your Email: ")." <input class=textbox type=text name=\"ymail\" value=\"$ye\"><br><br>
    ".translate("Friend Name: ")." <input class=textbox type=text name=\"fname\"><br>
    ".translate("Friend Email: ")." <input class=textbox type=text name=\"fmail\"><br><br>
    <input type=submit value=".translate("Send").">
    </form>
    </td></tr></table></td></tr></table>
    ";
    include ('footer.php');
}


function SendSite($yname, $ymail, $fname, $fmail) {
    global $sitename, $slogan, $nuke_url;
    $subject = "".translate("Interesting Site: ")." $sitename";
    $message = "".translate("Hello")." $fname:\n\n".translate("Your Friend")." $yname ".translate("considered our site")." $sitename ".translate("interesting and wanted to send it to you.")."\n\n\n".translate("Site Name:")." $sitename\n$slogan\n".translate("Site URL:")." $nuke_url\n";
    mail($fmail, $subject, $message, "From: \"$yname\" <$ymail>\nX-Mailer: PHP/" . phpversion());
    Header("Location: friend.php?op=SiteSent&fname=$fname");
}

function SiteSent($fname) {
    include ('header.php');
    echo "
    <table border=0 width=\"100%\" cellpadding=0 cellspacing=1 bgcolor=\"#000000\"><tr><td>
    <table border=0 width=\"100%\" cellpadding=10 cellspacing=1 bgcolor=\"#FFFFFF\"><tr><td>
    <center><font size=2>".translate("The reference to our site has been sent to")." $fname...<br><br>".translate("Thanks for recommend us!")."</font></center>
    </td></tr></table></td></tr></table>";
    include ('footer.php');
}


switch($op) {

    case "SendStory":
	SendStory($sid, $yname, $ymail, $fname, $fmail);
	break;
	
    case "StorySent":
	StorySent($title, $fname);
	break;

    case "SendSite":
	SendSite($yname, $ymail, $fname, $fmail);
	break;
	
    case "SiteSent":
	SiteSent($fname);
	break;

    case "FriendSend":
	FriendSend($sid);
	break;

    default:
	RecommendSite();
	break;

}
?>