<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)            */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* ====================================                                 */
/* Web Links Modified from the original                                 */
/* Copyright (c) 2000 by James Knickelbein                              */
/* Journey Milwaukee (http://www.journeymilwaukee.com)                  */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!isset($mainfile)) { include("mainfile.php"); }

function logo() {
	echo "<center><br><a href=links.php><img src=images/links/web.gif border=1></a></center><br>";
}

function menu($mainlink) {
echo "
<BR><CENTER>
<TABLE align=center CELLSPACING=0 CELLPADDING=2 BORDER=0 BGCOLOR=000000>
<TR><TD COLSPAN=2>

<TABLE align=center CELLSPACING=0 CELLPADDING=3 BORDER=0 BGCOLOR=FFFFFF>
<TR><TD><FONT SIZE=2>";
 if ($mainlink>0) {
    echo "<a href=links.php>".translate("Links Main")."</a>&nbsp&nbsp|&nbsp&nbsp</TD><TD><FONT SIZE=2>";
 }
 echo "
 <a href=links.php?op=AddLink>".translate("Add Link")."</a></TD><TD><FONT SIZE=2>
 &nbsp|&nbsp&nbsp<a href=links.php?op=NewLinks>".translate("New")."</a></TD><TD><FONT SIZE=2>
 &nbsp|&nbsp&nbsp<a href=links.php?op=MostPopular>".translate("Popular")."</a></TD><TD><FONT SIZE=2>
 &nbsp|&nbsp&nbsp<a href=links.php?op=TopRated>".translate("Top Rated")."</a></TD><TD><FONT SIZE=2>
 &nbsp|&nbsp&nbsp<a href=links.php?op=RandomLink>".translate("Random")."</a>
</FONT></TD></TR></TABLE></tr></td></TABLE>
";
}

function SearchForm() {
echo "
    <center>
    <form action=links.php?op=search&query=$query method=POST>
    <div>
    <table border=0 cellspacing=0 cellpadding=0>
    <tr><td><FONT SIZE=2><input type=text size=30 name=query> <input type=submit value=".translate("Search")."></td></tr>
    </table>
    </div>
    </form>
    </center>
";
}

function mainheader() {
	$mainlink = 1;
	echo "<BR><CENTER>
	<TABLE align=center CELLSPACING=0 CELLPADDING=2 BORDER=0 BGCOLOR=000000>
	<TR><TD COLSPAN=2>
	
	<TABLE align=center CELLSPACING=0 CELLPADDING=3 BORDER=0 BGCOLOR=FFFFFF>
	<TR><TD><FONT SIZE=2>";
	 if ($mainlink>0) {
	    echo "<a href=links.php>".translate("Links Main")."</a>&nbsp;|</TD><TD><FONT SIZE=2>";
	 }
	 echo "
	 <a href=links.php?op=AddLink>".translate("Add Link")."</a></TD><TD><FONT SIZE=2>
	 |&nbsp;<a href=links.php?op=NewLinks>".translate("New")."</a></TD><TD><FONT SIZE=2>
	 |&nbsp;<a href=links.php?op=MostPopular>".translate("Popular")."</a></TD><TD><FONT SIZE=2>
	 |&nbsp;<a href=links.php?op=TopRated>".translate("Top Rated")."</a></TD><TD><FONT SIZE=2>
	 |&nbsp;<a href=links.php?op=RandomLink>".translate("Random")."</a>
        </FONT></TD></TR></table></td></tr></TABLE>";
	echo "
	<table width=100%>
	<tr><td>
	<tr>
	  <td width=50%>";
	    logo();
	    echo "<br>";
	    SearchForm();
	    echo "</td width=50%></tr></table>";
//	</TD></TR></TABLE>";
    
}

function linkinfomenu($lid,$ttitle) {
   $ttitle = ereg_replace(" ", "_", $ttitle);
   echo"
   <br><font size=2>
   <a href=links.php?op=viewlinkcomments&lid=$lid&ttitle=$ttitle>".translate("Link Comments")."</a>
   | <a href=links.php?op=viewlinkdetails&lid=$lid&ttitle=$ttitle>".translate("Additional Details")."</a> 
   | <a href=links.php?op=viewlinkeditorial&lid=$lid&ttitle=$ttitle>".translate("Editor Review")."</a>
   | <a href=links.php?op=modifylinkrequest&lid=$lid>".translate("Modify")."</a>
   | <a href=links.php?op=brokenlink&lid=$lid>".translate("Report Broken Link")."</a></font><br>";   
   
}

function index() {
    include("header.php");
    OpenTable4();
    $mainlink = 0;
    menu($mainlink); 
    logo();
    SearchForm();

echo "
<table border=0 cellspacing=10 cellpadding=0><tr>";

$result=mysql_query("select cid, title, cdescription from links_categories order by title");
$count = 0;
while(list($cid, $title, $cdescription) = mysql_fetch_row($result)) {

    $cresult = mysql_query("select * from links_links where cid=$cid");
    $cnumrows = mysql_num_rows($cresult);
    echo "<td><font size=3><li><a href=links.php?op=viewlink&cid=$cid><b>$title</b></a> ($cnumrows)</font>";
    categorynewlinkgraphic($cid);
    if ($description) {
	echo "<font size=2>$cdescription<br></font>";
    } else {
	echo "<br>";
    }
    $result2 = mysql_query("select sid, title from links_subcategories where cid=$cid order by title limit 0,3");
    $space = 0;
    while(list($sid, $stitle) = mysql_fetch_row($result2)) {
        if ($space>0) {
	    echo ",&nbsp;";
	}
	echo "<font size=2><a href=links.php?op=viewslink&sid=$sid>$stitle</a></font>";
	$space++;
    }
    if ($count<1) {
	echo "</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
    }
    $count++;
    if ($count==2) {
	echo "</td></tr><tr>";
	$count = 0;
    }
}
    echo "</td></tr></table>";
    $result=mysql_query("select * from links_links");
    $numrows = mysql_num_rows($result);
    echo "<br><br><center><font size=2>".translate("There are")." <b>$numrows</b> ".translate("Links in our Database")." </center>";
    echo "</font></basefont>";
    CloseTable();
    include("footer.php");
}


function AddLink() {
    global $links_anonaddlinklock;
    include("header.php");
    OpenTable4();
    $mainlink = 1;
    global $user, $cookie;
    mainheader();
    echo "<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=1 BORDER=0><TR><TD COLSPAN=2>
    <TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=8 BORDER=0><TR><TD>
    <br><br>";
    
    if (isset($user) || $links_anonaddlinklock != 1) {
    	echo "
	<LI>".translate("Submit a unique link only once.")."
	<LI>".translate("All links are posted pending verification.")."
	<LI>".translate("Username and IP are recorded, so please don't abuse the system.")."
	
    	<form method=post action=links.php?op=Add>
    	<font size=3>
    	".translate("Page Title: ")."&nbsp;<input type=text name=title size=50 maxlength=100><br>
    	".translate("Page URL: ")."<input type=text name=url size=50 maxlength=100 value=\"http://\"><br>";
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
    	".translate("Description: (255 characters max)")."<br><textarea name=description cols=60 rows=5></textarea><br><br><br>
    	".translate("Your Name: ")."<input type=text name=name size=30 maxlength=60><br>
    	".translate("Your Email: ")."<input type=text name=email size=30 maxlength=60><br><br>
    	<input type=hidden name=op value=Add>
    	<center><input type=submit value=".translate("Add URL")."><br><br>
    	</form>";
    	;
    }else {
    	echo "<center>".translate("You are not a registered user or you have not logged in.")."<br>
		      ".translate("If you were registered you could add links on this website.")."<br><br>
    	              <a href=user.php>".translate("Register for an Account")."</a>";
    }
    echo "</TD></TR></TABLE></TD></TR></TABLE>";
    CloseTable();
    include("footer.php");
}

function Add($title, $url, $name, $cat, $description, $name, $email) {
    global $user;
    $result = mysql_query("select url from links_links where url='$url'");
    $numrows = mysql_num_rows($result);
    if ($numrows>0) {
	include("header.php");
	echo "<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=1 BORDER=0><TR><TD COLSPAN=2>
	<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=8 BORDER=ff0><TR><TD><center><br>";
	SearchForm();
	echo "<font size=3 color=Red>";
	echo "<b>".translate("ERROR: This URL is already listed in the Database!")."</b><br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");
    } else {
    if(isset($user)) {
		$user2 = base64_decode($user);
		$cookie = explode(":", $user2);
		cookiedecode($user);
		$submitter = $cookie[1];    
    }
// Check if Title exist
    if ($title=="") {
	include("header.php");
	echo "<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=1 BORDER=0><TR><TD COLSPAN=2>
	<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=8 BORDER=0><TR><TD><center><br>";
	SearchForm();
	echo "<font size=3 color=Red>";
	echo "<b>".translate("ERROR: You need to type a TITLE for your URL!")."</b><br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");
    }
// Check if URL exist
    if ($url=="") {
	include("header.php");
	echo "<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=1 BORDER=0><TR><TD COLSPAN=2>
	<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=8 BORDER=0><TR><TD><center><br>";
	SearchForm();
	echo "<font size=3 color=Red>";
	echo "<b>".translate("ERROR: You need to type a URL for your URL!")."</b><br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");
    }
// Check if Description exist
    if ($description=="") {
	include("header.php");
	echo "<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=1 BORDER=0><TR><TD COLSPAN=2>
	<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=8 BORDER=0><TR><TD><center><br>";
	SearchForm();
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
    mysql_query("insert into links_newlink values (NULL, '$cat[0]', '$cat[1]', '$title', '$url', '$description', '$name', '$email', '$submitter')");
    include("header.php");
    $mainlink = 1;
    menu($mainlink);
    echo "<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=1 BORDER=0 ><TR><TD COLSPAN=2>
    <TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=8 BORDER=0><TR><TD><center><br>";
    SearchForm();
    echo "<font size=3>";
    echo "".translate("We received your Link submission. Thanks!")."<br>";
    echo "".translate("You'll receive and E-mail when it's approved.")."<br><br>";
    echo "</TD></TR></TABLE></TD></TR></TABLE>";
    include("footer.php");
    }
}


function NewLinks($newlinkshowdays) {
    global $admin;
    include("header.php");
    OpenTable4();
    mainheader();
    echo "
    <TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=8 BORDER=0><TR><TD>";
    
    echo "<TABLE WIDTH=100% CELLSPACING=2 CELLPADDING=2 BORDER=0 BGCOLOR=CCCCCC><TR><TD>";    
    echo "<center><font size=3><b>".translate("New Links")."</b></font></center>";
    echo "</tr></td></table><br>";

    $counter = 0;
    $allweeklinks = 0;
    while ($counter <= 7-1){
    $newlinkdayRaw = (time()-(86400 * $counter));
    $newlinkday = date("d-M-Y", $newlinkdayRaw);
    $newlinkView = date("F d, Y", $newlinkdayRaw);
    $newlinkDB = Date("Y-m-d", $newlinkdayRaw);
    $result = mysql_query("select * FROM links_links WHERE date LIKE '%$newlinkDB%'");
    $totallinks = mysql_num_rows($result); 
    $counter++;
    $allweeklinks = $allweeklinks + $totallinks;
    }

    $counter = 0;
    while ($counter <=30-1){
        $newlinkdayRaw = (time()-(86400 * $counter));
        # $newlinkday = date("d-M-Y", $newlinkdayRaw);
        # $newlinkView = date("F d, Y", $newlinkdayRaw);
        $newlinkDB = Date("Y-m-d", $newlinkdayRaw);
        $result = mysql_query("select * FROM links_links WHERE date LIKE '%$newlinkDB%'");
        $totallinks = mysql_num_rows($result);
        $allmonthlinks = $allmonthlinks + $totallinks;
        $counter++;
    }    
    echo "<font color = $fontcolor1><center>
          ".translate("Total new links: Last week")." - $allweeklinks \ ".translate("Last 30 days")." - $allmonthlinks
                  </font><br>
	  ".translate("Show:")." (<a href=links.php?op=NewLinks&newlinkshowdays=7>".translate("week")."</a>, <a href=links.php?op=NewLinks&newlinkshowdays=14>2 ".translate("weeks")."</a>, <a href=links.php?op=NewLinks&newlinkshowdays=30>30 ".translate("days")."</a>)
                  
                  </center><br>";

    //List Last VARIABLE Days of Links   
    if (!isset($newlinkshowdays)) {$newlinkshowdays = 7;}
    echo "<center><br><b>".translate("Total new links for last")." $newlinkshowdays ".translate("days").":</b><br><br>";
    $counter = 0;
    $allweeklinks = 0;
    while ($counter <= $newlinkshowdays-1){
    $newlinkdayRaw = (time()-(86400 * $counter));
    $newlinkday = date("d-M-Y", $newlinkdayRaw);
    $newlinkView = date("F d, Y", $newlinkdayRaw);
    $newlinkDB = Date("Y-m-d", $newlinkdayRaw);
    $result = mysql_query("select * FROM links_links WHERE date LIKE '%$newlinkDB%'");
    $totallinks = mysql_num_rows($result); 
    $counter++;
    $allweeklinks = $allweeklinks + $totallinks;
    echo "<LI><a href=links.php?op=NewLinksDate&selectdate=$newlinkdayRaw>$newlinkView</a>&nbsp( $totallinks )";
    }
    $counter = 0;
    $allmonthlinks = 0;
    
    echo "</center></TD></TR></TABLE>";
    CloseTable();
    include("footer.php");
}

