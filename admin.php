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

include("auth.inc.php");
if (!IsSet($mainfile)) { include ("mainfile.php"); }

function html_header(){
    global $basedir, $wdir, $lastaction, $admin, $language, $hlpfile;
    OpenTable4();
    echo "<center><font size=\"3\"><b>".translate("File Manager")."</b><br><br>".translate("Current Directory is:")." <b>$wdir</b></font><br>";
    echo "[ <a href=\"admin.php?op=root\">".translate("Back to root")."</a> | <a href=\"admin.php?op=FileManager&wdir=$wdir\">".translate("Refresh")."</a> ]<br><br>$lastaction</center><br><br>";
}


/*********************************************************/
/* Login Function                                        */
/*********************************************************/

function login() {
    include ("header.php");
    OpenTable4();
    echo "
    <form action=\"admin.php\" method=\"post\">
    <table border=0>
    <tr><td>".translate("AdminID")."</td>
    <td><input type=\"text\" NAME=\"aid\" SIZE=\"20\" MAXLENGTH=\"20\"></td></tr>
    <tr><td>".translate("Password")."</td>
    <td><input type=\"password\" NAME=\"pwd\" SIZE=\"20\" MAXLENGTH=\"18\"></td></tr>
    <tr><td>
    <input type=\"hidden\" NAME=\"op\" value=\"login\">
    <input type=\"submit\" VALUE=\"".translate("Login")."\">
    </td></tr></table>
    </form>
    ";
    CloseTable();
    include ("footer.php");
}

function deleteNotice($id, $table, $op_back) {
    mysql_query("delete from $table WHERE id = $id");
    Header("Location: admin.php?op=$op_back");
}

/*********************************************************/
/* Administration Menu Function                          */
/*********************************************************/

function adminmenu($url, $title, $image) {
    global $counter, $admingraphic, $adminimg;
    if ($admingraphic == 1) {
	$img = "<img src=\"$adminimg$image\" border=0></a><br>";
	if ($title == "Submissions") {
	    $newsubs = mysql_num_rows(mysql_query("select * from queue"));
	    $close = " ($newsubs)";
	} else {
	    $close = "";
	}
    } else {
	$image = "";
	if ($title == "Submissions") {
	    $newsubs = mysql_num_rows(mysql_query("select * from queue"));
	    $close = "</a> ($newsubs)";
	} else {
	    $close = "</a>";
	}
    }
    echo "<td align=center><font size=2><a href=\"$url\">$img<b>".translate("$title")."</b>$close</font></td>";
    if ($counter == 5) {
	echo "</tr><tr>";
	$counter = 0;
    } else {
	$counter++;
    }
}

function GraphicAdmin($hlpfile) {
    global $aid, $admingraphic, $adminimg, $language, $admin, $banners;
    $result = mysql_query("SELECT qid FROM queue");
    $newsubs = mysql_num_rows($result);
    $result = mysql_query("select radminarticle,radmintopic,radminleft,radminright,radminuser,radminmain,radminsurvey,radminsection,radminlink,radminephem,radminfilem,radminhead,radminsuper from authors where aid='$aid'");
    list($radminarticle,$radmintopic,$radminleft,$radminright,$radminuser,$radminmain,$radminsurvey,$radminsection,$radminlink,$radminephem,$radminfilem,$radminhead,$radminsuper) = mysql_fetch_array($result);
	OpenTable4();	
	echo "<center><font size=4><b><a href=admin.php>".translate("Administration Menu")."</a></b>";
	if ($radminsuper==1) {
	    echo"&nbsp;&nbsp;&nbsp;<b><a href=admin.php?op=BannersAdmin>".translate("Banners Administration")."</a></b></font><br><br>";
	}
	if (!$hlpfile) {
	} else {
	    echo "[ <a href=javascript:openwindow()>".translate("Online Manual")."</a> ]</center><br><br>";
	}
	echo"<table border=0 width=100% cellspacing=1><tr>";
	$counter = 0;

	if (($radminsuper==1) OR ($radminarticle==1)) {
	    adminmenu("admin.php?op=submissions", "Submissions", "submissions.gif");
	    adminmenu("admin.php?op=adminStory", "NEW Article", "postnew.gif");
	    adminmenu("admin.php?op=autoStory", "Auto Articles", "autonews.gif");
	}
	if (($radminsuper==1) OR ($radmintopic==1)) {
	    adminmenu("admin.php?op=topicsmanager", "Topics Manager", "topicsman.gif");
	}
	if (($radminsuper==1) OR ($radminleft==1)) {
	    adminmenu("admin.php?op=lblocks", "Left Blocks", "leftblock.gif");
	}
	if (($radminsuper==1) OR ($radminright==1)) {
	    adminmenu("admin.php?op=rblocks", "Right Blocks", "rightblock.gif");
	}
	if (($radminsuper==1) OR ($radminuser==1)) {
	    adminmenu("admin.php?op=mod_users", "Edit Users", "users.gif");
	}
	if ($radminsuper==1) {
	    adminmenu("admin.php?op=mod_authors", "Edit Admins", "authors.gif");
	}
	if ($radminsuper==1) {
	    adminmenu("admin.php?op=ablock", "Admin Block", "adminblock.gif");
	}
	if (($radminsuper==1) OR ($radminmain==1)) {
	    adminmenu("admin.php?op=mblock", "Main Block", "mainblock.gif");
	}
	if (($radminsuper==1) OR ($radminsurvey==1)) {
	    adminmenu("admin.php?op=create", "Surveys/Polls", "newpoll.gif");
	}
	if ($radminsuper==1) {
	    adminmenu("admin.php?op=hreferer", "HTTP Referers", "referer.gif");
	}
	if (($radminsuper==1) OR ($radminsection==1)) {
	    adminmenu("admin.php?op=sections", "Sections Manager", "sections.gif");
	}
	if (($radminsuper==1) OR ($radminlink==1)) {
	    adminmenu("admin.php?op=links", "Web Links", "links.gif");
	}
	if ($radminsuper==1) {
	    adminmenu("admin.php?op=Configure", "Preferences", "preferences.gif");
	}
	if (($radminsuper==1) OR ($radminephem==1)) {
	    adminmenu("admin.php?op=Ephemerids", "Ephemerids", "ephem.gif");
	}
	if (($radminsuper==1) OR ($radminfilem==1)) {
	    adminmenu("admin.php?op=FileManager", "File Manager", "filemanager.gif");
	}
	if (($radminsuper==1) OR ($radminhead==1)) {
	    adminmenu("admin.php?op=HeadlinesAdmin", "Headlines", "headlines.gif");
	}
	if (($radminsuper==1) OR ($radminfaq==1)) {
	    adminmenu("admin.php?op=FaqAdmin", "Faq", "faq.gif");
	}
	if (($radminsuper==1) OR ($radmindownload==1)) {
	    adminmenu("admin.php?op=DownloadAdmin", "Download", "download.gif");
	}
	if (($radminsuper==1) OR ($radminforum==1)) {
	    adminmenu("admin.php?op=ForumAdmin", "Forum Manager", "forum.gif");
	    adminmenu("admin.php?op=RankForumAdmin", "Forum Ranking", "forum.gif");
	    adminmenu("admin.php?op=ForumConfigAdmin", "Forum Configuration", "forum.gif");
	}
	if (($radminsuper==1) OR ($radminreviews==1)) {
	    adminmenu("admin.php?op=reviews", "Reviews", "reviews.gif");
	}
	adminmenu("admin.php?op=logout", "Logout / Exit", "exit.gif");

	echo"</tr></table></center>";
	CloseTable();
	echo "<br><br>";
}

