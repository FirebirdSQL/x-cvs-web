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

include("config.php");
include("language/lang-$language.php");
mysql_pconnect($dbhost, $dbuname, $dbpass);
@mysql_select_db("$dbname") or die ("Unable to select database");
$mainfile = 1;

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=0 bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=8 bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<center>";
    echo "<table border=0 cellspacing=1 cellpadding=0 bgcolor=\"$bgcolor1\"><tr><td>\n";
    echo "<table border=0 cellspacing=1 cellpadding=8 bgcolor=\"$bgcolor2\"><tr><td>\n";
}

function OpenTable3() {
    global $bgcolor1, $bgcolor3;
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=0 bgcolor=\"$bgcolor1\"><tr><td>\n";
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=8 bgcolor=\"$bgcolor3\"><tr><td>\n";
}

function OpenTable4() {
    global $bgcolor1, $bgcolor4;
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=0 bgcolor=\"$bgcolor1\"><tr><td>\n";
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=8 bgcolor=\"$bgcolor4\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function dbconnect() {
	global $dbhost, $dbuname, $dbpass, $dbname;
	mysql_pconnect($dbhost, $dbuname, $dbpass);
	@mysql_select_db("$dbname") or die ("Unable to select database");
}

function ultramode() {
    $ultra = "ultramode.txt";
    $file = fopen("$ultra", "w");
    fwrite($file, "General purpose self-explanatory file with news headlines\n");
    $rfile=mysql_query("select sid, aid, title, time, comments, topic from stories order by time DESC limit 0,10");
    while(list($sid, $aid, $title, $time, $comments, $topic) = mysql_fetch_row($rfile)) {
	$rfile2=mysql_query("select topictext, topicimage from topics where topicid=$topic");
	list($topictext, $topicimage) = mysql_fetch_row($rfile2);
	$content = "%%\n$title\n/article.php?sid=$sid\n$time\n$aid\n$topictext\n$comments\n$topicimage\n";
	fwrite($file, $content);
    }
    fclose($file);
}

function counter() {
	mysql_query("UPDATE vars SET value=value+1 where name='totalhits'");
}

function cookiedecode($user) {
	global $cookie;
	$user = base64_decode($user);
	$cookie = explode(":", $user);
	$result = mysql_query("select uid from users where uname='$cookie[1]'");
	if (!mysql_num_rows($result)) {
	    unset($user);
	    unset($cookie);
	}	
	return $cookie;
}

function getusrinfo($user) {
	global $userinfo;
	$user2 = base64_decode($user);
	$user3 = explode(":", $user2);
	$result = mysql_query("select uid, name, uname, email, femail, url, user_avatar, user_icq, user_occ, user_from, user_intrest, user_sig, user_viewemail, user_theme, user_aim, user_yim, user_msnm, pass, storynum, umode, uorder, thold, noscore, bio, ublockon, ublock, theme, commentmax from users where uname='$user3[1]' and pass='$user3[2]'");
	if(mysql_num_rows($result)==1) {
		$userinfo = mysql_fetch_array($result);
	} else {
	    echo "<b>".translate("A problem ocurred.")."</b><br>";
	}
	return $userinfo;
}

function searchblock() {
	OpenTable();
	echo "<form action=\"searchbb.php\" method=\"post\">";
	echo "<input type=\"hidden\" name=\"addterm\" value=\"any\">";
	echo "<input type=\"hidden\" name=\"sortby\" value=\"p.post_time\">";
	echo "&nbsp;&nbsp;<b>".translate('Search')."</b>&nbsp;<input class=\"textbox\" type=\"text\" name=\"term\" size=\"15\">";
	echo "<input type=\"hidden\" name=\"submit\" value=\"submit\"></form>";
	echo "<div align=\"left\"><font size=\"2\">&nbsp;&nbsp;[ <a href=\"searchbb.php?addterm=any&sortby=p.post_time&adv=1\">Advanced Search</a> ]</font></div>";
	CloseTable();
}

function searchbox() {
    $title = "".translate("Search")."";
    $content = "<form action=\"search.php\" method=get>";
    $content .= "<br><center><input type=text name=query size=14></center>";
    $content .= "</form>";
    themesidebox($title, $content);
}

function FixQuotes ($what = "") {
	$what = ereg_replace("'","''",$what);
	while (eregi("\\\\'", $what)) {
		$what = ereg_replace("\\\\'","'",$what);
	}
	return $what;
}

/*********************************************************/
/* text filter                                           */
/*********************************************************/