function NewLinksDate($selectdate) {
    global $admin;
    $dateDB = (date("d-M-Y", $selectdate));
    $dateView = (date("F d, Y", $selectdate));
    include("header.php");
    OpenTable4();
    mainheader();
    $newlinkDB = Date("Y-m-d", $selectdate);
    $result = mysql_query("select * FROM links_links WHERE date LIKE '%$newlinkDB%'");
    $totallinks = mysql_num_rows($result); 
    
    echo "<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=8 BORDER=0><TR><TD><center>";
    echo "<TABLE WIDTH=100% CELLSPACING=2 CELLPADDING=2 BORDER=0 BGCOLOR=CCCCCC><TR><TD>";
    echo "<FONT SIZE=3><b>$dateView - $totallinks ".translate("New Links")."</b>";
    echo "</TD></TR></TABLE></center><font size=2>";    
    
    $result=mysql_query("select lid, cid, sid, title, description, date, hits, linkratingsummary, totalvotes, totalcomments from links_links where date LIKE '%$newlinkDB%' order by title ASC");
    echo "<table width=100% cellspacing=0 cellpadding=10 border=0><tr><td><font size=2>";
    while(list($lid, $cid, $sid, $title, $description, $time, $hits, $linkratingsummary, $totalvotes, $totalcomments)=mysql_fetch_row($result)) {
	$linkratingsummary = number_format($linkratingsummary, $mainvotedecimal);
	$title = stripslashes($title); $description = stripslashes($description);
        echo "<a href=links.php?op=visit&lid=$lid target=new>$title</a>";
	newlinkgraphic($datetime, $time);
	popgraphic($hits);
	echo "<br>";

	echo "<font color=$textcolor1>".translate("Description: ")."<font color=000000>$description<br>";
	
	setlocale ("LC_TIME", "$locale");
	// INSERT code for *editor review* here
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);
	$datetime = strftime("".translate("linksdatestring")."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
	$datetime = ucfirst($datetime);
	echo "<font color=$textcolor1>".translate("Added on: ")."<font color=000000><b>$datetime</b><font color=777777> ".translate("Hits: ")."<font color=000000>$hits";
        $transfertitle = str_replace (" ", "_", $title);
        //voting & comments stats
        if ($totalvotes == 1) $votestring = "".translate("vote")."";
        	else $votestring = "".translate("votes")."";
        if ($linkratingsummary!="0" || $linkratingsummary!="0.0") echo "<font color=$textcolor1> ".translate("Rating").":<font color=000000> $linkratingsummary ($totalvotes $votestring)";
        echo "<br><a href=links.php?op=ratelink&lid=$lid&ttitle=$transfertitle>".translate("Rate this Site")."</a>";
        if ($totalvotes != 0) echo "&nbsp|&nbsp<a href=\"links.php?op=viewlinkdetails&lid=$lid&ttitle=$transfertitle\">".translate("Details")."</a>";
        if ($totalcomments != 0) echo "&nbsp|&nbsp<a href=\"links.php?op=viewlinkcomments&lid=$lid&ttitle=$transfertitle\">".translate("Comments")." ($totalcomments)</a>";	
	$result2=mysql_query("select title from links_categories where cid=$cid");
	detecteditorial($lid, $transfertitle);
	echo "<br>";
	list($ctitle) = mysql_fetch_row($result2);
	echo "<font color=$textcolor1>".translate("Category: ")."<font color=000000>$ctitle";
	$result3=mysql_query("select title from links_subcategories where sid=$sid");
	while(list($stitle) = mysql_fetch_row($result3)) {
	    echo " / <font color=000000>$stitle";
	}
	echo "<br><br>";
    }
    echo "</TD></TR></TABLE></TD></TR></TABLE>";
    CloseTable();
    include("footer.php");
}

function TopRated($ratenum, $ratetype) {			
    global $admin, $toplinks;
    include("header.php");
    OpenTable4();
    mainheader();
    if ($ratenum != "" && $ratetype != "") {
    	$toplinks = $ratenum;
    	if ($ratetype == "percent") $toplinkspercentrigger = 1;
    }
    if ($ratenum == "") {
	$toplinks = 10;
    }
    if ($toplinkspercentrigger == 1) {
    	$toplinkspercent = $toplinks;
    	$result=mysql_query("select * from links_links where linkratingsummary != 0");
    	$totalratedlinks = mysql_num_rows($result);
    	$toplinks = $toplinks / 100;
    	$toplinks = $totalratedlinks * $toplinks;
    	$toplinks = round($toplinks);
    }
    echo "<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=8 BORDER=0><TR><TD>";    
    echo "<TABLE WIDTH=100% CELLSPACING=2 CELLPADDING=2 BORDER=0 BGCOLOR=CCCCCC><TR><TD>";
    if ($toplinkspercentrigger == 1) { echo "<FONT SIZE=3><b><center>".translate("Best Rated Links - Top")." $toplinkspercent% (".translate("of")." $totalratedlinks ".translate("total rated links").")</center></b></font>";}
    	else {echo "<FONT SIZE=3><b><center>".translate("Best Rated Links - Top")." $toplinks </center></b></font>";}
    echo "</TR></TD></table>";
    
    echo "<tr><td><FONT COLOR=$textcolor1><center>".translate("Note").": $linkvotemin ".translate("total votes requirement")."<br>".translate("Show Top").": (<a href=links.php?op=TopRated&ratenum=10&ratetype=num>10</a>, 
    		<a href=links.php?op=TopRated&ratenum=25&ratetype=num>25</a>, 
    		<a href=links.php?op=TopRated&ratenum=50&ratetype=num>50</a> | 
    		<a href=links.php?op=TopRated&ratenum=1&ratetype=percent>1%</a>, 
    		<a href=links.php?op=TopRated&ratenum=5&ratetype=percent>5%</a>, 
    		<a href=links.php?op=TopRated&ratenum=10&ratetype=percent>10%</a>)</center></font><br><br></td></tr>";
        
    $result=mysql_query("select lid, cid, sid, title, description, date, hits, linkratingsummary, totalvotes, totalcomments from links_links where linkratingsummary != 0 and totalvotes >= '$linkvotemin' order by linkratingsummary DESC limit 0,$toplinks");
    echo "<tr><td>";
    while(list($lid, $cid, $sid, $title, $description, $time, $hits, $linkratingsummary, $totalvotes, $totalcomments)=mysql_fetch_row($result)) {
	$linkratingsummary = number_format($linkratingsummary, $mainvotedecimal);
	$title = stripslashes($title); $description = stripslashes($description);
        echo "<a href=links.php?op=visit&lid=$lid target=new>$title</a>";
	newlinkgraphic($datetime, $time);
	popgraphic($hits);
	echo "<br>";
	echo "<font color=$textcolor1>".translate("Description: ")."<font color=000000>$description<br>";
	setlocale ("LC_TIME", "$locale");
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);
	$datetime = strftime("".translate("linksdatestring")."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
	$datetime = ucfirst($datetime);
	echo "<font color=$textcolor1>".translate("Added on: ")."<font color=000000>$datetime<font color=777777> ".translate("Hits: ")."<font color=000000>$hits";
	
	$transfertitle = str_replace (" ", "_", $title);
	//voting & comments stats
        if ($totalvotes == 1) $votestring = "".translate("vote")."";
        	else $votestring = "".translate("votes")."";
	if ($linkratingsummary!="0" || $linkratingsummary!="0.0") echo "<font color=777777> ".translate("Rating").":<font color=000000><b> $linkratingsummary </b>($totalvotes $votestring)";        	
	echo "<br><a href=links.php?op=ratelink&lid=$lid&ttitle=$transfertitle>".translate("Rate this Site")."</a>";
	if ($totalvotes != 0) echo "&nbsp|&nbsp<a href=\"links.php?op=viewlinkdetails&lid=$lid&ttitle=$transfertitle\">".translate("Details")."</a>";
	        if ($totalcomments != 0) echo "&nbsp|&nbsp<a href=\"links.php?op=viewlinkcomments&lid=$lid&ttitle=$transfertitle\">".translate("Comments")." ($totalcomments)</a>";
	detecteditorial($lid, $transfertitle);	        
	echo "<br>";	
	$result2=mysql_query("select title from links_categories where cid=$cid");
	list($ctitle) = mysql_fetch_row($result2);
	echo "<font color=$textcolor1>".translate("Category: ")."<font color=000000>$ctitle";
	$result3=mysql_query("select title from links_subcategories where sid=$sid");
	while(list($stitle) = mysql_fetch_row($result3)) {
	    echo " / <font color=000000>$stitle";
	}
	echo "<br><br>";
 
    
    }
    echo "</tr></td>";	
    echo "</TD></TR></TABLE>";   
    CloseTable();
    include("footer.php");
}

function MostPopular($ratenum, $ratetype) {
    global $admin, $toplinks;
    include("header.php");
    OpenTable4();
    mainheader();
    if ($ratenum != "" && $ratetype != "") {
    	$mostpoplinks = $ratenum;
	if ($ratetype == "percent") $mostpoplinkspercentrigger = 1;
    }
    if ($ratenum == "") {
	$mostpoplinks = $toplinks;
    }
    if ($mostpoplinkspercentrigger == 1) {
    	$toplinkspercent = $mostpoplinks;
    	$result=mysql_query("select * from links_links");
    	$totalmostpoplinks = mysql_num_rows($result);
    	$mostpoplinks = $mostpoplinks / 100;
    	$mostpoplinks = $totalmostpoplinks * $mostpoplinks;
    	$mostpoplinks = round($mostpoplinks);
    }
    echo "<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=8 BORDER=0><TR><TD>";    
    echo "<TABLE WIDTH=100% CELLSPACING=2 CELLPADDING=2 BORDER=0 BGCOLOR=CCCCCC><TR><TD>";
    if ($mostpoplinkspercentrigger == 1) {echo "<FONT SIZE=3><b><center>".translate("Most Popular - Top")." $toplinkspercent% (".translate("of all")." $totalmostpoplinks ".translate("links").")</center></b>";}
    	else {echo "<FONT SIZE=3><b><center>".translate("Most Popular - Top")." $mostpoplinks </center></b>";}
    echo "</TD></TR></TABLE></center><FONT SIZE=2>";
    echo "<tr><td><FONT COLOR=$textcolor1><center>".translate("Show Top").": (<a href=links.php?op=MostPopular&ratenum=10&ratetype=num>10</a>, 
    		<a href=links.php?op=MostPopular&ratenum=25&ratetype=num>25</a>, 
    		<a href=links.php?op=MostPopular&ratenum=50&ratetype=num>50</a> | 
    		<a href=links.php?op=MostPopular&ratenum=1&ratetype=percent>1%</a>, 
    		<a href=links.php?op=MostPopular&ratenum=5&ratetype=percent>5%</a>, 
    		<a href=links.php?op=MostPopular&ratenum=10&ratetype=percent>10%</a>)</font></center><br><br></td></tr>";
    
    $result=mysql_query("select lid, cid, sid, title, description, date, hits, linkratingsummary, totalvotes, totalcomments from links_links order by hits DESC limit 0,$mostpoplinks");
    echo "<tr><td>";
    while(list($lid, $cid, $sid, $title, $description, $time, $hits, $linkratingsummary, $totalvotes, $totalcomments)=mysql_fetch_row($result)) {
	$linkratingsummary = number_format($linkratingsummary, $mainvotedecimal);
	$title = stripslashes($title); $description = stripslashes($description);
        echo "<a href=links.php?op=visit&lid=$lid target=new>$title</a>";
	newlinkgraphic($datetime, $time);
	popgraphic($hits);
	
	echo "<br>";
	echo "<font color=777777>".translate("Description: ")."<font color=000000>$description<br>";
	setlocale ("LC_TIME", "$locale");
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);
	$datetime = strftime("".translate("linksdatestring")."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
	$datetime = ucfirst($datetime);
	echo "<font color=777777>".translate("Added on: ")."<font color=000000>$datetime<font color=777777> ".translate("Hits: ")."<font color=000000><b>$hits</b>";
	
	$transfertitle = str_replace (" ", "_", $title);
	//voting & comments stats
        if ($totalvotes == 1) $votestring = "".translate("vote")."";
        	else $votestring = "".translate("votes")."";
	if ($linkratingsummary!="0" || $linkratingsummary!="0.0") echo "<font color=777777> ".translate("Rating").":<font color=000000> $linkratingsummary ($totalvotes $votestring)";        	
	echo "<br><a href=links.php?op=ratelink&lid=$lid&ttitle=$transfertitle>".translate("Rate this Site")."</a>";
	if ($totalvotes != 0) echo "&nbsp|&nbsp<a href=\"links.php?op=viewlinkdetails&lid=$lid&ttitle=$transfertitle\">".translate("Details")."</a>";
	        if ($totalcomments != 0) echo "&nbsp|&nbsp<a href=\"links.php?op=viewlinkcomments&lid=$lid&ttitle=$transfertitle\">".translate("Comments")." ($totalcomments)</a>";
	detecteditorial($lid, $transfertitle);
	echo "<br>";	
	$result2=mysql_query("select title from links_categories where cid=$cid");
	list($ctitle) = mysql_fetch_row($result2);
	echo "<font color=777777>".translate("Category: ")."<font color=000000>$ctitle";
	$result3=mysql_query("select title from links_subcategories where sid=$sid");
	while(list($stitle) = mysql_fetch_row($result3)) {
	    echo " / <font color=000000>$stitle";
	}
	echo "<br><br>";
    }
    echo "</tr></td>";	
    echo "</TD></TR></TABLE>";
    CloseTable();
    include("footer.php");
}

function RandomLink() {
    $result = mysql_query("select * from links_links");
    $numrows = mysql_num_rows($result);
    srand((double)microtime()*1000000);
    $random = rand(1,$numrows);
    $result2 = mysql_query("select url from links_links where lid='$random'");
    list($url) = mysql_fetch_row($result2);
    mysql_query("update links_links set hits=hits+1 where lid=$random");
    Header("Location: $url");
}

