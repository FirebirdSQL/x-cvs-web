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

function modone() {
	global $admin, $moderate;
	if(((isset($admin)) && ($moderate == 1)) || ($moderate==2)) echo "<form action=\"pollcomments.php\" method=\"post\">";
}

function modtwo($tid, $score, $reason) {
	global $admin, $user, $moderate, $reasons;
	if((((isset($admin)) && ($moderate == 1)) || ($moderate == 2)) && ($user)) {
		echo " | <select name=dkn$tid>";
		for($i=0; $i<sizeof($reasons); $i++) {
			echo "<option value=\"$score:$i\">$reasons[$i]</option>\n";
		}
		echo "</select>";
	}
}

function modthree($pollID, $mode, $order, $thold=0) {
	global $admin, $user, $moderate, $uimages;
	if((((isset($admin)) && ($moderate == 1)) || ($moderate==2)) && ($user)) echo "<center><input type=hidden name=pollID value=$pollID><input type=hidden name=mode value=$mode><input type=hidden name=order value=$order><input type=hidden name=thold value=$thold>
	<input type=hidden name=op value=moderate>
	<input type=image src=$uimages/moderate.gif border=0></form></center>";
}

function navbar($pollID, $title, $thold, $mode, $order) {
	global $user, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, $textcolor2;
	$query = mysql_query("select pollID FROM pollcomments where pollID=$pollID");
	if(!$query) $count = 0; else $count = mysql_num_rows($query);
	$result = mysql_query("select pollTitle from poll_desc where pollID=$pollID");
	list($title) = mysql_fetch_row($result);
	if(!isset($thold)) $thold=0; ?>
	<table width=99% border=0 cellspacing=1 cellpadding=2>
	<?php if($title) {
		echo "<tr><td bgcolor=\"$bgcolor2\" align=center><font size=2 color=\"$textcolor1\">\"$title\" | ";
		if($user) {
			echo "<a href=\"user.php\"><font color=\"$textcolor1\">".translate("Configure")."</font></a>";
		} else {
			echo "<a href=\"user.php\"><font color=\"$textcolor1\">".translate("Login/Create Account")."</font></a>";
		}
		if(($count==1)) {
		echo " | <B>$count</B> ".translate("comment")."</font></td></tr>";
		} else {
		echo " | <B>$count</B> ".translate("comments")."</font></td></tr>";
		}
	} ?>
	<tr><td bgcolor="<?php echo"$bgcolor4"; ?>" align="center"><font size=2>
	<form method=get action=pollcomments.php>
	<font color="<?php echo"$textcolor2"; ?>"><?php echo translate("Threshold"); ?></font> <select name=thold>
	<option value="-1" <?PHP if ($thold == -1) { echo "selected"; } ?>>-1
	<option value="0" <?PHP if ($thold == 0) { echo "selected"; } ?>>0
	<option value="1" <?PHP if ($thold == 1) { echo "selected"; } ?>>1
	<option value="2" <?PHP if ($thold == 2) { echo "selected"; } ?>>2
	<option value="3" <?PHP if ($thold == 3) { echo "selected"; } ?>>3
	<option value="4" <?PHP if ($thold == 4) { echo "selected"; } ?>>4
	<option value="5" <?PHP if ($thold == 5) { echo "selected"; } ?>>5
	</select> <select name=mode>
	<option value="nocomments" <?PHP if ($mode == 'nocomments') { echo "selected"; } ?>><?php echo translate("No Comments"); ?>
	<option value="nested" <?PHP if ($mode == 'nested') { echo "selected"; } ?>><?php echo translate("Nested"); ?>
	<option value="flat" <?PHP if ($mode == 'flat') { echo "selected"; } ?>><?php echo translate("Flat"); ?>
	<option value="thread" <?PHP if (!isset($mode) || $mode=='thread' || $mode=="") { echo "selected"; } ?>><?php echo translate("Thread"); ?>
	</select> <select name=order>
	<option value="0" <?PHP if (!$order) { echo "selected"; } ?>><?php echo translate("Oldest First"); ?>
	<option value="1" <?PHP if ($order==1) { echo "selected"; } ?>><?php echo translate("Newest First"); ?>
	<option value="2" <?PHP if ($order==2) { echo "selected"; } ?>><?php echo translate("Highest Scores First"); ?>
	</select>
	<input type=submit value=<?php echo translate("Refresh"); ?>></font>
	<input type=hidden name=pollID value=<?PHP echo "$pollID"; ?>>
	</form></td></tr>
	<tr><td bgcolor="<?php echo"$bgcolor2"; ?>" align=center><font size=1 color="#FFFFFF"><?php echo translate("The comments are owned by the poster. We aren't responsible for their content."); ?></td></tr>
	</table><BR>
<?php
}

