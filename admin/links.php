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
$hlpfile = "manual/weblinks.html";
$result = mysql_query("select radminlink, radminsuper from authors where aid='$aid'");
list($radminlink, $radminsuper) = mysql_fetch_row($result);
if (($radminlink==1) OR ($radminsuper==1)) {

/*********************************************************/
/* Links Modified Web Links                              */
/*********************************************************/

function links() {
    global $hlpfile, $admin;
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "
    <center><a href=links.php><img src=images/links/web.gif border=0></a><br><br>";
    $result=mysql_query("select * from links_links");
    $numrows = mysql_num_rows($result);
    echo "<font size=2>".translate("There are")." <b>$numrows</b> ".translate("Links in our Database")."";
    echo "</td></tr></table></td></tr></table><br>";
    
// Temporarily 'homeless' links functions (to be revised in admin.php breakup)    
    $result = mysql_query("select * from links_modrequest where brokenlink=1");
    $totalbrokenlinks = mysql_num_rows($result);
    $result2 = mysql_query("select * from links_modrequest where brokenlink=0");
    $totalmodrequests = mysql_num_rows($result2);
    

// List Links waiting for validation

    $result = mysql_query("select lid, cid, sid, title, url, description, name, email, submitter from links_newlink order by lid");
    $numrows = mysql_num_rows($result);
    if ($numrows>0) {
    OpenTable4();
    echo "
    </center><font size=3><b>".translate("Links Waiting for Validation")."</b><br><br><font size=2>";
    while(list($lid, $cid, $sid, $title, $url, $description, $name, $email, $submitter) = mysql_fetch_row($result)) {
    	echo "<form action=admin.php method=post>";
	echo "<font color=Blue>".translate("Link ID: ")."<font color=Black><b>$lid</b><br>";
	echo "Submitter:  $submitter<br>";
	echo "".translate("Page Title: ")."<input class=textbox type=text name=title value=\"$title\" size=50 maxlength=100><br>";
	echo "".translate("Page URL: ")."<input class=textbox type=text name=url value=$url size=50 maxlength=100>&nbsp;[ <a target=_blank href=$url>".translate("Visit")."</a> ]<br>";
	echo "".translate("Description: ")."<br><textarea name=description cols=60 rows=10>$description</textarea><br>";
	echo "".translate("Name: ")."<input class=textbox type=text name=name size=20 maxlength=100 value=\"$name\">&nbsp;&nbsp;";
	echo "".translate("Email: ")."<input class=textbox type=text name=email size=20 maxlength=100 value=$email><br>";

	$result2=mysql_query("select cid, title from links_categories order by title");
	echo "<input type=hidden name=new value=1>";
	echo "<input type=hidden name=lid value=$lid>";
	echo "<input type=hidden name=submitter value=$submitter>";
	echo "".translate("Category: ")."<select name=cat>";
	while(list($ccid, $ctitle) = mysql_fetch_row($result2)) {
	    $sel = "";
	    if ($cid==$ccid AND $sid==0) {
		$sel = "selected";
	    }
	    echo "<option value=$ccid $sel>$ctitle</option>";
	    $result3=mysql_query("select sid, title from links_subcategories where cid=$ccid order by title");
	    while(list($ssid, $stitle) = mysql_fetch_row($result3)) {
    	        $sel = "";
		if ($sid==$ssid) {
		    $sel = "selected";
		}
		echo "<option value=$ccid-$ssid $sel>$ctitle / $stitle</option>";
	    }
	    
	}
    echo "<input type=hidden name=submitter value=$submitter>";
    echo "</select><input type=hidden name=op value=LinksAddLink><input type=submit value=".translate("Add")."> [ <a href=admin.php?op=LinksDelNew&lid=$lid>".translate("Delete")."</a> ]</form><br><hr noshade><br>";
    	
    }
    echo "</td></tr></table></td></tr></table><br>";
    } else {
    }

// Add a New Main Category

    OpenTable4();

    echo "<br><b><center>[ <a href=admin.php?op=LinksCleanVotes>Clean Links DB</a> | 
    <a href=admin.php?op=LinksListBrokenLinks>Broken Link Reports ($totalbrokenlinks)</a> |
    <a href=admin.php?op=LinksListModRequests>Link Modification Requests ($totalmodrequests)</a> ]</center></b><br><br>
    </center><form method=post action=admin.php>
    <font size=3><b>".translate("Add a MAIN Category")."</b><br><br>
    ".translate("Name: ")."<input class=textbox type=text name=title size=30 maxlength=100><br>
    ".translate("Description: ")."<br><textarea name=cdescription cols=60 rows=10></textarea><br>
    <input type=hidden name=op value=LinksAddCat>
    <input type=submit value=".translate("Add")."><br>
    </form></td></tr></table></td></tr></table><br>";

// Add a New Sub-Category

    $result = mysql_query("select * from links_categories");
    $numrows = mysql_num_rows($result);
    if ($numrows>0) {
    OpenTable4();
    echo "
    </center><form method=post action=admin.php>
    <font size=3><b>".translate("Add a SUB-Category")."</b><br><br>
    ".translate("Name: ")."<input class=textbox type=text name=title size=30 maxlength=100>&nbsp;".translate("in")."&nbsp;";
    
    $result=mysql_query("select cid, title from links_categories order by title");
    echo "<select name=cid>";
    while(list($ccid, $ctitle) = mysql_fetch_row($result)) {
	echo "<option value=$ccid>$ctitle</option>";
    }
    echo "</select>
    <input type=hidden name=op value=LinksAddSubCat>
    <input type=submit value=".translate("Add")."><br>
    </form></td></tr></table></td></tr></table><br>";
    } else {
    }

// Add a New Link to Database

    $result = mysql_query("select cid, title from links_categories");
    $numrows = mysql_num_rows($result);
    if ($numrows>0) {
    OpenTable4();
    echo "
    </center><form method=post action=admin.php>
    <font size=3><b>".translate("Add a New Link")."</b><br><br>
    ".translate("Page Title: ")."<input class=textbox type=text name=title size=50 maxlength=100><br>
    ".translate("Page URL: ")."<input class=textbox type=text name=url size=50 maxlength=100 value=\"http://\"><br>";
    $result=mysql_query("select cid, title from links_categories order by title");
    echo "".translate("Category: ")."<select name=cat>";
    while(list($cid, $title) = mysql_fetch_row($result)) {
	echo "<option value=$cid>$title</option>";
	$result2=mysql_query("select sid, title from links_subcategories where cid=$cid order by title");
	while(list($sid, $stitle) = mysql_fetch_row($result2)) {
    	    echo "<option value=$cid-$sid>$title / $stitle</option>";
	}
    }
    echo "</select><br><br><br>
    ".translate("Description: (255 characters max)")."<br><textarea class=textbox name=description cols=60 rows=5></textarea><br><br><br>
    ".translate("Name: ")."<input class=textbox type=text name=name size=30 maxlength=60><br>
    ".translate("E-Mail: ")."<input class=textbox type=text name=email size=30 maxlength=60><br><br>
    <input type=hidden name=op value=LinksAddLink>
    <input type=hidden name=new value=0>
    <input type=hidden name=lid value=0>
    <center><input type=submit value=".translate("Add URL")."><br>
    </form></td></tr></table></td></tr></table><br>";

    } else {
    }

// Modify Category

    $result = mysql_query("select * from links_categories");
    $numrows = mysql_num_rows($result);
    if ($numrows>0) {
    OpenTable4();
    echo "
    </center><form method=post action=admin.php>
    <font size=3><b>".translate("Modify Category")."</b><br><br>";
    $result=mysql_query("select cid, title from links_categories order by title");
    echo "".translate("Category: ")."<select name=cat>";
    while(list($cid, $title) = mysql_fetch_row($result)) {
	echo "<option value=$cid>$title</option>";
	$result2=mysql_query("select sid, title from links_subcategories where cid=$cid order by title");
	while(list($sid, $stitle) = mysql_fetch_row($result2)) {
    	    echo "<option value=$cid-$sid>$title / $stitle</option>";
	}
    }
    echo "</select>
    <input type=hidden name=op value=LinksModCat>
    <input type=submit value=".translate("Modify").">
    </form></td></tr></table></td></tr></table><br>";
    } else {
    }

// Modify Links

    $result = mysql_query("select * from links_links");
    $numrows = mysql_num_rows($result);
    if ($numrows>0) {
    OpenTable4();
    echo "
    </center><form method=post action=admin.php>
    <font size=3><b>".translate("Modify Links")."</b><br><br>
    ".translate("Link ID: ")."<input class=textbox type=text name=lid size=12 maxlength=11>
    <input type=hidden name=op value=LinksModLink>
    <input type=submit value=".translate("Modify").">
    </form></td></tr></table></td></tr></table><br>";
    } else {
    }
    	
    include ("footer.php");
}