function check_words($Message) {
	global $EditedMessage, $CensorList, $CensorMode, $CensorReplace;
	$EditedMessage = $Message;
	if ($CensorMode != 0) {
		if (is_array($CensorList)) {
			$Replacement = $CensorReplace;

			if ($CensorMode == 1) { # Exact match
				$RegExPrefix   = '([^[:alpha:]]|^)';
				$RegExSuffix   = '([^[:alpha:]]|$)';
			} elseif ($CensorMode == 2) {    # Word beginning
				$RegExPrefix   = '([^[:alpha:]]|^)';
				$RegExSuffix   = '[[:alpha:]]*([^[:alpha:]]|$)';
			} elseif ($CensorMode == 3) {    # Word fragment
				$RegExPrefix   = '([^[:alpha:]]*)[[:alpha:]]*';
				$RegExSuffix   = '[[:alpha:]]*([^[:alpha:]]*)';
			}

			for ($i = 0; $i < count($CensorList) && $RegExPrefix != ''; $i++) {
				$EditedMessage = eregi_replace($RegExPrefix.$CensorList[$i].$RegExSuffix,"\\1$Replacement\\2",$EditedMessage);
			}
		}
	}
	return ($EditedMessage);
}


function delQuotes($string){ 
# no recursive function to add quote to an HTML tag if needed
# and delete duplicate spaces between attribs.
	$tmp="";    # string buffer
	$result=""; # result string
	$i=0;
	$attrib=-1; # Are us in an HTML attrib ?   -1: no attrib   0: name of the attrib   1: value of the atrib
	$quote=0;   # Is a string quote delimited opened ? 0=no, 1=yes
	$len = strlen($string);
	while ($i<$len) {
		switch($string[$i]) { # What car is it in the buffer ?
			case "\"": #"       # a quote. 
				if ($quote==0) {
					$quote=1;
				} else {
					$quote=0;
					if (($attrib>0) && ($tmp != "")) { $result .= "=\"$tmp\""; }
					$tmp="";
					$attrib=-1;
				}
				break;
			case "=":           # an equal - attrib delimiter
				if ($quote==0) {  # Is it found in a string ?
					$attrib=1;
					if ($tmp!="") $result.=" $tmp";
					$tmp="";
				} else $tmp .= '=';
				break;
			case " ":           # a blank ?
				if ($attrib>0) {  # add it to the string, if one opened.
					$tmp .= $string[$i];
				}
				break;
			default:            # Other
				if ($attrib<0)    # If we weren't in an attrib, set attrib to 0
					$attrib=0;
				$tmp .= $string[$i];
				break;
		}
		$i++;
	}
	if (($quote!=0) && ($tmp != "")) {
		if ($attrib==1) $result .= "="; 
	# If it is the value of an atrib, add the '='
		$result .= "\"$tmp\"";# Add quote if needed (the reason of the function ;-)
	}
	#  echo $result;echo ".....";
	return $result;
}


function check_html ($str, $strip="") {
// The core of this code has been lifted from phpslash
// which is licenced under the GPL.
	include("config.php");
	if ($strip == "nohtml")
		$AllowableHTML=array('');
	$str = stripslashes($str);
	$str = eregi_replace("<[[:space:]]*([^>]*)[[:space:]]*>",
                         '<\\1>', $str);
               // Delete all spaces from html tags .
	$str = eregi_replace("<a[^>]*href[[:space:]]*=[[:space:]]*\"?[[:space:]]*([^\" >]*)[[:space:]]*\"?[^>]*>",
                         '<a href="\\1">', $str); # "
               // Delete all attribs from Anchor, except an href, double quoted.
	$str = eregi_replace("<img?",
                         '', $str); # "
	$tmp = "";
	while (ereg("<(/?[[:alpha:]]*)[[:space:]]*([^>]*)>",$str,$reg)) {
		$i = strpos($str,$reg[0]);
		$l = strlen($reg[0]);
		if ($reg[1][0] == "/") $tag = strtolower(substr($reg[1],1));
		else $tag = strtolower($reg[1]);  
		if ($a = $AllowableHTML[$tag])
			if ($reg[1][0] == "/") $tag = "</$tag>";
			elseif (($a == 1) || ($reg[2] == "")) $tag = "<$tag>";
			else {
			  # Place here the double quote fix function.
			  $attrb_list=delQuotes($reg[2]);
			  $tag = "<$tag" . $attrb_list . ">";
			} # Attribs in tag allowed
		else $tag = "";
		$tmp .= substr($str,0,$i) . $tag;
		$str = substr($str,$i+$l);
	}
	$str = $tmp . $str;
	return $str;
	exit;
	// Squash PHP tags unconditionally
	$str = ereg_replace("<\?","",$str);
	return $str;
}

function filter_text($Message, $strip="") {
	global $EditedMessage;
	check_words($Message);
	$EditedMessage=check_html($EditedMessage, $strip);
	return ($EditedMessage);
}

/*********************************************************/
/* formatting stories                                    */
/*********************************************************/

function formatTimestamp($time) {
	global $datetime, $locale;
	setlocale ("LC_TIME", "$locale");
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);
	$datetime = strftime("".translate("datestring")."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
	$datetime = ucfirst($datetime);
	return($datetime);
}

function formatAidHeader($aid) {
	$holder = mysql_query("SELECT url, email FROM authors where aid='$aid'");
	if (!$holder) { echo mysql_errno(). ": ".mysql_error(). "<br>";	exit(); }
	list($url, $email) = mysql_fetch_row($holder);
	if (isset($url)) { echo "<a href=\"$url\">$aid</a>";
	} elseif (isset($email)) { echo "<a href=\"mailto:$email\">$aid</a>";
	} else { echo $aid; }
}