function DisplayKids ($tid, $mode, $order=0, $thold=0, $level=0, $dummy=0, $tblwidth=99) {
	global $datetime, $user, $cookie, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $reasons, $anonymous, $anonpost, $commentlimit, $textcolor2;
	$comments = 0;
	cookiedecode($user);
	$result = mysql_query("select tid, pid, pollID, date, name, email, url, host_name, subject, comment, score, reason from pollcomments where pid = $tid order by date, tid");
	if ($mode == 'nested') {
		/* without the tblwidth variable, the tables run of the screen with netscape
		   in nested mode in long threads so the text can't be read. */
		while (list($r_tid, $r_pid, $r_pollID, $r_date, $r_name, $r_email, $r_url, $r_host_name, $r_subject, $r_comment, $r_score, $r_reason) = mysql_fetch_row($result)) {
			if($r_score >= $thold) {
				if (!isset($level)) {
				} else {
					if (!$comments) {
						echo "<ul>";
						$tblwidth -= 5;
					}
				}
				$comments++;
				if (!eregi("[a-z0-9]",$r_name)) $r_name = $anonymous;
				if (!eregi("[a-z0-9]",$r_subject)) $r_subject = "[".translate("No Subject")."]";
			// enter hex color between first two appostrophe for second alt bgcolor
				$r_bgcolor = ($dummy%2)?"":"#E6E6D2";
				echo "<a name=\"$r_tid\">";
				echo "<table width=90% border=0 cellspacing=1 cellpadding=3><tr bgcolor=\"$bgcolor4\"><td>";
				formatTimestamp($r_date);
				if ($r_email) {
					echo "<p><b>$r_subject</b> <font size=2>";
					if(!$cookie[7]) {
						echo "(".translate("Score: ")."$r_score";
						if($r_reason>0) echo ", $reasons[$r_reason]";
						echo ")";
					}
					echo "<br>".translate("by")." <a href=\"mailto:$r_email\">$r_name</a> <font size=2><b>($r_email)</b></font> ".translate("on")." $datetime";
				} else {
					echo "<p><b>$r_subject</b> <font size=2>";
					if(!$cookie[7]) {
						echo "(".translate("Score: ")."$r_score";
						if($r_reason>0) echo ", $reasons[$r_reason]";
						echo ")";
					}
					echo "<br>".translate("by")." $r_name ".translate("on")." $datetime";
				}			
				if ($r_name != $anonymous) { echo "<BR>(<a href=\"user.php?op=userinfo&uname=$r_name\">".translate("User Info")."</a>) "; }
				if (eregi("http://",$r_url)) { echo "<a href=\"$r_url\" target=\"window\">$r_url</a> "; }
				echo "</font></td></tr><tr bgcolor=$bgcolor3><td>";
				if(($cookie[10]) && (strlen($r_comment) > $cookie[10])) echo substr("$r_comment", 0, $cookie[10])."<br><br><b><a href=\"pollcomments.php?pollID=$r_pollID&tid=$r_tid&mode=$mode&order=$order&thold=$thold\">".translate("Read the rest of this comment...")."</a></b>";
				elseif(strlen($r_comment) > $commentlimit) echo substr("$r_comment", 0, $commentlimit)."<br><br><b><a href=\"pollcomments.php?pollID=$r_pollID&tid=$r_tid&mode=$mode&order=$order&thold=$thold\">".translate("Read the rest of this comment...")."</a></b>";
				else echo $r_comment;
				echo "</td></tr></table><br><p>";
				if ($anonpost==1 OR $admin OR $user) {
				    echo "<font size=2 color=\"$textcolor2\"> [ <a href=\"pollcomments.php?op=Reply&pid=$r_tid&pollID=$r_pollID&mode=$mode&order=$order&thold=$thold\">".translate("Reply")."</a>";
				}
				modtwo($r_tid, $r_score, $r_reason);
				echo " ]</font><p>";
				DisplayKids($r_tid, $mode, $order, $thold, $level+1, $dummy+1, $tblwidth);
			}
		}
	} elseif ($mode == 'flat') {
		while (list($r_tid, $r_pid, $r_pollID, $r_date, $r_name, $r_email, $r_url, $r_host_name, $r_subject, $r_comment, $r_score, $r_reason) = mysql_fetch_row($result)) {
			if($r_score >= $thold) {
				if (!eregi("[a-z0-9]",$r_name)) $r_name = $anonymous;
				if (!eregi("[a-z0-9]",$r_subject)) $r_subject = "[".translate("No Subject")."]";
				echo "<a name=\"$r_tid\">";
				echo "<hr><table width=99% border=0 cellspacing=1 cellpadding=3><tr bgcolor=\"$bgcolor4\"><td>";
				formatTimestamp($r_date);
				if ($r_email) {
					echo "<p><b>$r_subject</b> <font size=2>";
					if(!$cookie[7]) {
						echo "(".translate("Score: ")."$r_score";
						if($r_reason>0) echo ", $reasons[$r_reason]";
						echo ")";
					}
					echo "<br>".translate("by")." <a href=\"mailto:$r_email\">$r_name</a> <font size=2><b>($r_email)</b></font> ".translate("on")." $datetime";
 				} else {
					echo "<p><b>$r_subject</b> <font size=2>";
					if(!$cookie[7]) {
						echo "(".translate("Score: ")."$r_score";
						if($r_reason>0) echo ", $reasons[$r_reason]";
						echo ")";
					}
					echo "<br>".translate("by")." $r_name ".translate("on")." $datetime";
				}			
				if ($r_name != $anonymous) { echo "<BR>(<a href=\"user.php?op=userinfo&uname=$r_name\">".translate("User Info")."</a>) "; }
				if (eregi("http://",$r_url)) { echo "<a href=\"$r_url\" target=\"window\">$r_url</a> "; }
				echo "</font></td></tr><tr bgcolor=$bgcolor3><td>";
				if(($cookie[10]) && (strlen($r_comment) > $cookie[10])) echo substr("$r_comment", 0, $cookie[10])."<br><br><b><a href=\"pollcomments.php?pollID=$r_pollID&tid=$r_tid&mode=$mode&order=$order&thold=$thold\">".translate("Read the rest of this comment...")."</a></b>";
				elseif(strlen($r_comment) > $commentlimit) echo substr("$r_comment", 0, $commentlimit)."<br><br><b><a href=\"pollcomments.php?pollID=$r_pollID&tid=$r_tid&mode=$mode&order=$order&thold=$thold\">".translate("Read the rest of this comment...")."</a></b>";
				else echo $r_comment;
				echo "</td></tr></table><br><p><font size=2 color=\"$textcolor2\"> [ <a href=\"pollcomments.php?op=Reply&pid=$r_tid&pollID=$r_pollID&mode=$mode&order=$order&thold=$thold\">".translate("Reply")."</a>";
				modtwo($r_tid, $r_score, $r_reason);
				echo " ]</font><p>";
				DisplayKids($r_tid, $mode, $order, $thold);
			}
		}
	} else {
		while (list($r_tid, $r_pid, $r_pollID, $r_date, $r_name, $r_email, $r_url, $r_host_name, $r_subject, $r_comment, $r_score, $r_reason) = mysql_fetch_row($result)) {
			if($r_score >= $thold) {
				if (!isset($level)) {
				} else {
					if (!$comments) {
						echo "<ul>";
					}
				}
				$comments++;
				if (!eregi("[a-z0-9]",$r_name)) $r_name = $anonymous;
				if (!eregi("[a-z0-9]",$r_subject)) $r_subject = "[".translate("No Subject")."]";
				formatTimestamp($r_date);
				echo "<li><a href=\"pollcomments.php?op=showreply&tid=$r_tid&pollID=$r_pollID&pid=$r_pid&mode=$mode&order=$order&thold=$thold#$r_tid\">$r_subject</a> ".translate("by")." $r_name <font size=2>".translate("on")." $datetime</font><br>";

				DisplayKids($r_tid, $mode, $order, $thold, $level+1, $dummy+1);
			} 
		}
	}
	if ($level && $comments) {
		echo "</ul>";
	}

}

