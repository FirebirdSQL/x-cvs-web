<?php
global $admin;
if ($index == 1) {
    echo "<td>&nbsp;</td><td valign=\"top\" width=150>";
//    bigstory();
    pollNewest();
    loginbox();
    online();
    oldNews($storynum);
    rightblocks();
    ephemblock();
    headlines();
}
echo "</td></tr></table></td></tr></table>";

if ($index == 1) {
echo "
<hr size=1>
<center>
This <a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;home\">Firebird/Interbase
 WebRing</a> site is owned by
 <a href=\"mailto:firebirds@users.sourceforge.net\">Firebird Project</a>.<br>
[ <a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;id=22;prev5\">
Previous 5 Sites</a> |<a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;id=22;prev\">
Previous</a> |<a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;id=22;next\">
Next</a> |<a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;id=22;next5\">
Next 5 Sites</a> |<a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;random\">
Random Site</a> |<a href=\"http://nav.webring.org/cgi-bin/navcgi?ring=interbase;list\">
List Sites</a> ]</center>
<hr size=1>
"; }

footmsg();
?>