function oldNews($storynum) {
    global $locale, $oldnum, $storyhome, $cookie, $categories, $cat;
    $storynum = $storyhome;
    $boxstuff = "";
    $boxTitle = translate("Past News");
    if ($categories == 1) {
	$sel = "where catid='$cat'";
    } else {
	$sel = "";
    }
    $result = mysql_query("select sid, title, time, comments from stories $sel order by time desc limit $storynum, $oldnum");
    $vari = 0;
    if (isset($cookie[4])) {
	$options .= "&mode=$cookie[4]";
    } else {
	$options .= "&mode=thread";
    }
    if (isset($cookie[5])) {
	$options .= "&order=$cookie[5]";
    } else {
	$options .= "&order=0";
    }
    if (isset($cookie[6])) {
	$options .= "&thold=$cookie[6]";
    } else {
	$options .= "&thold=0";
    }
    while(list($sid, $title, $time, $comments) = mysql_fetch_row($result)) {
	setlocale ("LC_TIME", "$locale");
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime2);
	$datetime2 = strftime("".translate("datestring2")."", mktime($datetime2[4],$datetime2[5],$datetime2[6],$datetime2[2],$datetime2[3],$datetime2[1]));
	$datetime2 = ucfirst($datetime2);
	if($time2==$datetime2) {
	    $boxstuff .= "<li><a href=\"article.php?sid=$sid$options\">$title</a> ($comments)\n";
	} else {
	    if($a=="") {
		$boxstuff .= "<b>$datetime2</b><br><br><li><a href=\"article.php?sid=$sid$options\">$title</a> ($comments)\n";
		$time2 = $datetime2;
		$a = 1;
	    } else {
		$boxstuff .= "<br><br><b>$datetime2</b><br><br><li><a href=\"article.php?sid=$sid$options\">$title</a> ($comments)\n";
		$time2 = $datetime2;
	    }
	}
	$vari++;
	if ($vari==$oldnum) {
	    if (isset($cookie[3])) {
		$storynum = $cookie[3];
	    } else {
		$storynum = $storyhome;
	    }
	    $min = $oldnum + $storynum;
	    $boxstuff .= "<br><p align=right><font size=1><a href=\"search.php?min=$min&type=stories&category=$cat\"><b>".translate("Older Articles")."</b></a></font>\n";
	}
    }
    themesidebox($boxTitle, $boxstuff);
}

function NewsBlock($storynum) {
    global $locale, $oldnum, $storyhome, $cookie, $categories, $cat;
//    $storynum = $storyhome;
    if (isset($cookie[3])) {
	$storynum = $cookie[3];
    } else {
	$storynum = $storyhome;
    }
    $boxstuff = "";
    $boxTitle = translate("Hot News");
    if ($categories == 1) {
	$sel = "where catid='$cat'";
    } else {
	$sel = "";
    }
    $result = mysql_query("select sid, title, time, comments from stories $sel order by time desc limit $storynum");
    $vari = 0;
    if (isset($cookie[4])) {
	$options .= "&mode=$cookie[4]";
    } else {
	$options .= "&mode=thread";
    }
    if (isset($cookie[5])) {
	$options .= "&order=$cookie[5]";
    } else {
	$options .= "&order=0";
    }
    if (isset($cookie[6])) {
	$options .= "&thold=$cookie[6]";
    } else {
	$options .= "&thold=0";
    }
    while(list($sid, $title, $time, $comments) = mysql_fetch_row($result)) {
	setlocale ("LC_TIME", "$locale");
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime2);
	$datetime2 = strftime("".translate("datestring3")."", mktime($datetime2[4],$datetime2[5],$datetime2[6],$datetime2[2],$datetime2[3],$datetime2[1]));
	$datetime2 = ucfirst($datetime2);
  $boxstuff .= "<li>$datetime2 <a href=\"article.php?sid=$sid$options\">$title</a> ($comments)\n";
	$vari++;
	if ($vari==$oldnum) {
	    if (isset($cookie[3])) {
		$storynum = $cookie[3];
	    } else {
		$storynum = $storyhome;
	    }
	    $min = $oldnum + $storynum;
	    $boxstuff .= "<br><p align=right><font size=1><a href=\"search.php?min=$min&type=stories&category=$cat\"><b>".translate("Older Articles")."</b></a></font>\n";
	}
    }
    thememainbox($boxTitle, $boxstuff);
}

function mainblock() {
	$result = mysql_query("select title, content from mainblock");
	while(list($title, $content) = mysql_fetch_array($result)) {
		$content = nl2br($content);
		themesidebox($title, $content);
	}
}

function mainblock2() {
	$result = mysql_query("select title, content from mainblock");
	while(list($title, $content) = mysql_fetch_array($result)) {
		$content = nl2br($content);
		thememainbox($title, $content);
	}
}