function DisplayBabies ($tid, $level=0, $dummy=0) {
	global $datetime, $anonymous;
	$comments = 0;
	$result = mysql_query("select tid, pid, pollID, date, name, email, url, host_name, subject, comment, score, reason from pollcomments where pid = $tid order by date, tid");
	while (list($r_tid, $r_pid, $r_pollID, $r_date, $r_name, $r_email, $r_url, $r_host_name, $r_subject, $r_comment, $r_score, $r_reason) = mysql_fetch_row($result))
	{
		if (!isset($level)) {
		} else {
			if (!$comments) {
				echo "<ul>";
			}
		}
		$comments++;
		if (!eregi("[a-z0-9]",$r_name)) { $r_name = $anonymous; }
		if (!eregi("[a-z0-9]",$r_subject)) { $r_subject = "[".translate("No Subject")."]"; }

		formatTimestamp($r_date);
		echo "<a href=\"pollcomments.php?op=showreply&tid=$r_tid&mode=$mode&order=$order&thold=$thold\">$r_subject</a> ".translate("by")." $r_name <font size=2>".translate("on")." $datetime</font><br>";
		DisplayBabies($r_tid, $level+1, $dummy+1);
	} 
	if ($level && $comments) {
		echo "</ul>";
	}
}

function DisplayTopic ($pollID, $pid=0, $tid=0, $mode="thread", $order=0, $thold=0, $level=0, $nokids=0) {
	global $hr, $user, $datetime, $cookie, $mainfile, $admin, $commentlimit, $anonymous, $reasons, $anonpost, $foot1, $foot2, $foot3, $foot4;
	if($mainfile) {
		global $title, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor2;
	} else {
		global $title, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor2;
		include("mainfile.php");
		include("header.php");
	}
	$count_times = 0;
	cookiedecode($user);
	$q = "select tid, pid, pollID, date, name, email, url, host_name, subject, comment, score, reason from pollcomments where pollID=$pollID and pid=$pid";
	if($thold != "") {
		$q .= " and score>=$thold";
	} else {
		$q .= " and score>=0";
	}
	if ($order==1) $q .= " order by date desc";
	if ($order==2) $q .= " order by score desc";
	$something = mysql_query("$q");
	$num_tid = mysql_num_rows($something);
	navbar($pollID, $title, $thold, $mode, $order);
	modone();
	while ($count_times < $num_tid) {
		list($tid, $pid, $pollID, $date, $name, $email, $url, $host_name, $subject, $comment, $score, $reason) = mysql_fetch_row($something);
		if ($name == "") { $name = $anonymous; }
		if ($subject == "") { $subject = "[".translate("No Subject")."]"; }	

		echo "<a name=\"$tid\">";
		echo "<table width=99% border=0 cellspacing=1 cellpadding=3><tr bgcolor=\"$bgcolor4\"><td width=500>";
		formatTimestamp($date);
		if ($email) {
			echo "<p><b>$subject</b> <font size=2>";
			if(!$cookie[7]) {
				echo "(".translate("Score: ")."$score";
				if($reason>0) echo ", $reasons[$reason]";
				echo ")";
			}
			echo "<br>".translate("by")." <a href=\"mailto:$email\">$name</a> <b>($email)</b> ".translate("on")." $datetime"; 
		} else {
			echo "<p><b>$subject</b> <font size=2>";
			if(!$cookie[7]) {
				echo "(".translate("Score: ")."$score";
				if($reason>0) echo ", $reasons[$reason]";
				echo ")";
			}
			echo "<br>".translate("by")." $name ".translate("on")." $datetime";
		}			
		
    // If you are admin you can see the Poster IP address (you have this right, no?)
    // with this you can see who is flaming you... ha-ha-ha
		
		if ($name != $anonymous) { echo "<br>(<a href=\"user.php?op=userinfo&uname=$name\">".translate("User Info")."</a>) "; }
		if (eregi("http://",$url)) { echo "<a href=\"$url\" target=\"window\">$url</a> "; }
		
		if($admin) {
		    $result= mysql_query("select host_name from pollcomments where tid='$tid'");
		    list($host_name) = mysql_fetch_row($result);
		    echo "<br><b>(IP: $host_name)</b>";
		}
		
		echo "</font></td></tr><tr bgcolor=$bgcolor3><td>";
		if(($cookie[10]) && (strlen($comment) > $cookie[10])) echo substr("$comment", 0, $cookie[10])."<br><br><b><a href=\"pollcomments.php?pollID=$pollID&tid=$tid&mode=$mode&order=$order&thold=$thold\">".translate("Read the rest of this comment...")."</a></b>";
		elseif(strlen($comment) > $commentlimit) echo substr("$comment", 0, $commentlimit)."<br><br><b><a href=\"pollcomments.php?pollID=$pollID&tid=$tid&mode=$mode&order=$order&thold=$thold\">".translate("Read the rest of this comment...")."</a></b>";
		else echo $comment;
		echo "</td></tr></table><br><p>";
		if ($anonpost==1 OR $admin OR $user) {
		    echo "<font size=2 color=000000> [ <a href=\"pollcomments.php?op=Reply&pid=$tid&pollID=$pollID&mode=$mode&order=$order&thold=$thold\">".translate("Reply")."</a>";
		} else {
		    echo "[ No Comments Allowed for Anonymous, please <a href=\"user.php\">register</a> ";
		}
		if ($pid != 0) {
			list($erin) = mysql_fetch_row(mysql_query("select pid from pollcomments where tid=$pid"));
			echo "| <a href=\"pollcomments.php?pollID=$pollID&pid=$erin&mode=$mode&order=$order&thold=$thold\">".translate("Parent")."</a>";
		}
		modtwo($tid, $score, $reason);
		
		if($admin) {
		echo " | <a href=\"admin.php?op=RemovePollComment&tid=$tid&pollID=$pollID\">".translate("Delete")."</a> ]</font><p>";
		} else {
		    echo " ]</font><p>";
		}
		
		DisplayKids($tid, $mode, $order, $thold, $level);
		echo "</ul>";
		if($hr) echo "<hr noshade size=1>";
		echo "</p>";
		$count_times += 1;
	}
	modthree($pollID, $mode, $order, $thold);
	if($pid==0) return array($pollID, $pid, $subject);
	else include("footer.php");
}

