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
$hlpfile = "manual/banners.html";
$result = mysql_query("select radminsuper from authors where aid='$aid'");
list($radminsuper) = mysql_fetch_row($result);
if ($radminsuper==1) {

/*********************************************************/
/* Banners Administration Functions                      */
/*********************************************************/

function BannersAdmin() {
    global $hlpfile, $admin;
	include ("header.php");
	GraphicAdmin($hlpfile);
	echo "<font size=4><center><b>".translate("Banners Administration")."</b></center><br><br>";
// Banners List
	echo "<a name=top>";
	OpenTable4();
	echo "<font size=3>
	<center><b>".translate("Current Active Banners")."</b></center><br>
	<font size=3>
	<table width=100% border=0><tr>
	<td bgcolor=0000BA><font color=white><center>".translate("ID")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Impressions")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Imp. Left")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Clicks")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("% Clicks")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Client Name")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Functions")."</td><tr>";
	$result = mysql_query("select bid, cid, imptotal, impmade, clicks, date from banner order by bid");
	
	while(list($bid, $cid, $imptotal, $impmade, $clicks, $date) = mysql_fetch_row($result)) {
	    $result2 = mysql_query("select cid, name from bannerclient where cid=$cid");
	    list($cid, $name) = mysql_fetch_row($result2);
	    if($impmade==0) {
		$percent = 0;
	    } else {
		$percent = substr(100 * $clicks / $impmade, 0, 5);
	    }
	    
	    if($imptotal==0) {
		$left = "".translate("Unlimited")."";
	    } else {
		$left = $imptotal-$impmade;
	    }
	    echo "
	    <td bgcolor=008888 align=center><font color=white>$bid</td>
	    <td bgcolor=008888 align=center><font color=white>$impmade</td>
	    <td bgcolor=008888 align=center><font color=white>$left</td>
	    <td bgcolor=008888 align=center><font color=white>$clicks</td>
	    <td bgcolor=008888 align=center><font color=white>$percent%</td>
	    <td bgcolor=008888 align=center><font color=white>$name</td>
	    <td bgcolor=008888 align=center><font color=white><a href=admin.php?op=BannerEdit&bid=$bid>".translate("Edit")."</a> | <a href=admin.php?op=BannerDelete&bid=$bid&ok=0>".translate("Delete")."</a></td><tr>
	    ";
	}
	echo "</td></tr></table></td></tr></table></td></tr></table><br>";
// Finished Banners List
	echo "<a name=top>";
	OpenTable4();
	echo "<font size=3>
	<center><b>".translate("Finished Banners")."</b></center><br>
	<font size=3>
	<table width=100% border=0><tr>
	<td bgcolor=0000BA><font color=white><center>".translate("ID")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Imp.")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Clicks")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("% Clicks")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Date Started")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Date Ended")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Client Name")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Functions")."</td><tr>";
	$result = mysql_query("select bid, cid, impressions, clicks, datestart, dateend from bannerfinish order by bid");
	
	while(list($bid, $cid, $impressions, $clicks, $datestart, $dateend) = mysql_fetch_row($result)) {
	    $result2 = mysql_query("select cid, name from bannerclient where cid=$cid");
	    list($cid, $name) = mysql_fetch_row($result2);
	    $percent = substr(100 * $clicks / $impressions, 0, 5);
	    echo "
	    <td bgcolor=008888 align=center><font color=white>$bid</td>
	    <td bgcolor=008888 align=center><font color=white>$impressions</td>
	    <td bgcolor=008888 align=center><font color=white>$clicks</td>
	    <td bgcolor=008888 align=center><font color=white>$percent%</td>
	    <td bgcolor=008888 align=center><font color=white>$datestart</td>
	    <td bgcolor=008888 align=center><font color=white>$dateend</td>
	    <td bgcolor=008888 align=center><font color=white>$name</td>
	    <td bgcolor=008888 align=center><font color=white><a href=admin.php?op=BannerFinishDelete&bid=$bid>".translate("Delete")."</a></td><tr>
	    ";
	}
	echo "</td></tr></table></td></tr></table></td></tr></table><br>";