function LinksModLink($lid) {
    include ("header.php");
    GraphicAdmin($hlpfile);
    global $anonymous;
    $result = mysql_query("select cid, sid, title, url, description, name, email, hits from links_links where lid=$lid");
    OpenTable4();
    echo "
    </center><font size=3><b>".translate("Modify Links")."</b><br><br><font size=2>";
    while(list($cid, $sid, $title, $url, $description, $name, $email, $hits) = mysql_fetch_row($result)) {
    	$title = stripslashes($title); $description = stripslashes($description);
    	echo "<form action=admin.php method=post>";
	echo "<font color=Blue>".translate("Link ID: ")."<font color=Black><b>$lid</b><br>";
	echo "".translate("Page Title: ")."<input class=textbox type=text name=title value=\"$title\" size=50 maxlength=100><br>";
	echo "".translate("Page URL: ")."<input class=textbox type=text name=url value=$url size=50 maxlength=100>&nbsp;[ <a href=$url>Visit</a> ]<br>";
	echo "".translate("Description: ")."<br><textarea name=description cols=60 rows=10>$description</textarea><br>";
	echo "".translate("Name: ")."<input class=textbox type=text name=name size=50 maxlength=100 value=\"$name\"><br>";
	echo "".translate("E-Mail: ")."<input class=textbox type=text name=email size=50 maxlength=100 value=\"$email\"><br>";
	echo "".translate("Hits: ")."<input class=textbox type=text name=hits value=$hits size=12 maxlength=11><br>";
	$result2=mysql_query("select cid, title from links_categories order by title");
	echo "<input type=hidden name=lid value=$lid>";
	echo "".translate("Category: ")."<select name=cat>";
	while(list($ccid, $ctitle) = mysql_fetch_row($result2)) {
	    $sel = "";
	    if ($cid==$ccid AND $sid==0) {
		$sel = "selected";
	    }
	    echo "<option value=$ccid $sel>$ctitle</option>";
	    $result3=mysql_query("select sid, title from links_subcategories where cid=$ccid order by title");
	    while(list($ssid, $stitle) = mysql_fetch_row($result3)) {
    	        $sel = "";
		if ($sid==$ssid) {
		    $sel = "selected";
		}
		echo "<option value=$ccid-$ssid $sel>$ctitle / $stitle</option>";
	    }
	}
    
    echo "</select><input type=hidden name=op value=LinksModLinkS><input type=submit value=".translate("Modify")."> [ <a href=admin.php?op=LinksDelLink&lid=$lid>".translate("Delete")."</a> ]</form><br>";
    
    echo "<hr>";
    
    //Modify or Add Editorial
    	global $admin;
        
        $resulted2 = mysql_query("select adminid, editorialtimestamp, editorialtext, editorialtitle from links_editorials where linkid=$lid");
        $recordexist = Mysql_num_rows($resulted2);
        // if returns 'bad query' status 0 (add editorial)
        if ($recordexist == 0) {
        	echo "<br>Add Editorial:<br><br>";
        	echo "<form action=admin.php method=post>";
        	echo "<input type=hidden name=linkid value=$lid>";
        	echo "Editorial Title:  <br><input class=textbox type=text name=editorialtitle value=\"$editorialtitle\" size=50 maxlength=100><br>";
        	echo "Editorial Text:   <br><textarea name=editorialtext cols=60 rows=10>$editorialtext</textarea><br>";
                echo "</select><input type=hidden name=op value=LinksAddEditorial><input type=submit value=Add><br><br><br>";
        	
        }
        // if returns 'cool' then status 1 (modify editorial)
        else {       
        	while(list($adminid, $editorialtimestamp, $editorialtext, $editorialtitle) = mysql_fetch_row($resulted2)) {
        	$editorialtitle = stripslashes($editorialtitle); $editorialtext = stripslashes($editorialtext);
    		ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $editorialtimestamp, $editorialtime);
		$editorialtime = strftime("%F",mktime($editorialtime[4],$editorialtime[5],$editorialtime[6],$editorialtime[2],$editorialtime[3],$editorialtime[1]));
		$date_array = explode("-", $editorialtime); 
		$timestamp = mktime(0, 0, 0, $date_array["1"], $date_array["2"], $date_array["0"]); 
       		$formatted_date = date("F j, Y", $timestamp);         	
        	echo "<br><b>Modify Editorial</b>  [ <a href=admin.php?op=LinksDelEditorial&linkid=$lid>Delete</a> ]<br><br>";
        	echo "<form action=admin.php method=post>";
        	echo "Author:  $adminid<br>";
        	echo "Date written:  $formatted_date<br><br>";
        	echo "<input type=hidden name=linkid value=$lid>";
        	echo "Editorial Title:  <br><input class=textbox type=text name=editorialtitle value=\"$editorialtitle\" size=50 maxlength=100><br>";
        	echo "Editorial Text:   <br><textarea name=editorialtext cols=60 rows=10>$editorialtext</textarea><br>";
                echo "</select><input type=hidden name=op value=LinksModEditorial><input type=submit value=".translate("Modify")."><br><br><br>";
                }
    	} 

    echo "<hr>";
    
    // Show Comments
    $result5=mysql_query("SELECT ratingdbid, ratinguser, ratingcomments, ratingtimestamp FROM links_votedata WHERE ratinglid = $lid AND ratingcomments != '' ORDER BY ratingtimestamp DESC");
    $totalcomments = Mysql_num_rows($result5);  
    echo "<table valign=top width=100%>";
    echo "<tr><td colspan=7><b>Link Comments (total comments: $totalcomments)</b><br><br></td></tr>";    
    echo "<tr><td width=20 colspan=1><b>User  </b></td><td colspan=5><b>Comment  </b></td><td><b><center>Delete</center></b></td><br></tr>";
    if ($totalcomments == 0) echo "<tr><td colspan=7><center><font color=cccccc>No Comments<br></font></center></td></tr>";
    $x=0;
    $colorswitch="dddddd";
    while(list($ratingdbid, $ratinguser, $ratingcomments, $ratingtimestamp)=mysql_fetch_row($result5)) {
    	$ratingcomments = stripslashes($ratingcomments);
        ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $ratingtimestamp, $ratingtime);
    	$ratingtime = strftime("%F",mktime($ratingtime[4],$ratingtime[5],$ratingtime[6],$ratingtime[2],$ratingtime[3],$ratingtime[1]));
    	$date_array = explode("-", $ratingtime); 
    	$timestamp = mktime(0, 0, 0, $date_array["1"], $date_array["2"], $date_array["0"]); 
            $formatted_date = date("F j, Y", $timestamp);
            echo "<tr><td valign=top bgcolor=$colorswitch>$ratinguser</td><td valign=top colspan=5 bgcolor=$colorswitch>$ratingcomments</td><td bgcolor=$colorswitch><center><b><a href=admin.php?op=LinksDelComment&lid=$lid&rid=$ratingdbid>X</a></b></center></td><br></tr>";                       
    	$x++;
    	if ($colorswitch=="dddddd") $colorswitch="ffffff";
    		else $colorswitch="dddddd";    	
        }    

    	    
    // Show Registered Users Votes
    $result5=mysql_query("SELECT ratingdbid, ratinguser, rating, ratinghostname, ratingtimestamp FROM links_votedata WHERE ratinglid = $lid AND ratinguser != 'outside' AND ratinguser != '$anonymous' ORDER BY ratingtimestamp DESC");
    $totalvotes = Mysql_num_rows($result5);  
    echo "<tr><td colspan=7><br><br><b>Registered User Votes (total votes: $totalvotes)</b><br><br></td></tr>";
    echo "<tr><td><b>User  </b></td><td><b>IP Address  </b></td><td><b>Rating  </b></td><td><b>User AVG Rating  </b></td><td><b>Total Ratings  </b></td><td><b>Date  </b></td></font></b><td><b><center>Delete</center></b></td><br></tr>";
    if ($totalvotes == 0) echo "<tr><td colspan=7><center><font color=cccccc>No Registered User Votes<br></font></center></td></tr>";
    $x=0;
    $colorswitch="dddddd";
    while(list($ratingdbid, $ratinguser, $rating, $ratinghostname, $ratingtimestamp)=mysql_fetch_row($result5)) {
        ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $ratingtimestamp, $ratingtime);
    	$ratingtime = strftime("%F",mktime($ratingtime[4],$ratingtime[5],$ratingtime[6],$ratingtime[2],$ratingtime[3],$ratingtime[1]));
    	$date_array = explode("-", $ratingtime); 
    	$timestamp = mktime(0, 0, 0, $date_array["1"], $date_array["2"], $date_array["0"]); 
            $formatted_date = date("F j, Y", $timestamp); 
    	
    	//Individual user information
    	$result2=mysql_query("SELECT rating FROM links_votedata WHERE ratinguser = '$ratinguser'");
            $usertotalcomments = Mysql_num_rows($result2);
            $useravgrating = 0;
            while(list($rating2)=mysql_fetch_row($result2))	$useravgrating = $useravgrating + $rating2;
            $useravgrating = $useravgrating / $usertotalcomments;
            $useravgrating = number_format($useravgrating, 1);
            echo "<tr><td bgcolor=$colorswitch>$ratinguser</td><td bgcolor=$colorswitch>$ratinghostname</td><td bgcolor=$colorswitch>$rating</td><td bgcolor=$colorswitch>$useravgrating</td><td bgcolor=$colorswitch>$usertotalcomments</td><td bgcolor=$colorswitch>$formatted_date  </font></b></td><td bgcolor=$colorswitch><center><b><a href=admin.php?op=LinksDelVote&lid=$lid&rid=$ratingdbid>X</a></b></center></td></tr><br>";
    	$x++;
    	if ($colorswitch=="dddddd") $colorswitch="ffffff";
    		else $colorswitch="dddddd";    	
        }    
        
    // Show Unregistered Users Votes
    $result5=mysql_query("SELECT ratingdbid, rating, ratinghostname, ratingtimestamp FROM links_votedata WHERE ratinglid = $lid AND ratinguser = '$anonymous' ORDER BY ratingtimestamp DESC");
    $totalvotes = Mysql_num_rows($result5);  
    echo "<tr><td colspan=7><b><br><br>Unregistered User Votes (total votes: $totalvotes)</b><br><br></td></tr>";
    echo "<tr><td colspan=2><b>IP Address  </b></td><td colspan=3><b>Rating  </b></td><td><b>Date  </b></font></td><td><b><center>Delete</center></b></td><br></tr>";
    if ($totalvotes == 0) echo "<tr><td colspan=7><center><font color=cccccc>No Unregistered User Votes<br></font></center></td></tr>";
    $x=0;
    $colorswitch="dddddd";
    while(list($ratingdbid, $rating, $ratinghostname, $ratingtimestamp)=mysql_fetch_row($result5)) {
        ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $ratingtimestamp, $ratingtime);
    	$ratingtime = strftime("%F",mktime($ratingtime[4],$ratingtime[5],$ratingtime[6],$ratingtime[2],$ratingtime[3],$ratingtime[1]));
    	$date_array = explode("-", $ratingtime); 
    	$timestamp = mktime(0, 0, 0, $date_array["1"], $date_array["2"], $date_array["0"]); 
        $formatted_date = date("F j, Y", $timestamp); 
        echo "<td colspan=2 bgcolor=$colorswitch>$ratinghostname</td><td colspan=3 bgcolor=$colorswitch>$rating</td><td bgcolor=$colorswitch>$formatted_date  </font></b></td><td bgcolor=$colorswitch><center><b><a href=admin.php?op=LinksDelVote&lid=$lid&rid=$ratingdbid>X</a></b></center></td></tr><br>";           
    	$x++;
    	if ($colorswitch=="dddddd") $colorswitch="ffffff";
    		else $colorswitch="dddddd";    	
        }  
        
    // Show Outside Users Votes
    $result5=mysql_query("SELECT ratingdbid, rating, ratinghostname, ratingtimestamp FROM links_votedata WHERE ratinglid = $lid AND ratinguser = 'outside' ORDER BY ratingtimestamp DESC");
    $totalvotes = Mysql_num_rows($result5);  
    echo "<tr><td colspan=7><b><br><br>Outside User Votes (total votes: $totalvotes)</b><br><br></td></tr>";
    echo "<tr><td colspan=2><b>IP Address  </b></td><td colspan=3><b>Rating  </b></td><td><b>Date  </b></td></font></b><td><b><center>Delete</center></b></td><br></tr>";
    if ($totalvotes == 0) echo "<tr><td colspan=7><center><font color=cccccc>No Votes from Outside $sitename<br></font></center></td></tr>";
    $x=0;
    $colorswitch="dddddd"; 
    while(list($ratingdbid, $rating, $ratinghostname, $ratingtimestamp)=mysql_fetch_row($result5)) {
        ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $ratingtimestamp, $ratingtime);
    	$ratingtime = strftime("%F",mktime($ratingtime[4],$ratingtime[5],$ratingtime[6],$ratingtime[2],$ratingtime[3],$ratingtime[1]));
    	$date_array = explode("-", $ratingtime); 
    	$timestamp = mktime(0, 0, 0, $date_array["1"], $date_array["2"], $date_array["0"]); 
        $formatted_date = date("F j, Y", $timestamp); 
        echo "<tr><td colspan=2 bgcolor=$colorswitch>$ratinghostname</td><td colspan=3 bgcolor=$colorswitch>$rating</td><td bgcolor=$colorswitch>$formatted_date  </font></b></td><td bgcolor=$colorswitch><center><b><a href=admin.php?op=LinksDelVote&lid=$lid&rid=$ratingdbid>X</a></b></center></td></tr><br>";           
    	$x++;
    	if ($colorswitch=="dddddd") $colorswitch="ffffff";
    		else $colorswitch="dddddd";
        }            

    echo "<tr><td colspan=6><br></td></tr>";	    
    echo "</table>";
    
    }
    echo "</form></td></tr></table></td></tr></table><br>";
    include ("footer.php");
}

