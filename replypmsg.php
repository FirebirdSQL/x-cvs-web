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

$forumpage = 1;

if($cancel) {
	header("Location: viewpmsg.php");
}
include('config.php');
include('functions.php');
include('mainfile.php');
include('auth.php');

if (!$user) {
	Header("Location: user.php");
} else {	
	include('header.php');
	$user = base64_decode($user);
	$userdata = explode(":", $user);
	if (!$result = check_user_pw($userdata[1],$userdata[2],$db,$system))
	$userdata = get_userdata($userdata[1], $db);

if($submit) {
	if($subject == '') {
	    forumerror(0017);
	}
	
	if($image == '') {
	    forumerror(0018);
	}
	
	if($message == '') {
	    forumerror(0019);
	}
	
	if($allow_html == 0 && isset($html)) {
		$message = htmlspecialchars($message);
	}
	if($allow_bbcode == 1 && !isset($bbcode)) {
		$message = bbencode($message);
	}
	if($sig) {
		$message .= "<BR>-----------------<BR>" . $userdata[user_sig];
	}
	$message = str_replace("\n", "<BR>", $message);
	if(!$smile) {
		$message = smile($message);
	}
	$message = make_clickable($message);
	$message = addslashes($message);
	$time = date("Y-m-d H:i");

	$res = mysql_query("select uid from users where uname='$to_user'");
	list($to_userid) = mysql_fetch_row($res);
	
	if ($to_userid == "") {
	    OpenTable();
	    echo "<center>The selected user doesn't exist in the database.<br>";
	    echo "Please check the name and try again.<br><br>";
	    echo "[ <A HREF=javascript:history.go(-1)>".translate("Go Back")."</A> ]</center>";
	    CloseTable();
	    include("footer.php");
	} else {	
	    $sql = "INSERT INTO priv_msgs (msg_image, subject, from_userid, to_userid, msg_time, msg_text) ";
	    $sql .= "VALUES ('$image', '$subject', '$userdata[uid]', '$to_userid', '$time', '$message')";
	    if(!$result = mysql_query($sql)) {
		forumerror(0020);
	    }
	    OpenTable();
	    echo "<center>".translate("Your Message has been Posted")."<br><a href=\"viewpmsg.php\">".translate("You can click here to view your private messages")."</a></center>";
	    CloseTable();
	}    
		
}

if ($delete_messages.x && $delete_messages.y) {
	for ($i=0;$i<$total_messages;$i++) {
	$sql = "DELETE FROM priv_msgs WHERE msg_id='$msg_id[$i]' AND to_userid='$userdata[uid]'";
	if(!mysql_query($sql,$db)) 
	    forumerror(0021);
	else $status =1;
	}
	if ($status) {
	    OpenTable();
	    echo "<center>".translate("Your Messages has been Delete")."<br><a href=\"viewpmsg.php\">".translate("You can click here to view your private messages")."</a></center>";
	    CloseTable();
	}    
}

if ($delete) {
	$sql = "DELETE FROM priv_msgs WHERE msg_id='$msg_id' AND to_userid='$userdata[uid]'";
	if(!mysql_query($sql,$db)) 
	    forumerror(0021);
	else echo "<center>".translate("Your Message has been Delete")."<br><a href=\"viewpmsg.php\">".translate("You can click here to view your private messages")."</a></center>";
}

if ($reply || $send) {
if ($reply) {
	$sql = "SELECT msg_image, subject, from_userid, to_userid FROM priv_msgs WHERE msg_id = $msg_id";
	$result = mysql_query($sql);
	if (!$result) {
	    forumerror(0022);
	}
	$row = mysql_fetch_array($result);
	if (!$row) {
	    forumerror(0023);
	}
	$fromuserdata = get_userdata_from_id($row[from_userid], $db);
	$touserdata = get_userdata_from_id($row[to_userid], $db);
	if ( $user && ($userdata[0] != $touserdata[uid]) ) {
	    forumerror(0024);
	}
}
?>	
	<FORM ACTION="replypmsg.php" METHOD="POST" NAME="coolsus">
	<TABLE BORDER="0" CELLPADDING="1" CELLSPACEING="0" ALIGN="CENTER" VALIGN="TOP" WIDTH="100%"><TR><TD>
	<TABLE BORDER="0" CALLPADDING="1" CELLSPACEING="1" WIDTH="100%">
	<TR BGCOLOR="<?php echo $bgcolor2?>" ALIGN="LEFT">
		<TD width=25%><FONT COLOR="<?php echo $textcolor2;?>"><b><?php echo translate("About Posting:");?></b></FONT></TD>
		<TD><FONT COLOR="<?php echo $textcolor2;?>"><?php echo translate("All registered users can post private messages.");?></FONT></TD>
	</TR>
	<TR ALIGN="LEFT">
		<TD  BGCOLOR="<?php echo $bgcolor3?>"  width=25%><b><?php echo translate("To: ")?><b></TD>
	<?php
	if ($reply) {
	    echo "<TD  BGCOLOR=\"$bgcolor1\"><INPUT CLASS=\"textbox\" TYPE=\"HIDDEN\" NAME=\"to_user\" VALUE=\"$fromuserdata[uname]\">$fromuserdata[uname]</TD>";
	} else {
	    echo "<TD  BGCOLOR=\"$bgcolor1\"><INPUT CLASS=\"textbox\" NAME=\"to_user\" SIZE=\"26\" maxlength=\"25\">";
	    echo "</td>";
	}
	?>
	</TR>
	<TR ALIGN="LEFT">
		<TD  BGCOLOR="<?php echo $bgcolor3?>"  width=25%><b><?php echo translate("Subject: ")?><b></TD>
	<?php
	if ($reply) echo "<TD  BGCOLOR=\"$bgcolor1\"><INPUT CLASS=\"textbox\" TYPE=\"TEXT\" NAME=\"subject\" VALUE=\"Re: $row[subject]\" SIZE=\"50\" MAXLENGTH=\"100\"></TD>";
	else echo "<TD  BGCOLOR=\"$bgcolor1\"><INPUT CLASS=\"textbox\" TYPE=\"TEXT\" NAME=\"subject\" SIZE=\"50\" MAXLENGTH=\"100\"></TD>";
	?>
	
	</TR>
	<TR ALIGN="LEFT" VALIGN='TOP'>
		<TD  BGCOLOR="<?php echo $bgcolor3?>"  width=25%><b><?php echo translate("Message Icon: ")?><b></TD>
		<TD  BGCOLOR="<?php echo $bgcolor1?>">
	<?php 
		$handle=opendir("images/forum/subject");
		while ($file = readdir($handle))
			{
			$filelist[] = $file;
		}
		asort($filelist);
		$a = 1;
		while (list ($key, $file) = each ($filelist))
		{
		ereg(".gif|.jpg",$file);
		if ($file == "." || $file == "..") $a=1;
		else {	
			if ($file == $row[msg_image] && $row[msg_image] != "") {
			    echo "<INPUT TYPE='radio' NAME='image' VALUE='$file' checked><IMG SRC=images/forum/subject/$file BORDER=0>&nbsp;";
			} else {
			    if ($a == 1 && $row[msg_image] == "") {
				$sel = "checked";
			    } else {
				$sel = "";
			    }
			    echo "<INPUT TYPE='radio' NAME='image' VALUE='$file' $sel><IMG SRC=images/forum/subject/$file BORDER=0>&nbsp;";
			    $a++;
			}
			}
		if ($count >= 10) { $count=1; echo "<br>"; }
		$count++;
		}
	?>
	</TD>
	</TR>

	<TR ALIGN="LEFT" VALIGN="TOP">
		<TD  BGCOLOR="<?php echo $bgcolor3?>" width=25%><b><?php echo translate("Message: ")?></b><br><br>
		<font size=-1>
		<?php
		echo "HTML : ";
		if($allow_html == 1)
			echo "On<BR>\n";
		else
			echo "Off<BR>\n";
		echo "<a href=\"bbcode_ref.php\" TARGET=\"blank\">BBCode</a> : ";
		if($allow_bbcode == 1)
			echo "On<br>\n";
		else
			echo "Off<BR>\n";
		
		if ($reply) {
		$sql = "SELECT p.msg_text, p.msg_time, u.uname FROM priv_msgs p, users u ";
		$sql .= "WHERE (p.msg_id = $msg_id) AND (p.from_userid = u.uid)";
		if($result = mysql_query($sql)) {
			$row = mysql_fetch_array($result);
			$text = desmile($row[msg_text]);
			$text = str_replace("<BR>", "\n", $text);
			$text = stripslashes($text);
			$text = bbdecode($text);
			$reply = "[quote]\nOn $row[msg_time], $row[uname] wrote:\n$text\n[/quote]";
		}
		else {
			$reply = "Error Contacting database. Please try again.\n";
		}
		}				
		?>		
		</font></TD>
		<TD  BGCOLOR="<?php echo $bgcolor1?>"><TEXTAREA CLASS='textbox' NAME="message" ROWS=10 COLS=45 WRAP="VIRTUAL"><?php if ($reply) echo $reply?></TEXTAREA><BR>
		<?php putitems(); ?>
		</TD>
	</TR>
	
	
	
	<TR ALIGN="LEFT">
		<TD  BGCOLOR="<?php echo $bgcolor3?>" width=25%><b><?php echo translate("Options: ");?></b></TD>
		<TD  BGCOLOR="<?php echo $bgcolor1?>" >
		<?php
			if($allow_html == 1) {
		?>	
				<INPUT TYPE="CHECKBOX" NAME="html"><?php echo translate("Disable HTML on this Post");?><BR>
		<?php
			}
		?>
		<?php
			if($allow_bbcode == 1) {
		?>	
				<INPUT TYPE="CHECKBOX" NAME="bbcode"><?php echo "".translate("Disable")." <a href=\"bbcode_ref.php\" target=\"_blank\"><i>BBCode</i></a> ".translate("on this Post");?><BR>
		<?php
			}
		?>

		<INPUT TYPE="CHECKBOX" NAME="smile"><?php echo "".translate("Disable")." <a href=\"bb_smilies.php\" target=\"_blank\"><i>".translate("smilies")."</i></a> ".translate("on this Post");?><BR>
		<?php
			if($allow_sig == 1) {
			    $asig = mysql_query("select attachsig from users_status where uid='$cookie[0]'");
			    list($attachsig) = mysql_fetch_row($asig);
				if ($attachsig == 1) {
				    $s = "CHECKED";
				}

		?>
				<INPUT TYPE="CHECKBOX" NAME="sig" <?php echo $s?>><?php echo translate("Show signature");?> <font size=-2>(<?php echo translate("This can be altered or added in your profile");?>)</font><BR>
		<?php
			}
		?>
		</TD>
	</TR>
	<TR>
		<TD  BGCOLOR="<?php echo $bgcolor1?>" colspan=2 ALIGN="CENTER">
		<INPUT TYPE="HIDDEN" NAME="msg_id" VALUE="<?php echo $msg_id?>">
		<INPUT TYPE="SUBMIT" NAME="submit" VALUE="Submit">&nbsp;<INPUT TYPE="RESET" VALUE="Clear">
	<?php
	if (reply) echo "&nbsp;<INPUT TYPE=\"SUBMIT\" NAME=\"cancel\" VALUE=\"".translate("Cancel Reply")."\">";
	else echo "&nbsp;<INPUT TYPE=\"SUBMIT\" NAME=\"cancel\" VALUE=\"".translate("Cancel Send")."\">";
	?>
	</TD>
	</TR>
	</TABLE></TD></TR></TABLE>
	</FORM>
	<BR>
<?php
}
}
include('footer.php');
?>
