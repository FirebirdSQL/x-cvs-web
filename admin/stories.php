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
$result = mysql_query("select radminarticle, radminsuper from authors where aid='$aid'");
list($radminarticle, $radminsuper) = mysql_fetch_row($result);
if (($radminarticle==1) OR ($radminsuper==1)) {

/*********************************************************/
/* Story/News Functions                                  */
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

function deleteStory($qid) {
	$result = mysql_query("delete from queue where qid=$qid");
		if (!$result)
		{
			echo mysql_errno(). ": ".mysql_error(). "<br>";
			return;
		}	Header("Location: admin.php?op=submissions");
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
	if ($catid == $cat) {
	    $sel = "selected";
	} else {
	    $sel = "";
	}
	echo "<option name=\"catid\" value=\"$catid\" $sel>$title</option>";
	$a++;
    }
    echo "</select> [ <a href=admin.php?op=AddCategory>Add</a> | <a href=admin.php?op=EditCategory>Edit</a> | <a href=admin.php?op=DelCategory>Delete</a> ]";
}

function AddCategory () {
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "<center><font size=\"3\"><b>Add a New Category</b></font><br><br><br>";
    echo "<form action=admin.php method=post>";
    echo "<b>New Category Name:</b> ";
    echo "<input type=text name=title size=22 maxlength=20> ";
    echo "<input type=hidden name=op value=SaveCategory>";
    echo "<input type=submit value=\"Save Changes\">";
    echo "</form></center>";
    CloseTable();
    include("footer.php");
}

function EditCategory($catid) {
    $result = mysql_query("select title from stories_cat where catid='$catid'");
    list($title) = mysql_fetch_row($result);
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "<center><font size=\"3\"><b>Edit Category</b></font><br>";
    if (!$catid) {
	$selcat = mysql_query("select catid, title from stories_cat");
	echo "<form action=admin.php method=post>";
	echo "<b>Select a Category</b>";
	echo "<select name=\"catid\">";
	echo "<option name=\"catid\" value=\"0\" $sel>Articles</option>";
	while(list($catid, $title) = mysql_fetch_row($selcat)) {
	    echo "<option name=\"catid\" value=\"$catid\" $sel>$title</option>";
	}
	echo "</select>";
	echo "<input type=hidden name=op value=EditCategory>";
	echo "<input type=submit value=\"Edit\">";
    } else {
	echo "<form action=admin.php method=post>";
	echo "<b>Category Name:</b> ";
	echo "<input type=text name=title size=22 maxlength=20 value=\"$title\"> ";
	echo "<input type=hidden name=catid value=\"$catid\">";
	echo "<input type=hidden name=op value=SaveEditCategory>";
	echo "<input type=submit value=\"Save Changes\">";
	echo "</form>";
    }
    echo "</center>";
    CloseTable();
    include("footer.php");
}

function DelCategory($cat) {
    $result = mysql_query("select title from stories_cat where catid='$cat'");
    list($title) = mysql_fetch_row($result);
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "<center><font size=\"3\"><b>Delete Category</b></font><br>";
    if (!$cat) {
	$selcat = mysql_query("select catid, title from stories_cat");
	echo "<form action=admin.php method=post>";
	echo "<b>Select a Category to Delete: </b>";
	echo "<select name=\"cat\">";
	while(list($catid, $title) = mysql_fetch_row($selcat)) {
	    echo "<option name=\"cat\" value=\"$catid\">$title</option>";
	}
	echo "</select>";
	echo "<input type=hidden name=op value=DelCategory>";
	echo "<input type=submit value=\"Delete\">";
	echo "</form>";
    } else {
	$result2 = mysql_query("select * from stories where catid='$cat'");
	$numrows = mysql_num_rows($result2);
	if ($numrows == 0) {
	    mysql_query("delete from stories_cat where catid='$cat'");
	    echo "<br><br>Deletion Completed!";
	} else {
	    echo "<br><br><b>WARNING:</b> The Category <b>$title</b> has <b>$numrows</b> stories</b> inside!<br>";
	    echo "You can Delete this Category and ALL its stories and comments<br>";
	    echo "<br>or you can Move ALL the stories to a New Category.<br><br>";
	    echo "What do you want to do?<br><br>";
	    echo "<b>[ <a href=admin.php?op=YesDelCategory&catid=$cat>Yes! Delete ALL!</a> | ";
	    echo "<a href=admin.php?op=NoMoveCategory&catid=$cat>No! Move my Stories</a> ]</b>";
	}
    }
    echo "</center>";
    CloseTable();
    include("footer.php");
}

