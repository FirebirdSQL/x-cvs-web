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

function nav() {
    global $uimages;
    // if (!isset($config)) { include("config.php"); }
    OpenTable4();
    echo "<center> 
    <a href=\"user.php?op=edituser\"><img src=\"$uimages/edit.gif\" border=0></a>&nbsp;&nbsp;\n
    <a href=\"user.php?op=edithome\"><img src=\"$uimages/change.gif\" border=0></a>&nbsp;&nbsp;\n
    <a href=\"user.php?op=editcomm\"><img src=\"$uimages/conf_comments.gif\" border=0></a>&nbsp;&nbsp;\n
    <a href=\"user.php?op=chgtheme\"><img src=\"$uimages/theme.gif\" border=0></a>&nbsp;&nbsp;\n
    <a href=\"user.php?op=logout\"><img src=\"$uimages/exit.gif\" border=0></a>\n
    </center>\n";
    CloseTable();
    echo "<br><br>\n\n";
}

function userCheck($uname, $email) {
	global $stop;
	if ((!$email) || ($email=="") || (!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$email))) $stop = "<center>".translate("ERROR: Invalid email")."</center><br>";
	if (strrpos($uname,' ') > 0) $stop = "<center>".translate("ERROR: Email addresses do not contain spaces.")."</center>";
	if ((!$uname) || ($uname=="") || (ereg("[^a-zA-Z0-9_-]",$uname))) $stop = "<center>".translate("ERROR: Invalid Nickname")."</center><br>";
	if (strlen($uname) > 25) $stop = "<center>".translate("Nickname is too long. It must be less than 25 characters.")."</center>";
	if (eregi("^((root)|(adm)|(linux)|(webmaster)|(admin)|(god)|(administrator)|(administrador)|(nobody)|(anonymous)|(anonimo)|(anónimo)|(operator))$",$uname)) $stop = "<center>".translate("ERROR: Name is reserved.")."";
	if (strrpos($uname,' ') > 0) $stop = "<center>".translate("There cannot be any spaces in the Nickname.")."</center>";
	dbconnect();
	if (mysql_num_rows(mysql_query("select uname from users where uname='$uname'")) > 0) $stop = "<center>".translate("ERROR: Nickname taken")."</center><br>";
	if (mysql_num_rows(mysql_query("select email from users where email='$email'")) > 0) $stop = "<center>".translate("ERROR: Email address already registered")."</center><br>";
	return($stop);
}

function makePass() {
	$makepass="";
	$syllables="er,in,tia,wol,fe,pre,vet,jo,nes,al,len,son,cha,ir,ler,bo,ok,tio,nar,sim,ple,bla,ten,toe,cho,co,lat,spe,ak,er,po,co,lor,pen,cil,li,ght,wh,at,the,he,ck,is,mam,bo,no,fi,ve,any,way,pol,iti,cs,ra,dio,sou,rce,sea,rch,pa,per,com,bo,sp,eak,st,fi,rst,gr,oup,boy,ea,gle,tr,ail,bi,ble,brb,pri,dee,kay,en,be,se";
	$syllable_array=explode(",", $syllables);
	srand((double)microtime()*1000000);
	for ($count=1;$count<=4;$count++) {
		if (rand()%10 == 1) {
			$makepass .= sprintf("%0.0f",(rand()%50)+1);
		} else {
			$makepass .= sprintf("%s",$syllable_array[rand()%62]);
		}
	}
	return($makepass);
}

function confirmNewUser($uname, $email, $url, $user_avatar, $user_icq, $user_occ, $user_from, $user_intrest, $user_sig, $user_viewemail, $user_aim, $user_yim, $user_msnm) {
	global $stop, $EditedMessage;
	include("header.php");
	filter_text($uname);
	$uname = $EditedMessage;
	//mymodification
	if($user_viewemail == 1) {
		$user_viewemail = "1";
	}
	else {
		$user_viewemail = "0";
	}
	//end
	userCheck($uname, $email);
	if (!$stop) {
		OpenTable4();
		echo "Username: $uname<br>"
			."Email: $email<br>"; 
	//mymodification
		if (($user_avatar) || ($user_avatar!="")) echo "".translate("Avatar").": <img src=images/forum/avatar/$user_avatar><br>";
		if (($url) || ($url!="")) echo "".translate("Website").": $url<br>";
		if (($user_icq) || ($user_icq!="")) echo "".translate("Your ICQ").": $user_icq<br>";			
		if (($user_aim) || ($user_aim!="")) echo "".translate("Your AIM").": $user_aim<br>";
		if (($user_yim) || ($user_yim!="")) echo "".translate("Your YIM").": $user_yim<br>";
		if (($user_msnm) || ($user_msnm!="")) echo "".translate("Your MSNM").": $user_msnm<br>";
		if (($user_from) || ($user_from!="")) echo "".translate("Location").": $user_from<br>";
		if (($user_occ) || ($user_occ!="")) echo "".translate("Occupation").": $user_occ<br>";
		if (($user_intrest) || ($user_intrest!="")) echo "".translate("Interest").": $user_intrest<br>";			
		if (($user_sig) || ($user_sig!="")) echo "".translate("Signature").": $user_sig<br>";
			?>
		<form action="user.php" method="post">
		<input type="hidden" name="uname" value="<?PHP echo"$uname"; ?>">
		<input type="hidden" name="email" value="<?PHP echo"$email"; ?>">
		<input type="hidden" name="user_avatar" value="<?PHP echo"$user_avatar"; ?>">		
		<input type="hidden" name="user_icq" value="<?PHP echo"$user_icq"; ?>">
		<input type="hidden" name="url" value="<?PHP echo"$url"; ?>">
		<input type="hidden" name="user_from" value="<?PHP echo"$user_from"; ?>">
		<input type="hidden" name="user_occ" value="<?PHP echo"$user_occ"; ?>">
		<input type="hidden" name="user_intrest" value="<?PHP echo"$user_intrest"; ?>">
		<input type="hidden" name="user_sig" value="<?PHP echo"$user_sig"; ?>">										
		<input type="hidden" name="user_aim" value="<?PHP echo"$user_aim"; ?>">	
		<input type="hidden" name="user_yim" value="<?PHP echo"$user_yim"; ?>">	
		<input type="hidden" name="user_msnm" value="<?PHP echo"$user_msnm"; ?>">	
		<input type="hidden" name="user_viewemail" value="<?PHP echo"$user_viewemail"; ?>">	
		<br><br><input type=hidden name=op value=finish><input type="submit" value="<?php echo translate("Finish"); ?>"></form>
<?PHP
		CloseTable();
	} else {
		echo "$stop";
	}
	include("footer.php");
}

