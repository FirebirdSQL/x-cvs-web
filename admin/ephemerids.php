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
$hlpfile = "manual/ephem.html";
$result = mysql_query("select radminephem, radminsuper from authors where aid='$aid'");
list($radminephem, $radminsuper) = mysql_fetch_row($result);
if (($radminephem==1) OR ($radminsuper==1)) {

/*********************************************************/
/* Ephemerids Functions to have a Historic Ephemerids    */
/*********************************************************/

function Ephemerids() {
    global $hlpfile, $admin;
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "
    <center><font size=4><b>".translate("Ephemerids")."</b></center><br><br>
    <font size=3><b>".translate("Add Ephemerid:")."</b><br><br><font size=2>
    <form action=admin.php method=post>";
    $nday = "1";
    echo "".translate("Day:")." <select name=did>";
    while ($nday<=31) {
	echo "<option name=did>$nday</option>";
	$nday++;
    }
    echo "</select>";
    $nmonth = "1";
    echo "".translate("Month:")." <select name=mid>";
    while ($nmonth<=12) {
	echo "<option name=mid>$nmonth</option>";
	$nmonth++;
    }
    echo "</select>".translate("Year:")." <input class=textbox type=text name=yid maxlength=4 size=5><br><br>
    ".translate("Ephemerid Description:")."<br>
    <textarea name=content cols=60 rows=10></textarea><br><br>
    <input type=hidden name=op value=Ephemeridsadd>
    <input type=submit value=".translate("Send").">
    </form>
    
    <br><br>
    <font size=3><b>".translate("Ephemerid Maintenance (Edit/Delete):")."</b><br><br><foint size=2>
    <form action=admin.php method=post>";
    $nday = "1";
    echo "".translate("Day:")." <select name=did>";
    while ($nday<=31) {
	echo "<option name=did>$nday</option>";
	$nday++;
    }
    echo "</select>";
    $nmonth = "1";
    echo "".translate("Month:")." <select name=mid>";
    while ($nmonth<=12) {
	echo "<option name=mid>$nmonth</option>";
	$nmonth++;
    }
    echo "</select>";
    echo "
    <br><br>
    <input type=hidden name=op value=Ephemeridsmaintenance>
    <input type=submit value=".translate("Edit").">
    </form>
    
    </td></tr></table></td></tr></table>
    ";
    include ("footer.php");
}

function Ephemeridsadd($did, $mid, $yid, $content) {
    mysql_query("insert into ephem values (NULL, '$did', '$mid', '$yid', '$content')");
    Header("Location: admin.php?op=Ephemerids");    
}

function Ephemeridsmaintenance($did, $mid) {
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "
    <center><font size=4><b>".translate("Ephemerids Maintenance")."</b></center><br><br>";
    $result=mysql_query("select eid, did, mid, yid, content from ephem where did=$did AND mid=$mid");
    while(list($eid, $did, $mid, $yid, $content) = mysql_fetch_row($result)) {
    echo "<font size=2><b>$yid</b> [ <a href=admin.php?op=Ephemeridsedit&eid=$eid&did=$did&mid=$mid>".translate("Edit")."</a> | <a href=admin.php?op=Ephemeridsdel&eid=$eid&did=$did&mid=$mid>".translate("Delete")."</a> ]<br>
    <font size=1>$content<br><br><br>";
    }
    echo "</td></tr></table></td></tr></table>";
    include ('footer.php');
}

function Ephemeridsdel($eid, $did, $mid) {
    mysql_query("delete from ephem where eid=$eid");
    Header("Location: admin.php?op=Ephemeridsmaintenance&did=$did&mid=$mid");
}

function Ephemeridsedit($eid, $did, $mid) {
    include ("header.php");
    GraphicAdmin($hlpfile);
    $result=mysql_query("select yid, content from ephem where eid=$eid");
    list($yid, $content) = mysql_fetch_row($result);
    OpenTable4();
    echo "
    <center><font size=4><b>".translate("Ephemerids Maintenance")."</b></center><br><br>
    <font size=3><b>".translate("Edit Ephemerid:")."</b><br><br><font size=2>
    <form action=admin.php method=post>";
    echo "".translate("Year:")." <input class=textbox type=text name=yid value=$yid maxlength=4 size=5><br><br>
    ".translate("Ephemerid Description:")."<br>
    <textarea name=content cols=60 rows=10>$content</textarea><br><br>
    <input type=hidden name=did value=$did>
    <input type=hidden name=mid value=$mid>
    <input type=hidden name=eid value=$eid>
    <input type=hidden name=op value=Ephemeridschange>
    <input type=submit value=".translate("Send").">
    </form>
    </td></tr></table></td></tr></table>
    ";
    include ('footer.php');
}

function Ephemeridschange($eid, $did, $mid, $yid, $content) {
    $content = stripslashes(FixQuotes($content));
    mysql_query("update ephem set yid='$yid', content='$content' where eid=$eid");
    Header("Location: admin.php?op=Ephemeridsmaintenance&did=$did&mid=$mid");    
}

switch($op) {

		case "Ephemeridsedit":
			Ephemeridsedit($eid, $did, $mid);
			break;
	
		case "Ephemeridschange":
			Ephemeridschange($eid, $did, $mid, $yid, $content);
			break;
			
		case "Ephemeridsdel":
			Ephemeridsdel($eid, $did, $mid);
			break;
			
		case "Ephemeridsmaintenance":
			Ephemeridsmaintenance($did, $mid);
			break;
			
		case "Ephemeridsadd":
			Ephemeridsadd($did, $mid, $yid, $content);
			break;
			
		case "Ephemerids":
			Ephemerids();
			break;

}

} else {
    echo "Access Denied";
}
?>