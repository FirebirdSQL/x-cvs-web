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
$hlpfile = "manual/automated.html";
$result = mysql_query("select radminarticle, radminsuper from authors where aid='$aid'");
list($radminarticle, $radminsuper) = mysql_fetch_row($result);
if (($radminarticle==1) OR ($radminsuper==1)) {

/*********************************************************/
/* Automated News Publishing Programming                 */
/*********************************************************/

function puthome($ihome) {
    echo "<br><b>".translate("Publish in Home?")."</b>&nbsp;&nbsp;";
    if (($ihome == 0) OR ($ihome == "")) {
	$sel1 = "checked";
	$sel2 = "";
    }
    if ($ihome == 1) {
	$sel1 = "";
	$sel2 = "checked";
    }
    echo "<input type=radio name=\"ihome\" value=0 $sel1>".translate("Yes")."&nbsp;";
    echo "<input type=radio name=\"ihome\" value=1 $sel2>".translate("No")."";
    echo "&nbsp;&nbsp;<font size=2>[ Only works if <i>Articles</i> category isn't selected ]</font><br>";
}

function SelectCategory($cat) {
    $selcat = mysql_query("select catid, title from stories_cat");
    $a = 1;
    echo "<b>Category</b> ";
    echo "<select name=\"catid\">";
    if ($cat == 0) {
	$sel = "selected";
    } else {
	$sel = "";
    }
    echo "<option name=\"catid\" value=\"0\" $sel>Articles</option>";
    while(list($catid, $title) = mysql_fetch_row($selcat)) {
	if ($a == $cat) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"catid\" value=\"$a\" $sel>$title</option>";
	$a++;
    }
    echo "</select> [ <a href=admin.php?op=AddCategory>Add</a> | <a href=>Edit</a> | <a href=>Delete</a> ]";
}

function autoStory() {
    global $hlpfile, $admin, $aid;
    include ("header.php");
    GraphicAdmin($hlpfile);
    echo "<br>";
    OpenTable4();
    echo "<center><b>".translate("Programmed Articles")."</b></center><br><br>";
    echo "<table border=1 width=100% bgcolor=CCCCCC>";
    $result = mysql_query("select anid, title, time from autonews order by time ASC");
    while(list($anid, $title, $time) = mysql_fetch_row($result)) {
	if ($anid != "") {
	    $time = ereg_replace(" ", "@", $time);
    	    echo "<tr><td>&nbsp;<b>(<a href=admin.php?op=autoEdit&anid=$anid>".translate("Edit")."</a>-<a href=admin.php?op=autoDelete&anid=$anid>".translate("Delete")."</a>)</b>&nbsp;</td><td width=100%>&nbsp;$title&nbsp;</td><td>&nbsp;$time&nbsp;</td></tr>";
	}
    }
    if ($anid=="") {
	echo "</td></tr></table>";
    } else {
	echo "</table>";
    }
    
    CloseTable();
    echo "<br>";

    OpenTable4();
    $today = getdate();
    $tday = $today[mday];
    if ($tday < 10){
	$tday = "0$tday";
    }
    $tmonth = $today[month];
    $ttmon = $today[mon];
    if ($ttmon < 10){
	$ttmon = "0$ttmon";
    }
    $tyear = $today[year];
    $thour = $today[hours];
    if ($thour < 10){
	$thour = "0$thour";
    }
    $tmin = $today[minutes];
    if ($tmin < 10){
	$tmin = "0$tmin";
    }
    $tsec = $today[seconds];
    if ($tsec < 10){
	$tsec = "0$tsec";
    }
    $date = "$tmonth $tday, $tyear @ $thour:$tmin:$tsec";
    echo "<center><font size=4><b>".translate("New Automated Article")."</b></font></center><br><br>";
    echo "<form action=admin.php method=post>";
    echo "<p><b>".translate("Title")."</b><br>";
    echo "<input class=textbox type=text name=subject size=50 value=\"\"><BR>";
    echo "<BR>";
    echo "<p><b>".translate("Topic")."</b>";
    $toplist = mysql_query("select topicid, topictext from topics order by topictext");
    echo "<SELECT class=textbox NAME=\"topic\">";
    echo "<OPTION VALUE=\"\">".translate("Select Topic")."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
	if ($topicid==$topic) {
	    $sel = "selected ";
	}
    	echo "<option $sel value=\"$topicid\">$topics</option>\n";
	$sel = "";
    }
    echo "</SELECT>";
    $cat = 0;
    SelectCategory($cat);
    echo "<br>";
    puthome($ihome);
    echo "
    <P><B>".translate("The Story")."</B><br>
    <textarea class=textbox wrap=virtual cols=70 rows=12 name=hometext></textarea><BR>
    <P><B>".translate("Extended Text")."</B><br>
    <textarea class=textbox wrap=virtual cols=70 rows=12 name=bodytext></textarea><BR>
    <FONT size=2>".translate("(Are you sure you included a URL? Did ya test them for typos?)")."</FONT><P>
    </select>";
    echo "<font size=3><b>".translate("When do you want to publish this story?")."</b></font><br><br>";
    echo "".translate("Now is:")." $date<br><br>";
    $day = 1;
    echo "".translate("Day:")." <select name=day>";
    while ($day <= 31) {
	if ($tday==$day) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=day $sel>$day</option>";
	$day++;
    }
    echo "</select>";
    $month = 1;
    echo "".translate("Month:")." <select name=month>";
    while ($month <= 12) {
	if ($ttmon==$month) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=month $sel>$month</option>";
	$month++;
    }
    echo "</select>";
    $date = getdate();
    $year = $date[year];
    echo "".translate("Year:")." <input type=text name=year value=$year size=5 maxlength=4>";
    echo "<br>".translate("Hour:")." <select name=hour>";
    $hour = 0;
    $cero = "0";
    while ($hour <= 23) {
	$dummy = $hour;
	if ($hour < 10) {
	    $hour = "$cero$hour";
	}
	echo "<option name=hour>$hour</option>";
	$hour = $dummy;
	$hour++;
    }
    echo "</select>";
    echo " : <select name=min>";
    $min = 0;
    while ($min <= 59) {
	if (($min == 0) OR ($min == 5)) {
	    $min = "0$min";
	}
	echo "<option name=min>$min</option>";
	$min = $min + 5;
    }
    echo "</select>";
    echo " : 00<br><br>";
    echo "<select class=textbox name=op>
	<option value=autoPreviewStory SELECTED>".translate("PreviewAdminStory")."</option>
	<option value=autoSaveStory>".translate("PostAdminStory")."</option>
	</select>	
	<INPUT type=submit value=\"".translate("Go!")."\">";

    echo "</form>";
    CloseTable();
    include("footer.php");
}

