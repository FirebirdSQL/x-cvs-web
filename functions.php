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

function putitems() {
    echo "Click on the <a href=\"bb_smilies.php\">Smilies</a> to insert it on your Message:<br>";
    echo "<A href=\"javascript: x()\" onClick=\"DoSmilie(' :-) ');\"><IMG width=\"15\" height=\"15\" src=\"images/forum/icons/icon_smile.gif\" border=\"0\" alt=\":-)\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoSmilie(' :-( ');\"><IMG width=\"15\" height=\"15\" src=\"images/forum/icons/icon_frown.gif\" border=\"0\" alt=\":-(\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoSmilie(' :-D ');\"><IMG width=\"15\" height=\"15\" src=\"images/forum/icons/icon_biggrin.gif\" border=\"0\" alt=\":-D\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoSmilie(' ;-) ');\"><IMG width=\"15\" height=\"15\" src=\"images/forum/icons/icon_wink.gif\" border=\"0\" alt=\";-)\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoSmilie(' :-o ');\"><IMG width=\"15\" height=\"15\" src=\"images/forum/icons/icon_eek.gif\" border=\"0\" alt=\":-0\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoSmilie(' 8-) ');\"><IMG width=\"15\" height=\"15\" src=\"images/forum/icons/icon_cool.gif\" border=\"0\" alt=\"8-)\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoSmilie(' :-? ');\"><IMG width=\"15\" height=\"22\" src=\"images/forum/icons/icon_confused.gif\" border=\"0\" alt=\":-?\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoSmilie(' :-P ');\"><IMG width=\"15\" height=\"15\" src=\"images/forum/icons/icon_razz.gif\" border=\"0\" alt=\":-P\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoSmilie(' :-| ');\"><IMG width=\"15\" height=\"15\" src=\"images/forum/icons/icon_mad.gif\" border=\"0\" alt=\":-|\"></A>";
    echo "<br><br>";
    echo "Click on the buttoms to add <a href=\"bbcode_ref.php\">BBCode</a> to your message:<br><br>";
    echo "<A href=\"javascript: x()\" onClick=\"DoPrompt('url');\"><IMG src=\"images/forum/b_url.gif\" width=\"83\" height=\"21\" border=\"0\" alt=\"BBCode: Web Address\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoPrompt('email');\"><IMG src=\"images/forum/b_email.gif\" width=\"83\" height=\"21\" border=\"0\" alt=\"BBCode: Email Address\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoPrompt('image');\"><IMG src=\"images/forum/b_image.gif\" width=\"83\" height=\"21\" border=\"0\" alt=\"BBCode: Load Image from Web\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoPrompt('bold');\"><IMG src=\"images/forum/b_bold.gif\" width=\"83\" height=\"21\" border=\"0\" alt=\"BBCode: Bold Text\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoPrompt('italic');\"><IMG src=\"images/forum/b_italic.gif\" width=\"83\" height=\"21\" border=\"0\" alt=\"BBCode: Italic Text\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoPrompt('quote');\"><IMG src=\"images/forum/b_quote.gif\" width=\"83\" height=\"21\" border=\"0\" alt=\"BBCode: Quote\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoPrompt('code');\"><IMG src=\"images/forum/b_code.gif\" width=\"83\" height=\"21\" border=\"0\" alt=\"BBCode: Code\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoPrompt('listopen');\"><IMG src=\"images/forum/b_listopen.gif\" width=\"83\" height=\"21\" border=\"0\" alt=\"BBCode: Open List\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoPrompt('listitem');\"><IMG src=\"images/forum/b_listitem.gif\" width=\"83\" height=\"21\" border=\"0\" alt=\"BBCode: List Item\"></A>";
    echo "<A href=\"javascript: x()\" onClick=\"DoPrompt('listclose');\"><IMG src=\"images/forum/b_listclose.gif\" width=\"83\" height=\"21\" border=\"0\" alt=\"BBCode: Close List\"></A>";
    
}

function get_total_topics($forum_id, $db) {
	$sql = "SELECT count(*) AS total FROM forumtopics WHERE forum_id = '$forum_id'";
	if(!$result = mysql_query($sql, $db))
		return("ERROR");
	if(!$myrow = mysql_fetch_array($result))
		return("ERROR");
	
	return($myrow[total]);
}