function category() {
    global $cat, $language;
    $result = mysql_query("select catid, title from stories_cat order by title");
    $numrows = mysql_num_rows($result);
    if ($numrows == 0) {
	return;
    } else {
	while(list($catid, $title) = mysql_fetch_row($result)) {
	    $result2 = mysql_query("select * from stories where catid='$catid'");
	    $numrows = mysql_num_rows($result2);
	    if ($numrows > 0) {
		$res = mysql_query("select time from stories where catid='$catid' order by sid DESC limit 0,1");
		list($time) = mysql_fetch_row($res);
		ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $dat);
		if ($cat == $catid) {
		    $boxstuff .= "<li><b>$title</b>";
		} else {
		    $boxstuff .= "<li><a href=\"categories.php?op=newindex&catid=$catid\">$title</a> <font size=1>($dat[2]/$dat[3])</font>";
		}
	    }
	}
	$title = "Categories";
	themesidebox($title, $boxstuff);
    }
}

function rightblocks() {
	$result = mysql_query("select title, content from rblocks");
	while(list($title, $content) = mysql_fetch_array($result)) {
		$content = nl2br($content);
		themesidebox($title, $content);
	}
}

function leftblocks() {
	$result = mysql_query("select title, content from lblocks");
	while(list($title, $content) = mysql_fetch_array($result)) {
		$content = nl2br($content);
		themesidebox($title, $content);
	}
}

function adminblock() {
    global $admin;
    if ($admin) {
	$result = mysql_query("select title, content from adminblock");
	while(list($title, $content) = mysql_fetch_array($result)) {
		$content = nl2br($content);
		themesidebox($title, $content);
	}

    $title = "".translate("Waiting Content")."";
    $result = mysql_query("select * from queue");
    $num = mysql_num_rows($result);
    $content = "<li><a class=boxlink href=\"admin.php?op=submissions\">".translate("Submissions")."</a>: $num";

    $result = mysql_query("select * from reviews_add");
    $num = mysql_num_rows($result);
    $content .= "<li><a class=boxlink href=\"admin.php?op=reviews\">".translate("Waiting Reviews")."</a>: $num";
    
    $result = mysql_query("select * from links_newlink");
    $num = mysql_num_rows($result);
    $content .= "<li><a class=boxlink href=\"admin.php?op=links\">".translate("Waiting Links")."</a>: $num";
    
    themesidebox($title, $content);
    }
}

function ephemblock() {
    global $Ephemerids;
    if ($Ephemerids == 1) {
	$today = getdate();
	$eday = $today[mday];
	$emonth = $today[mon];
    	$result = mysql_query("select yid, content from ephem where did='$eday' AND mid='$emonth'");
	$title = "".translate("Ephemerids")."";
	$boxstuff = "<center><b>".translate("One Day like Today...")."</b></center><br>";
	while(list($yid, $content) = mysql_fetch_array($result)) {
	    if ($cnt==1) {
		$boxstuff .= "<br><br>";
	    }
	    $boxstuff .= "<b>$yid</b><br>";
    	    $boxstuff .= "$content";
	    $cnt = 1;
	}
	themesidebox($title, $boxstuff);
    }
}

function loginbox() {
    global $user;
    if (!$user) {
    $title = "$sitename Login";
    $boxstuff .= "<form action=user.php method=post>";
    $boxstuff .= "<font size=1><center>".translate("Nickname")."<br>";
    $boxstuff .= "<input type=text name=uname size=12 maxlength=25><br>";
    $boxstuff .= "".translate("Password")."<br>";
    $boxstuff .= "<input type=password name=pass size=12 maxlength=20><br>";
    $boxstuff .= "<input type=hidden name=op value=login>";
    $boxstuff .= "<input type=submit value=".translate("Login")."></form>";
    $boxstuff .= "".translate("Don't have an account yet? You can")."";
    $boxstuff .= " <a href=user.php>".translate("create one")."</a>.";
    $boxstuff .= " ".translate("As registered")."";
    $boxstuff .= " ".translate("user you have some advantages like theme manager,")."";
    $boxstuff .= " ".translate("comments configuration and post comments with your name.")."";
    $boxstuff .= "</center>";
    themesidebox($title, $boxstuff);
    }
}

function userblock() {
    global $user, $cookie;
    if(($user) AND ($cookie[8])) {
	$getblock = mysql_query("select ublock from users where uid='$cookie[0]'");
	$title = "".translate("Menu for")." $cookie[1]";
	list($ublock) = mysql_fetch_row($getblock);
	themesidebox($title, $ublock);
    }

}

/*********************************************************/
/* poll functions                                        */
/*********************************************************/

