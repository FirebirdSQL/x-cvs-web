<?php 

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)            */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* =========================                                            */
/* Based on MyPHPortal Modified MembersList                             */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

/* Some code taken from MemberList coded by Paul Joseph Thompson */
/* of www.slug.okstate.edu                                       */
/* In memoriam of Members List War ;)                            */

if (!IsSet($mainfile)) { include("mainfile.php"); }

function alpha() { //Creates the list of letters and makes them a link.
    global $sortby;
        $alphabet = array ("All", "A","B","C","D","E","F","G","H","I","J","K","L","M",
                            "N","O","P","Q","R","S","T","U","V","W","X","Y","Z","Other");
        $num = count($alphabet) - 1;
        echo "<center>[ "; // start of HTML
        $counter = 0;
        while (list(, $ltr) = each($alphabet)) {
            echo "<A HREF=\"memberslist.php?letter=$ltr&sortby=$sortby\">$ltr</a>";
            if ( $counter == round($num/2) ) {
                echo " ]\n<br>\n[ "; 
            } elseif ( $counter != $num ) {
                echo "&nbsp;|&nbsp;\n";
            }
            $counter++;
        }
        echo " ]\n</center>\n<br>\n";  // end of HTML
}

function SortLinks($letter) {  // Makes order by links..
        global $sortby;
        if ($letter == "front") { 
	    $letter = "All"; 
	}
        echo "\n<center>\n"; // Start of HTML
        echo translate("Sort by:")." [ ";
        if ($sortby == "uname" OR !$sortby) {
            echo "".translate("nickname")."&nbsp;|\n&nbsp;";
        } else {
            echo "<A HREF=\"memberslist.php?letter=$letter&sortby=uname\">".translate("nickname")."</a>&nbsp;|\n&nbsp;";
        }
        if ($sortby == "name") {
            echo "".translate("real name")."&nbsp;|\n&nbsp;";
        } else {
            echo "<A HREF=\"memberslist.php?letter=$letter&sortby=name\">".translate("real name")."</a>&nbsp;|\n&nbsp;";
        }
        if ($sortby == "femail") {
            echo "".translate("Email")."&nbsp;|\n&nbsp;";
        } else { 
            echo "<A HREF=\"memberslist.php?letter=$letter&sortby=femail\">".translate("Email")."</a>&nbsp;|\n&nbsp;";
        }
        if ($sortby == "url") {
            echo "".translate("url")."&nbsp;|\n&nbsp;";
        } else {
            echo "<A HREF=\"memberslist.php?letter=$letter&sortby=url\">".translate("url")."</a>";
        }
        echo " ]\n</center>\n"; // end of HTML
}
/*
function isAlpha($character) {  // Obviously to see if a character is a letter ?
    $c = Ord($character);
    return ((($c >= 64) && ($c <= 90)) || (($c >= 97) && ($c <= 122)));
    }
*/

//function ListMembers($letter, $sortby, $page) { // does this NEED to be a function ? NO
//    global $HTTP_COOKIE_VARS, $user_cookie_name;
        
        include("header.php");
        $pagesize = 20; // move to config later on !

        if (!isset($letter)) { $letter = "A"; }
        if (!isset($sortby)) { $sortby = "uname"; }
        if (!isset($page)) { $page = 1; }
        /* All of the code from here to around line 125 will be optimized a little later */

        /* This is the header section that displays the last registered and who's logged in and whatnot */
        $result = mysql_query("select uname from users order by uid DESC limit 0,1");
        list($lastuser) = mysql_fetch_row($result);

        echo "\n<!-- memberlist.php listMembers -->\n";
	OpenTable3();
        echo "<center><b>".translate("Welcome to")." $sitename ".translate("Members List")."</b><br><br>\n";
        echo "".translate("Greetings to our latest registered user:")." <A HREF=\"user.php?op=userinfo&uname=$lastuser\">$lastuser</a>\n</center>\n<br>\n";

        $numrows = mysql_num_rows(mysql_query("select uid from users"));

        if ($user) {
            $result2 = mysql_query("SELECT username,guest FROM session where guest=0");
            $member_online_num = mysql_num_rows($result2);
	    $who_online = "<b>".translate("Current Online Registered Users:")." </b><br><br>";
            $i = 1;
            while ($session = mysql_fetch_array($result2)) {
                if (isset($session["guest"]) and $session["guest"] == 0) {
                    $who_online .= "<A HREF=\"user.php?op=userinfo&uname=$session[username]\">$session[username]</a>\n";
                    $who_online .= ($i != $member_online_num ? " - " : "");
                    $i++;
                }
            }
            echo "<center>".translate("We have")." <b>$numrows</b> ".translate("registered users so far. There are")." <b>$member_online_num</b>\n";
            echo " ".translate("registered user(s) online right now.")."</center><br><br>";
	    OpenTable4();
            echo "<CENTER>$who_online</CENTER>\n";
	    CloseTable();
	    echo "<br><br>";
        } else {
            echo "<center>".translate("We have")." <b>$numrows</b> ".translate("registered users so far.")."</center>\n<br>\n<br>\n";
        }

        alpha();
        SortLinks($letter);