function LinksDelComment($lid, $rid) {
    mysql_query("UPDATE links_votedata SET ratingcomments='' WHERE ratingdbid = $rid");
    mysql_query("UPDATE links_links SET totalcomments = (totalcomments - 1) WHERE lid = $lid");
    Header("Location: admin.php?op=LinksModLink&lid=$lid");
    
}

function LinksDelVote($lid, $rid) {
    mysql_query("delete from links_votedata where ratingdbid=$rid");
    $voteresult = mysql_query("select rating, ratinguser, ratingcomments FROM links_votedata WHERE ratinglid = $lid");
    $totalvotesDB = mysql_num_rows($voteresult);
    include ("voteinclude.php");
    mysql_query("UPDATE links_links SET linkratingsummary=$finalrating,totalvotes=$totalvotesDB,totalcomments=$truecomments WHERE lid = $lid");
    Header("Location: admin.php?op=LinksModLink&lid=$lid");
}

function LinksListBrokenLinks() {
    include ("header.php");
    GraphicAdmin($hlpfile);
    $result = mysql_query("select requestid, lid, modifysubmitter from links_modrequest where brokenlink=1 order by requestid");
    $totalbrokenlinks = mysql_num_rows($result);	
    echo "<center><font size=3><b>".translate("User Reported Broken Links")." ($totalbrokenlinks)</b></font></center><br><br><center>
    ".translate("Ignore (Deletes all <b><i>requests</i></b> for a given link)")."<br>
    ".translate("Delete (Deletes <b><i>broken link</i></b> and <b><i>requests</i></b> for a given link)")."</center><br><br><br>";
    echo "<table align=center width=450>";
    if ($totalbrokenlinks==0) {
    echo "<center><font size=3>".translate("No reported broken links.")."</font></center><br><br><br>";
    }
    else {
        $colorswitch="dddddd";
        echo "
        <tr>
          <td><b>Link</b></td>
          <td><b>Submittor</b></td>
          <td><b>Link Owner</b></td>
          <td><b>Ignore</b></td>
          <td><b>Delete</b></td>
        </tr>";
        
        while(list($requestid, $lid, $modifysubmitter)=mysql_fetch_row($result)) {
    		$result2 = mysql_query("select title, url, submitter from links_links where lid=$lid");
		if ($modifysubmitter != '$anonymous') {
			$result3 = mysql_query("select email from users where uname='$modifysubmitter'");
			list($email)=mysql_fetch_row($result3);
		}
    		list($title, $url, $owner)=mysql_fetch_row($result2);
    			$result4 = mysql_query("select email from users where uname='$owner'");
    			list($owneremail)=mysql_fetch_row($result4);
    			echo "
    			<tr>
    			  <td bgcolor=$colorswitch><a href=$url>$title</a>
    			  </td>";
    			  if ($email=='') { echo "<td bgcolor=$colorswitch>$modifysubmitter"; }
    			  else { echo "<td bgcolor=$colorswitch><a href=mailto:$email>$modifysubmitter</a>"; }
    			  echo "
    			  </td>";
    			  if ($owneremail=='') { echo "<td bgcolor=$colorswitch>$owner"; }
    			  else { echo "<td bgcolor=$colorswitch><a href=mailto:$owneremail>$owner</a>"; }
    			  echo "
    			  </td>
    			  <td bgcolor=$colorswitch><center><a href=admin.php?op=LinksIgnoreBrokenLinks&lid=$lid>X</a></center> 
    			  </td>
    			  <td bgcolor=$colorswitch><center><a href=admin.php?op=LinksDelBrokenLinks&lid=$lid>X</a></center>
    			  </td>    			  
    			</tr>";
    			if ($colorswitch=="dddddd") $colorswitch="ffffff";
       			else $colorswitch="dddddd"; 
       		
    	}

    }
    echo "</table>";
    include ("footer.php");
}

