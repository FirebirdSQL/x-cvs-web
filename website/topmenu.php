<?php
if (eregi("topmenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>


<table border="0" width="100%">
<tbody>
        <tr>
                <td align="left">
                &nbsp;&nbsp;
                <img src="<?= $rootDir ?>images/LogoFirebird.png" alt="" align="middle">
                <img src="<?= $rootDir ?>images/TitleFirebirdBlackGill2.gif" alt="Firebird"  align="middle">
                <br>
        </td>
<!-- -->
	<td align=right vAlign=center>
       <TABLE border=0 cellPadding=0 cellSpacing=0>
       <!--TABLE border=1 cellPadding=0 cellSpacing=0 width="270"-->
       <TBODY>
            <TR>
                <TD class=s_menu align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php>&nbsp;Home&nbsp;</A></TD>
                <TD class=s_menu align=middle vAlign=righ>|&nbsp;&nbsp;</TD>
                <TD class=s_menu align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>projects/index.php>&nbsp;Projects&nbsp;</A></TD>
                <TD class=s_menu align=middle vAlign=center>|&nbsp;&nbsp;</TD>
            </TR>
            <TR>
                <TD class=s_menu align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>downloads/index.php>&nbsp;Downloads&nbsp;</A></TD>
                <TD class=s_menu align=middle vAlign=center>|&nbsp;&nbsp;</TD>
                <TD class=s_menu align=right vAlign=top><A class=s_menu href=<?=$rootDir?>community/index.php>&nbsp;Community&nbsp;</A></TD>
                <TD class=s_menu align=middle vAlign=center>|&nbsp;&nbsp;</TD>
            </TR>
            <TR>
                <TD class=s_menu align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>support/index.php>&nbsp;Help/Support&nbsp;</A></TD>
                <TD class=s_menu align=middle vAlign=center>|&nbsp;&nbsp;</TD>
                <TD class=s_menu align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>foundation/index.php>&nbsp;Foundation&nbsp;</A></TD>
                <TD class=s_menu align=middle vAlign=center>|&nbsp;&nbsp;</TD>
            </TR>
<!--
            <TR>
                <TD class=s_menu align=right vAlign=top></TD>
                <TD class=s_menu align=middle vAlign=center></TD>
                <TD class=s_menu align=right vAlign=top><A class=s_menu href=http://www.sourceforge.net/projects/firebird>&nbsp;SF Project&nbsp;</A></TD>
                <TD class=s_menu align=middle vAlign=center>|&nbsp;&nbsp;</TD>
            </TR>
-->
        </TD>
        </TBODY>
        </TABLE>
    </td>
<!-- -->


        </tr>
</tbody>
</table>




