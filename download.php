<?php

######################################################################
# PHP-NUKE: Web Portal System
# ===========================
#
# Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)
# http://phpnuke.org
#
# This modules is to show the downloads section for users
#
# Based on MyPHPortal (http://sourceforge.net/projects/myphportal)
#
# This program is free software. You can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License.
######################################################################

if (!isset($mainfile)) { include("mainfile.php"); }
$ipp = 20;


function callscript() {
echo "
<script>
<!--

NS4 = (document.layers) ? 1 : 0;
IE4 = (document.all) ? 1 : 0;

function show ( name ) {
  x = currentX;
  y = currentY + 20;
  if (NS4) {

    document.layers[name].xpos = parseInt ( x );
    document.layers[name].left = parseInt ( x );
    document.layers[name].ypos = parseInt ( y );
    document.layers[name].top = parseInt ( y );
    document.layers[name].visibility = \"show\";
  } else {
    document.all[name].style.left = parseInt ( x );
    document.all[name].style.top = parseInt ( y );
    document.all[name].style.visibility = \"visible\";
  }
}
function hide ( name ) {
  if (NS4) {
    document.layers[name].visibility = \"hide\";
  } else {
    document.all[name].style.visibility = \"hidden\";
  }
}

currentX = currentY = 0;

function grabEl(e) {
  if ( NS4 ) {
    currentX = e.pageX;
    currentY = e.pageY;
  } else {
    currentX = event.x;
    currentY = event.y;
  }
}

if ( NS4 ) {
  document.captureEvents(Event.MOUSEDOWN | Event.MOUSEMOVE);
}
document.onmousemove = grabEl;


//-->
</script>
";
}