function singlecomment($tid, $pollID, $mode, $order, $thold) {
	include("mainfile.php");
	include("header.php");
	global $user, $cookie, $datetime, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $anonpost, $admin, $anonymous, $textcolor2;
	$deekayen = mysql_query("select date, name, email, url, subject, comment, score, reason from pollcomments where tid=$tid and pollID=$pollID");
	list($date, $name, $email, $url, $subject, $comment, $score, $reason) = mysql_fetch_row($deekayen);
	$titlebar = "<b>$subject</b>";
	if($name == "") $name = $anonymous;
	if($subject == "") $subject = "[".translate("No Subject")."]";
	modone();
	echo "<table width=99% border=0 cellspacing=1 cellpadding=3><tr bgcolor=\"$bgcolor4\"><td width=500>";
	formatTimestamp($date);
	if($email) echo "<p><b>$subject</b> <font size=2>(".translate("Score: ")."$score)<br>".translate("by")." <a href=\"mailto:$email\"><font color=\"$textcolor2\">$name</font></a> <font size=2><b>($email)</b></font> ".translate("on")." $datetime";
	else echo "<p><b>$subject</b> <font size=2>(".translate("Score: ")."$score)<br>".translate("by")." $name ".translate("on")." $datetime";
	echo "</td></tr><tr><td>$comment</td></tr></table><br><p><font size=2 color=\"$textcolor2\"> [ <a href=\"pollcomments.php?op=Reply&pid=$tid&pollID=$pollID&mode=$mode&order=$order&thold=$thold\">".translate("Reply")."</a> | <a href=\"pollBooth.php?pollID=$pollID\">Root</a>";
	modtwo($tid, $score, $reason);
	echo " ]";
	modthree($pollID, $mode, $order, $thold);
	include("footer.php");
}