function get_total_posts($id, $db, $type) {
	switch($type) {
		
		case 'users':
		    $sql = "SELECT count(*) AS total FROM users WHERE uid != 1";
		break;
		
		case 'all':
		    $sql = "SELECT count(*) AS total FROM posts";
		break;
		
		case 'forum':
		    $sql = "SELECT count(*) AS total FROM posts WHERE forum_id = '$id'";
		break;
		
		case 'topic':
		    $sql = "SELECT count(*) AS total FROM posts WHERE topic_id = '$id'";
		break;

		case 'user':
		    forumerror(0031);
	}

	if(!$result = mysql_query($sql, $db))
		return("ERROR");
	if(!$myrow = mysql_fetch_array($result))
		return("0");
	return($myrow[total]);
}

function get_last_post($id, $db, $type) {
	switch($type) {
		case 'forum':
			$sql = "SELECT p.post_time, p.poster_id, u.uname FROM posts p, users u WHERE p.forum_id = '$id' AND p.poster_id = u.uid ORDER BY post_time DESC";
		break;
		case 'topic':
			$sql = "SELECT p.post_time, u.uname FROM posts p, users u WHERE p.topic_id = '$id' AND p.poster_id = u.uid ORDER BY post_time DESC";
		break;
	}
	if(!$result = mysql_query($sql, $db))
		return("ERROR");

	if(!$myrow = mysql_fetch_array($result))
		return("No posts");
	$val = sprintf("%s <br> by %s", $myrow[post_time], $myrow[uname]);
	return($val);
}

function get_moderator($user_id, $db) {

	if ($user_id == 0) {
		return("None");
	}
	$sql = "SELECT uname FROM users WHERE uid = '$user_id' ";
	if(!$result = mysql_query($sql, $db))
		return("ERROR");
	if(!$myrow = mysql_fetch_array($result))
		return("ERROR");
	return("$myrow[uname]");
}

function get_forum_mod($forum_id, $db) {
	$sql = "SELECT forum_moderator FROM forums WHERE forum_id = '$forum_id'";
	if(!$result = mysql_query($sql, $db))
                return("-1");
        if(!$myrow = mysql_fetch_array($result))
                return("-1");
        return("$myrow[forum_moderator]");
}

/**
 * Nathan Codding - July 19, 2000
 * Checks the given password against the DB for the given username. Returns true if good, false if not.
 */
function check_user_pw($username, $password, $db, $system) {
	#if (!$system) $password = crypt($password);
	if (!$system) $password = crypt($password,substr($password,0,2));
	else $password = $password;
	$sql = "SELECT uid FROM users WHERE (uname = '$username') AND (pass = '$password')";
	$resultID = mysql_query($sql, $db);
	if (!$resultID) {
		echo mysql_error() . "<br>";
		forumerror(0032);
	}
	return mysql_num_rows($resultID);
} // check_user_pw()


/**
 * Nathan Codding - July 19, 2000
 * Returns a count of the given userid's private messages.
 */
function get_pmsg_count($user_id, $db) {
	$sql = "SELECT msg_id FROM priv_msgs WHERE (to_userid = $user_id)";
	$resultID = mysql_query($sql);
	if (!$resultID) {
		echo mysql_error() . "<br>";
		forumerror(0033);
	}
	return mysql_num_rows($resultID);
} // get_pmsg_count()


/**
 * Nathan Codding - July 19, 2000
 * Checks if a given username exists in the DB. Returns true if so, false if not.
 */
function check_username($username, $db) {
	$sql = "SELECT uid FROM users WHERE (uname = '$username')";
	$resultID = mysql_query($sql);
	if (!$resultID) {
		echo mysql_error() . "<br>";
		forumerror(0034);
	}
	return mysql_num_rows($resultID);
} // check_username()


/**
 * Nathan Codding, July 19/2000
 * Get a user's data, given their user ID. 
 */

function get_userdata_from_id($userid, $db) {
	
	$sql = "SELECT u.*, s.* FROM users u, users_status s WHERE s.uid = $userid AND u.uid = $userid";
	if(!$result = mysql_query($sql, $db)) {
		$userdata = array("error" => "1");
		return ($userdata);
	}
	if(!$myrow = mysql_fetch_array($result)) {
		$userdata = array("error" => "1");
		return ($userdata);
	}
	
	return($myrow);
}

