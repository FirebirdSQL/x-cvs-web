<?php
if (eregi("footer.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

$footer = 1;
?>

</td></tr></table>

<?php
if (!IsSet($op)) {
echo "
<hr size=1>
<center>
This <a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;home\">Firebird&trade;/Interbase&reg;
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

<table CELLSPACING="5" border="0" width="100%"><tr><td align="left" width="10%">
<a href="http://sourceforge.net/project/?group_id=9028">
<img src="http://sourceforge.net/sflogo.php?group_id=9028&amp;type=1" width="88" height="31"
border="0" alt="Firebird at SourceForge"></a>
</td><td align="left" width="90%"><FONT face="Lucida,Verdana,Helvetica,Arial" color="black">
This site and the pages contained within are Copyright © 2000-2004, Firebird Project.<br>
Firebird&trade; - Relational Database for the New Millennium.
</font></td></tr></table>

<table border="0" cellPadding="0" cellSpacing="0" width="100%">
  <tr bgColor="<?php echo $bgcolor1 ?>"><td><img alt height="2" src="images/1x1.gif" width="1"></td></tr>
</table>
</td></tr></table>


</td></tr></table>
</td></tr></table>

</body>
</html>