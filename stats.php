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

if (!isset($mainfile)) { include("mainfile.php"); }
include("header.php");

function ServerInfo() {

$time = (exec("date"));
$uptime_info = "Uptime:" . trim(exec("uptime")) . "\n\n";
$memory_info = ". " . round(filesize("/proc/kcore") / 1024 / 1024) . "  MB\n";
$cpuinfo = file("/proc/cpuinfo");
for ($i = 0; $i < count($cpuinfo); $i++) {
                list($item, $data) = split(":", $cpuinfo[$i], 2);
                $item = chop($item);
                $data = chop($data);
                if ($item == "processor") {
                                $total_cpu++;
                                $cpu_info = $total_cpu;
                }
                if ($item == "vendor_id") { $cpu_info .= $data; }
                if ($item == "model name") { $cpu_info .= $data; }
                if ($item == "cpu MHz") {
                                $cpu_info .= " " . floor($data);
                                $found_cpu = "yes";
                }
                if ($item == "cache size") { $cache = $data;}
                if ($item == "bogomips") { $bogomips = $data;}
}
if($found_cpu != "yes") { $cpu_info .= " <b>unknown</b>"; }
$cpu_info .= " MHz Processor(s)\n";
$meminfo = file("/proc/meminfo");
for ($i = 0; $i < count($meminfo); $i++) {
                list($item, $data) = split(":", $meminfo[$i], 2);
                $item = chop($item);
                $data = chop($data);
                if ($item == "MemTotal") { $total_mem =$data;        }
                if ($item == "MemFree") { $free_mem = $data; }
                if ($item == "SwapTotal") { $total_swap = $data; }
                if ($item == "SwapFree") { $free_swap = $data; }
                if ($item == "Buffers") { $buffer_mem = $data; }
                if ($item == "Cached") { $cache_mem = $data; }
                if ($item == "MemShared") {$shared_mem = $data; }
}
$used_mem = ( $total_mem - $free_mem );
$used_swap = ( $total_swap - $free_swap );
$percent_free = round( $free_mem / $total_mem * 100 );
$percent_used = round( $used_mem / $total_mem * 100 );
$percent_swap = round( ( $total_swap - $free_swap ) / $total_swap * 100 );
$percent_swap_free = round( $free_swap / $total_swap * 100 );
$percent_buff = round( $buffer_mem / $total_mem * 100 );
$percent_cach = round( $cache_mem / $total_mem * 100 );
$percent_shar = round( $shared_mem / $total_mem * 100 );
exec ("df", $x);
$sicount = 1;
while ($sicount < sizeof($x)) {
                list($drive[$sicount], $size[$sicount], $used[$sicount], $avail[$sicount], $percent[$sicount], $mount[$sicount]) = split(" +", $x[$sicount]);
                $percent_part[$sicount] = str_replace( "%", "", $percent[$sicount] );
$sicount++;
}

    echo "<TABLE CELLSPACING=0 CELLPADDING=2 BORDER=0 BGCOLOR=$bgcolor2><TR><TD>";
    echo "<TABLE CELLSPACING=0 CELLPADDING=3 BORDER=0 BGCOLOR=FFFFFF><tr><td colspan=2 bgcolor=$bgcolor1";
    echo "<font color=$textcolor2><center><b>".translate("Server Info")."</b></center></font></td></tr>";
    echo "<tr><td><font color=$textcolor2>";
    echo "".translate("Local Time:")." $time<br>";
    echo "".translate("Uptime:")." $uptime_info<br><br>";
    echo "".translate("CPU Type:")." $cpu_info<br>";
    echo "".translate("Level II Cache:")." $cache<br>";
    echo "".translate("RAM Installed:")." $memory_info</b><br>";
    echo "".translate("Bogomips:")." $bogomips<br><br>";
    echo "<center><font size=2>".translate("Memory Status")."<br></font>";
    echo "<table width=100% border=0><tr><td>";
    echo "<div align=center>";
    echo "<table border=1 bgcolor=#D3D3D3><tr><td></td></tr><tr><td>";
    echo "<table cellspacing=5 border=0><tr><td></td><td align=CENTER>";
    echo "<font size=-1>".translate("Total")."</font>";
    echo "</td><td align=CENTER>";
    echo "<font size=-1>".translate("Usage")."</font>";
    echo "</td><td align=CENTER>";
    echo "<font size=-1>%</font>";
    echo "</td></tr><tr><td>";
    echo "<font size=-1>".translate("Used:")."</font>";
    echo "</td><td>";
    echo "<font color=#800000 size=1>$used_mem</font>";
    echo "</td><td>";
    echo "<img src=\"images/stats/bar4.gif\" height=11 width=$percent_used>";
    echo "</td><td>";
    echo "<font color=#800000 size=1>$percent_used</font>";
    echo "<font color=#800000 size=1>%</font>";
    echo "</td></tr>";
    echo "<tr><td>";
    echo "<font size=-1>".translate("Free")."</font>";
    echo "</td><td>";
    echo "<font color=#800000 size=1>$free_mem</font>";
    echo "</td><td>";
    echo "<img src=\"images/stats/bar1.gif\" height=11 width=$percent_free>";
    echo "</td><td>";
    echo "<font color=#800000 size=1>$percent_free</font>";
    echo "<font color=#800000 size=1>%</font>";
    echo "</td></tr><tr>";
    echo "<td>";
    echo "<font size=-1>".translate("buffered")."</font>";
    echo "</td>";
    echo "<td>";
    echo "<font color=#800000 size=1>$buffer_mem</font>";
    echo "</td>";
    echo "<td>";
    echo "<img src=\"images/stats/bar2.gif\" height=11 width=$percent_buff>";
    echo "</td>";
    echo "<td>";
    echo "<font color=#800000 size=1>$percent_buff</font>";
    echo "<font color=#800000 size=1>%</font>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<font size=-1>".translate("cached")."</font>";
    echo "</td>";
    echo "<td>";
    echo "<font color=#800000 size=1>$cache_mem</font>";
    echo "</td>";
    echo "<td>";
    echo "<img src=\"images/stats/bar5.gif\" height=11 width=$percent_cach>";
    echo "</td>";
    echo "<td>";
    echo "<font color=#800000 size=1>$percent_cach</font>";
    echo "<font color=#800000 size=1>%</font>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</div><br><br";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>".translate("Swap Status")."</font><BR>";
    echo "<table width=100% border=0>";
    echo "<tr>";
    echo "<td>";
    echo "<div align=center>";
    echo "<table border=1 bgcolor=#D3D3D3>";
    echo "<tr>";
    echo "<td>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<table cellspacing=5 border=0>";
    echo "<tr>";
    echo "<td>";
    echo "</td>";
    echo "<td>";
    echo "<font size=-1>".translate("Total:")."</font>";
    echo "</td>";
    echo "<td>";
    echo "<font size=-1>".translate("Usage:")."</font>";
    echo "</td>";
    echo "<td>";
    echo "<font size=-1>%</font>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<font size=-1>".translate("Used:")."</font>";
    echo "</td>";
    echo "<td>";
    echo "<font color=#800000 size=1>$used_swap</font>";
    echo "</td>";
    echo "<td>";
    echo "<img src=\"images/stats/bar4.gif\" height=11 width=$percent_swap>";
    echo "</td>";
    echo "<td>";
    echo "<font color=#800000 size=1>$percent_swap</font>";
    echo "<font color=#800000 size=1>%</font>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<font size=-1>".translate("Free:")."</font>";
    echo "</td>";
    echo "<td>";
    echo "<font color=#800000 size=1>$free_swap</font>";
    echo "</td>";
    echo "<td>";
    echo "<img src=\"images/stats/bar1.gif\" height=11 width=$percent_swap_free>";
    echo "</td>";
    echo "<td>";
    echo "<font color=#800000 size=1>$percent_swap_free</font>";
    echo "<font color=#800000 size=1>%</font>";
    echo "</td>";
    echo "</tr>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</div><br><br>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>".translate("Partitions Status")."</font><BR>";
    echo "<table width=100% border=0>";
    echo "<tr>";
    echo "<td>";
    echo "<div align=center>";
    echo "<table border=1 bgcolor=#D3D3D3>";
    echo "<tr>";
    echo "<td>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<table cellspacing=5 border=1>";
    echo "<tr>";
    echo "<td><font size=-1>".translate("Mount")."</font></td>";
    echo "<td><font size=-1>".translate("Size")."</font></td>";
    echo "<td><font size=-1>".translate("Free")."</font></td>";
    echo "<td><font size=-1>".translate("Used")."</font></td>";
    echo "<td width=100><font size=-1>".translate("Usage")."</font></td>";
    echo "<td><font size=-1>".translate("Percent")."</font></td>";
    echo "</tr>";
    $count=1;
    while ($count < sizeof($x)) {
                print("<tr>");
                echo "<td><font size=-1>$mount[$count]</font></td><td><font color=#800000 size=1>$size[$count]</font></td><td><font color=#800000 size=1>$avail[$count]</font></td><td><font color=#800000 size=1>$used[$count]</font></td><td><img src=\"images/stats/bar$count.gif\" height=11 width=$percent_part[$count]></td><td><font color=#800000 size=1>$percent[$count]</font></td></tr>";
                $count++;
    }
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</div><br><br>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</TD></TR></TABLE>";
    echo "</TD></TR></TABLE>";
    echo "<br><br></center>";
}