function reply ($pid, $pollID, $mode, $order, $thold) {
	include("mainfile.php");
	include("header.php");
	global $user, $cookie, $datetime, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $anonymous, $textcolor2;
	if($pid!=0) {
		list($date, $name, $email, $url, $subject, $comment, $score) = mysql_fetch_row(mysql_query("select date, name, email, url, subject, comment, score from pollcomments where tid=$pid"));
	} else {
		list($subject) = mysql_fetch_row(mysql_query("select pollTitle FROM poll_desc where pollID=$pollID"));
	}
	if($comment == "") $comment = $temp_comment;
	$titlebar = "<b>$subject</b>";
	if($name == "") $name = $anonymous;
	if($subject == "") $subject = "[".translate("No Subject")."]";
	echo "<table width=99% border=0 cellspacing=1 cellpadding=3><tr bgcolor=\"$bgcolor4\"><td width=500>";
	formatTimestamp($date);
	echo "<p><b>$subject</b> <font size=2>";
	echo "</td></tr><tr bgcolor=\"$bgcolor3\"><td>$temp_comment $comment $notes</td></tr></table><hr>";

	if(!isset($pid) || !isset($pollID)) { echo "Something is not right. This message is just to keep things from messing up down the road"; exit(); }
	if($pid == 0) {
		list($subject) = mysql_fetch_row(mysql_query("select pollTitle from poll_desc where pollID=$pollID"));
	} else {
		list($subject) = mysql_fetch_row(mysql_query("select subject from pollcomments where tid=$pid"));
	}

	echo "<form action=\"pollcomments.php\" method=post>";
	echo "<P><FONT color=\"$textcolor2\"><B>".translate("Your Name")."</B></FONT> ";
	if ($user) {
		cookiedecode($user);
		echo "<a href=\"user.php\">$cookie[1]</a> <font size=2>[ <a href=\"user.php?op=logout\">".translate("Logout")."</a> ]</font>";
	} else {
		echo "$anonymous"; $xanonpost=1;
	}
	echo "<P><FONT color=\"$textcolor2\"><B>".translate("Subject")."</B></FONT><BR>";
	if (!eregi("Re:",$subject)) $subject = "Re: $subject";
	echo "<INPUT TYPE=\"text\" NAME=\"subject\" SIZE=50 maxlength=60 value=\"$subject\"><BR>";
	echo "<P><FONT color=\"$textcolor2\"><B>".translate("Comment")."</B></FONT><BR>"
		."<TEXTAREA wrap=virtual cols=50 rows=10 name=comment></TEXTAREA><br>
		<font size=2>".translate("Allowed HTML:")."<br>";
		while (list($key,)= each($AllowableHTML)) echo " &lt;".$key."&gt;";
		echo "<br>";
	if ($user) { echo "<INPUT type=checkbox name=xanonpost> ".translate("Post Anonymously")."<br>"; }
	echo "<INPUT type=\"hidden\" name=\"pid\" value=\"$pid\">"
		."<INPUT type=\"hidden\" name=\"pollID\" value=\"$pollID\"><INPUT type=\"hidden\" name=\"mode\" value=\"$mode\">"
		."<INPUT type=\"hidden\" name=\"order\" value=\"$order\"><INPUT type=\"hidden\" name=\"thold\" value=\"$thold\">"
		."<INPUT type=submit name=op value=\"Preview\">"
		."<INPUT type=submit name=op value=\"Ok!\"> <SELECT name=\"posttype\"><OPTION value=\"exttrans\">".translate("Extrans (html tags to text)")."<OPTION value=\"html\" >".translate("HTML Formatted")."<OPTION value=\"plaintext\" SELECTED>".translate("Plain Old Text")."</SELECT></FORM><br>";
		
	include("footer.php");
}

