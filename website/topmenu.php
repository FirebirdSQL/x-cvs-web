<?php
if (eregi("topmenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<!-- START TOPMENU CHUNK -->
<table border="0" width="100%">
<tr><td class="centre">

<table border="0" width="900">
<tr><td>

<table border="0" width="100%">
<tr>



<?php
# conditional topmenu setup
if ($top_menu == "main")  // Firebird main page
   {
   echo "
   <td align=\"center\" width=\"200\">
    <table cellpadding=3  background=\"images/flashback.gif\" border=1>
      <tr>
        <td>

   ";
   include ("news_flash.php");
   echo "
<br>&nbsp;
        </td>
      </tr>
    </table>
  </td>

<td>

<table border=\"0\" width=\"100%\">
<tr>
  <td align=\"left\">
  <img src=\"images/2010_header1.gif\" alt=\"Firebird master head\" >
   ";

   }
# --------------------------------------------------------------------
elseif ($top_menu == "ff")  // Foundation pages
  {
  echo "
<td>
  <span style=\"background-color:#ffffff\"\;>
  <table border=\"0\" width=\"100%\" bgcolor=\"FFFFFF\">
    <tr>
      <!-- td align=\"left\" -->
      <td class=\"left\"> 
        <table> 
          <tr>
            <td class=\"left\">
<img src=\"images/LogoFirebird.gif\" alt=\"\" align=\"middle\">
<img src=\"images/TitleBlackGill3.gif\" alt=\"Firebird SQL\" align=\"middle\"> 
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
";
  $no_menu = 1;

  }
# --------------------------------------------------------------------
elseif ($top_menu == "ffc")  // FF committee pages
  {
  echo "
<td>
  <span style=\"background-color:#ffffff\"\;>
  <table border=\"0\" width=\"100%\" bgcolor=\"FFFFFF\">
    <tr>
      <!-- td align=\"left\" -->
      <td class=\"left\"> 
        <table> 
          <tr>
            <td class=\"left\">
<img src=\"images/LogoFirebird.gif\" alt=\"\" align=\"middle\">
<img src=\"images/committee.gif\" alt=\"Firebird SQL\" align=\"middle\"> 
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
";
  $no_menu = 1;

  }
# --------------------------------------------------------------------
elseif ($top_menu == "umbrella")  // Umbrella pages
  {
  echo "
  <td align=\"center\" width=\"200\">
    <table cellpadding=3>
      <tr>
        <td class=\"centre\">

<img src=\"images/logo_left_90.gif\" border=0><br>

<b> ". $toptext . "</b>
        </td>
      </tr>
    </table>
  </td>

  <td>

    <table border=\"0\" width=\"100%\">
      <tr>
        <td align=\"left\">
  <img src=\"images/under-umbrella-top.gif\" alt=\"Firebird Umbrella\" >
";
  $no_menu = 1;
  }
# --------------------------------------------------------------------
elseif ($top_menu == "konferenz")  // Latest conference news
  {
  echo "
  <td align=\"center\" width=\"200\">
    <table cellpadding=3>
      <tr>
        <td class=\"centre\">
<img src=\"images/dispatches.jpg\" border=0>
<img src=\"images/conf-banner-2007.jpg\" border=0><br>

<b> ". $toptext . "</b>
        </td>

";
  $no_menu = 1;
  }
# --------------------------------------------------------------------
else  
  {
  echo "
  <td align=\"center\" width=\"200\">
    <table cellpadding=3>
      <tr>
        <td class=\"centre\">

<img src=\"images/logo_left_90.gif\" border=0><br>

<b> ". $toptext . "</b>
        </td>
      </tr>
    </table>
  </td>

  <td>

    <table border=\"0\" width=\"100%\">
      <tr>
        <td align=\"left\">
  <img src=\"images/2007_header2.gif\" alt=\"Firebird default head\" >
";
  }
# end of conditional part
?>
        </td>
        <td>

      </td>
    </tr>

<?php
if ($no_menu == 1)  // Foundation pages, Umbrella
  $no_op="";
else 
  {
  echo "
<tr><td valign=\"top\">

<script src=\"xaramenu.js\"></script><script Webstyle4 src=\"images/fb_menu.js\"></script>
  ";
#
  }

if (($rss != "") and ($no_rss != 1))
  {

#
  if ($no_menu == 1)
  
  echo "
  <tr><td valign=\"top\">
  ";
#
  echo "
  <a href=\"http://www.firebirdsql.org/" .$xroot. "rss.php\">
<img src=\"images/rss_subscribe.gif\" border=\"0\" alt=\"Execute RSS Feed\"></a> 
  ";
  }
  echo "
</td></tr>
  ";
#
#  }
?>

</table>
</td></tr>
</table>

<table border="0" width="100%" cellspacing="5"><tr><td valign="top">
<!-- END TOPMENU CHUNK -->