function get_userdata($username, $db) {
	$sql = "SELECT * FROM users WHERE uname = '$username'";
	if(!$result = mysql_query($sql, $db))
		$userdata = array("error" => "1");
	if(!$myrow = mysql_fetch_array($result))
		$userdata = array("error" => "1");
	
	return($myrow);
}


function does_exists($id, $db, $type) {
	switch($type) {
		case 'forum':
			$sql = "SELECT forum_id FROM forums WHERE forum_id = '$id'";
		break;
		case 'topic':
			$sql = "SELECT topic_id FROM forumtopics WHERE topic_id = '$id'";
		break;
	}
	if(!$result = mysql_query($sql, $db))
		return(0);
	if(!$myrow = mysql_fetch_array($result)) 
		return(0);
	return(1);
}

function is_locked($topic, $db) {
	$sql = "SELECT topic_status FROM forumtopics WHERE topic_id = '$topic'";
	if(!$r = mysql_query($sql, $db))
		return(FALSE);
	if(!$m = mysql_fetch_array($r))
		return(FALSE);
	if($m[topic_status] == 1)
		return(TRUE);
	else
		return(FALSE);
}

function smile($message) {
	$message = str_replace(":)", "<IMG SRC=\"images/forum/icons/icon_smile.gif\">", $message);
	$message = str_replace(":-)", "<IMG SRC=\"images/forum/icons/icon_smile.gif\">", $message);
	$message = str_replace(":(", "<IMG SRC=\"images/forum/icons/icon_frown.gif\">", $message);
	$message = str_replace(":-(", "<IMG SRC=\"images/forum/icons/icon_frown.gif\">", $message);
	$message = str_replace(":-D", "<IMG SRC=\"images/forum/icons/icon_biggrin.gif\">", $message);
	$message = str_replace(":D", "<IMG SRC=\"images/forum/icons/icon_biggrin.gif\">", $message);
	$message = str_replace(";)", "<IMG SRC=\"images/forum/icons/icon_wink.gif\">", $message);
	$message = str_replace(";-)", "<IMG SRC=\"images/forum/icons/icon_wink.gif\">", $message);
	$message = str_replace(":o", "<IMG SRC=\"images/forum/icons/icon_eek.gif\">", $message);	
	$message = str_replace(":O", "<IMG SRC=\"images/forum/icons/icon_eek.gif\">", $message);	
	$message = str_replace(":-o", "<IMG SRC=\"images/forum/icons/icon_eek.gif\">", $message);	
	$message = str_replace(":-O", "<IMG SRC=\"images/forum/icons/icon_eek.gif\">", $message);	
	$message = str_replace("8)", "<IMG SRC=\"images/forum/icons/icon_cool.gif\">", $message);	
	$message = str_replace("8-)", "<IMG SRC=\"images/forum/icons/icon_cool.gif\">", $message);
	$message = str_replace(":?", "<IMG SRC=\"images/forum/icons/icon_confused.gif\">", $message);
	$message = str_replace(":-?", "<IMG SRC=\"images/forum/icons/icon_confused.gif\">", $message);
	$message = str_replace(":p", "<IMG SRC=\"images/forum/icons/icon_razz.gif\">", $message);
	$message = str_replace(":P", "<IMG SRC=\"images/forum/icons/icon_razz.gif\">", $message);
	$message = str_replace(":-p", "<IMG SRC=\"images/forum/icons/icon_razz.gif\">", $message);
	$message = str_replace(":-P", "<IMG SRC=\"images/forum/icons/icon_razz.gif\">", $message);
	$message = str_replace(":-|", "<IMG SRC=\"images/forum/icons/icon_mad.gif\">", $message);
	$message = str_replace(":|", "<IMG SRC=\"images/forum/icons/icon_mad.gif\">", $message);
	
	return($message);
}
function desmile($message) {
	$message = str_replace("<IMG SRC=\"images/forum/icons/icon_smile.gif\">", ":-)",  $message);
	$message = str_replace("<IMG SRC=\"images/forum/icons/icon_frown.gif\">", ":-(", $message);
	$message = str_replace("<IMG SRC=\"images/forum/icons/icon_biggrin.gif\">",":-D",  $message);
	$message = str_replace("<IMG SRC=\"images/forum/icons/icon_wink.gif\">", ";-)", $message);
 	$message = str_replace("<IMG SRC=\"images/forum/icons/icon_eek.gif\">", ":-o", $message);	
	$message = str_replace("<IMG SRC=\"images/forum/icons/icon_eek.gif\">", ":-O", $message);	
 	$message = str_replace("<IMG SRC=\"images/forum/icons/icon_cool.gif\">", "8-)", $message);
 	$message = str_replace("<IMG SRC=\"images/forum/icons/icon_confused.gif\">", ":-?", $message);
 	$message = str_replace("<IMG SRC=\"images/forum/icons/icon_razz.gif\">", ":-p", $message);
	$message = str_replace("<IMG SRC=\"images/forum/icons/icon_razz.gif\">", ":-P", $message);
	$message = str_replace("<IMG SRC=\"images/forum/icons/icon_mad.gif\">", ":-|", $message);
	
	return($message);
}

