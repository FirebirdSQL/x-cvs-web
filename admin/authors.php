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

if (!eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
$hlpfile = "manual/authors.html";
$result = mysql_query("select radminsuper from authors where aid='$aid'");
list($radminsuper) = mysql_fetch_row($result);
if ($radminsuper==1) {


/*********************************************************/
/* Admin/Authors Functions                               */
/*********************************************************/

function displayadmins() {
	global $hlpfile, $admin;
	include ("config.php");
	$titlebar = "<b>".translate("current authors")."</b>";
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "
	<font size=4><center><b>".translate("Edit Admins")."<br><br></font></center></b>
	";
	$result = mysql_query("select aid, name from authors");
	echo "<table border=1>";
	while(list($a_aid, $name) = mysql_fetch_row($result)) {
		echo "<tr><td>$a_aid</td>";
		echo "<td><a href=\"admin.php?op=modifyadmin&chng_aid=$a_aid\">".translate("Modify Info")."</a></td>";
		if($name=="God") {
		} else {
		    echo "<td><a href=\"admin.php?op=deladmin&del_aid=$a_aid\">".translate("Delete Author")."</a></td></tr>";
		}
	}
?>
</table>
<form action="admin.php" method="post">
<table cols=2 border=0>
<tr><td width=100><?php echo ""; ?><?php echo translate("Handle");?>*</td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="add_aid" size=30 maxlength=30></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Name");?>*</td>
    <td><?php echo ""; ?><input class=textbox type="text" name="add_name" size=30 maxlength=50></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Email");?>*</td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="add_email" size=30 maxlength=60></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("URL");?></td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="add_url" size=30 maxlength=60></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Active");?></td><td>
    <table cellpadding=3 cellspacing=0 border=0 width=400>
    <tr>
    <td><input type=checkbox name="add_radminarticle" value="1"></td>
    <td><input type=checkbox name="add_radmintopic" value="1"></td>
    <td><input type=checkbox name="add_radminleft" value="1"></td>    
    <td><input type=checkbox name="add_radminright" value="1"></td>
    <td><input type=checkbox name="add_radminuser" value="1"></td>    
    <td><input type=checkbox name="add_radminsurvey" value="1"></td>
    </tr><tr>
    <td>Articles</td>
    <td>Topics</td>
    <td>Left Blocks</td>    
    <td>Right Blocks</td>
    <td>Edit Users</td>    
    <td>Surveys</td>
    </tr><tr>
    <td><input type=checkbox name="add_radminsection" value="1"></td>
    <td><input type=checkbox name="add_radminlink" value="1"></td>
    <td><input type=checkbox name="add_radminephem" value="1"></td>
    <td><input type=checkbox name="add_radminfilem" value="1"></td>
    <td><input type=checkbox name="add_radminhead" value="1"></td>
    <td><input type=checkbox name="add_radminfaq" value="1"></td>
    </tr><tr>
    <td>Sections</td>
    <td>Web Links</td>
    <td>Ephemerids</td>
    <td>File Manager</td>
    <td>Headlines</td>
    <td>FAQ</td>
    </tr><tr>
    <td><input type=checkbox name="add_radmindownload" value="1"></td>
    <td><input type=checkbox name="add_radminforum" value="1"></td>
    <td><input type=checkbox name="add_radminreviews" value="1"></td>
    <td><input type=checkbox name="add_radminsuper" value="1"></td>
    </tr><tr>
    <td>Download</td>
    <td>Forum</td>
    <td>Reviews</td>
    <td><font color=red><b>Super User</b></font></td>
    </tr>
    </table>
    </td></tr>
  <tr><td colspan=2><i>If "Super" is checked then the user will get full function menu</i></td></tr>
  <tr><td colspan=2>&nbsp;</td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Password");?>*</td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="add_pwd" size=12 maxlength=12></td></tr>
<input type="hidden" name="op" value="AddAuthor">
<tr><td colspan=2><?php echo ""; ?><input type=submit value="<?echo translate("Add Author");?>"></form></td></tr>
</table>
<?php echo "<center><font color=Red>".translate("* indicates compulsory fields")."</font></center>"; ?>
</td></tr></table></td></tr></table>
<?

	include("footer.php");
}


function modifyadmin($chng_aid) {
	global $aid;
	$titlebar = "<b>".translate("update")." $chng_aid</b>";
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	$result = mysql_query("select aid, name, url, email, pwd, radminarticle,radmintopic,radminleft,radminright,radminuser,radminmain,radminsurvey,radminsection,radminlink,radminephem,radminfilem,radminhead,radminfaq,radmindownload,radminforum,radminsuper from authors where aid='$chng_aid'");
	list($chng_aid, $chng_name, $chng_url, $chng_email, $chng_pwd, $chng_radminarticle, $chng_radmintopic, $chng_radminleft, $chng_radminright, $chng_radminuser, $chng_radminmain, $chng_radminsurvey, $chng_radminsection, $chng_radminlink, $chng_radminephem, $chng_radminfilem, $chng_radminhead, $chng_radminfaq, $chng_radmindownload, $chng_radminforum, $chng_radminsuper) = mysql_fetch_row($result);

 	$result = mysql_query("select radminsuper from authors where aid='$aid'");
 	list($radminsuper) = mysql_fetch_array($result);

if ($radminsuper == 1) {
?>
<form action="admin.php" method="post">
<table cols=2 border=0>
<tr><td width=100><?php echo ""; ?><?php echo translate("Name");?></td>
    <td><?php echo ""; ?> <?echo $chng_name ?><input type="hidden" name="chng_name" value="<?php echo $chng_name ?>"></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Handle");?>*</td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="chng_aid" value="<?php echo $chng_aid?>"></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Email");?>*</td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="chng_email" value="<?php echo $chng_email?>" size=30 maxlength=60></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("URL");?></td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="chng_url" value="<?php echo $chng_url?>" size=30 maxlength=60></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Active");?></td><td>
    <table cellpadding=3 cellspacing=0 border=0>
    <tr>
<?php if ($chng_radminarticle == 1) { ?>
    <td><input type=checkbox name="chng_radminarticle" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminarticle" value="1"></td>
<?php } 
if ($chng_radmintopic == 1) { ?>
    <td><input type=checkbox name="chng_radmintopic" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radmintopic" value="1"></td>
<?php } 
if ($chng_radminleft == 1) { ?>
    <td><input type=checkbox name="chng_radminleft" value="1" checked></td>    
<?php } else { ?>
    <td><input type=checkbox name="chng_radminleft" value="1"></td> 
<?php } 
if ($chng_radminright == 1) { ?>
    <td><input type=checkbox name="chng_radminright" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminright" value="1"></td>
<?php } 
if ($chng_radminuser == 1) { ?>
    <td><input type=checkbox name="chng_radminuser" value="1" checked></td>    
<?php } else { ?>
    <td><input type=checkbox name="chng_radminuser" value="1"></td> 
<?php } 
if ($chng_radminsurvey == 1) { ?>
    <td><input type=checkbox name="chng_radminsurvey" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminsurvey" value="1"></td>
<?php } ?>
    </tr><tr>
    <td>Article</td>
    <td>Topic</td>
    <td>Block Left</td>    
    <td>Block Right</td>
    <td>Edit User</td>    
    <td>Survey</td>
    </tr>
    <tr>
<?php if ($chng_radminsection == 1) { ?>
    <td><input type=checkbox name="chng_radminsection" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminsection" value="1"></td>
<?php } 
if ($chng_radminlink == 1) { ?>
    <td><input type=checkbox name="chng_radminlink" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminlink" value="1"></td>
<?php }
if ($chng_radminephem == 1) { ?>
    <td><input type=checkbox name="chng_radminephem" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminephem" value="1"></td>
<?php } 
if ($chng_radminfilem == 1) { ?>
    <td><input type=checkbox name="chng_radminfilem" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminfilem" value="1"></td>
<?php } 
if ($chng_radminhead == 1) { ?>
    <td><input type=checkbox name="chng_radminhead" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminhead" value="1"></td>
<?php } 
if ($chng_radminfaq == 1) { ?>
    <td><input type=checkbox name="chng_radminfaq" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminfaq" value="1"></td>
<?php } ?>
    </tr><tr>
    <td>Section</td>
    <td>Web Links</td>
    <td>Ephemeid</td>
    <td>File Manager</td>
    <td>Headlines</td>
    <td>FAQ</td>
    </tr>
    <tr>
<?php if ($chng_radmindownload == 1) { ?>
    <td><input type=checkbox name="chng_radmindownload" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radmindownload" value="1"></td>
<?php } 


if ($chng_radminforum == 1) { ?>
    <td><input type=checkbox name="chng_radminforum" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminforum" value="1"></td>
<?php } 


if ($chng_radminreviews == 1) { ?>
    <td><input type=checkbox name="chng_radminreviews" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminreviews" value="1"></td>
<?php } 

if ($chng_radminsuper == 1) { ?>
    <td><input type=checkbox name="chng_radminsuper" value="1" checked></td>
<?php } else { ?>
    <td><input type=checkbox name="chng_radminsuper" value="1"></td>
<?php } ?>
    </tr><tr>
    <td>Download</td>
    <td>Forum</td>
    <td>Reviews</td>
    <td><font color=red>Super</font></td>
    </tr>
    </table>
    </td></tr>
<tr><td colspan=2>If "Super" checked then the user will get full function menu</td></tr>
  <tr><td colspan=2>&nbsp;</td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Password")?></td>
    <td><?php echo ""; ?> <input class=textbox type="password" name="chng_pwd"  size=12 maxlength=12></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Retype Password");?></td>
    <td><?php echo ""; ?> <input class=textbox type="password" name="chng_pwd2" size=12 maxlength=12> <?php echo translate("(for changes only)");?></td></tr>
<input type="hidden" name="op" value="UpdateAuthor">
<tr><td colspan=2><?php echo ""; ?><input type="submit" value="<?php echo translate("Update Author");?>"></form></td></tr>
</table>
<?
}
else { ?>
<form action="admin.php" method="post">
<table cols=2 border=0>
<tr><td width=100><?php echo ""; ?><?php echo translate("Name");?></td>
    <td><?php echo ""; ?> <?echo $chng_name ?><input type="hidden" name="chng_name" value="<?php echo $chng_name ?>"></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Handle");?>*</td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="chng_aid" value="<?php echo $chng_aid?>"></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Email");?>*</td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="chng_email" value="<?php echo $chng_email?>" size=30 maxlength=60></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("URL");?></td>
    <td><?php echo ""; ?> <input class=textbox type="text" name="chng_url" value="<?php echo $chng_url?>" size=30 maxlength=60></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Password")?></td>
    <td><?php echo ""; ?> <input class=textbox type="password" name="chng_pwd"  size=12 maxlength=12></td></tr>
<tr><td><?php echo ""; ?><?php echo translate("Retype Password");?></td>
    <td><?php echo ""; ?> <input class=textbox type="password" name="chng_pwd2" size=12 maxlength=12> <?php echo translate("(for changes only)");?></td></tr>
<input type="hidden" name="op" value="UpdateAuthor">
<input type="hidden" name="chng_status" value="<?php echo $chng_status; ?>">
<tr><td colspan=2><?php echo ""; ?><input type="submit" value="<?php echo translate("Update Author");?>"></form></td></tr>
</table>
<?php 
}
echo translate("* indicates compulsory fields"); ?></font>
</td></tr></table></td></tr></table>
<?
	include("footer.php");
}