/*********************************************************/
/* Administration Main Function                          */
/*********************************************************/

function adminMain() {
    global $language, $hlpfile, $admin, $admart;
    $hlpfile = "manual/$language/admin.html";
    include ("header.php");
    OpenTable4();
    $dummy = 0;
    GraphicAdmin($hlpfile);
    echo "<hr noshade>";
    echo "<center><b>".translate("Last")." $admart ".translate("Articles")."</b></center><br>";
    $result = mysql_query("select sid, title, time, topic, informant from stories order by time desc limit 0,$admart");
    echo "<center><table border=\"1\" width=\"100%\" bgcolor=$bgcolor1>";
    while(list($sid, $title, $time, $topic, $informant) = mysql_fetch_row($result)) {
	$ta = mysql_query("select topicname from topics where topicid=$topic");
	list($topicname) = mysql_fetch_row($ta);
	formatTimestamp($time);
	echo "
	<tr><td align=\"right\"><b>$sid</b>
	</td><td align=\"left\" width=\"100%\"><a href=\"article.php?sid=$sid\">$title</a>
	</td><td align=\"right\">$topicname
	</td><td align=\"right\"><b>(<a href=\"admin.php?op=EditStory&sid=$sid\">".translate("Edit")."</a>-<a href=\"admin.php?op=RemoveStory&sid=$sid\">".translate("Delete")."</a>)</b>";
	echo "</td></tr>";
    }
    echo "
    </table>
    <center>
    <form action=\"admin.php\" method=\"post\">
    ".translate("Story ID:")." <input type=\"text\" NAME=\"sid\" SIZE=\"10\">
    <select name=\"op\">
    <option value=\"EditStory\" SELECTED>".translate("EditStory")."</option>
    <option value=\"RemoveStory\">".translate("RemoveStory")."</option>
    </select>
    <input type=\"submit\" value=\"".translate("Go!")."\">
    </form>
    ";
    $result = mysql_query("SELECT pollID, pollTitle, timeStamp FROM poll_desc ORDER BY pollID DESC limit 1");
    $object = mysql_fetch_object($result);
    $pollTitle = $object->pollTitle;
    echo "".translate("Current Poll:")." $pollTitle</center><br>";
    CloseTable();
    include ("footer.php");
}

/*********************************************************/
/* File Manager Functions                                */
/*********************************************************/

function display_size($file){
    $file_size = filesize($file);
    if($file_size >= 1073741824)
 	{
        $file_size = round($file_size / 1073741824 * 100) / 100 . "g";
	}
    elseif($file_size >= 1048576)
	{
        $file_size = round($file_size / 1048576 * 100) / 100 . "m";
	}
    elseif($file_size >= 1024)
	{
        $file_size = round($file_size / 1024 * 100) / 100 . "k";
	}
    else{
        $file_size = $file_size . "b";
	}
    return $file_size;
}