function YesDelCategory($catid) {
    mysql_query("delete from stories_cat where catid='$catid'");
    $result = mysql_query("select sid from stories where catid='$catid'");
    while(list($sid) = mysql_fetch_row($result)) {
	mysql_query("delete from stories where catid='$catid'");
	mysql_query("delete from comments where sid='$sid'");
    }
    Header("Location: admin.php");
}

function NoMoveCategory($catid, $newcat) {
    $result = mysql_query("select title from stories_cat where catid='$catid'");
    list($title) = mysql_fetch_row($result);
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "<center><font size=\"3\"><b>Move Stories to a New Category</b></font><br><br>";
    if (!$newcat) {
	echo "ALL stories under <b>$title</b> will be moved.<br><br>";
	$selcat = mysql_query("select catid, title from stories_cat");
	echo "<form action=admin.php method=post>";
	echo "<b>Please Select the New Category:</b> ";
	echo "<select name=\"newcat\">";
        echo "<option name=\"newcat\" value=\"0\">Articles</option>";
	while(list($newcat, $title) = mysql_fetch_row($selcat)) {
    	    echo "<option name=\"newcat\" value=\"$newcat\">$title</option>";
	}
	echo "</select>";
	echo "<input type=hidden name=catid value=\"$catid\">";
	echo "<input type=hidden name=op value=NoMoveCategory>";
	echo "<input type=submit value=\"Move!\">";
	echo "</form>";
    } else {
	$resultm = mysql_query("select sid from stories where catid='$catid'");
	while(list($sid) = mysql_fetch_row($resultm)) {
	    mysql_query("update stories set catid='$newcat' where sid='$sid'");
	}
	mysql_query("delete from stories_cat where catid='$catid'");
	echo "Congratulations! The Moved has been completed!";
    }
    CloseTable();
    include("footer.php");
}

function SaveEditCategory($catid, $title) {
    $title = ereg_replace("\"","",$title);
    $check = mysql_query("select catid from stories_cat where title=$title");
    if ($check) {
	$what1 = "This Category already exist!";
	$what2 = "[ <a href=javascript:history.go(-1)>Go Back to Change the Name</a> ]";
    } else {
	$what1 = "Category Saved!";
	$what2 = "[ <a href=\"admin.php\">Go to Admin Section</a> ]";
	$result = mysql_query("update stories_cat set title='$title' where catid='$catid'");
	if (!$result) {
	    echo mysql_errno(). ": ".mysql_error(). "<br>";
	    return;
	}    
    }
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "<center><font size=\"2\"><b>$what1</b></font><br><br>";
    echo "$what2</center>";
    CloseTable();
    include("footer.php");
}

function SaveCategory($title) {
    $title = ereg_replace("\"","",$title);
    $check = mysql_query("select catid from stories_cat where title=$title");
    if ($check) {
	$what1 = "This Category already exist!";
	$what2 = "[ <a href=javascript:history.go(-1)>Go Back to Change the Name</a> ]";
    } else {
	$what1 = "New Category Added!";
	$what2 = "[ <a href=\"admin.php\">Go to Admin Section</a> ]";
	$result = mysql_query("insert into stories_cat values (NULL, '$title', '0')");
	if (!$result) {
	    echo mysql_errno(). ": ".mysql_error(). "<br>";
	    return;
	}    
    }
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "<center><font size=\"2\"><b>$what1</b></font><br><br>";
    echo "$what2</center>";
    CloseTable();
    include("footer.php");
}

