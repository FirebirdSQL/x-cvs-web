<?php
if (eregi("topmenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<table border="0" width="100%">
<tr><td align="center">

<table border="0" width="770">
<tr><td align="center">

<table border="0" width="100%">
<tr>
  <td align="left"><p><img src="images/firebird_main_header.png" alt="Firebird master head"></p>
  </td>
<td align=right vAlign=center>
<TABLE border=0 cellPadding=0 cellSpacing=0 width="270">
<TBODY>
<TR>
<TD align=right vAlign=top><A class=s_menu href=index.php>&nbsp;Home&nbsp;</A></TD>
<TD align=middle vAlign=righ>|</TD>
<TD align=right vAlign=top><A class=s_menu href=index.php?op=devel>&nbsp;Developer's corner&nbsp;</A></TD>
<TD align=middle vAlign=center>|</TD>
</TR>
<TR>
<TD align=right vAlign=top><A class=s_menu href=index.php?op=faq>&nbsp;FAQ&nbsp;</A></TD>
<TD align=middle vAlign=center>|</TD>
<TD align=right vAlign=top><A class=s_menu href=http://sourceforge.net/projects/firebird>&nbsp;SourceForge Area&nbsp;</A></TD>
<TD align=middle vAlign=center>|</TD>
</TR>
<TR>
<TD align=right vAlign=top><A class=s_menu href=index.php?op=files>&nbsp;Download&nbsp;</A></TD>
<TD align=middle vAlign=center>|</TD>
<TD align=right vAlign=top><A class=s_menu href=index.php?op=lists>&nbsp;Lists &amp; Newsgroups&nbsp;</A></TD>
<TD align=middle vAlign=center>|</TD>
</TR>
<TR>
<TD align=right vAlign=top><A class=s_menu href=index.php?op=guide>&nbsp;Novice's Guide&nbsp;</A></TD>
<TD align=middle vAlign=center>|</TD>
<TD align=right vAlign=top><A class=s_menu href=index.php?op=doc>&nbsp;Documentation&nbsp;</A></TD>
<TD align=middle vAlign=center>|</TD>
</TR>
<TR>
<TD align=right vAlign=top><A class=s_menu href=index.php?op=useful>&nbsp;Really Useful&nbsp;</A></TD>
<TD align=middle vAlign=center>|</TD>
<TD align=right vAlign=top><A class=s_menu href=index.php?op=history>&nbsp;History&nbsp;</A></TD>
<TD align=middle vAlign=center>|</TD>
</TR>
<TR>
<?php if ($userid == "") { ?>
<TD align=right vAlign=top><A class=s_menu href=http://www.firebirdsql.org/foundation/>&nbsp;Foundation&nbsp;</A></TD>
<?php } else { ?>
<TD align=right vAlign=top><A class=s_menu href=index.php?op=user>&nbsp;Your account&nbsp;</A></TD>
<?php } ?>
<TD align=middle vAlign=center>|</TD>
<TD align=right vAlign=top><A class=s_menu href=index.php?op=rabbits>&nbsp;Rabbit Holes&nbsp;</A></TD>
<TD align=middle vAlign=center>|</TD>
</TR>
</TD></TBODY></TABLE>
</td>
</tr>
</table>

<table border=0 width=100% cellspacing=5><tr><td valign=top>

