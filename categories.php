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

if(!IsSet($mainfile)) { include ("mainfile.php"); }
$index = 1;
$categories = 1;
$cat = $catid;
automatednews();

function theindex($catid) {
    global $storyhome, $httpref, $httprefmax, $topicname, $topicimage, $topictext, $datetime, $user, $cookie, $nuke_url;
    include("header.php");
    if (isset($cookie[3])) {
	$storynum = $cookie[3];
    } else {
	$storynum = $storyhome;
    }
    mysql_query("update stories_cat set counter=counter+1 where catid='$catid'");
    $result = mysql_query("SELECT sid, aid, title, time, hometext, bodytext, comments, counter, topic, informant, notes FROM stories where catid='$catid' ORDER BY sid DESC limit $storynum");
    if(!$result) {
	echo mysql_errno(). ": ".mysql_error(). "<br>"; exit();
    }
    while (list($s_sid, $aid, $title, $time, $hometext, $bodytext, $comments, $counter, $topic, $informant, $notes) = mysql_fetch_row($result)) {
	$printP = "<a href=\"print.php?sid=$s_sid\"><img src=\"images/print.gif\" border=0 Alt=\"".translate("Printer Friendly Page")."\" width=15 height=11></a>&nbsp;";
	$sendF = "<a href=\"friend.php?op=FriendSend&sid=$s_sid\"><img src=\"images/friend.gif\" border=0 Alt=\"".translate("Send this Story to a Friend")."\" width=15 height=11></a>";
	getTopics($s_sid);
	formatTimestamp($time);
	$subject = stripslashes($subject);
	$hometext = stripslashes($hometext);
	$notes = stripslashes($notes);
	$introcount = strlen($hometext);
	$fullcount = strlen($bodytext);
	$totalcount = $introcount + $fullcount;
	$morelink = "( ";
	if ($fullcount > 1) {
	    $morelink .= "<a href=\"article.php?sid=$s_sid";
	    if (isset($cookie[4])) { $morelink .= "&mode=$cookie[4]"; } else { $morelink .= "&mode=thread"; }
	    if (isset($cookie[5])) { $morelink .= "&order=$cookie[5]"; } else { $morelink .= "&order=0"; }
	    $morelink .= "\"><b>".translate("Read More...")."</b></a> | $totalcount ".translate("bytes more")." | "; }
	    $count = $comments;
	    $morelink .= "<a href=\"article.php?sid=$s_sid";
	    if (isset($cookie[4])) { $morelink .= "&mode=$cookie[4]"; } else { $morelink .= "&mode=thread"; }
	    if (isset($cookie[5])) { $morelink .= "&order=$cookie[5]"; } else { $morelink .= "&order=0"; }
	    if (isset($cookie[6])) { $morelink .= "&thold=$cookie[6]"; } else { $morelink .= "&thold=0"; }
	    $morelink2 = "<a href=\"article.php?sid=$s_sid";
	    if (isset($cookie[4])) { $morelink2 .= "&mode=$cookie[4]"; } else { $morelink2 .= "&mode=thread"; }
	    if (isset($cookie[5])) { $morelink2 .= "&order=$cookie[5]"; } else { $morelink2 .= "&order=0"; }
	    if (isset($cookie[6])) { $morelink2 .= "&thold=$cookie[6]"; } else { $morelink2 .= "&thold=0"; }
	    if(($count==0)) {
	    $morelink .= "\">".translate("comments?")."</a> | $printP $sendF )";
	} else {
	    if (($fullcount<1)) {
		if(($count==1)) {
		    $morelink .= "\"><b>".translate("Read More...")."</b></a> | $morelink2\">$count ".translate("comment")."</a> | $printP $sendF )";
		} else {
		    $morelink .= "\"><b>".translate("Read More...")."</b></a> | $morelink2\">$count ".translate("comments")."</a> | $printP $sendF )";
		}
	    } else {
		if(($count==1)) {
		    $morelink .= "\">$count ".translate("comment")."</a> | $printP $sendF )";
		} else {
		    $morelink .= "\">$count ".translate("comments")."</a> | $printP $sendF )";
		}
	    }
	}
	$sid = $s_sid;
	$selcat = mysql_query("select title from stories_cat where catid='$catid'");
	list($title1) = mysql_fetch_row($selcat);
	$title = "$title1: $title";
	themeindex($aid, $informant, $datetime, $title, $counter, $topic, $hometext, $notes, $morelink, $topicname, $topicimage, $topictext);
    }
    mysql_free_result($result);
    if ($httpref==1) {
	$referer = getenv("HTTP_REFERER");
	if ($referer=="" OR ereg("unknown", $referer) OR eregi($nuke_url,$referer)) {
	} else {
    	    mysql_query("insert into referer values (NULL, '$referer')");
	}
	$result = mysql_query("select * from referer");
	$numrows = mysql_num_rows($result);
	if($numrows==$httprefmax) {
    	    mysql_query("delete from referer");
	}
    }
    include("footer.php");
}

switch ($op) {

    case "newindex":
	if ($catid == 0 OR $catid == "") {
	    Header("Location: index.php");
	}
	theindex($catid);
	break;

    default:
	Header("Location: index.php");

}

?>