function displayStory ($qid) {
	global $user, $subject, $story, $tipath;
	include ('header.php');
	GraphicAdmin($hlpfile);
	$result = mysql_query("SELECT qid, uid, uname, subject, story, topic FROM queue where qid=$qid");
	list($qid, $uid, $uname, $subject, $story, $topic) = mysql_fetch_row($result);
	mysql_free_result($result);
	$subject = stripslashes($subject);
	$story = stripslashes($story);
	OpenTable4();
	?>
	<font size=3>
	<form action="admin.php" method="post">
	<p><b><?php echo translate("Name"); ?></b><br>
	<input class=textbox type="text" NAME="author" SIZE=50 value="<?PHP echo "$uname"; ?>">
	<p><b><?php echo translate("Subject"); ?></b><br>
	<input class=textbox type=text name=subject size=50 value="<?PHP echo"$subject"; ?>">
	<?PHP
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
	?>
	<p><b>Topic</b> <select name=topic>
	<?PHP
	$toplist = mysql_query("select topicid, topictext from topics order by topictext");
        echo "<OPTION VALUE=\"\">".translate("Select Topic")."</option>\n";
        while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
        if ($topicid==$topic) { $sel = "selected "; }
            echo "<option $sel value=\"$topicid\">$topics</option>\n";
	    $sel = "";
        }
	echo "</select>";
	echo "<br><br>";
	SelectCategory($cat);
	echo "<br>";
	puthome($ihome);
	?>
	<p><b><?php echo translate("Intro Text"); ?></b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=7 name=hometext><?PHP echo "$story"; ?></textarea>
	<p><b><?php echo translate("Full Text"); ?></b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=8 name=bodytext></textarea><BR>
	<FONT size=2><?php echo translate("(Did you check URLs?)"); ?></FONT><P>

	<p><b><?php echo translate("Notes"); ?></b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=4 name=notes></textarea><br>

	<input type="hidden" NAME="qid" SIZE=50 value="<?PHP echo "$qid"; ?>">
	<input type="hidden" NAME="uid" SIZE=50 value="<?PHP echo "$uid"; ?>">
	<select name="op">
		<option value="DeleteStory"><?php echo translate("DeleteStory"); ?></option>
		<option value="PreviewAgain" SELECTED><?php echo translate("PreviewAgain"); ?></option>
		<option value="PostStory"><?php echo translate("PostStory"); ?></option>
	</select>
	<INPUT type="submit" value="<?php echo translate("Go!"); ?>">
	</form></td></tr></table></td></tr></table>
	<?PHP
	include ('footer.php');
}

function previewStory($qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome) {
	global $user, $boxstuff, $tipath;
	include ('header.php');
	GraphicAdmin($hlpfile);
	$subject = stripslashes($subject);
	$hometext = stripslashes($hometext);
	$bodytext = stripslashes($bodytext);
	$notes = stripslashes($notes);
	OpenTable4();
	?>
	<font size=3>
	<form action="admin.php" method=post>
	<p><b><?php echo translate("Name"); ?></b><br>
	<input class=textbox type="text" NAME="author" SIZE=50 value="<?PHP echo"$author"; ?>">
	<p><b><?php echo translate("Subject"); ?></b><br>
	<input class=textbox type=text name=subject size=50 value="<?PHP echo"$subject"; ?>">
	<?PHP
	$result = mysql_query("select topicimage from topics where topicid=$topic");
	list($topicimage) = mysql_fetch_row($result);
	echo "<br><br><center><table width=70% bgcolor=000000 cellpadding=0 cellspacing=1 border=0><tr><td>";
	echo "<table width=100% bgcolor=FFFFFF cellpadding=8 cellspacing=1 border=0><tr><td>";
	echo "<img src=$tipath$topicimage border=0 align=right>";
	themepreview($subject, $hometext, $bodytext, $notes);
	echo "</td></tr></table></td></tr></table></center>";
	?>
	<p><b><?php echo translate("Topic"); ?></b> <select name=topic>
	<?PHP
	$toplist = mysql_query("select topicid, topictext from topics order by topictext");
        echo "<OPTION VALUE=\"\">".translate("All Topics")."</option>\n";
        while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
        if ($topicid==$topic) { $sel = "selected "; }
            echo "<option $sel value=\"$topicid\">$topics</option>\n";
	    $sel = "";
        }
	echo "</select>";
	echo "<br><br>";
	$cat = $catid;
	SelectCategory($cat);
	echo "<br>";
	puthome($ihome);
	?>
	<p><b><?php echo translate("Intro Text"); ?></b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=7 name=hometext><?PHP echo"$hometext"; ?></textarea>
	<p><b><?php echo translate("Full Text"); ?></b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=10 name=bodytext><?PHP echo"$bodytext"; ?></textarea><BR>
	<FONT size=2><?php echo translate("(Did you check URLs?)"); ?></FONT><P>
	<p><b><?php echo translate("Notes"); ?></b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=4 name=notes><?PHP echo"$notes"; ?></textarea><br>
	<input type="hidden" NAME="qid" SIZE=50 value="<?PHP echo"$qid"; ?>">
	<input type="hidden" NAME="uid" SIZE=50 value="<?PHP echo "$uid"; ?>">
	<select name="op">
		<option value="DeleteStory"><?php echo translate("DeleteStory"); ?></option>
		<option value="PreviewAgain" SELECTED><?php echo translate("PreviewAgain"); ?></option>
		<option value="PostStory"><?php echo translate("PostStory"); ?></option>
	</select>
	<INPUT type="submit" value="<?php echo translate("Go!"); ?>"></FORM>
	</td></tr></table></td></tr></table>
	<?PHP
	include ('footer.php');
}