function viewlink($cid, $min, $orderby, $show) {
    global $admin, $perpage, $show;
    include("header.php");
    OpenTable4();
    if (!isset($min)) $min=0;
    if (!isset($max)) $max=$min+$perpage;
    if(isset($orderby)) $orderby = convertorderbyin($orderby);
    else $orderby = "title ASC";
    if ($show!="") $perpage = $show;
    	else $show=$perpage;  
    mainheader();
    echo "<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=3 BORDER=0><TR><TD>";
    echo "<CENTER>";
    echo "<TABLE WIDTH=100% CELLSPACING=2 CELLPADDING=2 BORDER=0 BGCOLOR=CCCCCC><TR><TD>";
    $result=mysql_query("select title from links_categories where cid=$cid");
    list($title) = mysql_fetch_row($result);
    echo "<font size=3><b><center>".translate("Category: ")."$title</center></b></font>";
    $carrytitle = $title;
    echo "</TD></TR></TABLE>";
    $subresult=mysql_query("select sid, title from links_subcategories where cid=$cid");
    $numrows = mysql_num_rows($subresult);
    if ($numrows != 0) {
       $scount = 0;
    	echo "<center><font size=2>".translate("Links also available in")." $title ".translate("SubCategories").":</font><br>
    	<table align=center>
    	  <tr>";
    	    
    	    while(list($sid, $title) = mysql_fetch_row($subresult)) {
	    	$result2 = mysql_query("select * from links_links where sid=$sid");
	    	$numrows = Mysql_num_rows($result2);
    	    	echo "<td><a href=links.php?op=viewslink&sid=$sid>$title</a> ($numrows)&nbsp;&nbsp;</td>";
    	    	$scount++;
    	    	if ($scount==6) { 
    	    		echo "</tr><tr>";
    	    		$scount = 0;
    	    	}
    	    }
    	  echo "
    	  </tr>
    	  <tr>
    	    <td colspan=5></td>
    	  </tr>
    	</table>
    	<table width=100% height=1><tr><td><img src=$nuke_url/images/blackpixel.gif height=1 width=100%></tr></td>
    	</table>
    	</center>";
    	
    }
    $orderbyTrans = convertorderbytrans($orderby);
    echo "<center><br><font size=2>".translate("Sort links by").":&nbsp&nbsp
          ".translate("Title")." (<a href=links.php?op=viewlink&cid=$cid&orderby=titleA>A</a>\<a href=links.php?op=viewlink&cid=$cid&orderby=titleD>D</a>)
          ".translate("Date")." (<a href=links.php?op=viewlink&cid=$cid&orderby=dateA>A</a>\<a href=links.php?op=viewlink&cid=$cid&orderby=dateD>D</a>)
          ".translate("Rating")." (<a href=links.php?op=viewlink&cid=$cid&orderby=ratingA>A</a>\<a href=links.php?op=viewlink&cid=$cid&orderby=ratingD>D</a>)
          ".translate("Popularity")." (<a href=links.php?op=viewlink&cid=$cid&orderby=hitsA>A</a>\<a href=links.php?op=viewlink&cid=$cid&orderby=hitsD>D</a>)          
          </font>";
    echo "<b><br><font color=BBBBBB size=2>".translate("Sites currently sorted by").": $orderbyTrans</font></b></center><br><br>";    

    $result=mysql_query("select lid, title, description, date, hits, linkratingsummary, totalvotes, totalcomments from links_links where cid=$cid AND sid=0 order by $orderby limit $min,$perpage ");
    $fullcountresult=mysql_query("select lid, title, description, date, hits, linkratingsummary, totalvotes, totalcomments from links_links where cid=$cid AND sid=0");
    $totalselectedlinks = Mysql_num_rows($fullcountresult);
    
    echo "<table width=100% cellspacing=0 cellpadding=10 border=0><tr><td><font size=2>";
    $x=0;
    while(list($lid, $title, $description, $time, $hits, $linkratingsummary, $totalvotes, $totalcomments)=mysql_fetch_row($result)) {
	$linkratingsummary = number_format($linkratingsummary, $mainvotedecimal);
	$title = stripslashes($title); $description = stripslashes($description);
        echo "<a href=links.php?op=visit&lid=$lid target=new>$title</a>";	
	newlinkgraphic($datetime, $time);
	popgraphic($hits);
	// INSERT code for *editor review* here
	echo "<br>";
	echo "<font color=777777>".translate("Description: ")."<font color=000000>$description<br>";
	setlocale ("LC_TIME", "$locale");
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);
	$datetime = strftime("".translate("linksdatestring")."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
	$datetime = ucfirst($datetime);
	echo "<font color=777777>".translate("Added on: ")."<font color=000000>$datetime<font color=777777> ".translate("Hits: ")."<font color=000000>$hits";
	
        $transfertitle = str_replace (" ", "_", $title);
        //voting & comments stats
        if ($totalvotes == 1) $votestring = "".translate("vote")."";
        	else $votestring = "".translate("votes")."";
        if ($linkratingsummary!="0" || $linkratingsummary!="0.0") echo "<font color=777777> ".translate("Rating").":<font color=000000> $linkratingsummary ($totalvotes $votestring)";
        echo "<br><a href=links.php?op=ratelink&lid=$lid&ttitle=$transfertitle>".translate("Rate this Site")."</a>";
        if ($totalvotes != 0) echo "&nbsp|&nbsp<a href=\"links.php?op=viewlinkdetails&lid=$lid&ttitle=$transfertitle\">".translate("Details")."</a>";
        if ($totalcomments != 0) echo "&nbsp|&nbsp<a href=\"links.php?op=viewlinkcomments&lid=$lid&ttitle=$transfertitle\">".translate("Comments")." ($totalcomments)</a>";
        detecteditorial($lid, $transfertitle);
	echo "<br><br>";	
	
	$x++;
    }
    
    $orderby = convertorderbyout($orderby);
    
    //Calculates how many pages exist.  Which page one should be on, etc...  
      
    # echo "Count Result:  $totalselectedlinks<br>";			# testing lines
    $linkpagesint = ($totalselectedlinks / $perpage);			
    $linkpageremainder = ($totalselectedlinks % $perpage);		
    
    if ($linkpageremainder != 0) {					 
    	$linkpages = ceil($linkpagesint);				
    	if ($totalselectedlinks < $perpage) {
    		$linkpageremainder = 0;
    	}
    }
    else {
    	$linkpages = $linkpagesint;
    }
    //Page Numbering
    if ($linkpages!=1 && $linkpages!=0) {
        echo "<br><br>";
      	echo "".translate("Select page").":&nbsp&nbsp";
     	$prev=$min-$perpage;
     	if ($prev>=0) {
    		echo "&nbsp<a href=links.php?op=viewlink&cid=$cid&min=$prev&orderby=$orderby&show=$show>";
    		echo "<b>[&lt;&lt; ".translate("Previous")." ]</b></a>&nbsp";
  	} 	    	
    	$counter = 1;
 	$currentpage = ($max / $perpage);
       	while ($counter<=$linkpages ) {
      		$cpage = $counter;
      		$mintemp = ($perpage * $counter) - $perpage;
      		if ($counter == $currentpage) echo "<b>$counter</b>&nbsp";
      		else echo "<a href=links.php?op=viewlink&cid=$cid&min=$mintemp&orderby=$orderby&show=$show>$counter</a>&nbsp";
       	    	$counter++;
       	    	
    	}      	
     	$next=$min+$perpage;
     	if ($x>=$perpage) {
    		echo "&nbsp<a href=links.php?op=viewlink&cid=$cid&min=$max&orderby=$orderby&show=$show>";
    		echo "<b>[ ".translate("Next")." &gt;&gt;]</b></a>";
     	}     	
    }
    /*
    echo "<font color=BBBBBB size=2><br><br>
    ".translate("Total links in category")." - $carrytitle (".translate("not including subcategories")."): $totalselectedlinks<br>
    ".translate("Set links per page (current:")." $perpage):&nbsp
    <a href=links.php?op=viewlink&cid=$cid&orderby=$orderby&show=5>5</a>&nbsp
    <a href=links.php?op=viewlink&cid=$cid&orderby=$orderby&show=10>10</a>&nbsp
    <a href=links.php?op=viewlink&cid=$cid&orderby=$orderby&show=15>15</a>&nbsp
    <a href=links.php?op=viewlink&cid=$cid&orderby=$orderby&show=25>25</a>&nbsp
    <a href=links.php?op=viewlink&cid=$cid&orderby=$orderby&show=50>50</a>&nbsp
    <a href=links.php?op=viewlink&cid=$cid&orderby=$orderby&show=75>75</a>&nbsp
    <a href=links.php?op=viewlink&cid=$cid&orderby=$orderby&show=10000>".translate("Show All")."</a></font>";
    */

    
    echo "</TD></TR></TABLE></TD></TR></TABLE>";
    CloseTable();
    include("footer.php");
}


function viewslink($sid, $min, $orderby, $show) {
    global $admin, $perpage;
    include("header.php");
    OpenTable4();
    mainheader();
    if (!isset($min)) $min=0;
    if (!isset($max)) $max=$min+$perpage;
    if(isset($orderby)) $orderby = convertorderbyin($orderby);
    else $orderby = "title ASC";
    if ($show!="") $perpage = $show;
    	else $show=$perpage;    

    echo "<TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=3 BORDER=0><TR><TD>";
    echo "<CENTER>";
    echo "<TABLE WIDTH=100% CELLSPACING=2 CELLPADDING=2 BORDER=0 BGCOLOR=CCCCCC><TR><TD>";
    
    $result = mysql_query("select cid, title from links_subcategories where sid=$sid");
    list($cid, $stitle) = mysql_fetch_row($result);
    
    $result2 = mysql_query("select cid, title from links_categories where cid=$cid");
    list($cid, $title) = mysql_fetch_row($result2);
    
    echo "<font size=3><b><a href=links.php><center>".translate("Main")."</a> / <a href=links.php?op=viewlink&cid=$cid>$title</a> / $stitle</center></b>";
    echo "</TD></TR></TABLE>";
    
    $orderbyTrans = convertorderbytrans($orderby);
        echo "</center><br><font size=2><center>".translate("Sort links by").":&nbsp&nbsp
              ".translate("Title")." (<a href=links.php?op=viewslink&sid=$sid&orderby=titleA>A</a>\<a href=links.php?op=viewslink&sid=$sid&orderby=titleD>D</a>)
              ".translate("Date")." (<a href=links.php?op=viewslink&sid=$sid&orderby=dateA>A</a>\<a href=links.php?op=viewslink&sid=$sid&orderby=dateD>D</a>)
              ".translate("Rating")." (<a href=links.php?op=viewslink&sid=$sid&orderby=ratingA>A</a>\<a href=links.php?op=viewslink&sid=$sid&orderby=ratingD>D</a>)
              ".translate("Popularity")." (<a href=links.php?op=viewslink&sid=$sid&orderby=hitsA>A</a>\<a href=links.php?op=viewslink&sid=$sid&orderby=hitsD>D</a>)          
              </font>";
    echo "<b><br><font color=BBBBBB size=2>".translate("Sites currently sorted by").": $orderbyTrans</font></b></center><br><br>";
    
    $result=mysql_query("select lid, url, title, description, date, hits, linkratingsummary, totalvotes, totalcomments from links_links where sid=$sid order by $orderby limit $min,$perpage");
    $fullcountresult=mysql_query("select lid, title, description, date, hits, linkratingsummary, totalvotes, totalcomments from links_links where sid=$sid");
    $totalselectedlinks = Mysql_num_rows($fullcountresult);
    
    echo "<table width=100% cellspacing=0 cellpadding=10 border=0><tr><td><font size=2>";
    $x=0;
    while(list($lid, $url, $title, $description, $time, $hits, $linkratingsummary, $totalvotes, $totalcomments)=mysql_fetch_row($result)) {
	$linkratingsummary = number_format($linkratingsummary, $mainvotedecimal);
	$title = stripslashes($title); $description = stripslashes($description);
        echo "<a href=links.php?op=visit&lid=$lid target=new>$title</a>";	
	newlinkgraphic($datetime, $time);
	popgraphic($hits);
        // code for *editor review* insert here	
	echo "<br>";
	echo "<font color=777777>".translate("Description: ")."<font color=000000>$description<br>";
	setlocale ("LC_TIME", "$locale");
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);
	$datetime = strftime("".translate("linksdatestring")."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
	$datetime = ucfirst($datetime);
	echo "<font color=777777>".translate("Added on: ")."<font color=000000>$datetime<font color=777777> ".translate("Hits: ")."<font color=000000>$hits";
	
        $transfertitle = str_replace (" ", "_", $title);
        //voting & comments stats
        if ($totalvotes == 1) $votestring = "".translate("vote")."";
        	else $votestring = "".translate("votes")."";
        if ($linkratingsummary!="0" || $linkratingsummary!="0.0") echo "<font color=777777> ".translate("Rating").":<font color=000000> $linkratingsummary ($totalvotes $votestring)";
        echo "<br><a href=links.php?op=ratelink&lid=$lid&ttitle=$transfertitle>".translate("Rate this Site")."</a>";
        if ($totalvotes != 0) echo "&nbsp|&nbsp<a href=\"links.php?op=viewlinkdetails&lid=$lid&ttitle=$transfertitle\">".translate("Details")."</a>";
        if ($totalcomments != 0) echo "&nbsp|&nbsp<a href=\"links.php?op=viewlinkcomments&lid=$lid&ttitle=$transfertitle\">".translate("Comments")." ($totalcomments)</a>";
	detecteditorial($lid, $transfertitle);
	echo "<br><br>";	
	
	$x++;
    }
    
     $orderby = convertorderbyout($orderby);
     
    //Calculates how many pages exist.  Which page one should be on, etc...  
          
        # echo "Count Result:  $totalselectedlinks<br>";			# testing lines
        $linkpagesint = ($totalselectedlinks / $perpage);			
        $linkpageremainder = ($totalselectedlinks % $perpage);		
        
        if ($linkpageremainder != 0) {					 
        	$linkpages = ceil($linkpagesint);				
        	if ($totalselectedlinks < $perpage) {
        		$linkpageremainder = 0;
        	}
        }
        else {
        	$linkpages = $linkpagesint;
        }        
        //Page Numbering
        if ($linkpages!=1 && $linkpages!=0) {
            echo "<br><br>";
          	echo "".translate("Select page").":&nbsp&nbsp";
         	$prev=$min-$perpage;
         	if ($prev>=0) {
        		echo "&nbsp<a href=links.php?op=viewslink&sid=$sid&min=$prev&orderby=$orderby&show=$show>";
        		echo "<b>[&lt;&lt; ".translate("Previous")." ]</b></a>&nbsp";
      	} 	
        	
        	$counter = 1;
        	$currentpage = ($max / $perpage);
           	while ($counter<=$linkpages ) {
          		$cpage = $counter;
          		$mintemp = ($perpage * $counter) - $perpage;
          		if ($counter == $currentpage) echo "<b>$counter</b>&nbsp";
          		else echo "<a href=links.php?op=viewslink&sid=$sid&min=$mintemp&orderby=$orderby&show=$show>$counter</a>&nbsp";
           	    	$counter++; 	
        	}    	
         	$next=$min+$perpage;
         	if ($x>=$perpage) {
        		echo "&nbsp<a href=links.php?op=viewslink&sid=$sid&min=$max&orderby=$orderby&show=$show>";
        		echo "<b>[ ".translate("Next")." &gt;&gt;]</b></a>";
         	}
        }
        
    /*
    echo "<font color=BBBBBB size=2><br><br>
    ".translate("Total links in subcategory")." - $stitle: $totalselectedlinks<br>
    ".translate("Set links per page (current:")." $perpage):&nbsp
    <a href=links.php?op=viewslink&sid=$sid&orderby=$orderby&show=5>5</a>&nbsp
    <a href=links.php?op=viewslink&sid=$sid&orderby=$orderby&show=10>10</a>&nbsp
    <a href=links.php?op=viewslink&sid=$sid&orderby=$orderby&show=15>15</a>&nbsp
    <a href=links.php?op=viewslink&sid=$sid&orderby=$orderby&show=25>25</a>&nbsp
    <a href=links.php?op=viewslink&sid=$sid&orderby=$orderby&show=50>50</a>&nbsp
    <a href=links.php?op=viewslink&sid=$sid&orderby=$orderby&show=75>75</a>&nbsp
    <a href=links.php?op=viewslink&sid=$sid&orderby=$orderby&show=10000>".translate("Show All")."</a></font>";
    */

    echo "</TD></TR></TABLE></TD></TR></TABLE>";
    CloseTable();
    include("footer.php");
}

