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
		
	$sql = "SELECT * FROM priv_msgs WHERE to_userid = '$userdata[uid]' LIMIT $start,1";
	$resultID = mysql_query($sql, $db);
	if (!$resultID) {
		echo mysql_error() . "<br>";
		    forumerror(0005);
	}
	else {
	$myrow = mysql_fetch_array($resultID);
	$sql = "UPDATE priv_msgs SET read_msg='1' WHERE msg_id='$myrow[msg_id]'";
	$result = mysql_query($sql, $db);
		if (!$result) {
		echo mysql_error() . "<br>";
		    forumerror(0005);
		}
	}

?>

<FONT SIZE=1><b><?php echo translate("Private Message");?></b><br><a href="viewpmsg.php">Index</a>&nbsp;<b>» »</b>&nbsp;<?php echo $myrow[subject]?></FONT>
<TABLE BORDER="0" CELLPADDING="1" CELLPADDING="0" VALIGN="TOP" WIDTH="100%"><TR><TD>
<TABLE BORDER="0" CELLPADDING="3" CELLPADDING="1" WIDTH="100%">
<TR BGCOLOR="<?php echo $bgcolor2?>" ALIGN="LEFT">
	<TD WIDTH=20% COLSPAN=2 ALIGN=CENTER><FONT SIZE=1 COLOR="<?php echo $textcolor2?>"><B><?php echo translate("From") ?></B></FONT></TD>
</TR>

