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

switch($op) {

        case "comments":
                break;

        default:
                $offset=30;
                if (!isset($min)) $min=0;
                if (!isset($max)) $max=$min+$offset;
                $query = stripslashes($query);
                include("header.php");
		if ($topic>0) {
		    $result = mysql_query("select topicimage, topictext from topics where topicid=$topic");
		    list($topicimage, $topictext) = mysql_fetch_row($result);
		} else {
		    $topictext = "".translate("All Topics")."";
		    $topicimage = "AllTopics.gif";
		}
		OpenTable3();
		if ($type == "users") {
		    echo "<center><font size=4><b>".translate("Search in Users Database")."</b></center><br>";
		} elseif ($type == "sections") {
		    echo "<center><font size=4><b>".translate("Search in Special Sections")."</b></center><br>";
		} elseif ($type == "reviews") {
		    echo "<center><font size=4><b>".translate("Search in Reviews")."</b></center><br>";
		} else {
		    echo "<center><font size=4><b>".translate("Search in")." $topictext</b></center><br>";
		}
		?>
                <TABLE WIDTH=100% BORDER=0>
                <TR><TD>
		<?php
		if (($type == "users") OR ($type == "sections") OR ($type == "reviews")) {
		    echo "<img src=$tipath/AllTopics.gif align=right border=0>";
                } else {
		    echo "<img src=$tipath$topicimage align=right border=0 Alt=\"$topictext\">";
		}
		?>
		<form action="search.php" method=get>
                <input size=25 type=text name=query value="<?php echo $query; ?>">
		<input type=submit value="<?php echo translate("Search"); ?>"><br>
                <!-- Topic Selection -->
		<?php
		$toplist = mysql_query("select topicid, topictext from topics order by topictext");
		echo "<SELECT NAME=\"topic\">";
                echo "<OPTION VALUE=\"\">".translate("All Topics")."</option>\n";
                while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
                        if ($topicid==$topic) { $sel = "selected "; }
                        echo "<option $sel value=\"$topicid\">$topics</option>\n";
			$sel = "";
                }
		echo "</SELECT>";
		
		
		
		echo "<SELECT NAME=\"category\">";
                echo "<OPTION VALUE=\"0\">".translate("Articles")."</option>\n";
		$catlist = mysql_query("select catid, title from stories_cat order by title");
                while(list($catid, $title) = mysql_fetch_row($catlist)) {
                        if ($catid==$category) { $sel = "selected "; }
                        echo "<option $sel value=\"$catid\">$title</option>\n";
			$sel = "";
                }
		echo "</SELECT>";		
		
		
		
		
		// Authors Selection -->
                $thing = mysql_query("select aid from authors order by aid");
		echo "<SELECT NAME=\"author\">";
                echo "<OPTION VALUE=\"\">".translate("All Authors")."</option>\n";
                while(list($authors) = mysql_fetch_row($thing)) {
                        if ($authors==$author) { $sel = "selected "; }
			echo "<option value=\"$authors\">$authors</option>\n";
			$sel = "";
                }
                echo "</SELECT>";
                ?>
                <!-- Date Selection -->
                <select name="days">
                        <option <?php echo $days == 0 ? "selected " : ""; ?> value=0><?php echo translate("All"); ?></option>
                        <option <?php echo $days == 7 ? "selected " : ""; ?> value=7>1 <?php echo translate("week"); ?></option>
                        <option <?php echo $days == 14 ? "selected " : ""; ?> value=14>2 <?php echo translate("weeks"); ?></option>
                        <option <?php echo $days == 30 ? "selected " : ""; ?> value=30>1 <?php echo translate("month"); ?></option>
			<option <?php echo $days == 60 ? "selected " : ""; ?> value=60>2 <?php echo translate("months"); ?></option>
                        <option <?php echo $days == 90 ? "selected " : ""; ?> value=90>3 <?php echo translate("months"); ?></option>
                </select><br>
		<?php
		if ($type == "stories") {
		    $sel1 = "checked";
		} elseif ($type == "comments") {
		    $sel2 = "checked";
		} elseif ($type == "sections") {
		    $sel3 = "checked";
		} elseif ($type == "users") {
		    $sel4 = "checked";
		} elseif ($type == "reviews") {
		    $sel5 = "checked";
		}
		echo "".translate("Search on:")."";
		echo "<input type=radio name=type value=stories $sel1> ".translate("Stories")."";
		echo "<input type=radio name=type value=comments $sel2> ".translate("Comments")."";
		echo "<input type=radio name=type value=sections $sel3> ".translate("Sections")."";
		echo "<input type=radio name=type value=users $sel4> ".translate("Users")."";
		echo "<input type=radio name=type value=reviews $sel5> ".translate("Reviews")."";
                echo "</form></td></tr></TABLE><P>";
	
	if ($type=="stories" OR !$type) {

		if ($category > 0) {
		    $categ = "AND catid=$category ";
		} elseif ($category == 0) {
		    $categ = "";
		}
                $q = "select s.sid, s.aid, s.title, s.time, a.url, s.comments, s.topic from stories s, authors a where s.aid=a.aid $categ";
                if (isset($query)) $q .= "AND (s.title LIKE '%$query%' OR s.hometext LIKE '%$query%' OR s.bodytext LIKE '%$query%' OR s.notes LIKE '%$query%') ";
                if ($author != "") $q .= "AND s.aid='$author' ";
                if ($topic != "") $q .= "AND s.topic='$topic' ";
                if ($days != "" && $days!=0) $q .= "AND TO_DAYS(NOW()) - TO_DAYS(time) <= $days ";
                $q .= " ORDER BY s.time DESC LIMIT $min,$offset";
		$t = $topic;
                $result = mysql_query($q);
                $nrows  = mysql_num_rows($result);
                $x=0;
                echo "<table width=99% cellspacing=0 cellpadding=0 border=0>\n";
		if ($nrows>0) {
                        while(list($sid, $aid, $title, $time, $url, $comments, $topic) = mysql_fetch_row($result)) {
				
			$result2=mysql_query("select topictext from topics where topicid=$topic");
			list($topictext) = mysql_fetch_row($result2);
                        
			        $furl = "article.php?sid=$sid";
                                formatTimestamp($time);
                                printf("<tr><td><font size=3><a href=\"%s\"><b>%s</b></a> <font size=2> ".translate("by")." <a href=\"%s\">%s</a>",$furl,$title,$url,$aid);
                                print " ".translate("on")." $datetime (<b>$comments</b>)</td></tr>\n";
                                $x++;
                        }
                
		echo "</td></tr></table>";
		} else {
                        echo "<center><font color=Red>".translate("No matches found to your query")."</font></center><br><br>";
			echo "</td></tr></table>";
                }

                $prev=$min-$offset;
                if ($prev>=0) {
                        print "<a href=\"search.php?author=$author&topic=$t&min=$prev&query=$query&type=$type&category=$category\">";
                        print "<br><br><center><b>$min ".translate("previous matches")."</b></a>";
                }

                $next=$min+$offset;
		if ($x>=29) {
                        print "<a href=\"search.php?author=$author&topic=$t&min=$max&query=$query&type=$type&category=$category\">";
                        print "<br><br><center><b>".translate("next matches")."</b></a>";
                }


	} elseif ($type=="comments") {
	
                $result = mysql_query("select tid, sid, subject, date, name from comments where (subject like '%$query%' OR comment like '%$query%') order by date DESC limit $min,$offset");
                $nrows  = mysql_num_rows($result);
                $x=0;
		echo "<table width=99% cellspacing=0 cellpadding=0 border=0>\n";
		if ($nrows>0) {
                        while(list($tid, $sid, $subject, $date, $name) = mysql_fetch_row($result)) {
			    $furl = "article.php?thold=-1&mode=flat&order=1&sid=$sid#$tid";
                            if(!$name) {
				$name = "$anonymous";
			    }
			    formatTimestamp($date);
                            echo "<tr><td><font size=3><a href=\"$furl\"><b>$subject</b></a> <font size=2> ".translate("by")." $name";
                            print " ".translate("on")." $datetime</td></tr>\n";
                            $x++;
                        }

		echo "</td></tr></table>";
		} else {
                        echo "<center><font color=Red>".translate("No matches found to your query")."</font></center><br><br>";
			echo "</td></tr></table>";
                }

                $prev=$min-$offset;
                if ($prev>=0) {
                        print "<a href=\"search.php?author=$author&topic=$topic&min=$prev&query=$query&type=$type\">";
                        print "<br><br><center><b>$min ".translate("previous matches")."</b></a>";
                }

                $next=$min+$offset;
		if ($x>=29) {
                        print "<a href=\"search.php?author=$author&topic=$topic&min=$max&query=$query&type=$type\">";
                        print "<br><br><center><b>".translate("next matches")."</b></a>";
                }

	} elseif ($type=="reviews") {
	
                $result = mysql_query("select id, title, text, reviewer from reviews where (title like '%$query%' OR text like '%$query%') order by date DESC limit $min,$offset");
                $nrows  = mysql_num_rows($result);
                $x=0;
		echo "<table width=99% cellspacing=0 cellpadding=0 border=0>\n";
		if ($nrows>0) {
                        while(list($id, $title, $text, $reviewer) = mysql_fetch_row($result)) {
			    $furl = "reviews.php?op=showcontent&id=$id";
                            echo "<tr><td><font size=3><a href=\"$furl\"><b>$title</b></a> <font size=2> ".translate("by")." $reviewer";
                            print "</td></tr>\n";
                            $x++;
                        }

		echo "</td></tr></table>";
		} else {
                        echo "<center><font color=Red>".translate("No matches found to your query")."</font></center><br><br>";
			echo "</td></tr></table>";
                }

                $prev=$min-$offset;
                if ($prev>=0) {
                        print "<a href=\"search.php?author=$author&topic=$t&min=$prev&query=$query&type=$type\">";
                        print "<br><br><center><b>$min ".translate("previous matches")."</b></a>";
                }

                $next=$min+$offset;
		if ($x>=29) {
                        print "<a href=\"search.php?author=$author&topic=$t&min=$max&query=$query&type=$type\">";
                        print "<br><br><center><b>".translate("next matches")."</b></a>";
                }

	} elseif ($type=="sections") {
	
                $result = mysql_query("select artid, secid, title, content from seccont where (title like '%$query%' OR content like '%$query%') order by artid DESC limit $min,$offset");
                $nrows  = mysql_num_rows($result);
                $x=0;
		echo "<table width=99% cellspacing=0 cellpadding=0 border=0>\n";
		if ($nrows>0) {
                        while(list($artid, $secid, $title, $content) = mysql_fetch_row($result)) {
			    $result2 = mysql_query("select secname from sections where secid='$secid'");
			    list($sectitle) = mysql_fetch_row($result2);
			    $surl = "sections.php?op=listarticles&secid=$secid";
			    $furl = "sections.php?op=viewarticle&artid=$artid";
                            echo "<tr><td><font size=3><a href=\"$furl\"><b>$title</b></a> ".translate("in the Section")." <a href=$surl>$sectitle</a></td></tr>\n";
                            $x++;
                        }

		echo "</td></tr></table>";
		} else {
                        echo "<center><font color=Red>".translate("No matches found to your query")."</font></center><br><br>";
			echo "</td></tr></table>";
                }

                $prev=$min-$offset;
                if ($prev>=0) {
                        print "<a href=\"search.php?author=$author&topic=$t&min=$prev&query=$query&type=$type\">";
                        print "<br><br><center><b>$min ".translate("previous matches")."</b></a>";
                }

                $next=$min+$offset;
		if ($x>=29) {
                        print "<a href=\"search.php?author=$author&topic=$t&min=$max&query=$query&type=$type\">";
                        print "<br><br><center><b>".translate("next matches")."</b></a>";
                }

	} elseif ($type=="users") {
	
                $result = mysql_query("select uname, name from users where (uname like '%$query%' OR name like '%$query%' OR bio like '%$query%') order by uname ASC limit $min,$offset");
                $nrows  = mysql_num_rows($result);
                $x=0;
		echo "<table width=99% cellspacing=0 cellpadding=0 border=0>\n";
		if ($nrows>0) {
                        while(list($uname, $name) = mysql_fetch_row($result)) {
			    $furl = "user.php?op=userinfo&uname=$uname";
			    if ($name=="") {
				$name = "".translate("No name entered")."";
			    }
                            echo "<tr><td><font size=3><a href=\"$furl\"><b>$uname</b></a> ($name)</td></tr>\n";
                            $x++;
                        }

		echo "</td></tr></table>";
		} else {
                        echo "<center><font color=Red>".translate("No matches found to your query")."</font></center><br><br>";
			echo "</td></tr></table>";
                }

                $prev=$min-$offset;
                if ($prev>=0) {
                        print "<a href=\"search.php?author=$author&topic=$t&min=$prev&query=$query&type=$type\">";
                        print "<br><br><center><b>$min ".translate("previous matches")."</b></a>";
                }

                $next=$min+$offset;
		if ($x>=29) {
                        print "<a href=\"search.php?author=$author&topic=$t&min=$max&query=$query&type=$type\">";
                        print "<br><br><center><b>".translate("next matches")."</b></a>";
                }



	}
		
		CloseTable();
		include("footer.php");
                break;
}
?>