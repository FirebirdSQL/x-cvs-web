<?php
if (eregi("news.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<hr>
<H4>Last 10 Releases</H4>
<p>
<TABLE CELLSPACING="2" CELLPADDING="2" WIDTH="100%" SUMMARY="Latest News">

<?php

include("lastRSS.php");

    // create lastRSS object
    $rss = new lastRSS; 

    // set cache
    $rss->cache_dir = './cache'; 
    $rss->cache_time = 14400;

    $content = "";
    // read and process te RSS file
    if ($rs = $rss->get('http://sourceforge.net/export/rss2_projfiles.php?group_id=9028&rss_limit=10')) {
    	foreach ($rs['items'] as $item) {
    	    $temp="";
  	    $temp = $rss->my_preg_match("'\((.*?)\)'si", $item['title']);
	    $content .= "<tr><td valign=\"TOP\" nowrap=\"NOWRAP\" width=\"15%\">".date("d-M-Y",strtotime($temp))."</td>";
  	    $temp = $rss->my_preg_match("'(.*?)released'si", $item['title']);
  	    $link = $rss->my_preg_match("'a href=(.*?)\[Download]'si", $item['description']);
	    $content .= "<td><a target=\"blank\" href=".$link.$temp."</a></td></tr>";
	}
    }
    else {
       $content = "<tr><td>RSS feed is not available.</td></tr>";
    }

    echo $content;


?>
</table>
<p>
