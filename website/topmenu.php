<?php
if (eregi("topmenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<table border="0" width="100%">
<tr><td class="centre">

<table border="0" width="900">
<tr><td>

<table border="0" width="100%">
<tr>
  <td align="left"><img src="images/firebird_main_header.png" alt="Firebird master head">
  </td>
<td>
<TABLE class="menu">
<TR>
<TD class="menu1"><A class="s_menu" href="index.php">&nbsp;Home&nbsp;</A></TD>
<TD class="menu2">|</TD>
<TD class="menu1"><A class="s_menu" href="index.php?op=devel">&nbsp;Developer's corner&nbsp;</A></TD>
<TD class="menu1">|</TD>
</TR>
<TR>
<TD class="menu1"><A class="s_menu" href="index.php?op=faq">&nbsp;FAQ&nbsp;</A></TD>
<TD class="menu2">|</TD>
<TD class="menu1"><A class="s_menu" href="http://sourceforge.net/projects/firebird">&nbsp;SourceForge Area&nbsp;</A></TD>
<TD class="menu1">|</TD>
</TR>
<TR>
<TD class="menu1"><A class="s_menu" href="http://sourceforge.net/project/showfiles.php?group_id=9028">&nbsp;Download&nbsp;</A></TD>
<TD class="menu2">|</TD>
<TD class="menu1"><A class="s_menu" href="index.php?op=lists">&nbsp;Lists &amp; Newsgroups&nbsp;</A></TD>
<TD class="menu1">|</TD>
</TR>
<TR>
<TD class="menu1"><A class="s_menu" href="index.php?op=guide">&nbsp;Novice's Guide&nbsp;</A></TD>
<TD class="menu2">|</TD>
<TD class="menu1"><A class="s_menu" href="index.php?op=doc">&nbsp;Documentation&nbsp;</A></TD>
<TD class="menu1">|</TD>
</TR>
<TR>
<TD class="menu1"><A class="s_menu" href="index.php?op=useful">&nbsp;Really Useful&nbsp;</A></TD>
<TD class="menu2">|</TD>
<TD class="menu1"><A class="s_menu" href="index.php?op=history">&nbsp;History&nbsp;</A></TD>
<TD class="menu1">|</TD>
</TR>
<TR>
<?php if ($userid == "") { ?>
<TD class="menu1"><A class="s_menu" href="http://www.firebirdsql.org/foundation/">&nbsp;Foundation&nbsp;</A></TD>
<?php } else { ?>
<TD class="menu1"><A class="s_menu" href="index.php?op=user">&nbsp;Your account&nbsp;</A></TD>
<?php } ?>
<TD class="menu2">|</TD>
<TD class="menu1"><A class="s_menu" href="index.php?op=rabbits">&nbsp;Rabbit Holes&nbsp;</A></TD>
<TD class="menu1">|</TD>
</TR>
</TABLE>
</td>
</tr>
</table>

<table border="0" width="100%" cellspacing="5"><tr><td valign="top">