function displaydir() {
    global $basedir, $wdir, $udir, $lastaction, $textcolor2;
    $lastaction = "".translate("Listing directory")."";
    echo "<TABLE BORDER=\"0\" cellspacing=\"1\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#FFFFFF\">";
    echo "<tr>";
    echo "<td bgcolor=\"#4C4C99\"><font color=\"white\" face=\"arial, helvetica\">".translate("Type")."</font></td>";
    echo "<td bgcolor=\"#4C4C99\"><font color=\"white\" face=\"arial, helvetica\">".translate("Name")."</font></td>";
    echo "<td bgcolor=\"#4C4C99\"><font color=\"white\" face=\"arial, helvetica\">".translate("Size")."</font></td>";
    echo "<td bgcolor=\"#4C4C99\"><font color=\"white\" face=\"arial, helvetica\">".translate("Modified")."</font></td>";
    echo "<td bgcolor=\"#4C4C99\"><font color=\"white\" face=\"arial, helvetica\">".translate("Action")."</font></td>";
    echo "</tr>";
    chdir($basedir . $wdir);
    $handle=opendir(".");
    while ($file = readdir($handle)) {
	if(is_dir($file)) $dirlist[] = $file;
	if(is_file($file)) $filelist[] = $file;
    }
    closedir($handle);
    if($dirlist) {
	asort($dirlist);
	while (list ($key, $file) = each ($dirlist)) {
	    if (!($file == ".")) {
		$filename=$basedir.$wdir.$file;
		$fileurl=rawurlencode($wdir.$file);
		$lastchanged = filectime($filename);
		$changeddate = date("d-m-Y H:i:s", $lastchanged);
		echo "<TR>";
		if($file == "..") {
		    $downdir = dirname("$wdir");
		    echo "<TD align=\"center\" nobreak><A HREF=\"admin.php?op=chdr&file=$downdir\"><img src=\"images/admin/filemanager/parent.gif\" alt=\"".translate("Parent directory")."\" border=\"0\"></a></TD>\n";
		    echo "<TD></TD>\n";
		    echo "<TD align=\"right\" nobreak><font color=$textcolor2 size =\"-1\" face=\"arial, helvetica\">" . display_size($filename) . "</font>";
		    echo "</TD><TD nobreak>";
		    echo "</TD><TD nobreak>";
		    echo "<A HREF=\"admin.php?op=chdr&file=$downdir\"><img src=\"images/admin/filemanager/parent.gif\" alt=\"".translate("Parent directory")."\" border=\"0\"></A> ";
		} else {
		    $lastchanged = filectime($filename);
		    echo "<TD align=\"center\" nobreak><A HREF=\"admin.php?op=chdr&file=$fileurl\"><img src=\"images/admin/filemanager/folder.gif\" alt=\"".translate("Change working directory to")." $file\" border=\"0\"></a></TD>\n";
		    echo "<TD nobreak><font color=$textcolor2 size =\"-1\" face=\"arial, helvetica\">" . htmlspecialchars($file) . "</font></TD>\n";
		    echo "<TD align=\"right\" nobreak><font color=$textcolor2 size =\"-1\" face=\"arial, helvetica\">" . display_size($filename) . "</font></TD>";
		    echo "<TD align=\"middle\" nobreak><font color=$textcolor2 size =\"-1\" face=\"arial, helvetica\">" . $changeddate . "</font>";
		    echo "</font></TD><TD nobreak>";
		    echo " <A HREF=\"admin.php?op=move&wdir=$wdir&file=$fileurl\"><img src=\"images/admin/filemanager/move.gif\" alt=\"".translate("Move, rename or copy")." $file\" border=\"0\"></A> ";
		    echo " <A HREF=\"admin.php?op=touch&wdir=$wdir&touchfile=$fileurl\"><img src=\"images/admin/filemanager/touch.gif\" alt=\"".translate("Touch")." $file\" border=\"0\"></A> ";
		    echo "<A HREF=\"admin.php?op=del&wdir=$wdir&file=$fileurl\"><img src=\"images/admin/filemanager/delete.gif\" alt=\"".translate("Delete")." $file\" border=\"0\"></A> ";
		}
	    }
	}
    }
    if($filelist) {
	asort($filelist);
	while (list ($key, $file) = each ($filelist)) {
	    if (ereg(".gif|.jpg",$file)) {
		$icon = "<IMG src=\"images/admin/filemanager/image.gif\" alt=\"Image\" border=\"0\">";
		$browse = "1";
		$raw = "0";
		$image = "1";
	    } elseif (ereg(".txt",$file)) {
		$icon = "<IMG src=\"images/admin/filemanager/text.gif\" alt=\"Text\" border=\"0\">";
		$browse = "1";
		$raw = "1";
		$image = "0";
	    } elseif (ereg(".wav|.mp2|.mp3|.mp4|.vqf|.midi",$file)) {
		$icon = "<IMG src=\"images/admin/filemanager/audio.gif\" alt=\"Audio\" border=\"0\">";
		$browse = "1";
		$raw = "0";
		$image = "0";
	    } elseif (ereg(".phps|.php|.php2|.php3|.php4|.asp|.asa|.cgi|.pl|.shtml",$file)) {
		$icon = "<IMG src=\"images/admin/filemanager/webscript.gif\" alt=\"Web program\" border=\"0\">";
		$browse = "1";
		$raw = "1";
		$image = "0";
	    } elseif (ereg(".htaccess",$file)) {
		$icon = "<IMG src=\"images/admin/filemanager/security.gif\" alt=\"Apache Webserver security settings\" border=\"0\">" ;
		$browse = "0";
		$raw = "1";
		$image = "0";
	    } elseif (ereg(".html|.htm",$file))	{
		$icon = "<IMG src=\"images/admin/filemanager/webpage.gif\" alt=\"Web page\" border=\"0\">";
		$browse = "1";
		$raw = "1";
		$image = "0";
	    } else { 
		$icon = "<IMG src=\"images/admin/filemanager/text.gif\" alt=\"Unknown filetype\" border=\"0\">";
		$browse = "1";
		$raw = "1";
		$image = "0";
	    }
	    $filename=$basedir.$wdir.$file;
	    $fileurl=rawurlencode($wdir.$file);
	    $fileurl2=rawurlencode($udir.$wdir.$file);
	    $lastchanged = filectime($filename);
	    $changeddate = date("d-m-Y H:i:s", $lastchanged);
	    echo "<TR>";
	    echo "<TD align=\"center\" nobreak>";
	    if($raw == "1") {
		echo "<A HREF=\"admin.php?op=show&wdir=$wdir&file=$fileurl\">";
	    }
	    if($image == "1") {
		echo "<A HREF=\"admin.php?op=show&wdir=$wdir&file=$fileurl2&image=$image\">";
	    }
	    echo "$icon</TD>\n";
	    echo "<TD nobreak><font color=$textcolor2 size =\"-1\" face=\"arial, helvetica\">" . htmlspecialchars($file) . "</font></TD>\n";
	    echo "<TD align=\"right\" nobreak><font color=$textcolor2 size =\"-1\" face=\"arial, helvetica\">" . display_size($filename) . "</font></TD>";
	    echo "<TD align=\"middle\" nobreak><font color=$textcolor2 size =\"-1\" face=\"arial, helvetica\">" . $changeddate . "</font>";
	    echo "</TD><TD nobreak>";
	    echo " <A HREF=\"admin.php?op=move&wdir=$wdir&file=$fileurl\"><img src=\"images/admin/filemanager/move.gif\" alt=\"Move,rename or copy $file\" border=\"0\"></A> ";
	    echo " <A HREF=\"admin.php?op=touch&wdir=$wdir&touchfile=$fileurl\"><img src=\"images/admin/filemanager/touch.gif\" alt=\"Touch $file\" border=\"0\"></A> ";
	    echo "<A HREF=\"admin.php?op=del&wdir=$wdir&file=$fileurl\"><img src=\"images/admin/filemanager/delete.gif\" alt=\"Delete $file\" border=\"0\"></A> ";
	    if($browse == "1") {
		echo " <A HREF=\"$udir$wdir$file\"><img src=\"images/admin/filemanager/browse.gif\" alt=\"Browse\" border=\"0\"></A> ";
	    }
	    if($raw =="1") {
		echo " <A HREF=\"admin.php?op=edit&wdir=$wdir&file=$fileurl\"><img src=\"images/admin/filemanager/edit.gif\" alt=\"Edit\" border=\"0\"></A> ";
	    }
	}
    }
    echo "</TD></TR></TABLE>";
    echo "<table border=\"0\" width=\"100%\">";
    echo "<TR><TD colspan=\"2\"><hr></td>";
    echo "<TR><TD><font size =\"-1\" face=\"arial, helvetica\">Upload file</font></td><td>";
    echo "<FORM ENCTYPE=\"multipart/form-data\" METHOD=\"POST\" ACTION=\"admin.php\">";
    echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">";
    echo "<INPUT NAME=\"userfile\" TYPE=\"file\" size=\"40\">";
    echo "<INPUT TYPE=\"SUBMIT\" NAME=\"upload\" VALUE=\"Go!\"></FORM></TD></TR>";
    echo "<FORM METHOD=\"POST\" ACTION=\"admin.php\">";	
    echo "<TR><TD><font size =\"-1\" face=\"arial, helvetica\">Create directory</font></td><td>";
    echo "<INPUT TYPE=\"TEXT\" NAME=\"mkdirfile\" size=\"40\">";
    echo "<INPUT TYPE=\"HIDDEN\" name=\"op\" VALUE=\"mkdir\">";
    echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">";
    echo "<INPUT TYPE=\"SUBMIT\" NAME=\"mkdir\"  VALUE=\"Go!\"></FORM></TD></TR>";
    echo "<FORM METHOD=\"POST\" ACTION=\"admin.php\">";
    echo "<TR><TD><font size =\"-1\" face=\"arial, helvetica\">Create File</font></td><td>";
    echo "<INPUT TYPE=\"TEXT\" NAME=\"file\" size=\"40\">";
    echo "<INPUT TYPE=\"HIDDEN\" name=\"op\" VALUE=\"createfile\"> ";
    echo "<input type=\"checkbox\" name=\"html\" value=\"yes\"><font size =\"-2\" face=\"arial, helvetica\">&nbsp;(html template)</font> ";
    echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">";
    echo "<INPUT TYPE=\"SUBMIT\" NAME=\"createfile\" VALUE=\"Go!\">";
    echo "</FORM></TD></TR>";
    echo "</TABLE>";
    echo "<TABLE BORDER=\"0\" cellspacing=\"0\" cellpadding=\"1\" width=\"100%\">";
    echo "<tr>";
    echo "<th bgcolor=\"#CCCCCC\"><font color=\"555555\" size=1>PHP-Nuke File Manager is Based on <a href=http://www.suneworld.com>WebExplorer</a> and has been integrated with the author permission.</font></th>";
    echo "</tr></table>";
    CloseTable();
}