function postStory($qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome) {
	global $aid, $ultramode;
	if ($uid == 1) $author = "";
	if ($hometext == $bodytext) $bodytext = "";
	$subject = stripslashes(FixQuotes($subject));
	$hometext = stripslashes(FixQuotes($hometext));
	$bodytext = stripslashes(FixQuotes($bodytext));
	$notes = stripslashes(FixQuotes($notes));
	$result = mysql_query("insert into stories values (NULL, '$catid', '$aid', '$subject', now(), '$hometext', '$bodytext', '0', '0', '$topic','$author', '$notes', '$ihome')");
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
	deleteStory($qid);
}

function editStory ($sid) {
	global $user, $tipath;
	include ('header.php');
	GraphicAdmin($hlpfile);
	$result = mysql_query("SELECT catid, title, hometext, bodytext, topic, notes, ihome FROM stories where sid=$sid");
	list($catid, $subject, $hometext, $bodytext, $topic, $notes, $ihome) = mysql_fetch_row($result);
	mysql_free_result($result);
	
	$subject = stripslashes($subject);
	$hometext = stripslashes($hometext);
	$bodytext = stripslashes($bodytext);
	$notes = stripslashes($notes);

	$result=mysql_query("select topicimage from topics where topicid=$topic");
	list($topicimage) = mysql_fetch_row($result);
	OpenTable4();
	echo "<center><font size=4><b>".translate("Edit Article")."</b></center><br><br>";
	echo "<br><center><table width=80% border=0 cellpadding=0 cellspacing=1 bgcolor=000000><tr><td>
	<table width=100% border=0 cellpadding=8 cellspacing=1 bgcolor=FFFFFF><tr><td>";
	echo "<img src=$tipath$topicimage border=0 align=right>";
	themepreview($subject, $hometext, $bodytext);
	echo "</td></tr></table></td></tr></table></center><br><br>";
	echo "<form action=admin.php method=post>";
	echo "<P><B>".translate("Subject")."</B><br>";
	?>
	<input class=textbox type=text name=subject size=50 value="<?php echo "$subject"; ?>"><BR>
	<p><b><?php echo translate("Topic"); ?></b> <select name=topic>
	<?PHP
	$toplist = mysql_query("select topicid, topictext from topics order by topictext");
        echo "<OPTION VALUE=\"\">".translate("All Topics")."</option>\n";
        while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
        if ($topicid==$topic) { $sel = "selected "; }
            echo "<option $sel value=\"$topicid\">$topics</option>\n";
	    $sel = "";
        }
	echo "</select>";
	echo "<br><br>";
	$cat = $catid;
	SelectCategory($cat);
	echo "<br>";
	puthome($ihome);
	?>
	<P><B><?php echo translate("Intro Text"); ?></B><br>
	<textarea class=textbox wrap=virtual cols=50 rows=7 name=hometext><?PHP echo"$hometext"; ?></textarea>
	<P><B><?php echo translate("Full Text"); ?></B><br>
	<textarea class=textbox wrap=virtual cols=50 rows=10 name=bodytext><?PHP echo"$bodytext"; ?></textarea><BR>
	<FONT size=2><?php echo translate("(Did you check URLs?)"); ?></FONT><P>
	<P><B><?php echo translate("Notes"); ?></B><br>
	<textarea class=textbox wrap=virtual cols=50 rows=4 name=notes><?php echo "$notes"; ?></textarea><br>
	<input type="hidden" NAME="sid" SIZE=50 value="<?PHP echo"$sid"; ?>">
	<INPUT type="hidden" name="op" value="ChangeStory">
	<INPUT type="submit" value="<?php echo translate("ChangeStory"); ?>">
	</form></td></tr></table></td></tr></table>
	<?PHP
	include ('footer.php');
}