function LinksDelBrokenLinks($lid) {
    mysql_query("delete from links_modrequest where lid=$lid");
    mysql_query("delete from links_links where lid=$lid");
    Header("Location: admin.php?op=LinksListBrokenLinks");
}

function LinksIgnoreBrokenLinks($lid) {
    mysql_query("delete from links_modrequest where lid=$lid and brokenlink=1");
    Header("Location: admin.php?op=LinksListBrokenLinks");
}

function LinksListModRequests() {
    include ("header.php");
    GraphicAdmin($hlpfile);
    $result = mysql_query("select requestid, lid, cid, sid, title, url, description, modifysubmitter from links_modrequest where brokenlink=0 order by requestid");
    $totalmodrequests = mysql_num_rows($result);	
    echo "<center><font size=3><b>".translate("User Link Modification Requests")." ($totalmodrequests)</b></font></center><br><br><br>";
    echo "<table width=95%>";
    while(list($requestid, $lid, $cid, $sid, $title, $url, $description, $modifysubmitter)=mysql_fetch_row($result)) {
    $result2 = mysql_query("select cid, sid, title, url, description, submitter from links_links where lid=$lid");
    list($origcid, $origsid, $origtitle, $origurl, $origdescription, $owner)=mysql_fetch_row($result2);
    $result3 = mysql_query("select title from links_categories where cid=$cid");
    $result4 = mysql_query("select title from links_subcategories where cid=$cid and sid=$sid");
    $result5 = mysql_query("select title from links_categories where cid=$origcid");
    $result6 = mysql_query("select title from links_subcategories where cid=$origcid and sid=$origsid");
    $result7 = mysql_query("select email from users where uname='$modifysubmitter'");
    $result8 = mysql_query("select email from users where uname='$owner'");
    list($cidtitle)=mysql_fetch_row($result3);
    list($sidtitle)=mysql_fetch_row($result4);
    list($origcidtitle)=mysql_fetch_row($result5);
    list($origsidtitle)=mysql_fetch_row($result6);
    list($modifysubmitteremail)=mysql_fetch_row($result7);
    list($owneremail)=mysql_fetch_row($result8);    
    	$title = stripslashes($title);
    	$description = stripslashes($description);
    	if ($owner=="") { $owner="administration"; }
    	if ($origsidtitle=="") { $origsidtitle= "-----"; }
    	if ($sidtitle=="") { $sidtitle= "-----"; }
    	echo "
    	<table border=1 bordercolor=black cellpadding=5 cellspacing=0 align=center width=450>
    	  <tr>
    	   <td>
    	   <table width=100% bgcolor=dddddd>
    	     <tr>
    	       <td valign=top width=45%><b>".translate("Original")."</b></td>
    	       <td rowspan=5 valign=top align=left><font size=1><br>".translate("Description:")."<br>$origdescription</font></td>
    	     </tr>
    	     <tr><td valign=top width=45%><font size=1>".translate("Title:")." $origtitle</td></tr>
    	     <tr><td valign=top width=45%><font size=1>".translate("URL:")." <a href=$origurl>$origurl</a></td></tr>
	     <tr><td valign=top width=45%><font size=1>".translate("Cat:")." $origcidtitle</td></tr>
	     <tr><td valign=top width=45%><font size=1>".translate("Subcat:")." $origsidtitle</td></tr>
    	   </table>
    	   </td>
    	  </tr>
    	  <tr>
    	    <td>
    	   <table width=100%>
    	     <tr>
    	       <td valign=top width=45%><b>".translate("Proposed")."</b></td>
    	       <td rowspan=5 valign=top align=left><font size=1><br>".translate("Description:")."<br>$description</font></td>
    	     </tr>
    	     <tr><td valign=top width=45%><font size=1>".translate("Title:")." $title</td></tr>
    	     <tr><td valign=top width=45%><font size=1>".translate("URL:")." <a href=$url>$url</a></td></tr>
	     <tr><td valign=top width=45%><font size=1>".translate("Cat:")." $cidtitle</td></tr>
	     <tr><td valign=top width=45%><font size=1>".translate("Subcat:")." $sidtitle</td></tr>
    	   </table>
    	    </td>
    	  </tr>
    	</table>
    	<table align=center width=450>
    	  <tr>";
    	    if ($modifysubmitteremail=="") { echo "<td align=left><font size=1>".translate("Submitter").":  $modifysubmitter</font></td>"; }
    	    else { echo "<td align=left><font size=1>".translate("Submitter").":  <a href=mailto:$modifysubmitteremail>$modifysubmitter</a></font></td>"; }
    	    if ($owneremail=="") { echo "<td align=center><font size=1>".translate("Owner").":  $owner</font></td>"; }
    	    else { echo "<td align=center><font size=1>".translate("Owner").": <a href=mailto:$owneremail>$owner</a></font></td>"; }
    	    
    	    echo "
    	    <td align=right><font size=1>( <a href=admin.php?op=LinksChangeModRequests&requestid=$requestid>".translate("Accept")."</a> / <a href=admin.php?op=LinksChangeIgnoreRequests&requestid=$requestid>".translate("Ignore")."</a> )</font></td>
    	  </tr>
    	</table><br><br>";
    }    
    
    
    
    include ("footer.php");
}