$basedir = dirname($SCRIPT_FILENAME);
$textrows = 20;
$textcols = 85;
$udir = dirname($PHP_SELF);
if(!$wdir) $wdir="/";
if($cancel) $op="FileManager";
if($upload) {
    copy($userfile,$basedir.$wdir.$userfile_name); 
    $lastaction = "".translate("Uploaded")." $userfile_name --> $wdir";
    include("header.php");
    GraphicAdmin($hlpfile);
    html_header();
    displaydir();
    $wdir2="/";
    chdir($basedir . $wdir2);
    CloseTable();
    include("footer.php");
    exit;
}

if($admintest) {

    switch($op) {

	case "YesDelCategory":
	    include("admin/stories.php");
	    break;

	case "DelCategory":
	    include("admin/stories.php");
	    break;
			
	case "NoMoveCategory":
	    include("admin/stories.php");
	    break;

	case "EditCategory":
	    include("admin/stories.php");
	    break;
	
	case "SaveEditCategory":
	    include("admin/stories.php");
	    break;

	case "AddCategory":
	    include("admin/stories.php");
	    break;

	case "SaveCategory":
	    include("admin/stories.php");
	    break;

	case "reviews":
	include("admin/reviews.php");
	break;

	case "mod_main":
	include("admin/reviews.php");
	break;

	case "add_review":
	include("admin/reviews.php");
	break;

	case "deleteNotice":
	deleteNotice($id, $table, $op_back);
	break;

		case "ForumConfigAdmin":
		        include ("admin/phpbbconfig.php");
			ForumConfigAdmin();
			break;

		case "ForumConfigChange":
		        include ("admin/phpbbconfig.php");
			ForumConfigChange($allow_html,$allow_bbcode,$allow_sig,$posts_per_page,$hot_threshold,$topics_per_page);
			break;

		case "RankForumAdmin":
		        include ("admin/phpbbrank.php");
			RankForumAdmin();
			break;
			
		case "RankForumEdit":
		        include ("admin/phpbbrank.php");
			RankForumEdit($rank_id);
			break;

		case "RankForumDel":
		        include ("admin/phpbbrank.php");
			RankForumDel($rank_id, $ok);
			break;

		case "RankForumAdd":
		        include ("admin/phpbbrank.php");
			RankForumAdd($rank_title,$rank_min,$rank_max,$rank_special);
			break;			

		case "RankForumSave":
		        include ("admin/phpbbrank.php");
			RankForumSave($rank_id, $rank_title, $rank_min, $rank_max, $rank_special);
			break;


		case "ForumGoAdd":
		        include ("admin/phpbbforum.php");
			ForumGoAdd($forum_name, $forum_desc, $forum_access, $forum_mod, $cat_id, $forum_type, $forum_pass);
			break;

		case "ForumGoSave":
		        include ("admin/phpbbforum.php");
			ForumGoSave($forum_id, $forum_name, $forum_desc, $forum_access, $forum_mod, $cat_id, $forum_type, $forum_pass);
			break;

		case "ForumCatDel":
		        include ("admin/phpbbforum.php");
			ForumCatDel($cat_id, $ok);
			break;

		case "ForumGoDel":
		        include ("admin/phpbbforum.php");
			ForumGoDel($forum_id, $ok);
			break;
			
		case "ForumCatSave":
		        include ("admin/phpbbforum.php");
			ForumCatSave($cat_id, $cat_title);
			break;

		case "ForumCatEdit":
		        include ("admin/phpbbforum.php");
			ForumCatEdit($cat_id);
			break;

		case "ForumGoEdit":
		        include ("admin/phpbbforum.php");
			ForumGoEdit($forum_id);
			break;
			
		case "ForumGo":
		        include ("admin/phpbbforum.php");
			ForumGo($cat_id,$ctg);
			break;

		case "ForumCatAdd":
		        include ("admin/phpbbforum.php");
			ForumCatAdd($catagories);
			break;

		case "ForumAdmin":
		        include ("admin/phpbbforum.php");
			ForumAdmin();
			break;

		case "DownloadDel":
		        include ("admin/download.php");
			DownloadDel($did, $ok);
			break;

		case "DownloadAdd":
		        include ("admin/download.php");
			DownloadAdd($dcounter, $durl, $dfilename, $dfilesize, $dweb, $duser, $dver, $dcategory, $sdcategory, $ddescription, $privs);
			break;
	
		case "DownloadSave":
		        include ("admin/download.php");
			DownloadSave($did, $dcounter, $durl, $dfilename, $dfilesize, $dweb, $duser, $ddate, $dver, $dcategory, $sdcategory, $ddescription, $privs);
			break;
	
		case "DownloadAdmin":
		        include ("admin/download.php");
			DownloadAdmin();
			break;
		
		case "DownloadEdit":
		        include ("admin/download.php");
			DownloadEdit($did);
			break;	

		case "FaqCatSave":
		        include ("admin/adminfaq.php");
			FaqCatSave($id_cat, $categories);
			break;

		case "FaqCatGoSave":
		        include ("admin/adminfaq.php");
			FaqCatGoSave($id, $question, $answer);
			break;

		case "FaqCatAdd":
		        include ("admin/adminfaq.php");
			FaqCatAdd($categories);
			break;

		case "FaqCatGoAdd":
		        include ("admin/adminfaq.php");
			FaqCatGoAdd($id_cat, $question, $answer);
			break;
			
		case "FaqCatEdit":
		        include ("admin/adminfaq.php");
			FaqCatEdit($id_cat);
			break;

		case "FaqCatGoEdit":
		        include ("admin/adminfaq.php");
			FaqCatGoEdit($id);
			break;

		case "FaqCatDel":
		        include ("admin/adminfaq.php");
			FaqCatDel($id_cat, $ok);
			break;

		case "FaqCatGoDel":
		        include ("admin/adminfaq.php");
			FaqCatGoDel($id, $ok);
			break;			

		case "FaqAdmin":
		        include ("admin/adminfaq.php");
			FaqAdmin();
			break;

		case "FaqCatGo":
		        include ("admin/adminfaq.php");
			FaqCatGo($id_cat);
			break;

	case "autoEdit":
	    include("admin/automated.php");
	    break;

	case "autoSaveEdit":
	    include("admin/automated.php");
	    break;
	
	case "autoDelete":
	    include("admin/automated.php");
	    break;

	case "QautoPreview":
	    include("admin/automated.php");
	    break;
			
	case "QautoStory":
	    include("admin/automated.php");
	    break;
			
	case "QautoSave":
	    include("admin/automated.php");
	    break;

	case "autoEdit":
	    include("admin/automated.php");
	    break;
		
	case "autoStory":
	    include("admin/automated.php");
	    break;
			
	case "autoSaveStory":
	    include("admin/automated.php");
	    break;
		
	case "autoPreviewStory":
	    include("admin/automated.php");
	    break;

	case "submissions":
	    include("admin/submissions.php");
	    break;
		
	case "HeadlinesDel":
	    include("admin/headlines.php");
	    break;
	
	case "HeadlinesAdd":
	    include("admin/headlines.php");
	    break;
	
	case "HeadlinesSave":
	    include("admin/headlines.php");
	    break;
	
	case "HeadlinesAdmin":
	    include("admin/headlines.php");
	    break;
		
	case "HeadlinesEdit":
	    include("admin/headlines.php");
	    break;
	
	case "Configure":
	    include("admin/settings.php");
	    break;
		
	case "ConfigSave":
	    include("admin/settings.php");
	    break;
	
	case "relatedsave":
	    include("admin/topics.php");
	    break;
		
	case "relatededit":
	    include("admin/topics.php");
	    break;
			
	case "relateddelete":
	    include("admin/topics.php");
	    break;
		
	case "Ephemeridsedit":
	    include("admin/ephemerids.php");
	    break;
	
	case "Ephemeridschange":
	    include("admin/ephemerids.php");
	    break;
			
	case "Ephemeridsdel":
	    include("admin/ephemerids.php");
	    break;
			
	case "Ephemeridsmaintenance":
	    include("admin/ephemerids.php");
	    break;
			
	case "Ephemeridsadd":
	    include("admin/ephemerids.php");
	    break;
			
	case "Ephemerids":
	    include("admin/ephemerids.php");
	    break;
			
	case "links":
	    include("admin/links.php");
	    break;

	case "LinksDelNew":
	    include("admin/links.php");
	    break;

	case "LinksAddCat":
	    include("admin/links.php");
	    break;

	case "LinksAddSubCat":
	    include("admin/links.php");
	    break;

	case "LinksAddLink":
	    include("admin/links.php");
	    break;
			
	case "LinksAddEditorial":
	    include("admin/links.php");
	    break;			
			
	case "LinksModEditorial":
	    include("admin/links.php");
	    break;	
			
	case "LinksLinkCheck":
	    include("admin/links.php");
	    break;	
		
	case "LinksValidate":
	    include("admin/links.php");
	    break;

	case "LinksDelEditorial":
	    include("admin/links.php");
	    break;						

	case "LinksCleanVotes":
	    include("admin/links.php");
	    break;	
			
	case "LinksListBrokenLinks":
	    include("admin/links.php");
	    break;

	case "LinksDelBrokenLinks":
	    include("admin/links.php");
	    break;
			
	case "LinksIgnoreBrokenLinks":
	    include("admin/links.php");
	    break;			
			
	case "LinksListModRequests":
	    include("admin/links.php");
	    break;		
			
	case "LinksChangeModRequests":
	    include("admin/links.php");
	    break;	
			
	case "LinksChangeIgnoreRequests":
	    include("admin/links.php");
	    break;
			
	case "LinksDelCat":
	    include("admin/links.php");
	    break;

	case "LinksModCat":
	    include("admin/links.php");
	    break;

	case "LinksModCatS":
	    include("admin/links.php");
	    break;

	case "LinksModLink":
	    include("admin/links.php");
	    break;

	case "LinksModLinkS":
	    include("admin/links.php");
	    break;

	case "LinksDelLink":
	    include("admin/links.php");
	    break;

	case "LinksDelVote":
	    include("admin/links.php");
	    break;			

	case "LinksDelComment":
	    include("admin/links.php");
	    break;

	case "BannersAdmin":
	    include("admin/banners.php");
	    break;

	case "BannersAdd":
	    include("admin/banners.php");
	    break;

	case "BannerAddClient":
	    include("admin/banners.php");
	    break;

	case "BannerFinishDelete":
	    include("admin/banners.php");
	    break;

	case "BannerDelete":
	    include("admin/banners.php");
	    break;

	case "BannerEdit":
	    include("admin/banners.php");
	    break;
		
	case "BannerChange":
	    include("admin/banners.php");
	    break;

	case "BannerClientDelete":
	    include("admin/banners.php");
	    break;

	case "BannerClientEdit":
	    include("admin/banners.php");
	    break;

	case "BannerClientChange":
	    include("admin/banners.php");
	    break;

	case "GraphicAdmin":
	    GraphicAdmin($hlpfile);
	    break;

	case "hreferer":
	    include("admin/referers.php");
	    break;

	case "delreferer":
	    include("admin/referers.php");
	    break;

	case "adminMain":
	    adminMain();
	    break;

	case "topicsmanager":
	    include("admin/topics.php");
	    break;

	case "topicedit":
	    include("admin/topics.php");
	    break;

		case "topicmake":
			include("admin/topics.php");
			break;

		case "topicdelete":
			include("admin/topics.php");
			break;

		case "topicchange":
			include("admin/topics.php");
			break;
		
		case "sections":
			include("admin/sections.php");
			break;

		case "sectionedit":
			include("admin/sections.php");
			break;

		case "sectionmake":
			include("admin/sections.php");
			break;

		case "sectiondelete":
			include("admin/sections.php");
			break;

		case "sectionchange":
			include("admin/sections.php");
			break;

		case "secarticleadd":
			include("admin/sections.php");
			break;
		
		case "secartedit":
			include("admin/sections.php");
			break;
			
		case "secartchange":
			include("admin/sections.php");
			break;
		
		case "secartdelete":
			include("admin/sections.php");
			break;
			
		case "rblocks":
			include("admin/rightblocks.php");
			break;

		case "makerblock":
			include("admin/rightblocks.php");
			break;

		case "deleterblock":
			include("admin/rightblocks.php");
			break;

		case "changerblock":
			include("admin/rightblocks.php");
			break;
			
		case "lblocks":
			include("admin/leftblocks.php");
			break;

		case "makelblock":
			include("admin/leftblocks.php");
			break;

		case "deletelblock":
			include("admin/leftblocks.php");
			break;

		case "changelblock":
			include("admin/leftblocks.php");
			break;
			
		case "ablock":
			include("admin/adminblock.php");
			break;

		case "changeablock":
			include("admin/adminblock.php");
			break;

		case "mblock":
			include("admin/mainblock.php");
			break;

		case "changemblock":
			include("admin/mainblock.php");
			break;

		case "DisplayStory":
			include("admin/stories.php");
			break;

		case "PreviewAgain":
			include("admin/stories.php");
			break;

		case "PostStory":
			include("admin/stories.php");
			break;

		case "EditStory":
			include("admin/stories.php");
			break;

		case "RemoveStory":
			include("admin/stories.php");
			break;

		case "RemoveComment":
			include("admin/comments.php");
			break;

		case "RemovePollComment":
			include("admin/comments.php");
			break;

		case "ChangeStory":
			include("admin/stories.php");
			break;

		case "DeleteStory":
			include("admin/stories.php");
			break;

		case "adminStory":
			include("admin/stories.php");
			break;

		case "PreviewAdminStory":
			include("admin/stories.php");
			break;

		case "PostAdminStory":
			include("admin/stories.php");
			break;
		
		case "mod_authors":
			include("admin/authors.php");
			break;
		
		case "modifyadmin":
			include("admin/authors.php");
			break;

		case "UpdateAuthor":
			include("admin/authors.php");
			break;

		case "AddAuthor":
			include("admin/authors.php");
			break;

		case "deladmin":
			include("admin/authors.php");
			break;

		case "deladminconf":
			include("admin/authors.php");
			break;

                case "mod_users":
			include("admin/users.php");
                        break;

                case "modifyUser":
			include("admin/users.php");
                        break;

                case "updateUser":
			include("admin/users.php");
                        break;

                case "delUser":
            		include("admin/users.php");        
                        break;

                case "delUserConf":
			include("admin/users.php");
                        break;

                case "addUser":
                        include("admin/users.php");
                        break;

		case "create":
			include("admin/polls.php");
			break;
		
		case "createPosted":
			include("admin/polls.php");
			break;

		case "poll_editPoll":
			include("admin/polls.php");
			break;

		case "ChangePoll":
			include("admin/polls.php");
			break;

		case "remove":
			include("admin/polls.php");
			break;

		case "removePosted":
			include("admin/polls.php");
			break;
    
		case "view": 
			include("admin/polls.php");
			break;

		case "viewPosted":
			include("admin/polls.php");
			break;

		case "logout":
			setcookie("admin");
			$titlebar = translate("Logged out");
			include("header.php");
			OpenTable3();
			echo "<center><font size=4>";
			echo translate("You are now logged out")."<br><br></center></font>";
			CloseTable();
			include("footer.php");
			break;

	case "FileManager":

		$lastaction = "".translate("Listing Diretory")."";
		$hlpfile = "manual/$language/filemanager.html";
		include("header.php");
		GraphicAdmin($hlpfile);
		html_header();
		displaydir();
		$wdir2="/";
		chdir($basedir . $wdir2);
		include("footer.php");
		break;

	case "root":
   		$wdir="/";
		$lastaction = "".translate("Changed to root directory")."";
		$hlpfile = "manual/$language/filemanager.html";
		include("header.php");
		GraphicAdmin($hlpfile);
		html_header();
		displaydir();
		include("footer.php");
		break;

	case "env":
   		$lastaction = "".translate("Displaying PHP environment")."";
		$hlpfile = "manual/$language/filemanager.html";
		include("header.php");
		GraphicAdmin($hlpfile);
		html_header();
		phpinfo();
		include("footer.php");
		break;

	case "chdr":
		$wdir=$file."/";
		$wdir = ereg_replace("\.\./", "", $wdir);
		$lastaction = "".translate("Changed directory to")." $wdir";
		$hlpfile = "manual/$language/filemanager.html";
		include("header.php");
		GraphicAdmin($hlpfile);
		html_header();
		displaydir();
		$wdir2="/";
		chdir($basedir . $wdir2);
		include("footer.php");
		break;

	case "touch":
		touch($basedir.$touchfile);
		$lastaction = "".translate("Touched")." $touchfile";
		$hlpfile = "manual/$language/filemanager.html";
		include("header.php");
		GraphicAdmin($hlpfile);
		html_header();
		displaydir();
		$wdir2="/";
		chdir($basedir . $wdir2);
		include("footer.php");
		break;

	case "del":

		if ($confirm)
			{
			if(is_dir($basedir.$file))
				{
				rmdir($basedir.$file);
				}
			else
				{
				unlink($basedir.$file);
				}
			$lastaction = "".translate("Deleted")." $file";
			$hlpfile = "manual/$language/filemanager.html";
			include("header.php");
			GraphicAdmin($hlpfile);
			html_header();
			displaydir();
			}
		else
			{
			$lastaction = "".translate("Are you sure you want to DELETE")."<br>$file?";
			$hlpfile = "manual/$language/filemanager.html";
			include("header.php");
			GraphicAdmin($hlpfile);
			html_header();
			echo "<center><b><font size =\"5\" face=\"arial, helvetica\"><A HREF=\"admin.php?op=del&wdir=$wdir&file=$file&confirm=1\">".translate("YES!")."</A></font><br>";
			echo "<p><font size =\"5\" face=\"arial, helvetica\"><A HREF=\"admin.php?wdir=$wdir\">".translate("NO!")."</A></font><br><b></center>";
			}
		$wdir2="/";
		chdir($basedir . $wdir2);
		CloseTable();
		include("footer.php");
		break;

	case "move":

		if($confirm && $newfile)
 			{
    			if(file_exists($basedir.$newfile))
				{
				$lastaction = "".translate("Destination file already exists. Aborted.")."";
				}
			else
				{
				if($do == copy)
					{
					copy($basedir.$file,$basedir.$newfile);
					$lastaction = "".translate("Copied")."\n$file --> $newfile";
					}
				else
					{
					rename($basedir.$file,$basedir.$newfile);
					$lastaction = "".translate("Moved/renamed")."\n$file --> $newfile";
					}
				}
		$hlpfile = "manual/$language/filemanager.html";
		include("header.php");
		GraphicAdmin($hlpfile);
			html_header();
			displaydir();
    			$wdir2="/";
			chdir($basedir . $wdir2);
			include("footer.php");
			}
		else
			{
			$lastaction = "".translate("Moving/renaming or copying")."<br>$file";
		$hlpfile = "manual/$language/filemanager.html";
		include("header.php");
		GraphicAdmin($hlpfile);
			html_header();
			echo "<FORM METHOD=\"POST\" ACTION=\"admin.php\">\n";
			echo "<select name=\"do\">";
			echo "<option value=\"copy\">".translate("Copy")."";
			echo "<option value=\"move\">".translate("Move/rename")."";
			echo "</select> ";
			echo "($file)";
			echo "<h4>To</h4>";
			echo "<INPUT TYPE=\"TEXT\" NAME=\"newfile\" value=\"$file\" size=\"40\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">\n";			
			echo "<INPUT TYPE=\"HIDDEN\" name=\"op\" VALUE=\"move\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"file\" VALUE=\"$file\">\n";
			echo "<p>";
			echo "<INPUT TYPE=\"SUBMIT\" NAME=\"confirm\" VALUE=\"Do\">\n";
			echo "<INPUT TYPE=\"SUBMIT\" NAME=\"cancel\" VALUE=\"Cancel\">\n";
			echo "</FORM>";
			CloseTable();
			include("footer.php");
			}
		break;

	case "edit":

		if($confirm && $file)
   			{
    			$lastaction = "".translate("Edited")." $file";
			$hlpfile = "manual/$language/filemanager.html";
			include("header.php");
			GraphicAdmin($hlpfile);
			html_header();
			$fp=fopen($basedir.$file,"w");
    			fputs($fp,stripslashes($code));
    			fclose($fp);
			displaydir();
			}
		else
			{
			$lastaction = "".translate("Editing")." $file";
			$hlpfile = "manual/$language/filemanager.html";
			include("header.php");
			GraphicAdmin($hlpfile);
			html_header();
			echo "<FORM METHOD=\"POST\" ACTION=\"admin.php\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"file\" VALUE=\"$file\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" name=\"op\" VALUE=\"edit\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">\n";
			$fp=fopen($basedir.$file,"r");
			$contents=fread($fp,filesize($basedir.$file));
			echo "<TEXTAREA NAME=\"code\" rows=\"$textrows\" cols=\"$textcols\">\n";
			echo htmlspecialchars($contents);
			echo "</TEXTAREA><BR>\n";
			echo "<center><INPUT TYPE=\"SUBMIT\" NAME=\"confirm\" VALUE=\"Save\">\n";
			echo "<INPUT TYPE=\"SUBMIT\" NAME=\"cancel\" VALUE=\"Cancel\"></center><BR>\n";
			echo "</FORM>\n";
			}
		CloseTable();
		include("footer.php");
		break;

	case "show":

		$filelocation = $wdir.$file;	
		$lastaction = "".translate("Displaying")." $file";
		$hlpfile = "manual/$language/filemanager.html";
		include("header.php");
		GraphicAdmin($hlpfile);
		html_header();
		if($image == "1")
			{
			echo "<center><img src=\"$file\"></center>";
			}
		else
			{
			show_source($basedir.$file);
			}
		CloseTable();
		include("footer.php");
		break;

	case "mkdir":

		if(file_exists($basedir.$wdir.$mkdirfile))
			{
			$lastaction = "".translate("The directory")." $wdir$mkdirfile ".translate("already exists.")."";
		$hlpfile = "manual/$language/filemanager.html";
		include("header.php");
		GraphicAdmin($hlpfile);
		html_header();
			}
		else
			{
			$lastaction = "".translate("Created the directory")." $wdir$mkdirfile";
			$hlpfile = "manual/$language/filemanager.html";
			include("header.php");
			GraphicAdmin($hlpfile);
			html_header();
			mkdir($basedir.$wdir.$mkdirfile,0750);
			}
		displaydir();
		$wdir2="/";
		chdir($basedir . $wdir2);
		include("footer.php");
		break;

	case "createfile":

		$filelocation = $wdir.$file;
		if($done == "1")
   			{
			$lastaction = "".translate("Created")." $file";
			$hlpfile = "manual/$language/filemanager.html";
			include("header.php");
			GraphicAdmin($hlpfile);
			html_header();
			$fp=fopen($basedir.$filelocation,"w");
			fputs($fp,stripslashes($code));
			fclose($fp);
			displaydir();
			}
		else
			{
   			if(file_exists($basedir.$filelocation))
   				{
   				$lastaction = "$file ".translate("already exists.")."";
				$hlpfile = "manual/$language/filemanager.html";
				include("header.php");
				GraphicAdmin($hlpfile);
				html_header();
				displaydir();
				}
			else
				{
				$lastaction = "".translate("Creating")." $file";
				$hlpfile = "manual/$language/filemanager.html";
				include("header.php");
				GraphicAdmin($hlpfile);
				html_header();
				echo "<FORM METHOD=\"POST\" ACTION=\"admin.php\">\n";
				echo "<INPUT TYPE=\"HIDDEN\" NAME=\"file\" VALUE=\"$file\">\n";
				echo "<INPUT TYPE=\"HIDDEN\" name=\"op\" VALUE=\"createfile\">\n";
				echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">\n";
				echo "<INPUT TYPE=\"HIDDEN\" NAME=\"done\" VALUE=\"1\">\n";				
				echo "<TEXTAREA NAME=\"code\" rows=\"$textrows\" cols=\"$textcols\">\n";
				if(isset($html))
					{
					echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\n";
					echo "<html>\n";
					echo "<head>\n";
					echo "<title>".translate("Untitled")."</title>\n";
					echo "</head>\n";
					echo "<body>\n\n\n\n";
					echo "</body>\n";
					echo "</html>";
					}
				echo "</TEXTAREA><BR>\n";
				echo "<center><INPUT TYPE=\"SUBMIT\" NAME=\"confirm\" VALUE=\"Create\">\n";
				echo "<INPUT TYPE=\"SUBMIT\" NAME=\"cancel\" VALUE=\"Cancel\"></center><BR>\n";
				echo "</FORM>";			
				CloseTable();
				}
			}
		$wdir2="/";
		chdir($basedir . $wdir2);
		include("footer.php");
		break;

	default:
		adminMain();
		break;
	}

} else {
	login();
}
?>