function pollMain($pollID) {
	global $maxOptions, $boxTitle, $boxContent, $uimages, $pollcomm;
	if(!isset($pollID))
	  $pollID = 1;
	if(!isset($url))
	  $url = sprintf("pollBooth.php?op=results&pollID=%d", $pollID);
	$boxContent .= "<form action=\"pollBooth.php\" method=\"post\">";
	$boxContent .= "<input type=\"hidden\" name=\"pollID\" value=\"".$pollID."\">";
	$boxContent .= "<input type=\"hidden\" name=\"forwarder\" value=\"".$url."\">";
	$result = mysql_query("SELECT pollTitle, voters FROM poll_desc WHERE pollID=$pollID");
	list($pollTitle, $voters) = mysql_fetch_row($result);
	$boxTitle = translate("Survey");
	$boxContent .= "<font size=2><b>$pollTitle</b></font><br><br>\n";
	for($i = 1; $i <= $maxOptions; $i++) {
		$result = mysql_query("SELECT pollID, optionText, optionCount, voteID FROM poll_data WHERE (pollID=$pollID) AND (voteID=$i)");
		$object = mysql_fetch_object($result);
		if(is_object($object)) {
			$optionText = $object->optionText;
			if($optionText != "") {
				$boxContent .= "<input type=\"radio\" name=\"voteID\" value=\"".$i."\"> $optionText <br>\n";
			}
		}
	}
	$boxContent .= "<br><center><table cellspacing=0 cellpadding=5 border=0 width=111><tr><td align=center> <input type=image src=$uimages/vote.gif border=0></td><td align=center>\n";
	global $user, $cookie;
	if ($user) {
	    cookiedecode($user);
	}
	$result = mysql_query("SELECT SUM(optionCount) AS SUM FROM poll_data WHERE pollID=$pollID");
	$sum = (int)mysql_result($result, 0, "SUM");
	
	$boxContent .= "<a href=\"pollBooth.php?op=results&pollID=$pollID&mode=$cookie[4]&order=$cookie[5]&thold=$cookie[6]\"><img src=$uimages/result.gif border=0></a></td></tr></table></form><font size=1><b><a class=boxlink href=\"pollBooth.php\">".translate("Past Surveys")."</a></b></font><br>";
	if ($pollcomm) {
	    list($numcom) = mysql_fetch_row(mysql_query("select count(*) from pollcomments where pollID=$pollID"));
	    $boxContent .= "<br>".translate("Votes: ")."<b>$sum</b> | ".translate("comments:")."  <b>$numcom</b>\n";
	} else {
	    $boxContent .= "<br>".translate("Votes: ")."<b>$sum</b>\n";
	}
	$boxContent .= "</center>\n\n";
	themesidebox($boxTitle, $boxContent);
}

function pollLatest() {
	$result = mysql_query("SELECT pollID FROM poll_data ORDER BY pollID DESC");
	$pollID = mysql_fetch_row($result);
	return($pollID[0]);
}

function pollNewest() {
	$pollID = pollLatest();
	pollMain($pollID);
}

function pollCollector($pollID, $voteID, $forwarder) {
	global $maxOptions, $setCookies, $cookiePrefix, $HTTP_COOKIE_VARS;
	$voteValid = "1";
	if($setCookies>0) {
		// we have to check for cookies, so get timestamp of this poll
		$result = mysql_query("SELECT timeStamp FROM poll_desc WHERE pollID=$pollID");
		$object = mysql_fetch_object($result);
		$timeStamp = $object->timeStamp;
		$cookieName = $cookiePrefix.$timeStamp;

		// check if cookie exists
		if($HTTP_COOKIE_VARS["$cookieName"] == "1") {
			// cookie exists, invalidate this vote
			$warn = "You already voted today!";
			$voteValid = "0";
		} else {
			// cookie does not exist yet, set one now
			$cvalue = "1";
			setcookie("$cookieName",$cvalue,time()+86400);
		}
	}
	// update database if the vote is valid
	if($voteValid>0) {
		@mysql_query("UPDATE poll_data SET optionCount=optionCount+1 WHERE (pollID=$pollID) AND (voteID=$voteID)");
		@mysql_query("UPDATE poll_desc SET voters=voters+1 WHERE pollID=$pollID");
		Header("Location: $forwarder");
	} else {
		Header("Location: $forwarder");
	}
	// a lot of browsers can't handle it if there's an empty page
	echo "<html><head></head><body></body></html>";
}

function pollList() {
	global $user, $cookie;
	$result = mysql_query("SELECT pollID, pollTitle, timeStamp, voters FROM poll_desc ORDER BY timeStamp"); 
	$counter = 0;
	echo "<table border=0 cellpadding=8><tr><td>";
	echo "<font size=3>";



	while($object = mysql_fetch_object($result)) {
		$resultArray[$counter] = array($object->pollID, $object->pollTitle, $object->timeStamp, $object->voters);
		$counter++;
	}


	for ($count = 0; $count < count($resultArray); $count++) {
		$id = $resultArray[$count][0];
		$pollTitle = $resultArray[$count][1];
		$voters = $resultArray[$count][3];
		$result2 = mysql_query("SELECT SUM(optionCount) AS SUM FROM poll_data WHERE pollID=$id");
		$sum = (int)mysql_result($result2, 0, "SUM");

		echo("<li> <a href=\"pollBooth.php?pollID=$id\">$pollTitle</a> ");
		echo("(<a href=\"pollBooth.php?op=results&pollID=$id&mode=$cookie[4]&order=$cookie[5]&thold=$cookie[6]\">".translate("Results")."</a> - $sum ".translate("votes").")\n");
	}
	echo "</td></tr></table>";
}