function LinksChangeModRequests($requestid) {
    $result = mysql_query("select requestid, lid, cid, sid, title, url, description from links_modrequest where requestid=$requestid");
    while(list($requestid, $lid, $cid, $sid, $title, $url, $description)=mysql_fetch_row($result)) {
    	  
    	  $title = stripslashes($title);
    	  $description = stripslashes($description);
    	  mysql_query("UPDATE links_links SET cid=$cid, sid=$sid, title='$title', url='$url', description='$description' WHERE lid = $lid");	
    }
    mysql_query("delete from links_modrequest where requestid=$requestid");
    Header("Location: admin.php?op=LinksListModRequests");
}

function LinksChangeIgnoreRequests($requestid) {
    mysql_query("delete from links_modrequest where requestid=$requestid");
    Header("Location: admin.php?op=LinksListModRequests");
}

function LinksCleanVotes() {
    $totalvoteresult = mysql_query("select distinct ratinglid FROM links_votedata");	
    while(list($lid)=mysql_fetch_row($totalvoteresult)) {

	    $voteresult = mysql_query("select rating, ratinguser, ratingcomments FROM links_votedata WHERE ratinglid = $lid");
	    $totalvotesDB = mysql_num_rows($voteresult);	
	    include ("voteinclude.php");
            mysql_query("UPDATE links_links SET linkratingsummary=$finalrating,totalvotes=$totalvotesDB,totalcomments=$truecomments WHERE lid = $lid");            
    }
    Header("Location: admin.php?op=links");
}

