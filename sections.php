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

if(!isset($mainfile)) { include("mainfile.php"); }

function listsections() {
    global $sitename;
    include ('header.php');
    $result = mysql_query("select secid, secname, image from sections order by secname");
    OpenTable3();
    echo "
    <center>
    ".translate("Welcome to the Special Sections at")." $sitename.<br><br>
    ".translate("Here you can find some cool articles not presents in the Home.")."
    <br><br>
    <table border=0>";
    $count = 0;
    while (list($secid, $secname, $image) = mysql_fetch_row($result)) {
        if ($count==2) {
        echo "<tr>";
        $count = 0;
        }
        echo "<td><a href=sections.php?op=listarticles&secid=$secid><img src=images/sections/$image border=0 Alt=\"$secname\"></a>";
        $count++;
        if ($count==2) {
        echo "</tr>";
        }
        echo "</td>";
    }
    mysql_free_result($result);
    echo "</table></center>";
    CloseTable();
    include ('footer.php');
}

function listarticles($secid) {
    include ('header.php');
    $result = mysql_query("select secname from sections where secid=$secid");
    list($secname) = mysql_fetch_row($result);
    mysql_free_result($result);
    $result = mysql_query("select artid, secid, title, content, counter from seccont where secid=$secid");
    OpenTable3();
    echo "<center>";
    $result2 = mysql_query("select image from sections where secid=$secid");
    list($image) = mysql_fetch_row($result2);
    echo "<center><img src=images/sections/$image border=0><br><br>
    <font size=3>
    ".translate("This is Section")." <b>$secname</b>.<br>".translate("Following are the articles published under this section.")."
    <br><br>
    <table border=0>";
    while (list($artid, $secid, $title, $content, $counter) = mysql_fetch_row($result)) {
        echo "
        <tr><td align=left nowrap><b><font size=2>
        <li><a href=\"sections.php?op=viewarticle&artid=$artid\">$title</a> (".translate("read:")." $counter ".translate("times").")
        <a href=\"sections.php?op=printpage&artid=$artid\"><img src=\"images/print.gif\" border=0 Alt=\"" . translate("Printer Friendly Page")."\" width=15 height=11\"></a>
        </b></td></tr>
        ";    
    }
    echo "</table>
    <br><br><br><b>
    [ <a href=sections.php>".translate("Return to Sections Index")."</a> ]
    </b></center>";
    CloseTable();
    mysql_free_result($result);
    include ('footer.php');
}

function viewarticle($artid) {
    include("header.php");
    mysql_query("update seccont set counter=counter+1 where artid='$artid'");
    
    $result = mysql_query("select artid, secid, title, content, counter from seccont where artid=$artid");
    list($artid, $secid, $title, $content, $counter) = mysql_fetch_row($result);
        
    $result2 = mysql_query("select secid, secname from sections where secid=$secid");
    list($secid, $secname) = mysql_fetch_row($result2);
    $words = sizeof(explode(" ", $content));
    echo "<center>";
    OpenTable3();
    echo "
    <font size=3>
    <b>$title</b></font><br>
    <font size=2>
    ($words ".translate("total words in this text)")."<br>
    (".translate("read:")." $counter ".translate("times").") &nbsp;&nbsp;
    <a href=\"sections.php?op=printpage&artid=$artid\"><img src=\"images/print.gif\" border=0 Alt=\"" . translate("Printer Friendly Page")."\" width=15 height=11\"></a>
    <br><br><br><br>
    $content
    </td></tr>
    <tr><td align=center>
    [ <a href=sections.php?op=listarticles&secid=$secid>".translate("Back to")." $secname</a> |
    <a href=sections.php>".translate("Sections Index")."</a> ]
    </font>";
    CloseTable();
    echo "</center>";
    mysql_free_result($result);
    mysql_free_result($result2);
    include ('footer.php');
}

function PrintSecPage($artid) {
    global $site_logo, $nuke_url, $sitename, $site_font, $datetime;
    $result=mysql_query("select title, content from seccont where artid=$artid");
    list($title, $content) = mysql_fetch_row($result);
    echo "
    <html>
    <head><title>$sitename</title></head>
    <body bgcolor=FFFFFF text=000000>
    <table border=0><tr><td>
    <table border=0 width=640 cellpadding=0 cellspacing=1 bgcolor=000000><tr><td>
    <table border=0 width=640 cellpadding=20 cellspacing=1 bgcolor=FFFFFF><tr><td>
    <center>
    <img src=images/$site_logo border=0><br><br>
    <font face=$site_font size=+2>
    <b>$title</b><br>
    </center><font size=2>
    $content<br><br>";
    CloseTable();
    echo "
    <br><br><center>
    <font face=$site_font size=2>
    ".translate("This article comes from")." $sitename<br>
    <a href=$nuke_url>$nuke_url</a><br><br>
    ".translate("The URL for this story is:")."<br>
    <a href=$nuke_url/sections.php?artid=$artid>$nuke_url/sections.php?artid=$artid</a>
    </td></tr></table>
    </body>
    </html>
    ";
}

switch($op) {

    case "viewarticle":
    viewarticle($artid);
    break;

    case "listarticles":
    listarticles($secid);
    break;

    case "printpage":
    PrintSecPage($artid);
    break;
        
    default:
    listsections();
    break;

}
?>