function replyPreview ($pid, $pollID, $subject, $comment, $xanonpost, $mode, $order, $thold, $posttype) {
	include("mainfile.php");
	include("header.php");
	global $user, $cookie, $anonymous, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor2;
	cookiedecode($user);
	$subject = stripslashes($subject);
	$comment = stripslashes($comment);
	if (!isset($pid) || !isset($pollID)) { echo "Something is not right with passing a variable to this function. This message is just to keep things from messing up down the road"; exit(); }

	echo "<table width=99% border=0  cellspacing=1 cellpadding=3><tr><td>";
	echo "<p><b>$subject</b>";
	echo "<br><font size=2>".translate("by")." ";
	if ($user) echo "$cookie[1]";
	else echo "$anonymous";
	echo "".translate(" on...")."</font></td></tr><tr bgcolor=\"$bgcolor3\"><td>";
	if($posttype=="exttrans") echo nl2br(htmlspecialchars($comment));
	elseif($posttype=="plaintext") echo nl2br($comment);
	else echo $comment;
	echo "</td></tr></table><br>";

	echo "<hr>";

	echo "<form action=\"pollcomments.php\" method=post><P><FONT color=\"$textcolor2\"><B>".translate("Your Name")."</B></FONT> ";
	if ($user) echo "<a href=\"user.php\">$cookie[1]</a> <font size=2>[ <a href=\"user.php?op=logout\">".translate("Logout")."</a> ]</font>";
	else echo "$anonymous";
	echo "<P><FONT color=\"$textcolor2\"><B>".translate("Subject")."</B></FONT><BR>"
		."<INPUT TYPE=\"text\" NAME=\"subject\" SIZE=50 maxlength=60 value=\"$subject\"><br>"
		."<P><FONT color=\"$textcolor2\"><B>".translate("Comment")."</B></FONT><BR>"
		."<TEXTAREA wrap=virtual cols=50 rows=10 name=comment>$comment</TEXTAREA><br>";
		echo"<font size=2>".translate("Allowed HTML:")."<br>";
		while (list($key,)= each($AllowableHTML)) echo " &lt;".$key."&gt;";
		echo "<br>";		
	if ($xanonpost) { echo "<INPUT type=checkbox name=xanonpost checked> ".translate("Post Anonymously")."<br>"; } elseif($user) { echo "<INPUT type=checkbox name=xanonpost> ".translate("Post Anonymously")."<br>"; }
	echo "<INPUT type=\"hidden\" name=\"pid\" value=\"$pid\">"
		."<INPUT type=\"hidden\" name=\"pollID\" value=\"$pollID\"><INPUT type=\"hidden\" name=\"mode\" value=\"$mode\">"
		."<INPUT type=\"hidden\" name=\"order\" value=\"$order\"><INPUT type=\"hidden\" name=\"thold\" value=\"$thold\">"
		."<INPUT type=submit name=op value=\"Preview\">"
		."<INPUT type=submit name=op value=\"Ok!\"> <SELECT name=\"posttype\"><OPTION value=\"exttrans\"";
		if($posttype=="exttrans") echo" SELECTED";
		echo  ">".translate("Extrans (html tags to text)")."<OPTION value=\"html\"";;
		if($posttype=="html") echo" SELECTED";
		echo ">".translate("HTML Formatted")."<OPTION value=\"plaintext\"";
		if(($posttype!="exttrans") && ($posttype!="html")) echo" SELECTED";
		echo ">".translate("Plain Old Text")."</SELECT></FORM><br>";

	include("footer.php");
}