function finishNewUser($uname, $email, $url, $user_avatar, $user_icq, $user_occ, $user_from, $user_intrest, $user_sig, $user_viewemail, $user_aim, $user_yim, $user_msnm) {
	global $stop, $makepass, $EditedMessage, $system, $adminmail, $sitename;
	include("header.php");
	dbconnect();
	userCheck($uname, $email);
	$user_regdate = date("M d, Y");
	if (!isset($stop)) {
		$makepass=makepass();
		
		if(!$system) 
			$cryptpass=crypt($makepass);
		else	
			$cryptpass=$makepass;
	$result = mysql_query("insert into users values (NULL,'','$uname','$email','','$url','$user_avatar','$user_regdate','$user_icq','$user_occ','$user_from','$user_intrest','$user_sig','$user_viewemail','','$user_aim','$user_yim','$user_msnm','$cryptpass',10,'',0,0,0,'',0,'','','$commentlimit', '0')");
	$result = mysql_query("insert into users_status values (NULL,'0','0','0','1')");

		if(!$result) {
			echo mysql_errno(). ": ".mysql_error(). "<br>";
		} else {
			$message = "".translate("Welcome to")." $sitename!\n\n".translate("You or someone else has used your email account")." ($email) ".translate("to register an account at")." $sitename. ".translate("The following is the member information:")."\n\n".translate("-Nickname: ")." $uname\n".translate("-Password: ")." $makepass";
			$subject="".translate("User Password for")." $uname";
			$from="$adminmail";
			if ($system == 1) {
				echo "".translate("Your password is: ")."<b>$makepass</b><br>";
				echo "<a href=\"user.php?op=login&uname=$uname&pass=$makepass\">Login</a> to change your info";
			} else {
				mail($email, $subject, $message, "From: $from\nX-Mailer: PHP/" . phpversion());
				OpenTable4();
				echo "".translate("You are now registered. You should receive your password at the email account you provided.")."";
				CloseTable();
			}
		}
	} else {
		echo "$stop";
	}
	include("footer.php");
}

function userinfo($uname, $bypass=0) {
	global $user, $cookie, $sitename;
	$result = mysql_query("select femail, url, bio, user_avatar, user_icq, user_aim, user_yim, user_msnm, user_from, user_occ, user_intrest, user_sig from users where uname='$uname'");
	$userinfo = mysql_fetch_array($result);
	if(!$bypass) cookiedecode($user);
	include("header.php");
	OpenTable4();
	echo "<center>";
	if(($uname == $cookie[1]) || ($bypass==1)) {
		echo "<font size=4><center>$uname, ".translate("Welcome to")." $sitename!<br><br>";
		echo "<font size=3>".translate("This is your personal page")."<br><br>";
		nav();
	}
	echo "<font size=2>";
	if((mysql_num_rows($result)==1) && ($userinfo[url] || $userinfo[femail] || $userinfo[bio] || $userinfo[user_avatar] || $userinfo[user_icq] || $userinfo[user_aim] || $userinfo[user_yim] || $userinfo[user_msnm] || $userinfo[user_location] || $userinfo[user_occ] || $userinfo[user_intrest] || $userinfo[user_sig])) {
		echo "<center><font size=2>";
		if ($userinfo[user_avatar]) echo "<img src=\"images/forum/avatar/$userinfo[user_avatar]\"><br>\n";
		if ($userinfo[url]) { echo "".translate("My HomePage:")." <a href=\"$userinfo[url]\">$userinfo[url]</a><br>\n"; }
		if ($userinfo[femail]) { echo "".translate("My E-Mail:")." <a href=\"mailto:$userinfo[femail]\">$userinfo[femail]</a><br>\n"; }
		if ($userinfo[user_icq]) echo "".translate("Your ICQ: ")." $userinfo[user_icq]<br>\n";
		if ($userinfo[user_aim]) echo "".translate("Your AIM: ")." $userinfo[user_aim]<br>\n";
		if ($userinfo[user_yim]) echo "".translate("Your YIM: ")." $userinfo[user_yim]<br>\n";
		if ($userinfo[user_msnm]) echo "".translate("Your MSNM: ")." $userinfo[user_msnm]<br>\n";
		if ($userinfo[user_from]) echo "".translate("Location: ")." $userinfo[user_from]<br>\n";
		if ($userinfo[user_occ]) echo "".translate("Occupation: ")." $userinfo[user_occ]<br>\n";
		if ($userinfo[user_intrest]) echo "".translate("Interest: ")." $userinfo[user_intrest]<br>\n";
		$userinfo[user_sig] = nl2br($userinfo[user_sig]);
		if ($userinfo[user_sig]) echo "<br><b>".translate("Signature: ")." </b><br>$userinfo[user_sig]<br>\n";
		if ($userinfo[bio]) { echo "<br><b>".translate("Extra Info:")." </b><br>$userinfo[bio]<br>\n"; }
		echo "</center></font>";
	} else {
		echo "<center>".translate("There is no available info for")." $uname</center>";
	}
	CloseTable();
	echo "<center><br><br>";
	OpenTable4();
	echo "<b>".translate("Last 10 comments by")." $uname:</b><br>";
	$result = mysql_query("select tid, sid, subject from comments where name='$uname' order by tid DESC limit 0,10");
	while(list($tid, $sid, $subject) = mysql_fetch_row($result)) {
	    echo "<li><a href=article.php?thold=-1&mode=flat&order=0&sid=$sid#$tid>$subject</a><br>";
	}
	CloseTable();
	echo "<br><br>";
	OpenTable4();
	echo "<b>".translate("Last 10 news submissions sent by")." $uname:</b><br>";
	$result = mysql_query("select sid, title from stories where informant='$uname' order by sid DESC limit 0,10");
	while(list($sid, $title) = mysql_fetch_row($result)) {
	    echo "<li><a href=article.php?sid=$sid>$title</a><br>";
	}
	CloseTable();
	echo "</center>";
	include("footer.php");
}

