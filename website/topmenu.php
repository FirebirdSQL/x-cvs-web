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
                <img src="<?= $rootDir ?>images/LogoFirebird.png" alt="" align="middle">
                <img src="<?= $rootDir ?>images/TitleBlackGill2.gif" alt="FirebirdSQL" width="310" height="50" align="middle">
                <!--
                <img src="<?= $rootDir ?>images/fb_masthead1_lge.png" alt="FirebirdSQL" width="400"  align="middle">
                <img src="<?= $rootDir ?>images/fb_small_mhead.png" alt="FirebirdSQL"  align="middle">
                <img src="<?= $rootDir ?>images/firebird_main_header.png" alt="FirebirdSQL"  align="middle">
                -->
                <br>
        </td>
<!--
	<td align=right vAlign=center>
       <TABLE border=0 cellPadding=0 cellSpacing=0 width="270">
       <TBODY>
            <TR>
                <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php>&nbsp;Home&nbsp;</A></TD>
                <TD align=middle vAlign=righ>|</TD>
                <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php?op=devel>&nbsp;Developer's corner&nbsp;</A></TD>
                <TD align=middle vAlign=center>|</TD>
            </TR>
            <TR>
                <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php?op=faq>&nbsp;FAQ&nbsp;</A></TD>
                <TD align=middle vAlign=center>|</TD>
                <TD align=right vAlign=top><A class=s_menu href=http://sourceforge.net/projects/firebird>&nbsp;SourceForge Area&nbsp;</A></TD>
                <TD align=middle vAlign=center>|</TD>
            </TR>
            <TR>
                <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php?op=files>&nbsp;Download&nbsp;</A></TD>
                <TD align=middle vAlign=center>|</TD>
                <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php?op=lists>&nbsp;Lists &amp; Newsgroups&nbsp;</A></TD>
                <TD align=middle vAlign=center>|</TD>
            </TR>
            <TR>
                <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php?op=guide>&nbsp;Novice's Guide&nbsp;</A></TD>
                <TD align=middle vAlign=center>|</TD>
                <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php?op=doc>&nbsp;Documentation&nbsp;</A></TD>
                <TD align=middle vAlign=center>|</TD>
            </TR>
            <TR>
                <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php?op=useful>&nbsp;Really Useful&nbsp;</A></TD>
                <TD align=middle vAlign=center>|</TD>
                <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php?op=history>&nbsp;History&nbsp;</A></TD>
                <TD align=middle vAlign=center>|</TD>
            </TR>
            <TR>
                <?php if ($userid == "") { ?>
                    <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>foundation/>&nbsp;Foundation&nbsp;</A></TD>
                <?php } else { ?>
                    <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php?op=user>&nbsp;Your account&nbsp;</A></TD>
                <?php } ?>
                <TD align=middle vAlign=center>|</TD>
                <TD align=right vAlign=top><A class=s_menu href=<?= $rootDir ?>index.php?op=rabbits>&nbsp;Rabbit Holes&nbsp;</A></TD>
                <TD align=middle vAlign=center>|</TD>
            </TR>
        </TD>
        </TBODY>
        </TABLE>
    </td>
-->


        </tr>
</tbody>
</table>