function newlinkgraphic($datetime, $time) {
	echo "&nbsp";
	setlocale ("LC_TIME", "$locale");
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);  
	$datetime = strftime("".translate("linksdatestring")."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
	$datetime = ucfirst($datetime);		   
	$startdate = time();
	$count = 0;
        while ($count <= 7) {
           	 $daysold = date("d-M-Y", $startdate);
          	 if ("$daysold" == "$datetime") {
          	 	if ($count<=1) echo "<img src = images/links/newred.gif alt=\"".translate("New Today")."\">";
          	 	if ($count<=3 && $count>1) echo "<img src = images/links/newgreen.gif alt=\"".translate("New last 3 days")."\">";
          	 	if ($count<=7 && $count>3) echo "<img src = images/links/newblue.gif alt=\"".translate("New this week")."\">";
          	 }
          	 $count++;
          	 $startdate = (time()-(86400 * $count));
	}
}

function categorynewlinkgraphic($cat) {
	
	$newresult = mysql_query("select date from links_links where cid=$cat order by date desc limit 1");
	list($time)=mysql_fetch_row($newresult);
	echo "&nbsp";
	setlocale ("LC_TIME", "$locale");
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);  
	$datetime = strftime("".translate("linksdatestring")."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
	$datetime = ucfirst($datetime);		   
	$startdate = time();
	$count = 0;
        while ($count <= 7) {
           	 $daysold = date("d-M-Y", $startdate);
          	 if ("$daysold" == "$datetime") {
          	 	if ($count<=1) echo "<img src = images/links/newred.gif alt=\"".translate("New Links in this Category Added Today")."\">";
          	 	if ($count<=3 && $count>1) echo "<img src = images/links/newgreen.gif alt=\"".translate("New Links in this Category Added in the last 3 days")."\">";
          	 	if ($count<=7 && $count>3) echo "<img src = images/links/newblue.gif alt=\"".translate("New Links in this Category Added this week")."\">";
          	 }
          	 $count++;
          	 $startdate = (time()-(86400 * $count));
	}
}

function popgraphic($hits) {
	global $popular;
	if ($hits>=$popular) {
	echo "&nbsp;<img src = images/links/pop.gif alt=\"".translate("Popular")."\">";
	}
}

//Reusable Link Sorting Functions
function convertorderbyin($orderby) {
        if ($orderby == "titleA")			$orderby = "title ASC"; 
        if ($orderby == "dateA")			$orderby = "date ASC";
        if ($orderby == "hitsA")			$orderby = "hits ASC";
        if ($orderby == "ratingA")			$orderby = "linkratingsummary ASC";
        if ($orderby == "titleD")			$orderby = "title DESC"; 
    	if ($orderby == "dateD")			$orderby = "date DESC";
    	if ($orderby == "hitsD")			$orderby = "hits DESC";
        if ($orderby == "ratingD")			$orderby = "linkratingsummary DESC";
        return $orderby;
}

function convertorderbytrans($orderby) {
	if ($orderby == "hits ASC")			$orderbyTrans = "".translate("Popularity (Least to Most Hits)")."";
	if ($orderby == "hits DESC")			$orderbyTrans = "".translate("Popularity (Most to Least Hits)")."";
	if ($orderby == "title ASC")			$orderbyTrans = "".translate("Title (A to Z)")."";
	if ($orderby == "title DESC")			$orderbyTrans = "".translate("Title (Z to A)")."";
	if ($orderby == "date ASC")			$orderbyTrans = "".translate("Date (Old Links Listed First)")."";
	if ($orderby == "date DESC")			$orderbyTrans = "".translate("Date (New Links Listed First)")."";
	if ($orderby == "linkratingsummary ASC")	$orderbyTrans = "".translate("Rating (Lowest Scores to Highest Scores)")."";
        if ($orderby == "linkratingsummary DESC")	$orderbyTrans = "".translate("Rating (Highest Scores to Lowest Scores)")."";
        return $orderbyTrans;
}

function convertorderbyout($orderby) {
       	if ($orderby == "title ASC")			$orderby = "titleA";
       	if ($orderby == "date ASC")			$orderby = "dateA";
       	if ($orderby == "hits ASC")			$orderby = "hitsA";
       	if ($orderby == "linkratingsummary ASC")	$orderby = "ratingA";
       	if ($orderby == "title DESC")			$orderby = "titleD";
     	if ($orderby == "date DESC")			$orderby = "dateD";
     	if ($orderby == "hits DESC")			$orderby = "hitsD";
       	if ($orderby == "linkratingsummary DESC")	$orderby = "ratingD";
        return $orderby;
}

function visit($lid) {
    mysql_query("update links_links set hits=hits+1 where lid=$lid");
    $result = mysql_query("select url from links_links where lid=$lid");
    list($url) = mysql_fetch_row($result);
    Header("Location: $url");
}

function search($query, $min, $orderby, $show) {   
    global $admin, $perpage, $show, $linksresults;
    if (!isset($min)) $min=0;
    if (!isset($max)) $max=$min+$linksresults;
    if(isset($orderby)) $orderby = convertorderbyin($orderby);
    else $orderby = "title ASC";
    if ($show!="") $linksresults = $show;
    	else $show=$linksresults;     
    $query = stripslashes($query);
    $result = mysql_query("select lid, cid, sid, title, url, description, date, hits, linkratingsummary, totalvotes, totalcomments from links_links where title LIKE '%$query%' OR description LIKE '%$query%' ORDER BY $orderby LIMIT $min,$linksresults");
    $fullcountresult=mysql_query("select lid, title, description, date, hits, linkratingsummary, totalvotes, totalcomments from links_links where title LIKE '%$query%' OR description LIKE '%$query%' ");
    $totalselectedlinks = Mysql_num_rows($fullcountresult);    
    $nrows  = mysql_num_rows($result);
    $resultx = mysql_query("select * from links_subcategories where title LIKE '%$query%' ORDER BY title DESC");
    $nrowsx  = mysql_num_rows($resultx);

    $x=0;

    include("header.php");
    OpenTable4();
    mainheader();
    echo "
    <TABLE WIDTH=100% CELLSPACING=0 CELLPADDING=8 BORDER=0><TR><TD><font size=2>
    <CENTER>";
    if ($query != "") {
    	if ($nrows>0 OR $nrowsx>0) {
		
		$result2 = mysql_query("select cid, sid, title from links_subcategories where title LIKE '%$query%' ORDER BY title DESC");
		echo "<font size=3>".translate("Search Results for: ")."<font color=Red>$query<font color=Black size=2><br><br>";
		echo "</center><table width=100% bgcolor=CCCCCC><tr><td><font size=3><b>".translate("SubCategories")."</b></td></tr></table>";
		while(list($cid, $sid, $stitle) = mysql_fetch_row($result2)) {
		    $cate = mysql_query("select title from links_categories where cid=$cid");
		    list($ctitle) = mysql_fetch_row($cate);
		    $res = mysql_query("select * from links_links where sid=$sid");
		    $numrows = mysql_num_rows($res);
		    $ctitle = ereg_replace($query, "<b>$query</b>", $ctitle);
		    $stitle = ereg_replace($query, "<b>$query</b>", $stitle);
		    echo "<li><a href=links.php?op=viewslink&sid=$sid>$ctitle / $stitle</a> ($numrows)<br>";
		}
		
		echo "<br><table width=100% bgcolor=CCCCCC><tr><td><font size=3><b>".translate("Links")."</b></td></tr></table>";
    	$orderbyTrans = convertorderbytrans($orderby);
    	    echo "</center><br><font size=2>".translate("Sort links by").":&nbsp&nbsp
    	          ".translate("Title")." (<a href=links.php?op=search&query=$query&orderby=titleA>A</a>\<a href=links.php?op=search&query=$query&orderby=titleD>D</a>)
    	          ".translate("Date")." (<a href=links.php?op=search&query=$query&orderby=dateA>A</a>\<a href=links.php?op=search&query=$query&orderby=dateD>D</a>)
    	          ".translate("Rating")." (<a href=links.php?op=search&query=$query&orderby=ratingA>A</a>\<a href=links.php?op=search&query=$query&orderby=ratingD>D</a>)
    	          ".translate("Popularity")." (<a href=links.php?op=search&query=$query&orderby=hitsA>A</a>\<a href=links.php?op=search&query=$query&orderby=hitsD>D</a>)          
    	          </font>";
    	echo "<b><br><font color=BBBBBB size=2>".translate("Sites currently sorted by").": $orderbyTrans</font></b><br><br>";
    	    while(list($lid, $cid, $sid, $title, $url, $description, $time, $hits, $linkratingsummary, $totalvotes, $totalcomments) = mysql_fetch_row($result)) {
		    $linkratingsummary = number_format($linkratingsummary, $mainvotedecimal);
		    $title = stripslashes($title); $description = stripslashes($description);	    
		    $transfertitle = str_replace (" ", "_", $title);
		    $title = ereg_replace($query, "<b>$query</b>", $title);
	
		    echo "<a href=links.php?op=visit&lid=$lid target=new>$title</a>";	
		    newlinkgraphic($datetime, $time);      
    	        popgraphic($hits);	
		    echo "<br>";	    
		    $description = ereg_replace($query, "<b>$query</b>", $description);
		    echo "<font color=777777>".translate("Description: ")."<font color=000000>$description<br>";
		    setlocale ("LC_TIME", "$locale");
		    ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);
		    $datetime = strftime("".translate("linksdatestring")."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
		    $datetime = ucfirst($datetime);
		    echo "<font color=777777>".translate("Added on: ")."<font color=000000>$datetime<font color=777777> ".translate("Hits: ")."<font color=000000>$hits";
    	    
    	    //voting & comments stats
    	    if ($totalvotes == 1) $votestring = "".translate("vote")."";
    	    	else $votestring = "".translate("votes")."";
    	    if ($linkratingsummary!="0" || $linkratingsummary!="0.0") echo "<font color=777777> ".translate("Rating").":<font color=000000> $linkratingsummary ($totalvotes $votestring)";
    	    echo "<br><a href=links.php?op=ratelink&lid=$lid&ttitle=$transfertitle>".translate("Rate this Site")."</a>";
    	    if ($totalvotes != 0) echo "&nbsp|&nbsp<a href=links.php?op=viewlinkdetails&lid=$lid&ttitle=$transfertitle>".translate("Details")."</a>";
    	    if ($totalcomments != 0) echo "&nbsp|&nbsp<a href=links.php?op=viewlinkcomments&lid=$lid&ttitle=$transfertitle>".translate("Comments")." ($totalcomments)</a>";
		detecteditorial($lid, $transfertitle);
		echo "<br>";		    
		    $result3 = mysql_query("select title from links_categories where cid=$cid");
		    $result4 = mysql_query("select title from links_subcategories where sid=$sid");
		    list($ctitle) = mysql_fetch_row($result3);
		    list($stitle) = mysql_fetch_row($result4);
		    if ($stitle=="") {
			$slash = "";
		    } else {
			$slash = "/";
		    }
		    echo "<font color=777777>".translate("Category: ")."<font color=000000>$ctitle $slash $stitle<br><br>";
		    $x++;
		    
    	    }
    	    $orderby = convertorderbyout($orderby);
    	            
    	} else {
    	    echo "<center><font color=Red size=3>".translate("No matches found to your query")."</font></center><br><br>";
    	}

    
    //Calculates how many pages exist.  Which page one should be on, etc...  
          
        # echo "Count Result:  $totalselectedlinks<br>";			# testing lines
        $linkpagesint = ($totalselectedlinks / $linksresults);			
        $linkpageremainder = ($totalselectedlinks % $linksresults);		
        
        if ($linkpageremainder != 0) {					 
        	$linkpages = ceil($linkpagesint);				
        	if ($totalselectedlinks < $linksresults) {
        		$linkpageremainder = 0;
        	}
        }
        else {
        	$linkpages = $linkpagesint;
        }        
        //Page Numbering
        if ($linkpages!=1 && $linkpages!=0) {
            echo "<br><br>";
          	echo "Select page:&nbsp&nbsp";
         	$prev=$min-$linksresults;
         	if ($prev>=0) {
        		echo "&nbsp<a href=links.php?op=search&query=$query&min=$prev&orderby=$orderby&show=$show>";
        		echo "<b>[&lt;&lt; ".translate("Previous")." ]</b></a>&nbsp";
      	} 	
        	
        	$counter = 1;
        	$currentpage = ($max / $linksresults);
           	while ($counter<=$linkpages ) {
          		$cpage = $counter;
          		$mintemp = ($perpage * $counter) - $linksresults;
          		if ($counter == $currentpage) echo "<b>$counter</b>&nbsp";
          		else echo "<a href=links.php?op=search&query=$query&min=$mintemp&orderby=$orderby&show=$show>$counter</a>&nbsp";
           	    	$counter++; 	
        	}    	
         	$next=$min+$linksresults;
         	if ($x>=$perpage) {
        		echo "&nbsp<a href=links.php?op=search&query=$query&min=$max&orderby=$orderby&show=$show>";
        		echo "<b>[ ".translate("Next")." &gt;&gt;]</b></a>";
         	}
        }

    echo "<br><br><center><font size=2>
    ".translate("Try to search")." \"$query\" ".translate("in others Search Engines")."<br>
    <a target=\"_blank\" href=\"http://www.altavista.com/cgi-bin/query?pg=q&sc=on&hl=on&act=2006&par=0&q=$query&kl=XX&stype=stext\">Alta Vista</a> - 
    <a target=\"_blank\" href=\"http://www.hotbot.com/?MT=$query&DU=days&SW=web\">HotBot</a> -
    <a target=\"_blank\" href=\"http://www.infoseek.com/Titles?qt=$query\">Infoseek</a> - 
    <a target=\"_blank\" href=\"http://www.dejanews.com/dnquery.xp?QRY=$query\">Deja News</a> -
    <a target=\"_blank\" href=\"http://www.lycos.com/cgi-bin/pursuit?query=$query&maxhits=20\">Lycos</a> - 
    <a target=\"_blank\" href=\"http://search.yahoo.com/bin/search?p=$query\">Yahoo</a>
    <br>
    <a target=\"_blank\" href=\"http://es.linuxstart.com/cgi-bin/sqlsearch.cgi?pos=1&query=$query&language=&advanced=&urlonly=&withid=\">LinuxStart</a> - 
    <a target=\"_blank\" href=\"http://search.1stlinuxsearch.com/compass?scope=$query&ui=sr\">1stLinuxSearch</a> -
    <a target=\"_blank\" href=\"http://www.google.com/search?q=$query\">Google</a> -
    <a target=\"_blank\" href=\"http://www.linuxlinks.com/cgi-bin/search.cgi?query=$query&engine=Links\">LinuxLinks</a> -
    <a target=\"_blank\" href=\"http://www.freshmeat.net/search.php?query=$query\">Freshmeat</a> -
    <a target=\"_blank\" href=\"http://www.justlinux.com/bin/search.pl?key=$query\">JustLinux</a>
    </font>";
    
    
    } else {
	 echo "<center><font color=Red size=3>".translate("No matches found to your query")."</font></center><br><br>";
    }
    
    echo "</td></tr></table>\n";
    CloseTable();
    include("footer.php");

}