function updateadmin($chng_aid, $chng_name, $chng_email, $chng_url, $chng_radminarticle, $chng_radmintopic, $chng_radminleft, $chng_radminright, $chng_radminuser, $chng_radminmain, $chng_radminsurvey, $chng_radminsection, $chng_radminlink, $chng_radminephem, $chng_radminfilem, $chng_radminhead, $chng_radminfaq, $chng_radmindownload, $chng_radminforum, $radminreviews, $chng_radminsuper, $chng_pwd, $chng_pwd2) {
	if (!($chng_aid && $chng_name && $chng_email))
		Header("Location: admin.php?op=adminMain");

	if ($chng_pwd2 != "") {
		if($chng_pwd != $chng_pwd2) {
			$titlebar = "<b>".translate("bad pass")."</b>";
			include("header.php");
			GraphicAdmin($hlpfile);
			echo translate("Sorry, the new passwords do not match. Click back and try again");
			include("footer.php");
			exit;
		}

	if ($chng_radminsuper == 1) {
		$result = mysql_query("update authors set aid='$chng_aid', email='$chng_email', url='$chng_url', radminarticle='0', radmintopic='0', radminleft='0', radminright='0', radminuser='0', radminmain='0', radminsurvey='0', radminsection='0', radminlink='0', radminephem='0', radminfilem='0', radminhead='0', radminfaq='0', radmindownload='0', radminforum='0', radminreviews='0', radminsuper='$chng_radminsuper', pwd='$chng_pwd' where name='$chng_name'");
		Header("Location: admin.php?op=adminMain");
	}
	else {
		$result = mysql_query("update authors set aid='$chng_aid', email='$chng_email', url='$chng_url', radminarticle='$chng_radminarticle', radmintopic='$chng_radmintopic', radminleft='$chng_radminleft', radminright='$chng_radminright', radminuser='$chng_radminuser', radminmain='$chng_radminmain', radminsurvey='$chng_radminsurvey', radminsection='$chng_radminsection', radminlink='$chng_radminlink', radminephem='$chng_radminephem', radminfilem='$chng_radminfilem', radminhead='$chng_radminhead', radminfaq='$chng_radminfaq', radmindownload='$chng_radmindownload', radminforum='$chng_radminforum', radminreviews='$chng_radminreviews', radminsuper='0', pwd='$chng_pwd' where name='$chng_name'");
		Header("Location: admin.php?op=adminMain");
	}

	} else {	

	if ($chng_radminsuper ==1) {
		$result = mysql_query("update authors set aid='$chng_aid', email='$chng_email', url='$chng_url', radminarticle='0', radmintopic='0', radminleft='0', radminright='0', radminuser='0', radminmain='0', radminsurvey='0', radminsection='0', radminlink='0', radminephem='0', radminfilem='0', radminhead='0', radminfaq='0', radmindownload='0', radminforum='0', radminreviews='0', radminsuper='$chng_radminsuper' where name='$chng_name'");
		Header("Location: admin.php?op=adminMain");
	} else {
		$result = mysql_query("update authors set aid='$chng_aid', email='$chng_email', url='$chng_url', radminarticle='$chng_radminarticle', radmintopic='$chng_radmintopic', radminleft='$chng_radminleft', radminright='$chng_radminright', radminuser='$chng_radminuser', radminmain='$chng_radminmain', radminsurvey='$chng_radminsurvey', radminsection='$chng_radminsection', radminlink='$chng_radminlink', radminephem='$chng_radminephem', radminfilem='$chng_radminfilem', radminhead='$chng_radminhead', radminfaq='$chng_radminfaq', radmindownload='$chng_radmindownload', radminforum='$chng_radminforum', radminreviews='$chng_radminreviews', radminsuper='0' where name='$chng_name'");
		Header("Location: admin.php?op=adminMain");
	}

	}
}