function removeStory ($sid, $ok=0) {
	global $ultramode;
	if($ok) {
		mysql_query("DELETE FROM stories where sid=$sid");
		mysql_query("DELETE FROM comments where sid=$sid");
		if ($ultramode) {
		    ultramode();
		}
		Header("Location: admin.php");
	} else {
		include("header.php");
		GraphicAdmin($hlpfile);
		echo "<center>".translate("Are you sure you want to remove Story ID #")." $sid ".translate("and all it's comments?")."";
		echo "<br><br>[ <a href=\"admin.php\">".translate("No")."</a> | <a href=\"admin.php?op=RemoveStory&sid=$sid&ok=1\">".translate("Yes")."</a> ]</center>";
		include("footer.php");
	}
}


function changeStory($sid, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome) {
	global $aid, $ultramode;
	$subject = stripslashes(FixQuotes($subject));
	$hometext = stripslashes(FixQuotes($hometext));
	$bodytext = stripslashes(FixQuotes($bodytext));
	$notes = stripslashes(FixQuotes($notes));
	mysql_query("update stories set catid='$catid', title='$subject', hometext='$hometext', bodytext='$bodytext', topic='$topic', notes='$notes', ihome='$ihome' where sid=$sid");
	if ($ultramode) {
	    ultramode();
	}
	Header("Location: admin.php?op=adminMain");
}

function adminStory() {
	global $hlpfile, $admin;
	$hlpfile = "manual/newarticle.html";
	include ('header.php');
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "
	<a name=new></a>
	<center><font size=4><b>".translate("New Article")."</b></font></center><br><br>"; ?>
	<form action="admin.php" method=post>
	<p><b><?php echo translate("Title"); ?></b><br>
	<input class=textbox type=text name=subject size=50 value=""><BR>
	<BR>
	<p><b><?php echo translate("Topic"); ?></b>
        <?php
        $toplist = mysql_query("select topicid, topictext from topics order by topictext");
        echo "<SELECT class=textbox NAME=\"topic\">";
        echo "<OPTION VALUE=\"\">".translate("Select Topic")."</option>\n";
        while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    	    if ($topicid==$topic) { $sel = "selected "; }
    		echo "<option $sel value=\"$topicid\">$topics</option>\n";
		$sel = "";
    	    }
        echo "</SELECT>";
	echo "<br><br>";
	$cat = 0;
	SelectCategory($cat);
	echo "<br>";
	puthome($ihome);
	?>
	<P><B><?php echo translate("The Story"); ?></B><br>
	<textarea class=textbox wrap=virtual cols=70 rows=12 name=hometext></textarea><BR>
	<P><B><?php echo translate("Extended Text"); ?></B><br>
	<textarea class=textbox wrap=virtual cols=70 rows=12 name=bodytext></textarea><BR>
	<FONT size=2><?php echo translate("(Are you sure you included a URL? Did ya test them for typos?)"); ?></FONT><P>
	<select class=textbox name="op">
	<option value="PreviewAdminStory" SELECTED><?php echo translate("PreviewAdminStory"); ?></option>
	<option value="PostAdminStory"><?php echo translate("PostAdminStory"); ?></option>
	</select>
	<INPUT type="submit" value="<?php echo translate("Go!"); ?>">
	</form></td></tr></table></td></tr></table>
	<?PHP
	include ('footer.php');
}