/**
 * bbdecode/bbencode functions:
 * Rewritten - Nathan Codding - Aug 24, 2000
 * Using Perl-Compatible regexps now. Won't kill special chars 
 * outside of a [code]...[/code] block now, and all BBCode tags
 * are implemented.
 * Note: the "i" matching switch is used, so BBCode tags are 
 * case-insensitive.
 */
function bbdecode($message) {
				
		// Undo [code]
		$message = preg_replace("#<!-- BBCode Start --><TABLE BORDER=0 ALIGN=CENTER WIDTH=85%><TR><TD><font size=-1>Code:</font><HR></TD></TR><TR><TD><FONT SIZE=-1><PRE>(.*?)</PRE></FONT></TD></TR><TR><TD><HR></TD></TR></TABLE><!-- BBCode End -->#s", "[code]\\1[/code]", $message);
				
		// Undo [quote]						
		$message = preg_replace("#<!-- BBCode Quote Start --><TABLE BORDER=0 ALIGN=CENTER WIDTH=85%><TR><TD><font size=-1>Quote:</font><HR></TD></TR><TR><TD><FONT SIZE=-1><BLOCKQUOTE>(.*?)</BLOCKQUOTE></FONT></TD></TR><TR><TD><HR></TD></TR></TABLE><!-- BBCode Quote End -->#s", "[quote]\\1[/quote]", $message);
		
		// Undo [b] and [i]
		$message = preg_replace("#<!-- BBCode Start --><B>(.*?)</B><!-- BBCode End -->#s", "[b]\\1[/b]", $message);
		$message = preg_replace("#<!-- BBCode Start --><I>(.*?)</I><!-- BBCode End -->#s", "[i]\\1[/i]", $message);
		
		// Undo [url] (both forms)
		$message = preg_replace("#<!-- BBCode Start --><A HREF=\"http://(.*?)\" TARGET=\"_blank\">(.*?)</A><!-- BBCode End -->#s", "[url=\\1]\\2[/url]", $message);
		
		// Undo [email]
		$message = preg_replace("#<!-- BBCode Start --><A HREF=\"mailto:(.*?)\">(.*?)</A><!-- BBCode End -->#s", "[email]\\1[/email]", $message);
		
		// Undo [img]
		$message = preg_replace("#<!-- BBCode Start --><IMG SRC=\"(.*?)\"><!-- BBCode End -->#s", "[img]\\1[/img]", $message);
		
		// Undo lists (unordered/ordered)
	
		// unordered list code..
		$matchCount = preg_match_all("#<!-- BBCode ulist Start --><UL>(.*?)</UL><!-- BBCode ulist End -->#s", $message, $matches);
	
		for ($i = 0; $i < $matchCount; $i++)
		{
			$currMatchTextBefore = preg_quote($matches[1][$i]);
			$currMatchTextAfter = preg_replace("#<LI>#s", "[*]", $matches[1][$i]);
		
			$message = preg_replace("#<!-- BBCode ulist Start --><UL>$currMatchTextBefore</UL><!-- BBCode ulist End -->#s", "[list]" . $currMatchTextAfter . "[/list]", $message);
		}
		
		// ordered list code..
		$matchCount = preg_match_all("#<!-- BBCode olist Start --><OL TYPE=([A1])>(.*?)</OL><!-- BBCode olist End -->#si", $message, $matches);
		
		for ($i = 0; $i < $matchCount; $i++)
		{
			$currMatchTextBefore = preg_quote($matches[2][$i]);
			$currMatchTextAfter = preg_replace("#<LI>#s", "[*]", $matches[2][$i]);
			
			$message = preg_replace("#<!-- BBCode olist Start --><OL TYPE=([A1])>$currMatchTextBefore</OL><!-- BBCode olist End -->#si", "[list=\\1]" . $currMatchTextAfter . "[/list]", $message);
		}	
		
		return($message);
}