$dkn = mysql_query("select type, var, count from counter order by type desc");
if (!$dkn) { echo mysql_errno(). ": ".mysql_error(). "<br>";	exit(); }
while(list($type, $var, $count) = mysql_fetch_row($dkn)) {
	if(($type == "total") && ($var == "hits")) {
		$total = $count;
	} elseif($type == "browser") {
		if($var == "Netscape") {
			$netscape[] = $count;
			$netscape[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "MSIE") {
			$msie[] = $count;
			$msie[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "Konqueror") {
			$konqueror[] = $count;
			$konqueror[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "Opera") {
			$opera[] = $count;
			$opera[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "Lynx") {
			$lynx[] = $count;
			$lynx[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "WebTV") {
			$webtv[] = $count;
			$webtv[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "Bot") {
			$bot[] = $count;
			$bot[] =  substr(100 * $count / $total, 0, 5);
		} elseif(($type == "browser") && ($var == "Other")) {
			$b_other[] = $count;
			$b_other[] =  substr(100 * $count / $total, 0, 5);
		}
	} elseif($type == "os") {
		if($var == "Windows") {
			$windows[] = $count;
			$windows[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "Mac") {
			$mac[] = $count;
			$mac[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "Linux") {
			$linux[] = $count;
			$linux[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "FreeBSD") {
			$freebsd[] = $count;
			$freebsd[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "SunOS") {
			$sunos[] = $count;
			$sunos[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "IRIX") {
			$irix[] = $count;
			$irix[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "BeOS") {
			$beos[] = $count;
			$beos[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "OS/2") {
			$os2[] = $count;
			$os2[] =  substr(100 * $count / $total, 0, 5);
		} elseif($var == "AIX") {
			$aix[] = $count;
			$aix[] =  substr(100 * $count / $total, 0, 5);
		} elseif(($type == "os") && ($var == "Other")) {
			$os_other[] = $count;
			$os_other[] =  substr(100 * $count / $total, 0, 5);
		}
	}
}

echo "<center>".translate("We received")." <b>$total</b> ".translate("page views since")." $startdate<br><br>";

echo "<TABLE CELLSPACING=0 CELLPADDING=2 BORDER=0 BGCOLOR=$bgcolor2><TR><TD>";
echo "<TABLE CELLSPACING=0 CELLPADDING=3 BORDER=0 BGCOLOR=FFFFFF><tr><td colspan=2 bgcolor=$bgcolor1>";
echo "<font color=$textcolor1><center><b>".translate("Browsers")."</b></center></td></tr>";
echo "<tr><td><font color=$textcolor2><img src=images/stats/explorer.gif border=0>&nbsp;MSIE: </td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"Internet Explorer\"><img src=\"images/mainbar.gif\" Alt=\"Internet Explorer\" height=14 width=", $msie[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"Internet Explorer\"> $msie[1] % ($msie[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/netscape.gif border=0>&nbsp;Netscape: </td>";
echo "<td><font color=$textcolor2><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"Netscape\"><img src=\"images/mainbar.gif\" Alt=\"Netscape\" height=14 width=", $netscape[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"Netscape\"> $netscape[1] % ($netscape[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/opera.gif border=0>&nbsp;Opera: </td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"Opera\"><img src=\"images/mainbar.gif\" Alt=\"Opera\" height=14 width=", $opera[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"Opera\"> $opera[1] % ($opera[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/webtv.gif border=0>&nbsp;WebTV: </td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"WebTV\"><img src=\"images/mainbar.gif\" Alt=\"WebTV\" height=14 width=", $webtv[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"WebTV\"> $webtv[1] % ($webtv[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/konqueror.gif border=0>&nbsp;Konqueror: </td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"Konqueror\"><img src=\"images/mainbar.gif\" Alt=\"Konqueror (KDE)\" height=14 width=", $konqueror[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"Konqueror\"> $konqueror[1] % ($konqueror[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/lynx.gif border=0>&nbsp;Lynx: </td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"Lynx\"><img src=\"images/mainbar.gif\" Alt=\"Lynx\" height=14 width=", $lynx[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"Lynx\"> $lynx[1] % ($lynx[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/altavista.gif border=0>&nbsp;".translate("Search Engines").": </td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"Robots - Spiders - Buscadores\"><img src=\"images/mainbar.gif\" Alt=\"Robots - Spiders - Buscadores\" height=14 width=", $bot[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"".translate("Robots - Spiders")."\"> $bot[1] % ($bot[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/question.gif border=0>&nbsp;".translate("Unknown").": </td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"Otros - Desconocidos\"><img src=\"images/mainbar.gif\" Alt=\"Otros - Desconocidos\" height=14 width=", $b_other[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"Otros - Desconocidos\"> $b_other[1] % ($b_other[0])";
echo "</FONT>";
echo "</TD></TR></TABLE>";
echo "</TD></TR></TABLE>";
echo "<br><br><center>";
echo "<TABLE CELLSPACING=0 CELLPADDING=2 BORDER=0 BGCOLOR=$bgcolor2><TR><TD>";
echo "<TABLE CELLSPACING=0 CELLPADDING=3 BORDER=0 BGCOLOR=FFFFFF><tr><td colspan=2 bgcolor=$bgcolor1>";
echo "<font color=$textcolor1><center><b>".translate("Operating Systems")."</b></center></font></td></tr>";
echo "<tr><td><font color=$textcolor2><img src=images/stats/windows.gif border=0>&nbsp;Windows:</td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"Windows\"><img src=\"images/mainbar.gif\" Alt=\"Windows\" height=14 width=", $windows[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"Windows\"> $windows[1] % ($windows[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/linux.gif border=0>&nbsp;Linux:</td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"Linux\"><img src=\"images/mainbar.gif\" Alt=\"Linux\" height=14 width=", $linux[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"Linux\"> $linux[1] % ($linux[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/mac.gif border=0>&nbsp;Mac/PPC:</td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"Mac/PPC\"><img src=\"images/mainbar.gif\" Alt=\"Mac - PPC\" height=14 width=", $mac[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"Mac/PPC\"> $mac[1] % ($mac[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/bsd.gif border=0>&nbsp;FreeBSD:</td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"FreeBSD\"><img src=\"images/mainbar.gif\" Alt=\"FreeBSD\" height=14 width=", $freebsd[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"FreeBSD\"> $freebsd[1] % ($freebsd[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/sun.gif border=0>&nbsp;SunOS:</td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"SunOS\"><img src=\"images/mainbar.gif\" Alt=\"SunOS\" height=14 width=", $sunos[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"SunOS\"> $sunos[1] % ($sunos[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/irix.gif border=0>&nbsp;IRIX:</td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"SGI Irix\"><img src=\"images/mainbar.gif\" Alt=\"SGI Irix\" height=14 width=", $irix[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"SGI Irix\"> $irix[1] % ($irix[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/be.gif border=0>&nbsp;BeOS:</td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"BeOS\"><img src=\"images/mainbar.gif\" Alt=\"BeOS\" height=14 width=", $beos[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"BeOS\"> $beos[1] % ($beos[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/os2.gif border=0>&nbsp;OS/2:</td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"OS/2\"><img src=\"images/mainbar.gif\" Alt=\"OS/2\" height=14 width=", $os2[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"OS/2\"> $os2[1] % ($os2[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/aix.gif border=0>&nbsp;AIX:</td><td><font color=$textcolor2><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"AIX\"><img src=\"images/mainbar.gif\" Alt=\"AIX\" height=14 width=", $aix[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"AIX\"> $aix[1] % ($aix[0])</td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/question.gif border=0>&nbsp;".translate("Unknown").":</td><td><img src=\"images/leftbar.gif\" height=14 width=7 Alt=\"Otros - Desconocidos\"><img src=\"images/mainbar.gif\" ALt=\"Otros - Desconocidos\" height=14 width=", $os_other[1] * 2, "><img src=\"images/rightbar.gif\" height=14 width=7 Alt=\"Otros - Desconocidos\"> $os_other[1] % ($os_other[0])";
echo "</FONT>";
echo "</TD></TR></TABLE>";
echo "</TD></TR></TABLE>";
echo "<br><br><center>";

$result = mysql_query("select * from users");
$unum = mysql_num_rows($result);
$result = mysql_query("select * from authors");
$anum = mysql_num_rows($result);
$result = mysql_query("select * from stories");
$snum = mysql_num_rows($result);
$result = mysql_query("select * from comments");
$cnum = mysql_num_rows($result);
$result = mysql_query("select * from sections");
$secnum = mysql_num_rows($result);
$result = mysql_query("select * from seccont");
$secanum = mysql_num_rows($result);
$result = mysql_query("select * from queue");
$subnum = mysql_num_rows($result);
$result = mysql_query("select * from topics");
$tnum = mysql_num_rows($result);
$result = mysql_query("select * from links_links");
$links = mysql_num_rows($result);
$result = mysql_query("select * from links_categories");
$cat1 = mysql_num_rows($result);
$result = mysql_query("select * from links_subcategories");
$cat2 = mysql_num_rows($result);
$cat = $cat1+$cat2;

echo "<TABLE CELLSPACING=0 CELLPADDING=2 BORDER=0 BGCOLOR=$bgcolor2><TR><TD>";
echo "<TABLE CELLSPACING=0 CELLPADDING=3 BORDER=0 BGCOLOR=FFFFFF><tr><td colspan=2 bgcolor=$bgcolor1>";
echo "<font color=$textcolor1><center><b>".translate("Miscelaneous Stats")."</b></center></font>";
echo "<tr><td><font color=$textcolor2><img src=images/stats/users.gif border=0>&nbsp;".translate("Registered Users: ")."</td><td><font color=$textcolor2><b>$unum</b></td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/authors.gif border=0>&nbsp;".translate("Active Authors: ")."</td><td><font color=$textcolor2><b>$anum</b></td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/news.gif border=0>&nbsp;".translate("Stories Published: ")."</td><td><font color=$textcolor2><b>$snum</b></td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/topics.gif border=0>&nbsp;".translate("Active Topics: ")."</td><td><font color=$textcolor2><b>$tnum</b></td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/comments.gif border=0>&nbsp;".translate("Comments Posted: ")."</td><td><font color=$textcolor2><b>$cnum</b></td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/sections.gif border=0>&nbsp;".translate("Special Sections: ")."</td><td><font color=$textcolor2><b>$secnum</b></td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/articles.gif border=0>&nbsp;".translate("Articles in Sections: ")."</td><td><font color=$textcolor2><b>$secanum</b></td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/topics.gif border=0>&nbsp;".translate("Links in Web Links: ")."</td><td><font color=$textcolor2><b>$links</b></td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/sections.gif border=0>&nbsp;".translate("Categories in Web Links: ")."</td><td><font color=$textcolor2><b>$cat</b></td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/waiting.gif border=0>&nbsp;".translate("News Waiting to be Published: ")."</td><td><font color=$textcolor2><b>$subnum</b></td></tr>\n";
echo "<tr><td><font color=$textcolor2><img src=images/stats/sections.gif border=0>&nbsp;".translate("PHP-Nuke version: ")."</td><td><font color=$textcolor2><b>$Version_Num</b></td></tr>\n";
echo "</TD></TR></TABLE>";
echo "</TD></TR></TABLE>";
echo "<br><br></center>";

if ($admin AND $advancedstats) {
    ServerInfo();
}

include("footer.php");

?>