function pollResults($pollID) {
	global $maxOptions, $BarScale, $resultTableBgColor, $resultBarFile, $setCookies;
	if(!isset($pollID)) $pollID = 1;
	$result = mysql_query("SELECT pollID, pollTitle, timeStamp FROM poll_desc WHERE pollID=$pollID");
	$holdtitle = mysql_fetch_row($result);
	echo "<br><b>$holdtitle[1]</b><br><br>";
	mysql_free_result($result);
	$result = mysql_query("SELECT SUM(optionCount) AS SUM FROM poll_data WHERE pollID=$pollID");
	$sum = (int)mysql_result($result, 0, "SUM"); 
	mysql_free_result($result);
	echo "<table>";
	// cycle through all options
	for($i = 1; $i <= $maxOptions; $i++) {
		// select next vote option
		$result = mysql_query("SELECT pollID, optionText, optionCount, voteID FROM poll_data WHERE (pollID=$pollID) AND (voteID=$i)");
		$object = mysql_fetch_object($result);
		if(is_object($object)) {
			$optionText = $object->optionText;
			$optionCount = $object->optionCount;
			if($optionText != "") {
				echo "<td>";
				echo "$optionText";
				echo "</td>";
				if($sum) {
					// $percent = 100 * $optionCount * $BarScale / $sum;
					$percent = 100 * $optionCount / $sum;
				} else {
					$percent = 0;
				}
				echo "<td>";
				//$percentInt = (int)$percent * 4;
				$percentInt = (int)$percent * 4 * $BarScale;
				$percent2 = (int)$percent;
				if ($percent > 0) {
					echo "<img src=\"images/leftbar.gif\" height=14 width=7>";
					echo "<img src=\"images/mainbar.gif\" height=14 width=$percentInt Alt=\"$percent2 %\">";
					echo "<img src=\"images/rightbar.gif\" height=14 width=7>";
				} else {
					echo "<img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"$percent2 %\">";
					echo "<img src=\"images/mainbar.gif\" height=14 width=3 Alt=\"$percent2 %\">";
					echo "<img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"$percent2 %\">";
				}
                                printf(" %.2f %% (%d)", $percent, $optionCount);
				echo "</td>";
		        }
		}
		echo "</tr>";
	}
	echo "</td></tr></table><br>";
	echo "<center><b>".translate("Total Votes: ")."$sum</b><br>";
	if($setCookies>0) {
	    echo "<font size=1>".translate("We allow just one vote per day")."</font><br><br><font size=3>";
	} else {
	    echo "<br><br>";
	}
	$booth = $pollID;
	echo("[ <a href=\"pollBooth.php?pollID=$booth\">".translate("Voting Booth")."</a> | ");
	echo("<a href=\"pollBooth.php\">".translate("Other Polls")."</a> ]</font>");
	return(1);
}

function getTopics($s_sid) {
    global $topicname, $topicimage, $topictext;
    $sid = $s_sid;
    $result=mysql_query("SELECT topic FROM stories where sid=$sid");
    list($topic) = mysql_fetch_row($result);
    $result=mysql_query("SELECT topicid, topicname, topicimage, topictext FROM topics where topicid=$topic");
    list($topicid, $topicname, $topicimage, $topictext) = mysql_fetch_row($result);
}

function headlines() {
    $result = mysql_query("select sitename, url, headlinesurl from headlines where status=1");
    while (list($sitename, $url, $headlinesurl) = mysql_fetch_row($result)) {
    $boxtitle 	= 	"$sitename";
    $separ	=	"<li>";
    $cache_file	=	"cache/$sitename.cache";
    $cache_time	=	3600;
    $max_items	=	10;
    $target	=	"new";
    $items	=	0;
    $time	=	split(" ", microtime());
    srand((double)microtime()*1000000);
    $cache_time_rnd	=	300 - rand(0, 600);
    if ( (!(file_exists($cache_file))) || ((filectime($cache_file) + $cache_time - $time[1]) + $cache_time_rnd < 0) || (!(filesize($cache_file))) ) {
	$fpread = fopen($headlinesurl, 'r');
	if(!$fpread) {
	} else {
	    $fpwrite = fopen($cache_file, 'w');
		if(!$fpwrite) {
		} else {
		    while(! feof($fpread) ) {
			$buffer = ltrim(Chop(fgets($fpread, 256)));
			if (($buffer == "<item>") && ($items < $max_items)) {
    			    $title = ltrim(Chop(fgets($fpread, 256)));
			    $link = ltrim(Chop(fgets($fpread, 256)));
			    $title = ereg_replace( "<title>", "", $title );
			    $title = ereg_replace( "</title>", "", $title );
			    $title = ereg_replace( "\"", "\\\"", $title );
			    $link = ereg_replace( "<link>", "", $link );
			    $link = ereg_replace( "</link>", "", $link );
			    fputs($fpwrite, "<?php \$boxstuff .= \"$separ<A HREF=\\\"$link\\\" TARGET=$target>$title</A><BR>\"; ?>\n");
			    $items++;
			}
		    }
		}
	    fclose($fpread);
	}
	fclose($fpwrite);
	
    }
    if (file_exists($cache_file)) {
	include($cache_file);
    }
    $boxstuff .= "<DIV align=right><a href=\"$url\" target=blank><b>read more...</b></a></DIV>";
    themesidebox($boxtitle, $boxstuff);
    $boxstuff = "";
    }
}