function autoPreviewStory($year, $day, $month, $hour, $min, $subject, $hometext, $bodytext, $topic, $catid, $ihome) {
    global $aid, $admin, $language, $hlpfile, $tipath;
    include ("header.php");
    if ($topic<1) {
        $topic = 1;
    }
    GraphicAdmin($hlpfile);
    
    OpenTable();
    echo "<center><b>".translate("Programmed Articles")."</b></center><br><br>";
    echo "<table border=1 width=100% bgcolor=CCCCCC>";
    $result = mysql_query("select anid, title, time from autonews order by time ASC");
    while(list($anid, $title, $time) = mysql_fetch_row($result)) {
	if ($anid != "") {
	    $time = ereg_replace(" ", "@", $time);
    	    echo "<tr><td>&nbsp;<b>(<a href=admin.php?op=autoEdit&anid=$anid>".translate("Edit")."</a>-<a href=admin.php?op=autoDelete&anid=$anid>".translate("Delete")."</a>)</b>&nbsp;</td><td width=100%>&nbsp;$title&nbsp;</td><td>&nbsp;$time&nbsp;</td></tr>";
	}
    }
    if ($anid=="") {
	echo "</td></tr></table>";
    } else {
	echo "</table>";
    }
    
    CloseTable();
    echo "<br>";    
    
    OpenTable();
    $today = getdate();
    $tday = $today[mday];
    if ($tday < 10){
	$tday = "0$tday";
    }
    $tmonth = $today[month];
    $tyear = $today[year];
    $thour = $today[hours];
    if ($thour < 10){
	$thour = "0$thour";
    }
    $tmin = $today[minutes];
    if ($tmin < 10){
	$tmin = "0$tmin";
    }
    $tsec = $today[seconds];
    if ($tsec < 10){
	$tsec = "0$tsec";
    }
    $date = "$tmonth $tday, $tyear @ $thour:$tmin:$tsec";		
    echo "
    <font size=4><b><center>".translate("Preview Automated Story")."</b></font><br><br><br>
    <form action=\"admin.php\" method=post>
    </b></center>";
    $subject = stripslashes($subject);
    $hometext = stripslashes($hometext);
    $bodytext = stripslashes($bodytext);
    $result=mysql_query("select topicimage from topics where topicid=$topic");
    list($topicimage) = mysql_fetch_row($result);
    echo "<center><br>
    <table border=0 width=75% cellpadding=0 cellspacing=1 bgcolor=000000><tr><td>
    <table border=0 width=100% cellpadding=8 cellspacing=1 bgcolor=FFFFFF><tr><td>";
    echo "";
    echo "<img src=$tipath$topicimage border=0 align=right>";
    themepreview($subject, $hometext, $bodytext);
    echo "</td></tr></table></td></tr></table></center>
    <p><b>".translate("Title")."</b><br>
    <input class=textbox type=text name=subject size=50 value=\"$subject\"><BR>
    <p><b>".translate("Topic")."</b> <select name=topic>";
    $toplist = mysql_query("select topicid, topictext from topics order by topictext");
    echo "<OPTION VALUE=\"\">".translate("All Topics")."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
        echo "<option $sel value=\"$topicid\">$topics</option>\n";
	$sel = "";
    }
    echo "</select>";
    $cat = $catid;
    SelectCategory($cat);
    echo "<br>";
    puthome($ihome);
    echo "
    <p><b>".translate("The Story")."</b><br>
    <textarea class=textbox wrap=virtual cols=50 rows=12 name=hometext>$hometext</textarea><BR><BR>
    <p><b>".translate("Extended Text")."</b><br>
    <textarea class=textbox wrap=virtual cols=50 rows=12 name=bodytext>$bodytext</textarea><BR><BR>";
    echo "<font size=3><b>".translate("When do you want to publish this story?")."</b></font><br><br>";
    echo "".translate("Now is:")." $date<br><br>";
    $xday = 1;
    echo "".translate("Day:")." <select name=day>";
    while ($xday <= 31) {
	if ($xday == $day) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=day $sel>$xday</option>";
	$xday++;
    }
    echo "</select>";
    $xmonth = 1;
    echo "".translate("Month:")." <select name=month>";
    while ($xmonth <= 12) {
	if ($xmonth == $month) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=month $sel>$xmonth</option>";
	$xmonth++;
    }
    echo "</select>";
    echo "".translate("Year:")." <input type=text name=year value=$year size=5 maxlength=4>";
    echo "<br>".translate("Hour:")." <select name=hour>";
    $xhour = 0;
    $cero = "0";
    while ($xhour <= 23) {
	$dummy = $xhour;
	if ($xhour < 10) {
	    $xhour = "$cero$xhour";
	}
	if ($xhour == $hour) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=hour $sel>$xhour</option>";
	$xhour = $dummy;
	$xhour++;
    }
    echo "</select>";
    echo " : <select name=min>";
    $xmin = 0;
    while ($xmin <= 59) {
	if (($xmin == 0) OR ($xmin == 5)) {
	    $xmin = "0$xmin";
	}
	if ($xmin == $min) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=min $sel>$xmin</option>";
	$xmin = $xmin + 5;
    }
    echo "</select>";
    echo " : 00<br><br>	
    <select class=textbox name=op>
    <option value=autoPreviewStory SELECTED>".translate("Preview Again")."</option>
    <option value=autoSaveStory>".translate("Save Auto Story")."</option>
    </select>
    <INPUT type=submit value=".translate("Go!").">
    </form></td></tr></table></td></tr></table>";
    include ('footer.php');

}