function geninfo($did) {
    global $sitename, $PHP_SELF;
    $result = mysql_query("select dcounter, durl, dfilename, dfilesize, ddate, dweb, duser, dver, dcategory, ddescription from downloads where did='$did'");
    list($dcounter, $durl, $dfilename, $dfilesize, $ddate, $dweb, $duser, $dver, $dcategory, $ddescription) = mysql_fetch_row($result);
    include("header.php");
    OpenTable4();
    echo "
    <center><b>$sitename ".translate("File Information")."</b></center>\n
    <br><br><br>
    <b>".translate("Program Name").":</b> $dfilename<br><br>\n
    <b>".translate("File Size").":</b> " . PrettySize($dfilesize) . "<br><br>\n
    <b>".translate("Version").":</b> $dver<br><br>\n
    <b>".translate("Upload Date").":</b> $ddate<br><br>\n
    <b>".translate("Category").":</b> $dcategory<br><br>\n
    <b>".translate("Description").":</b> $ddescription<br><br>\n
    <b>".translate("Downloads").":</b> $dcounter<br><br>\n
    <b>".translate("Author").":</b> $duser<br><br>\n
    <b>".translate("HomePage").":</b> <a href=\"$dweb\" target=blank>$dweb</a><br><br><br>\n
    <center>[ <a href=\"$PHP_SELF?op=mydown&did=$did\">".translate("Download This File Now!")."</a> | <a href=\"javascript:history.go(-1)\">".translate("Go Back")."</a> ]</center>";
    CloseTable();
    include("footer.php");
}

function tlist() {
  global $sortby, $PHP_SELF, $dcategory;
  $cate = $dcategory;
  echo "<center>";
  OpenTable3();
  echo "<center><font size=2><b>".translate("Select Category Folder")."</b></font><br><br>\n";
  $acounter = mysql_query("SELECT count(*) FROM downloads");
  list($acount) = mysql_fetch_row($acounter);
  $result = mysql_query("select distinct dcategory, count(dcategory) from downloads group by dcategory order by dcategory desc");
  while (list($category, $dcount) = mysql_fetch_row($result)) {
    if ($category == $cate) {
	echo "&nbsp;&nbsp;&nbsp;<img src=\"images/download/folder_open.gif\" title=\"$category ($dcount)\" alt=\"$category ($dcount)\" border=\"0\"> <b>$category ($dcount)</b> \n";
    } else {
	$category2 = urlencode($category);
	echo "&nbsp;&nbsp;&nbsp;<A HREF=\"$PHP_SELF?dcategory=$category2&sortby=$sortby\"><img src=\"images/download/folder.gif\" title=\"$category ($dcount)\" alt=\"$category ($dcount)\" border=\"0\"> $category</a> ($dcount) \n";
    }
  }
  if (($cate == "All") OR ($cate == "")) {
	echo "<img src=\"images/download/folder_open.gif\" title=\"All Files ($acount)\" alt=\"".translate("All Files")." ($acount)\" border=\"0\"> <b>".translate("All")." ($acount)</b>\n";
  } else {
	echo "<A HREF=\"$PHP_SELF?dcategory=All&sortby=$sortby\"><img src=\"images/download/folder.gif\" title=\"All Files ($acount)\" alt=\"".translate("All Files")." ($acount)\" border=\"0\" height=\"20\" width=\"20\"> ".translate("All")."</a> ($acount)\n";
  }
}

function act_dl_tableheader($fieldname, $englishname) {
    global $dcategory, $sortby, $PHP_SELF;
    echo "<A HREF=\"$PHP_SELF?dcategory=$dcategory&sortby=$fieldname\"><img src=\"images/download/up.gif\" alt=\"Sort Ascending\" title=\"Sort Ascending\" border=\"0\" height=\"9\" width=\"15\"></a> <font size=\"2\">".translate("$englishname")."</font><A HREF=\"$PHP_SELF?dcategory=$dcategory&sortby=$fieldname&sortorder=DESC\"><img src=\"images/download/down.gif\" title=\"Sort Descending\" alt=\"".translate("Sort Descending")."\" border=\"0\" height=\"9\" width=\"15\"></a>";
}

function inact_dl_tableheader($fieldname, $englishname) {
  global $dcategory, $sortby, $PHP_SELF;
  echo "<A HREF=\"$PHP_SELF?dcategory=$dcategory&sortby=$fieldname\"><img src=\"images/download/up.gif\" alt=\"Sort Ascending\" title=\"Sort Ascending\" border=\"0\" height=\"9\" width=\"15\"></a> <A HREF=\"$PHP_SELF?dcategory=$dcategory&sortby=$fieldname\">".translate("$englishname")."</a><A HREF=\"$PHP_SELF?dcategory=$dcategory&sortby=$fieldname&sortorder=DESC\"><img src=\"images/download/down.gif\" title=\"".translate("Sort Descending")."\" alt=\"Sort Descending\" border=\"0\" height=\"9\" width=\"15\"></a>";
}

function dl_tableheader () {
    global $textcolor2, $bgcolor4;
    echo "</b></font></td><td bgcolor=$bgcolor4><font color=$textcolor2><b>";
}

function popuploader($did, $ddescription, $dcounter, $dfilename) {
 global $dcategory, $sortby, $PHP_SELF, $bgcolor1;
 echo "<center><A name=\"$did\"CLASS=\"entry\" href=\"$PHP_SELF?op=geninfo&did=$did\" onMouseOver=\"window.status='$dfilename'; show('entry-$did'); return true;\" onMouseOut=\"hide('entry-$did'); return true;\"><IMG src=\"images/download/info.gif\" border=\"0\" width=\"16\" height=\"16\" alt=\"\"></A>&nbsp;&nbsp;<a href=\"$PHP_SELF?op=mydown&did=$did\"><img src=\"images/download/download.gif\" border=0 Alt=\"Download Now!\"></a>";
 $res= "<DIV ID=\"entry-$did\" STYLE=\"position: absolute;z-index: 20; visibility: hidden; top: 0px; left: 0px;\">\n" .
       "  <TABLE BORDER=\"0\" WIDTH=\"300\">\n" .
       "   <TR><TD BGCOLOR=\"#000000\">\n" .
       "       <TABLE BORDER=\"0\" WIDTH=\"100%\" cellpadding=5>\n" .
       "         <TR>\n" .
       "          <TD BGCOLOR=\"$bgcolor1\">\n" .
       "            <IMG SRC=\"images/download/info.gif\" title=\"$did\" ALT=\"$did\" BORDER=\"0\" width=\"16\" height=\"16\" align=left>\n" .
       "            <FONT size=2>\n" .
       "               &nbsp;&nbsp;<b>$dfilename</b><br><br>\n" .
       "               <li>$ddescription\n" .
       "            </FONT>\n" .
       "            <IMG SRC=\"images/pix.gif\" ALT=\"\" BORDER=\"0\" width=\"200\" height=\"1\">\n" .
       "          </TD>\n" .
       "         </TR>\n" .
       "       </TABLE>\n".
       "     </TD></TR>\n" .
       "   </TABLE>\n" .
       "</DIV>\n";
  return $res;
}


function SortLinks() {
    global $textcolor2, $dcategory, $sortby, $PHP_SELF, $bgcolor4;
    echo "<font size=2 color=$textcolor2>
          <center><b>".translate("Info")."</b></center>
          </font></td><td bgcolor=$bgcolor4><font size=2 color=$textcolor2><b><center>";
        if ($sortby == "dfilename" OR !$sortby) {
            act_dl_tableheader(dfilename, Name);
        } else {
            inact_dl_tableheader(dfilename, Name);
        }
        echo "</center></b></font></td><td bgcolor=$bgcolor4><font size=2 color=$textcolor2><b><center>";
        if ($sortby == "dfilesize") {
            act_dl_tableheader(dfilesize, Size);
        } else {
            inact_dl_tableheader(dfilesize, Size);
        }
        echo "</center></b></font></td><td bgcolor=$bgcolor4><font size=2 color=$textcolor2><b><center>";
        if ($sortby == "dcategory") {
            act_dl_tableheader(dcategory, Category);
        } else {
            inact_dl_tableheader(dcategory, Category);
        }
        echo "</center></b></font></td><td bgcolor=$bgcolor4><font size=2 color=$textcolor2><b><center>";
        if ($sortby == "ddate") {
            act_dl_tableheader(ddate, "Date");
        } else {
            inact_dl_tableheader(ddate, "Date");
        }
	echo "</center></b></font></td><td bgcolor=$bgcolor4><font size=2 color=$textcolor2><b><center>";
        if ($sortby == "dver") {
            act_dl_tableheader(dver, "Version");
        } else {
            inact_dl_tableheader(dver, "Version");
        }
        echo "</center></b></font></td></tr>";
}


function listdownloads ($dcategory, $sortby, $sortorder) {
  global $PHP_SELF, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, $textcolor2, $ipp, $page;
  $dcategory = urldecode($dcategory);  
  $alldivs = "";
  if ($dcategory == "") { $dcategory = "All"; }
  if (!$sortby) { $sortby = "dfilename"; }
  if (($sortorder!="ASC") && ($sortorder!="DESC")) {
     $sortorder = "ASC";
  }
  echo "<br><br><br>".translate("Display filtered with")." <i>$dcategory</i> ".translate("sorted")." ";
  if ($sortorder=="ASC") {
    echo "<i>".translate("Ascending")."</i>";
  } else {
    echo "<i>".translate("Descending")."</i>";
  }
  
  if ($sortby == "dfilename") {
    $sortby2 = "".translate("Name")."";
  }
  if ($sortby == "dfilesize") { 
    $sortby2 = "".translate("File Size")."";
  }
  if ($sortby == "dcategory") {
    $sortby2 = "".translate("Category")."";
  }
  if ($sortby == "ddate") {
    $sortby2 = "".translate("Creation Date")."";
  }
  if ($sortby == "dver") {
    $sortby2 = "".translate("Version")."";
  }
  if ($sortby == "dcounter") {
    $sortby2 = "".translate("Downloads")."";
  }
 
  echo " ".translate("by")." <i>$sortby2</i>";
  CloseTable();  
  echo"<br><center>";
  OpenTable3();
  echo "<table border=0 width=100%><tr><td bgcolor=$bgcolor4>";
  sortlinks();
  if ($dcategory=="All") {
    $sql="SELECT count(*) FROM downloads";
  } else {
    $sql="SELECT count(*) FROM downloads WHERE dcategory='$dcategory'";
  }
  $result = mysql_query($sql);
  list($total) =  mysql_fetch_row($result);
  if ($total>$ipp) {
    $pages=ceil($total/$ipp);
    if ($page > $pages) { $page = $pages; }
    if (!$page) { $page=1; }
    $offset=($page-1)*$ipp;
  } else {
    $offset=0;
    $pages=1;
    $page=1;
  }
  if ($dcategory=="All") {
    $sql="SELECT * FROM downloads ORDER BY $sortby $sortorder limit $offset,$ipp";
  } else {
    $sql="SELECT * FROM downloads WHERE dcategory='$dcategory' ORDER BY $sortby $sortorder limit $offset, $ipp";
  }
  $result = mysql_query($sql);
  while(list($did, $dcounter, $durl, $dfilename, $dfilesize, $ddate, $dweb, $duser, $dver, $dcat, $ddescription, $dperm) = mysql_fetch_row($result)) {
	echo "<tr><td>";
        $tmpstr = popuploader($did, $ddescription, $dcounter, $dfilename);
        echo"</td><td><font size=2>
                              <a href=\"$PHP_SELF?op=mydown&did=$did\">$dfilename</a>
                           </td>
                           <td valign=\"bottom\" align=center><font size=2>
                              " . PrettySize($dfilesize) . "
                           </td>
                           <td valign=\"bottom\" align=center><font size=2>
                              $dcat
                           </td>
                           <td valign=\"bottom\" align=center><font size=2>
                              $ddate
			   </td>
                           <td valign=\"bottom\" align=center><font size=2>
                              $dver
			   </td>"; 
        if ($a) {
          $a = 0;
        } else {
          $a = 1;
        }
      $alldivs .= $tmpstr;
   }
   echo "</td></tr></table>";
   $dcategory = urlencode($dcategory);
   if ($pages > 1) {
      echo "<center>\n";
      $pcnt=1;
      echo "<br><center><hr noshade>";
      echo "<table cellpadding=5 cellspacing=0 border=0><tr>";
      if ($page > 1) {
          echo "<td align=center><b><a href=\"$PHP_SELF?dcategory=$dcategory&sortby=$sortby&sortorder=$sortorder&page=" . ($page-1) . "\"><img src=\"images/download/left.gif\" Alt=\"Previous Page\" border=0></a></b></td>";
      }
      while($pcnt < $page) {
         echo "<td align=center><b>[ <a href=\"$PHP_SELF?dcategory=$dcategory&sortby=$sortby&sortorder=$sortorder&page=$pcnt\">$pcnt</a> ]</b></td>";
         $pcnt++;
      }
      echo "<td align=center><b>[ $page ]</td>";
      $pcnt++;
      while($pcnt <= $pages) {
         echo "<td align=center><b>[ <a href=\"$PHP_SELF?dcategory=$dcategory&sortby=$sortby&sortorder=$sortorder&page=$pcnt\">$pcnt</a> ]</b></td>";
         $pcnt++;
      }
      if ($page < $pages) {
          echo "<td align=center><b><a href=\"$PHP_SELF?dcategory=$dcategory&sortby=$sortby&sortorder=$sortorder&page=" . ($page+1) . "\"><img src=\"images/download/right.gif\" Alt=\"Next Page\" border=0></a></b></td>\n";
      }
      echo "</tr></table>";
   }
   
  CloseTable(); 
//   echo "</td></tr></table>";
   echo $alldivs;
}

function preface() {
  global $bgcolor1, $bgcolor2, $bgcolor3, $textcolor1, $textcolor2, $sitename;
?>
<font color="#e13601" size="+1"><br>
Download Options</font>
<p><b>Choice of download category</b><br>
The following different type Firebird server downloads are available:</p>
<blockquote>
<b>Stable Build</b><br>
A build that has been successfully run through the complete tcs test suite
and has proved to be stable in operation environments.<br>
<br>
<b>Milestones</b><br>
A build that has a number of new features or bug fixes has proved to be stable
but has not necessarily been passed through the TCS test suite or been used
in an operational environment.<br>
<br>
<b>Nightly Build</b><br>
Nightly the latest source is checked out and the install packages rebuilt.
&nbsp;This provides the latest up to date bug fixes/features but should only
be used for experimentation since no testing has been performed.<br>
</blockquote>
<br>
<b>Choice of server architecture</b><br>
FirebirdSQL server comes in two models the classic architecture and a super
architecture. &nbsp;If you are new to FirebirdSQL then for Windows download
the super server (it is the only one available for win32) otherwise if you
are from a unix style platform start with the classic architecture which
is a little easier to experiment with and to learn the basics. &nbsp;Then
once you know a little more you will be able to determine which architecture
is best for&nbsp; your installation. &nbsp;From a functional point of view
both are equivalent and they are interchangable.
<blockquote>
<p><b>Classic</b><br>
The classic architecture allows for programs to directly open the database
file, It is architected to allow the same database to be opened by several
programs at once. &nbsp;The classic engine also allows remote connections
to local databases by providing an inetd or xinetd service (This spawns a
seperate task per user connection).</p>
<p><b>Super</b><b><br>
</b>The super server architecture provides a server process and client
process cannot directly open the database file and all SQL requests are done
via the server using a socket. &nbsp;The super server makes use of lightweight
theads to process the requests.<br>
</blockquote>
<p>
A complete list of all Firebird released files is available from our sourceforge
download site <a href="http://sourceforge.net/project/showfiles.php?group_id=9028">
here</a>.
</p>
<?php
}

function list_header() {
    global $textcolor2, $sortby, $PHP_SELF, $bgcolor4;
    echo "<font size=2 color=$textcolor2>
          <center><b>".translate("Info")."</b></center>
          </font></td><td bgcolor=$bgcolor4>";
#        echo "<font size=2 color=$textcolor2><b><center>";
        echo "<font size=\"2\">".translate("Name")."</font>";
        echo "</center></b></font></td><td bgcolor=$bgcolor4><font size=2 color=$textcolor2><b><center>";
        echo "<font size=\"2\">".translate("Version")."</font>";
      	echo "</center></b></font></td><td bgcolor=$bgcolor4><font size=2 color=$textcolor2><b><center>";
        echo "<font size=\"2\">".translate("Size")."</font>";
        echo "</center></b></font></td><td bgcolor=$bgcolor4><font size=2 color=$textcolor2><b><center>";
        echo "<font size=\"2\">".translate("Date")."</font>";
        echo "</center></b></font></td></tr>";
}

function emit_files ($dcategory) {
  global $PHP_SELF, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, $textcolor2, $ipp, $page;
  $alldivs = "";
  if ($dcategory == "") { $dcategory = "All"; }
  echo "<table border=0 width=100%><tr><td bgcolor=$bgcolor4>";
  list_header();
  if ($dcategory=="All") {
    $sql="SELECT * FROM downloads";
  } else {
    $sql="SELECT * FROM downloads WHERE dcategory='$dcategory' ";
  }
  $result = mysql_query($sql);
  while(list($did, $dcounter, $durl, $dfilename, $dfilesize, $ddate, $dweb, $duser, $dver, $dcat, $ddescription, $dperm) = mysql_fetch_row($result)) {
	echo "<tr><td>";
        $tmpstr = popuploader($did, $ddescription, $dcounter, $dfilename);
        echo"</td><td><font size=2>
             <a href=\"$PHP_SELF?op=mydown&did=$did\">$dfilename</a>
             </td>
             <td valign=\"bottom\" align=center><font size=2>
                $dver
    			   </td>
             <td valign=\"bottom\" align=center><font size=2>
                " . PrettySize($dfilesize) . "
             </td>
             <td valign=\"bottom\" align=center><font size=2>
               $ddate
     			   </td>";
        if ($a) {
          $a = 0;
        } else {
          $a = 1;
        }
      $alldivs .= $tmpstr;
   }
   echo "</td></tr></table>";
   $dcategory = urlencode($dcategory);
   if ($pages > 1) {
      echo "<center>\n";
      $pcnt=1;
      echo "<br><center><hr noshade>";
      echo "<table cellpadding=5 cellspacing=0 border=0><tr>";
      if ($page > 1) {
          echo "<td align=center><b><a href=\"$PHP_SELF?dcategory=$dcategory&sortby=$sortby&sortorder=$sortorder&page=" . ($page-1) . "\"><img src=\"images/download/left.gif\" Alt=\"Previous Page\" border=0></a></b></td>";
      }
      while($pcnt < $page) {
         echo "<td align=center><b>[ <a href=\"$PHP_SELF?dcategory=$dcategory&sortby=$sortby&sortorder=$sortorder&page=$pcnt\">$pcnt</a> ]</b></td>";
         $pcnt++;
      }
      echo "<td align=center><b>[ $page ]</td>";
      $pcnt++;
      while($pcnt <= $pages) {
         echo "<td align=center><b>[ <a href=\"$PHP_SELF?dcategory=$dcategory&sortby=$sortby&sortorder=$sortorder&page=$pcnt\">$pcnt</a> ]</b></td>";
         $pcnt++;
      }
      if ($page < $pages) {
          echo "<td align=center><b><a href=\"$PHP_SELF?dcategory=$dcategory&sortby=$sortby&sortorder=$sortorder&page=" . ($page+1) . "\"><img src=\"images/download/right.gif\" Alt=\"Next Page\" border=0></a></b></td>\n";
      }
      echo "</tr></table>";
   }
   echo "<p>";
   echo $alldivs;
}

function emit_sections() {
  global $sortby, $PHP_SELF, $dcategory;
  $cate = $dcategory;
  $result = mysql_query("select distinct dcategory from downloads group by dcategory order by dcategory desc");
  while (list($category) = mysql_fetch_row($result)) {
  	echo "<b>$category </b><br>\n";
  	emit_files($category);
  }
}

function main() {
  global $PHP_SELF, $query, $min, $sortbyname, $dcategory, $sortby, $bgcolor1, $bgcolor2, $bgcolor3, $textcolor1, $textcolor2, $sortorder, $sitename;
  include("header.php");
  callscript();
  OpenTable3();
  echo "<center><b><font size=2>$sitename ".translate("Download Section")."</font></b></center>";
  preface();
  echo "<br>";
  if ($dcategory == "") { $dcategory = "Stable Builds";}
#  tlist();
#  listdownloads($dcategory, $sortby, $sortorder);
  emit_sections();
  CloseTable();
  include("footer.php");
}

function transferfile($did) {
  global $PHP_SELF;
  if (function_exists(dbconnect)) { dbconnect(); }
  $result = mysql_query("select dcounter, durl from downloads where did='$did'");
  list($dcounter, $durl) = mysql_fetch_row($result);
  if(!$durl) {
     include("header.php");
     echo "<center>\n
             <b>".translate("There is no such file...")."</b>\n
          </center>\n";
     include("footer.php");
  } else {
     $dcounter++;
     mysql_query("update downloads set dcounter='$dcounter' where did='$did'");
     Header("Location: $durl");
  }
}

function PrettySize($size) {
    $mb = 1024*1024;
    if ( $size > $mb ) {
        $mysize = sprintf ("%01.2f",$size/$mb) . " MB";
    }
    elseif ( $size >= 1024 ) {
        $mysize = sprintf ("%01.2f",$size/1024) . " Kb";
    }
    else {
        $mysize = $size . " bytes";
    }
    return $mysize;
}

switch($op) {

        case "main":
                main();
                break;

        case "mydown":
                transferfile($did);
                break;

	case "geninfo":
		geninfo($did);
		break;

        default:
                main();
                break;
}

?>