function previewAdminStory($subject, $hometext, $bodytext, $topic, $catid) {
	global $user, $tipath;
	include ('header.php');
	if ($topic<1) {
	    $topic = 1;
	}
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "
	<font size=4><b><center>".translate("Preview Story")."</b></font><br><br><br>
	<form action=\"admin.php\" method=post>
	<inpyt type=hidden name=catid value=$catid>
	</b></center>
	";
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
	echo "</td></tr></table></td></tr></table></center>";
	?>
	<p><b><?php echo translate("Title"); ?></b><br>
	<input class=textbox type=text name=subject size=50 value="<?PHP echo"$subject"; ?>"><BR>
	<p><b><?php echo translate("Topic"); ?></b><br><select name=topic>
	<?PHP
	$toplist = mysql_query("select topicid, topictext from topics order by topictext");
        echo "<OPTION VALUE=\"\">".translate("All Topics")."</option>\n";
        while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
        if ($topicid==$topic) { $sel = "selected "; }
            echo "<option $sel value=\"$topicid\">$topics</option>\n";
	    $sel = "";
        }
	echo "</select>";
	echo "<br><br>";
	$cat = $catid;
	SelectCategory($cat);
	puthome($ihome);
	?>
	<p><b><?php echo translate("The Story"); ?></b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=12 name=hometext><?PHP echo "$hometext"; ?></textarea><BR><BR>
	<p><b><?php echo translate("Extended Text"); ?></b><br>
	<textarea class=textbox wrap=virtual cols=50 rows=12 name=bodytext><?PHP echo "$bodytext"; ?></textarea><BR>
	<select class=textbox name="op">
	<option value="PreviewAdminStory" SELECTED><?php echo translate("PreviewAdminStory"); ?></option>
	<option value="PostAdminStory"><?php echo translate("PostAdminStory"); ?></option>
	</select>
	<INPUT type="submit" value="<?php echo translate("Go!"); ?>">
	</form></td></tr></table></td></tr></table>
	<?PHP
	include ('footer.php');

}

function postAdminStory($subject, $introstory, $fullstory, $topic, $catid, $ihome) {
	global $aid;
	$subject = stripslashes(FixQuotes($subject));
	$introstory = stripslashes(FixQuotes($introstory));
	$fullstory = stripslashes(FixQuotes($fullstory));
	$result = mysql_query("insert into stories values (NULL, '$catid', '$aid', '$subject', now(), '$introstory', '$fullstory', '0', '0', '$topic', '$aid', '$notes', '$ihome')");
	if (!$result)
	{
		echo mysql_errno(). ": ".mysql_error(). "<br>";
		exit();
	}
	$result = mysql_query("update authors set counter=counter+1 where aid='$aid'");
	if ($ultramode) {
	    ultramode();
	}
	Header("Location: admin.php?op=adminMain");
}

switch($op) {

		case "EditCategory":
			EditCategory($catid);
			break;
		
		case "DelCategory":
			DelCategory($cat);
			break;

		case "YesDelCategory":
			YesDelCategory($catid);
			break;

		case "NoMoveCategory":
			NoMoveCategory($catid, $newcat);
			break;
		
		case "SaveEditCategory":
			SaveEditCategory($catid, $title);
			break;

		case "SelectCategory":
			SelectCategory($cat);
			break;

		case "AddCategory":
			AddCategory();
			break;

		case "SaveCategory":
			SaveCategory($title);
			break;

		case "DisplayStory":
			displayStory($qid);
			break;

		case "PreviewAgain":
			previewStory($qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome);
			break;

		case "PostStory":
			postStory($qid, $uid, $author, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome);
			break;

		case "EditStory":
			editStory($sid);
			break;

		case "RemoveStory":
			removeStory($sid, $ok);
			break;

		case "ChangeStory":
			changeStory($sid, $subject, $hometext, $bodytext, $topic, $notes, $catid, $ihome);
			break;

		case "DeleteStory":
			deleteStory($qid);
			break;

		case "adminStory":
			adminStory($sid);
			break;

		case "PreviewAdminStory":
			previewAdminStory($subject, $hometext, $bodytext, $topic, $catid, $ihome);
			break;

		case "PostAdminStory":
			postAdminStory($subject, $hometext, $bodytext, $topic, $catid, $ihome);
			break;

}

} else {
    echo "Access Denied";
}

?>