function autoSaveStory($year, $day, $month, $hour, $min, $subject, $hometext, $bodytext, $topic, $catid, $ihome) {
    global $aid, $admin, $ultramode;
    if ($day < 10) {
	$day = "0$day";
    }
    if ($month < 10) {
	$month = "0$month";
    }
    $sec = "00";
    $date = "$year-$month-$day $hour:$min:$sec";
    $notes = "";
    $author = $aid;
    $subject = stripslashes(FixQuotes($subject));
    $hometext = stripslashes(FixQuotes($hometext));
    $bodytext = stripslashes(FixQuotes($bodytext));
    $result = mysql_query("insert into autonews values (NULL, '$catid', '$aid', '$subject', '$date', '$hometext', '$bodytext', '$topic', '$author', '$notes', '$ihome')");
    if (!$result) {
	echo mysql_errno(). ": ".mysql_error(). "<br>";
	exit();
    }
    $result = mysql_query("update authors set counter=counter+1 where aid='$aid'");
    if ($ultramode) {
	ultramode();
    }
    Header("Location: admin.php?op=autoStory");
}            

function QautoStory ($qid) {
    global $user, $subject, $story, $tipath;
    include ('header.php');
    GraphicAdmin($hlpfile);
    OpenTable();
    echo "<center><b>".translate("Programmed Articles")."</b></center><br><br>";
    echo "<table border=1 width=100% bgcolor=CCCCCC>";
    $result = mysql_query("select anid, title, time from autonews order by time ASC");
    while(list($anid, $title, $time) = mysql_fetch_row($result)) {
	if ($anid != "") {
	    $time = ereg_replace(" ", "@", $time);
    	    echo "<tr><td>&nbsp;<b>(<a href=admin.php?op=autoEdit&anid=$anid>".translate("Edit")."</a>-<a href=admin.php?op=autoDelete&anid=$anid>".translate("Delete")."</a>)</b>&nbsp;</td><td width=100%>&nbsp;$title&nbsp;</td><td>&nbsp;$time&nbsp;</td></tr>";
	}
    }
    if ($anid=="") {
	echo "</td></tr></table>";
    } else {
	echo "</table>";
    }
    
    CloseTable();
    echo "<br>";	
    $result = mysql_query("SELECT qid, uid, uname, subject, story, topic FROM queue where qid=$qid");
    list($qid, $uid, $uname, $subject, $story, $topic) = mysql_fetch_row($result);
    mysql_free_result($result);
    $subject = stripslashes($subject);
    $story = stripslashes($story);
    OpenTable();
    $today = getdate();
    $tday = $today[mday];
    if ($tday < 10){
	$tday = "0$tday";
    }
    $tmonth = $today[month];
    $ttmon = $today[mon];
    if ($ttmon < 10){
	$ttmon = "0$ttmon";
    }
    $tyear = $today[year];
    $thour = $today[hours];
    if ($thour < 10){
	$thour = "0$thour";
    }
    $tmin = $today[minutes];
    if ($tmin < 10){
	$tmin = "0$tmin";
    }
    $tsec = $today[seconds];
    if ($tsec < 10){
	$tsec = "0$tsec";
    }
    $date = "$tmonth $tday, $tyear @ $thour:$tmin:$tsec";	
	echo "<form action=admin.php method=post>
	<p><b>".translate("Name")."</b><br>
	<input class=textbox type=text NAME=author SIZE=50 value=$uname>
	<p><b>".translate("Subject")."</b><br>
	<input class=textbox type=text name=subject size=50 value=\"$subject\">";
	if($topic=="") {
	    $topic = 1;
	}
	$result = mysql_query("select topicimage from topics where topicid=$topic");
	list($topicimage) = mysql_fetch_row($result);
	echo "<br><br><center>
	<table border=0 width=70% cellpadding=0 cellspacing=1 bgcolor=000000><tr><td>
	<table border=0 width=100% cellpadding=8 cellspacing=1 bgcolor=FFFFFF><tr><td>
	<img src=$tipath$topicimage border=0 align=right>";
	themepreview($subject, $story);
	echo "</td></tr></table></td></tr></table></center>";
	echo "<p><b>Topic</b> <select name=topic>";
	$toplist = mysql_query("select topicid, topictext from topics order by topictext");
        echo "<OPTION VALUE=\"\">".translate("Select Topic")."</option>\n";
        while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
        if ($topicid==$topic) { $sel = "selected "; }
            echo "<option $sel value=\"$topicid\">$topics</option>\n";
	    $sel = "";
        }
	echo "</select>";
	$cat = 0;
	SelectCategory($cat);
	echo "<br>";
	puthome($ihome);
	echo "
	<p><b>".translate("Intro Text")."</b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=7 name=hometext>$story</textarea>
	<p><b>".translate("Full Text")."</b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=8 name=bodytext></textarea><BR>
	<FONT size=2>".translate("(Did you check URLs?)")."</FONT><P>
	<p><b>".translate("Notes")."</b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=4 name=notes></textarea><br>
	<input type=hidden NAME=qid SIZE=50 value=$qid>
	<input type=hidden NAME=uid SIZE=50 value=$uid>";
	echo "<font size=3><b>".translate("When do you want to publish this story?")."</b></font><br><br>";
    echo "".translate("Now is:")." $date<br><br>";
    $day = 1;
    echo "".translate("Day:")." <select name=day>";
    while ($day <= 31) {
	if ($tday==$day) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=day $sel>$day</option>";
	$day++;
    }
    echo "</select>";
    $month = 1;
    echo "".translate("Month:")." <select name=month>";
    while ($month <= 12) {
	if ($ttmon==$month) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=month $sel>$month</option>";
	$month++;
    }
    echo "</select>";
    $date = getdate();
    $year = $date[year];
    echo "".translate("Year:")." <input type=text name=year value=$year size=5 maxlength=4>";
    echo "<br>".translate("Hour:")." <select name=hour>";
    $hour = 0;
    $cero = "0";
    while ($hour <= 23) {
	$dummy = $hour;
	if ($hour < 10) {
	    $hour = "$cero$hour";
	}
	echo "<option name=hour>$hour</option>";
	$hour = $dummy;
	$hour++;
    }
    echo "</select>";
    echo " : <select name=min>";
    $min = 0;
    while ($min <= 59) {
	if (($min == 0) OR ($min == 5)) {
	    $min = "0$min";
	}
	echo "<option name=min>$min</option>";
	$min = $min + 5;
    }
    echo "</select>";
    echo " : 00<br><br>";

	echo "<select name=op>
		<option value=DeleteStory>".translate("DeleteStory")."</option>
		<option value=QautoPreview SELECTED>".translate("PreviewAgain")."</option>
		<option value=QautoSave>".translate("PostStory")."</option>
	</select>
	<INPUT type=submit value=".translate("Go!").">
	</form></td></tr></table></td></tr></table>";
	include ('footer.php');
}

