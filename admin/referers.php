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
$hlpfile = "manual/referer.html";
$result = mysql_query("select radminsuper from authors where aid='$aid'");
list($radminsuper) = mysql_fetch_row($result);
if ($radminsuper==1) {

/*********************************************************/
/* Referer Functions to know who links us                */
/*********************************************************/

function hreferer() {
    global $hlpfile, $admin;
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "
    <font size=4><center><b>".translate("HTTP Referers")."</b></center></font>
    <center><b>(".translate("Who is linking our site?").")</b></center><br><br>
    <table border=0 width=100%>";
    $hresult = mysql_query("select rid, url from referer");
    while(list($rid, $url) = mysql_fetch_row($hresult)) {
	echo "<tr><td bgcolor=CCCCCC><font size=2>$rid</td>";
	echo "<td bgcolor=CCCCCC><font size=2><a target=_blank href=$url>$url</a></td></tr>";
    }
    echo "</table>";
    echo "<form action=admin.php method=post>";
    echo "<input type=hidden name=op value=delreferer>";
    echo "<center><input type=submit value=\"".translate("Delete Referers")."\"></center>";
    echo "</td></tr></table></td></tr></table>";
    include ("footer.php");
}

function delreferer() {
    mysql_query("delete from referer");
    Header("Location: admin.php?op=AdminMain");
}

switch($op) {

		case "hreferer":
			hreferer();
			break;

		case "delreferer":
			delreferer();
			break;

}

} else {
    echo "Access Denied";
}
?>