function main($user) {
	global $stop;
	if(!isset($user)) {
		// if (!isset($config)) { include("config.php"); }
		include("header.php");
		?>
		<?PHP if ($stop) echo "<center><blink><marquee><h3>".translate("Incorrect Login!")."</h3></marquee></blink></center>"; ?>
		<?php
		if ($user) {
		} else {
		OpenTable4();
		?>
		<form action="user.php" method="post">
		<b><?php echo translate("User Login"); ?></b><br><br>
		<?php echo translate("Nickname: "); ?><input class=textbox type="text" name="uname" size=26 maxlength=25><br>
		<?php echo translate("Password: "); ?><input class=textbox type="password" name="pass" size=21 maxlength=20><br>
		<input type=hidden name=op value="login">
		<input type="submit" value="<?php echo translate("Login"); ?>">
		</td</tr></table></td</tr></table></form>
		<br>
		<?php
		}
		OpenTable4();
		?>
		<form name="Register" action="user.php" method="post">
		<b><?php echo translate("New User:"); ?></b><br><br>
		<table cellpadding=0 cellspacing border=0>
		<tr><td><?php echo translate("Nickname: "); ?></td><td><input class=textbox type="text" name="uname" size=26 maxlength=25></td></tr>
		<tr><td><?php echo translate("E-Mail: "); ?></td><td><input class=textbox type="text" name="email" size=25 maxlength=60></td></tr>
		<tr><td><?php echo translate("Website: "); ?></td><td><input class=textbox type="text" name="url" size=25 maxlength=255></td></tr>
		<tr valign=top><td><?php echo translate("Avatar: "); ?><br>[ <a href=user.php?op=avatarlist>List</a> ]</td><td>
		<select name="user_avatar" onChange="showimage()">
<?
		$direktori = "images/forum/avatar";
		$handle=opendir($direktori);
		while ($file = readdir($handle))
			{
			$filelist[] = $file;
		}
		asort($filelist);
		while (list ($key, $file) = each ($filelist))
		{
		ereg(".gif|.jpg",$file);
		if ($file == "." || $file == "..") $a=1;
		else {
			echo "<option value=$file>$file</option>";
			}
		}
?>
		</select>&nbsp;&nbsp;<img src="images/forum/avatar/blank.gif" name="avatar" width="32" height="32">
		</td></tr>
		<tr><td><?php echo translate("Your ICQ: "); ?></td><td><input class=textbox type="text" name="user_icq" size=20 maxlength=20></td></tr>
		<tr><td><?php echo translate("Your AIM: "); ?></td><td><input class=textbox type="text" name="user_aim" size=20 maxlength=20></td></tr>							
		<tr><td><?php echo translate("Your YIM: "); ?></td><td><input class=textbox type="text" name="user_yim" size=20 maxlength=20></td></tr>
		<tr><td><?php echo translate("Your MSNM: "); ?></td><td><input class=textbox type="text" name="user_msnm" size=20 maxlength=20></td></tr>
		<tr><td><?php echo translate("Location: "); ?></td><td><input class=textbox type="text" name="user_from" size=25 maxlength=60></td></tr>
		<tr><td><?php echo translate("Occupation: "); ?></td><td><input class=textbox type="text" name="user_occ" size=25 maxlength=60></td></tr>
		<tr><td><?php echo translate("Interest: "); ?></td><td><input class=textbox type="text" name="user_intrest" size=25 maxlength=255></td></tr>
		<tr><td><?php echo translate("Option: "); ?></td><td><INPUT TYPE="CHECKBOX" NAME="user_viewemail" VALUE="1"> Allow other users to view my email address</td></tr>
		<tr><td><?php echo translate("Signature: "); ?></td><td><TEXTAREA class=textbox NAME="user_sig" ROWS=6 COLS=45></TEXTAREA></td></tr>
		<input type=hidden name=op value="new user">
		<tr><td></td><td><input type="submit" value="<?php echo translate("New User"); ?>"></td></tr>
		</form>
		</table>
		<font size=2><?php echo translate("(Password will be sent to the email address you enter.)"); ?><br><br>
		<font size=2><?php echo translate("Notice: Account preferences are cookie based."); ?></font><br>
		<?php echo translate("As a registered user you can:"); ?><br>
		<li> <?php echo translate("Post comments with your name"); ?>
		<li> <?php echo translate("Send news with your name"); ?>
		<li> <?php echo translate("Have a personal box in the Home"); ?>
		<li> <?php echo translate("Select how many news you want in the Home"); ?>
		<li> <?php echo translate("Customize the comments"); ?>
		<li> <?php echo translate("Select different themes"); ?>
		<li> <?php echo translate("some other cool stuff..."); ?><br>
		<?php echo translate("Register Now! It's Free!"); ?><br>
		<?php echo translate("We don't sell/give to others your personal info."); ?>
		</td</tr></table></td</tr></table>
		<br><br>
		<?php
		OpenTable4();
		?>
		<b><?php echo translate("Lost your Password?"); ?></b><br><br>
		<font size=2>
		<?php echo translate("No problem. Just type your Nickname and click on send button."); ?><br>
		<?php echo translate("Confirmation Info"); ?><br>
		<form action="user.php" method="post">
		<?php echo translate("Nickname: "); ?><input class=textbox type="text" name="uname" size=26 maxlength=25>&nbsp;&nbsp;
		<?php echo translate("Confirmation Code: "); ?><input class=textbox type="text" name="code" size=5 maxlength=6><br>
		<input type=hidden name=op value=mailpasswd>
		<input type="submit" value="<?php echo translate("Send Password"); ?>">
		</td></tr></table></td></tr></table></form>

		<?PHP
		include("footer.php");
	} elseif(isset($user)) {
		global $cookie;
		cookiedecode($user);
		dbconnect();
		userinfo($cookie[1]);
	}
}

function logout() {
    setcookie("user");
    include("header.php");
    OpenTable3();
    echo "
    <center><font size=\"4\">
    ".translate("You are now logged out")."
    <br></font></center>
    ";
    CloseTable();
    include("footer.php");
}

function mail_password($uname, $code) {
    global $sitename, $system, $adminmail;
	$result = mysql_query("select email, pass from users where (uname='$uname')");
	if(!$result) {
		echo "<center>".translate("Sorry, no corresponding user info was found")."</center>";
	} else {
		$host_name = getenv("REMOTE_ADDR");
		list($email, $pass) = mysql_fetch_row($result);

		$areyou = substr($pass, 0, 5);
		if ($areyou==$code) {
		
		$newpass=makepass();
		$message = "".translate("The user account")." '$uname' ".translate("at")." $sitename ".translate("has this email associated with it.")."  ".translate("A web user from")." $host_name ".translate("has just requested that password be sent.")."\n\n".translate("Your New Password is:")." $newpass\n\n ".translate("You can change it after you login at")." $nuke_url/user.php\n\n".translate("If you didn't ask for this, don't worry. You are seeing this message, not 'them'. If this was an error just login with your new password.")."";
		$subject="".translate("User Password for")." $uname";
		mail($email, $subject, $message, "From: $adminmail\nX-Mailer: PHP/" . phpversion());

	// Next step: add the new password to the database
	
		if(!$system) {
		    $cryptpass=crypt($newpass);
		} else {
		    $cryptpass=$newpass;
		}
		$query="update users set pass='$cryptpass' where uname='$uname'";
		if(!mysql_query($query)) {
			echo "mail_password: could not update user entry. Contact the Administrator";
		}
	
		$titlebar = "User password sent";
		include ("header.php");
		echo "<center>".translate("Password for")." $uname ".translate("mailed.")."";
		include ("footer.php");

	// If no Code, send it

		} else {

    		$result = mysql_query("select email, pass from users where (uname='$uname')");
		if(!$result) {
		    echo "<center>".translate("Sorry, no corresponding user info was found")."</center>";
		} else {
		    $host_name = getenv("REMOTE_ADDR");
		    list($email, $pass) = mysql_fetch_row($result);
		    $areyou = substr($pass, 0, 5);

		$message = "".translate("The user account")." '$uname' ".translate("at")." $sitename ".translate("has this email associated with it.")." ".translate("A web user from")." $host_name ".translate("has just requested a Confirmation Code to change the password.")."\n\n".translate("Your Confirmation Code is:")." $areyou \n\n".translate("With this code you can now assign a new password at")." $nuke_url/user.php\n".translate("If you didn't ask for this, don't worry. Just delete this Email.")."";
		$subject="".translate("Confirmation Code for")." $uname";
		mail($email, $subject, $message, "From: $adminmail\nX-Mailer: PHP/" . phpversion());

		include ("header.php");
		echo "<center>".translate("Confirmation Code for")." $uname ".translate("mailed.")."";
		include ("footer.php");
    	    }		
	}
    }
}