function QautoPreview($year, $day, $month, $hour, $min, $qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome) {
	global $user, $boxstuff, $tipath;
	include ('header.php');
	GraphicAdmin($hlpfile);

    OpenTable();
    echo "<center><b>".translate("Programmed Articles")."</b></center><br><br>";
    echo "<table border=1 width=100% bgcolor=CCCCCC>";
    $result = mysql_query("select anid, title, time from autonews order by time ASC");
    while(list($anid, $title, $time) = mysql_fetch_row($result)) {
	if ($anid != "") {
	    $time = ereg_replace(" ", "@", $time);
    	    echo "<tr><td>&nbsp;<b>(<a href=admin.php?op=autoEdit&anid=$anid>".translate("Edit")."</a>-<a href=admin.php?op=autoDelete&anid=$anid>".translate("Delete")."</a>)</b>&nbsp;</td><td width=100%>&nbsp;$title&nbsp;</td><td>&nbsp;$time&nbsp;</td></tr>";
	}
    }
    if ($anid=="") {
	echo "</td></tr></table>";
    } else {
	echo "</table>";
    }
    
    CloseTable();
    echo "<br>";

	$subject = stripslashes($subject);
	$hometext = stripslashes($hometext);
	$bodytext = stripslashes($bodytext);
	$notes = stripslashes($notes);
	OpenTable();
    $today = getdate();
    $tday = $today[mday];
    if ($tday < 10){
	$tday = "0$tday";
    }
    $tmonth = $today[month];
    $tyear = $today[year];
    $thour = $today[hours];
    if ($thour < 10){
	$thour = "0$thour";
    }
    $tmin = $today[minutes];
    if ($tmin < 10){
	$tmin = "0$tmin";
    }
    $tsec = $today[seconds];
    if ($tsec < 10){
	$tsec = "0$tsec";
    }
    $date = "$tmonth $tday, $tyear @ $thour:$tmin:$tsec";
	echo "<form action=admin.php method=post>
	<p><b>".translate("Name")."</b><br>
	<input class=textbox type=text NAME=author SIZE=50 value=$author>
	<p><b>".translate("Subject")."</b><br>
	<input class=textbox type=text name=subject size=50 value=\"$subject\">";
	$result = mysql_query("select topicimage from topics where topicid=$topic");
	list($topicimage) = mysql_fetch_row($result);
	echo "<br><br><center><table width=70% bgcolor=000000 cellpadding=0 cellspacing=1 border=0><tr><td>";
	echo "<table width=100% bgcolor=FFFFFF cellpadding=8 cellspacing=1 border=0><tr><td>";
	echo "<img src=$tipath$topicimage border=0 align=right>";
	themepreview($subject, $hometext, $bodytext, $notes);
	echo "</td></tr></table></td></tr></table></center>";
	echo "<p><b>".translate("Topic")."</b> <select name=topic>";
	$toplist = mysql_query("select topicid, topictext from topics order by topictext");
        echo "<OPTION VALUE=\"\">".translate("All Topics")."</option>\n";
        while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
        if ($topicid==$topic) { $sel = "selected "; }
            echo "<option $sel value=\"$topicid\">$topics</option>\n";
	    $sel = "";
        }
	echo "</select>";
	$cat = $catid;
	SelectCategory($cat);	
	echo "<br>";
	puthome($ihome);
	echo "
	<p><b>".translate("Intro Text")."</b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=7 name=hometext>$hometext</textarea>
	<p><b>".translate("Full Text")."</b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=10 name=bodytext>$bodytext</textarea><BR>
	<FONT size=2>".translate("(Did you check URLs?)")."</FONT><P>
	<p><b>".translate("Notes")."</b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=4 name=notes>$notes</textarea><br>
	<input type=hidden NAME=qid SIZE=50 value=$qid>
	<input type=hidden NAME=uid SIZE=50 value=$uid>";
    echo "<font size=3><b>".translate("When do you want to publish this story?")."</b></font><br><br>";
    echo "".translate("Now is:")." $date<br><br>";
    $xday = 1;
    echo "".translate("Day:")." <select name=day>";
    while ($xday <= 31) {
	if ($xday == $day) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=day $sel>$xday</option>";
	$xday++;
    }
    echo "</select>";
    $xmonth = 1;
    echo "".translate("Month:")." <select name=month>";
    while ($xmonth <= 12) {
	if ($xmonth == $month) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=month $sel>$xmonth</option>";
	$xmonth++;
    }
    echo "</select>";
    echo "".translate("Year:")." <input type=text name=year value=$year size=5 maxlength=4>";
    echo "<br>".translate("Hour:")." <select name=hour>";
    $xhour = 0;
    $cero = "0";
    while ($xhour <= 23) {
	$dummy = $xhour;
	if ($xhour < 10) {
	    $xhour = "$cero$xhour";
	}
	if ($xhour == $hour) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=hour $sel>$xhour</option>";
	$xhour = $dummy;
	$xhour++;
    }
    echo "</select>";
    echo " : <select name=min>";
    $xmin = 0;
    while ($xmin <= 59) {
	if (($xmin == 0) OR ($xmin == 5)) {
	    $xmin = "0$xmin";
	}
	if ($xmin == $min) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=min $sel>$xmin</option>";
	$xmin = $xmin + 5;
    }
    echo "</select>";
    echo " : 00<br><br>	

    <select name=op>
		<option value=DeleteStory>".translate("DeleteStory")."</option>
		<option value=QautoPreview SELECTED>".translate("PreviewAgain")."</option>
		<option value=QautoSave>".translate("PostStory")."</option>
	</select>
	<INPUT type=submit value=".translate("Go!")."></FORM>
	</td></tr></table></td></tr></table>";
	include ('footer.php');
}