//POSSIBLY split file here (rating stuff in new file?)

function viewlinkeditorial($lid, $ttitle) {

    global $admin;
    include("header.php");
    OpenTable4();
    mainheader();
    
    $result=mysql_query("SELECT adminid, editorialtimestamp, editorialtext, editorialtitle FROM links_editorials WHERE linkid = $lid");
    $recordexist = Mysql_num_rows($result);
    
    echo "<table align=center border=0 cellspacing=0 cellpadding=2 width=98%>";
    $transfertitle = ereg_replace ("_", " ", $ttitle);
    $displaytitle = $transfertitle;
    echo "
         
          <tr><td>
            <TABLE WIDTH=100% CELLSPACING=2 CELLPADDING=2 BORDER=0 BGCOLOR=CCCCCC><TR><TD>
               <center><FONT SIZE=3><b>".translate("Link Profile").":  $displaytitle</b></font></center>
            </tr></td></table>
          </td></tr>
          <tr><td>";
    echo "<center>";
    linkinfomenu($lid, $ttitle); 
    echo "</center><br>
          </td><tr>
          <tr><td>";
            
    if ($recordexist != 0) {     
   	 while(list($adminid, $editorialtimestamp, $editorialtext, $editorialtitle)=mysql_fetch_row($result)) {     	
    		$editorialtitle = stripslashes($editorialtitle); $editorialtext = stripslashes($editorialtext);
    		ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $editorialtimestamp, $editorialtime);
		$editorialtime = strftime("%F",mktime($editorialtime[4],$editorialtime[5],$editorialtime[6],$editorialtime[2],$editorialtime[3],$editorialtime[1]));
		$date_array = explode("-", $editorialtime); 
		$timestamp = mktime(0, 0, 0, $date_array["1"], $date_array["2"], $date_array["0"]); 
       		$formatted_date = date("F j, Y", $timestamp);  	
   	 	echo "<tr><td>
		          <table align=center border=1 bordercolor=AAAAAA cellpadding=7 cellspacing=0 width=400>
		          <tr><td>
		          <center><font size=3><b>'$editorialtitle'</b></font></center>
		          <center><font size=1>".translate("Editorial by")." $adminid - $formatted_date</font></center><br><br>          
		          $editorialtext          
		          <br><br>
		          </td></tr></table>
		      </td></tr>";
   	 }    
    }
    else {
    	echo "<br><br><center>".translate("No editorial is currently available for this website.")."</center><br>";
    }
    echo "</table><br><br>";
    linkfooter($lid,$ttitle);
    CloseTable();
    include("footer.php");

}

function detecteditorial($lid, $ttitle) {
    $resulted2 = mysql_query("select adminid from links_editorials where linkid=$lid");
    $recordexist = Mysql_num_rows($resulted2);
    // if returns 'bad query' status 0 (add editorial)
    if ($recordexist != 0) echo " | <a href=links.php?op=viewlinkeditorial&lid=$lid&ttitle=$ttitle>Editorial</a>";
	
}

function viewlinkcomments($lid, $ttitle) {
    global $admin;
    include("header.php");
    OpenTable4();
    mainheader();
    
    $result=mysql_query("SELECT ratinguser, rating, ratingcomments, ratingtimestamp FROM links_votedata WHERE ratinglid = $lid AND ratingcomments != '' ORDER BY ratingtimestamp DESC");
    $totalcomments = Mysql_num_rows($result);  
    
    echo "<table align=center border=0 cellspacing=0 cellpadding=2 width=98%>";
    
    $transfertitle = ereg_replace ("_", " ", $ttitle);
    $displaytitle = $transfertitle;
    echo "
         
          <tr><td>
            <TABLE WIDTH=100% CELLSPACING=2 CELLPADDING=2 BORDER=0 BGCOLOR=CCCCCC><TR><TD>
               <center><FONT SIZE=3><b>".translate("Link Profile").":  $displaytitle</b></font></center>
            </tr></td></table>
          </td></tr>
          <tr><td>";
    echo "<center>";
    linkinfomenu($lid, $ttitle); 
    echo "</center><br>
          </td><tr>
          <tr><td>";
    echo "<br><center>".translate("Total of")." $totalcomments ".translate("comments")."</center></font><br>";
    echo "<table align=center border=0 cellspacing=0 cellpadding=2 width=450>";
    
    $x=0;
    while(list($ratinguser, $rating, $ratingcomments, $ratingtimestamp)=mysql_fetch_row($result)) {
    	$ratingcomments = stripslashes($ratingcomments);
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
        
    	
    	echo "<tr>
    	        <td bgcolor=#CCCCCC>
    	       	<font size=2><B> ".translate("User").":  </b><a href=$nuke_url/user.php?op=userinfo&uname=$ratinguser>$ratinguser</a></font>
	        </td>
	        <td bgcolor=#CCCCCC>
	        <font size=2><B>".translate("Rating").":  </b>$rating</font>
	        </td>
	        <td bgcolor=#CCCCCC align=right>
    	       	<font size=2>$formatted_date</font>
	        </td>
	      </tr>
	      <tr height=1>
	        <td valign=top>
	       	<font size=1 color=AAAAAA>".translate("User's Average Rating").": $useravgrating</font>
	        </td>
	        <td valign=top height=1 colspan=2>
	        <font size=1 color=AAAAAA>".translate("# of Ratings").": $usertotalcomments</font>
	        </td>
	      </tr>

	      <tr>
	        <td colspan=3>
	        <font size=2>";    if ($admin) echo "<a href=admin.php?op=LinksModLink&lid=$lid><img src=images/links/editicon.gif border=0 Alt=\"".translate("Edit This Link")."\"></a>"; echo" $ratingcomments</font>";
	      
	echo "  <br><br><br>
	        </td>
	      </tr>";        
	$x++;
    }    
    
    echo "</table></table><br><br>";
    linkfooter($lid,$ttitle);
    CloseTable();
    include("footer.php");

}

