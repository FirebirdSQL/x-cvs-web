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

if (!IsSet($mainfile)) { include ('mainfile.php'); }
	include("header.php");
	$result = mysql_query("select topicid, topicname, topicimage, topictext from topics order by topicname");
	if (mysql_num_rows($result)==0) {
	    echo "<table border=0 bgcolor=000000 cellpadding=2 cellspacing=0 width=95%>
	    <tr><td>
	    <table border=0 bgcolor=FFFFFF cellpadding=1 cellspacing=0 width=100%>";
	}
	if (mysql_num_rows($result) > 0) {

	OpenTable3();
	echo "
	<font size=3 color=$textcolor2><b><center>".translate("Current Active Topics")."</b><br>".translate("Click to list all articles in this topic")."</center><br>
	<center><table border=0 width=100% align=center cellpadding=2><tr>";


		while(list($topicid, $topicname, $topicimage, $topictext) = mysql_fetch_array($result)) {
?>
			
		<td align=center>
		<?php echo "<a href=search.php?query=&topic=$topicid>"; ?><img src=<?php echo "$tipath$topicimage"; ?> border=0></a><br>
		<font size=2 color=<?php echo "$textcolor2"; ?>><b><?php echo "$topictext"; ?>
		</td>
		<?php
		
		// Thanks to John Hoffmann from softlinux.org for the next 5 lines ;)
		
		$count++;
		if ($count == 5) {
		    echo "</tr></tr>";
		    $count = 0;
		}
		}
	echo "</tr></table>";
	} 
	CloseTable();
	mysql_free_result($result);
	include("footer.php");

?>