function QautoSave($year, $day, $month, $hour, $min, $qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome) {
	global $aid, $ultramode;
    if ($day < 10) {
	$day = "0$day";
    }
    if ($month < 10) {
	$month = "0$month";
    }
    $sec = "00";
    $date = "$year-$month-$day $hour:$min:$sec";	
	if ($uid == 1) $author = "";
	if ($hometext == $bodytext) $bodytext = "";
	$subject = stripslashes(FixQuotes($subject));
	$hometext = stripslashes(FixQuotes($hometext));
	$bodytext = stripslashes(FixQuotes($bodytext));
	$notes = stripslashes(FixQuotes($notes));
	$result = mysql_query("insert into autonews values (NULL, '$catid', '$aid', '$subject', '$date', '$hometext', '$bodytext', '$topic', '$author', '$notes', '$ihome')");
	if (!$result) {
		echo mysql_errno(). ": ".mysql_error(). "<br>";
		return;
	}
	if ($uid == 1) {
	} else {
	    mysql_query("update users set counter=counter+1 where uid='$uid'");
	}
	    mysql_query("update authors set counter=counter+1 where aid='$aid'");
	if ($ultramode) {
    	    ultramode();
	}
	mysql_query("delete from queue where qid=$qid");
	Header("Location: admin.php?op=submissions");
}