function online() {
    global $user, $cookie;
    cookiedecode($user);
    $ip = getenv("REMOTE_ADDR");
    $username = $cookie[1];
    if (!isset($username)) {
        $username = "$ip";
        $guest = 1;
    }
    $past = time()-900;
    mysql_query("DELETE FROM session WHERE time < $past");
    $result = mysql_query("SELECT time FROM session WHERE username='$username'");
    $ctime = time();
    if ($row = mysql_fetch_array($result)) {
	mysql_query("UPDATE session SET username='$username', time='$ctime', host_addr='$ip', guest='$guest' WHERE username='$username'");
    } else {
	mysql_query("INSERT INTO session (username, time, host_addr, guest) VALUES ('$username', '$ctime', '$ip', '$guest')");
    }

    $result = mysql_query("SELECT username FROM session where guest=1");
    $guest_online_num = mysql_num_rows($result);
    $result = mysql_query("SELECT username FROM session where guest=0");
    $member_online_num = mysql_num_rows($result);
    $who_online_num = $guest_online_num + $member_online_num;
    $who_online = "<CENTER>".translate("There are currently,")." $guest_online_num ".translate("guest(s) and")." $member_online_num ".translate("member(s) that are online.")."<br>";
    $title = "".translate("Who's Online")."";
    $content = "$who_online";
    if ($user) {
	$content .= "<br>".translate("You are logged as")." <b>$username</b>.<br>";
	$result = mysql_query("select uid from users where uname='$username'");
	list($uid) = mysql_fetch_row($result);
#	$result2 = mysql_query("select to_userid from priv_msgs where to_userid='$uid'");
#	$numrow = mysql_num_rows($result2);
#	$content .= "".translate("You have <a href=\"viewpmsg.php\"><b>$numrow</b></a> private message(s).")."";
    } else {
	$content .= "<br>".translate("You are Anonymous user. You can register for free by clicking <a href=\"user.php\">here</a>.")."</center>";
    }
    themesidebox($title, $content);
}

function bigstory() {
    global $cookie;
    $today = getdate();
    $day = $today["mday"];
    if ($day < 10) {
	$day = "0$day";
    }
    $month = $today["mon"];
    if ($month < 10) {
	$month = "0$month";
    }
    $year = $today["year"];
    $tdate = "$year-$month-$day";
    $result = mysql_query("select sid, title from stories where (time LIKE '%$tdate%') order by counter DESC limit 0,1");
    list($fsid, $ftitle) = mysql_fetch_row($result);
    if ((!$fsid) AND (!$ftitle)) {
	$content = "<center>".translate("There isn't a Biggest Story for Today, yet.")."</center>";
    } else {
	$content = "<center>".translate("Today's most read Story is:")."<br><br>";
	if (isset($cookie[4])) { $options .= "&mode=$cookie[4]"; } else { $options .= "&mode=thread"; }
	if (isset($cookie[5])) { $options .= "&order=$cookie[5]"; } else { $options .= "&order=0"; }
	if (isset($cookie[6])) { $options .= "&thold=$cookie[6]"; } else { $options .= "&thold=0"; }                       
	$content .= "<a href=article.php?sid=$fsid$options>$ftitle</a></center>";
    }
    $boxtitle = "".translate("Today's Big Story")."";
    themesidebox($boxtitle, $content);
}

function automatednews() {
    $today = getdate();
    $day = $today[mday];
    if ($day < 10) {
	$day = "0$day";
    }
    $month = $today[mon];
    if ($month < 10) {
	$month = "0$month";
    }
    $year = $today[year];
    $hour = $today[hours];
    $min = $today[minutes];
    $sec = "00";
    $result = mysql_query("select anid, time from autonews");
    while(list($anid, $time) = mysql_fetch_row($result)) {
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $date);
	if (($date[1] <= $year) AND ($date[2] <= $month) AND ($date[3] <= $day)) {
	    if (($date[4] < $hour) AND ($date[5] >= $min) OR ($date[4] <= $hour) AND ($date[5] <= $min)) {
		$result2 = mysql_query("select catid, aid, title, hometext, bodytext, topic, informant, notes, ihome from autonews where anid='$anid'");
		while(list($catid, $aid, $title, $hometext, $bodytext, $topic, $author, $notes, $ihome) = mysql_fetch_row($result2)) {
		    $title = stripslashes(FixQuotes($title));
		    $hometext = stripslashes(FixQuotes($hometext));
		    $bodytext = stripslashes(FixQuotes($bodytext));
		    $notes = stripslashes(FixQuotes($notes));
		    mysql_query("insert into stories values (NULL, '$catid', '$aid', '$title', now(), '$hometext', '$bodytext', '0', '0', '$topic', '$author', '$notes', '$ihome')");
		    mysql_query("delete from autonews where anid='$anid'");
		}
	    }
	}
    }
}