function LinksModLinkS($lid, $title, $url, $description, $name, $email, $hits, $cat) {
    $cat = explode("-", $cat);
    if ($cat[1]=="") {
        $cat[1] = 0;
    }
    $title = stripslashes(FixQuotes($title));
    $url = stripslashes(FixQuotes($url));
    $description = stripslashes(FixQuotes($description));
    $name = stripslashes(FixQuotes($name));
    $email = stripslashes(FixQuotes($email));
    mysql_query("update links_links set cid='$cat[0]', sid='$cat[1]', title='$title', url='$url', description='$description', name='$name', email='$email', hits='$hits' where lid=$lid");
    Header("Location: admin.php?op=links");
}

function LinksDelLink($lid) {
    mysql_query("delete from links_links where lid=$lid");
    Header("Location: admin.php?op=links");
}

function LinksModCat($cat) {
    include ("header.php");
    GraphicAdmin($hlpfile);
    $cat = explode("-", $cat);
    if ($cat[1]=="") {
        $cat[1] = 0;
    }
    OpenTable4();
    echo "
    <font size=3><b>".translate("Modify Category")."</b><br><br>";
    if ($cat[1]==0) {
	$result=mysql_query("select title, cdescription from links_categories where cid=$cat[0]");
	list($title,$cdescription) = mysql_fetch_row($result);
	$cdescription = stripslashes($cdescription);
	echo "<form action=admin.php method=get>
	".translate("Name: ")."<input class=textbox type=text name=title value=\"$title\" size=51 maxlength=50><br>
	".translate("Description: ")."<br><textarea name=cdescription cols=60 rows=10>$cdescription</textarea><br>
	<input type=hidden name=sub value=\"0\">
	<input type=hidden name=cid value=$cat[0]>
	<input type=hidden name=op value=LinksModCatS>
	<table border=0><tr><td><font size=3>
	<input type=submit value=".translate("Save Changes")."></td><td><font size=3></form>
	<form action=admin.php method=get>
	<input type=hidden name=sub value=\"0\">
	<input type=hidden name=cid value=$cat[0]>
	<input type=hidden name=op value=LinksDelCat>
	<input type=submit value=".translate("Delete")."></form></td></tr></table>";
	
    } else {
	$result=mysql_query("select title from links_categories where cid=$cat[0]");
	list($ctitle) = mysql_fetch_row($result);
	$result2=mysql_query("select title from links_subcategories where sid=$cat[1]");
	list($stitle) = mysql_fetch_row($result2);
	echo "<form action=admin.php method=get>
	".translate("Category Name: ")."$ctitle<br>
	".translate("Sub-Category Name: ")."<input class=textbox type=text name=title value=\"$stitle\" size=51 maxlength=50><br>
	<input type=hidden name=sub value=1>
	<input type=hidden name=cid value=$cat[0]>
	<input type=hidden name=sid value=$cat[1]>
	<input type=hidden name=op value=LinksModCatS>
	<table border=0><tr><td><font size=3>
	<input type=submit value=".translate("Save Changes")."></form></td><td><font size=3>
	<form action=admin.php method=get>
	<input type=hidden name=sub value=1>
	<input type=hidden name=cid value=$cat[0]>
	<input type=hidden name=sid value=$cat[1]>
	<input type=hidden name=op value=LinksDelCat>
	<input type=submit value=".translate("Delete")."></form></td></tr></table>";
    }
    echo "</td></tr></table></td></tr></table><br>";
    include("footer.php");
}

function LinksModCatS($cid, $sid, $sub, $title, $cdescription) {
    if ($sub==0) {
	mysql_query("update links_categories set title='$title', cdescription='$cdescription' where cid=$cid");
    } else {
	mysql_query("update links_subcategories set title='$title' where sid=$sid");
    }
    
    Header("Location: admin.php?op=links");
}