function docookie($setuid, $setuname, $setpass, $setstorynum, $setumode, $setuorder, $setthold, $setnoscore, $setublockon, $settheme, $setcommentmax) {
    $info = base64_encode("$setuid:$setuname:$setpass:$setstorynum:$setumode:$setuorder:$setthold:$setnoscore:$setublockon:$settheme:$setcommentmax");
    setcookie("user","$info",time()+15552000);
}

function login($uname, $pass) {
	global $setinfo,$system;
	dbconnect();
	$result = mysql_query("select pass, uid, storynum, umode, uorder, thold, noscore, ublockon, theme, commentmax from users where uname='$uname'");
	if(mysql_num_rows($result)==1) {
		$setinfo = mysql_fetch_array($result);
		$dbpass=$setinfo[pass];
		
		if(!$system)
	  	   $pass=crypt($pass,substr($dbpass,0,2));

		if (strcmp($dbpass,$pass)) {
                        Header("Location: user.php?stop=1");
                        return;
                }



		docookie($setinfo[uid], $uname, $pass, $setinfo[storynum], $setinfo[umode], $setinfo[uorder], $setinfo[thold], $setinfo[noscore], $setinfo[ublockon], $setinfo[theme], $setinfo[commentmax]);
		Header("Location: user.php?op=userinfo&bypass=1&uname=$uname");
	} else {
		Header("Location: user.php?stop=1");
	}
}

function infoCheck($uid, $email, $url) {
	global $stop;
	if ((!$email) || ($email=="") || (!ereg("[@]",$email)) || (!ereg("[.]",$email)) || (strlen($email) < 7) || (ereg("[^a-zA-Z0-9@.]",$email))) { $stop = "Invalid email<br>"; }
	if (($url) && ($url!="http://") && ((!ereg("[http://]",$url)) || (!ereg("[.]",$url)) || (strlen($url) < 12) || (ereg("[^a-zA-Z0-9~.:/]",$url)))) { $stop = "Invalid URL<br>"; }
	dbconnect();
	list($test) = mysql_fetch_row(mysql_query("select email from users where (email='$email' and uid!=$uid)"));
	if ("$test"=="$email") $stop = "<center>".translate("ERROR: Email address already registered")."</center><br>";
	return($stop);
}

function edituser() {
	global $user, $userinfo, $cookie;
	include("header.php");
	getusrinfo($user);
	nav();
	OpenTable4();
	?>
	<table cellpadding=8 border=0><tr><td>
	<form name="Register" action="user.php" method="post">
	<b><?php echo translate("Real Name"); ?></b> <?php echo translate("(optional)"); ?><br>
	<input class=textbox type="text" name="name" value="<?PHP echo"$userinfo[name]"; ?>" size=30 maxlength=60><br>
	<b><?php echo translate("Real Email"); ?></b> <?php echo translate("(required)"); ?><br>
	<?php echo translate("(This Email will not be public but is required, will be used to send your password if you lost it)"); ?><br>
	<input class=textbox type="text" name="email" value="<?PHP echo"$userinfo[email]"; ?>" size=30 maxlength=60><br>
	<b><?php echo translate("Fake Email"); ?></b> <?php echo translate("(optional)"); ?><br>
	<?php echo translate("(This Email will be public. Just type what you want, Spam proof)"); ?><br>
	<input class=textbox type="text" name="femail" value="<?PHP echo"$userinfo[femail]"; ?>" size=30 maxlength=60><br>
	<b><?php echo translate("Your HomePage"); ?></b> <?php echo translate("(optional)"); ?><br>
	<input class=textbox type="text" name="url" value="<?PHP echo"$userinfo[url]"; ?>" size=30 maxlength=100><br>
	
	<b><?php echo translate("Your Avatar"); ?></b> <?php echo translate("(optional)"); ?> [ <a href=user.php?op=avatarlist>List</a> ]<br>
        <select name="user_avatar" onChange="showimage()">
	        <OPTION value="<?PHP echo"$userinfo[user_avatar]"; ?>"><?PHP echo"$userinfo[user_avatar]"; ?></OPTION>
<?
		$direktori = "images/forum/avatar";
		$handle=opendir($direktori);
		while ($file = readdir($handle))
			{
			$filelist[] = $file;
		}
		asort($filelist);
		while (list ($key, $file) = each ($filelist))
		{
		ereg(".gif|.jpg",$file);
		if ($file == "." || $file == "..") $a=1;
		else {
			echo "<option value=$file>$file</option>";
			}
		}
?>
        </select>&nbsp;&nbsp;<img src="images/forum/avatar/<?PHP echo"$userinfo[user_avatar]"; ?>" name="avatar" width="32" height="32">
	<br><br>
	<b><?php echo translate("Your ICQ"); ?></b> <?php echo translate("(optional)"); ?><br>
	<input class=textbox type="text" name="user_icq" value="<?PHP echo"$userinfo[user_icq]"; ?>" size=30 maxlength=100><br>
	<b><?php echo translate("Your AIM"); ?></b> <?php echo translate("(optional)"); ?><br>
	<input class=textbox type="text" name="user_aim" value="<?PHP echo"$userinfo[user_aim]"; ?>" size=30 maxlength=100><br>
	<b><?php echo translate("Your YIM"); ?></b> <?php echo translate("(optional)"); ?><br>
	<input class=textbox type="text" name="user_yim" value="<?PHP echo"$userinfo[user_yim]"; ?>" size=30 maxlength=100><br>
	<b><?php echo translate("Your MSNM"); ?></b> <?php echo translate("(optional)"); ?><br>
	<input class=textbox type="text" name="user_msnm" value="<?PHP echo"$userinfo[user_msnm]"; ?>" size=30 maxlength=100><br>			
	<b><?php echo translate("Your Location"); ?></b> <?php echo translate("(optional)"); ?><br>
	<input class=textbox type="text" name="user_from" value="<?PHP echo"$userinfo[user_from]"; ?>" size=30 maxlength=100><br>
	<b><?php echo translate("Your Occupation"); ?></b> <?php echo translate("(optional)"); ?><br>
	<input class=textbox type="text" name="user_occ" value="<?PHP echo"$userinfo[user_occ]"; ?>" size=30 maxlength=100><br>
	<b><?php echo translate("Your Interest"); ?></b> <?php echo translate("(optional)"); ?><br>
	<input class=textbox type="text" name="user_intrest" value="<?PHP echo"$userinfo[user_intrest]"; ?>" size=30 maxlength=100><br>
	<b><?php echo translate("Signature"); ?></b> <?php echo translate("(optional)"); ?><br>
	<?php echo translate("(255 characters max. Type your signature with HTML coding)"); ?><br>
	<textarea class=textbox wrap=virtual cols=50 rows=5 name=user_sig><?PHP echo"$userinfo[user_sig]"; ?></TEXTAREA><br>
	<?php
	$asig = mysql_query("select attachsig from users_status where uid='$userinfo[uid]'");
	list($attsig) = mysql_fetch_row($asig);
	if ($attsig == 1) {
	    $sel = "checked";
	} else {
	    $sel = "";
	}
	?>
	<input type=checkbox name=attach <?php echo $sel ?>> <?php echo translate("Show signature"); ?>
	<br><br>
	<b><?php echo translate("Extra Info"); ?></b> <?php echo translate("(optional)"); ?><br>
	<?php echo translate("(255 characters max. Type what others can know about yourself)"); ?><br>
	<textarea class=textbox wrap=virtual cols=50 rows=5 name=bio><?PHP echo"$userinfo[bio]"; ?></TEXTAREA>
	<br><br>
	<b><?php echo translate("Password"); ?></b> <?php echo translate("(type a new password twice to change it)"); ?><br>
	<input class=textbox type="password" name="pass" size=10 maxlength=20> <input class=textbox type="password" name="vpass" size=10 maxlength=20>
	<br><br>
	<input type="hidden" name="uname" value="<?PHP echo"$userinfo[uname]"; ?>">
	<input type="hidden" name="uid" value="<?PHP echo"$userinfo[uid]"; ?>">
	<input type="hidden" name="op" value="saveuser">
	<input type="submit" value="<?php echo translate("Save Changes"); ?>">
	</form></td></tr></table>
	<?PHP
	CloseTable();
	echo "<br><br>";
	include("footer.php");
}