function bbencode($message) {

	// [CODE] and [/CODE] for posting code (HTML, PHP, C etc etc) in your posts.
	$matchCount = preg_match_all("#\[code\](.*?)\[/code\]#si", $message, $matches);
	
	for ($i = 0; $i < $matchCount; $i++)
	{
		$currMatchTextBefore = preg_quote($matches[1][$i]);
		$currMatchTextAfter = htmlspecialchars($matches[1][$i]);
		$message = preg_replace("#\[code\]$currMatchTextBefore\[/code\]#si", "<!-- BBCode Start --><TABLE BORDER=0 ALIGN=CENTER WIDTH=85%><TR><TD><font size=-1>Code:</font><HR></TD></TR><TR><TD><FONT SIZE=-1><PRE>$currMatchTextAfter</PRE></FONT></TD></TR><TR><TD><HR></TD></TR></TABLE><!-- BBCode End -->", $message);
	}

	// [QUOTE] and [/QUOTE] for posting replies with quote, or just for quoting stuff.	
	$message = preg_replace("#\[quote\](.*?)\[/quote]#si", "<!-- BBCode Quote Start --><TABLE BORDER=0 ALIGN=CENTER WIDTH=85%><TR><TD><font size=-1>Quote:</font><HR></TD></TR><TR><TD><FONT SIZE=-1><BLOCKQUOTE>\\1</BLOCKQUOTE></FONT></TD></TR><TR><TD><HR></TD></TR></TABLE><!-- BBCode Quote End -->", $message);
	
	// [b] and [/b] for bolding text.
	$message = preg_replace("#\[b\](.*?)\[/b\]#si", "<!-- BBCode Start --><B>\\1</B><!-- BBCode End -->", $message);
	
	// [i] and [/i] for italicizing text.
	$message = preg_replace("#\[i\](.*?)\[/i\]#si", "<!-- BBCode Start --><I>\\1</I><!-- BBCode End -->", $message);
	
	// [url]www.phpbb.com[/url] code..
	$message = preg_replace("#\[url\](http://)?(.*?)\[/url\]#si", "<!-- BBCode Start --><A HREF=\"http://\\2\" TARGET=\"_blank\">\\2</A><!-- BBCode End -->", $message);
	
	// [url=www.phpbb.com]phpBB[/url] code..
	$message = preg_replace("#\[url=(http://)?(.*?)\](.*?)\[/url\]#si", "<!-- BBCode Start --><A HREF=\"http://\\2\" TARGET=\"_blank\">\\3</A><!-- BBCode End -->", $message);
	
	// [email]user@domain.tld[/email] code..
	$message = preg_replace("#\[email\](.*?)\[/email\]#si", "<!-- BBCode Start --><A HREF=\"mailto:\\1\">\\1</A><!-- BBCode End -->", $message);
	
	// [img]image_url_here[/img] code..
	$message = preg_replace("#\[img\](.*?)\[/img\]#si", "<!-- BBCode Start --><IMG SRC=\"\\1\"><!-- BBCode End -->", $message);
	
	// unordered list code..
	$matchCount = preg_match_all("#\[list\](.*?)\[/list\]#si", $message, $matches);
	
	for ($i = 0; $i < $matchCount; $i++)
	{
		$currMatchTextBefore = preg_quote($matches[1][$i]);
		$currMatchTextAfter = preg_replace("#\[\*\]#si", "<LI>", $matches[1][$i]);
	
		$message = preg_replace("#\[list\]$currMatchTextBefore\[/list\]#si", "<!-- BBCode ulist Start --><UL>$currMatchTextAfter</UL><!-- BBCode ulist End -->", $message);
	}
	
	// ordered list code..
	$matchCount = preg_match_all("#\[list=([a1])\](.*?)\[/list\]#si", $message, $matches);
	
	for ($i = 0; $i < $matchCount; $i++)
	{
		$currMatchTextBefore = preg_quote($matches[2][$i]);
		$currMatchTextAfter = preg_replace("#\[\*\]#si", "<LI>", $matches[2][$i]);
		
		$message = preg_replace("#\[list=([a1])\]$currMatchTextBefore\[/list\]#si", "<!-- BBCode olist Start --><OL TYPE=\\1>$currMatchTextAfter</OL><!-- BBCode olist End -->", $message);
	}
		
	return($message);
}