<?php
	if (!mysql_num_rows($resultID)) {
		echo "<TD BGCOLOR=\"$bgcolor3\" colspan = 2 ALIGN=CENTER>".translate("You don't have any Messages")."</TD></TR>\n";
	}
	else {
		echo "<TR BGCOLOR=\"$bgcolor3\" ALIGN=\"LEFT\">\n";
		$posterdata = get_userdata_from_id($myrow[from_userid], $db);
		echo "<TD valign=top><b>$posterdata[uname]</b><br>\n";
		$posts = $posterdata[posts];
		if($posts < 15)
			echo "<font size=-2>$rank1<BR>\n";
		else
			echo "<font size=-2>$rank2<br>\n";
		echo "<br><font size=-2>Posts: $posts<br>\n";
		echo "From: $posterdata[user_from]<br></FONT><br>\n";
		if ($posterdata[user_avatar] != '')
			echo "<img src='images/forum/avatar/$posterdata[user_avatar]' Alt=\"\">\n";
		echo "</TD><TD><img src=\"images/forum/subject/$myrow[msg_image]\" Alt=\"\">&nbsp;<font size=-1>Sent: $myrow[msg_time]&nbsp;&nbsp;&nbsp";
		echo "<HR></font><b>$myrow[subject]</b><br><br>\n";
		$message = stripslashes($myrow[msg_text]);
		$message = eregi_replace("\[addsig]", "<BR>-----------------<BR>" . bbencode($posterdata[user_sig]), $message);
		echo $message . "<BR><BR>";
		echo "<HR>\n";
		echo "&nbsp;&nbsp<a href=\"user.php?op=userinfo&uname=$posterdata[uname]\"><img src=\"images/forum/icons/profile.gif\" border=0 Alt=\"\"></a><FONT SIZE=1>".translate("Profile")."</FONT>\n";
		if($posterdata["femail"] != 0) 
			echo "&nbsp;&nbsp;<a href=\"mailto:$posterdata[femail]\"><IMG SRC=\"images/forum/icons/email.gif\" BORDER=0 Alt=\"\"></a><FONT SIZE=1>".translate("Email")."</FONT>\n";
		if($posterdata["url"] != '') {
			if(strstr("http://", $posterdata["url"]))
				$posterdata["url"] = "http://" . $posterdata["url"];
			echo "&nbsp;&nbsp;<a href=\"$posterdata[url]\" TARGET=\"_blank\"><IMG SRC=\"images/forum/icons/www_icon.gif\" BORDER=0 Alt=\"\"></a><FONT SIZE=1>www</FONT>\n";
		}
		if($posterdata["user_icq"] != '')
			echo "&nbsp;&nbsp;<a href=\"http://wwp.mirabilis.com/$posterdata[icq]\" TARGET=\"_blank\"><IMG SRC=\"http://wwp.icq.com/scripts/online.dll?icq=$posterdata[user_icq]&img=5\" BORDER=0\" Alt=\"\"></a>";
	
		if($posterdata["user_aim"] != '')
     			echo "&nbsp;<a href=\"aim:goim?screenname=$posterdata[user_aim]&message=Hi+$posterdata[user_aim].+Are+you+there?\"><img src=\"images/forum/icons/aim.gif\" border=\"0\" Alt=\"\"></a><FONT SIZE=1>aim</FONT>";
   
   		if($posterdata["user_yim"] != '')
     			echo "&nbsp;<a href=\"http://edit.yahoo.com/config/send_webmesg?.target=$posterdata[user_yim]&.src=pg\"><img src=\"images/forum/icons/yim.gif\" border=\"0\" Alt=\"\"></a>";
   
   		if($posterdata["user_msnm"] != '')
     			echo "&nbsp;<a href=\"bb_profile.php?userid=$posterdata[uid]\"><img src=\"images/forum/icons/msnm.gif\" border=\"0\" Alt=\"\"></a>";
			
		echo "</TD></TR>";
		echo "<TR BGCOLOR=\"$bgcolor1\" ALIGN=\"RIGHT\"><TD WIDTH=20% COLSPAN=2 ALIGN=RIGHT><FONT COLOR=\"$textcolor2\" SIZE=1>";
		
		$previous = $start-1;
		$next = $start+1;
		
		if ($previous >= 0) echo "<a href='readpmsg.php?start=$previous&total_messages=$total_messages'>".translate("Previous Messages")."</a> | ";
		else echo "".translate("Previous Messages")." | ";
		if ($next < $total_messages) echo "<a href='readpmsg.php?start=$next&total_messages=$total_messages'>".translate("Next Messages")."</a></FONT>";
		else echo "".translate("Next Messages")."</FONT>";
		
		echo "</TD></TR>";
		echo "<TR BGCOLOR=\"$bgcolor2\" ALIGN=\"LEFT\"><TD WIDTH=20% COLSPAN=2 ALIGN=LEFT>";
		echo "<FONT COLOR=\"$textcolor2\">";
		echo "<a href='replypmsg.php?reply=1&msg_id=$myrow[msg_id]'><img src='images/forum/icons/reply.gif' border=0 Alt=\"\"></a>\n";
		echo "&nbsp;<a href='replypmsg.php?delete=1&msg_id=$myrow[msg_id]'><img src='images/forum/icons/delete.gif' border=0 Alt=\"\"></a>\n";
	}
?>

</FONT></TD>
</TR>
</TABLE></TD></TR></TABLE>
<TABLE ALIGN="CENTER" BORDER="0" WIDTH="95%">

<TR>
	<TD>
	</TD>
<TD ALIGN="RIGHT">
<FORM ACTION="viewforum.php" METHOD="GET">
Jump To: <SELECT NAME="forum">
<?php
	$sql = "SELECT forum_id, forum_name FROM forums ORDER BY forum_id";
	if($result = mysql_query($sql, $db)) {
		if($myrow = mysql_fetch_array($result)) {
			do {
				$name = stripslashes($myrow[forum_name]);
				echo "<OPTION VALUE=\"$myrow[forum_id]\">$name</OPTION>\n";
			} while($myrow = mysql_fetch_array($result));
		} else {
			echo "<OPTION VALUE=\"0\">No More Forums</OPTION>\n";
		} // if/else
	} else {
		echo "<OPTION VALUE=\"0\">Error Connecting to DB</OPTION>\n";
	} // if/else



?>
</SELECT>
<INPUT TYPE="SUBMIT" VALUE="Go">
</FORM>
</TR></TABLE>

<?php

} // if/else

include('footer.php');
?>