function saveuser($uid, $name, $uname, $email, $femail, $url, $pass, $vpass, $bio, $user_avatar, $user_icq, $user_occ, $user_from, $user_intrest, $user_sig, $user_aim, $user_yim, $user_msnm, $attach) {
	global $user, $cookie, $userinfo, $EditedMessage, $system;
	cookiedecode($user);
	$check = $cookie[1];
	$result = mysql_query("select uid from users where uname='$check'");
	list($vuid) = mysql_fetch_row($result);
	if (($check == $uname) AND ($uid == $vuid)) {
	if ((isset($pass)) && ("$pass" != "$vpass")) {
		echo "<center>".translate("Both passwords are different. They need to be identical.")."</center>";
	} elseif (($pass != "") && (strlen($pass) < $minpass)) {
		echo "<center>".translate("Sorry, your password must be at least")." <b>$minpass</b> ".translate("characters long")."</center>";
	} else {
		if ($bio) { filter_text($bio); $bio = $EditedMessage; $bio = FixQuotes($bio); }
		if ($pass != "") {
			dbconnect();
			cookiedecode($user);
			mysql_query("LOCK TABLES users WRITE");
			if(!$system)
				$pass=crypt($pass);
			mysql_query("update users set name='$name', email='$email', femail='$femail', url='$url', pass='$pass', bio='$bio' , user_avatar='$user_avatar', user_icq='$user_icq', user_occ='$user_occ', user_from='$user_from', user_intrest='$user_intrest', user_sig='$user_sig', user_aim='$user_aim', user_yim='$user_yim', user_msnm='$user_msnm' where uid='$uid'");
			$result = mysql_query("select uid, uname, pass, storynum, umode, uorder, thold, noscore, ublockon, theme from users where uname='$uname' and pass='$pass'");
			if(mysql_num_rows($result)==1) {
				$userinfo = mysql_fetch_array($result);
				docookie($userinfo[uid],$userinfo[uname],$userinfo[pass],$userinfo[storynum],$userinfo[umode],$userinfo[uorder],$userinfo[thold],$userinfo[noscore],$userinfo[ublockon],$userinfo[theme],$userinfo[commentmax]);
			} else {
				echo "<center>".translate("Something screwed up... don't you hate that?")."</center><br>";
			}
			mysql_query("UNLOCK TABLES");
		} else {
			dbconnect();
			mysql_query("update users set name='$name', email='$email', femail='$femail', url='$url', bio='$bio' , user_avatar='$user_avatar', user_icq='$user_icq', user_occ='$user_occ', user_from='$user_from', user_intrest='$user_intrest', user_sig='$user_sig', user_aim='$user_aim', user_yim='$user_yim', user_msnm='$user_msnm' where uid='$uid'");
			if ($attach) {
			    $a = 1;
			} else {
			    $a = 0;
			}
			mysql_query("update users_status set attachsig='$a' where uid='$uid'");
		}
		Header("Location: user.php?"); // question is wierd bugfix
	}
    }
}

function edithome() {
	global $user, $userinfo;
	include ("header.php");
	// include ("config.php");
	getusrinfo($user);
	nav();
	if($userinfo[theme]=="") {
	    $userinfo[theme] = "$Default_Theme";
	}
	OpenTable4();
	echo "
	<form action=\"user.php\" method=\"post\">
	<b>".translate("News number in the Home")."</b> (max. 127):
	<input class=\"textbox\" type=\"text\" name=\"storynum\" size=3 maxlength=3 value=\"$userinfo[storynum]\">
	<br><br>";
	if ($userinfo[ublockon]==1) {
	    $sel = "checked";
	}
	echo "
	<INPUT type=\"checkbox\" name=\"ublockon\" $sel>
	<B>".translate("Activate Personal Menu")."</B>
	<br>".translate("(Check this option and the following text will appear in the Home)")."
	<br>".translate("(You can use HTML code to put links, for example)")."<br>
	<textarea class=\"textbox\" cols=55 rows=5 name=\"ublock\">$userinfo[ublock]</textarea>
	<br><br>
	<input type=\"hidden\" name=\"theme\" value=\"$userinfo[theme]\">
	<input type=\"hidden\" name=\"uname\" value=\"$userinfo[uname]\">
	<input type=\"hidden\" name=\"uid\" value=\"$userinfo[uid]\">
	<input type=\"hidden\" name=\"op\" value=\"savehome\">
	<input type=\"submit\" value=\"".translate("Save Changes!")."\">
	</form>";
	CloseTable();
	echo "<br><br>\n\n";
	include ("footer.php");
}