function autoDelete($anid) {
    mysql_query("delete from autonews where anid=$anid");
    Header("Location: admin.php?op=autoStory");
}

function autoEdit($anid) {
    global $aid, $admin, $hlpfile, $tipath;
    include ("header.php");
    $result = mysql_query("select catid, aid, title, time, hometext, bodytext, topic, informant, notes, ihome from autonews where anid=$anid");
    list($catid, $aid, $title, $time, $hometext, $bodytext, $topic, $informant, $notes, $ihome) = mysql_fetch_row($result);
    ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);
    GraphicAdmin($hlpfile);
    OpenTable();
    $today = getdate();
    $tday = $today[mday];
    if ($tday < 10){
	$tday = "0$tday";
    }
    $tmonth = $today[month];
    $tyear = $today[year];
    $thour = $today[hours];
    if ($thour < 10){
	$thour = "0$thour";
    }
    $tmin = $today[minutes];
    if ($tmin < 10){
	$tmin = "0$tmin";
    }
    $tsec = $today[seconds];
    if ($tsec < 10){
	$tsec = "0$tsec";
    }
    $date = "$tmonth $tday, $tyear @ $thour:$tmin:$tsec";		
    echo "
    <font size=4><b><center>".translate("Edit Automated Story")."</b></font><br><br><br>
    <form action=\"admin.php\" method=post>
    </b></center>";
    $title = stripslashes($title);
    $hometext = stripslashes($hometext);
    $bodytext = stripslashes($bodytext);
    $notes = stripslashes($notes);
    $result=mysql_query("select topicimage from topics where topicid=$topic");
    list($topicimage) = mysql_fetch_row($result);
    echo "<center><br>
    <table border=0 width=75% cellpadding=0 cellspacing=1 bgcolor=000000><tr><td>
    <table border=0 width=100% cellpadding=8 cellspacing=1 bgcolor=FFFFFF><tr><td>";
    echo "";
    echo "<img src=$tipath$topicimage border=0 align=right>";
    themepreview($title, $hometext, $bodytext);
    echo "</td></tr></table></td></tr></table></center>
    <p><b>".translate("Title")."</b><br>
    <input class=textbox type=text name=title size=50 value=\"$title\"><BR>
    <p><b>".translate("Topic")."</b> <select name=topic>";
    $toplist = mysql_query("select topicid, topictext from topics order by topictext");
    echo "<OPTION VALUE=\"\">".translate("All Topics")."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
        echo "<option $sel value=\"$topicid\">$topics</option>\n";
	$sel = "";
    }
    echo "</select>";
    $cat = $catid;
    SelectCategory($cat);
    echo "<br>";
    puthome($ihome);
    echo "
    <p><b>".translate("The Story")."</b><br>
    <textarea class=textbox wrap=virtual cols=50 rows=12 name=hometext>$hometext</textarea><BR><BR>
    <p><b>".translate("Extended Text")."</b><br>
    <textarea class=textbox wrap=virtual cols=50 rows=12 name=bodytext>$bodytext</textarea><BR><BR>";
    if ($aid != $informant) {
    	echo "<p><b>".translate("Notes")."</b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=4 name=notes>$notes</textarea><BR><BR>";
    }
    echo "<font size=3><b>".translate("When do you want to publish this story?")."</b></font><br><br>";
    echo "".translate("Now is:")." $date<br><br>";
    $xday = 1;
    echo "".translate("Day:")." <select name=day>";
    while ($xday <= 31) {
	if ($xday == $datetime[3]) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=day $sel>$xday</option>";
	$xday++;
    }
    echo "</select>";
    $xmonth = 1;
    echo "".translate("Month:")." <select name=month>";
    while ($xmonth <= 12) {
	if ($xmonth == $datetime[2]) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=month $sel>$xmonth</option>";
	$xmonth++;
    }
    echo "</select>";
    echo "".translate("Year:")." <input type=text name=year value=$datetime[1] size=5 maxlength=4>";
    echo "<br>".translate("Hour:")." <select name=hour>";
    $xhour = 0;
    $cero = "0";
    while ($xhour <= 23) {
	$dummy = $xhour;
	if ($xhour < 10) {
	    $xhour = "$cero$xhour";
	}
	if ($xhour == $datetime[4]) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=hour $sel>$xhour</option>";
	$xhour = $dummy;
	$xhour++;
    }
    echo "</select>";
    echo " : <select name=min>";
    $xmin = 0;
    while ($xmin <= 59) {
	if (($xmin == 0) OR ($xmin == 5)) {
	    $xmin = "0$xmin";
	}
	if ($xmin == $datetime[5]) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=min $sel>$xmin</option>";
	$xmin = $xmin + 5;
    }
    echo "</select>";
    echo " : 00<br><br>
    <input type=hidden name=anid value=$anid>
    <input type=hidden name=op value=autoSaveEdit>
    <INPUT type=submit value=\"".translate("Save Changes")."\">
    </form></td></tr></table></td></tr></table>";
    include ('footer.php');

}

