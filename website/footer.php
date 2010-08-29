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
  $maillink = GetRabbitSafeEMailLink("firebirds", "The Firebird Project", false, "Email us");
  echo <<<ENDWR
    <hr size=1>
    <center>
      This <a href="http://www.webring.org/t/Firebird-Interbase">Firebird&reg;/InterBase&reg; WebRing</a>
      site is owned by {$maillink}.<br>
      [ <a href="http://www.webring.org/go?ring=interbase;sid=22;id=22;prev" title="Previous site in this webring">&lt;&lt; Prev</a>
      | <a href="http://www.webring.org/t/Firebird-Interbase" title="Homepage of this webring">Hub</a>
      | <a href="http://www.webring.org/hub?ring=interbase" title="List of all the sites in this webring">Sites</a>
      | <a href="http://www.webring.org/go?ring=interbase;random" title="Visit a random site in this webring">Random</a>
      | <a href="http://www.webring.org/go?ring=interbase;sid=22;id=22;next" title="Next site in this webring">Next &gt;&gt;</a> ]
    </center>
    <hr size=1>
ENDWR;
}
?>

<table border="0" cellPadding="0" cellSpacing="0" width="100%">
  <tr bgColor="<?php echo $bgcolor1 ?>"><td><img alt height="2" src="images/1x1.gif" width="1"></td></tr>
</table>

<table CELLSPACING="5" border="0" width="100%">
<tr>
<td align="left"><a href="http://sourceforge.net/projects/firebird"><img src="http://sflogo.sourceforge.net/sflogo.php?group_id=9028&type=11" width="120" height="30" border="0" alt="Get Firebird at SourceForge.net. Fast, secure and Free Open Source software downloads" /></a>
</td>
<td><img src="images/clearpixel.gif" width=40></td>
<td align="left"><FONT face="Lucida,Verdana,Helvetica,Arial" color="black">
This site and the pages contained within are Copyright © 2000-2010, Firebird Project.<br>
Firebird&reg; is a registered trademark of Firebird Foundation Incorporated.
</font>
</td>
<td>
<SCRIPT type='text/javascript' language='JavaScript' src='http://www.ohloh.net/projects/4149;badge_js'></SCRIPT>
</td>
</tr></table>

<table border="0" cellPadding="0" cellSpacing="0" width="100%">
  <tr bgColor="<?php echo $bgcolor1 ?>"><td><img alt height="2" src="images/1x1.gif" width="1"></td></tr>
</table>
</td></tr></table>


</td></tr></table>
</td></tr></table>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-2290083-1";
urchinTracker();
</script>

</body>
</html>