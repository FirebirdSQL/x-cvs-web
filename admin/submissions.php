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
$hlpfile = "manual/submissions.html";
$result = mysql_query("select radminarticle, radminsuper from authors where aid='$aid'");
list($radminarticle, $radminsuper) = mysql_fetch_row($result);
if (($radminarticle==1) OR ($radminsuper==1)) {

/*********************************************************/
/* News Submissions                                      */
/*********************************************************/

function submissions() {
    global $hlpfile, $admin;
    $dummy = 0;
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable3();
	$result = mysql_query("SELECT qid, subject, timestamp FROM queue order by timestamp");
	if(mysql_num_rows($result) == 0) {
		echo "<table width=\"100%\"><tr><td bgcolor=\"$bgcolor1\" align=\"center\"><b>".translate("No New Submissions")."</b></td></tr></table>\n";
	} else {
		echo "<center><font size=2><b>".translate("New Stories Submissions")."</b></font><form action=\"admin.php\" method=\"post\"><table width=\"100%\" border=1 bgcolor=$bgcolor2>\n";
		while (list($qid, $subject, $timestamp) = mysql_fetch_row($result)) {
			$hour = "AM";
			ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $timestamp, $datetime);
			if ($datetime[4] > 12) { $datetime[4] = $datetime[4]-12; $hour = "PM"; }
			$datetime = date(translate("datestring"), mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
			echo "<tr>\n
			<td align=middle><font SIZE=2>&nbsp;(<a href=admin.php?op=DeleteStory&qid=$qid>".translate("Delete")."</a>-<a href=admin.php?op=QautoStory&qid=$qid>Auto</a>)&nbsp;</td>\n
			<td width=100%><font SIZE=3>\n";
			if ($subject == "") {
			    echo "&nbsp;<a href=\"admin.php?op=DisplayStory&qid=$qid\">".translate("No Subject")."</a></font>\n";
			} else {
			    echo "&nbsp;<a href=\"admin.php?op=DisplayStory&qid=$qid\">$subject</a></font>\n";
			}
			$timestamp = ereg_replace(" ", "@", $timestamp);
			echo "</td><td align=right><font SIZE=2>&nbsp;$timestamp&nbsp;</font></td></tr>\n";
			$dummy++;
		}
		if ($dummy < 1) {
			echo "<tr><td bgcolor=\"$bgcolor1\" align=\"center\"><b>".translate("No New Submissions")."</b></form></td></tr></table>\n";
		} else {
			echo "</table></form>\n";
		}
	}
    CloseTable();
    include ("footer.php");
}

switch ($op) {

    default:
	submissions();
	break;

}

} else {
    echo "Access Denied";
}
?>