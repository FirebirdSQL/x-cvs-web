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

if(!isset($mainfile)) { include("mainfile.php"); }

if(!isset($pollID)) {
  include ('header.php');
  pollList();
  include ('footer.php');
}
elseif(isset($forwarder)) {
  pollCollector($pollID, $voteID, $forwarder);
}
elseif($op == "results" && $pollID > 0) {
    include ("header.php");
    echo "<center><table cellpadding=0 cellspacing=2 border=0 bgcolor=000000><tr><td colspan=2>";
    echo "<table cellpadding=5 cellspacing=2 border=0 bgcolor=FFFFFF><tr><td><center>";
    pollResults($pollID);
    echo "</td></tr></table></td></tr></table></center><br><br>";
    cookiedecode($user);
    if (($pollcomm) AND ($mode != "nocomments")) {
	if ($anonpost==1 OR $admin OR $user) {
	    echo "<p><center><a href=\"pollcomments.php?op=Reply&pid=0&pollID=$pollID\"><img src=\"$uimages/comment.gif\" border=0 Alt=\"\"></a></p></center>";
	}
	include("pollcomments.php");
    }
    include ("footer.php");
}
elseif($voteID > 0) {
    pollCollector($pollID, $voteID);
}
elseif($pollID != pollLatest()) {
  include ('header.php');
  echo "<center><table border=0 width=200><tr><td>";
  pollMain($pollID);
  echo "</td></tr></table></center>";
  include ('footer.php');
} else {
  include ('header.php');
  echo "<center><table border=0 width=160><tr><td>";
  pollNewest();
  echo "</td></tr></table><br>".translate("Current Survey Voting Booth")."";
  include ('footer.php');
}

?>