switch ($op) {

		case "mod_authors":
			displayadmins();
			break;
		
		case "modifyadmin":
			modifyadmin($chng_aid);
			break;

		case "UpdateAuthor":
			updateadmin($chng_aid, $chng_name, $chng_email, $chng_url, $chng_radminarticle, $chng_radmintopic, $chng_radminleft, $chng_radminright, $chng_radminuser, $chng_radminmain, $chng_radminsurvey, $chng_radminsection, $chng_radminlink, $chng_radminephem, $chng_radminfilem, $chng_radminhead, $chng_radminfaq, $chng_radmindownload, $chng_radminforum, $chng_radminreviews, $chng_radminsuper, $chng_pwd, $chng_pwd2);
			break;

		case "AddAuthor":
			if (!($add_aid && $add_name && $add_email && $add_pwd)) {
			    echo translate("You must complete all compulsory fields");
			    return;
			}
			$result = mysql_query("insert into authors values ('$add_aid', '$add_name', '$add_url', '$add_email', '$add_pwd', '0', '$add_radminarticle','$add_radmintopic','$add_radminleft','$add_radminright','$add_radminuser','$add_radminmain','$add_radminsurvey','$add_radminsection','$add_radminlink','$add_radminephem','$add_radminfilem','$add_radminhead', '$add_radminfaq', '$add_radmindownload', '$add_radminforum', '$add_radminreviews', '$add_radminsuper')");
			if (!$result) {
				echo mysql_errno(). ": ".mysql_error(). "<br>"; return;
			}
			Header("Location: admin.php?op=adminMain");
			break;

		case "deladmin":
			$titlebar = "<b>".translate("delete")." $del_aid ".translate("- are you sure?")."</b>";
			include("header.php");
			echo "<b> ".translate("Delete Author")."</b><br><br>";
			echo translate("Are you sure you want to delete")." $del_aid? ";
			echo "[ <a href=\"admin.php?op=deladminconf&del_aid=$del_aid\">".translate("Yes")."</a>&nbsp;|&nbsp;<a href=\"admin.php?op=adminMain\">".translate("No")."</a> ]";
			include("footer.php");
			break;

		case "deladminconf":
			mysql_query("delete from authors where aid='$del_aid'");
			Header("Location: admin.php?op=adminMain");
			echo mysql_error();
			break;


}

} else {
    echo "Access Denied";
}

?>