function autoSaveEdit($anid, $year, $day, $month, $hour, $min, $title, $hometext, $bodytext, $topic, $notes, $catid, $ihome) {
    global $aid, $admin, $ultramode;
    if ($day < 10) {
	$day = "0$day";
    }
    if ($month < 10) {
	$month = "0$month";
    }
    $sec = "00";
    $date = "$year-$month-$day $hour:$min:$sec";
    $title = stripslashes(FixQuotes($title));
    $hometext = stripslashes(FixQuotes($hometext));
    $bodytext = stripslashes(FixQuotes($bodytext));
    $notes = stripslashes(FixQuotes($notes));
    $result = mysql_query("update autonews set catid='$catid', title='$title', time='$date', hometext='$hometext', bodytext='$bodytext', topic='$topic', notes='$notes', ihome='$ihome' where anid=$anid");
    if (!$result) {
	echo mysql_errno(). ": ".mysql_error(). "<br>";
	exit();
    }
    if ($ultramode) {
	ultramode();
    }
    Header("Location: admin.php?op=autoStory");
}

switch($op) {

		case "SelectCategory":
			SelectCategory($cat);
			break;

		case "autoDelete":
			autodelete($anid);
			break;
	
		case "QautoPreview":
			QautoPreview($year, $day, $month, $hour, $min, $qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome);
			break;
			
		case "QautoStory":
			QautoStory($qid);
			break;
			
		case "QautoSave":
			QautoSave($year, $day, $month, $hour, $min, $qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome);
			break;
		
		case "autoStory":
			autoStory();
			break;
			
		case "autoSaveStory":
			autoSaveStory($year, $day, $month, $hour, $min, $subject, $hometext, $bodytext, $topic, $catid, $ihome);
			break;
		
		case "autoPreviewStory":
			autoPreviewStory($year, $day, $month, $hour, $min, $subject, $hometext, $bodytext, $topic, $catid, $ihome);
			break;

		case "autoEdit":
			autoEdit($anid);
			break;

		case "autoSaveEdit":
			autoSaveEdit($anid, $year, $day, $month, $hour, $min, $title, $hometext, $bodytext, $topic, $notes, $catid, $ihome);
			break;

}

} else {
    echo "Access Denied";
}

?>