function LinksDelCat($cid, $sid, $sub, $ok=0) {
    if($ok==1) {
	if ($sub>0) {
    	    mysql_query("delete from links_subcategories where sid=$sid");
	    mysql_query("delete from links_links where sid=$sid");
	} else {
	    mysql_query("delete from links_categories where cid=$cid");
	    mysql_query("delete from links_subcategories where cid=$cid");
	    mysql_query("delete from links_links where cid=$cid AND sid=0");
	}
	Header("Location: admin.php?op=links");    

    } else {

	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("WARNING: Are you sure you want to delete this Category and ALL its Links?")."</b><br><br><font color=Black>";
    }
	echo "[ <a href=admin.php?op=LinksDelCat&cid=$cid&sid=$sid&sub=$sub&ok=1>".translate("Yes")."</a> | <a href=admin.php?op=links>".translate("No")."</a> ]<br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");	
}


function LinksDelNew($lid) {
    mysql_query("delete from links_newlink where lid=$lid");
    Header("Location: admin.php?op=links");
}

function LinksAddCat($title, $cdescription) {
    $result = mysql_query("select cid from links_categories where title='$title'");
    $numrows = mysql_num_rows($result);
    if ($numrows>0) {
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("ERROR: The Category")." $title ".translate("already exist!")."</b><br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");
    } else {
	mysql_query("insert into links_categories values (NULL, '$title', '$cdescription')");
	Header("Location: admin.php?op=links");
    }
}

function LinksAddSubCat($cid, $title) {
    $result = mysql_query("select cid from links_subcategories where title='$title' AND cid='$cid'");
    $numrows = mysql_num_rows($result);
    if ($numrows>0) {
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("ERROR: The SubCategory")." $title ".translate("already exist!")."</b><br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");
    } else {
	mysql_query("insert into links_subcategories values (NULL, '$cid', '$title')");
	Header("Location: admin.php?op=links");
    }
}

function LinksAddEditorial($linkid, $editorialtitle, $editorialtext) {
    global $aid;
    $editorialtext = stripslashes(FixQuotes($editorialtext));
    mysql_query("insert into links_editorials values ($linkid, '$aid', now(), '$editorialtext', '$editorialtitle')");
    include("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "<center><br>";
    echo "<font size=3>";
    echo "".translate("Editorial added to the Database")."<br><br>";
    echo "$linkid  $adminid, $editorialtitle, $editorialtext";
    echo "</TD></TR></TABLE></TD></TR></TABLE>";
    include("footer.php");
    
}

function LinksModEditorial($linkid, $editorialtitle, $editorialtext) {
    $editorialtext = stripslashes(FixQuotes($editorialtext));
    mysql_query("update links_editorials set editorialtext='$editorialtext', editorialtitle='$editorialtitle' where linkid=$linkid");
    include("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "<center><br>";
    echo "<font size=3>";
    echo "".translate("Editorial Modified")."<br><br>";
    echo "</TD></TR></TABLE></TD></TR></TABLE>";
    
}

function LinksDelEditorial($linkid) {
    mysql_query("delete from links_editorials where linkid=$linkid");
    include("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "<center><br>";
    echo "<font size=3>";
    echo "".translate("Editorial removed from Database")."<br><br>";
    echo "</TD></TR></TABLE></TD></TR></TABLE>";
    
}

function LinksLinkCheck() {
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "<tr><td colspan=2 width=100%><center><font size=3><b>".translate("Link Validation")."</b></font></center>
    <br><br><center><a href=admin.php?op=LinksValidate&cid=0&sid=0>".translate("Check ALL Links")."</a></center><br><br></td><td>";
    
    echo "<tr><td valign=top><center><b>".translate("Check Categories<br></b>(includes subcategories)")."<br><br><font size=1>";
    $result = mysql_query("select cid, title from links_categories order by title");
    while(list($cid, $title) = mysql_fetch_row($result)) {
        $transfertitle = str_replace (" ", "_", $title);
    	echo "<a href=admin.php?op=LinksValidate&cid=$cid&sid=0&ttitle=$transfertitle>$title</a>()<br>";
    }
    echo "</font></center></td>";
    echo "<td valign=top><center><b>".translate("Check Subcategories")."</b><br><br><br><font size=1>";
    $result = mysql_query("select sid, cid, title from links_subcategories order by title");    
    while(list($sid, $cid, $title) = mysql_fetch_row($result)) {
        $transfertitle = str_replace (" ", "_", $title);
    	$result2 = mysql_query("select title from links_categories where cid = $cid");
    	while(list($ctitle) = mysql_fetch_row($result2)) {echo "<a href=admin.php?op=LinksValidate&cid=0&sid=$sid&ttitle=$transfertitle>$ctitle";}
    	echo "/$title</a>()<br>";
    }
    echo "</font></center><br><br></td>";           
    echo "</table></table>";
    include ("footer.php");

}
    	   	
function LinksValidate($cid, $sid, $ttitle) {
   include ("header.php");
   GraphicAdmin($hlpfile);
   $transfertitle = str_replace ("_", "", $ttitle);
   //Check ALL Links
   
   echo "<table width=95% border=1 bordercolor=AAAAAA>";
   if ($cid==0 && $sid==0) {
   	echo "<tr><td colspan=3><center><b>".translate("Check ALL Links")."</b><br>".translate("(please be patient)")."</center><br><br></td></tr>";
	$result = mysql_query("select lid, title, url, name, email, submitter from links_links order by title");    
   }   	
   //Check Categories & Subcategories
   if ($cid!=0 && $sid==0) {
	echo "<tr><td colspan=3><center><b>".translate("Validating Category (and all subcategories)").":  $transfertitle</b><br>(please be patient)</center><br><br></tr></td>";      	
	$result = mysql_query("select lid, title, url, name, email, submitter from links_links where cid=$cid order by title");    
   }
   //Check Only Subcategory
   if ($cid==0 && $sid!=0) {
   	echo "<tr><td colspan=3><center><b>".translate("Validating Subcategory").": $transfertitle</b><br>".translate("(please be patient)")."</center><br><br></tr></td>";
   	$result = mysql_query("select lid, title, url, name, email, submitter from links_links where sid=$sid order by title");    
   }   	
   
   
   while(list($lid, $title, $url, $name, $email, $submitter) = mysql_fetch_row($result)){	
   	
   	//$rippedurl = str_replace ("http://", "", $url);	
   	//$rippedurlright = strstr ($rippedurl, "/");
   	//if ($rippedurlright == "") {$rippedurlright = "/";}
   	//$rippedurl = str_replace ("$rippedurlright", "", $url); 
   
	if (!$fp){ 
		echo "<tr><td>";
		echo "<b><font color=\"red\">$title</font></b>"; 
		echo "</td>";
		echo "<td>";
		echo "<a href=$url>$rippedurl</a>";
		echo "</td>";
		echo "<td>";
		echo "$rippedurlright";
		echo "</td></tr>";
	}		
	if ($fp){ 
		echo "<tr><td>";
		echo "<b>$title</b>"; 
		echo "</td>";
		echo "<td>";
		echo "<a href=$url>$rippedurl</a>";
		echo "</td>";
		echo "<td>";
		echo "$rippedurlright";
		echo "</td></tr>";		
	} 
   	
   	
   	
   	
   	//$rippedurl = str_replace ("http://", "", $url);
   	//if (substr($rippedurl, -1) == "/") { $rippedurl = substr_replace($rippedurl, "", -1); }
        //
   	//
   	//$tester = fsockopen("$rippedurl", 80, &$errno, &$errstr, 30);  
	//
	//if(!$tester) {  
	//	echo "<tr><td>";
	//	echo "<b><font color=\"red\">$title</font></b>"; 
	//	echo "</td>";
	//	echo "<td>";
	//	echo "<a href=$url>$rippedurl</a>";
	//	echo "</td></tr>";
	//}  
	//else {  
	//	echo "<tr><td>";
	//	echo "$title";
	//	echo "</td>";
	//	echo "<td>";
	//	echo "<a href=$url>$rippedurl</a>";
	//	echo "</td></tr>";		
	//}
   }
   echo "</table>";
   	
   include ("footer.php");
    	
}

function LinksAddLink($new, $lid, $title, $url, $cat, $description, $name, $email, $submitter) {
    $result = mysql_query("select url from links_links where url='$url'");
    $numrows = mysql_num_rows($result);
    if ($numrows>0) {
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("ERROR: This URL is already listed in the Database!")."</b><br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");
    } else {

// Check if Title exist
    if ($title=="") {
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("ERROR: You need to type a TITLE for your URL!")."</b><br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");
    }
// Check if URL exist
    if ($url=="") {
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("ERROR: You need to type a URL for your URL!")."</b><br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");
    }
// Check if Description exist
    if ($description=="") {
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("ERROR: You need to type a DESCRIPTION for your URL!")."</b><br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");
    }
    $cat = explode("-", $cat);
    if ($cat[1]=="") {
	$cat[1] = 0;
    }
    $title = stripslashes(FixQuotes($title));
    $url = stripslashes(FixQuotes($url));
    $description = stripslashes(FixQuotes($description));
    $name = stripslashes(FixQuotes($name));
    $email = stripslashes(FixQuotes($email));
    mysql_query("insert into links_links values (NULL, '$cat[0]', '$cat[1]', '$title', '$url', '$description', now(), '$name', '$email', '0','$submitter',0,0,0)");
    include("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "<center><br>";
    echo "<font size=3>";
    echo "".translate("New Link added to the Database")."<br><br>";
    echo "</TD></TR></TABLE></TD></TR></TABLE>";
    if ($new==1) {
	mysql_query("delete from links_newlink where lid=$lid");
	if ($email=="") {
	} else {
	    $subject = "".translate("Your Link at $sitename")."";
	    $message = "".translate("Hello")." $name:\n\n".translate("We approved your link submission for our search engine.")."\n\n".translate("Page Name: ")."$title\n".translate("Page URL: ")."$url\n".translate("Description: ")."$description\n\n\n".translate("You can browse our search engine at:")." $nuke_url/links.php\n\n".translate("Thanks for your submission!")."\n\n$sitename ".translate("team.")."";
	    $from = "$sitename";
	    mail($email, $subject, $message, "From: $from\nX-Mailer: PHP/" . phpversion());
	}
    }
    include("footer.php");
    }
}

