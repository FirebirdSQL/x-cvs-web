<?php
if (eregi("footer.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

$footer = 1;
?>


<?php
if (!IsSet($op)) {
echo "
<hr size=1>
<center>
This <a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;home\">Firebird/Interbase
 WebRing</a> site is owned by
 ".GetRabbitSafeEMailLink("firebirds","Firebird Project").".<br>
[ <a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;id=22;prev5\">
Previous 5 Sites</a> |<a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;id=22;prev\">
Previous</a> |<a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;id=22;next\">
Next</a> |<a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;id=22;next5\">
Next 5 Sites</a> |<a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;random\">
Random Site</a> |<a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;list\">
List Sites</a> ]</center>
<hr size=1>
"; }
?>

<table border="0" cellPadding="0" cellSpacing="0" width="100%">
  <tr bgColor="<?php echo $bgcolor1 ?>"><td><img alt height="2" src="images/1x1.gif" width="1"></td></tr>
</table>

<table CELLSPACING="5" border="0" width="100%"><tr>
<td align="left" width="10%">
        <a href="http://sourceforge.net/project/?group_id=9028">
        <img src="<?=$rootDir?>images/sflogo.png" width="88" height="31"
        border="0" alt="Firebird at SourceForge"></a>
</td>
        <td align="left" width="80%">
        This site and the pages contained within are Copyright © 2000, 2001, 2002, Firebird Project.
</td>

<td align=right>

<!--font size=1 color=white-->
<font size=1>
<a target="_top" href="http://t.extreme-dm.com/?login=hembot">
<img src="http://u1.extreme-dm.com/i.gif" height=38
border=0 width=41 alt=""></a><script language="javascript1.2"><!--
EXs=screen;EXw=EXs.width;navigator.appName!="Netscape"?
EXb=EXs.colorDepth:EXb=EXs.pixelDepth;//-->
</script><script language="javascript"><!--
EXd=document;EXw?"":EXw="na";EXb?"":EXb="na";
EXd.write("<img src=\"http://t0.extreme-dm.com",
"/0.gif?tag=hembot&j=y&srw="+EXw+"&srb="+EXb+"&",
"l="+escape(EXd.referrer)+"\" height=1 width=1>");//-->
</script><noscript><img height=1 width=1 alt=""
src="http://t0.extreme-dm.com/0.gif?tag=hembot&j=n"></noscript>
</font>

</td>
</tr></table>

