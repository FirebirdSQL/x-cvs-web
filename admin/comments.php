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
$result = mysql_query("select radminsuper from authors where aid='$aid'");
list($radminsuper) = mysql_fetch_row($result);
if ($radminsuper==1) {

/*********************************************************/
/* Comments Delete Function                              */
/*********************************************************/

// This function is a big crap. I need to delete all babies comments
// maybe by setting a unique number for each Parent comment?
// Anyone, please help me to do this!

function removeComment ($tid, $sid) {
    global $ultramode;
    mysql_query("update stories set comments=comments-1 where sid='$sid'");
    mysql_query("DELETE FROM comments where tid=$tid");
    mysql_query("DELETE FROM comments where pid=$tid");
    if ($ultramode) {
	ultramode();
    }
    Header("Location: article.php?sid=$sid");
}

function RemovePollComment ($tid, $pollID) {
    mysql_query("DELETE FROM pollcomments where tid=$tid and pollID=$pollID");
    mysql_query("DELETE FROM pollcomments where pid=$tid");    
    Header("Location: pollBooth.php?op=results&pollID=$pollID");
}

switch ($op) {

		case "RemoveComment":
			removeComment($tid, $sid);
			break;

		case "RemovePollComment":
			RemovePollComment($tid, $pollID);
			break;

}

} else {
    echo "Access Denied";
}
?>