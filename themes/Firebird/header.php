<?php

?>
<LINK href="themes/Firebird/styles.css" rel=STYLESHEET 
type=text/css>
<body onload=init() background="images/fine_line_bg.gif" bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" topmargin=5 leftmargin=0 rightmargin=0 marginheight=5>
<?php
if ($banners) {
    include("banners.php");
}
?>

<!--
<td align=right>
  <form action="search.php" method=post>
  <input type=text name=query width=20 size=15 length=20>
</td>
<td width=60 align=right>
  <input type=image src=<?php echo "$uimages"; ?>/search.gif border=0 align=middle>
</td>
  </form>
</tr>
-->

<table border="0" cellspacing="0" cellpadding="3" width="100%" bgcolor="FFFFFF">
<tr>
<td>
  <a href="<?php echo $nuke_url; ?>"><img src="themes/Firebird/firebird_header.png" alt="<?php echo "".translate("Welcome to").""; ?> <?php echo $sitename; ?>" border=0></a>
</td>
<TD align=right>
<TABLE border=0 cellPadding=0 cellSpacing=0>
<TBODY>
<TR>
<TD align=right vAlign=top><A class=s_menu href=index.php>Home</A></TD>
<TD align=middle vAlign=righ>| </TD>
<TD align=right vAlign=top><A class=s_menu href=faq.php>FAQ</A></TD>
<TD align=middle vAlign=center>| </TD>
<TD align=right vAlign=top><A class=s_menu href=friend.php>Recomend us</A></TD>
<TD align=middle vAlign=center>| </TD>
</TR>
<TR>
<TD align=right vAlign=top><A class=s_menu href=http://sourceforge.net/projects/firebird>SourceForge Area</A></TD>
<TD align=middle vAlign=center>| </TD>
<TD align=right vAlign=top><A class=s_menu href=links.php>Web Links</A></TD>
<TD align=middle vAlign=center>| </TD>
<TD align=right vAlign=top><A class=s_menu href=memberslist.php>Members List</A></TD>
<TD align=middle vAlign=center>| </TD>
</TR>
<TR>
<TD align=right vAlign=top><A class=s_menu href=topics.php>News Archive</A></TD>
<TD align=middle vAlign=center>| </TD>
<TD align=right vAlign=top><A class=s_menu href=http://sourceforge.net/project/showfiles.php?group_id=9028>Distributions</A></TD>
<TD align=middle vAlign=center>| </TD>
<TD align=right vAlign=top><A class=s_menu href=user.php>Your account</A></TD>
<TD align=middle vAlign=center>| </TD>
</TR>
<TR>
<TD align=right vAlign=top><A class=s_menu href=sections.php>Featured articles</A></TD>
<TD align=middle vAlign=center>| </TD>
<TD align=right vAlign=top><A class=s_menu href=download.php>Other download</A></TD>
<TD align=middle vAlign=center>| </TD>
<TD align=right vAlign=top><A class=s_menu href=submit.php>Submit News</A></TD>
<TD align=middle vAlign=center>| </TD>
</TR>
</TD></TBODY></TABLE>
</tr>
</table>

<TABLE border=0 cellPadding=0 cellSpacing=0 width="100%" bgcolor=000000>
 <TR>
   <TD bgColor=#CE383D align=left valign=middle>
   <font color=FFFFFF><a class=osdn>&nbsp;&nbsp;&nbsp;<?php echo "$slogan"; ?></a></font></TD>
 </TR>
</TABLE>
<table border=0 width=100% cellspacing=5><tr><td valign=top>

<?php
global $admin;

//  mainblock();
  category();
  userblock();
  adminblock();
  leftblocks();
  online();

//echo "<img src=images/pix.gif border=0 width=150 height=1>";
echo "</td><td width=100% valign=top>";
 ?>