function chgtheme() {
	global $user, $userinfo;
	include ("header.php");
	getusrinfo($user);
	nav();
	OpenTable4();
	?>
	<center>
	<form action="user.php" method="post">
	<b><?php echo translate("Select One Theme"); ?></b><br>
	<select class=textbox name=theme>
	<?php
	include("themes/list.php");
	$themelist = explode(" ", $themelist);
	for ($i=0; $i < sizeof($themelist); $i++) {
		if($themelist[$i]!="") {
			echo "<option value=\"$themelist[$i]\" ";
			if((($userinfo[theme]=="") && ($themelist[$i]=="$Default_Theme")) || ($userinfo[theme]==$themelist[$i])) echo "selected";
			echo ">$themelist[$i]\n";
		}
	}
	if($userinfo[theme]=="") $userinfo[theme] = "Default_Theme";
	?>
	</select><br>
	<?php echo "
	".translate("This option will change the look for the whole site.")."<br>
	".translate("The changes will be valid only to you.")."<br>
	".translate("Each user can view the site with different theme.")."<br>
	"; ?>
	<br>

	<input type="hidden" name="storynum" value="<?PHP echo"$userinfo[storynum]"; ?>">
	<input type="hidden" name="ublockon" value="<?PHP echo"$userinfo[ublockon]"; ?>">
	<input type="hidden" name="ublock" value="<?PHP echo"$userinfo[ublock]"; ?>">

	<input type="hidden" name="uname" value="<?PHP echo"$userinfo[uname]"; ?>">
	<input type="hidden" name="uid" value="<?PHP echo"$userinfo[uid]"; ?>">
	<input type="hidden" name="op" value="savetheme">
	<input type="submit" value="<?php echo translate("Save Changes!"); ?>">
	</form>
	<?PHP
	CloseTable();
	echo "<br><br>";
	include ("footer.php");
}


function savehome($uid, $uname, $theme, $storynum, $ublockon, $ublock) {
    global $user, $cookie, $userinfo;
    cookiedecode($user);
    $check = $cookie[1];
    $result = mysql_query("select uid from users where uname='$check'");
    list($vuid) = mysql_fetch_row($result);
    if (($check == $uname) AND ($uid == $vuid)) {	
	dbconnect();
	if(isset($ublockon)) $ublockon=1; else $ublockon=0;	
	$ublock = FixQuotes($ublock);
	mysql_query("update users set storynum='$storynum', ublockon='$ublockon', ublock='$ublock' where uid=$uid");
	getusrinfo($user);
	docookie($userinfo[uid],$userinfo[uname],$userinfo[pass],$userinfo[storynum],$userinfo[umode],$userinfo[uorder],$userinfo[thold],$userinfo[noscore],$userinfo[ublockon],$userinfo[theme],$userinfo[commentmax]);
	Header("Location: user.php?theme=$theme");
    }
}

function savetheme($uid, $theme) {
    global $user, $cookie, $userinfo;
    cookiedecode($user);
    $check = $cookie[1];
    $result = mysql_query("select uid from users where uname='$check'");
    list($vuid) = mysql_fetch_row($result);
    if ($uid == $vuid) {
	dbconnect();
	mysql_query("update users set theme='$theme' where uid=$uid");
	getusrinfo($user);
	docookie($userinfo[uid],$userinfo[uname],$userinfo[pass],$userinfo[storynum],$userinfo[umode],$userinfo[uorder],$userinfo[thold],$userinfo[noscore],$userinfo[ublockon],$userinfo[theme],$userinfo[commentmax]);
	Header("Location: user.php?theme=$theme");
    }
}

function editcomm() {
	global $user, $userinfo;
	include ("header.php");
	getusrinfo($user);
	nav();
	OpenTable4();
	?>
	<table cellpadding=8 border=0><tr><td>
	<form action="user.php" method="post">
	<b><?php echo translate("Display Mode"); ?></b>
	<select class=textbox name=umode>
	<option value="nocomments" <?PHP if ($userinfo[umode] == 'nocomments') { echo "selected"; } ?>><?php echo translate("No Comments"); ?>
	<option value="nested" <?PHP if ($userinfo[umode] == 'nested') { echo "selected"; } ?>><?php echo translate("Nested"); ?>
	<option value="flat" <?PHP if ($userinfo[umode] == 'flat') { echo "selected"; } ?>><?php echo translate("Flat"); ?>
	<option value="thread" <?PHP if (!isset($userinfo[umode]) || ($userinfo[umode]=="") || $userinfo[umode]=='thread') { echo "selected"; } ?>><?php echo translate("Thread"); ?>
	</select>
	<br><br>
	<b><?php echo translate("Sort Order"); ?></b>
	<select class=textbox name=uorder>
	<option value="0" <?PHP if (!$userinfo[uorder]) { echo "selected"; } ?>><?php echo translate("Oldest First"); ?>
	<option value="1" <?PHP if ($userinfo[uorder]==1) { echo "selected"; } ?>><?php echo translate("Newest First"); ?>
	<option value="2" <?PHP if ($userinfo[uorder]==2) { echo "selected"; } ?>><?php echo translate("Highest Scores First"); ?>
	</select>
	<br><br>
	<b><?php echo translate("Threshold"); ?></b>
	<?php echo translate("Comments scored less than this setting will be ignored."); ?><br>
	<select class=textbox name=thold>
	<option value="-1" <?PHP if ($userinfo[thold]==-1) { echo "selected"; } ?>>-1: <?php echo translate("Uncut and Raw"); ?>
	<option value="0" <?PHP if ($userinfo[thold]==0) { echo "selected"; } ?>>0: <?php echo translate("Almost Everything"); ?>
	<option value="1" <?PHP if ($userinfo[thold]==1) { echo "selected"; } ?>>1: <?php echo translate("Filter Most Anon"); ?>
	<option value="2" <?PHP if ($userinfo[thold]==2) { echo "selected"; } ?>>2: <?php echo translate("Score"); ?> +2
	<option value="3" <?PHP if ($userinfo[thold]==3) { echo "selected"; } ?>>3: <?php echo translate("Score"); ?> +3
	<option value="4" <?PHP if ($userinfo[thold]==4) { echo "selected"; } ?>>4: <?php echo translate("Score"); ?> +4
	<option value="5" <?PHP if ($userinfo[thold]==5) { echo "selected"; } ?>>5: <?php echo translate("Score"); ?> +5
	</select><br>
	<?php echo translate("Anonymous posts start at 0, logged in posts start at 1. Moderators add and subtract points."); ?>
	<br><br>
	<INPUT type=checkbox name=noscore <?PHP if ($userinfo[noscore]==1) { echo "checked"; } ?>><B> <?php echo translate("Do Not Display Scores"); ?></B> <?php echo translate("(Hides score: They still apply, you just don't see them.)"); ?>
	<br><br>
	<b><?php echo translate("Max Comment Length"); ?></b> <?php echo translate("(Truncates long comments, and adds a Read More link. Set really big to disable)"); ?><br>
	<input class=textbox type="text" name="commentmax" value="<?PHP echo $userinfo[commentmax] ?>" size=11 maxlength=11> bytes (1024 bytes = 1K)
	<br><br>
	<input type="hidden" name="uname" value="<?PHP echo"$userinfo[uname]"; ?>">
	<input type="hidden" name="uid" value="<?PHP echo"$userinfo[uid]"; ?>">
	<input type="hidden" name="op" value="savecomm">
	<input type="submit" value="<?php echo translate("Save Changes"); ?>">
	</form></td></tr></table>
	<?PHP
	CloseTable();
	echo "<br><br>";
	include ("footer.php");
}

