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

function ViewPage($id) {
    include("header.php");
    global $bgcolor1;
    mysql_query("update seccont set counter=counter+1 where artid='$id'");
    
    $result = mysql_query("select artid, secid, title, content, counter from seccont where artid=$id");
    list($id, $secid, $title, $content, $counter) = mysql_fetch_row($result);
        
    $words = sizeof(explode(" ", $content));
    echo "<center>";
    OpenTable3();
    echo "
    <font color=\"$bgcolor1\">
    <H2><b>$title</b></H2></font><br><br>
    $content
    </td></tr>
    <tr><td align=center>
    </font>";
    echo "
    <br><br><br><br>
    <font size=2>
    ($words ".translate("total words in this text)")."<br>
    (".translate("read:")." $counter ".translate("times").") &nbsp;&nbsp;
    <a href=\"page.php?op=printpage&id=$id\"><img src=\"images/print.gif\" border=0 Alt=\"" . translate("Printer Friendly Page")."\" width=15 height=11\"></a>";
    CloseTable();
    echo "</center>";
    mysql_free_result($result);
    include ('footer.php');
}

function PrintPage($id) {
    global $site_logo, $nuke_url, $sitename, $site_font, $datetime;
    $result=mysql_query("select title, content from seccont where artid=$id");
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
    <a href=$nuke_url/page.php?id=$id>$nuke_url/page.php?id=$id</a>
    </td></tr></table>
    </body>
    </html>
    ";
}

switch($op) {

    case "printpage":
    PrintPage($id);
    break;
        
    default:
    ViewPage($id);
    break;

}
?>