function get_forum_name($forum_id, $db) {
	$sql = "SELECT forum_name FROM forums WHERE forum_id = '$forum_id'";
	if(!$r = mysql_query($sql, $db))
		return("ERROR");
	if(!$m = mysql_fetch_array($r))
		return("None");
	return($m[forum_name]);
}


/**
 * Modified by Nathan Codding - July 20, 2000.
 * Made it only work on URLs and e-mail addresses preceeded by a space, in order to stop
 * mangling HTML code.
 *
 * The Following function was taken from the Scriplets area of http://www.phpwizard.net, and was written by Tobias Ratschiller.
 *   Visit phpwizard.net today, its an excellent site! 
 */

function make_clickable($text) {
	$ret = eregi_replace(" ([[:alnum:]]+)://([^[:space:]]*)([[:alnum:]#?/&=])", " <a href=\"\\1://\\2\\3\" target=\"_blank\" target=\"_new\">\\1://\\2\\3</a>", $text);
        $ret = eregi_replace(" (([a-z0-9_]|\\-|\\.)+@([^[:space:]]*)([[:alnum:]-]))", " <a href=\"mailto:\\1\" target=\"_new\">\\1</a>", $ret);
        return($ret);
}

/**
 * Nathan Codding - August 24, 2000.
 * Takes a string, and does the reverse of the PHP standard function
 * htmlspecialchars().
 */
function undo_htmlspecialchars($input) {
	$input = preg_replace("/&gt;/i", ">", $input);
	$input = preg_replace("/&lt;/i", "<", $input);
	$input = preg_replace("/&quot;/i", "\"", $input);
	$input = preg_replace("/&amp;/i", "&", $input);
	
	return $input;
}

function validate_username($username, $db) {
	$sql = "SELECT disallow_username FROM disallow WHERE disallow_username = '" . addslashes($username) . "'";
	if(!$r = mysql_query($sql, $db))
		return(0);
	if($m = mysql_fetch_array($r)) {
		if($m[disallow_username] == $username)
			return(1);
		else
			return(0);
	}
	return(0);
}

/****************************************************
CVS Log:
$Log$
Revision 1.1.1.1  2001/05/03 09:30:11  pcisar
Initial import of phpNuke web site for Firebird

Revision 1.44  2000/10/20 06:39:18  yokhannan
More Font Variables Changes!

Revision 1.43  2000/10/16 04:02:52  thefinn
ready to rock and roll

Revision 1.42  2000/10/14 06:16:14  thefinn
Access levels in, just need to do multipal moderators

Revision 1.41  2000/10/13 07:46:32  natec
Fixed broken BBcode tags for code and lists. Everything works now except nexted lists. Those aren't gonna happen any time soon.

Revision 1.40  2000/10/04 22:02:08  thefinn
Fixed stuff

Revision 1.39  2000/09/25 22:18:04  thefinn
Another disallowed username's bug

Revision 1.38  2000/09/20 20:27:24  thefinn
Fixed bug that caused registration to fail

Revision 1.37  2000/09/19 18:51:07  thefinn
Admins can now disallow usernames

Revision 1.36  2000/09/14 18:27:57  thefinn
Added CVS Log tags to frequently changed files


*****************************************************/

?>
