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

if (!eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
$hlpfile = "manual/users.html";
$result = mysql_query("select radminuser, radminsuper from authors where aid='$aid'");
list($radminuser, $radminsuper) = mysql_fetch_row($result);
if (($radminuser==1) OR ($radminsuper==1)) {

/*********************************************************/
/* Users Functions                                       */
/*********************************************************/

function displayUsers() {
	global $hlpfile, $admin;
        include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
        echo "
	<font size=4><b><center>".translate("Edit Users")."<br><br></b></font></center>";
	echo "<form method=post action=\"admin.php\">";
        echo "<b>".translate("Handle/UserID").": </b> <input class=textbox type=text name=\"chng_uid\" size=10>\n";
        echo "<select class=textbox name=\"op\">";
        echo "<option value=\"modifyUser\">".translate("Modify User")."</option>\n";
        echo "<option value=\"delUser\">".translate("Delete User")."</option></select>\n";
        echo "<input type=\"submit\" value=\"".translate("Go!")."\"></form>";
?>
<form action="admin.php" method="post">
<table cols=2 border=0 width=100%>
<tr><td width=100><?php echo ""; ?><?php echo translate("Handle");?>*</td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="add_uname" size=30 maxlength=25></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Name");?></td>
    <td><?php echo ""; ?><input class=textbox type="text" name="add_name" size=30 maxlength=50></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Email");?>*</td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="add_email" size=30 maxlength=60></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Fake Email");?></td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="add_femail" size=30 maxlength=60></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("URL");?></td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="add_url" size=30 maxlength=60></td></tr>
<tr><td><?php echo translate("Your ICQ: "); ?></td>
    <td><input class=textbox type="text" name="add_user_icq" size=20 maxlength=20></td></tr>
<tr><td><?php echo translate("Your AIM: "); ?></td>
    <td><input class=textbox type="text" name="add_user_aim" size=20 maxlength=20></td></tr>							
<tr><td><?php echo translate("Your YIM: "); ?></td>
    <td><input class=textbox type="text" name="add_user_yim" size=20 maxlength=20></td></tr>
<tr><td><?php echo translate("Your MSNM: "); ?></td>
    <td><input class=textbox type="text" name="add_user_msnm" size=20 maxlength=20></td></tr>
<tr><td><?php echo translate("Location: "); ?></td>
    <td><input class=textbox type="text" name="add_user_from" size=25 maxlength=60></td></tr>
<tr><td><?php echo translate("Occupation: "); ?></td>
    <td><input class=textbox type="text" name="add_user_occ" size=25 maxlength=60></td></tr>
<tr><td><?php echo translate("Interest: "); ?></td>
    <td><input class=textbox type="text" name="add_user_intrest" size=25 maxlength=255></td></tr>

<tr><td><?php echo translate("Rank: "); ?></td>
	<TD><SELECT NAME="add_rank">
<?php
		$sql = "SELECT rank_id, rank_title FROM ranks WHERE rank_special = 1";
		$r = mysql_query($sql);
		if($m = mysql_fetch_array($r)) {
		echo "<OPTION VALUE=\"0\">No Special Rank Assigned</OPTION>";
		echo "<OPTION VALUE=\"0\">------------------------</OPTION>";
		do {
		unset($selected);
		echo "<OPTION VALUE=\"$m[rank_id]\">$m[rank_title]</OPTION>\n";
		} while($m = mysql_fetch_array($r));
		echo "</SELECT>\n";
			}

		else {
			echo "<OPTION VALUE=\"0\">No Special Ranks in Database</OPTION></SELECT>\n";
		}
?>
</TD>
</TR>

<TR><TD><?php echo translate("User Level: "); ?></TD>
	<TD><SELECT NAME="add_level">
<?php
		$sql = "SELECT access_id, access_title FROM access";
		$r = mysql_query($sql);
                if($m = mysql_fetch_array($r)) {
                	do {
                        unset($selected);
                        echo "<OPTION VALUE=\"$m[access_id]\">$m[access_title]</OPTION>\n";
                        } while($m = mysql_fetch_array($r));
		}
?>
		</SELECT>
	</TD>
</TR>


<tr><td><?php echo translate("Option: "); ?></td>
    <td><INPUT TYPE="CHECKBOX" NAME="add_user_viewemail" VALUE="1"> Allow other users to view my email address</td></tr>
<tr><td><?php echo translate("Signature: "); ?></td>
    <td><TEXTAREA class=textbox NAME="add_user_sig" ROWS=6 COLS=45></TEXTAREA></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Password");?>*</td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="add_pass" size=12 maxlength=12></td></tr>
<input type="hidden" name="add_avatar" value="blank.gif">
<input type="hidden" name="op" value="addUser">
<tr><td colspan=2><?php echo ""; ?><input type=submit value="<?php echo translate("Add User");?>"></form></td></tr>
</table>
<?php echo "<center><font color=Red> ".translate("* indicates compulsory fields")." "; ?></font>
</td></tr></table></td></tr></table>
<?php

        include("footer.php");
}

function modifyUser($chng_user) {
        include("header.php");
	GraphicAdmin($hlpfile);
        $result = mysql_query("select uid, uname, name, url, email, femail, user_icq, user_aim, user_yim, user_msnm, user_from, user_occ, user_intrest, user_viewemail, user_avatar, user_sig, pass from users where uid='$chng_user' or uname='$chng_user'");
        if(mysql_num_rows($result) > 0) {
                while(list($chng_uid, $chng_uname, $chng_name, $chng_url, $chng_email, $chng_femail, $chng_user_icq, $chng_user_aim, $chng_user_yim, $chng_user_msnm, $chng_user_from, $chng_user_occ, $chng_user_intrest, $chng_user_viewemail, $chng_avatar, $chng_user_sig, $chng_pass) = mysql_fetch_row($result)) {
                echo "
		<b><center>
		".translate("Update User").": $chng_uname
		<br><br></b></center>";
OpenTable4();
?>
<form action="admin.php" method="get">
<table border=0>
<tr><td><?php echo ""; ?><?php echo translate("User ID");?></td>
    <td><?php echo ""; ?><?php echo $chng_uid ?></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Handle");?>*</td>
    <td><?php echo ""; ?><input class=textbox type="text" name="chng_uname" value="<?php echo $chng_uname ?>"></td></tr>
<tr><td width=100><?php echo ""; ?><?php echo translate("Name");?></td>
    <td><?php echo ""; ?><input class=textbox type="text" name="chng_name" value="<?php echo $chng_name ?>"></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("URL");?></td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="chng_url" value="<?php echo $chng_url ?>" size=30 maxlength=60></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Email");?>*</td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="chng_email" value="<?php echo $chng_email ?>" size=30 maxlength=60></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Fake Email");?></td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="chng_femail" value="<?php echo $chng_femail ?>" size=30 maxlength=60></td></tr>
<tr><td><?php echo translate("Your ICQ: "); ?></td>
    <td><input class=textbox type="text" name="chng_user_icq" value="<?php echo $chng_user_icq ?>" size=20 maxlength=20></td></tr>
<tr><td><?php echo translate("Your AIM: "); ?></td>
    <td><input class=textbox type="text" name="chng_user_aim" value="<?php echo $chng_user_aim ?>" size=20 maxlength=20></td></tr>							
<tr><td><?php echo translate("Your YIM: "); ?></td>
    <td><input class=textbox type="text" name="chng_user_yim" value="<?php echo $chng_user_yim ?>" size=20 maxlength=20></td></tr>
<tr><td><?php echo translate("Your MSNM: "); ?></td>
    <td><input class=textbox type="text" name="chng_user_msnm" value="<?php echo $chng_user_msnm ?>" size=20 maxlength=20></td></tr>
<tr><td><?php echo translate("Location: "); ?></td>
    <td><input class=textbox type="text" name="chng_user_from" value="<?php echo $chng_user_from ?>" size=25 maxlength=60></td></tr>
<tr><td><?php echo translate("Occupation: "); ?></td>
    <td><input class=textbox type="text" name="chng_user_occ" value="<?php echo $chng_user_occ ?>" size=25 maxlength=60></td></tr>
<tr><td><?php echo translate("Interest: "); ?></td>
    <td><input class=textbox type="text" name="chng_user_intrest" value="<?php echo $chng_user_intrest ?>" size=25 maxlength=255></td></tr>

<?php 

$mytest = mysql_query("select rank, level from users_status where uid='$chng_uid'");
list($chng_rank, $chng_level) = mysql_fetch_row($mytest); ?>

<tr><td><?php echo translate("Rank: "); ?></td>
	<TD><SELECT NAME="rank">
<?php
		$sql = "SELECT rank_id, rank_title FROM ranks WHERE rank_special = 1";
		$r = mysql_query($sql);
		if($m = mysql_fetch_array($r)) {
		echo "<OPTION VALUE=\"0\">No Special Rank Assigned</OPTION>";
		echo "<OPTION VALUE=\"0\">------------------------</OPTION>";
		do {
		unset($selected);
		if($chng_rank == $m[rank_id])
			$selected = "SELECTED";
		echo "<OPTION VALUE=\"$m[rank_id]\" $selected>$m[rank_title]</OPTION>\n";
		} while($m = mysql_fetch_array($r));
		echo "</SELECT>\n";
			}
		else {
			echo "<OPTION VALUE=\"0\">No Special Ranks in Database</OPTION></SELECT>\n";
		}
?>
</TD>
</TR>

<TR><TD><?php echo translate("User Level: "); ?></TD>
	<TD><SELECT NAME="level">
<?php
		$sql = "SELECT access_id, access_title FROM access";
		$r = mysql_query($sql);
                if($m = mysql_fetch_array($r)) {
                	do {
                        unset($selected);
                        if($chng_level == $m[access_id])
                              $selected = "SELECTED";
                        echo "<OPTION VALUE=\"$m[access_id]\" $selected>$m[access_title]</OPTION>\n";
                        } while($m = mysql_fetch_array($r));
		}
?>
		</SELECT>
	</TD>
</TR>

<tr><td><?php echo translate("Option: "); ?></td>
<?php if ($chng_user_viewemail ==1) { ?>
    <td><INPUT TYPE="CHECKBOX" NAME="chng_user_viewemail" VALUE="1" checked> Allow other users to view my email address</td></tr>
<?php } else { ?>
    <td><INPUT TYPE="CHECKBOX" NAME="chng_user_viewemail" VALUE="1"> Allow other users to view my email address</td></tr>
<?php } ?>
<tr><td><?php echo translate("Signature: "); ?></td>
    <td><TEXTAREA class=textbox NAME="chng_user_sig" ROWS=6 COLS=45><?php echo $chng_user_sig ?></TEXTAREA></td></tr>    
<tr><td><?php echo ""; ?><?php echo translate("Password")?></td>
    <td><?php echo ""; ?> <input class=textbox type="password" name="chng_pass"  size=12 maxlength=12></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Retype Password");?></td>
    <td><?php echo ""; ?> <input class=textbox type="password" name="chng_pass2" size=12 maxlength=12> <?php echo translate("(for changes only)");?></td></tr>
<input type="hidden" name="chng_avatar" value="<?php echo $chng_avatar; ?>">
<input type="hidden" name="chng_uid" value="<?php echo $chng_uid; ?>">
<input type="hidden" name="op" value="updateUser">
<tr><td colspan=2><?php echo ""; ?><input type="submit" value="<?php echo translate("Update User");?>"></form></td></tr>
</table>
<?php
                }
                echo "<center><font color=Red>".translate("* indicates compulsory fields")."</font>";
		echo "</td></tr></table></td></tr></table>";
        } else {
                echo "<center>";
		echo translate("User doesn't exist!");
		echo "</center>";
        }
        include("footer.php");
}