switch ($op) {
			
		case "links":
			links();
			break;

		case "LinksDelNew":
			LinksDelNew($lid);
			break;

		case "LinksAddCat":
			LinksAddCat($title, $cdescription);
			break;

		case "LinksAddSubCat":
			LinksAddSubCat($cid, $title);
			break;

		case "LinksAddLink":
			LinksAddLink($new, $lid, $title, $url, $cat, $description, $name, $email, $submitter);
			break;
			
		case "LinksAddEditorial":
			LinksAddEditorial($linkid, $editorialtitle, $editorialtext);
			break;			
			
		case "LinksModEditorial":
			LinksModEditorial($linkid, $editorialtitle, $editorialtext);
			break;	
			
		case "LinksLinkCheck":
			LinksLinkCheck();
			break;	
		
		case "LinksValidate":
			LinksValidate($cid, $sid, $ttitle);
			break;

		case "LinksDelEditorial":
			LinksDelEditorial($linkid);
			break;						

		case "LinksCleanVotes":
			LinksCleanVotes();
			break;	
			
		case "LinksListBrokenLinks":
			LinksListBrokenLinks();
			break;

		case "LinksDelBrokenLinks":
			LinksDelBrokenLinks($lid);
			break;
			
		case "LinksIgnoreBrokenLinks":
			LinksIgnoreBrokenLinks($lid);
			break;			
			
		case "LinksListModRequests":
			LinksListModRequests();
			break;		
			
		case "LinksChangeModRequests":
			LinksChangeModRequests($requestid);
			break;	
			
	        case "LinksChangeIgnoreRequests":
			LinksChangeIgnoreRequests($requestid);
			break;
			
		case "LinksDelCat":
			LinksDelCat($cid, $sid, $sub, $ok);
			break;

		case "LinksModCat":
			LinksModCat($cat);
			break;

		case "LinksModCatS":
			LinksModCatS($cid, $sid, $sub, $title, $cdescription);
			break;

		case "LinksModLink":
			LinksModLink($lid);
			break;

		case "LinksModLinkS":
			LinksModLinkS($lid, $title, $url, $description, $name, $email, $hits, $cat);
			break;

		case "LinksDelLink":
			LinksDelLink($lid);
			break;

		case "LinksDelVote":
			LinksDelVote($lid, $rid);
			break;			

		case "LinksDelComment":
			LinksDelComment($lid, $rid);
			break;

}

} else {
    echo "Access Denied";
}
?>