function CreateTopic ($xanonpost, $subject, $comment, $pid, $pollID, $host_name, $mode, $order, $thold, $posttype) {
	global $user, $userinfo, $EditedMessage, $cookie;
	include("mainfile.php");
	$author = FixQuotes($author);
	$subject = FixQuotes(filter_text($subject, "nohtml"));
	if($posttype=="exttrans")
		$comment = FixQuotes(nl2br(htmlspecialchars(check_words($comment))));
	elseif($posttype=="plaintext")
		$comment = FixQuotes(nl2br(filter_text($comment)));
	else
		$comment = FixQuotes(filter_text($comment));
	if($user) getusrinfo($user);
	if (($user) && (!$xanonpost)) {
		getusrinfo($user);
		$name = $userinfo[uname];
		$email = $userinfo[femail];
		$url = $userinfo[url];
		$score = 1;
	} else {
		$name = ""; $email = ""; $url = "";
		$score = 0;
	}
	$ip = getenv("REMOTE_HOST");
	if (empty($ip)) {
	    $ip = getenv("REMOTE_ADDR");
	}
//begin fake thread control
	list($fake) = mysql_fetch_row(mysql_query("select count(*) from poll_desc where pollID=$pollID"));
	mysql_query("LOCK TABLES pollcomments WRITE");
//begin duplicate control
	list($tia) = mysql_fetch_row(mysql_query("select count(*) from pollcomments where pid='$pid' and pollID='$pollID' and subject='$subject' and comment='$comment'"));
//begin troll control
	if($user) {
		list($troll) = mysql_fetch_row(mysql_query("select count(*) from pollcomments where (score=-1) and (name='$userinfo[uname]') and (to_days(now()) - to_days(date) < 3)"));
	} elseif(!$score) {
		list($troll) = mysql_fetch_row(mysql_query("select count(*) from pollcomments where (score=-1) and (host_name='$ip') and (to_days(now()) - to_days(date) < 3)"));
	}
	if((!$tia) && ($fake == 1) && ($troll < 6)) {
		mysql_query("insert into pollcomments values (NULL, '$pid', '$pollID', now(), '$name', '$email', '$url', '$ip', '$subject', '$comment', '$score', '0')");
	} else {
		mysql_query("UNLOCK TABLES");
		include("header.php");
		if($tia) echo "Duplicate.  Did you submit twice?<br><br><a href=\"pollBooth.php?op=results&pollID=$pollID\">Back to Poll</a>";
		elseif($troll > 5) echo "This account or IP has been temporarily disabled.
				This means that either this IP, or
				user account has been moderated down more than 5 times in
				the last few hours.  If you think this is unfair,
				you should contact the admin.  If you
				are being a troll, now is the time for you to either
				grow up, or change your IP.<br><br><a href=\"pollBooth.php?pollID=$pollID\">Back to Poll</a>";
		elseif($fake == 0) echo "According to my records, the topic you are trying 
				to reply to does not exist. If you're just trying to be 
				annoying, well then too bad.";
		include("footer.php");
		exit;
	}
	mysql_query("UNLOCK TABLES");
	Header("Location: pollBooth.php?op=results&pollID=$pollID");
}

