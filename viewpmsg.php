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
	
	$sql = "SELECT * FROM priv_msgs WHERE (to_userid = $userdata[uid])";
	$resultID = mysql_query($sql, $db);
	if (!$resultID) {
		echo mysql_error() . "<br>";
		forumerror(0005);
	}

?>
<?php OpenTable(); ?>
<center><FONT SIZE=3><b><?php echo translate("Private Message");?></b></FONT></center>
<?php CloseTable(); ?>
<TABLE BORDER="0" CELLSPACING="1" CELLPADDING="0" ALIGN="CENTER" VALIGN="TOP" WIDTH="100%"><TR><TD>
<TABLE BORDER="0" CELLSPACING="1" CELLPADDING="1" WIDTH="100%">
<FORM name=prvmsg METHOD="GET" ACTION="replypmsg.php">
<TR BGCOLOR="<?php echo $bgcolor2?>" ALIGN="LEFT">
	<TD BGCOLOR="<?php echo $bgcolor2?>" ALIGN="CENTER" VALIGN="MIDDLE"><INPUT name=allbox onclick=CheckAll(); type=checkbox value="Check All"></TD>
	<TD BGCOLOR="<?php echo $bgcolor2?>" ALIGN="CENTER" VALIGN="MIDDLE"><img src="images/forum/download.gif"></TD>
	<TD BGCOLOR="<?php echo $bgcolor2?>" ALIGN="CENTER" VALIGN="MIDDLE">&nbsp;</TD>
	<TD><FONT SIZE=2 COLOR="<?php echo $textcolor2?>"><B><?php echo translate("From")?></B></font></TD>
	<TD ALIGN="CENTER"><FONT SIZE=2 COLOR="<?php echo $textcolor2?>"><B><?php echo translate("Subject")?></B></font></TD>
	<TD ALIGN="CENTER"><FONT SIZE=2 COLOR="<?php echo $textcolor2?>"><B><?php echo translate("Date")?></B></font></TD>
</TR>
<?php
	if (!$total_messages = mysql_num_rows($resultID)) {
		echo "<TD BGCOLOR=\"$bgcolor3\" colspan = 6 ALIGN=CENTER>".translate("You don't have any Messages")."</TD></TR>\n";
	}
	else {
	$display=1;
	}
	
	$count=0;
	while ($myrow = mysql_fetch_array($resultID)) {

		echo "<TR ALIGN=\"LEFT\">";
		echo "<TD BGCOLOR=\"$bgcolor1\" valign=top WIDTH='2%' ALIGN='CENTER'><INPUT TYPE='CHECKBOX' onclick=CheckCheckAll(); name='msg_id[$count]' value='$myrow[msg_id]'></TD>";
		if ($myrow[read_msg] == "1") echo "<TD valign=top WIDTH='5%' ALIGN='CENTER' BGCOLOR=\"$bgcolor1\">&nbsp;</TD>";
		else echo "<TD valign=top WIDTH='5%' ALIGN='CENTER' BGCOLOR=\"$bgcolor1\"><IMG SRC='images/forum/read.gif' border=0 Alt=\"Not Read\"></TD>";
		echo "<TD BGCOLOR=\"$bgcolor3\" valign=top WIDTH='5%' ALIGN='CENTER'><IMG SRC='images/forum/subject/$myrow[msg_image]' border=0></TD>";
		$posterdata = get_userdata_from_id($myrow[from_userid], $db);
		echo "<TD BGCOLOR=\"$bgcolor1\" valign=MIDDLE WIDTH='10%'><a href='readpmsg.php?start=$count&total_messages=$total_messages'>$posterdata[uname]</a></TD>";
		echo "<TD BGCOLOR=\"$bgcolor3\" valign=MIDDLE><FONT SIZE=1 COLOR=\"$textcolor2\">$myrow[subject]</FONT></TD>";
		echo "<TD BGCOLOR=\"$bgcolor1\" valign=MIDDLE align='center' WIDTH='20%'><FONT SIZE=1 COLOR=\"$textcolor2\">$myrow[msg_time]</FONT></TD></TR>";
	$count++;
	}
	
	if ($display) {
	echo "<TR BGCOLOR=\"$bgcolor2\" ALIGN=\"LEFT\">";
	echo "<TD COLSPAN=6 ALIGN='LEFT'><a href='replypmsg.php?send=1'><IMG SRC='images/forum/icons/send.gif' border=0></a>&nbsp;<INPUT TYPE='image' SRC='images/forum/icons/delete.gif' name='delete_messages' value='delete_messages' border='0'></TD></TR>";
	echo "<INPUT TYPE='hidden' NAME='total_messages' VALUE='$total_messages'>";
	echo "</FORM>";
	}
	else {
	echo "<TR BGCOLOR=\"$bgcolor2\" ALIGN=\"LEFT\">";
	echo "<TD COLSPAN=6 ALIGN='LEFT'><a href='replypmsg.php?send=1'><IMG SRC='images/forum/icons/send.gif' border=0></a></TD></TR>";
	echo "</FORM>";
	}
?>

</TABLE></TD></TR></TABLE>

<?php OpenTable(); ?>

<TABLE ALIGN="CENTER" BORDER="0" WIDTH="95%">

<TR>
	<TD>
	</TD>
<TD ALIGN="RIGHT">
<FORM ACTION="viewforum.php" METHOD="GET">
<?php echo ".translate("Jump To: ")." ?><SELECT NAME="forum">
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

<?php CloseTable(); ?>

<SCRIPT language=JavaScript>
<!--
function CheckAll()
{
	for (var i=0;i<document.prvmsg.elements.length;i++)
	{
		var e = document.prvmsg.elements[i];
		if ((e.name != 'allbox') && (e.type=='checkbox'))
		e.checked = document.prvmsg.allbox.checked;
	}
}
function CheckCheckAll()
{
	var TotalBoxes = 0;
	var TotalOn = 0;
	for (var i=0;i<document.prvmsg.elements.length;i++)
	{
		var e = document.prvmsg.elements[i];
		if ((e.name != 'allbox') && (e.type=='checkbox'))
		{
			TotalBoxes++;
		if (e.checked)
		{
			TotalOn++;
		}
		}
	}
	if (TotalBoxes==TotalOn)
	{document.prvmsg.allbox.checked=true;}
	else
	{document.prvmsg.allbox.checked=false;}
}
-->
</script>

<?php

} // if/else

include('footer.php');
?>
