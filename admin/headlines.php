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
$hlpfile = "manual/headlines.html";
$result = mysql_query("select radminhead, radminsuper from authors where aid='$aid'");
list($radminhead, $radminsuper) = mysql_fetch_row($result);
if (($radminhead==1) OR ($radminsuper==1)) {

/*********************************************************/
/* Headlines Grabber to put other sites news in our site */
/*********************************************************/

function HeadlinesAdmin() {
    global $hlpfile, $admin;
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "
    <center><font size=4><b>".translate("Headlines")."</b></font></center>
    <form action=admin.php method=post>
    <center><table border=1 width=90%><tr>
	<td bgcolor=0000BA><font color=white><center>".translate("ID")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Site Name")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("URL")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Status")."</td>
	<td bgcolor=0000BA><font color=white><center>".translate("Functions")."</td><tr>";
    $result = mysql_query("select hid, sitename, url, status from headlines order by hid");
    while(list($hid, $sitename, $url, $status) = mysql_fetch_row($result)) {
	echo "
	<td bgcolor=009999 align=center><font color=white>$hid</td>
	<td bgcolor=009999 align=center><font color=white><a href=$url target=new>$sitename</a></td>
	<td bgcolor=009999 align=center><font color=white>$url</td>";
	if($status == 1) {
	    $status = "<font color=Yellow>".translate("Active")."</font>";
	} else {
	    $status = "".translate("Inactive")."";
	}
	echo "
	<td bgcolor=009999 align=center><font color=white>$status</td>
	<td bgcolor=009999 align=center><font color=white><a href=admin.php?op=HeadlinesEdit&hid=$hid>".translate("Edit")."</a> | <a href=admin.php?op=HeadlinesDel&hid=$hid&ok=0>".translate("Delete")."</a></td><tr>";
    }
    echo "</form></td></tr></table>
    <br><br>
    </center><font size=4><b>".translate("Add Headline")."</b><br><br>
    <font size=2>
    <form action=admin.php method=post>
    <table border=0 width=100%><tr><td>
    ".translate("Site Name:")." </td><td><input type=text name=xsitename size=31 maxlength=30></td></tr><tr><td>
    ".translate("URL:")." </td><td><input type=text name=url size=50 maxlength=100></td></tr><tr><td>
    ".translate("URL for the RDF/XML file:")." </td><td><input type=text name=headlinesurl size=50 maxlength=200></td></tr><tr><td>
    ".translate("Status:")." </td><td><select name=status>
	<option name=status value=1>".translate("Active")."</option>
	<option name=status value=0 selected>".translate("Inactive")."</option>
	</select></td></tr></table>
    <input type=hidden name=op value=HeadlinesAdd>
    <input type=submit value=".translate("Add").">
    </form>
    </td></tr></table></td></tr></table>";
    include("footer.php");
}

function HeadlinesEdit($hid) {
    global $language, $hlpfile, $admin;
    include ("header.php");
    GraphicAdmin($hlpfile);
    $result = mysql_query("select sitename, url, headlinesurl, status from headlines where hid='$hid'");
    list($xsitename, $url, $headlinesurl, $status) = mysql_fetch_row($result);
    OpenTable4();
    echo "
    <center><font size=4><b>".translate("Edit Headline")."</b></font></center>
    <form action=admin.php method=post>
    <input type=hidden name=hid value=$hid>
    <table border=0 width=100%><tr><td>
    ".translate("Site Name:")." </td><td><input type=text name=xsitename size=31 maxlength=30 value=$xsitename></td></tr><tr><td>
    ".translate("URL:")." </td><td><input type=text name=url size=50 maxlength=100 value=$url></td></tr><tr><td>
    ".translate("URL for the RDF/XML file:")." </td><td><input type=text name=headlinesurl size=50 maxlength=200 value=$headlinesurl></td></tr><tr><td>
    ".translate("Status:")." </td><td><select name=status>";
	if($status == 1) {
	    $sel_a = "selected";
	} else {
	    $sel_i = "selected";
	}
	echo "
	<option name=status value=1 $sel_a>".translate("Active")."</option>
	<option name=status value=0 $sel_i>".translate("Inactive")."</option>
	</select></td></tr></table>
    <input type=hidden name=op value=HeadlinesSave>
    <input type=submit value=".translate("Save Changes").">
    </form>
    </td></tr></table></td></tr></table>";
    include("footer.php");
}

function HeadlinesSave($hid, $xsitename, $url, $headlinesurl, $status) {
    $xsitename = ereg_replace(" ", "", $xsitename);
    mysql_query("update headlines set sitename='$xsitename', url='$url', headlinesurl='$headlinesurl', status='$status' where hid='$hid'");
    Header("Location: admin.php?op=HeadlinesAdmin");
}

function HeadlinesAdd($xsitename, $url, $headlinesurl, $status) {
    $xsitename = ereg_replace(" ", "", $xsitename);
    mysql_query("insert into headlines values (NULL, '$xsitename', '$url', '$headlinesurl', '$status')");
    Header("Location: admin.php?op=HeadlinesAdmin");
}

function HeadlinesDel($hid, $ok=0) {
    if($ok==1) {
	mysql_query("delete from headlines where hid=$hid");
	Header("Location: admin.php?op=HeadlinesAdmin");
    } else {
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("WARNING: Are you sure you want to delete this Headline?")."</b><br><br><font color=Black>";
    }
	echo "[ <a href=admin.php?op=HeadlinesDel&hid=$hid&ok=1>".translate("Yes")."</a> | <a href=admin.php?op=HeadlinesAdmin>".translate("No")."</a> ]<br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");	
}

switch($op) {
    
		case "HeadlinesDel":
			HeadlinesDel($hid, $ok);
			break;
	
		case "HeadlinesAdd":
			HeadlinesAdd($xsitename, $url, $headlinesurl, $status);
			break;
	
		case "HeadlinesSave":
			HeadlinesSave($hid, $xsitename, $url, $headlinesurl, $status);
			break;
	
		case "HeadlinesAdmin":
			HeadlinesAdmin();
			break;
		
		case "HeadlinesEdit":
			HeadlinesEdit($hid);
			break;

}

} else {
    echo "Access Denied";
}
?>