switch($op) {

	case "Reply":
		reply($pid, $pollID, $mode, $order, $thold);
		break;

	case "Preview":
		replyPreview ($pid, $pollID, $subject, $comment, $xanonpost, $mode, $order, $thold, $posttype);
		break;

	case "Ok!":
		CreateTopic($xanonpost, $subject, $comment, $pid, $pollID, $host_name, $mode, $order, $thold, $posttype);
		break;

	case "moderate":
		if(isset($admin)) {
			include("auth.inc.php");
		} else {
			include("mainfile.php");	
		}
		if(($admintest==1) || ($moderate==2)) {
			while(list($tdw, $emp) = each($HTTP_POST_VARS)) {
				if (eregi("dkn",$tdw)) {
					$emp = explode(":", $emp);
					if($emp[1] != 0) {
						$tdw = ereg_replace("dkn", "", $tdw);
						$q = "UPDATE pollcomments SET";
						if(($emp[1] == 9) && ($emp[0]>=0)) { # Overrated
							$q .= " score=score-1 where tid=$tdw";
						} elseif (($emp[1] == 10) && ($emp[0]<=4)) { # Underrated
							$q .= " score=score+1 where tid=$tdw";
						} elseif (($emp[1] > 4) && ($emp[0]<=4)) {
							$q .= " score=score+1, reason=$emp[1] where tid=$tdw";
						} elseif (($emp[1] < 5) && ($emp[0] > -1)) {
							$q .= " score=score-1, reason=$emp[1] where tid=$tdw";
						} elseif (($emp[0] == -1) || ($emp[0] == 5)) {
							$q .= " reason=$emp[1] where tid=$tdw";
						}
						if(strlen($q) > 20) mysql_query("$q");
					}
				}
			}
		}
		Header("Location: pollBooth.php?op=results&pollID=$pollID");
		break;

	case "showreply":
		DisplayTopic($pollID, $pid, $tid, $mode, $order, $thold);
		break;

	default:
		if ((isset($tid)) && (!isset($pid))) {
			singlecomment($tid, $pollID, $mode, $order, $thold);
		} elseif (($mainfile) xor (($pid==0) || (!isset($pid)))) {
			Header("Location: pollBooth.php?op=results&pollID=$pollID&mode=$mode&order=$order&thold=$thold");
		} else {
			if(!isset($pid)) $pid=0;
			DisplayTopic($pollID, $pid, $tid, $mode, $order, $thold);
		}
		break;
}

?>