/* end of top memberlist section thingie */


/* This starts the beef...*/

        $min = $pagesize * ($page - 1); // This is where we start our record set from
        $max = $pagesize; // This is how many rows to select
        
        /* All my SQL stuff. DO NOT ALTER ANYTHING UNLESS YOU KNOW WHAT YOU ARE DOING */
        $count = "SELECT COUNT(uid) AS total FROM users "; // Count all the users in the db..
        $select = "select uid, name, uname, femail, url from users "; //select our data
        if ( ( $letter != "Other" ) AND ( $letter != "All" ) ) {  // are we listing all or "other" ?
            $where = "where uname like '".$letter."%' "; // I guess we are not.. 
        } else if ( ( $letter == "Other" ) AND ( $letter != "All" ) ) { // But other is numbers ?
            $where = "where uname REGEXP \"^\[1-9]\" "; // REGEX :D, although i think its MySQL only
                                                        // Will have to change this later.
                                                        // if you know a better way to match only the first char
                                                        // to be a number in uname, please change it and email
                                                        // myphportal-developers@lists.sourceforge.net the correction
                                                        // or goto http://sourceforge.net/projects/myphportal and post 
                                                        // your correction there. Thanks, Bjorn.
        } else { // or we are unknown or all..
            $where = ""; // this is to get rid of anoying "undefinied variable" message
        }
        $sort = "order by $sortby"; //sorty by .....
        $limit = " ASC LIMIT ".$min.", ".$max; // we only want rows $min  to $max
        /* due to how this works, i need the total number of users per 
        letter group, then we can hack of the ones we want to view */
        $count_result = mysql_query($count.$where);
        $num_rows_per_order = mysql_result($count_result,0,0);
        
        /* This is where we get our limit'd result set. */
        $result = mysql_query($select.$where.$sort.$limit) or die(mysql_error() ); // Now lets do it !!
        echo "<br>";
        if ( $letter != "front" ) {
            echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\"><tr>\n";
            echo "<td BGCOLOR=\"$bgcolor4\" align=\"center\"><font color=\"$textcolor2\"><b>".translate("Nickname")."</b></font></td>\n";
            echo "<td BGCOLOR=\"$bgcolor4\" align=\"center\"><font color=\"$textcolor2\"><b>".translate("Real Name")."</b></font></td>\n";
            echo "<td BGCOLOR=\"$bgcolor4\" align=\"center\"><font color=\"$textcolor2\"><b>".translate("Email")."</b></font></td>\n";
            echo "<td BGCOLOR=\"$bgcolor4\" align=\"center\"><font color=\"$textcolor2\"><b>".translate("URL")."</b></font></td>\n";
            $cols = 4;
            if($admin) { // This is my addon so admins can edit users right from the memberlist.php page
                $cols = 5;
                echo "<td BGCOLOR=\"$bgcolor4\" align=\"center\"><font color=\"$textcolor2\"><b>".translate("Functions")."</b></font></td>\n";
            }
            echo "</tr>";
            $a = 0;
            $dcolor_A = "$bgcolor2";
            $dcolor_B = "$bgcolor4";


            $num_users = mysql_num_rows($result); //number of users per sorted and limit query
            if ( $num_rows_per_order > 0  ) {
                while($user = mysql_fetch_array($result) ) {
                    $dcolor = ($a == 0 ? $dcolor_A : $dcolor_B);
                    echo "<tr><td bgcolor=$dcolor><A HREF=\"user.php?op=userinfo&uname=$user[uname]\"><font color=\"#000000\">$user[uname]</font></a>&nbsp;</td>\n";
                    echo "<td bgcolor='$dcolor'><font color=\"#000000\">$user[name]</font>&nbsp;</td>\n";
                    echo "<td bgcolor='$dcolor'><font color=\"#000000\">$user[femail]</font>&nbsp;</td>\n";
                    echo "<td bgcolor='$dcolor'><A HREF=\"$user[url]\" target=new><font color=\"#000000\">$user[url]</font></a>&nbsp;</td>\n";
                    if($admin) {
                        echo "<td bgcolor=$dcolor align=center><font size=\"2\" color=\"#000000\">[ <A HREF=\"admin.php?chng_uid=$user[uid]&op=modifyUser\"><font color=\"#000000\">".translate("Edit")."</font></a><font size=\"1\" color=\"#000000\"> | </font>\n";
                        echo "<A HREF=\"admin.php?op=delUser&chng_uid=$user[uid]\"><font color=\"#000000\">".translate("Delete")."</font></a> ]</font></td>\n";
                    }
                    echo "</tr>";
                    $a = ($dcolor == $dcolor_A ? 1 : 0);
                } // end while ()
                
                
                // start of next/prev/row links.
                echo "\n<tr><td colspan='$cols' align='right'>\n";
		echo "<br><br>";
		OpenTable4();
                echo "\t<table width='100%' cellspacing='0' cellpadding='0' cols='3' border=0><tr>";
                
                if ( $num_rows_per_order > $pagesize ) { 
                    $total_pages = ceil($num_rows_per_order / $pagesize); // How many pages are we dealing with here ??
                    $prev_page = $page - 1;
                    
                    if ( $prev_page > 0 ) {
                        echo "<td align='left' width='15%'><a href='memberslist.php?letter=$letter&sortby=$sortby&page=$prev_page'>";
                        echo "<img src=\"images/download/left.gif\" border=\"0\" Alt=\"".translate("Previous Page")." ($prev_page)\"></a></td>";
                    } else { 
                        echo "<td width='15%'>&nbsp;</td>\n"; 
                    }
                
                    echo "<td align='center' width='70%'>";
                    echo "<font size=1>$num_rows_per_order ".translate("users found for")." <b>$letter</b> ($total_pages ".translate("pages").", $num_users ".translate("users shown").").</font>";
                    echo "</td>";

                    $next_page = $page + 1;
                    if ( $next_page <= $total_pages ) {
                        echo "<td align='right' width='15%'><a href='memberslist.php?letter=$letter&sortby=$sortby&page=$next_page'>";
                        echo "<img src=\"images/download/right.gif\" border=\"0\" Alt=\"Next Page ($next_page)\"></a></td>";
                    } else {
                        echo "<td width='15%'>&nbsp;</td></tr>\n"; 
                    }
    /* Added a numbered page list, only shows up to 50 pages. */
                    
                        echo "<tr><td colspan=\"3\" align=\"center\">";
                        echo " <font size=1>[ </font>";
                        
                        for($n=1; $n < $total_pages; $n++) {
                        
                            
                            if ($n == $page) {
				echo "<font size=1><b>$n</b></font></a>";
                            } else {
				echo "<a href='memberslist.php?letter=$letter&sortby=$sortby&page=$n'>";
				echo "<font size=1>$n</font></a>";
			    }
                            if($n >= 50) {  // if more than 50 pages are required, break it at 50.
                                $break = true; 
                                break;
                            } else {  // guess not.
                                echo "<font size=1> | </font>"; 
                            }
                        }
                        
                        if(!isset($break)) { // are we sopposed to break ?
			    if ($n == $page) {
                        	echo "<font size=1><b>$n</b></font></a>";
			    } else {
                        	echo "<a href='memberslist.php?letter=$letter&sortby=$sortby&page=$total_pages'>";
                        	echo "<font size=1>$n</font></a>";
			    }
                        }
                        echo " <font size=1>]</font> ";
                        echo "</td></tr>";

    /* This is where it ends */
                }else{  // or we dont have any users..
                    echo "<td align='center'>";
                    echo "<font size=1>$num_rows_per_order ".translate("users found").".</font>";
                    echo "</td></tr>";
                    
                 }
                
                 echo "</table>\n";
		 CloseTable();
                echo "</td></tr>\n";

                 // end of next/prev/row links
                
            } else { // you have no members on this letter, hahaha
                echo "<tr><td bgcolor=\"$dcolor_A\" colspan=\"$cols\" align=\"center\"><br>\n";
                echo "<b><font color=\"#000000\">".translate("No Members Found for")." $letter</font></b>\n";
                echo "<br></td></tr>\n";
            }
            
            echo "\n</table><br>\n";
        }
        
	CloseTable();
        include("footer.php");

?>