function updateUser($chng_uid, $chng_uname, $chng_name, $chng_url, $chng_email, $chng_femail, $chng_user_icq, $chng_user_aim, $chng_user_yim, $chng_user_msnm, $chng_user_from, $chng_user_occ, $chng_user_intrest, $chng_user_viewemail, $chng_avatar, $chng_sig, $chng_pass, $chng_pass2, $rank, $level) {
        $tmp = 0;
	if ($chng_pass2 != "") {
                if($chng_pass != $chng_pass2) {
                        $titlebar = "<b>".translate("bad pass")."</b>";
                        include("header.php");
			GraphicAdmin($hlpfile);
                        echo "
			<center>".translate("Sorry, the new passwords do not match. Click back and try again")."</center>";
                        include("footer.php");
                        exit;
                }
            $tmp = 1;
        }
	if ($tmp == 0) {
	    mysql_query("update users set uname='$chng_uname', name='$chng_name', email='$chng_email', femail='$chng_femail', url='$chng_url', user_icq='$chng_user_icq', user_aim='$chng_user_aim', user_yim='$chng_user_yim', user_msnm='$chng_user_msnm', user_from='$chng_user_from', user_occ='$chng_user_occ', user_intrest='$chng_user_intrest', user_viewemail='$chng_user_viewemail', user_avatar='$chng_avatar', user_sig='$chng_sig' where uid='$chng_uid'");
	    mysql_query("update users_status set rank='$rank', level='$level' where uid='$chng_uid'");
	}
	if ($tmp == 1) {
	    $cpass = crypt($chng_pass);
	    mysql_query("update users set uname='$chng_uname', name='$chng_name', email='$chng_email', femail='$chng_femail', url='$chng_url', user_icq='$chng_user_icq', user_aim='$chng_user_aim', user_yim='$chng_user_yim', user_msnm='$chng_user_msnm', user_from='$chng_user_from', user_occ='$chng_user_occ', user_intrest='$chng_user_intrest', user_viewemail='$chng_user_viewemail', user_avatar='$chng_avatar', user_sig='$chng_sig', pass='$cpass' where uid='$chng_uid'");
	    mysql_query("update users_status set rank='$rank', level='$level' where uid='$chng_uid'");
	}
	Header("Location: admin.php?op=adminMain");
}