function viewlinkdetails($lid, $ttitle) {
    global $admin;
    include("header.php");
    OpenTable4();
    mainheader();
    
    $voteresult = mysql_query("select rating, ratinguser, ratingcomments FROM links_votedata WHERE ratinglid = $lid");
	$totalvotesDB = mysql_num_rows($voteresult);	
	$anonvotes = 0;
	$anonvoteval = 0;
	$outsidevotes = 0;
	$outsidevoteeval = 0;
	$regvoteval = 0;	
	$topanon = 0;
	$bottomanon = 11;
	$topreg = 0;
	$bottomreg = 11;
	$topoutside = 0;
	$bottomoutside = 11;	
	$avv = array(0,0,0,0,0,0,0,0,0,0,0);
	$rvv = array(0,0,0,0,0,0,0,0,0,0,0);
	$ovv = array(0,0,0,0,0,0,0,0,0,0,0);

	$truecomments = $totalvotesDB;
	while(list($ratingDB, $ratinguserDB, $ratingcommentsDB)=mysql_fetch_row($voteresult)) {
	 	if ($ratingcommentsDB=="") $truecomments--;
	        if ($ratinguserDB==$anonymous) {
	       		$anonvotes++;
	        	$anonvoteval += $ratingDB;
	        }
	        if ($useoutsidevoting == 1) {
	        	if ($ratinguserDB=='outside') {
	        		$outsidevotes++;
	        		$outsidevoteval += $ratingDB;
	        	}
	        }
	        else { $outsidevotes = 0; }
	        
	     	if ($ratinguserDB!=$anonymous && $ratinguserDB!="outside") { $regvoteval += $ratingDB; }
	     	
	     	if ($ratinguserDB!=$anonymous && $ratinguserDB!="outside") {
	     		if ($ratingDB > $topreg) $topreg = $ratingDB;
	     		if ($ratingDB < $bottomreg) $bottomreg = $ratingDB;
	     		for ($rcounter=1; $rcounter<11; $rcounter++) if ($ratingDB==$rcounter) $rvv[$rcounter]++;	
	     	}
	     	if ($ratinguserDB==$anonymous) {
	     		if ($ratingDB > $topanon) $topanon = $ratingDB;
	     		if ($ratingDB < $bottomanon) $bottomanon = $ratingDB;
	     		for ($rcounter=1; $rcounter<11; $rcounter++) if ($ratingDB==$rcounter) $avv[$rcounter]++;	
	     	}
	     	if ($ratinguserDB=="outside") {
	     		if ($ratingDB > $topoutside) $topoutside = $ratingDB;
	     		if ($ratingDB < $bottomoutside) $bottomoutside = $ratingDB;
	     		for ($rcounter=1; $rcounter<11; $rcounter++) if ($ratingDB==$rcounter) $ovv[$rcounter]++;	
	     	}	     	
	 }
	 $regvotes = $totalvotesDB - $anonvotes - $outsidevotes;	 
         if ($totalvotesDB == 0) $finalrating = 0;
	     	 else if ($anonvotes == 0 && $regvotes == 0) {
	     	 	// Figure Outside Only Vote
	     	 	$finalrating = $outsidevoteval / $outsidevotes;
	     	 	$finalrating = number_format($finalrating, $detailvotedecimal); 
	 	 	$avgOU = $outsidevoteval / $totalvotesDB;
	 	 	$avgOU = number_format($avgOU, $detailvotedecimal);	     	 	
	     	 }
	     	 else if ($outsidevotes == 0 && $regvotes == 0) {
	     	 	// Figure Anon Only Vote
	     	 	$finalrating = $anonvoteval / $anonvotes;	     	 	
	     	 	$finalrating = number_format($finalrating, $detailvotedecimal); 
	 	 	$avgAU = $anonvoteval / $totalvotesDB;
	 	 	$avgAU = number_format($avgAU, $detailvotedecimal);	     	 	
	     	 }
	     	 else if ($outsidevotes == 0 && $anonvotes == 0) {
	     	 	// Figure Reg Only Vote
	     	 	$finalrating = $regvoteval / $regvotes;	     	 	
	     	 	$finalrating = number_format($finalrating, $detailvotedecimal); 
	 	 	$avgRU = $regvoteval / $totalvotesDB;
	 	 	$avgRU = number_format($avgRU, $detailvotedecimal);	     	 	
	     	 }		     	 
	 	 else if ($regvotes == 0 && $useoutsidevoting == 1 && $outsidevotes != 0 && $anonvotes != 0 ) {
	 	 // Figure Reg and Anon Mix
	 	 	
	 	 	$avgAU = $anonvoteval / $anonvotes;
	 	 	$avgOU = $outsidevoteval / $outsidevotes;	 	 	
	 	 	
	         	if ($anonweight > $outsideweight ) {
	         		// Anon is 'standard weight'
				$newimpact = $anonweight / $outsideweight;
				$impactAU = $anonvotes;
				$impactOU = $outsidevotes / $newimpact;

		         	$finalrating = ((($avgOU * $impactOU) + ($avgAU * $impactAU)) / ($impactAU + $impactOU));
		         	$finalrating = number_format($finalrating, $detailvotedecimal); 
	         	}
	         	else {
		         	// Outside is 'standard weight'
		                $newimpact = $outsideweight / $anonweight;
		         	$impactOU = $outsidevotes;
		         	$impactAU = $anonvotes / $newimpact;
		         	
		         	$finalrating = ((($avgOU * $impactOU) + ($avgAU * $impactAU)) / ($impactAU + $impactOU));
		         	$finalrating = number_format($finalrating, $detailvotedecimal); 
	         	
	         	}       		         	
	 	 }
	 	 else {
	         	//REG User vs. Anonymous vs. Outside User Weight Calutions
	         	
	         	$impact = $anonweight;  				// REG users are weighted by the impact.
	         	$outsideimpact = $outsideweight;
	         	if ($regvotes == 0) { $avgRU = 0; }
	         		else { $avgRU = $regvoteval / $regvotes; }
	         	if ($anonvotes == 0) { $avgAU = 0; }
	         		else { $avgAU = $anonvoteval / $anonvotes; }
	         	if ($outsidevotes == 0 ) { $avgOU = 0; }
	         		else { $avgOU = $outsidevoteval / $outsidevotes; }
	         	$impactRU = $regvotes;

// Division by zero?	         	
			if ($anonvote>=1 && $impact>=1) {
			    $impactAU = $anonvotes / $impact;
			}
			if ($outsidevotes>=1 && $outsideimpact>=1) {
	         	    $impactOU = $outsidevotes / $outsideimpact;
	         	}


			$finalrating = (($avgRU * $impactRU) + ($avgAU * $impactAU) + ($avgOU * $impactOU)) / ($impactRU + $impactAU + $impactOU);
	         	$finalrating = number_format($finalrating, $detailvotedecimal); 
	          }

    if ($avgOU == 0 || $avgOU == "") { $avgOU = ""; }
    	else { $avgOU = number_format($avgOU, $detailvotedecimal); }
    if ($avgRU == 0 || $avgRU == "") { $avgRU = ""; }
    	else { $avgRU = number_format($avgRU, $detailvotedecimal); }
    if ($avgAU == 0 || $avgAU == "") { $avgAU = ""; }
    	else { $avgAU = number_format($avgAU, $detailvotedecimal); }    	
    
    
    if ($topanon == 0) $topanon = "";
    if ($bottomanon == 11) $bottomanon = "";
    if ($topreg == 0) $topreg = "";
    if ($bottomreg == 11) $bottomreg = "";
    if ($topoutside == 0) $topoutside = "";
    if ($bottomoutside == 11) $bottomoutside = "";    
    $totalchartheight = 70;
    $chartunits = $totalchartheight / 10;
    
    $avvper		= array(0,0,0,0,0,0,0,0,0,0,0);
    $rvvper 		= array(0,0,0,0,0,0,0,0,0,0,0);
    $ovvper 		= array(0,0,0,0,0,0,0,0,0,0,0);
    $avvpercent 	= array(0,0,0,0,0,0,0,0,0,0,0);
    $rvvpercent 	= array(0,0,0,0,0,0,0,0,0,0,0);
    $ovvpercent 	= array(0,0,0,0,0,0,0,0,0,0,0);
    $avvchartheight 	= array(0,0,0,0,0,0,0,0,0,0,0);
    $rvvchartheight 	= array(0,0,0,0,0,0,0,0,0,0,0);
    $ovvchartheight 	= array(0,0,0,0,0,0,0,0,0,0,0);
    $avvmultiplier = 0;
    $rvvmultiplier = 0;
    $ovvmultiplier = 0;
    
    for ($rcounter=1; $rcounter<11; $rcounter++) {
    	if ($anonvotes != 0) $avvper[$rcounter] = $avv[$rcounter] / $anonvotes;
    	if ($regvotes != 0) $rvvper[$rcounter] = $rvv[$rcounter] / $regvotes;
    	if ($outsidevotes != 0) $ovvper[$rcounter] = $ovv[$rcounter] / $outsidevotes;
    	$avvpercent[$rcounter] = number_format($avvper[$rcounter] * 100, 1);
    	$rvvpercent[$rcounter] = number_format($rvvper[$rcounter] * 100, 1);
    	$ovvpercent[$rcounter] = number_format($ovvper[$rcounter] * 100, 1);
    	if ($avv[$rcounter] > $avvmultiplier) $avvmultiplier = $avv[$rcounter];
    	if ($rvv[$rcounter] > $rvvmultiplier) $rvvmultiplier = $rvv[$rcounter];
    	if ($ovv[$rcounter] > $ovvmultiplier) $ovvmultiplier = $ovv[$rcounter];
    }
    if ($avvmultiplier != 0) $avvmultiplier = 10 / $avvmultiplier;
    if ($rvvmultiplier != 0) $rvvmultiplier = 10 / $rvvmultiplier;
    if ($ovvmultiplier != 0) $ovvmultiplier = 10 / $ovvmultiplier;
    
    for ($rcounter=1; $rcounter<11; $rcounter++) {
        
        $avvchartheight[$rcounter] = ($avv[$rcounter] * $avvmultiplier) * $chartunits;
    	$rvvchartheight[$rcounter] = ($rvv[$rcounter] * $rvvmultiplier) * $chartunits;
    	$ovvchartheight[$rcounter] = ($ovv[$rcounter] * $ovvmultiplier) * $chartunits;    	
        if ($avvchartheight[$rcounter]==0) $avvchartheight[$rcounter]=1;
    	if ($rvvchartheight[$rcounter]==0) $rvvchartheight[$rcounter]=1;
    	if ($ovvchartheight[$rcounter]==0) $ovvchartheight[$rcounter]=1;    	
    }
        
    echo "<table align=center border=0 cellspacing=0 cellpadding=2 width=98%>";
    $transfertitle = ereg_replace ("_", " ", $ttitle);
    $displaytitle = $transfertitle;

    echo "<tr><td>
            <TABLE WIDTH=100% CELLSPACING=2 CELLPADDING=2 BORDER=0 BGCOLOR=CCCCCC><TR><TD>
               <center><FONT SIZE=3><b>".translate("Link Profile").":  $displaytitle</b></font></center>
            </tr></td></table>
          </td></tr>
          <tr><td>";
    echo "<center>";
    linkinfomenu($lid, $ttitle); 
    echo "</center><br>
          </td><tr>
          <tr><td>";
    echo "<center>
    ".translate("Link Rating Details")."<br>
          $totalvotesDB ".translate("total votes")."<br>
          ".translate("Overall Rating").":  $finalrating</font></center><br><br>";
    echo "<table align=center border=0 cellspacing=0 cellpadding=2 width=455>";         
    echo "<tr>
    	    <td colspan=2 bgcolor=#BBBBBB>
    	    <font size=2><B>".translate("Registered Users")."</b></font>
	    </td>
	  <tr>
	  <tr height=1 bac>
	    <td bgcolor=#DDDDDD>
            <font size=2>".translate("Number of Ratings").":  $regvotes</font>
	    </td>
	    <td rowspan=5 width=200>";
	       if ($regvotes==0) echo "<center><font size=-2>".translate("No Registered User Votes")."</font></center>";
	       	else { 
	       	echo "
	       <table border=1 width=200 height=100%>      
	         <tr>
	           <td valign=top align=center colspan=10 bgcolor=BBBBBB><font size=-2>".translate("Breakdown of Ratings by Value")."</font></td>
	         </tr>
	         <tr>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$rvv[1] ".translate("votes")." ($rvvpercent[1]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$rvvchartheight[1]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$rvv[2] ".translate("votes")." ($rvvpercent[2]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$rvvchartheight[2]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$rvv[3] ".translate("votes")." ($rvvpercent[3]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$rvvchartheight[3]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$rvv[4] ".translate("votes")." ($rvvpercent[4]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$rvvchartheight[4]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$rvv[5] ".translate("votes")." ($rvvpercent[5]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$rvvchartheight[5]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$rvv[6] ".translate("votes")." ($rvvpercent[6]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$rvvchartheight[6]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$rvv[7] ".translate("votes")." ($rvvpercent[7]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$rvvchartheight[7]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$rvv[8] ".translate("votes")." ($rvvpercent[8]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$rvvchartheight[8]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$rvv[9] ".translate("votes")." ($rvvpercent[9]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$rvvchartheight[9]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$rvv[10] ".translate("votes")." ($rvvpercent[10]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$rvvchartheight[10]></td>
	         </tr>
	         <tr><td colspan=10>
	            <table cellspacing=0 cellspacing=0 border=0 height=5 width=200><tr></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>1</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>2</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>3</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>4</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>5</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>6</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>7</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>8</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>9</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>10</font></td>
	            </td><tr></table>
	         </td></tr> 
	       </table>
	       ";
	       }
	       echo "
	    </td>
	  </tr>
	  <tr><td bgcolor=#CCCCCC><font size=2>".translate("Link Rating").": $avgRU</font></td></tr>
	  <tr><td bgcolor=#DDDDDD><font size=2>".translate("High Rating").": $topreg</font></td></tr>
	  <tr><td bgcolor=#CCCCCC><font size=2>".translate("Low Rating").": $bottomreg</font></td></tr>
	  <tr><td bgcolor=#DDDDDD><font size=2>".translate("Number of Comments").": $truecomments</font></td></tr>
	  <tr><td></td></tr>
	  <tr><td valign=top colspan=2><font size=1><br><br>* ".translate("Note: This website weighs Registered vs. Unregistered user's ratings")." $anonweight ".translate("to")." 1.</font></td></tr>
          <tr><td colspan=2 bgcolor=#BBBBBB><font size=2><B>".translate("Unregistered Users")."</b></font></td></tr>
	  <tr height=1><td bgcolor=#DDDDDD><font size=2>".translate("Number of Ratings").": $anonvotes</font></td>
	    <td rowspan=5 width=200>
	        ";
	        if ($anonvotes==0) echo "<center><font size=-2>".translate("No Unregistered User Votes")."</font></center>";
	       	else { 
	       	echo "	    
	       <table border=1 width=200 height=100%>
	         <tr>
	           <td valign=top align=center colspan=10 bgcolor=BBBBBB><font size=-2>".translate("Breakdown of Ratings by Value")."</font></td>
	         </tr>
	         <tr>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$avv[1] ".translate("votes")." ($avvpercent[1]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$avvchartheight[1]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$avv[2] ".translate("votes")." ($avvpercent[2]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$avvchartheight[2]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$avv[3] ".translate("votes")." ($avvpercent[3]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$avvchartheight[3]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$avv[4] ".translate("votes")." ($avvpercent[4]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$avvchartheight[4]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$avv[5] ".translate("votes")." ($avvpercent[5]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$avvchartheight[5]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$avv[6] ".translate("votes")." ($avvpercent[6]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$avvchartheight[6]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$avv[7] ".translate("votes")." ($avvpercent[7]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$avvchartheight[7]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$avv[8] ".translate("votes")." ($avvpercent[8]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$avvchartheight[8]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$avv[9] ".translate("votes")." ($avvpercent[9]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$avvchartheight[9]></td>
		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$avv[10] ".translate("votes")." ($avvpercent[10]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$avvchartheight[10]></td>
	         </tr>
	         <tr><td colspan=10>
	            <table cellspacing=0 cellpadding=0 border=0 height=5 width=200><tr></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>1</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>2</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>3</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>4</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>5</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>6</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>7</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>8</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>9</font></td>
		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>10</font></td>
	            </td><tr></table>
	         </td></tr>
	       </table>
	       ";
	        }
	       echo "
	    </td>
	  </tr>
	  <tr><td bgcolor=#CCCCCC><font size=2>".translate("Link Rating").": $avgAU</font></td></tr>
	  <tr><td bgcolor=#DDDDDD><font size=2>".translate("High Rating").": $topanon</font></td></tr>
	  <tr><td bgcolor=#CCCCCC><font size=2>".translate("Low Rating").": $bottomanon</font></td></tr>
	  <tr><td bgcolor=#DDDDDD><font size=2>&nbsp</font></td></tr>";   
	  	  
	  if ($useoutsidevoting == 1) {
		  echo "
		  <tr><td valign=top colspan=2><font size=\"1\"><br><br>* ".translate("Note: This website weighs Registered vs. Outside voter's ratings")." $outsideweight ".translate("to")." 1.</font></td></tr>
	            <tr><td colspan=2 bgcolor=#BBBBBB><font size=2><B>".translate("Outside Voters")."</b></font></td></tr>
	  	  <tr height=1><td bgcolor=#DDDDDD><font size=2>".translate("Number of Ratings").": $outsidevotes</font></td>
	  	    <td rowspan=5 width=200>
	  	        ";
	  	        if ($outsidevotes==0) echo "<center><font size=-2>".translate("No Outside Votes")."</font></center>";
	  	       	else { 
	  	       	echo "	    
	  	       <table border=1 width=200 height=100%>
	  	         <tr>
	  	           <td valign=top align=center colspan=10 bgcolor=BBBBBB><font size=-2>".translate("Breakdown of Ratings by Value")."</font></td>
	  	         </tr>
	  	         <tr>
	  		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$ovv[1] ".translate("votes")." ($ovvpercent[1]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$ovvchartheight[1]></td>
	  		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$ovv[2] ".translate("votes")." ($ovvpercent[2]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$ovvchartheight[2]></td>
	  		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$ovv[3] ".translate("votes")." ($ovvpercent[3]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$ovvchartheight[3]></td>
	  		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$ovv[4] ".translate("votes")." ($ovvpercent[4]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$ovvchartheight[4]></td>
	  		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$ovv[5] ".translate("votes")." ($ovvpercent[5]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$ovvchartheight[5]></td>
	  		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$ovv[6] ".translate("votes")." ($ovvpercent[6]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$ovvchartheight[6]></td>
	  		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$ovv[7] ".translate("votes")." ($ovvpercent[7]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$ovvchartheight[7]></td>
	  		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$ovv[8] ".translate("votes")." ($ovvpercent[8]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$ovvchartheight[8]></td>
	  		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$ovv[9] ".translate("votes")." ($ovvpercent[9]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$ovvchartheight[9]></td>
	  		   <td bgcolor=FFFFFF valign=bottom><img border=0 alt=\"$ovv[10] ".translate("votes")." ($ovvpercent[10]% ".translate("total votes").")\" src=images/blackpixel.gif width=15 height=$ovvchartheight[10]></td>
	  	         </tr>
	  	         <tr><td colspan=10>
	  	            <table cellspacing=0 cellpadding=0 border=0 height=5 width=200><tr></td>
	  		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>1</font></td>
	  		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>2</font></td>
	  		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>3</font></td>
	  		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>4</font></td>
	  		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>5</font></td>
	  		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>6</font></td>
	  		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>7</font></td>
	  		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>8</font></td>
	  		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>9</font></td>
	  		    <td bgcolor=FFFFFF width=10% valign=bottom align=center><font size=-2>10</font></td>
	  	            </td><tr></table>
	  	         </td></tr>
	  	       </table>
	  	       ";
	  	        }
	  	       echo "
	  	    </td>
	  	  </tr>
	  	  <tr><td bgcolor=#CCCCCC><font size=2>".translate("Link Rating").": $avgOU</font></td></tr>
	  	  <tr><td bgcolor=#DDDDDD><font size=2>".translate("High Rating").": $topoutside</font></td></tr>
	  	  <tr><td bgcolor=#CCCCCC><font size=2>".translate("Low Rating").": $bottomoutside</font></td></tr>
	  	  <tr><td bgcolor=#DDDDDD><font size=2>&nbsp</font></td></tr>";	  
	  }
	  
    echo "</table></table><br><br>";
    linkfooter($lid,$ttitle);
    CloseTable();
    include("footer.php");

}

function linkfooter($lid,$ttitle) {
    $ttitle = ereg_replace(" ", "_", $ttitle);
    echo "
    <a href=links.php?op=visit&lid=$lid target=_blank>".translate("Visit this Website")."</a>  |  <a href=links.php?op=ratelink&lid=$lid&ttitle=$ttitle>".translate("Rate this Website")."</a><br><br>";
    linkfooterchild($lid);
}

function linkfooterchild($lid) {
    if ($useoutsidevoting = 1) { echo "<br><center><hr size=1 noshade><font size=-1>".translate("Is this your resource?")." <a href=links.php?op=outsidelinksetup&lid=$lid>".translate("Allow users to rate your script from your web site!")."</center></a></font>"; }
    
}

function outsidelinksetup($lid) {
    include("header.php");
    include("config.php");
    OpenTable4();
    mainheader();
    echo "<center><font size=3><br><b>".translate("Promote Your Website")."</b></font></center><br><br>";
    echo "
    <table width=90%>
    
    If the resource you were rating at the time you clicked on the 'remote rate'
    link was your own, you may be interested in several of the remote 'Rate a 
    Website' options we have available. These allow you to place an image (or 
    even a rating form) on your script's web site in order to increase the number
    of votes your website receive. Please choose from one of the options listed
    below if this is something you are interested in:<br><br>
    
    <b>Please, no cheating...</b><br>
    
    We have had several cases where a website has been removed from the directory due 
    to cheating involved with our rating system. We usually find these, even when they are 
    very obscure, either from user reportings or routine checks by staff. By being
    removed from the directory, you'll lose more accesses than you ever would by falsely
    bolstering your rating value.<br><br>
    
    <b>1. Text Links</b><br><br>
    
    One way to link to the rating form is through a simple text link, such as:<br><br>
    
    
    <center><a href=$nuke_url/links.php?op=ratelink&lid=$lid>Rate this Website @ $sitename</a></center><br><br>
    <center>The HTML code you should use in this case, is the following:</center><br>
    <center><textarea rows=4 name=S1 cols=50><a href=\"$nuke_url/links.php?op=ratelink&lid=$lid\">Rate this Website @ $sitename</a></textarea></center>
    <br><br>
    The number '$lid' in the HTML source references the resource id number in $sitename link directory database. You should make sure you link to the correct website.<br><br>
    
    <b>2. Small Image Links</b><br><br>
    
    If you're looking for a little more than a basic text link, you may wish for one of our smaller image links to the rating form:<br><br>
    
    <center><a href=$nuke_url/links.php?op=ratelink&lid=$lid><img src=$nuke_url/images/rate.gif></a></center><br>
    <center>Right click on image and 'Save Image'.  <b>Do NOT link this image from our site!</b>  Copy the image to your website and change the links as appropriate</center><br><br>
    <center><textarea rows=4 name=S1 cols=50><a href=\"$nuke_url/links.php?op=ratelink&lid=$lid\"><img src=\"$nuke_url/images/rate.gif\"></a></textarea></center>
    <br><br>
    
    <b>3. Remote Rating Forms</b><br><br>
     
    Our policies on the use of a remote rating form on your web site are very strict. If we find a web site in violation of the acceptable terms, we have the right to block all incoming votes from the offending web site or remove your listing from $sitename entirely. The only voting mechanisms required on a remote site are the form types shown below, unless you get permission to use a different rating form scheme. Basically, we want the default vote set to '--' and the user must be able to freely choose from 1 - 10. Any site that we find that is attempting to submit all 10's or something similar when a user simply hits submit will be in violation of the remote rating rules.<br><br>
    
    Having said that, here is what the current remote rating form looks like. If we get significant user feedback, we will create others. If you wish to have something custom made on your site, feel free, but make sure you get it approved by us and that it follows the basic guidelines set forth above.<br><br>
    
  <table align=center border=0 width=175 cellspacing=0 cellpadding=0 bordercolor=#FFFFFF bgcolor=#FFFFFF>
    <tr>
      <td width=100%><a href=$nuke_url><img border=0 src=$nuke_url/images/ratesitetop.gif width=175 height=34></a></td>
    </tr>
    <tr>
      <td width=100%>
        <table border=0 width=100% cellspacing=0 cellpadding=0 height=23>
          <tr>
            <td width=100% height=23>
              <form method=POST action=$nuke_url/links.php>
                <input type=hidden name=ratinglid value=\"$lid\">
                <input type=hidden name=ratinguser value=\"outside\">
                <table border=0 width=100% background=$nuke_url/images/ratesitebottom.gif cellspacing=0 cellpadding=0>
                  <tr>
                    <td width=53% valign=top>
                      <p align=right> 
                     <select name=rating>         
                     <option selected>--
				       <option>10
			          <option>9
					   <option>8
						<option>7
						<option>6
						<option>5
						<option>4	
						<option>3
						<option>2
						<option>1
			          </select>&nbsp;&nbsp; </td>

                    <td width=47% valign=top>
                      <p align=right><input type=image src=$nuke_url/images/ratebutton.gif name=op value=addrating width=63 height=17 alt=\"Rate Link at $sitename\"></td>
                  </tr>
                </table>
              </form>
            </td>
          </tr>
        </table>
        </td></tr></table></center>
   <table width=90% align=center>
   <br><br>
   Using this form will allow users to rate your website directly from your site and the rating will be recorded. The above form is disabled, but the following source code will work if you simply cut and paste it into your web page, copy the images (top, bottom, and button), and change image paths to your site. The source code is shown below:<br><br>
    <center><textarea rows=30 name=S1 cols=50>  <table align=center border=0 width=175 cellspacing=0 cellpadding=0 bordercolor=#FFFFFF bgcolor=#FFFFFF>
    <tr>
      <td width=\"100%\"><a href=\"$nuke_url\"><img border=\"0\" src=\"$nuke_url/images/ratesitetop.gif\" width=\"175\" height=\"34\"></a></td>
    </tr>
    <tr>
      <td width=\"100%\">
        <table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" height=\"23\">
          <tr>
            <td width=\"100%\" height=\"23\">
              <form method=POST action=\"$nuke_url/links.php\">
                <input type=hidden name=ratinglid value=\"$lid\">
                <input type=hidden name=ratinguser value=\"outside\">
                <table border=\"0\" width=\"100%\" background=\"$nuke_url/images/ratesitebottom.gif\" cellspacing=\"0\" cellpadding=\"0\">
                  <tr>
                    <td width=\"53%\" valign=top>
                      <p align=right> 
                     <select name=rating>         
                     <option selected>--
		     <option>10
	             <option>9
                     <option>8
	       	     <option>7
		     <option>6
		     <option>5
		     <option>4	
		     <option>3
		     <option>2
		     <option>1
		     </select>&nbsp;&nbsp; </td>

                    <td width=\"47%\" valign=\"top\">
                      <p align=right><input type=image src=\"$nuke_url/images/ratebutton.gif\" name=op value=addrating width=\"63\" height=\"17\" alt=\"Rate Link at $sitename\"></td>
                  </tr>
                </table>
              </form>
            </td>
          </tr>
        </table>
        </td></tr></table></textarea>
    </center><br><br>
    Thanks!  Let us know if you have any questions or concerns.<br><br>
    - $sitename Staff
    <br><br>
    </table>";
    CloseTable();
    include("footer.php");
}

function brokenlink($lid) {
    include("header.php");
    OpenTable4();
    global $user;
    if(isset($user)) {
    		$user2 = base64_decode($user);
   		$cookie = explode(":", $user2);
		cookiedecode($user);
		$ratinguser = $cookie[1];
	} 
    else { $ratinguser = "$anonymous";} 
    mainheader();
    
    echo "<center><font size=3><b><center>".translate("Report Broken Link")."</center></b><br><br><br><font size=2>";    
    echo "<form action=links.php method=post>";
    echo "<input type=hidden name=lid value=$lid>";
    echo "<input type=hidden name=modifysubmitter value=$ratinguser>";
    echo "<center>
	  ".translate("Thank you for helping to maintain this directory's integrity.")."
          <br>
	  ".translate("For security reasons your user name and IP address will also be temporarily recorded.")."
	  </center><br><br>"; 
    
    echo "</select><center><input type=hidden name=op value=brokenlinkS><input type=submit value=\"".translate("Report Broken Link")."\"></center></form><br>";
    CloseTable();
    include("footer.php");    
}

function brokenlinkS($lid, $modifysubmitter) {
    global $user;
    if(isset($user)) {
    		$user2 = base64_decode($user);
   		$cookie = explode(":", $user2);
		cookiedecode($user);
		$ratinguser = $cookie[1];
	} 
    else { $ratinguser = "$anonymous";} 

    mysql_query("insert into links_modrequest values (NULL, $lid, 0, 0, '', '', '', '$ratinguser', 1)");
    include("header.php");
    echo "<br><br><center>".translate("Thanks for the information. We'll look into your request shortly.")."</center>";
    include("footer.php");
        
}

function modifylinkrequest($lid) {
    include("header.php");
    OpenTable4();
    global $user;
    if(isset($user)) {
    		$user2 = base64_decode($user);
   		$cookie = explode(":", $user2);
		cookiedecode($user);
		$ratinguser = $cookie[1];
	} 
    else { $ratinguser = "$anonymous";}   
    mainheader();
    echo "<table width=450 align=center>";
    $blocknow = 0;
    if ($blockunregmodify == 1 && $ratinguser=="$anonymous") { 
    echo "<br><br><center>".translate("Only registered users can suggest link modifications. Please register or login.")."</center>";
    $blocknow = 1;
    }
    
    if ($blocknow != 1) {
    	$result = mysql_query("select cid, sid, title, url, description from links_links where lid=$lid");
    	echo "
    	</center><font size=3><b>Request Link Modification</b><br><br><font size=2>";
    	while(list($cid, $sid, $title, $url, $description) = mysql_fetch_row($result)) {
    		$title = stripslashes($title); $description = stripslashes($description);
    		echo "<form action=links.php method=post>";
		echo "<font color=Blue>".translate("Link ID: ")."<font color=Black><b>$lid</b><br>";
		echo "".translate("Page Title: ")."<input class=textbox type=text name=title value=\"$title\" size=50 maxlength=100><br>";
		echo "".translate("Page URL: ")."<input class=textbox type=text name=url value=$url size=50 maxlength=100>&nbsp;<br>";
		echo "".translate("Description: ")."<br><textarea name=description cols=60 rows=10>$description</textarea><br>";
		$result2=mysql_query("select cid, title from links_categories order by title");
		echo "<input type=hidden name=lid value=$lid>";
		echo "<input type=hidden name=modifysubmitter value=$ratinguser>";	
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
    	
    	echo "</select><input type=hidden name=op value=modifylinkrequestS><input type=submit value=\"".translate("Send Request")."\"></form><br>";
    	}
    
    }
    echo "</table>";
    CloseTable();
    include("footer.php");
}

function modifylinkrequestS($lid, $cat, $title, $url, $description, $modifysubmitter) {
    global $user;
    if(isset($user)) {
    		$user2 = base64_decode($user);
   		$cookie = explode(":", $user2);
		cookiedecode($user);
		$ratinguser = $cookie[1];
	} 
    else { $ratinguser = "$anonymous";}       
    $blocknow = 0;
    if ($blockunregmodify == 1 && $ratinguser=="$anonymous") { 
    include("header.php");
    echo "<br><br><center>".translate("Only registered users can suggest link modifications. Please register or login.")."</center>";
    $blocknow = 1;
    include("footer.php");
    }
    
    if ($blocknow != 1) {
    	$cat = explode("-", $cat);
    	if ($cat[1]=="") {
    	    $cat[1] = 0;
    	}
    	$title = stripslashes(FixQuotes($title));
    	$url = stripslashes(FixQuotes($url));
    	$description = stripslashes(FixQuotes($description));
    	mysql_query("insert into links_modrequest values (NULL, $lid, $cat[0], $cat[1], '$title', '$url', '$description', '$ratinguser', 0)");
    	include("header.php");
    	echo "<br><br><center>".translate("Thanks for the information. We'll look into your request shortly.")."</center>";
    	include("footer.php");
    }
}

function rateinfo($lid) {							
    mysql_query("update links_links set hits=hits+1 where lid=$lid");		
    $result = mysql_query("select url from links_links where lid=$lid");	
    list($url) = mysql_fetch_row($result);					
    Header("Location: $url");							
}


function addrating($ratinglid, $ratinguser, $rating, $ratinghost_name, $ratingcomments) {
    global $user,$cookie, $anonymous;
    $passtest = "yes";
    include("header.php");
    OpenTable4();
    
    completevoteheader();
    
    # !!if ($ratinguser != "outside") then...  determine anon or reg and write reg.  DON'T pass it in.  Bad idea.
    if(isset($user)) {
    		$user2 = base64_decode($user);
   		$cookie = explode(":", $user2);
		cookiedecode($user);
		$ratinguser = $cookie[1];
	} 
    else if ($ratinguser=="outside") { $ratinguser = "outside";}   
    else { $ratinguser = "$anonymous";}   
    
    $results3 = mysql_query("SELECT title FROM links_links WHERE lid=$ratinglid");	   
    while(list($title)=mysql_fetch_row($results3)) $ttitle = $title;
    
    //Make sure only 1 anonymous from an IP in a single day.
    $anonwaitdays = 1;
    $ip = getenv("REMOTE_ADDR");
//    if (empty($ip)) {
//       $ip = getenv("REMOTE_ADDR");
//    }

    // Check if Rating is Null
        if ($rating=="--") {
    	    $error = "nullerror";
            completevote($error);
	    $passtest = "no";
        }

    // Check if Link POSTER is voting (UNLESS Anonymous users allowed to post)       
    if ($ratinguser != $anonymous && $ratinguser != "outside") {
    	$result=mysql_query("select submitter from links_links where lid=$ratinglid");
    	while(list($ratinguserDB)=mysql_fetch_row($result)) {
    	    if ($ratinguserDB==$ratinguser) {
    		    $error = "postervote";
    	        completevote($error);
		    $passtest = "no";
    	    }
   	}
    }

    // Check if REG user is trying to vote twice.      
    if ($ratinguser!=$anonymous && $ratinguser != "outside") {
    	$result=mysql_query("select ratinguser from links_votedata where ratinglid=$ratinglid");
    	while(list($ratinguserDB)=mysql_fetch_row($result)) {
    		if ($ratinguserDB==$ratinguser) {
    	        	$error = "regflood";
                	completevote($error);
			$passtest = "no";
		}
    
        }
    }
    
     // Check if ANONYMOUS user is trying to vote more than once per day.
    if ($ratinguser==$anonymous){
    	$yesterdaytimestamp = (time()-(86400 * $anonwaitdays));
    	$ytsDB = Date("Y-m-d H:i:s", $yesterdaytimestamp);
    	$result=mysql_query("select * FROM links_votedata WHERE ratinglid=$ratinglid AND ratinguser='$anonymous' AND ratinghostname = '$ip' AND TO_DAYS(NOW()) - TO_DAYS(ratingtimestamp) < $anonwaitdays");
        $anonvotecount = mysql_num_rows($result); 
    	if ($anonvotecount >= 1) {
    	        $error = "anonflood";
                completevote($error);
    		$passtest = "no";
    	} 			
    }	
    
     // Check if OUTSIDE user is trying to vote more than once per day.
    if ($ratinguser=="outside"){
    	$yesterdaytimestamp = (time()-(86400 * $outsidewaitdays));
    	$ytsDB = Date("Y-m-d H:i:s", $yesterdaytimestamp);
    	$result=mysql_query("select * FROM links_votedata WHERE ratinglid=$ratinglid AND ratinguser='outside' AND ratinghostname = '$ip' AND TO_DAYS(NOW()) - TO_DAYS(ratingtimestamp) < $outsidewaitdays");
        $outsidevotecount = mysql_num_rows($result); 
    	if ($outsidevotecount >= 1) {
    	        $error = "outsideflood";
                completevote($error);
    		$passtest = "no";
    	} 			
    }	    
     
     
    // Passed Tests
    if ($passtest == "yes") {
    	$comment = stripslashes(FixQuotes($comment));
    	
    	//All is well.  Add to Line Item Rate to DB.
	 mysql_query("INSERT into links_votedata values (NULL, '$ratinglid', '$ratinguser', '$rating', '$ip', '$ratingcomments', now())");
	
	//All is well.  Calculate Score & Add to Summary (for quick retrieval & sorting) to DB.
	//NOTE:  If weight is modified, ALL links need to be refreshed with new weight.
	//	 Running a SQL statement with your modded calc for ALL links will accomplish this.

        $voteresult = mysql_query("select rating, ratinguser, ratingcomments FROM links_votedata WHERE ratinglid = $ratinglid");
	$totalvotesDB = mysql_num_rows($voteresult);	
	include ("voteinclude.php");     
        mysql_query("UPDATE links_links SET linkratingsummary=$finalrating,totalvotes=$totalvotesDB,totalcomments=$truecomments WHERE lid = $ratinglid");
        $error = "none";
        completevote($error);
    }
    completevotefooter($ratinglid, $ttitle, $ratinguser);
    CloseTable();
    include("footer.php");
}




function completevoteheader(){
    mainheader();
    echo "<br>
    <table border=0 width=450>
      <tr>
        <td>";
}

function completevotefooter($lid, $ttitle, $ratinguser) {
    $result=mysql_query("select url FROM links_links WHERE lid=$lid");
    list($url)=mysql_fetch_row($result);
    echo "
        </td>
      </tr>
      <tr>
        <td>
          <font size=2>".translate("Thank you for taking the time to rate a site here at $sitename. Input from users such as yourself will help other visitors better decide which links to click on.")."</font><br><br><br>
        </td>         
      </tr>";
     if ($ratinguser=="outside") {
     echo "
      <tr>
        <td>
          <font size=2><center>".translate("We appreciate your visit to $sitename!")."</center><br><center><a href=$url>".translate("Return to")." $ttitle</a></font><center><br><br>
        </td>         
      </tr>";
     $result=mysql_query("select title FROM links_links where lid=$lid");
     list($title)=mysql_fetch_row($result);
     $ttitle = ereg_replace (" ", "_", $title);
     }
    
     
     echo "
     </table>
     <br><br>";
     linkinfomenu($lid,$ttitle);  
}

function completevote($error) {
    $anonwaitdays = 1;
          if ($error == "none") echo "<center><b><font size=2>".translate("Your vote is appreciated.")."</font></b></center>";
    	  if ($error == "anonflood") echo "<font size=3 color=Red><b><center>".translate("You have already voted for this link in the past $anonwaitdays day(s).")."</center></b><br>";
          if ($error == "regflood") echo "<font size=3 color=Red><b><center>".translate("Vote for a link only once.<br>All votes are logged and reviewed.")."</center></b><br>";
          if ($error == "postervote") echo "<font size=3 color=Red><b><center>".translate("You cannot vote on a link you submitted.<br>All votes are logged and reviewed.")."</center></b><br>";
          if ($error == "nullerror") echo "<font size=3 color=Red><b><center>".translate("No rating selected - no vote tallied")."</center></b><br>";
          if ($error == "outsideflood") echo "<font size=3 color=Red><b><center>".translate("Only one vote per IP address allowed every")." $outsidewaitdays ".translate("day(s).")."</center></b><br>";
}

function ratelink($lid, $user, $ttitle) {	
    
    include("header.php");
    OpenTable4();
    mainheader();
    echo "</center>";
    $transfertitle = ereg_replace ("_", " ", $ttitle);
    $displaytitle = $transfertitle;
    // global $user, $cookie, $title, $datetime;
    global $cookie, $title, $datetime, $anonymous;
    $ip = getenv("REMOTE_HOST");
    if (empty($ip)) {
       $ip = getenv("REMOTE_ADDR");
    }

    echo "
    <hr size=1 noshade>
    <font face=\"Verdana,Arial,Helvetica\"><b>$displaytitle</b>
    <UL><FONT SIZE=-1>
     <LI>".translate("Please do not vote for the same resource more than once.")."
     <LI>".translate("The scale is 1 - 10, with 1 being poor and 10 being excellent.")."
     <LI>".translate("Please be objective, if everyone receives a 1 or a 10, the ratings aren't very useful.")."
     <LI>".translate("You can view a list of the <a href=links.php?op=TopRated>Top Rated Resources</a>.")."
     <LI>".translate("Do not vote for your own resource.")."";
    if(isset($user)) {
    		$user2 = base64_decode($user);
   		$cookie = explode(":", $user2);
		echo "<LI>".translate("You are a registered user and are logged in.")."
		      <LI>".translate("Feel free to add a comment about this site.")."";
		cookiedecode($user);
		$name = $cookie[1];
	} else {
		echo "<LI>".translate("You are not a registered user or you have not logged in.")."
		      <LI>".translate("If you were registered you could make comments on this website.")."";
		$name = "$anonymous";
	}
 
    echo "
     </font></FONT></UL>
     
     
     <table border=0 cellpadding=1 cellspacing=0 width=100%>
     <tr><td width=25 nowrap></td>  
     <tr><td width=25 nowrap></td><td width=550>
     <form method=POST action=\"links.php\">
     <input type=hidden name=\"ratinglid\" value=\"$lid\">
     <input type=hidden name=\"ratinguser\" value=\"$name\">
     <input type=hidden name=\"ratinghost_name\" value=\"$ip\">
     <font face=\"Verdana,Arial,Helvetica\"><font size=+1>".translate("Rate this Website").": </font>
     <select name=\"rating\">
     <option>--
     <option>10
     <option>9
     <option>8
     <option>7
     <option>6
     <option>5
     <option>4
     <option>3
     <option>2
     <option>1
     </select> <font size=-1><input type=hidden name=op value\"Rate this Website\"><input type=submit value=\"".translate("Rate this Website")."\"></font></font>
     <br><br>";
     
    if(isset($user)) {
	echo "     
     		<b>Comments:</b> <br><TEXTAREA wrap=virtual cols=50 rows=10 name=\"ratingcomments\"></TEXTAREA>
     		<br><br><br>
     		</font></td>
     	";
	}
	else {
		echo"<input type=hidden name=\"ratingcomments\" value=\"\">";
		
	}
	

    echo "
     </tr></form></table>";
    linkfooterchild($lid);
    CloseTable();
    include("footer.php");



}

if (isset($ratinglid) && isset ($ratinguser) && isset ($rating)) {
	$ret = addrating($ratinglid, $ratinguser, $rating, $ratinghost_name, $ratingcomments);
}


switch($op) {

    case "menu":
	menu($mainlink);
	break;

    case "AddLink":
	AddLink();
	break;

    case "NewLinks":
	NewLinks($newlinkshowdays);
	break;
	
    case "NewLinksDate":
	NewLinksDate($selectdate);
	break;

    case "TopRated":
	TopRated($ratenum, $ratetype);
	break;
	
    case "MostPopular":
    	MostPopular($ratenum, $ratetype);
	break;

    case "RandomLink":
	RandomLink();
	break;

    case "viewlink":
	viewlink($cid, $min, $orderby, $show);
	break;

    case "viewslink":
	viewslink($sid, $min, $orderby, $show);
	break;

    case "brokenlink":
	brokenlink($lid);
	break;
	
    case "modifylinkrequest":	
	modifylinkrequest($lid);
	break;
    
    case "modifylinkrequestS":	
	modifylinkrequestS($lid, $cat, $title, $url, $description, $modifysubmitter);
	break;
   
    case "brokenlinkS":
    	brokenlinkS($lid, $modifysubmitter);
    	break;
    
    case "visit":
	visit($lid);
	break;

    case "Add":
	Add($title, $url, $name, $cat, $description, $name, $email);
	break;

    case "search":
	search($query, $min, $orderby, $show);
	break;

    case "rateinfo":								
	rateinfo($lid, $user, $title);						
	break;									

    case "ratelink":								
	ratelink($lid, $user, $ttitle);						
	break;	
	
    case "addrating":
        addrating($ratinglid, $ratinguser, $rating, $ratinghost_name, $ratingcomments);
	break;

    case "viewlinkcomments":								
    	viewlinkcomments($lid, $ttitle);						
	break;
	
    case "outsidelinksetup":
    	outsidelinksetup($lid);
    	break;
	
    case "viewlinkeditorial":								
    	viewlinkeditorial($lid, $ttitle);						
	break;		

    case "viewlinkdetails":								
    	viewlinkdetails($lid, $ttitle);						
	break;	
	
    default:
	index();
	break;
    
}



?>