// Clients List
	OpenTable4();
	echo "
	<font size=3>
	<center><b>".translate("Advertising Clients")."</b></center><br>
	<font size=3>
	<table width=100% border=0><tr>
	<td bgcolor=0000BA><font color=white><center>".translate("ID")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Client Name")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Active Banners")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Contact Name")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Contact Email")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Functions")."</td><tr>";
	$result = mysql_query("select cid, name, contact, email from bannerclient  order by cid");
	
	while(list($cid, $name, $contact, $email) = mysql_fetch_row($result)) {
	    $result2 = mysql_query("select cid from banner where cid=$cid");
	    $numrows = mysql_num_rows($result2);
	    echo "
	    <td bgcolor=008888 align=center><font color=white>$cid</td>
	    <td bgcolor=008888 align=center><font color=white>$name</td>
	    <td bgcolor=008888 align=center><font color=white>$numrows</td>
	    <td bgcolor=008888 align=center><font color=white>$contact</td>
	    <td bgcolor=008888 align=center><font color=white>$email</td>
	    <td bgcolor=008888 align=center><font color=white><a href=admin.php?op=BannerClientEdit&cid=$cid>".translate("Edit")."</a> | <a href=admin.php?op=BannerClientDelete&cid=$cid>".translate("Delete")."</a></td><tr>
	    ";
	}
	echo "</td></tr></table></td></tr></table></td></tr></table><br>";
// Add Banner
    $result = mysql_query("select * from bannerclient");
    $numrows = mysql_num_rows($result);
    if($numrows>0) {
	OpenTable4();
	echo"
	<font size=3>
	<b>".translate("Add a New Banner")."</b></center><br><br>
	<font size=3>
	<form action=admin.php?op=BannersAdd method=post>
	".translate("Client Name: ")."
	<select name=cid>";
	$result = mysql_query("select cid, name from bannerclient");
	while(list($cid, $name) = mysql_fetch_row($result)) {
	    echo "<option value=$cid>$name</option>";
	}
	echo "
	</select><br>
	".translate("Impressions Purchased: ")."<input class=textbox type=text name=imptotal size=12 maxlength=11> 0 = ".translate("Unlimited")."<br>
	".translate("Image URL: ")."<input class=textbox type=text name=imageurl size=50 maxlength=100><br>
	".translate("Click URL: ")."<input class=textbox type=text name=clickurl size=50 maxlength=200><br>
	<input type=hidden name=op value=BannersAdd>
	<input type=submit value=\"".translate("Add Banner")."\">
	</form></td></tr></table></td></tr></table>
	";
    }
// Add Client
	OpenTable4();
	echo"
	<font size=3>
	<b>".translate("Add a New Client")."</b></center><br><br>
	<font size=3>
	<form action=admin.php?op=BannersAddClient method=post>
	".translate("Client Name: ")."<input class=textbox type=text name=name size=30 maxlength=60><br>
	".translate("Contact Name: ")."<input class=textbox type=text name=contact size=30 maxlength=60><br>
	".translate("Contact Email: ")."<input class=textbox type=text name=email size=30 maxlength=60><br>
	".translate("Client Login: ")."<input class=textbox type=text name=login size=12 maxlength=10><br>
	".translate("Client Password: ")."<input class=textbox type=text name=passwd size=12 maxlength=10><br>
	".translate("Extra Info:")."<br><textarea name=extrainfo cols=60 rows=10></textarea><br>
	<input type=hidden name=op value=BannerAddClient>
	<input type=submit value=\"".translate("Add Client")."\">
	</form></td></tr></table></td></tr></table>
	";
	include ("footer.php");
}

function BannersAdd($name, $cid, $imptotal, $imageurl, $clickurl) {
    mysql_query("insert into banner values (NULL, '$cid', '$imptotal', '1', '0', '$imageurl', '$clickurl', now())");
    Header("Location: admin.php?op=BannersAdmin#top");
}

function BannerAddClient($name, $contact, $email, $login, $passwd, $extrainfo) {
    mysql_query("insert into bannerclient values (NULL, '$name', '$contact', '$email', '$login', '$passwd', '$extrainfo')");
    Header("Location: admin.php?op=BannersAdmin#top");
}

function BannerFinishDelete($bid) {
    mysql_query("delete from bannerfinish where bid=$bid");
    Header("Location: admin.php?op=BannersAdmin#top");
}