switch($op) {

                case "mod_users":
                        displayUsers();
                        break;

                case "modifyUser":
                        modifyUser($chng_uid);
                        break;

                case "updateUser":
                        updateUser($chng_uid, $chng_uname, $chng_name, $chng_url, $chng_email, $chng_femail, $chng_user_icq, $chng_user_aim, $chng_user_yim, $chng_user_msnm, $chng_user_from, $chng_user_occ, $chng_user_intrest, $chng_user_viewemail, $chng_avatar, $chng_sig, $chng_pass, $chng_pass2, $rank, $level);
                        break;

                case "delUser":
                        include("header.php");
                        $titlebar = "<h3>".translate("Delete User")."</h3>";
                        echo $titlebar;
                        echo translate("Are you sure you want to delete") . " " . translate("user") . " $chng_uid? ";
                        echo "[ <a href=\"admin.php?op=delUserConf&del_uid=$chng_uid\">".translate("Yes")."</a> | <a href=\"admin.php?op=adminMain\">".translate("No")."</a> ]";
                        include("footer.php");
                        break;

                case "delUserConf":
                        mysql_query("delete from users where uid='$del_uid' or uname='$del_uid'");
                        mysql_query("delete from users_status where uid='$del_uid'");
                        Header("Location: admin.php?op=adminMain");
                        echo mysql_error();
                        break;

                case "addUser":
			if ($system==1) {
			} else {
			    $add_pass = crypt($add_pass);
			}
                        if (!($add_uname && $add_email && $add_pass)) {
                            echo translate("You must complete all compulsory fields");
                            return;
                        }
                        $user_regdate = date("M d, Y");
			$sql    = "insert into users ";
                        $sql    .= "(uid,name,uname,email,femail,url,user_regdate,user_icq,user_aim,user_yim,user_msnm,user_from,user_occ,user_intrest,user_viewemail,user_avatar,user_sig,pass) ";
                        $sql    .= "values (NULL,'$add_name','$add_uname','$add_email','$add_femail','$add_url','$user_regdate','$add_user_icq','$add_user_aim','$add_user_yim','$add_user_msnm','$add_user_from','$add_user_occ','$add_user_intrest','$add_user_viewemail','$add_avatar','$add_user_sig','$add_pass')";
                        $result = mysql_query($sql);
                        if (!$result) {
                                echo mysql_errno(). ": ".mysql_error(). "<br>"; return;
                        }
			$result = mysql_query("insert into users_status values (NULL,'0','0','$add_rank','$add_level')");
                        Header("Location: admin.php?op=adminMain");
                        break;
			
}

} else {
    echo "Access Denied";
}

?>