function savecomm($uid, $uname, $umode, $uorder, $thold, $noscore, $commentmax) {
    global $user, $cookie, $userinfo;
    cookiedecode($user);
    $check = $cookie[1];
    $result = mysql_query("select uid from users where uname='$check'");
    list($vuid) = mysql_fetch_row($result);
    if (($check == $uname) AND ($uid == $vuid)) {	
	dbconnect();
	if(isset($noscore)) $noscore=1; else $noscore=0;
	mysql_query("update users set umode='$umode', uorder='$uorder', thold='$thold', noscore='$noscore', commentmax='$commentmax' where uid=$uid");
	getusrinfo($user);
	docookie($userinfo[uid],$userinfo[uname],$userinfo[pass],$userinfo[storynum],$userinfo[umode],$userinfo[uorder],$userinfo[thold],$userinfo[noscore],$userinfo[ublockon],$userinfo[theme],$userinfo[commentmax]);
	Header("Location: user.php?");
    }
}

function avatarlist() {
include("header.php");
Opentable3();
echo "
<center><font size=3><b>Available Avatar's List</b></font></center><br><br>
<img src=\"images/forum/avatar/001.gif\" border=0 width=32 height=32 Alt=\"001.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/002.gif\" border=0 width=32 height=32 Alt=\"002.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/003.gif\" border=0 width=32 height=32 Alt=\"003.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/004.gif\" border=0 width=32 height=32 Alt=\"004.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/005.gif\" border=0 width=32 height=32 Alt=\"005.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/006.gif\" border=0 width=32 height=32 Alt=\"006.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/007.gif\" border=0 width=32 height=32 Alt=\"007.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/008.gif\" border=0 width=32 height=32 Alt=\"008.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/009.gif\" border=0 width=32 height=32 Alt=\"009.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/010.gif\" border=0 width=32 height=32 Alt=\"010.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/011.gif\" border=0 width=32 height=32 Alt=\"011.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/012.gif\" border=0 width=32 height=32 Alt=\"012.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/013.gif\" border=0 width=32 height=32 Alt=\"013.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/014.gif\" border=0 width=32 height=32 Alt=\"014.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/015.gif\" border=0 width=32 height=32 Alt=\"015.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/016.gif\" border=0 width=32 height=32 Alt=\"016.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/017.gif\" border=0 width=32 height=32 Alt=\"017.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/018.gif\" border=0 width=32 height=32 Alt=\"018.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/019.gif\" border=0 width=32 height=32 Alt=\"019.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/020.gif\" border=0 width=32 height=32 Alt=\"020.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/021.gif\" border=0 width=32 height=32 Alt=\"021.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/022.gif\" border=0 width=32 height=32 Alt=\"022.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/023.gif\" border=0 width=32 height=32 Alt=\"023.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/024.gif\" border=0 width=32 height=32 Alt=\"024.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/025.gif\" border=0 width=32 height=32 Alt=\"025.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/026.gif\" border=0 width=32 height=32 Alt=\"026.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/027.gif\" border=0 width=32 height=32 Alt=\"027.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/028.gif\" border=0 width=32 height=32 Alt=\"028.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/029.gif\" border=0 width=32 height=32 Alt=\"029.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/030.gif\" border=0 width=32 height=32 Alt=\"030.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/031.gif\" border=0 width=32 height=32 Alt=\"031.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/032.gif\" border=0 width=32 height=32 Alt=\"032.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/033.gif\" border=0 width=32 height=32 Alt=\"033.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/034.gif\" border=0 width=32 height=32 Alt=\"034.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/035.gif\" border=0 width=32 height=32 Alt=\"035.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/036.gif\" border=0 width=32 height=32 Alt=\"036.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/037.gif\" border=0 width=32 height=32 Alt=\"037.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/038.gif\" border=0 width=32 height=32 Alt=\"038.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/039.gif\" border=0 width=32 height=32 Alt=\"039.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/040.gif\" border=0 width=32 height=32 Alt=\"040.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/041.gif\" border=0 width=32 height=32 Alt=\"041.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/042.gif\" border=0 width=32 height=32 Alt=\"042.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/043.gif\" border=0 width=32 height=32 Alt=\"043.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/044.gif\" border=0 width=32 height=32 Alt=\"044.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/045.gif\" border=0 width=32 height=32 Alt=\"045.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/046.gif\" border=0 width=32 height=32 Alt=\"046.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/047.gif\" border=0 width=32 height=32 Alt=\"047.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/048.gif\" border=0 width=32 height=32 Alt=\"048.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/049.gif\" border=0 width=32 height=32 Alt=\"049.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/050.gif\" border=0 width=32 height=32 Alt=\"050.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/051.gif\" border=0 width=32 height=32 Alt=\"051.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/052.gif\" border=0 width=32 height=32 Alt=\"052.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/053.gif\" border=0 width=32 height=32 Alt=\"053.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/054.gif\" border=0 width=32 height=32 Alt=\"054.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/055.gif\" border=0 width=32 height=32 Alt=\"055.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/056.gif\" border=0 width=32 height=32 Alt=\"056.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/057.gif\" border=0 width=32 height=32 Alt=\"057.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/058.gif\" border=0 width=32 height=32 Alt=\"058.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/059.gif\" border=0 width=32 height=32 Alt=\"059.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/060.gif\" border=0 width=32 height=32 Alt=\"060.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/061.gif\" border=0 width=32 height=32 Alt=\"061.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/062.gif\" border=0 width=32 height=32 Alt=\"062.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/063.gif\" border=0 width=32 height=32 Alt=\"063.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/064.gif\" border=0 width=32 height=32 Alt=\"064.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/065.gif\" border=0 width=32 height=32 Alt=\"065.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/066.gif\" border=0 width=32 height=32 Alt=\"066.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/067.gif\" border=0 width=32 height=32 Alt=\"067.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/068.gif\" border=0 width=32 height=32 Alt=\"068.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/069.gif\" border=0 width=32 height=32 Alt=\"069.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/070.gif\" border=0 width=32 height=32 Alt=\"070.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/071.gif\" border=0 width=32 height=32 Alt=\"071.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/072.gif\" border=0 width=32 height=32 Alt=\"072.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/073.gif\" border=0 width=32 height=32 Alt=\"073.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/074.gif\" border=0 width=32 height=32 Alt=\"074.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/075.gif\" border=0 width=32 height=32 Alt=\"075.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/076.gif\" border=0 width=32 height=32 Alt=\"076.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/077.gif\" border=0 width=32 height=32 Alt=\"077.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/078.gif\" border=0 width=32 height=32 Alt=\"078.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/079.gif\" border=0 width=32 height=32 Alt=\"079.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/080.gif\" border=0 width=32 height=32 Alt=\"080.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/081.gif\" border=0 width=32 height=32 Alt=\"081.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/082.gif\" border=0 width=32 height=32 Alt=\"082.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/083.gif\" border=0 width=32 height=32 Alt=\"083.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/084.gif\" border=0 width=32 height=32 Alt=\"084.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/085.gif\" border=0 width=32 height=32 Alt=\"085.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/086.gif\" border=0 width=32 height=32 Alt=\"086.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/087.gif\" border=0 width=32 height=32 Alt=\"087.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/088.gif\" border=0 width=32 height=32 Alt=\"088.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/089.gif\" border=0 width=32 height=32 Alt=\"089.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/090.gif\" border=0 width=32 height=32 Alt=\"090.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/091.gif\" border=0 width=32 height=32 Alt=\"091.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/092.gif\" border=0 width=32 height=32 Alt=\"092.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/093.gif\" border=0 width=32 height=32 Alt=\"093.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/094.gif\" border=0 width=32 height=32 Alt=\"094.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/095.gif\" border=0 width=32 height=32 Alt=\"095.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/096.gif\" border=0 width=32 height=32 Alt=\"096.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/097.gif\" border=0 width=32 height=32 Alt=\"097.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/098.gif\" border=0 width=32 height=32 Alt=\"098.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/099.gif\" border=0 width=32 height=32 Alt=\"099.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/100.gif\" border=0 width=32 height=32 Alt=\"100.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/101.gif\" border=0 width=32 height=32 Alt=\"101.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/102.gif\" border=0 width=32 height=32 Alt=\"102.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/103.gif\" border=0 width=32 height=32 Alt=\"103.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/104.gif\" border=0 width=32 height=32 Alt=\"104.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/105.gif\" border=0 width=32 height=32 Alt=\"105.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/106.gif\" border=0 width=32 height=32 Alt=\"106.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/107.gif\" border=0 width=32 height=32 Alt=\"107.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/108.gif\" border=0 width=32 height=32 Alt=\"108.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/109.gif\" border=0 width=32 height=32 Alt=\"109.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/110.gif\" border=0 width=32 height=32 Alt=\"110.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/111.gif\" border=0 width=32 height=32 Alt=\"111.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/112.gif\" border=0 width=32 height=32 Alt=\"112.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/113.gif\" border=0 width=32 height=32 Alt=\"113.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/114.gif\" border=0 width=32 height=32 Alt=\"114.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/115.gif\" border=0 width=32 height=32 Alt=\"115.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/116.gif\" border=0 width=32 height=32 Alt=\"116.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/117.gif\" border=0 width=32 height=32 Alt=\"117.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/118.gif\" border=0 width=32 height=32 Alt=\"118.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/119.gif\" border=0 width=32 height=32 Alt=\"119.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/120.gif\" border=0 width=32 height=32 Alt=\"120.gif\" hspace=10 vspace=10>
<img src=\"images/forum/avatar/121.gif\" border=0 width=32 height=32 Alt=\"121.gif\" hspace=10 vspace=10>
<br><br><br>
<center>
<b>[ <A HREF=\"javascript:history.go(-1)\">Go Back</a> ]</b>
</center>
";
CloseTable();
include("footer.php");
}

switch($op) {

	case "logout":
		logout();
		break;

	case "lost_pass":
		lost_pass();
		break;

	case "new user":
		confirmNewUser($uname, $email, $url, $user_avatar, $user_icq, $user_occ, $user_from, $user_intrest, $user_sig, $user_viewemail, $user_aim, $user_yim, $user_msnm);
		break;

	case "finish":
		finishNewUser($uname, $email, $url, $user_avatar, $user_icq, $user_occ, $user_from, $user_intrest, $user_sig, $user_viewemail, $user_aim, $user_yim, $user_msnm);
		break;

	case "mailpasswd":
		mail_password($uname, $code);
		break;

	case "userinfo":
		dbconnect();
		userinfo($uname, $bypass);
		break;

	case "login":
		login($uname, $pass);
		break;

	case "dummy":
	// this is needed to give the cookie a chance to digest
		// if (!isset($config)) { include("config.php"); }
		Header("Location: user.php");
		break;

	case "edituser":
		edituser();
		break;

	case "saveuser":
		saveuser($uid, $name, $uname, $email, $femail, $url, $pass, $vpass, $bio, $user_avatar, $user_icq, $user_occ, $user_from, $user_intrest, $user_sig, $user_aim, $user_yim, $user_msnm, $attach);

		break;

	case "edithome":
		edithome();
		break;
	
	case "chgtheme":
		chgtheme();
		break;
	
	case "savehome":
		savehome($uid, $uname, $theme, $storynum, $ublockon, $ublock);
		break;

	case "savetheme":
		savetheme($uid, $theme);
		break;

	case "avatarlist":
		avatarlist();
		break;

	case "editcomm":
		editcomm();
		break;

	case "savecomm":
		savecomm($uid, $uname, $umode, $uorder, $thold, $noscore, $commentmax);
		break;

	default:
		main($user);
		break;
}
?>