function forumerror($e_code) {
    global $sitename, $header, $footer;
    if ($e_code == "0001") {
	$error_msg = "Could not connect to the forums database.";
    }
    if ($e_code == "0002") {
	$error_msg = "The forum you selected does not exist. Please go back and try again.";
    }
    if ($e_code == "0003") {
	$error_msg = "Password Incorrect.";
    }
    if ($e_code == "0004") {
	$error_msg = "Could not query the topics database.";
    }
    if ($e_code == "0005") {
	$error_msg = "Error getting messages from the database.";
    }
    if ($e_code == "0006") {
	$error_msg = "Please enter the Nickname and the Password.";
    }
    if ($e_code == "0007") {
	$error_msg = "You are not the Moderator of this forum therefore you can't perform this function.";
    }
    if ($e_code == "0008") {
	$error_msg = "You did not enter the correct password, please go back and try again.";
    }
    if ($e_code == "0009") {
	$error_msg = "Could not remove posts from the database.";
    }
    if ($e_code == "0010") {
	$error_msg = "Could not move selected topic to selected forum. Please go back and try again.";
    }
    if ($e_code == "0011") {
	$error_msg = "Could not lock the selected topic. Please go back and try again.";
    }
    if ($e_code == "0012") {
	$error_msg = "Could not unlock the selected topic. Please go back and try again.";
    }
    if ($e_code == "0013") {
	$error_msg = "Could not query the database. <BR>Error: mysql_error()";
    }
    if ($e_code == "0014") {
	$error_msg = "No such user or post in the database.";
    }
    if ($e_code == "0015") {
	$error_msg = "Search Engine was unable to query the forums database.";
    }
    if ($e_code == "0016") {
	$error_msg = "That user does not exist. Please go back and search again.";
    }
    if ($e_code == "0017") {
	$error_msg = "You must type a subject to post. You can't post an empty subject. Go back and enter the subject";
    }
    if ($e_code == "0018") {
	$error_msg = "You must choose message icon to post. Go back and choose message icon.";
    }
    if ($e_code == "0019") {
	$error_msg = "You must type a message to post. You can't post an empty message. Go back and enter a message.";
    }
    if ($e_code == "0020") {
	$error_msg = "Could not enter data into the database. Please go back and try again.";
    }
    if ($e_code == "0021") {
	$error_msg = "Can't delete the selected message.";
    }
    if ($e_code == "0022") {
	$error_msg = "An error ocurred while querying the database.";
    }
    if ($e_code == "0023") {
	$error_msg = "Selected message was not found in the forum database.";
    }
    if ($e_code == "0024") {
	$error_msg = "You can't reply to that message. It wasn't sent to you.";
    }
    if ($e_code == "0025") {
	$error_msg = "You can't post a reply to this topic, it has been locked. Contact the administrator if you have any question.";
    }
    if ($e_code == "0026") {
	$error_msg = "The forum or topic you are attempting to post to does not exist. Please try again.";
    }
    if ($e_code == "0027") {
	$error_msg = "You must enter your username and password. Go back and do so.";
    }
    if ($e_code == "0028") {
	$error_msg = "You have entered an incorrect password. Go back and try again.";
    }
    if ($e_code == "0029") {
	$error_msg = "Couldn't update post count.";
    }
    if ($e_code == "0030") {
	$error_msg = "The forum you are attempting to post to does not exist. Please try again.";
    }
    if ($e_code == "0031") {
	return(0);
    }
    if ($e_code == "0032") {
	$error_msg = "Error doing DB query in check_user_pw()";
    }
    if ($e_code == "0033") {
	$error_msg = "Error doing DB query in get_pmsg_count";
    }
    if ($e_code == "0034") {
	$error_msg = "Error doing DB query in check_username()";
    }
    if ($e_code == "0035") {
	$error_msg = "You can't edit a post that's not yours.";
    }
    if ($e_code == "0036") {
	$error_msg = "You do not have permission to edit this post.";
    }
    if ($e_code == "0037") {
	$error_msg = "You did not supply the correct password or do not have permission to edit this post. Please go back and try again.";
    }
    if (!isset($header)) {
	include("header.php");
    }
    OpenTable2();
    echo "<center><font size=\"2\"><b>$sitename Forum Error</b></font><br><br>";
    echo "Error Code: $e_code<br><br><br>";
    echo "<b>ERROR:</b> $error_msg<br><br><br>";
    echo "[ <a href=\"javascript:history.go(-1)\">Go Back</a> ]<br><br>";
    CloseTable();
    include("footer.php");
    die("");
}

?>