function BannerDelete($bid, $ok=0) {
	if ($ok==1) {
	    mysql_query("delete from banner where bid='$bid'");
	    Header("Location: admin.php?op=BannersAdmin#top");
	} else {
	    include("header.php");
	    GraphicAdmin($hlpfile);
	    $result=mysql_query("select cid, imptotal, impmade, clicks, imageurl, clickurl from banner where bid=$bid");
	    list($cid, $imptotal, $impmade, $clicks, $imageurl, $clickurl) = mysql_fetch_row($result);
	    OpenTable4();
	    echo "
	    <center><b>".translate("Delete Banner")."</b><br><br>
	    <a href=$clickurl><img src=$imageurl border=1></a><br>
	    <a href=$clickurl>$clickurl</a><br><br>
	    <table width=100% border=0><tr>
	    <td bgcolor=0000BA><font color=white><center>".translate("ID")."</td>
	    <td bgcolor=0000BA><font color=white><center>".translate("Impressions")."</td>
	    <td bgcolor=0000BA><font color=white><center>".translate("Imp. Left")."</td>
	    <td bgcolor=0000BA><font color=white><center>".translate("Clicks")."</td>
	    <td bgcolor=0000BA><font color=white><center>".translate("% Clicks")."</td>
	    <td bgcolor=0000BA><font color=white><center>".translate("Client Name")."</td><tr>";
	    $result2 = mysql_query("select cid, name from bannerclient where cid=$cid");
	    list($cid, $name) = mysql_fetch_row($result2);
	    $percent = substr(100 * $clicks / $impmade, 0, 5);
	    if($imptotal==0) {
		$left = unlimited;
	    } else {
		$left = $imptotal-$impmade;
	    }
	    echo "
	    <td bgcolor=008888 align=center><font color=white>$bid</td>
	    <td bgcolor=008888 align=center><font color=white>$impmade</td>
	    <td bgcolor=008888 align=center><font color=white>$left</td>
	    <td bgcolor=008888 align=center><font color=white>$clicks</td>
	    <td bgcolor=008888 align=center><font color=white>$percent%</td>
	    <td bgcolor=008888 align=center><font color=white>$name</td><tr>
	    ";
	}
	echo "</td></tr></table><br>
	".translate("Are you sure you want to delete this Banner?")."<br><br>
	[ <a href=\"admin.php?op=BannersAdmin#top\">".translate("No")."</a> | <a href=\"admin.php?op=BannerDelete&bid=$bid&ok=1\">".translate("Yes")."</a> ]</center><br><br></center>
	</td></tr></table></center></td></tr></table>";
	include("footer.php");
}

function BannerEdit($bid) {
	include("header.php");
	GraphicAdmin($hlpfile);
	$result=mysql_query("select cid, imptotal, impmade, clicks, imageurl, clickurl from banner where bid=$bid");
	list($cid, $imptotal, $impmade, $clicks, $imageurl, $clickurl) = mysql_fetch_row($result);
	OpenTable4();
	echo"
	<font size=3>
	<center><b>".translate("Edit Banner")."</b><br><br>
	<img src=$imageurl border=1><br><br>
	<font size=3></center>
	<form action=admin.php?op=BannerChange method=post>
	".translate("Client Name: ")."
	<select name=cid>
	";
	
	$result = mysql_query("select cid, name from bannerclient where cid=$cid");
	list($cid, $name) = mysql_fetch_row($result);
	
	echo "<option value=$cid selected>$name</option>";
	$result = mysql_query("select cid, name from bannerclient");
	while(list($ccid, $name) = mysql_fetch_row($result)) {
	    if($cid!=$ccid) {
		echo "<option value=$ccid>$name</option>";
	    }
	}
	echo "</select><br>";
	if($imptotal==0) {
	    $impressions = "".translate("Unlimited")."";
	} else {
	    $impressions = $imptotal;
	}
	echo"
	".translate("Add More Impressions: ")."<input class=textbox type=text name=impadded size=12 maxlength=11> ".translate("Purchased: ")."<b>$impressions</b> ".translate("Made: ")."<b>$impmade</b><br>
	".translate("Image URL: ")."<input class=textbox type=text name=imageurl size=50 maxlength=60 value=\"$imageurl\"><br>
	".translate("Click URL: ")."<input class=textbox type=text name=clickurl size=50 maxlength=100 value=\"$clickurl\"><br>
	<input type=hidden name=bid value=$bid>
	<input type=hidden name=imptotal value=$imptotal>
	<input type=hidden name=op value=BannerChange>
	<input type=submit value=\"".translate("Change Banner")."\">
	</form></td></tr></table></td></tr></table>
	";
	include("footer.php");
}

function BannerChange($bid, $cid, $imptotal, $impadded, $imageurl, $clickurl) {
	$imp = $imptotal+$impadded;
	mysql_query("update banner set cid='$cid', imptotal='$imp', imageurl='$imageurl', clickurl='$clickurl' where bid=$bid");
	Header("Location: admin.php?op=BannersAdmin#top");
}

function BannerClientDelete($cid, $ok=0) {
	if ($ok==1) {
	    mysql_query("delete from banner where cid='$cid'");
	    mysql_query("delete from bannerclient where cid='$cid'");
	    Header("Location: admin.php?op=BannersAdmin#top");
	} else {
	    include("header.php");
	    GraphicAdmin($hlpfile);
	    $result=mysql_query("select cid, name from bannerclient where cid=$cid");
	    list($cid, $name) = mysql_fetch_row($result);
	    OpenTable4();
	    echo "
	    <center><b>".translate("Delete Advertising Client")."</b><br><br>
	    ".translate("You are about to delete client:")." <b>$name</b> ".translate("and all its Banners!!!")."<br><br>";
	    $result2 = mysql_query("select imageurl, clickurl from banner where cid=$cid");
	    $numrows = mysql_num_rows($result2);
	    if($numrows==0) {
		echo "".translate("This client doesn't have any banner running now.")."<br><br>";
	    } else {
		echo "<font color=Red><b>".translate("WARNING!!!")."</b></font><br>
		".translate("This client has the following ACTIVE BANNERS running in")." $sitename:<br><br>";
	    }
	    while(list($imageurl, $clickurl) = mysql_fetch_row($result2)) {
		echo"
		<a href=$clickurl><img src=$imageurl border=1></a><br>
		<a href=$clickurl>$clickurl</a><br><br>
		";
	    }
	}
	echo "".translate("Are you sure you want to delete this Client and ALL its Banners?")."<br><br>
	[ <a href=\"admin.php?op=BannersAdmin#top\">".translate("No")."</a> | <a href=\"admin.php?op=BannerClientDelete&cid=$cid&ok=1\">".translate("Yes")."</a> ]</center><br><br></center>
	</td></tr></table></center></td></tr></table>";
	include("footer.php");
}

function BannerClientEdit($cid) {
	include("header.php");
	GraphicAdmin($hlpfile);
	$result = mysql_query("select name, contact, email, login, passwd, extrainfo from bannerclient where cid=$cid");
	list($name, $contact, $email, $login, $passwd, $extrainfo) = mysql_fetch_row($result);
	OpenTable4();
	echo"
	<font size=3>
	<center><b>".translate("Edit Advertising Client")."</b><br><br></center>
	<form action=admin.php?op=BannerClientChange method=post>
	".translate("Client Name: ")."<input class=textbox type=text name=name value=\"$name\" size=30 maxlength=60><br>
	".translate("Contact Name: ")."<input class=textbox type=text name=contact value=\"$contact\" size=30 maxlength=60><br>
	".translate("Contact Email: ")."<input class=textbox type=text name=email size=30 maxlength=60 value=\"$email\"><br>
	".translate("Client Login: ")."<input class=textbox type=text name=login size=12 maxlength=10 value=\"$login\"><br>
	".translate("Client Password: ")."<input class=textbox type=text name=passwd size=12 maxlength=10 value=\"$passwd\"><br>
	".translate("Extra Info:")."<br><textarea name=extrainfo cols=60 rows=10>$extrainfo</textarea><br>
	<input type=hidden name=cid value=$cid>
	<input type=hidden name=op value=BannerClientChange>
	<input type=submit value=\"".translate("Change Client")."\">
	</form></td></tr></table></td></tr></table>
	";
	include("footer.php");
}

function BannerClientChange($cid, $name, $contact, $email, $extrainfo, $login, $passwd) {
	mysql_query("update bannerclient set name='$name', contact='$contact', email='$email', login='$login', passwd='$passwd' where cid=$cid");
	Header("Location: admin.php?op=BannersAdmin#top");
}

switch($op) {

		case "BannersAdmin":
			BannersAdmin();
			break;

		case "BannersAdd":
			BannersAdd($name, $cid, $imptotal, $imageurl, $clickurl);
			break;

		case "BannerAddClient":
			BannerAddClient($name, $contact, $email, $login, $passwd, $extrainfo);
			break;

		case "BannerFinishDelete":
			BannerFinishDelete($bid);
			break;

		case "BannerDelete":
			BannerDelete($bid, $ok);
			break;

		case "BannerEdit":
			BannerEdit($bid);
			break;
		
		case "BannerChange":
			BannerChange($bid, $cid, $imptotal, $impadded, $imageurl, $clickurl);
			break;

		case "BannerClientDelete":
			BannerClientDelete($cid, $ok);
			break;

		case "BannerClientEdit":
			BannerClientEdit($cid);
			break;

		case "BannerClientChange":
			BannerClientChange($cid, $name, $contact, $email, $extrainfo, $login, $passwd);
			break;

}

} else {
    echo "Access Denied";
}

?>